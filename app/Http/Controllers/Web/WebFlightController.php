<?php
namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use App\Models\Flight;
use Illuminate\Http\Request;

class WebFlightController extends Controller
{
    public function index(Request $request)
    {
        $query = Flight::query();
        if ($request->origin)
            $query->where('origin', 'like', '%'.$request->origin.'%');
        if ($request->destination)
            $query->where('destination', 'like', '%'.$request->destination.'%');
        if ($request->date)
            $query->whereDate('departure_at', $request->date);

        $flights = $query->paginate(6);
        return view('flights.index', compact('flights'));
    }
}

