<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AccountTransactionsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class AccountTransactionsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class AccountTransactionsCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\AccountTransactions::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/account-transactions');
        CRUD::setEntityNameStrings('transacción contable', 'transacciones contables');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('chartaccount_id')->type('select')->entity('chartaccount')->name('chartaccount_id')->model('App\Models\ChartAccount')->label('Cuenta');
        CRUD::column('date_transaction')->type('date')->label('Fecha');
        CRUD::column('amount')->label('Monto');
        CRUD::column('debit')->label('Debito/Crédito');
        CRUD::column('note')->label('Notas');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(AccountTransactionsRequest::class);

        CRUD::field('chartaccount_id');
        CRUD::field('date_transaction')->label('Fecha Transacción');
        CRUD::field('amount')->label('Monto');
        CRUD::field('debit')->label('Debito/Credito');
        CRUD::field('note')->label('Notas');

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
