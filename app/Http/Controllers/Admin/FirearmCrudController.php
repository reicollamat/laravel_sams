<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FirearmRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class FirearmCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class FirearmCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Firearm::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/firearm');
        CRUD::setEntityNameStrings('firearm', 'firearms');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->setColumns(['kind','caliber','fas_SN','validity_fas_license']);
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

        $this->crud->addField(['name' => 'kind',
        'type' => 'select_from_array',
        'label' => "kind",
        'options'=> ['pistol'=>'Pistol','shotgun'=>'Shotgun'],
        'default' =>'pistol']);

        $this->crud->addField(['name' => 'caliber',
        'type' => 'text',
        'label' => "caliber"]);

        $this->crud->addField(['name' => 'fas_SN',
        'type' => 'text',
        'label' => "fas_SN"]);

        $this->crud->addField(['name'  => 'validity_fas_license',
        'label' => 'validity_fas_license',
        'type'  => 'date']);

        CRUD::field('kind');
        // CRUD::field('caliber');
        // CRUD::field('fas_SN');
        // CRUD::field('validity_fas_license');

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
