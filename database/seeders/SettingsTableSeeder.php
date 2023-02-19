<?php

namespace Database\Seeders;

use App\Models\Settings;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $startDate = Carbon::parse('2023-03-12');
        $endDate = Carbon::parse('2023-03-19');

        Settings::create([
            'start_date' => $startDate,
            'end_date' => $endDate,
        ]);
    }
}
