<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;

class AdminHotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::latest()->paginate(10);
        return view('admin.hotels.index', compact('hotels'));
    }

    public function create()
    {
        return view('admin.hotels.create');
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

        Hotel::create($data);
        return redirect()->route('admin.hotels.index')
                         ->with('success', 'Hôtel créé avec succès !');
    }

    public function edit(Hotel $hotel)
    {
        return view('admin.hotels.edit', compact('hotel'));
    }

    public function update(Request $request, Hotel $hotel)
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

        $hotel->update($data);
        return redirect()->route('admin.hotels.index')
                         ->with('success', 'Hôtel modifié avec succès !');
    }

    public function destroy(Hotel $hotel)
    {
        $hotel->delete();
        return back()->with('success', 'Hôtel supprimé.');
    }
}
