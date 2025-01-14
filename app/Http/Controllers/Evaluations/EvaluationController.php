<?php

namespace App\Http\Controllers\Evaluations;

use App\Exports\EvaluationsExport;
use App\Exports\EvaluationsMassiveExport;
use App\Http\Controllers\Controller;
use App\Models\Evaluation;
use App\Models\EvaluationAnswer;
use App\Models\QuestionType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class EvaluationController extends Controller
{
    public function index ()
    {
        $user = Auth::user()->load('professional');
        $evaluations = Evaluation::where('professional_id', $user->professional->id)->paginate();
        return Inertia::render('Evaluations/Index', [
            'evaluations' => $evaluations
        ]);
    }

    public function indexAdmin ()
    {
        $evaluations = Evaluation::with('professional.user')->paginate();
        return Inertia::render('Evaluations/Index', [
            'evaluations' => $evaluations
        ]);
    }

    public function quiz() {
        return Inertia::render('Evaluations/Quiz', [
            'sections' => QuestionType::with('questions')->get(),
        ]);
    }

    public function store (Request $request) {
        $data = $request->validate([
            'answers' => 'required'
        ]);
        $protocol = Evaluation::create(['professional_id' => Auth::user()->professional->id]);
        foreach($data['answers'] as $answer){
            EvaluationAnswer::create([
                'evaluation_id' => $protocol->id,
                'question_id' => $answer['question'],
                'value' => $answer['value'],
            ]);
        }
        return response()->json(true);
    }

    public function destroy ($evaluation_id) {
        Evaluation::destroy($evaluation_id);
        $user = Auth::user();
        if ($user->role == 'admin') {
            $evaluations = Evaluation::paginate();
        }else{
            $evaluations = Evaluation::where('professional_id', $user->professional->id)->paginate();
        }   
        return response()->json($evaluations, 200);
    }

    //pdf

    public function export($evaluation_id)
    {
        $evaluation = Evaluation::with('professional.user')->where('id', $evaluation_id)->first();
        $pdf = Pdf::loadView('exportEvaluations', compact('evaluation'));
        return $pdf->stream();
        
    }

    public function export_masive()
    {
        $evaluations = Evaluation::with('professional.user')->get();
        $pdf = Pdf::loadView('exportMassiveEvaluations', compact('evaluations'));
        return $pdf->stream();
    }

    //excel
    public function exportExcel($evaluation_id)
    {
        return Excel::download(new EvaluationsExport($evaluation_id), 'evaluacion.xlsx');
    }

    
    public function exportMassiveExcel()
    {
        return Excel::download(new EvaluationsMassiveExport(), 'evaluaciones.xlsx');
    }
}