<?php

namespace App\Http\Controllers;

use App\Employee;
use App\EmployeeReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class AdminEmployeeReportManagementController extends Controller
{
    //
    public $view_path;
    public $slug;
    public $model;

    public function __construct()
    {
        $this->view_path = 'admin-employee-report-management';
        $this->slug = 'admin-employee-report';
        $this->model = new Employee();
    }

    function getListing()
    {
        $start_date = date("Y-m-d", strtotime('first day of this month', time()));
        $end_date = date("Y-m-d");

        $data = [
            'listing' => Employee::select('employees.*', DB::raw("( SELECT COUNT(*)
                                FROM employee_reports where employee_id = employees.id and employee_reports.report_date >= '$start_date' and employee_reports.report_date <= '$end_date'
                                ) AS total_reports"))
                ->get(),
            'employees' => Employee::all(),
            'view_path' => $this->view_path,
            'slug' => $this->slug,
        ];

        return view($this->view_path . '._listing', $data);
    }


    function getSingleEmployeeReport($emp_id)
    {
        if (!empty($_GET['start_date']) && !empty($_GET['end_date'])) {
            $start_date = $_GET['start_date'];
            $end_date = $_GET['end_date'];
        } else {
            $start_date = date("Y-m-d", strtotime('first day of this month', time()));
            $end_date = date("Y-m-d");
        }

        $data = [
            'reportListing' => EmployeeReport::where('employee_id', $emp_id)->where('report_date', '>=', $start_date)->where('report_date', '<=', $end_date)->get(),
            'employee' => Employee::find($emp_id),
            'view_path' => $this->view_path,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'slug' => $this->slug,
        ];

        return view($this->view_path . '._singleEmployeeReport', $data);
    }

    function downloadReport()
    {
        $emp_id = $_GET['emp_id'];
        if (!empty($_GET['start_date']) && !empty($_GET['end_date'])) {
            $start_date = $_GET['start_date'];
            $end_date = $_GET['end_date'];
        } else {
            $start_date = date("Y-m-d", strtotime('first day of this month', time()));
            $end_date = date("Y-m-d");
        }

        $data = [
            'reportListing' => EmployeeReport::where('employee_id', $emp_id)->where('report_date', '>=', $start_date)->where('report_date', '<=', $end_date)->get(),
            'employee' => Employee::find($emp_id),
            'view_path' => $this->view_path,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'slug' => $this->slug,
        ];

        view()->share('data', $data);
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView($this->view_path . '._DownloadEmployeeReport', $data);
        // download PDF file with download method
        return $pdf->download('_EmployeeReport-' . $start_date . '-to-' . $end_date . '.pdf');
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
