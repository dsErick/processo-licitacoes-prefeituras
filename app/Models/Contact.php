<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

class Contact extends Model
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
        'mandate_ends_at',
        'contact_type_id',
        'city_hall_id',
    ];


    public function contactType(): BelongsTo
    {
        return $this->belongsTo(ContactType::class);
    }

    public function cityHall(): BelongsTo
    {
        return $this->belongsTo(CityHall::class);
    }

    public function activities(): HasMany
    {
        return $this->hasMany(Activity::class);
    }
}
