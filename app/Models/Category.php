<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    protected $fillable = ['name','description'];

    public function colocation():BelongsTo{
        return $this->belongsTo(Colocation::class);
    }
}
