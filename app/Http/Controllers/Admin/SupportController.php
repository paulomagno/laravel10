<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupportRequest;
use App\Models\Support;
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

    public function store(StoreUpdateSupportRequest $request, Support $support)
    {
        $data = $request->validated();
        $data['status'] = 'a';
        $support->create($data);
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

    public function update(StoreUpdateSupportRequest $request, Support $support, int $id)
    {
        if (!$support = $support->find($id)) {
            return back();
        }
        
        $data = $request->only([
            'subject',
            'body'
        ]);
        
        $support->update($data);
        
        return redirect()->route('supports.index');
    }

    public function destroy(int $id)
    {
        $this->service->delete($id);
        
        return redirect()->route('supports.index');
    }
}
