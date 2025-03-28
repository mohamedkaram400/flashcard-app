<?php

namespace App\Http\Controllers;

use App\Models\FlashCard;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Services\FlashCardService;
use App\Http\Requests\StoreFlashCardRequest;
use App\Http\Requests\UpdateFlashCardRequest;

class FlashCardController extends Controller
{
    use ApiResponseTrait;

    protected $flashCardService;

    public function __construct(FlashCardService $flashCardService)
    {
        $this->flashCardService = $flashCardService;
    }

    public function index()
    {
        return $this->flashCardService->index();
    }

    public function show($id) 
    {
        return $this->flashCardService->show($id);
    }

    public function store(StoreFlashCardRequest $request)
    {
        return $this->flashCardService->store($request);
    }

    public function update(UpdateFlashCardRequest $request, $id)
    {
        return $this->flashCardService->update($request, $id);
    }

    public function destroy(FlashCard $flashCard)
    {
        return $this->flashCardService->destroy($flashCard);
    }
}
