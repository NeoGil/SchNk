<?php

namespace App\Modules\Admin\Dashboard\Controllers;

use App\Modules\Admin\Dashboard\Classes\Base;
use App\Modules\Admin\Dashboard\Services\DashboardService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Base
{
    public function __construct(DashboardService $dashboardService)
    {
        parent::__construct();
        $this->service = $dashboardService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $this->title = __("admin.dashboard_title_page");
        $this->content  = view('Admin::Dashboard.index')->with([
            'title' => $this->title,
            'activity_C' => $this->service->getCourses(),
            'activity_M' => $this->service->getMaterilals(),
            'activity_Methods' => $this->service->getMethods(),
        ])->render();

        return $this->renderOutput();
    }

}
