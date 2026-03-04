<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Depense extends Model
{
    protected $fillable = ['titre', 'montant', 'date', 'colocations_id', 'categories_id', 'users_id'];
   public function colocation() {
        return $this->belongsTo(Colocation::class, 'colocations_id');
    }

    public function payees() {
        return $this->hasMany(AddPayee::class, 'depenses_id');
    }
}
