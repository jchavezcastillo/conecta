<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Illuminate\Support\Facades\Log as Log;
use \Carbon\Carbon as DateFormatter;

class User extends Model implements AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    protected $table = 'users';
    protected $guarded = [''];
    public $timestamps = true;

    public function scopeEvaluateUser ($query, $id, $status) {
        $obj = $query->find($id);
        $obj->status = $status;
        if ($status == 1) {
            $pwd = str_random(8);
            $obj->password = $pwd;
        }
        $obj->updated_at = DateFormatter::now()->toDateTimeString();
        $obj->save();

        return $obj;
    }

    public function scopeSearchUser($query, $user_id){
        return $response = $query
            -> where('id', '=', $user_id)
            -> where('status', '=', 1)
            -> first();
    }

}