<?php

namespace App\Model\Collections;

use Illuminate\Database\Eloquent\Model;

class InterconnectionZone2 extends Model
{
    protected $table = 'interconnection1_2';
    public $timestamps = false;

    public function scopeZonesOfOne($query, $zone1)
    {
        $all_questions = $query
            ->join('interconnection_zone', 'interconnection1_2.id_inter2', '=', 'interconnection_zone.id')
            ->select('interconnection1_2.id', 'interconnection_zone.name','interconnection1_2.economic_num')
            ->where('interconnection1_2.id_inter1', '=', $zone1)
            ->where('interconnection1_2.status', '!=', 0)
            ->get();
        foreach($all_questions as $question){
            $question->name = $question->name.'-'.$question->economic_num;
        }
        return $all_questions;
    }
}
