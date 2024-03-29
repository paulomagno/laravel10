<?php

namespace App\Http\Controllers\Admin;

use App\DTO\Supports\CreateSupportDTO;
use App\DTO\Supports\UpdateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupportRequest;
use App\Services\SupportService;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    protected $service;
    public function __construct(SupportService $service)
    {
        $this->service = $service;
    }
    
    public function index(Request $request)
    {
        $supports = $this->service->paginante(
            $request->get('page', 1),
            $request->get('per_page', 6),
            $request->filter
        );

        $filters = ['filter' => $request->get('fiter', '')];
       
        return view('admin/supports/index', [
            'supports' => $supports,
            'filters'  => $filters
        ]);
    }

    public function create()
    {
        return view('admin/supports/create');
    }

    public function store(StoreUpdateSupportRequest $request)
    {
        $this->service->new(CreateSupportDTO::makeFromRequest($request));
        
        return redirect()
            ->route('supports.index')
            ->with('message', 'Cadastrado com sucesso!');
    }

    public function show(int $id)
    {
        if (!$support = $this->service->findOne($id)) {
            return back();
        }
        
        return view('admin/supports/show', [
            'support' => $support
        ]);
    }

    public function edit(int $id)
    {
        if (!$support = $this->service->findOne($id)) {
            return back();
        }
        
        return view('admin/supports/edit', [
            'support' => $support
        ]);
    }

    public function update(StoreUpdateSupportRequest $request)
    {
        $support = $this->service->update(UpdateSupportDTO::makeFromRequest($request));
        
        if (!$support) {
            return back();
        }
        
        return redirect()
                ->route('supports.index')
                ->with('message', 'Atualizado com sucesso!');
    }

    public function destroy(int $id)
    {
        $this->service->delete($id);
        
        return redirect()
                ->route('supports.index')
                ->with('message', 'Deletado com sucesso!');
    }
}
