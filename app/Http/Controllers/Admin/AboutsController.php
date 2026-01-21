<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Status;
use Carbon\Carbon;
use App\Services\AboutService;

class AboutsController extends Controller
{
    public $name = 'Sobre';
    public $folder = 'admin.pages.abouts';
    protected $aboutService;

    public function __construct(AboutService $aboutService)
    {
        $this->aboutService = $aboutService;
    }

    public function index()
    {
        return view($this->folder . '.index');
    }

    public function load(Request $request)
    {
        // Como só existe um about, buscamos o primeiro disponível
        $results = $this->aboutService->getAllAbouts([]);
        $statuses = Status::default();
        
        return view($this->folder . '.index_load', compact('results', 'statuses'));
    }

    public function create()
    {
        $statuses = Status::default();
        return view($this->folder . '.form', compact('statuses'));
    }

    public function store(Request $request)
    {
        $result = $request->all();
        $rules = ['title' => 'required', 'status' => 'required'];
        $validator = Validator::make($result, $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors()->first(), 422);
        }
        if ($request->hasFile('image_1')) {
            $image = $request->file('image_1');
            $result['image_1'] = $image->store('abouts', 'public');
        }
        if ($request->hasFile('image_2')) {
            $image = $request->file('image_2');
            $result['image_2'] = $image->store('abouts', 'public');
        }
        
        // Processar features
        $features = [];
        $featureItems = $request->input('features', []);
        foreach ($featureItems as $item) {
            if (!empty($item)) {
                $features[] = $item;
            }
        }
        $result['features'] = $features;
        
        // Sort order sempre 0 para único registro
        $result['sort_order'] = 0;
        
        $this->aboutService->createAbout($result);
        return response()->json($this->name . ' adicionado com sucesso', 200);
    }

    public function edit($id)
    {
        $result = $this->aboutService->getAboutById($id);
        $statuses = Status::default();
        return view($this->folder . '.form', compact('result', 'statuses'));
    }

    public function update(Request $request, $id)
    {
        $result = $request->all();
        $rules = ['title' => 'required', 'status' => 'required'];
        $validator = Validator::make($result, $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors()->first(), 422);
        }
        if ($request->hasFile('image_1')) {
            $image = $request->file('image_1');
            $result['image_1'] = $image->store('abouts', 'public');
        }
        if ($request->hasFile('image_2')) {
            $image = $request->file('image_2');
            $result['image_2'] = $image->store('abouts', 'public');
        }
        
        // Processar features
        $features = [];
        $featureItems = $request->input('features', []);
        foreach ($featureItems as $item) {
            if (!empty($item)) {
                $features[] = $item;
            }
        }
        $result['features'] = $features;
        
        // Sort order sempre 0 para único registro
        $result['sort_order'] = 0;
        
        $this->aboutService->updateAbout($id, $result);
        return response()->json($this->name . ' atualizado com sucesso', 200);
    }

    public function delete($id)
    {
        $this->aboutService->deleteAbout($id);
        return response()->json($this->name . ' excluído com sucesso', 200);
    }
}

