<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EmployeeWorkinghoursRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class EmployeeWorkinghoursCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class EmployeeWorkinghoursCrudController extends CrudController
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
        CRUD::setModel(\App\Models\EmployeeWorkinghours::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/employee-workinghours');
        CRUD::setEntityNameStrings('employee workinghours', 'employee workinghours');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        
        CRUD::column('employee_id');
        CRUD::column('mon_start');
        CRUD::column('mon_end');
        CRUD::column('tue_start');
        CRUD::column('tue_end');

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
        CRUD::setValidation(EmployeeWorkinghoursRequest::class);

        CRUD::field('employee_id');
        CRUD::field('mon_start')->wrapperAttributes([ 'class' => 'form-group col-md-6' ]);
        CRUD::field('mon_end')->wrapperAttributes([ 'class' => 'form-group col-md-6' ]);
        CRUD::field('tue_start')->wrapperAttributes([ 'class' => 'form-group col-md-6' ]);
        CRUD::field('tue_end')->wrapperAttributes([ 'class' => 'form-group col-md-6' ]);
        CRUD::field('wed_start')->wrapperAttributes([ 'class' => 'form-group col-md-6' ]);
        CRUD::field('wed_end')->wrapperAttributes([ 'class' => 'form-group col-md-6' ]);
        CRUD::field('thu_start')->wrapperAttributes([ 'class' => 'form-group col-md-6' ]);
        CRUD::field('thu_end')->wrapperAttributes([ 'class' => 'form-group col-md-6' ]);
        CRUD::field('fri_start')->wrapperAttributes([ 'class' => 'form-group col-md-6' ]);
        CRUD::field('fri_end')->wrapperAttributes([ 'class' => 'form-group col-md-6' ]);
        CRUD::field('sat_start')->wrapperAttributes([ 'class' => 'form-group col-md-6' ]);
        CRUD::field('sat_end')->wrapperAttributes([ 'class' => 'form-group col-md-6' ]);
        CRUD::field('sun_start')->wrapperAttributes([ 'class' => 'form-group col-md-6' ]);
        CRUD::field('sun_end')->wrapperAttributes([ 'class' => 'form-group col-md-6' ]);

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
