<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getFullName()
    {
        return $this->firs_name . " " . $this->last_name;
    }

    public function getAge()
    {
        $thisYear = date('Y');
        return $thisYear - $this->birthyear;
    }
}
