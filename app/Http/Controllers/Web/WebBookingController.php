<?php
namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class WebBookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::where('user_id', auth()->id())
                           ->with('bookable')
                           ->latest()
                           ->paginate(6);
        return view('bookings.index', compact('bookings'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'bookable_type' => 'required|in:flight,hotel',
            'bookable_id'   => 'required|integer',
            'start_date'    => 'required|date',
            'end_date'      => 'nullable|date',
            'total_price'   => 'required|numeric',
        ]);

        $data['bookable_type'] = $data['bookable_type'] === 'flight'
            ? 'App\Models\Flight'
            : 'App\Models\Hotel';

        $data['user_id'] = auth()->id();
        Booking::create($data);

        return redirect()->route('bookings.index')
                         ->with('success', 'Réservation effectuée avec succès !');
    }

    public function cancel(Booking $booking)
    {
        abort_if($booking->user_id !== auth()->id(), 403);
        $booking->update(['status' => 'cancelled']);
        return back()->with('success', 'Réservation annulée.');
    }
}
