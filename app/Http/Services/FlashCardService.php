<?php
namespace App\Http\Services;

use App\Models\FlashCard;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Requests\StoreFlashCardRequest;
use App\Http\Requests\UpdateFlashCardRequest;

class FlashCardService
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $flashCards = FlashCard::with('category')->where('user_id', Auth::id())->get();
        return $this->ApiResponse('FlashCards retrieved successfully', 200, $flashCards);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFlashCardRequest $request)
    {
        $validData = $request->validated();
        
        $flashCard = FlashCard::create([
            'question'    => $validData['question'],
            'answer'      => $validData['answer'],
            'category_id' => $validData['category_id'],
            'user_id'     => Auth::id(),
            'difficulty'  => $validData['difficulty'],
            'hint'        => $validData['hint'] ?? null,
        ]);

        if (!empty($validData['tagIds'])) {
            $flashCard->tags()->sync($validData['tagIds']);
        }

        return $this->ApiResponse('FlashCard created successfully', 201, $flashCard);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $flashCard = FlashCard::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return $this->ApiResponse('FlashCard retrieved successfully', 200, $flashCard);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFlashCardRequest $request, $id)
    {
        $flashCard = FlashCard::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $validData = array_filter($request->validated(), fn($value) => $value !== null);

        $flashCard->update($validData);
        
        if (!empty($validData['tagIds'])) {
            $flashCard->tags()->sync($validData['tagIds']);
        }

        return $this->ApiResponse('FlashCard updated successfully', 200, $flashCard);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $flashCard = FlashCard::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $flashCard->delete();

        return $this->ApiResponse('FlashCard deleted successfully', 200);
    }
}
