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
        $herdData = [
            [
                'herd_id' => 'COW-001',
                'milk_production' => 32.5,
                'weight_gain' => 1.8,
                'health_status' => 'healthy',
            ],
            [
                'herd_id' => 'COW-002',
                'milk_production' => 28.3,
                'weight_gain' => 1.5,
                'health_status' => 'healthy',
            ],
            [
                'herd_id' => 'COW-003',
                'milk_production' => 24.7,
                'weight_gain' => 1.2,
                'health_status' => 'at-risk',
            ],
            [
                'herd_id' => 'COW-004',
                'milk_production' => 30.1,
                'weight_gain' => 1.6,
                'health_status' => 'sick',
            ],
            [
                'herd_id' => 'COW-005',
                'milk_production' => 1.6,
                'weight_gain' => 0.8,
                'health_status' => 'sick',
            ],
        ];

        foreach ($herdData as $data) {
            HerdData::create($data);
        }
    }
}
