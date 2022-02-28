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
    // ##getting the property data.
    
    // adding form for property.
    function submitAddPropertForm(Request $request){

        $file = $request -> file('image');
        $extension = $file -> guessClientExtension();
        $name = "item-" . rand(1000000 , 9999999) . "." . $extension;
        $desitinationPath = 'images';
        $file -> move($desitinationPath , $name);

        $property = new Property();
        $property -> p_id = $request['property_id'];
        $property -> name = $request['name'];
        $property -> image = $desitinationPath . "/" . $name;
        $property -> description = $request[description];
        $property -> save();

        $response = [];
        if($property){
            $response['status'] = 'true';
            $response['msg'] = 'Property Added Successfully';
        }
        else{
            $response['status'] = 'false';
            $response['msg'] = 'some Error Ocurred , try again';
        }
        return response() -> json($response);
    }
    // ##adding form for property.
    

}
