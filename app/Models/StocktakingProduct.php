<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StocktakingProduct extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'stocktaking_id',
        'product_id',
        'qty',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'stocktaking_id' => 'integer',
        'product_id' => 'integer',
    ];

    public function stocktaking()
    {
        return $this->belongsTo(Stocktaking::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
