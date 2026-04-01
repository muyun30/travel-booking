<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function index(Request $request)
    {
        $query = Flight::query();

        if ($request->origin)      $query->where('origin', $request->origin);
        if ($request->destination) $query->where('destination', $request->destination);
        if ($request->date)        $query->whereDate('departure_at', $request->date);

        return response()->json($query->paginate(10));
    }

    public function show(Flight $flight)
    {
        return response()->json($flight->load('reviews'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'airline'         => 'required|string',
            'flight_number'   => 'required|string|unique:flights',
            'origin'          => 'required|string',
            'destination'     => 'required|string',
            'departure_at'    => 'required|date',
            'arrival_at'      => 'required|date|after:departure_at',
            'price'           => 'required|numeric|min:0',
            'seats_available' => 'required|integer|min:0',
        ]);

        return response()->json(Flight::create($data), 201);
    }

    public function update(Request $request, Flight $flight)
    {
        $flight->update($request->validate([
            'price'           => 'sometimes|numeric|min:0',
            'seats_available' => 'sometimes|integer|min:0',
        ]));

        return response()->json($flight);
    }

    public function destroy(Flight $flight)
    {
        $flight->delete();
        return response()->json(['message' => 'Vol supprimé.']);
    }
}
