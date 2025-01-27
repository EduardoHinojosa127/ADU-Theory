<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table =  'questions';

    protected $fillable = [
        'name',
        'question_type_id'
    ];

    //relations
    public function question_type() {
        return $this->belongsTo(QuestionType::class);
    }
}
