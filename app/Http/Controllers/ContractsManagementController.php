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
}
