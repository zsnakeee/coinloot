<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bonus extends Model
{
    protected $guarded = [];

    public function history(): hasMany
    {
        return $this->hasMany(BonusHistory::class);
    }
}
