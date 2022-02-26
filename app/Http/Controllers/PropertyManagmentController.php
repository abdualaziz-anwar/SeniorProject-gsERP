<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;


class PropertyManagmentController extends Controller
{
    public $view_path;
    public $slug;

    // constructor
    public function __construct(){
        $this -> view_path = 'property-managment';
        $this -> slug = 'property-managment';
    }

    // getting the property data.
    function getListing(){

        $data =[
            'allProperty' => Property::all(),
            'view_path' => $this->view_path,
            'slug' => $this->slug,
        ];
        // the ( . ) for the extension.
        return view($this->view_path .'._listing' , $data);

    }   


}
