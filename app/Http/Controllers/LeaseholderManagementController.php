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
}
