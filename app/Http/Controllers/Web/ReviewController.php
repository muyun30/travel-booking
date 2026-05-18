<?php
namespace App\Http\Controllers\Web;
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
            'comment'         => 'nullable|string|max:500',
        ]);

        // Vérifier si déjà noté
        $exists = Review::where('user_id', auth()->id())
                        ->where('reviewable_type', 'App\Models\\'.ucfirst($data['reviewable_type']))
                        ->where('reviewable_id', $data['reviewable_id'])
                        ->exists();

        if ($exists) {
            return back()->with('error', 'Vous avez déjà laissé un avis.');
        }

        $data['reviewable_type'] = 'App\Models\\'.ucfirst($data['reviewable_type']);
        $data['user_id']         = auth()->id();

        Review::create($data);
        return back()->with('success', 'Avis ajouté avec succès !');
    }
}