<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SupplierRequestProduct extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'supplier_request_id',
        'product_id',
        'qty',
        'unit_cost',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'supplier_request_id' => 'integer',
        'product_id' => 'integer',
        'unit_cost' => 'decimal:2',
    ];

    public function supplierRequest()
    {
        return $this->belongsTo(SupplierRequest::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
