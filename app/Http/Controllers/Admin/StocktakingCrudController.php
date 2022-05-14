<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StocktakingRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class StocktakingCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class StocktakingCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Stocktaking::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/stocktaking');
        CRUD::setEntityNameStrings('stocktaking', 'stocktakings');
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
        CRUD::column('employee_id')->type('select')->entity('employee')->name('employee_id')->model('App\Models\Employee')->label('Realizado por');
        CRUD::column('comments')->label('Comentarios');;

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
        CRUD::setValidation(StocktakingRequest::class);

        CRUD::field('date');
        CRUD::field('comments');
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
                    'placeholder' => "Seleccione un producto",
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
