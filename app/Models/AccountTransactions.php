<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccountTransactions extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'chartaccount_id',
        'date_transaction',
        'amount',
        'debit',
        'note',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'groupid' => 'integer',
        'chartaccount_id' => 'integer',
        'date_transaction' => 'timestamp',
        'amount' => 'decimal:2',
    ];

    public function chartaccount()
    {
        return $this->belongsTo(ChartAccount::class);
    }
}
