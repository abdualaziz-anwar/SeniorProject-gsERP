<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmployeeReport;
use App\Employee;
use Illuminate\Support\Facades\DB;


class EmployeeReportManagmentController extends Controller
{
    //
    public $view_path;
    public $slug;
    public $model;

    public function __construct()
    {
        $this->view_path = 'employee-report-managment';
        $this->slug = 'employee-report';
        $this->model = new EmployeeReport();
    }

    function getListing()
    {
        $employee_report = $this->model;
        $data = [
            'listing' => $employee_report::select(DB::raw("employee_reports.*,employee_reports.id AS report_id"), "employees.*")
                ->join('employees', 'employees.id', '=', 'employee_reports.employee_id')->get(),
            'employees' => Employee::all(),
            'view_path' => $this->view_path,
            'slug' => $this->slug,
        ];

        return view($this->view_path . '._listing', $data);
    }

    function submitAddForm(Request $request)
    {
        $employee_report = $this->model;
        $employee_report->employee_id = $request['employee_id'];
        $employee_report->fuel_type = $request['fuel_type'];
        $employee_report->sales = $request['sales'];
        $employee_report->total = $request['total'];
        $employee_report->pump_capacity = $request['pump_capacity'];
        $employee_report->report_date = $request['report_date'];
        $employee_report->save();

        $response = [];
        if ($employee_report) {
            $response['status'] = 'true';
            $response['msg'] = 'Employee Report added successfully';
        } else {
            $response['status'] = 'false';
            $response['msg'] = 'Some error occur, try again';
        }
        return response()->json($response);
    }


    function submitEditForm(Request $request)
    {
        $employee_report = $this->model;
        $employee_report = $employee_report::find($request['edit_id']);

        $employee_report->employee_id = $request['employee_id'];
        $employee_report->fuel_type = $request['fuel_type'];
        $employee_report->sales = $request['sales'];
        $employee_report->total = $request['total'];
        $employee_report->pump_capacity = $request['pump_capacity'];
        $employee_report->report_date = $request['report_date'];
        $employee_report->save();

        $response = [];
        if ($employee_report) {
            $response['status'] = 'true';
            $response['msg'] = 'Report Edited successfully';
        } else {
            $response['status'] = 'false';
            $response['msg'] = 'Some error occur, try again';
        }
        return response()->json($response);
    }

    function deleteItem(Request $request)
    {
        $employee_report = $this->model;
        $employee_report = $employee_report::where('id', $request['id'])->delete();
        $response = [];
        if ($employee_report) {
            $response['status'] = 'true';
            $response['msg'] = 'Employee Report deleted successfully';
        } else {
            $response['status'] = 'false';
            $response['msg'] = 'Some error occur, try again';
        }
        return response()->json($response);
    }

    function populateEditForm(Request $request)
    {
        $employee_report = $this->model;
        $formData = $employee_report::where('id', $request['id'])->first();
        $employees =  Employee::all();
        $response = [];
        $response['form_html'] = (string)view($this->view_path . '.editForm')->with(['formData' => $formData, 'employees' => $employees]);
        return response()->json($response);
    }
}
