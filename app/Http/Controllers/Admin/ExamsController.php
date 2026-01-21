<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Status;
use Carbon\Carbon;
use App\Services\ExamService;

class ExamsController extends Controller
{
    public $name = 'Exame';
    public $folder = 'admin.pages.exams';
    protected $examService;

    public function __construct(ExamService $examService)
    {
        $this->examService = $examService;
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
        $results = $this->examService->getAllExams($filters);
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
        $validator = Validator::make($result, $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors()->first(), 422);
        }
        $this->examService->createExam($result);
        return response()->json($this->name . ' adicionado com sucesso', 200);
    }

    public function edit($id)
    {
        $result = $this->examService->getExamById($id);
        $statuses = Status::default();
        return view($this->folder . '.form', compact('result', 'statuses'));
    }

    public function update(Request $request, $id)
    {
        $result = $request->all();
        $rules = ['title' => 'required', 'status' => 'required', 'sort_order' => 'required'];
        $validator = Validator::make($result, $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors()->first(), 422);
        }
        $this->examService->updateExam($id, $result);
        return response()->json($this->name . ' atualizado com sucesso', 200);
    }

    public function delete($id)
    {
        $this->examService->deleteExam($id);
        return response()->json($this->name . ' excluído com sucesso', 200);
    }
}

