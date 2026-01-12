<?php

namespace Webkul\Admin\Http\Controllers;

use Webkul\Admin\Models\HerdData;

class HerdAnalyticsController extends Controller
{
    /**
     * Display the herd analytics dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $herdData = HerdData::all();

        // Hardcoded sample data for visualization
        $milkProductionData = [30, 25, 28, 32, 34, 33, 31];
        $weightGainData = [2.0, 1.5, 1.7, 1.3, 2.2, 1.6, 1.8];

        return view('admin::herd-analytics.index', compact(
            'herdData',
            'milkProductionData',
            'weightGainData'
        ));
    }
}
