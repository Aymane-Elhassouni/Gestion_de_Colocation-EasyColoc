<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UserColocation extends Pivot
{
    protected $table = 'user_colocation';
    protected $fillable = ['left_at','role_colocation','user_id','colocation_id'];
}
