<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leaseholder;
use App\Property;
use App\Contract;
use Illuminate\Support\Facades\DB;



class ContractsManagementController extends Controller
{
    public $view_path;
    public $slug;
    public $model;

    public function __construct()
    {
        $this->view_path = 'contracts-management';
        $this->slug = 'contracts';
        $this->model = new Contract();
    }

    public function getListing()
    {
        $contract = $this->model;
        //join('') - first argument passed to the join method is the name of the table you need to join to
        //contracts is our primary table
        $data = [
            'listing' => $contract::select(DB::raw("contracts.*,contracts.id AS con_id"), "properties.*", "leaseholders.*")
                ->join('properties', 'properties.id', '=', 'contracts.property_id')
                ->join('leaseholders', 'leaseholders.id', '=', 'contracts.leaseholder_id')
                ->get(),
            'properties' => Property::all(),
            'leaseholders' => Leaseholder::all(),
            'view_path' => $this->view_path,
            'slug' => $this->slug,
        ];
        return view($this->view_path . "._listing", $data);
    }

    //------------------------------------

    function submitAddForm(Request $request)
    {
        $contract = $this->model;

        $contract->contract_id = $request['contract_id'];
        $contract->property_id = $request['property_id'];
        $contract->leaseholder_id = $request['leaseholder_id'];
        $contract->from_date = $request['from_date'];
        $contract->to_date = $request['to_date'];
        $contract->save();

        $response = [];
        if ($contract) {
            $response['status'] = 'true';
            $response['msg'] = 'Contract added successfully';
        } else {
            $response['status'] = 'false';
            $response['msg'] = 'Some error occur, try again';
        }
        return response()->json($response);
    }

    //-----------------------------------

    function deleteItem(Request $request)
    {
        $contract = $this->model;
        $contract = $contract::where('id', $request['id'])->delete();

        $response = [];
        if ($contract) {
            $response['status'] = 'true';
            $response['msg'] = 'Contract deleted successfully';
        } else {
            $response['status'] = 'false';
            $response['msg'] = 'Some error occur, try again';
        }
        return response()->json($response);
    }

    function submitEditForm(Request $request)
    {
        $contract = $this->model;
        $contract = $contract::find($request['edit_id']);

        $contract->contract_id = $request['contract_id'];
        $contract->property_id = $request['property_id'];
        $contract->leaseholder_id = $request['leaseholder_id'];
        $contract->from_date = $request['from_date'];
        $contract->to_date = $request['to_date'];
        $contract->save();

        $response = [];
        if ($contract) {
            $response['status'] = 'true';
            $response['msg'] = 'Contract edited successfully';
        } else {
            $response['status'] = 'false';
            $response['msg'] = 'Some error occur, try again';
        }
        return response()->json($response);
    }

    function populateEditForm(Request $request)
    {
        $contract = $this->model;
        $formData = $contract::where('id', $request['id'])->first();

        $properties = Property::all();
        $leaseholders = Leaseholder::all();

        $response = [];
        $response['form_html'] = (string)view($this->view_path . '.editForm')->with(['formData' => $formData, 'properties' => $properties, 'leaseholders' => $leaseholders]);
        return response()->json($response);
    }
}
