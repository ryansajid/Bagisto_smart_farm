<x-admin::layouts>
    <x-slot:title>
        {{ __('admin::app.herd-analytics.title') }}
    </x-slot>

    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
            <div>
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white">
                    {{ __('admin::app.herd-analytics.title') }}
                </h1>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Monitor your herd's health, milk production, and performance metrics
                </p>
            </div>
        </div>
    </div>

    <!-- Stat Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
        <!-- Overall Herd Health -->
        <div class="group relative overflow-hidden rounded-xl bg-gradient-to-br from-green-50 to-green-100 p-5 shadow-sm ring-1 ring-green-200 transition-all duration-300 hover:shadow-lg hover:ring-2 dark:from-green-900/20 dark:to-green-800/20 dark:ring-green-800">
            <div class="absolute right-0 top-0 -mr-4 -mt-4 h-24 w-24 rounded-full bg-green-500/10 transition-all duration-300 group-hover:scale-110"></div>
            <div class="relative">
                <div class="mb-3 flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-green-500 to-green-600 text-white shadow-lg shadow-green-500/30">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                </div>
                <div class="mb-1 text-sm font-medium text-gray-500 dark:text-gray-400">Overall Herd Health</div>
                <div class="text-2xl font-bold text-gray-900 dark:text-white">
                    @if($herdData->where('health_status', 'healthy')->count() > 0)
                        <span class="text-green-600 dark:text-green-400">Good</span>
                    @else
                        <span class="text-orange-600 dark:text-orange-400">Needs Attention</span>
                    @endif
                </div>
            </div>
        </div>

        <!-- Avg. Daily Milk Production -->
        <div class="group relative overflow-hidden rounded-xl bg-gradient-to-br from-blue-50 to-blue-100 p-5 shadow-sm ring-1 ring-blue-200 transition-all duration-300 hover:shadow-lg hover:ring-2 dark:from-blue-900/20 dark:to-blue-800/20 dark:ring-blue-800">
            <div class="absolute right-0 top-0 -mr-4 -mt-4 h-24 w-24 rounded-full bg-blue-500/10 transition-all duration-300 group-hover:scale-110"></div>
            <div class="relative">
                <div class="mb-3 flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 text-white shadow-lg shadow-blue-500/30">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                    </svg>
                </div>
                <div class="mb-1 text-sm font-medium text-gray-500 dark:text-gray-400">Avg. Daily Milk Production</div>
                <div class="text-2xl font-bold text-gray-900 dark:text-white">
                    {{ number_format($herdData->avg('milk_production'), 1) }} <span class="text-base font-normal text-gray-500">L</span>
                </div>
            </div>
        </div>

        <!-- Weight Gain Rate -->
        <div class="group relative overflow-hidden rounded-xl bg-gradient-to-br from-cyan-50 to-cyan-100 p-5 shadow-sm ring-1 ring-cyan-200 transition-all duration-300 hover:shadow-lg hover:ring-2 dark:from-cyan-900/20 dark:to-cyan-800/20 dark:ring-cyan-800">
            <div class="absolute right-0 top-0 -mr-4 -mt-4 h-24 w-24 rounded-full bg-cyan-500/10 transition-all duration-300 group-hover:scale-110"></div>
            <div class="relative">
                <div class="mb-3 flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-cyan-500 to-cyan-600 text-white shadow-lg shadow-cyan-500/30">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                </div>
                <div class="mb-1 text-sm font-medium text-gray-500 dark:text-gray-400">Weight Gain Rate</div>
                <div class="text-2xl font-bold text-gray-900 dark:text-white">
                    {{ number_format($herdData->avg('weight_gain'), 2) }} <span class="text-base font-normal text-gray-500">kg/day</span>
                </div>
            </div>
        </div>

        <!-- Calving Rate -->
        <div class="group relative overflow-hidden rounded-xl bg-gradient-to-br from-orange-50 to-orange-100 p-5 shadow-sm ring-1 ring-orange-200 transition-all duration-300 hover:shadow-lg hover:ring-2 dark:from-orange-900/20 dark:to-orange-800/20 dark:ring-orange-800">
            <div class="absolute right-0 top-0 -mr-4 -mt-4 h-24 w-24 rounded-full bg-orange-500/10 transition-all duration-300 group-hover:scale-110"></div>
            <div class="relative">
                <div class="mb-3 flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-orange-500 to-orange-600 text-white shadow-lg shadow-orange-500/30">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="mb-1 text-sm font-medium text-gray-500 dark:text-gray-400">Calving Rate</div>
                <div class="text-2xl font-bold text-gray-900 dark:text-white">
                    @php
                        $healthyCount = $herdData->where('health_status', 'healthy')->count();
                        $atRiskCount = $herdData->where('health_status', 'at-risk')->count();
                        $sickCount = $herdData->where('health_status', 'sick')->count();
                        $totalCount = $herdData->count();
                        $calvingRate = $totalCount > 0 ? round(($healthyCount / $totalCount) * 100, 1) : 0;
                    @endphp
                    {{ $calvingRate }}<span class="text-base font-normal text-gray-500">%</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Milk Production Chart -->
        <div class="box-shadow rounded-2xl bg-white p-6 dark:bg-gray-900">
            <div class="mb-6 flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Milk Production</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Daily milk output in liters</p>
                </div>
                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-green-100 text-green-600 dark:bg-green-900/30 dark:text-green-400">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3-3M4 17l3-3 3-3m-3 3h14"></path>
                    </svg>
                </div>
            </div>
            <div class="h-[280px] w-full">
                <canvas id="milkProductionChart"></canvas>
            </div>
        </div>

        <!-- Weight Gain Chart -->
        <div class="box-shadow rounded-2xl bg-white p-6 dark:bg-gray-900">
            <div class="mb-6 flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Weight Gain</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Daily weight gain in kg</p>
                </div>
                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-cyan-100 text-cyan-600 dark:bg-cyan-900/30 dark:text-cyan-400">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
            </div>
            <div class="h-[280px] w-full">
                <canvas id="weightGainChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Herd Health Summary -->
    <div class="box-shadow mb-8 rounded-2xl bg-white p-6 dark:bg-gray-900">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Herd Health Summary</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Current health status distribution</p>
            </div>
        </div>
        @php
            $healthyCount = $herdData->where('health_status', 'healthy')->count();
            $atRiskCount = $herdData->where('health_status', 'at-risk')->count();
            $sickCount = $herdData->where('health_status', 'sick')->count();
        @endphp
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
            <div class="flex items-center gap-4 rounded-xl bg-green-50 p-4 ring-1 ring-green-100 dark:bg-green-900/10 dark:ring-green-800">
                <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-gradient-to-br from-green-500 to-green-600 text-white shadow-lg shadow-green-500/30">
                    <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <div>
                    <div class="text-sm font-medium text-green-600 dark:text-green-400">Healthy</div>
                    <div class="text-3xl font-bold text-gray-900 dark:text-white">{{ $healthyCount }}</div>
                </div>
            </div>
            <div class="flex items-center gap-4 rounded-xl bg-orange-50 p-4 ring-1 ring-orange-100 dark:bg-orange-900/10 dark:ring-orange-800">
                <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-gradient-to-br from-orange-500 to-orange-600 text-white shadow-lg shadow-orange-500/30">
                    <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                </div>
                <div>
                    <div class="text-sm font-medium text-orange-600 dark:text-orange-400">At Risk</div>
                    <div class="text-3xl font-bold text-gray-900 dark:text-white">{{ $atRiskCount }}</div>
                </div>
            </div>
            <div class="flex items-center gap-4 rounded-xl bg-red-50 p-4 ring-1 ring-red-100 dark:bg-red-900/10 dark:ring-red-800">
                <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-gradient-to-br from-red-500 to-red-600 text-white shadow-lg shadow-red-500/30">
                    <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </div>
                <div>
                    <div class="text-sm font-medium text-red-600 dark:text-red-400">Sick</div>
                    <div class="text-3xl font-bold text-gray-900 dark:text-white">{{ $sickCount }}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Individual Performance Table -->
    <div class="box-shadow rounded-2xl bg-white p-6 dark:bg-gray-900">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Individual Performance</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Detailed performance metrics per animal</p>
            </div>
        </div>
        <div class="overflow-x-auto rounded-xl ring-1 ring-gray-200 dark:ring-gray-800">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50 dark:bg-gray-800">
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Animal ID</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Milk (L/day)</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Weight Gain (kg/day)</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Health Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                    <tr class="transition-colors duration-200 hover:bg-gray-50 dark:hover:bg-gray-800/50">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400">
                                    <span class="text-sm font-bold">C1</span>
                                </div>
                                <span class="font-medium text-gray-900 dark:text-white">COW-001</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-700 dark:text-gray-300">32.5</td>
                        <td class="px-6 py-4 text-gray-700 dark:text-gray-300">1.8</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center rounded-full bg-green-100 px-3 py-1 text-sm font-semibold text-green-700 ring-1 ring-green-600/20 dark:bg-green-900/30 dark:text-green-400 dark:ring-green-800/30">
                                Healthy
                            </span>
                        </td>
                    </tr>
                    <tr class="transition-colors duration-200 hover:bg-gray-50 dark:hover:bg-gray-800/50">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400">
                                    <span class="text-sm font-bold">C2</span>
                                </div>
                                <span class="font-medium text-gray-900 dark:text-white">COW-002</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-700 dark:text-gray-300">28.3</td>
                        <td class="px-6 py-4 text-gray-700 dark:text-gray-300">1.5</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center rounded-full bg-green-100 px-3 py-1 text-sm font-semibold text-green-700 ring-1 ring-green-600/20 dark:bg-green-900/30 dark:text-green-400 dark:ring-green-800/30">
                                Healthy
                            </span>
                        </td>
                    </tr>
                    <tr class="transition-colors duration-200 hover:bg-gray-50 dark:hover:bg-gray-800/50">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400">
                                    <span class="text-sm font-bold">C3</span>
                                </div>
                                <span class="font-medium text-gray-900 dark:text-white">COW-003</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-700 dark:text-gray-300">24.7</td>
                        <td class="px-6 py-4 text-gray-700 dark:text-gray-300">1.2</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center rounded-full bg-orange-100 px-3 py-1 text-sm font-semibold text-orange-700 ring-1 ring-orange-600/20 dark:bg-orange-900/30 dark:text-orange-400 dark:ring-orange-800/30">
                                At Risk
                            </span>
                        </td>
                    </tr>
                    <tr class="transition-colors duration-200 hover:bg-gray-50 dark:hover:bg-gray-800/50">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400">
                                    <span class="text-sm font-bold">C4</span>
                                </div>
                                <span class="font-medium text-gray-900 dark:text-white">COW-004</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-700 dark:text-gray-300">30.1</td>
                        <td class="px-6 py-4 text-gray-700 dark:text-gray-300">1.6</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center rounded-full bg-green-100 px-3 py-1 text-sm font-semibold text-green-700 ring-1 ring-green-600/20 dark:bg-green-900/30 dark:text-green-400 dark:ring-green-800/30">
                                Healthy
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    @pushOnce('scripts')
        <script type="module" src="{{ bagisto_asset('js/chart.js') }}"></script>
        <script type="module">
            // Debug logging
            console.log('=== HERD ANALYTICS DEBUG ===');
            console.log('Chart object available:', typeof window.Chart !== 'undefined');
            console.log('Milk canvas element:', document.getElementById('milkProductionChart'));
            console.log('Weight canvas element:', document.getElementById('weightGainChart'));
            console.log('Milk data:', {{ json_encode($milkProductionData ?? []) }});
            console.log('Weight data:', {{ json_encode($weightGainData ?? []) }});

            // Wait for DOM and Chart to be available
            document.addEventListener('DOMContentLoaded', function() {
                console.log('DOM loaded');
                console.log('Chart after DOM load:', typeof window.Chart !== 'undefined');

                if (typeof window.Chart === 'undefined') {
                    console.error('Chart is still not available!');
                    return;
                }

                // Wait a bit for Vue app to mount
                setTimeout(function() {
                    console.log('Creating charts after Vue mount delay...');

                    try {
                        // Milk Production Line Chart
                        const milkCanvas = document.getElementById('milkProductionChart');
                        if (!milkCanvas) {
                            console.error('milkProductionChart canvas not found');
                            return;
                        }
                        const milkCtx = milkCanvas.getContext('2d');
                        console.log('Creating milk chart...');
                        const milkChart = new window.Chart(milkCtx, {
                        type: 'line',
                        data: {
                            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                            datasets: [{
                                label: 'Milk Production (L)',
                                data: {{ json_encode($milkProductionData) }},
                                borderColor: '#22c55e',
                                backgroundColor: 'rgba(34, 197, 94, 0.1)',
                                fill: true,
                                tension: 0.4,
                                borderWidth: 3,
                                pointBackgroundColor: '#22c55e',
                                pointBorderColor: '#ffffff',
                                pointBorderWidth: 2,
                                pointRadius: 5,
                                pointHoverRadius: 7
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    display: true,
                                    labels: {
                                        usePointStyle: true,
                                        padding: 20,
                                        font: {
                                            size: 12,
                                            weight: 500
                                        }
                                    }
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    grid: {
                                        color: 'rgba(0, 0, 0, 0.05)'
                                    },
                                    ticks: {
                                        font: {
                                            size: 11
                                        }
                                    }
                                },
                                x: {
                                    grid: {
                                        display: false
                                    },
                                    ticks: {
                                        font: {
                                            size: 11
                                        }
                                    }
                                }
                            }
                        }
                    });
                    console.log('Milk chart created successfully');

                    // Weight Gain Bar Chart
                    const weightCanvas = document.getElementById('weightGainChart');
                    if (!weightCanvas) {
                        console.error('weightGainChart canvas not found');
                        return;
                    }
                    const weightCtx = weightCanvas.getContext('2d');
                    console.log('Creating weight chart...');
                    const weightChart = new window.Chart(weightCtx, {
                        type: 'bar',
                        data: {
                            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                            datasets: [{
                                label: 'Weight Gain (kg)',
                                data: {{ json_encode($weightGainData) }},
                                backgroundColor: [
                                    'rgba(6, 182, 212, 0.8)',
                                    'rgba(34, 197, 94, 0.8)',
                                    'rgba(234, 179, 8, 0.8)',
                                    'rgba(239, 68, 68, 0.8)',
                                    'rgba(168, 85, 247, 0.8)',
                                    'rgba(249, 115, 22, 0.8)',
                                    'rgba(156, 163, 175, 0.8)'
                                ],
                                borderColor: [
                                    'rgba(6, 182, 212, 1)',
                                    'rgba(34, 197, 94, 1)',
                                    'rgba(234, 179, 8, 1)',
                                    'rgba(239, 68, 68, 1)',
                                    'rgba(168, 85, 247, 1)',
                                    'rgba(249, 115, 22, 1)',
                                    'rgba(156, 163, 175, 1)'
                                ],
                                borderWidth: 2,
                                borderRadius: 6,
                                borderSkipped: false
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    display: true,
                                    labels: {
                                        usePointStyle: true,
                                        padding: 20,
                                        font: {
                                            size: 12,
                                            weight: 500
                                        }
                                    }
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    grid: {
                                        color: 'rgba(0, 0, 0, 0.05)'
                                    },
                                    ticks: {
                                        font: {
                                            size: 11
                                        }
                                    }
                                },
                                x: {
                                    grid: {
                                        display: false
                                    },
                                    ticks: {
                                        font: {
                                            size: 11
                                        }
                                    }
                                }
                            }
                        }
                    });
                    console.log('Weight chart created successfully');
                    } catch (error) {
                        console.error('Error creating charts:', error);
                    }
                }, 500);
            });
        </script>
    @endPushOnce
</x-admin::layouts>
