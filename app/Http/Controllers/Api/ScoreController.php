<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Score;
use Illuminate\Http\Request;
use App\Http\Resources\ScoreResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $scores = $this->sumScoresByUser();

        return response()->json($scores);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $score = new Score;
        $score->user_id = Auth::id();
        $score->score = $request->score;
        $score->save();

        // $score = Score::create($request->all());

        // return new ScoreResource($score);
    }

    /**
     * Display the specified resource.
     */
    public function show(Score $score)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Score $score)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Score $score)
    {
        $score->update($request->all());

        return new ScoreResource($score);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Score $score)
    {
        $score->delete();

        return response(null, 204);
    }

    private function sumScoresByUser() {
        $usersScores = DB::table('scores')
                        ->join('users', 'scores.user_id', '=', 'users.id')
                        ->select('users.name', DB::raw('SUM(scores.score) as total_score'))
                        ->groupBy('users.id')
                        ->orderBy('total_score', 'desc')
                        ->get();

        return $usersScores;
    }

}
