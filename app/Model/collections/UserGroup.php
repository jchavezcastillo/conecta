<?php

namespace App\Model\Collections;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class UserGroup extends Model
{
    public $table = 'user_group';

    public function scopeGetIdByName($query, $name)
    {
        $like_val = '%' . strtoupper($name) . '%';

        try {
            return $query->select('id as role_id')->where('name', 'LIKE', $like_val)->first()->role_id;
        } catch (\Exception $e) {
            Log::error(get_class($this) . ' Error al obtener query scopeGetIdByName() con el nombre ' . strtoupper($name) . ':::: ' . $e);
            return nullValue();
        }

    }

    public function scopeGetNameById($query, $role_id)
    {
        try {
            return strtolower($query->select('name as role_name')->where('id', '=', $role_id)->first()->role_name);
        } catch (\Exception $e) {
            Log::error(get_class($this) . ' Error al obtener query scopeGetNameById() con el id ' . $role_id . ':::: ' . $e);
            return nullValue();
        }
    }
}
