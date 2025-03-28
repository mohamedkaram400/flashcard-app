<?php

namespace App\Http\Controllers\Api\Auth;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Traits\ApiResponceTrait;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RegisterRequest;
use Illuminate\Support\Facades\RateLimiter;
use App\Http\Resources\Api\Auth\UserResource;

class AuthController extends Controller
{
    use ApiResponseTrait;

    public function register(RegisterRequest $request) 
    {
        $validatedData = $request->validated();
        
        $user = User::create([
            'name'      => $validatedData['name'],
            'username'  => $validatedData['username'],
            'email'     => $validatedData['email'],
            'phone'     => $validatedData['phone'] ?? null,
            'password'  => Hash::make($validatedData['password']),
            'isAdmin'   => false,
        ]);

        if ($user) {

            $token = $user->createToken($user->name . ' Auth-Token')->plainTextToken;

            $data = $this->ResponceData($token, $user, 'register');

            return $this->ApiResponse('User Registerd Successfully', 201, $data);

        } else {
            return $this->ApiResponse('Something was wrong', 500);
        }
    }

    public function login(LoginRequest $request) 
    {
        // Generate a unique key for rate limiting (using email & IP)
        $throttleKey = 'login:' . Str::lower($request->email) . '|' . $request->ip();

        // Check if the user is rate-limited
        if (RateLimiter::tooManyAttempts($throttleKey, 2)) {
            return $this->ApiResponse(
                'Too many login attempts. Try again in ' . RateLimiter::availableIn($throttleKey) . ' seconds.', 
                429
            );
        }

        // Get user by email or username
        $user = $this->getUserByEmailOrUsername($request->validated());

        // If user not found or password incorrect, increment rate limiter count
        if (!$user || !Hash::check($request->password, $user->password)) {
            RateLimiter::hit($throttleKey, 60); 
            return $this->ApiResponse('Invalid Credentials.', 401);
        }

        // Successful login: clear rate limiter
        RateLimiter::clear($throttleKey);

        // Generate token
        $token = $user->createToken($user->name . ' Auth-Token')->plainTextToken;

        // Handle "Remember Me" functionality
        if ($request->remember) {
            $token->expires_at = Carbon::now()->addWeeks(1);
            $token->save();
        }

        $data = $this->ResponceData($token, $user, 'login');
        $this->logUserLogin($user);

        return $this->ApiResponse('Login Successfully', 201, $data);

    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->tokens()->delete();

        return $this->ApiResponse('logout successfully', 200);
    }

    protected function getUserByEmailOrUsername($request)
    {
        return User::where('email', $request['email_or_username'])
                    ->orWhere('username', $request['email_or_username'])
                    ->first();
    }

    protected function ResponceData($token, $user, $methodType)
    {
        return [
            'message' => $methodType == 'login' ? 'User Login successfully' : 'User Registration successfully',
            'token_type' => 'Bearar',
            'token' => $token,
            'userData' => new UserResource($user),
        ];
    }

    protected function logUserLogin($user)
    {
        Log::info('User logged in', [
            'id' => $user->id,
            'name' => $user->name . ' ' . $user->last_name,
            'ip' => request()->ip(),
            'date' => Carbon::now()->format('Y-m-d'),
            'time' => Carbon::now()->format('H:i a'),
        ]);
    }
}
 