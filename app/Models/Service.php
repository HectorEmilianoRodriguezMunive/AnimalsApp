<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Service extends Model
{
    protected $guarded = [];
    protected $fillable = [
        'name',
        'description',
        'cost'
    ];

    public function quotes():BelongsToMany{
       return $this->belongsToMany(Quote::class);
    }
}
