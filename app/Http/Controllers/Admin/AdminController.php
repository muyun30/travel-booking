<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Flight;
use App\Models\Hotel;
use App\Models\Booking;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'users'    => User::count(),
            'flights'  => Flight::count(),
            'hotels'   => Hotel::count(),
            'bookings' => Booking::count(),
            'revenue'  => Booking::where('status', '!=', 'cancelled')->sum('total_price'),
            'pending'  => Booking::where('status', 'pending')->count(),
        ];

        $recentBookings = Booking::with(['user', 'bookable'])
                                 ->latest()
                                 ->take(5)
                                 ->get();

        return view('admin.dashboard', compact('stats', 'recentBookings'));
    }
}
