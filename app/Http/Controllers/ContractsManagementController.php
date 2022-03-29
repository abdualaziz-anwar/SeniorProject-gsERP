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
}
