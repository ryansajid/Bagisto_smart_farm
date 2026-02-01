<?php

namespace Webkul\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CowProfile extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cow_profiles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cow_id',
        'breed',
        'birth_date',
        'weight',
        'health_status',
        'photo',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'birth_date' => 'date',
        'weight' => 'decimal:2',
    ];

    /**
     * Generate a unique cow ID.
     *
     * @return string
     */
    public static function generateUniqueID()
    {
        do {
            $uniqueId = 'COW-' . strtoupper(Str::random(6));
        } while (self::where('cow_id', $uniqueId)->exists());

        return $uniqueId;
    }

    /**
     * Get the herd data associated with the cow profile.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function herdData()
    {
        return $this->hasMany(HerdData::class, 'herd_id', 'cow_id');
    }

    /**
     * Get the age of the cow in years.
     *
     * @return int|null
     */
    public function getAgeAttribute()
    {
        if (!$this->birth_date) {
            return null;
        }

        return $this->birth_date->age;
    }

    /**
     * Scope a query to only include healthy cows.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeHealthy($query)
    {
        return $query->where('health_status', 'healthy');
    }

    /**
     * Scope a query to only include sick cows.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSick($query)
    {
        return $query->where('health_status', 'sick');
    }

    /**
     * Scope a query to only include at-risk cows.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAtRisk($query)
    {
        return $query->where('health_status', 'at-risk');
    }
}
