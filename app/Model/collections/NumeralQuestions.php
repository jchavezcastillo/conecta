<?php

namespace App\Model\Collections;

use Illuminate\Database\Eloquent\Model;

class NumeralQuestions extends Model
{
    protected $table = 'numeral_question';
    public $timestamps = false;

    public function scopeAllActives($query)
    {
        return $all_questions = $query
            ->select('id','name', 'description')
            ->where('statusNumeral', '=', 1)//evitamos las eliminadas
            ->get();
    }
    public function scopeAllActivesFromEvent($query,$event_id)
    {
        return $all_questions = $query
            ->select('id','name', 'description')
            ->where('statusNumeral', '=', 1)//evitamos las eliminadas
            ->where('numq_event_id', '=', $event_id)//evitamos las eliminadas
            ->get();
    }
}