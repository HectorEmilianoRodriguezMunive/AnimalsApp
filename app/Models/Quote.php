<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Service;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Quote extends Model
{

    protected $guarded = [];
    protected $fillable = [
        'date_quote',
        'subtotal',
        'IVA',
        'total',
        'description',
        'user_id'
    ];

    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function services():BelongsToMany{
        return $this->belongsToMany(Service::class);
    }

}
