<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Depense extends Model
{
    protected $fillable = ['titre','montant','date','payeur','category'];
    public function colocation():BelongsTo{
        return $this->belongsTo(Colocation::class);
    }
}
