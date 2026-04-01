<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'reviewable_type' => 'required|in:flight,hotel',
            'reviewable_id'   => 'required|integer',
            'rating'          => 'required|integer|between:1,5',
            'comment'         => 'nullable|string|max:1000',
        ]);

        $data['reviewable_type'] = $data['reviewable_type'] === 'flight'
            ? 'App\Models\Flight'
            : 'App\Models\Hotel';

        $data['user_id'] = $request->user()->id;

        return response()->json(Review::create($data), 201);
    }

    public function index(Request $request)
    {
        $request->validate([
            'type' => 'required|in:flight,hotel',
            'id'   => 'required|integer',
        ]);

        $type = $request->type === 'flight' ? 'App\Models\Flight' : 'App\Models\Hotel';

        return response()->json(
            Review::where('reviewable_type', $type)
                  ->where('reviewable_id', $request->id)
                  ->with('user:id,name')
                  ->paginate(10)
        );
    }
}

