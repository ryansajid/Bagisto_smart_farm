<?php

namespace Webkul\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Webkul\Admin\Models\HerdData;

class HerdAnalyticsController extends Controller
{
    /**
     * Display the herd analytics dashboard.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $selectedMonth = $request->input('month', now()->format('m'));
        $selectedYear = $request->input('year', now()->format('Y'));
        $searchAnimalId = $request->input('search_animal_id');

        $herdData = HerdData::all();

        // Filter data by selected month and year using database-level query
        $filteredData = HerdData::whereYear('date', $selectedYear)
            ->whereMonth('date', $selectedMonth)
            ->orderBy('date')
            ->get();

        // Filter individual performance by Animal ID if search is provided
        $individualPerformanceData = $herdData;
        if ($searchAnimalId) {
            $individualPerformanceData = $herdData->where('herd_id', $searchAnimalId);
        }

        // Use database-level aggregation for better performance and accuracy
        $chartData = HerdData::whereYear('date', $selectedYear)
            ->whereMonth('date', $selectedMonth)
            ->selectRaw('
                DATE(date) as day,
                SUM(milk_production) as total_milk,
                AVG(COALESCE(weight_gain, 0)) as avg_weight_gain
            ')
            ->groupBy('day')
            ->orderBy('day')
            ->get()
            ->keyBy('day');

        // Generate data for 30 days starting from the first day of the month
        $startDate = \Carbon\Carbon::createFromDate($selectedYear, $selectedMonth, 1)->startOfMonth();
        $milkProductionData = [];
        $weightGainData = [];
        $labels = [];

        for ($i = 0; $i < 30; $i++) {
            $currentDate = $startDate->copy()->addDays($i);
            $dateKey = $currentDate->format('Y-m-d');
            $labels[] = $currentDate->format('d');

            // Get data from aggregated query or default to 0
            $dayData = $chartData->get($dateKey);
            $milkProductionData[] = $dayData ? (float) $dayData->total_milk : 0;
            $weightGainData[] = $dayData ? round((float) $dayData->avg_weight_gain, 2) : 0;
        }

        return view('admin::herd-analytics.index', compact(
            'herdData',
            'filteredData',
            'milkProductionData',
            'weightGainData',
            'labels',
            'selectedMonth',
            'selectedYear',
            'searchAnimalId',
            'individualPerformanceData'
        ));
    }

    /**
     * Store the herd data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'herd_id' => 'required|string|max:255',
            'date' => 'required|date',
            'milk_production' => 'required|numeric|min:0',
            'weight_gain' => 'nullable|numeric|min:0',
            'health_status' => 'required|in:healthy,at-risk,sick',
            'breed_type' => 'required|string|max:255',
        ]);

        HerdData::create($validated);

        return redirect()->back()->with('success', 'Herd data recorded successfully!');
    }
}
