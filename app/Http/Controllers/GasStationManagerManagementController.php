<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GasStationManager;
use Facade\FlareClient\Http\Response;

class GasStationManagerManagementController extends Controller
{
    public $view_path;
    public $slug;
    public $model;

    public function __construct()
    {
        $this->view_path = 'gsm-management';
        $this->slug = 'gsm';
        $this->model = new GasStationManager();
    }

    function getListing()
    {
        $gsm = $this->model;
        $data = [
            'listing' => $gsm::all(),
            'view_path' => $this->view_path,
            'slug' => $this->slug,
        ];

        return view($this->view_path . '._listing', $data);
    }

    function submitAddForm(Request $request)
    {
        $gsm = $this->model;
        $gsm->national_id = $request['national_id'];
        $gsm->fname = $request['f_name'];
        $gsm->lname = $request['l_name'];
        $gsm->g_id = $request['g_id'];
        $gsm->phone_no = $request['phone'];
        $gsm->email = $request['email'];
        $gsm->password = $request['password'];
        $gsm->save();

        $response = [];
        if ($gsm) {
            $response['status'] = 'true';
            $response['msg'] = 'Employee added successfully';
        } else {
            $response['status'] = 'false';
            $response['msg'] = 'Some error occur, try again';
        }
        return response()->json($response);
    }

    function submitEditForm(Request $request)
    {
        $gsm = $this->model;
        $gsm = $gsm::find($request['edit_id']);
        $gsm->national_id = $request['national_id'];
        $gsm->fname = $request['f_name'];
        $gsm->lname = $request['l_name'];
        $gsm->email = $request['email'];
        $gsm->phone_no = $request['phone'];
        if (!empty($request['password'])) {
            $gsm->password = $request['password'];
        }
        $gsm->g_id = $request['g_id'];
        $gsm->save();

        $response = [];
        if ($gsm) {
            $response['status'] = 'true';
            $response['msg'] = 'GasStationManager Edited successfully';
        } else {
            $response['status'] = 'false';
            $response['msg'] = 'Some error occur, try again';
        }
        return response()->json($response);
    }

    function deleteItem(Request $request)
    {
        $gsm = $this->model;
        $gsm = $gsm::where('id', $request['id'])->delete();
        $response = [];
        if ($gsm) {
            $response['status'] = 'true';
            $response['msg'] = 'GasStationManager deleted successfully';
        } else {
            $response['status'] = 'false';
            $response['msg'] = 'Some error occur, try again';
        }
        return response()->json($response);
    }

    function populateEditForm(Request $request)
    {
        $gsm = $this->model;
        $formData = $gsm::where('id', $request['id'])->first();

        $response = [];
        $response['form_html'] = (string)view($this->view_path . '.editForm')->with('formData', $formData);
        return response()->json($response);
    }
}
