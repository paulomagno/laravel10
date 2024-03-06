<?php

namespace App\Http\Controllers\Api;

use App\DTO\Supports\CreateSupportDTO;
use App\DTO\Supports\UpdateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupportRequest;
use App\Http\Resources\SupportResource;
use App\Services\SupportService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SupportController extends Controller
{
    
    protected SupportService $service;
    
    /**
     * Create a new controller instance.
     */
    public function __construct(
        SupportService $service
    )
    {
        $this->service = $service;
    }
    
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       $supports = $this->service->paginante(
            $request->get('page', 1),
            $request->get('per_page', 1),
            $request->filter
       );

       return SupportResource::collection($supports->items())
            ->additional([
                'meta' => [
                    'total'         => $supports->total(),
                    'is_first_page' => $supports->isFirstPage(),
                    'is_last_page'  => $supports->isLastPage(),
                    'current_page'  => $supports->currentPage(),
                    'next_page'     => $supports->getNumberNextPage(),
                    'previous_page' => $supports->getNumberPreviousPage(),

                ]
            ]);
        ;       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateSupportRequest $request)
    {
        $support = $this->service->new(CreateSupportDTO::makeFromRequest($request));

        return new SupportResource($support);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!$support = $this->service->findOne($id)) {
           return response()->json(['error' => 'Not found'], Response::HTTP_NOT_FOUND);
        }

        return new SupportResource($support);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateSupportRequest $request, string $id)
    {
        $support = $this->service->update(
            UpdateSupportDTO::makeFromRequest($request, $id)
        );

        if (!$support) {
            return response()->json(['error' => 'Not found'], Response::HTTP_NOT_FOUND);
        }

        return new SupportResource($support);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!$this->service->findOne($id)) {
            return response()->json(['error' => 'Not found'], Response::HTTP_NOT_FOUND);
        }

        $this->service->delete($id);

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
