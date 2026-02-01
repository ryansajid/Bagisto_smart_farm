<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Webkul\Admin\Models\HerdData;

class HerdDataSeeder extends Seeder
{
    /**
     * Seed herd_data table with sample data.
     *
     * @return void
     */
    public function run()
    {
        $baseDate = now()->startOfMonth();
        
        $herdData = [
            [
                'herd_id' => 'COW-001',
                'milk_production' => 32.5,
                'weight_gain' => 1.8,
                'health_status' => 'healthy',
                'breed_type' => 'Holstein',
                'date' => $baseDate->format('Y-m-d'),
            ],
            [
                'herd_id' => 'COW-002',
                'milk_production' => 28.3,
                'weight_gain' => 1.5,
                'health_status' => 'healthy',
                'breed_type' => 'Jersey',
                'date' => $baseDate->copy()->addDays(2)->format('Y-m-d'),
            ],
            [
                'herd_id' => 'COW-003',
                'milk_production' => 24.7,
                'weight_gain' => 1.2,
                'health_status' => 'at-risk',
                'breed_type' => 'Guernsey',
                'date' => $baseDate->copy()->addDays(5)->format('Y-m-d'),
            ],
            [
                'herd_id' => 'COW-004',
                'milk_production' => 30.1,
                'weight_gain' => 1.6,
                'health_status' => 'sick',
                'breed_type' => 'Ayrshire',
                'date' => $baseDate->copy()->addDays(8)->format('Y-m-d'),
            ],
            [
                'herd_id' => 'COW-005',
                'milk_production' => 1.6,
                'weight_gain' => 0.8,
                'health_status' => 'sick',
                'breed_type' => 'Brown Swiss',
                'date' => $baseDate->copy()->addDays(12)->format('Y-m-d'),
            ],
        ];

        foreach ($herdData as $data) {
            HerdData::create($data);
        }
    }
}
