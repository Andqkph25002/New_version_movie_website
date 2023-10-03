<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Movie;
use App\Models\MovieGenre;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_episode = Episode::with('rMovie')->orderBy('episode', 'desc')->get();
        //  return response()->json($list_episode);
        return view('admin.episode.index', compact('list_episode'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list_movie = Movie::orderBy('id', 'desc')->pluck('title', 'id');
        return view('admin.episode.form', compact('list_movie'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $episode_check = Episode::where('episode' , $data['episode'])->where('movie_id' ,$data['movie_id'])->count();
        if($episode_check > 0){
            return redirect()->back()->with('error' , 'Tập phim này thêm rồi');
        }
        $episode = new Episode();
        $episode->movie_id = $data['movie_id'];
        $episode->link_phim = $data['link_phim'];
        $episode->episode = $data['episode'];
        
        $episode->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $episode->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $episode = Episode::where('id', $id)->first();
        $list_movie = Movie::orderBy('id', 'desc')->pluck('title', 'id', 'thuocphim');
        return view('admin.episode.form', compact('episode', 'list_movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $episode = Episode::find($id);
        $episode->movie_id = $data['movie_id'];
        $episode->link_phim = $data['link_phim'];
        $episode->episode = $data['episode'];
        $episode->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $episode->save();
        return redirect()->route('episode.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $episode = Episode::find($id)->delete();
        return redirect()->back();
    }

    public function select_movie(Request $request)
    {
        $movie = Movie::find($_GET['id']);
        $output = "<option>---Chọn tập phim---</option>";

        for ($i = 1; $i <= $movie->sotap; $i++) {
            $output .= '<option value="' . $i . '">' . $i . '</option>';
        }


        echo $output;
    }
}
