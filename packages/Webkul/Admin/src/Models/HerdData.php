<?php

namespace Webkul\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class HerdData extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'herd_data';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'herd_id',
        'milk_production',
        'weight_gain',
        'health_status',
        'date',
        'breed_type',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'date' => 'date',
    ];
}
