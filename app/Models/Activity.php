<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Activity extends Model
{
    use HasFactory,
        SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'scheduled_at',
        'observation',
        'pending',
        'status',
        'activity_type_id',
        'receptivity_id',
        'contact_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'scheduled_at' => 'datetime'
    ];


    public function activityType(): BelongsTo
    {
        return $this->belongsTo(ActivityType::class);
    }

    public function receptivity(): BelongsTo
    {
        return $this->belongsTo(Receptivity::class);
    }

    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }
}
