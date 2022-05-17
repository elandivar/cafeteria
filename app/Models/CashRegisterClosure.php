<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CashRegisterClosure extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date',
        'employee_id',
        'amount_initial',
        'amount_total_before_tax',
        'amount_tax',
        'amount_tips',
        'amount_cash',
        'amount_cc',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'date' => 'timestamp',
        'employee_id' => 'integer',
        'amount_initial' => 'decimal:2',
        'amount_total_before_tax' => 'decimal:2',
        'amount_tax'  => 'decimal:2',
        'amount_tips' => 'decimal:2',
        'amount_cash' => 'decimal:2',
        'amount_cc'   => 'decimal:2',
        'transaction' => 'integer',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function setAmountCcAttribute($value) 
    {

        $obj = new AccountTransactions();
        $obj->chartaccount_id = 1;
        $obj->date_transaction = $this->attributes['date'];
        $obj->amount = $this->attributes['amount_cash'];
        $obj->debit = 'C';
        $obj->save();

        $obj = new AccountTransactions();
        $obj->chartaccount_id = 2;
        $obj->date_transaction = $this->attributes['date'];
        $obj->amount = $this->attributes['amount_tips'];
        $obj->debit = 'C';
        $obj->save();

        $this->attributes['amount_cc'] = $value;
    }
}
