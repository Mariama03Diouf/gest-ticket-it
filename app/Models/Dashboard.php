<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $ticketStatistics = Dashboard::getTicketStatistics();

        return view('dashboard', $ticketStatistics);
    }
}
