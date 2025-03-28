<?php
namespace App\Http\Traits;

trait ApiResponseTrait
{
    protected function ApiResponse($title, $status = 200, $data = [])
    {

        $respnce['message'] = $title;
        $respnce['data'] = $data;
        $respnce['status_code'] = $status;

        return response($respnce, $status);
    }
}
