<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

class CityHall extends Model
{
    use HasFactory,
        SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'phone_number',
        'population',
        'city_id',
    ];


    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class);
    }
}
