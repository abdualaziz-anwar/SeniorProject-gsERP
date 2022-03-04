<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GasStationManager;

class GasStationManagerManagementController extends Controller
{
    public $view_path;
    public $slug;
    public $model;


    public function __construct()
    {
        $this->view_path = "gsm-management";
        $this->slug = "gsm";
        $this->model = new GasStationManager();
    }

    // listing for gsm management
    function getListing()
    {
        $gsm = $this->model;
        $data = [
            'listing' => $gsm::all(),
            'view_path' => $this->view_path,
            'slug' => $this->slug,
        ];
        return view($this->view_path . "._listing", $data);
    }
    // ##listing for gsm management

    function submitAddForm(Request $request)
    {

        $gsm = $this->model;
        // request gets from addform
        $gsm->national_id = $request['national_id'];
        $gsm->fname = $request['f_name'];
        $gsm->lname = $request['l_name'];
        $gsm->phone_no = $request['phone'];
        $gsm->email = $request['email'];
        $gsm->password = $request['password'];
        $gsm->g_id = $request['g_id'];
        $gsm->save();

        $response = [];
        if ($gsm) {
            $response['status'] = 'true';
            $response['msg'] = 'Manager added successfully';
        } else {
            $response['status'] = 'false';
            $response['msg'] = 'Some error occur, try again';
        }

        return response()->json($response);
    }
}
