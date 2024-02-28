<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
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
        $supports = $this->service->getAll($request->filter);
       
        return view('admin/supports/index', [
            'supports' => $supports
        ]);
    }

    public function create()
    {
        return view('admin/supports/create');
    }

    public function store(StoreUpdateSupportRequest $request)
    {
        $this->service->new(CreateSupportDTO::makeFromRequest($request));
        
        return redirect()->route('supports.index');
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
        
        return redirect()->route('supports.index');
    }

    public function destroy(int $id)
    {
        $this->service->delete($id);
        
        return redirect()->route('supports.index');
    }
}
