<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EmployeeManagmenetController extends Controller
{
    public $view_path;
    public $slug;
    public $model;

    public function __construct()
    {
        $this->view_path = 'employee-management';
        $this->slug = 'employee';
        $this->model = new Employee();
    }

    public function getListing()
    {
        $data = [
            'listing' => Employee::all(),
            'view_path' => $this->view_path,
            'slug' => $this->slug,
        ];
        return view($this->view_path . '._listing', $data);
    }

    function submitAddForm(Request $request)
    {
        $employee = $this->model;

        $employee->f_name = $request['f_name'];
        $employee->l_name = $request['l_name'];
        $employee->phone_no = $request['phone'];
        $employee->token_id = $request['token_id'];
        $employee->national_id = $request['national_id'];
        $employee->salary = $request['salary'];
        $employee->save();

        $response = [];

        if ($employee) {
            $response['status'] = 'true';
            $response['msg'] = 'Employee added successfully.';
        } else {
            $response['status'] = 'false';
            $response['msg'] = 'some Error occured please try again';
        }
        return response()->json($response);
    }

    function submitEditForm(Request $request)
    {
        $employee = $this->model;
        $employee = $employee::find($request['edit_id']);

        $employee->f_name = $request['f_name'];
        $employee->l_name = $request['l_name'];
        $employee->phone_no = $request['phone'];
        $employee->token_id = $request['token_id'];
        $employee->national_id = $request['national_id'];
        $employee->salary = $request['salary'];
        $employee->save();

        $response = [];

        if ($employee) {
            $response['status'] = 'true';
            $response['msg'] = 'Employee added successfully.';
        } else {
            $response['status'] = 'false';
            $response['msg'] = 'some Error occured please try again';
        }
        return response()->json($response);
    }

    function deleteItem(Request $request)
    {
        $employee = $this->model;
        $employee = $employee::where('id', $request['id'])->delete();
        if ($employee) {
            $response['status'] = 'true';
            $response['msg'] = 'Employee deleted successfully.';
        } else {
            $response['status'] = 'false';
            $response['msg'] = 'some Error occured please try again';
        }
        return response()->json($response);
    }

    function populateEditForm(Request $request)
    {
        $employee = $this->model;
        $formData = $employee::where('id', $request['id'])->first();

        $response = [];
        $response['form_html'] = (string)view($this->view_path . '.editForm')->with('formData', $formData);
        return response()->json($response);
    }
}
