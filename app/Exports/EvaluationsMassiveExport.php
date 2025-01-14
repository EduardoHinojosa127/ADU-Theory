<?php

namespace App\Exports;

use App\Models\Evaluation;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class EvaluationsMassiveExport implements FromView
{

    /**
     * Retorna una vista para la exportación.
     *
     * @return View
     */
    public function view(): View
    {
        $evaluations = Evaluation::with('professional.user')->get();

        return view('exports.evaluationMassive', [
            'evaluations' => $evaluations
        ]);
    }
}
