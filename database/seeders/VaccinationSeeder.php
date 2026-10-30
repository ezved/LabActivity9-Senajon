<?php

namespace Database\Seeders;

use App\Models\Vaccination;
use Illuminate\Database\Seeder;

class VaccinationSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            ['patient_name' => 'Baby Aliyah Mae Cabrera', 'purok' => 'Purok 2', 'vaccine' => 'BCG',
             'dose' => '1st dose', 'scheduled_at' => '2026-11-04', 'status' => 'Scheduled'],
            ['patient_name' => 'Baby Jerico Tan Villanueva', 'purok' => 'Purok 4', 'vaccine' => 'Pentavalent',
             'dose' => '2nd dose', 'scheduled_at' => '2026-11-10', 'status' => 'Scheduled'],
            ['patient_name' => 'Baby Cielo Marie Pacana', 'purok' => 'Purok 1', 'vaccine' => 'OPV',
             'dose' => '3rd dose', 'scheduled_at' => '2026-10-22', 'status' => 'Overdue'],
            ['patient_name' => 'Kiel Andrei Montecillo', 'purok' => 'Purok 3', 'vaccine' => 'MMR',
             'dose' => '1st dose', 'scheduled_at' => '2026-12-01', 'status' => 'Scheduled'],
            ['patient_name' => 'Lolo Ernesto Bautista', 'purok' => 'Purok 5', 'vaccine' => 'Anti-Flu',
             'dose' => 'Annual', 'scheduled_at' => '2026-09-28', 'status' => 'Done'],
            ['patient_name' => 'Tita Rowena Salvador', 'purok' => 'Purok 2', 'vaccine' => 'Hepatitis B',
             'dose' => '1st dose', 'scheduled_at' => '2026-11-15', 'status' => 'Scheduled'],
            ['patient_name' => 'Lola Fe Magallanes', 'purok' => 'Purok 6', 'vaccine' => 'Anti-Flu',
             'dose' => 'Annual', 'scheduled_at' => '2026-10-19', 'status' => 'Overdue'],
            // birthday row (October 15)
            ['patient_name' => 'Baby Nathaniel Ocampo', 'purok' => 'Purok 6', 'vaccine' => 'Pentavalent',
             'dose' => '3rd dose', 'scheduled_at' => '2026-10-15', 'status' => 'Done'],
        ];

        foreach ($rows as $row) {
            Vaccination::create($row);
        }
    }
}
