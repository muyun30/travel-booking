<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(
            $request->user()->bookings()->with('bookable')->paginate(10)
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'bookable_type' => 'required|in:flight,hotel',
            'bookable_id'   => 'required|integer',
            'start_date'    => 'required|date',
            'end_date'      => 'nullable|date|after:start_date',
            'total_price'   => 'required|numeric|min:0',
        ]);

        $data['bookable_type'] = $data['bookable_type'] === 'flight'
            ? 'App\Models\Flight'
            : 'App\Models\Hotel';

        $data['user_id'] = $request->user()->id;

        return response()->json(Booking::create($data), 201);
    }

    public function show(Request $request, Booking $booking)
    {
        abort_if($booking->user_id !== $request->user()->id, 403);
        return response()->json($booking->load('bookable'));
    }

    public function destroy(Request $request, Booking $booking)
    {
        abort_if($booking->user_id !== $request->user()->id, 403);
        $booking->update(['status' => 'cancelled']);
        return response()->json(['message' => 'Réservation annulée.']);
    }
}
