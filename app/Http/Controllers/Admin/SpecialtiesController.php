<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Status;
use Carbon\Carbon;
use App\Services\SpecialtyService;

class SpecialtiesController extends Controller
{
    public $name = 'Especialidade';
    public $folder = 'admin.pages.specialties';

    protected $specialtyService;

    public function __construct(SpecialtyService $specialtyService)
    {
        $this->specialtyService = $specialtyService;
    }

    public function index()
    {
        return view($this->folder . '.index');
    }

    public function load(Request $request)
    {
        $filters = $request->only(['name', 'status', 'date_range']);
        if (!empty($filters['date_range'])) {
            [$startDate, $endDate] = explode(' até ', $filters['date_range']);
            $filters['start_date'] = Carbon::createFromFormat('d/m/Y', $startDate)->format('Y-m-d');
            $filters['end_date'] = Carbon::createFromFormat('d/m/Y', $endDate)->format('Y-m-d');
        }
        $results = $this->specialtyService->getAllSpecialties($filters);
        return view($this->folder . '.index_load', compact('results'));
    }

    public function create()
    {
        $statuses = Status::default();
        return view($this->folder . '.form', compact('statuses'));
    }

    public function store(Request $request)
    {
        $result = $request->all();
        $rules = ['title' => 'required', 'status' => 'required', 'sort_order' => 'required'];
        $messages = ['title.required' => 'title é obrigatório', 'status.required' => 'status é obrigatório', 'sort_order.required' => 'sort_order é obrigatório'];
        $validator = Validator::make($result, $rules, $messages);
        if ($validator->fails()) {
            return response()->json($validator->errors()->first(), 422);
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('specialties', 'public');
            $result['image'] = $imagePath;
        }
        $this->specialtyService->createSpecialty($result);
        return response()->json($this->name . ' adicionado com sucesso', 200);
    }

    public function edit($id)
    {
        $result = $this->specialtyService->getSpecialtyById($id);
        $statuses = Status::default();
        return view($this->folder . '.form', compact('result', 'statuses'));
    }

    public function update(Request $request, $id)
    {
        $result = $request->all();
        $rules = ['title' => 'required', 'status' => 'required', 'sort_order' => 'required'];
        $messages = ['title.required' => 'title é obrigatório', 'status.required' => 'status é obrigatório', 'sort_order.required' => 'sort_order é obrigatório'];
        $validator = Validator::make($result, $rules, $messages);
        if ($validator->fails()) {
            return response()->json($validator->errors()->first(), 422);
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('specialties', 'public');
            $result['image'] = $imagePath;
        }
        $this->specialtyService->updateSpecialty($id, $result);
        return response()->json($this->name . ' atualizado com sucesso', 200);
    }

    public function delete($id)
    {
        $this->specialtyService->deleteSpecialty($id);
        return response()->json($this->name . ' excluído com sucesso', 200);
    }
}

