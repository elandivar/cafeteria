<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CashRegisterClosureRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CashRegisterClosureCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CashRegisterClosureCrudController extends CrudController
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
        CRUD::setModel(\App\Models\CashRegisterClosure::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/cash-register-closure');
        CRUD::setEntityNameStrings('Cierre de caja', 'Cierres de caja');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('date')->type('date')->label('Fecha');
        CRUD::column('employee_id')->type('select')->entity('employee')->name('employee_id')->model('App\Models\Employee')->label('Empleado');
        CRUD::column('amount_total_before_tax')->label('Subtotal');
        CRUD::column('amount_tax')->label('IVA');
        CRUD::column('amount_tips')->label('Tips');
        CRUD::column('amount_cash')->label('Efectivo');
        CRUD::column('amount_cc')->label('T.C.');

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
        CRUD::setValidation(CashRegisterClosureRequest::class);

        CRUD::field('date')->label('Fecha de cierre');
        CRUD::field('employee_id')->label('Empleado');
        CRUD::field('amount_initial')->label('Monto apertura');
        CRUD::field('amount_total_before_tax')->label('Subtotal');
        CRUD::field('amount_tax')->label('IVA');
        CRUD::field('amount_tips')->label('Tips');
        CRUD::field('amount_cash')->label('Efectivo');
        CRUD::field('amount_cc')->label('Tarjeta de crédito');

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
