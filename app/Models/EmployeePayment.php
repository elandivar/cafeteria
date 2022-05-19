<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
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
        'employee_paid',
        'supplier_id',
        'chartaccount_id',
        'amount',
        'docref',
        'note',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'date' => 'timestamp',
        'employee_paid' => 'integer',
        'supplier_id' => 'integer',
        'chartaccount_id' => 'integer',
        'transaction' => 'integer',
        'amount' => 'decimal:2',
    ];

    public function employeepaid()
    {
        return $this->belongsTo(Employee::class);
    }

    public function chartaccount()
    {
        return $this->belongsTo(ChartAccount::class);
    }

    public function setAmountAttribute($value)
    {
        $obj = new AccountTransactions();
        $obj->chartaccount_id = 1;
        $obj->date_transaction = $this->attributes['date'];
        $obj->amount = $value;
        $obj->debit = 'D';
        $obj->save();

        $groupid = $obj->id;
        $objTrans = AccountTransactions::where('id', '=', $groupid)->update(['groupid' => $groupid]);

        $obj = new AccountTransactions();
        $obj->groupid = $groupid;
        $obj->chartaccount_id = 5;
        $obj->date_transaction = $this->attributes['date'];
        $obj->amount = $value;
        $obj->debit = 'C';
        $obj->save();

        $this->attributes['transaction'] = $groupid;
        $this->attributes['amount'] = $value;

    }
}