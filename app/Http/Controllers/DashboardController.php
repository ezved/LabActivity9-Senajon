<?php

namespace App\Http\Controllers;

use App\Models\Vaccination;

class DashboardController extends Controller
{
    // vaccines the health center has run out of (hardcoded until we have a stock table)
    private array $outOfStock = ['MMR'];

    public function index()
    {
        $title = 'Bakuna Tracker – Purok Senajon';
        $schedules = Vaccination::orderBy('scheduled_at')->get();

        $stats = [
            ['label' => 'Total', 'value' => $schedules->count()],
            ['label' => 'Done', 'value' => $schedules->where('status', 'Done')->count()],
            ['label' => 'Scheduled', 'value' => $schedules->where('status', 'Scheduled')->count()],
            ['label' => 'Overdue', 'value' => $schedules->where('status', 'Overdue')->count()],
        ];

        $alerts = $schedules->where('status', 'Overdue');
        $outOfStock = $this->outOfStock;

        return view('dashboard.index', compact('title', 'stats', 'schedules', 'alerts', 'outOfStock'));
    }

    public function schedule()
    {
        $title = 'Vaccine Schedule – Purok Senajon';
        $schedules = Vaccination::orderBy('scheduled_at')->get();

        return view('dashboard.schedule', compact('title', 'schedules'));
    }
}
