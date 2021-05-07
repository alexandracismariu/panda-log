<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Schedule;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CurrentWeekController extends Controller
{
    public function __invoke(Request $request)
    {
        $schedules = Schedule::whereBetween('date', [now()->startOfWeek(), now()->endOfWeek()])
            ->orderBy('date', 'asc')
            ->orderBy('start', 'asc')
            ->get();

        $seconds = 0;
        foreach ($schedules as $schedule) {
            $seconds += $schedule->time->totalSeconds;
        }

        $working_seconds = 20 * 3600;
        $seconds_remaining = $working_seconds - $seconds;

        return view('week.current-week', [
            'schedules' => $schedules,
            'total' => $this->formatSeconds($seconds),
            'remaining' => $this->formatSeconds($seconds_remaining),
        ]);
    }

    protected function formatSeconds($seconds)
    {
        $hours = floor($seconds / 3600);
        $minutes = floor(($seconds - 3600 * $hours) / 60);

        return Str::padLeft($hours, 2, '0') . ':' . Str::padLeft($minutes, 2, '0');
    }
}
