<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PaymentRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PaymentCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PaymentCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Payment::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/payment');
        CRUD::setEntityNameStrings('pago proveedor', 'pago proveedores');
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
        CRUD::column('employee_id')->type('select')->entity('employee')->name('employee_id')->model('App\Models\Employee')->label('Pagador');
        CRUD::column('supplier_id')->type('select')->entity('supplier')->name('supplier_id')->model('App\Models\Supplier')->label('Proveedor');
        CRUD::column('chartaccount_id')->type('select')->entity('chartaccount')->name('chartaccount_id')->model('App\Models\ChartAccount')->label('Origen Fondos');
        CRUD::column('amount')->label('Monto');
        CRUD::column('docref');
        CRUD::column('note');

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
        CRUD::setValidation(PaymentRequest::class);

        CRUD::field('date')->label('Fecha de pago')->wrapperAttributes([ 'class' => 'form-group col-md-6' ]);
        CRUD::field('employee_id')->label('Empleado Pagador')->wrapperAttributes([ 'class' => 'form-group col-md-6' ]);
        CRUD::field('chartaccount_id')->label('Origen de Fondos')->wrapperAttributes([ 'class' => 'form-group col-md-6' ]);
        CRUD::field('supplier_id')->label('Proveedor')->wrapperAttributes([ 'class' => 'form-group col-md-6' ]);
        CRUD::field('amount')->label('Cantidad Total Pagada');
        CRUD::field('docref');
        CRUD::field('note');

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
