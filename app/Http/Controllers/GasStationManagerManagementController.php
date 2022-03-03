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
    }
}
