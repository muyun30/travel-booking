<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Flight;
use Illuminate\Http\Request;

class AdminFlightController extends Controller
{
    public function index()
    {
        $flights = Flight::latest()->paginate(10);
        return view('admin.flights.index', compact('flights'));
    }

    public function create()
    {
        return view('admin.flights.create');
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

        Flight::create($data);
        return redirect()->route('admin.flights.index')
                         ->with('success', 'Vol créé avec succès !');
    }

    public function edit(Flight $flight)
    {
        return view('admin.flights.edit', compact('flight'));
    }

    public function update(Request $request, Flight $flight)
    {
        $data = $request->validate([
            'airline'         => 'required|string',
            'flight_number'   => 'required|string|unique:flights,flight_number,'.$flight->id,
            'origin'          => 'required|string',
            'destination'     => 'required|string',
            'departure_at'    => 'required|date',
            'arrival_at'      => 'required|date|after:departure_at',
            'price'           => 'required|numeric|min:0',
            'seats_available' => 'required|integer|min:0',
        ]);

        $flight->update($data);
        return redirect()->route('admin.flights.index')
                         ->with('success', 'Vol modifié avec succès !');
    }

    public function destroy(Flight $flight)
    {
        $flight->delete();
        return back()->with('success', 'Vol supprimé.');
    }
}
