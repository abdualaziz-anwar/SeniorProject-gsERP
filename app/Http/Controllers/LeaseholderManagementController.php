<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leaseholder;

class LeaseholderManagementController extends Controller
{

    public $view_path;
    public $slug;
    public $model;

    public function __construct()
    {
        $this->view_path = 'leaseholder-management';
        $this->slug = 'leaseholder';
        $this->model = new Leaseholder();
    }

    function getListing()
    {
        $data = [
            'allLeaseholder' => Leaseholder::all(),
            'view_path' => $this->view_path,
            'slug' => $this->slug
        ];
        return view($this->view_path . '._listing', $data);
    }
    // adding for leaeholder
    public function submitAddForm(Request $request)
    {
        $leaseholder = $this->model;
        $leaseholder->national_id = $request['national_id'];
        $leaseholder->fname = $request['f_name'];
        $leaseholder->lname = $request['l_name'];
        $leaseholder->email = $request['email'];
        $leaseholder->phone_no = $request['phone'];
        $leaseholder->duration_of = $request['duration_of'];
        $leaseholder->save();

        $response = [];
        if ($leaseholder) {
            $response['status'] = 'true';
            $response['msg'] = 'leaseholder added successfully';
        } else {
            $response['status'] = 'false';
            $response['msg'] = 'Some error occur, try again';
        }
        return response()->json($response);
    }
    // ##adding for leaeholder

    function submitEditForm(Request $request)
    {
        $leaseholder = $this->model;
        $leaseholder = $leaseholder::find($request['edit_id']);
        $leaseholder->national_id = $request['national_id'];
        $leaseholder->fname = $request['f_name'];
        $leaseholder->lname = $request['l_name'];
        $leaseholder->email = $request['email'];
        $leaseholder->phone_no = $request['phone'];
        $leaseholder->duration_of = $request['duration_of'];
        $leaseholder->save();

        $response = [];
        if ($leaseholder) {
            $response['status'] = 'true';
            $response['msg'] = 'Leaseholder Edited successfully';
        } else {
            $response['status'] = 'false';
            $response['msg'] = 'Some error occur, try again';
        }
        return response()->json($response);
    }

    function deleteItem(Request $request)
    {
        $leaseholder = $this->model;
        $leaseholder = $leaseholder::where('id', $request['id'])->delete();
        $response = [];
        if ($leaseholder) {
            $response['status'] = 'true';
            $response['msg'] = 'Leaseholder deleted successfully';
        } else {
            $response['status'] = 'false';
            $response['msg'] = 'Some error occur, try again';
        }
        return response()->json($response);
    }

    function populateEditForm(Request $request)
    {
        $leaseholder = $this->model;
        $formData = $leaseholder::where('id', $request['id'])->first();

        $response = [];
        $response['form_html'] = (string)view($this->view_path . '.editForm')->with('formData', $formData);
        return response()->json($response);
    }
}
