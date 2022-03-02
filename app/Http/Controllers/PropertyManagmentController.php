<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;


class PropertyManagmentController extends Controller
{
    public $view_path;
    public $slug;

    // constructor
    public function __construct()
    {
        $this->view_path = 'property-managment';
        $this->slug = 'property-managment';
    }

    // getting the property data.
    function getListing()
    {

        $data = [
            'allProperty' => Property::all(),
            'view_path' => $this->view_path,
            'slug' => $this->slug,
        ];
        // the ( . ) for the extension.
        return view($this->view_path . '._listing', $data);
    }
    // ##getting the property data.

    // adding form for property.
    function submitAddPropertForm(Request $request)
    {

        $file = $request->file('image');
        $extension = $file->guessClientExtension();
        $name = "item-" . rand(1000000, 9999999) . "." . $extension;
        $desitinationPath = 'images';
        $file->move($desitinationPath, $name);

        $property = new Property();
        $property->p_id = $request['property_id'];
        $property->name = $request['name'];
        $property->image = $desitinationPath . "/" . $name;
        $property->description = $request['description'];
        $property->save();

        $response = [];
        if ($property) {
            $response['status'] = 'true';
            $response['msg'] = 'Property Added Successfully';
        } else {
            $response['status'] = 'false';
            $response['msg'] = 'some Error Ocurred , try again';
        }
        // parsing as json
        return response()->json($response);
    }
    // ##adding form for property.

    // edit property 
    function submitEditPropertForm(Request $request)
    {

        $file = $request->file('image');
        $property = Property::find($request['edit_id']);

        if (isset($file)) {
            $extension = $file->guessClientExtension();
            $name = "item-" . rand(1000000, 9999999) . "." . $extension;
            $desitinationPath = 'images';
            $file->move($desitinationPath, $name);
            $property->image = $desitinationPath . "/" . $name;
        }

        $property->p_id = $request['property_id'];
        $property->name = $request['name'];
        $property->description = $request['description'];

        $response = [];
        if ($property) {
            $response['status'] = 'true';
            $response['msg'] = 'Property Edited Successfuly';
        } else {
            $response['status'] = 'false';
            $response['msg'] = 'some Error Ocurred , try again';
        }
        // parsing as json
        return response()->json($response);
    }
    // ##edit property form

    // delete property
    function deletePropert(Request $request)
    {

        $property = Property::where('id', $request['id'])->delete();

        $response = [];
        if ($property) {
            $response['status'] = 'true';
            $response['msg'] = 'Property Deleted Successfuly';
        } else {
            $response['status'] = 'false';
            $response['msg'] = 'some Error Ocurred , try again';
        }
        // parsing as json
        return response()->json($response);
    }
    // ## delete property

    // for edit form
    function populateEditPropertForm(Request $request)
    {

        $formData = Property::where('id', $request['id'])->first();

        $response = [];
        $response['form_html'] = (string)view($this->view_path . '.editForm')->with('formData', $formData);
        return response()->json($response);
    }
}
