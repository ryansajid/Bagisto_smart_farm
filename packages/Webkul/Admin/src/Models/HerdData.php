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
    ];
}
