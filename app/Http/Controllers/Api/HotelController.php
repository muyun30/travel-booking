<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index(Request $request)
    {
        $query = Hotel::query();

        if ($request->city)    $query->where('city', $request->city);
        if ($request->country) $query->where('country', $request->country);
        if ($request->stars)   $query->where('stars', $request->stars);

        return response()->json($query->paginate(10));
    }

    public function show(Hotel $hotel)
    {
        return response()->json($hotel->load('reviews'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'            => 'required|string',
            'city'            => 'required|string',
            'country'         => 'required|string',
            'address'         => 'required|string',
            'price_per_night' => 'required|numeric|min:0',
            'stars'           => 'required|integer|between:1,5',
            'description'     => 'nullable|string',
        ]);

        return response()->json(Hotel::create($data), 201);
    }

    public function update(Request $request, Hotel $hotel)
    {
        $hotel->update($request->validate([
            'price_per_night' => 'sometimes|numeric|min:0',
            'description'     => 'sometimes|string',
        ]));

        return response()->json($hotel);
    }

    public function destroy(Hotel $hotel)
    {
        $hotel->delete();
        return response()->json(['message' => 'Hôtel supprimé.']);
    }
}
