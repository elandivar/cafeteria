<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class employeeWorkinghours extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employee_id',
        'mon_start',
        'mon_end',
        'tue_start',
        'tue_end',
        'wed_start',
        'wed_end',
        'thu_start',
        'thu_end',
        'fri_start',
        'fri_end',
        'sat_start',
        'sat_end',
        'sun_start',
        'sun_end',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

}
