<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SupplierRequestRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SupplierRequestCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SupplierRequestCrudController extends CrudController
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
        CRUD::setModel(\App\Models\SupplierRequest::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/supplier-request');
        CRUD::setEntityNameStrings('supplier request', 'supplier requests');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('supplier_id');
        CRUD::column('order_date');
        CRUD::column('received_at');
        CRUD::column('employee_id');


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
        CRUD::setValidation(SupplierRequestRequest::class);

        CRUD::field('supplier_id');
        CRUD::field('received_at');
        CRUD::field('employee_id');
        CRUD::addField([   // repeatable
            'name'  => 'products',
            'label' => 'Produtos(s)',
            'type'  => 'repeatable',
            'fields' => [
                [
                    'name' => 'product_id', 'type' => 'select2', 'label' => 'Producto',
                    'attribute' => "name",
                    'model' => "App\Models\Product",
                    'entity' => 'products',
                    'placeholder' => "Selecione o Produto",
                    'wrapper'  => [
                        'class' => 'form-group col-md-6'
                    ],
                ],
                [
                    'name'  => 'quantity',
                    'label' => "Cantidad",
                    'type'  => 'text',
                    'wrapper'  => [
                        'class' => 'form-group col-md-6'
                    ],
                ],
            ],
            // optional
            'new_item_label'  => 'Adicionar',
            'init_rows' => 1,
            'min_rows' => 1,
            'max_rows' => 3,

        ],);

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
