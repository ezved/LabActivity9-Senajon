<?php

namespace App\Http\Controllers;

use App\Models\Vaccination;

class DashboardController extends Controller
{
    // vaccines the health center has run out of (hardcoded until we have a stock table)
    private array $outOfStock = ['MMR'];

    // dashboard page
    public function index()
    {
        $title = 'Bakuna Tracker – Purok Senajon';
        // all vaccinations, earliest date first
        $schedules = Vaccination::orderBy('scheduled_at')->get();

        // the 4 numbers for the stat cards
        $stats = [
            ['label' => 'Total', 'value' => $schedules->count()],
            ['label' => 'Done', 'value' => $schedules->where('status', 'Done')->count()],
            ['label' => 'Scheduled', 'value' => $schedules->where('status', 'Scheduled')->count()],
            ['label' => 'Overdue', 'value' => $schedules->where('status', 'Overdue')->count()],
        ];

        // overdue ones go in the alert list
        $alerts = $schedules->where('status', 'Overdue');
        $outOfStock = $this->outOfStock;

        return view('dashboard.index', compact('title', 'stats', 'schedules', 'alerts', 'outOfStock'));
    }

    // schedule page with the full table
    public function schedule()
    {
        $title = 'Vaccine Schedule – Purok Senajon';
        $schedules = Vaccination::orderBy('scheduled_at')->get();

        return view('dashboard.schedule', compact('title', 'schedules'));
    }
}
