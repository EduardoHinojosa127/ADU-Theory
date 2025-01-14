<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationAnswer extends Model
{
    use HasFactory;

    protected $table = 'evaluation_answers';

    protected $fillable = [
        'evaluation_id',
        'question_id',
        'value'
    ];

    //relations

    public function evaluation() {
        return $this->belongsTo(Evaluation::class);
    }

    public function question () {
        return $this->belongsTo(Question::class);
    }
}
