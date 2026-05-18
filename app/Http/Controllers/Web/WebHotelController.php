<?php
namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;

class WebHotelController extends Controller
{
    public function index(Request $request)
    {
        $query = Hotel::query();
        if ($request->city)
            $query->where('city', 'like', '%'.$request->city.'%');
        if ($request->stars)
            $query->where('stars', $request->stars);

        $hotels = $query->paginate(6);
        return view('hotels.index', compact('hotels'));
    }
}