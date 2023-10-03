<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Episode;
use App\Models\Genre;
use App\Models\Movie;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LeedMovieController extends Controller
{

    public function leech_movie()
    {
        $response = Http::get("https://ophim1.com/danh-sach/phim-moi-cap-nhat?page=1")->json();
        return view('admin.leech.index', compact('response'));
    }
    public function leech_episode_movie($slug)
    {
        $response = Http::get("https://ophim1.com/phim/" . $slug)->json();
        return view('admin.leech.leech_episode', compact('response'));
    }
    public function leech_detail_movie($slug)
    {
        $response = Http::get("https://ophim1.com/phim/" . $slug)->json();
        $res_movie = $response['movie'];

        return view('admin.leech.detail', compact('response', 'res_movie'));
    }

    public function leech_movie_store($slug)
    {
        $response = Http::get("https://ophim1.com/phim/" . $slug)->json();
        $res_movie[] = $response['movie'];
        $episode = $response['episodes'];
        $movie = new Movie();

        foreach ($res_movie as $data) {
            $movie->title = $data['name'];
            $movie->description = $data['content'];
            $movie->slug = $data['slug'];
            $movie->trailer = $data['trailer_url'];
            $movie->phim_hot = 1;
            $movie->resolution = 0;
            $movie->status = 1;
            $movie->thoi_luong = $data['time'];
            $movie->phude = 0;
            $movie->tags = $data['name'] . ',' . $data['slug'];


            if (!is_numeric($data['episode_total'])) {
                $movie->sotap = 1;
            } else {
                $movie->sotap = $data['episode_total'];
            }


            $movie->name_eng = $data['origin_name'];

            $category = Category::orderBy('id', 'desc')->first();
            $movie->category_id = $category->id;
            $country = Country::orderBy('id', 'desc')->first();
            $movie->country_id = $country->id;

            $genre = Genre::orderBy('id', 'desc')->first();
            $movie->genre_id = $genre->id;
            $movie->image = $data['poster_url'];
            $movie->views = 1;
            $movie->created_at = Carbon::now('Asia/Ho_Chi_Minh');
            $movie->thuocphim = 1;
            $movie->save();
            $movie->rMovie_Genre()->attach([$genre->id]);
            $category = Category::orderBy('id', 'desc')->first();
            $movie->rMovie_Category()->attach([$category->id]);

            return redirect()->route('movie.index')->with('message', 'Thêm thành công !');
        }
    }


    public function leech_episode_store($slug)
    {
        $movie = Movie::where('slug', $slug)->first();
        $response = Http::get("https://ophim1.com/phim/" . $slug)->json();
        foreach ($response['episodes'] as $item) {
            foreach ($item['server_data'] as $key => $res) {
                $episode = new Episode();
                $episode->movie_id = $movie->id;
                $episode->link_phim = '<iframe width="100%" height="500px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" src="' . $res['link_embed'] . '"></iframe>';
                if (!is_numeric($res['name'])) {
                    $episode->episode = 1;
                } else {
                    $episode->episode = $res['name'];
                }

                $episode->save();
            }
        }
        return redirect()->back()->with('message', 'Thêm tập phim thành công !');
    }
}
