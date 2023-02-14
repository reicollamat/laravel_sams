<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GuardCrudeControllerRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class GuardCrudeControllerCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class GuardCrudeController extends CrudController
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
        CRUD::setModel(\App\Models\Guard::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/guard');
        CRUD::setEntityNameStrings('guard', 'guards');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->column('first_name');
        $this->crud->column('middle_name');
        $this->crud->column('last_name');
        // $this->crud->addField('birthdate');
        // $this->crud->addField('sex');
        // $this->crud->addField('address');
        // $this->crud->addField('nbi_clearance_id');
        // $this->crud->addField('phone_number');
        // $this->crud->addField('educational_attainment');
        // $this->crud->addField('lesp_id');
        // $this->crud->addField('sss');
        // $this->crud->addField('agency_affiliation_date');
        // $this->crud->addField('nbi_issued_date');



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
        $this->crud->addField('first_name');
        $this->crud->addField('middle_name');
        $this->crud->addField('last_name');
        $this->crud->addField('birthdate');
        $this->crud->addField('sex');
        $this->crud->addField('address');
        $this->crud->addField('nbi_clearance_id');
        $this->crud->addField('phone_number');
        $this->crud->addField('educational_attainment');
        $this->crud->addField('lesp_id');
        $this->crud->addField('sss');
        $this->crud->addField('agency_affiliation_date');
        $this->crud->addField('nbi_issued_date');

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
