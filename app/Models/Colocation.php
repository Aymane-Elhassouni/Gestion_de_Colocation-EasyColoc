<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Colocation extends Model
{
    protected $fillable = ['name','description','status'];
    public function categories():HasMany{
        return $this->hasMany(Category::class);
    }
    public function depenses():HasMany{
        return $this->hasMany(Depense::class);
    }
    public function users():BelongsToMany{
        return $this->belongsToMany(User::class,'user_colocation',
        'colocation_id','user_id')
        ->withPivot('left_at','role_colocation')->withTimestamps();
    }
}
