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

    <!-- Input Form -->
    <div class="mb-8">
        <div class="box-shadow rounded-2xl bg-white p-6 dark:bg-gray-900">
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Record Herd Data</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Enter daily metrics for individual animals</p>
            </div>

            <form action="{{ route('admin.herd-analytics.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Animal ID -->
                    <div>
                        <label for="herd_id" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Animal ID
                        </label>
                        <input
                            type="text"
                            id="herd_id"
                            name="herd_id"
                            required
                            placeholder="e.g., COW-001"
                            class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder-gray-500 dark:focus:border-blue-400 dark:focus:ring-blue-400"
                        >
                        @error('herd_id')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Breed Type -->
                    <div>
                        <label for="breed_type" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Breed Type
                        </label>
                        <select
                            id="breed_type"
                            name="breed_type"
                            required
                            class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-blue-400 dark:focus:ring-blue-400"
                        >
                            <option value="">Select Breed</option>
                            <option value="Holstein">Holstein</option>
                            <option value="Jersey">Jersey</option>
                            <option value="Guernsey">Guernsey</option>
                            <option value="Ayrshire">Ayrshire</option>
                            <option value="Brown Swiss">Brown Swiss</option>
                            <option value="Milking Shorthorn">Milking Shorthorn</option>
                            <option value="Dutch Belted">Dutch Belted</option>
                            <option value="Red Poll">Red Poll</option>
                            <option value="Other">Other</option>
                        </select>
                        @error('breed_type')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Date -->
                    <div>
                        <label for="date" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Date
                        </label>
                        <input
                            type="date"
                            id="date"
                            name="date"
                            required
                            value="{{ old('date', now()->format('Y-m-d')) }}"
                            class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder-gray-500 dark:focus:border-blue-400 dark:focus:ring-blue-400"
                        >
                        @error('date')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Milk Production -->
                    <div>
                        <label for="milk_production" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Milk Production (Liters)
                        </label>
                        <input
                            type="number"
                            id="milk_production"
                            name="milk_production"
                            step="0.1"
                            required
                            placeholder="e.g., 25.5"
                            class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder-gray-500 dark:focus:border-blue-400 dark:focus:ring-blue-400"
                        >
                        @error('milk_production')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Weight Gain -->
                    <div>
                        <label for="weight_gain" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Weight Gain (kg/day)
                        </label>
                        <input
                            type="number"
                            id="weight_gain"
                            name="weight_gain"
                            step="0.01"
                            placeholder="e.g., 1.8"
                            class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder-gray-500 dark:focus:border-blue-400 dark:focus:ring-blue-400"
                        >
                        @error('weight_gain')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Health Status -->
                    <div>
                        <label for="health_status" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Health Status
                        </label>
                        <select
                            id="health_status"
                            name="health_status"
                            required
                            class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-blue-400 dark:focus:ring-blue-400"
                        >
                            <option value="">Select Status</option>
                            <option value="healthy">Healthy</option>
                            <option value="at-risk">At Risk</option>
                            <option value="sick">Sick</option>
                        </select>
                        @error('health_status')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button
                        type="submit"
                        class="inline-flex items-center rounded-lg bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-2.5 text-sm font-semibold text-white shadow-lg shadow-blue-500/30 transition-all duration-200 hover:from-blue-700 hover:to-blue-800 hover:shadow-blue-500/40 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:from-blue-500 dark:to-blue-600 dark:hover:from-blue-600 dark:hover:to-blue-700"
                    >
                        <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Record Data
                    </button>
                </div>
            </form>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-6 rounded-lg bg-green-50 p-4 ring-1 ring-green-200 dark:bg-green-900/20 dark:ring-green-800">
            <div class="flex items-center">
                <svg class="h-5 w-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <p class="ml-3 text-sm font-medium text-green-800 dark:text-green-200">
                    {{ session('success') }}
                </p>
            </div>
        </div>
    @endif

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
                    @if($filteredData->where('health_status', 'healthy')->count() > 0)
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
                    {{ number_format($filteredData->avg('milk_production'), 1) }} <span class="text-base font-normal text-gray-500">L</span>
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
                    {{ number_format($filteredData->avg('weight_gain') ?: 0, 2) }} <span class="text-base font-normal text-gray-500">kg/day</span>
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
                        $healthyCount = $filteredData->where('health_status', 'healthy')->count();
                        $atRiskCount = $filteredData->where('health_status', 'at-risk')->count();
                        $sickCount = $filteredData->where('health_status', 'sick')->count();
                        $totalCount = $filteredData->count();
                        $calvingRate = $totalCount > 0 ? round(($healthyCount / $totalCount) * 100, 1) : 0;
                    @endphp
                    {{ $calvingRate }}<span class="text-base font-normal text-gray-500">%</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Date Filter Section -->
    <div class="mb-8">
        <div class="box-shadow rounded-2xl bg-white p-6 dark:bg-gray-900">
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Filter by Date</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Select month and year to view milk production data</p>
            </div>

            <form action="{{ route('admin.herd-analytics.index') }}" method="GET" class="flex flex-wrap items-end gap-4">
                <!-- Month Dropdown -->
                <div class="flex-1 min-w-[150px]">
                    <label for="month" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Month
                    </label>
                    <select
                        id="month"
                        name="month"
                        onchange="this.form.submit()"
                        class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-blue-400 dark:focus:ring-blue-400"
                    >
                        @for($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}" {{ $selectedMonth == $i ? 'selected' : '' }}>
                                {{ \Carbon\Carbon::createFromDate(null, $i, 1)->format('F') }}
                            </option>
                        @endfor
                    </select>
                </div>

                <!-- Year Dropdown -->
                <div class="flex-1 min-w-[150px]">
                    <label for="year" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Year
                    </label>
                    <select
                        id="year"
                        name="year"
                        onchange="this.form.submit()"
                        class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-blue-400 dark:focus:ring-blue-400"
                    >
                        @for($i = now()->year - 5; $i <= now()->year; $i++)
                            <option value="{{ $i }}" {{ $selectedYear == $i ? 'selected' : '' }}>
                                {{ $i }}
                            </option>
                        @endfor
                    </select>
                </div>
            </form>
        </div>
    </div>

    <!-- Milk Production Chart -->
    <div class="mb-8">
        <div class="box-shadow rounded-2xl bg-white p-6 dark:bg-gray-900">
            <div class="mb-6 flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Milk Production (Last 30 Days)</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Daily milk production in liters</p>
                </div>
                <div class="flex items-center gap-2">
                    <span class="inline-flex items-center rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-700 ring-1 ring-blue-600/20 dark:bg-blue-900/30 dark:text-blue-400 dark:ring-blue-800/30">
                        {{ \Carbon\Carbon::createFromDate($selectedYear, $selectedMonth, 1)->format('F Y') }}
                    </span>
                </div>
            </div>
            
            <!-- Chart Container - CSS Only Bar Chart -->
            <div class="relative" style="height: 350px; border-bottom: 1px solid #e5e7eb; border-left: 1px solid #e5e7eb;">
                @php
                    $maxValue = !empty($milkProductionData) ? max($milkProductionData) : 100;
                    $maxY = max(100, ceil($maxValue / 10) * 10);
                @endphp
                
                <!-- Y-Axis Labels -->
                <div class="absolute left-0 top-0 bottom-0 w-16 flex flex-col justify-between text-xs text-gray-500 dark:text-gray-400 text-right pr-2 py-2" style="background: white; z-index: 10;">
                    <span>{{ number_format($maxY, 0) }}</span>
                    <span>{{ number_format($maxY * 0.75, 0) }}</span>
                    <span>{{ number_format($maxY * 0.5, 0) }}</span>
                    <span>{{ number_format($maxY * 0.25, 0) }}</span>
                    <span>0</span>
                </div>
                
                <!-- Chart Area -->
                <div class="absolute left-16 right-0 top-0 bottom-0 flex items-end px-2" style="gap: 4px;">
                    @foreach($milkProductionData as $index => $value)
                        @php
                            $height = ($value / $maxY) * 100;
                            $height = is_numeric($height) ? $height : 0;
                            $day = $index + 1;
                            $fullDate = \Carbon\Carbon::createFromDate($selectedYear, $selectedMonth, $day)->format('M d, Y');
                        @endphp
                        <div 
                            class="bg-blue-600 rounded-t transition-all duration-200 hover:bg-blue-700 cursor-pointer"
                            style="width: calc(3.33% - 3px); height: {{ $height }}%; min-height: {{ $height > 0 ? '2px' : '0' }};"
                            title="{{ $fullDate }}: {{ number_format($value, 1) }} Liters"
                        ></div>
                    @endforeach
                </div>
                
                <!-- Grid Lines -->
                <div class="absolute left-16 right-0 top-0 bottom-0 pointer-events-none">
                    <div class="absolute bottom-0 w-full h-px bg-gray-200 dark:bg-gray-700"></div>
                    <div class="absolute bottom-[25%] w-full h-px bg-gray-200 dark:bg-gray-700"></div>
                    <div class="absolute bottom-[50%] w-full h-px bg-gray-200 dark:bg-gray-700"></div>
                    <div class="absolute bottom-[75%] w-full h-px bg-gray-200 dark:bg-gray-700"></div>
                    <div class="absolute top-0 w-full h-px bg-gray-200 dark:bg-gray-700"></div>
                </div>
            </div>
            
            <!-- X-Axis Labels -->
            <div class="flex justify-between px-16 text-xs text-gray-500 dark:text-gray-400 mt-2">
                <span>Day 1</span>
                <span>Day 15</span>
                <span>Day 30</span>
            </div>
            
            <!-- Legend -->
            <div class="mt-6 flex items-center justify-center gap-4 text-sm text-gray-600 dark:text-gray-400">
                <div class="flex items-center gap-2">
                    <div class="h-4 w-4 rounded bg-gradient-to-t from-blue-600 to-blue-400"></div>
                    <span>Milk Production (Liters)</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Herd Health Summary -->

    <!-- Herd Health Summary -->
    <div class="box-shadow mb-8 rounded-2xl bg-white p-6 dark:bg-gray-900">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Herd Health Summary</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Current health status distribution</p>
            </div>
        </div>
        @php
            $healthyCount = $filteredData->where('health_status', 'healthy')->count();
            $atRiskCount = $filteredData->where('health_status', 'at-risk')->count();
            $sickCount = $filteredData->where('health_status', 'sick')->count();
        @endphp
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
            <div class="flex items-center gap-4 rounded-xl bg-green-50 p-4 ring-1 ring-green-100 dark:bg-green-900/10 dark:ring-green-800">
                <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-gradient-to-br from-green-500 to-green-600 text-green-100 shadow-lg shadow-green-500/30 dark:from-green-400 dark:to-green-500 dark:shadow-green-400/40">
                    <svg class="h-7 w-7 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <div>
                    <div class="text-sm font-medium text-green-600 dark:text-green-400">Healthy</div>
                    <div class="text-3xl font-bold text-gray-900 dark:text-green-300">{{ $healthyCount }}</div>
                </div>
            </div>
            <div class="flex items-center gap-4 rounded-xl bg-orange-50 p-4 ring-1 ring-orange-100 dark:bg-orange-900/10 dark:ring-orange-800">
                <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-gradient-to-br from-orange-500 to-orange-600 text-orange-100 shadow-lg shadow-orange-500/30 dark:from-orange-400 dark:to-orange-500 dark:shadow-orange-400/40">
                    <svg class="h-7 w-7 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                </div>
                <div>
                    <div class="text-sm font-medium text-orange-600 dark:text-orange-400">At Risk</div>
                    <div class="text-3xl font-bold text-gray-900 dark:text-orange-300">{{ $atRiskCount }}</div>
                </div>
            </div>
            <div class="flex items-center gap-4 rounded-xl bg-red-50 p-4 ring-1 ring-red-100 dark:bg-red-900/10 dark:ring-red-800">
                <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-gradient-to-br from-red-500 to-red-600 text-red-100 shadow-lg shadow-red-500/30 dark:from-red-400 dark:to-red-500 dark:shadow-red-400/40">
                    <svg class="h-7 w-7 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </div>
                <div>
                    <div class="text-sm font-medium text-red-600 dark:text-red-400">Sick</div>
                    <div class="text-3xl font-bold text-gray-900 dark:text-red-300">{{ $sickCount }}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Individual Performance Table -->
    <div class="box-shadow rounded-2xl bg-white p-6 dark:bg-gray-900">
        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Individual Performance</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Detailed performance metrics per animal</p>
            </div>
            <form action="{{ route('admin.herd-analytics.index') }}" method="GET" class="flex items-center gap-3">
                <input
                    type="text"
                    name="search_animal_id"
                    value="{{ $searchAnimalId ?? '' }}"
                    placeholder="Search Animal ID..."
                    class="rounded-lg border border-gray-300 bg-white px-4 py-2 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder-gray-500 dark:focus:border-blue-400 dark:focus:ring-blue-400"
                >
                <button
                    type="submit"
                    class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white transition-colors duration-200 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:bg-blue-500 dark:hover:bg-blue-600"
                >
                    Search
                </button>
                @if($searchAnimalId)
                    <a href="{{ route('admin.herd-analytics.index') }}" class="text-sm font-medium text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                        Clear
                    </a>
                @endif
            </form>
        </div>
        <div class="overflow-x-auto rounded-xl ring-1 ring-gray-200 dark:ring-gray-800">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50 dark:bg-gray-800">
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Animal ID</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Breed Type</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Date</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Milk (L)</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Weight Gain (kg)</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Health Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                    @if($individualPerformanceData->count() > 0)
                        @foreach($individualPerformanceData as $index => $record)
                            <tr class="transition-colors duration-200 hover:bg-gray-50 dark:hover:bg-gray-800/50">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400">
                                            <span class="text-sm font-bold">{{ $index + 1 }}</span>
                                        </div>
                                        <span class="font-medium text-gray-900 dark:text-white">{{ $record->herd_id }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ $record->breed_type }}</td>
                                <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ \Carbon\Carbon::parse($record->date)->format('M d, Y') }}</td>
                                <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ number_format($record->milk_production, 1) }}</td>
                                <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ number_format($record->weight_gain, 2) }}</td>
                                <td class="px-6 py-4">
                                    @if($record->health_status == 'healthy')
                                        <span class="inline-flex items-center rounded-full bg-green-100 px-3 py-1 text-sm font-semibold text-green-700 ring-1 ring-green-600/20 dark:bg-green-900/30 dark:text-green-400 dark:ring-green-800/30">
                                            Healthy
                                        </span>
                                    @elseif($record->health_status == 'at-risk')
                                        <span class="inline-flex items-center rounded-full bg-orange-100 px-3 py-1 text-sm font-semibold text-orange-700 ring-1 ring-orange-600/20 dark:bg-orange-900/30 dark:text-orange-400 dark:ring-orange-800/30">
                                            At Risk
                                        </span>
                                    @else
                                        <span class="inline-flex items-center rounded-full bg-red-100 px-3 py-1 text-sm font-semibold text-red-700 ring-1 ring-red-600/20 dark:bg-red-900/30 dark:text-red-400 dark:ring-red-800/30">
                                            Sick
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-gray-500 dark:text-gray-400">
                                @if($searchAnimalId)
                                    No records found for Animal ID: {{ $searchAnimalId }}
                                @else
                                    No records found. Start by adding herd data using the form above.
                                @endif
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    @push('scripts')
        <script>
            // CSS-only bar chart - hover over bars to see values
            console.log('Milk Production Chart loaded successfully');
        </script>
    @endpush
</x-admin::layouts>
