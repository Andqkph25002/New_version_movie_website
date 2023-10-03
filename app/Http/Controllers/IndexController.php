<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Episode;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\MovieCategory;
use App\Models\MovieGenre;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function timKiemPhim()
    {

        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $category = Category::orderBy('id', 'desc')->where('status', 1)->get();
            $country = Country::orderBy('id', 'desc')->where('status', 1)->get();
            $genre = Genre::orderBy('id', 'desc')->where('status', 1)->get();


            $movie = Movie::where('title', 'LIKE', '%' . $search . '%')->where('status', 1)->orderBy('updated_at', 'desc')->paginate(40);
            $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('updated_at', 'desc')->take(20)->get();
            $phimhot_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('updated_at', 'desc')->take(10)->get();
            return view('pages.timkiem', compact('category', 'country', 'genre', 'search', 'movie', 'phimhot_sidebar', 'phimhot_trailer'));
        } else {
            return redirect()->to('/');
        }
    }
    public function home()
    {
        $category = Category::orderBy('id', 'desc')->where('status', 1)->get();
        $country = Country::orderBy('id', 'desc')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'desc')->where('status', 1)->get();


        $category_home = Category::with('rMovie')->orderBy('id', 'desc')->where('status', 1)->get();
        $phimhot = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('updated_at', 'desc')->get();
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('updated_at', 'desc')->take(20)->get();
        $phimhot_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('updated_at', 'desc')->take(10)->get();
        return view('pages.home', compact('category', 'country', 'genre', 'category_home', 'phimhot', 'phimhot_sidebar', 'phimhot_trailer'));
    }
    public function category($slug)
    {
        $category = Category::orderBy('id', 'desc')->where('status', 1)->get();
        $country = Country::orderBy('id', 'desc')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'desc')->where('status', 1)->get();

        $cate_slug = Category::where('slug', $slug)->first();
        $movie_category = MovieCategory::where('category_id', $cate_slug->id)->get();
        $many_cate = [];
        foreach ($movie_category as $key => $mov) {
            $many_cate[] = $mov->movie_id;
        }
        $movie = Movie::whereIn('id', $many_cate)->where('status', 1)->orderBy('updated_at', 'desc')->paginate(40);
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('updated_at', 'desc')->take(20)->get();
        $phimhot_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('updated_at', 'desc')->take(10)->get();
        return view('pages.category', compact('category', 'country', 'genre', 'cate_slug', 'movie', 'phimhot_sidebar', 'phimhot_trailer'));
    }
    public function genre($slug)
    {
        $category = Category::orderBy('id', 'desc')->where('status', 1)->get();
        $country = Country::orderBy('id', 'desc')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'desc')->where('status', 1)->get();

        $genre_slug = Genre::where('slug', $slug)->first();

        $movie_genre = MovieGenre::where('genre_id', $genre_slug->id)->get();
        $many_genre = [];
        foreach ($movie_genre as $key => $mov) {
            $many_genre[] = $mov->movie_id;
        }

        $movie = Movie::whereIn('id', $many_genre)->where('status', 1)->orderBy('updated_at', 'desc')->paginate(40);
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('updated_at', 'desc')->take(20)->get();
        $phimhot_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('updated_at', 'desc')->take(10)->get();
        return view('pages.genre', compact('category', 'country',  'genre', 'genre_slug', 'movie', 'phimhot_sidebar', 'phimhot_trailer'));
    }

    public function country($slug)
    {
        $category = Category::orderBy('id', 'desc')->where('status', 1)->get();
        $country = Country::orderBy('id', 'desc')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'desc')->where('status', 1)->get();

        $country_slug = Country::where('slug', $slug)->first();

        $movie = Movie::where('country_id', $country_slug->id)->where('status', 1)->orderBy('updated_at', 'desc')->paginate(40);
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('updated_at', 'desc')->take(20)->get();
        $phimhot_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('updated_at', 'desc')->take(10)->get();
        return view('pages.country', compact('category', 'country', 'genre', 'country_slug', 'movie', 'phimhot_sidebar', 'phimhot_trailer'));
    }


    public function movie($slug)
    {
        $category = Category::orderBy('id', 'desc')->where('status', 1)->get();
        $country = Country::orderBy('id', 'desc')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'desc')->where('status', 1)->get();

        $movie = Movie::with('rCategory', 'rGenre', 'rCountry')->where('slug', $slug)->where('status', 1)->first();
        $episode_tapdau = Episode::with('rMovie')->where('movie_id', $movie->id)->orderBy('episode', 'asc')->take(1)->first();
        $movie_related = Movie::with('rCategory', 'rGenre', 'rCountry', 'rMovie_Genre','rMovie_Category')->where('category_id', $movie->category_id)->orderBy(DB::raw('RAND()'))->whereNotIn('slug', [$slug])->where('status', 1)->get();
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('updated_at', 'desc')->take(20)->get();
        $phimhot_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('updated_at', 'desc')->take(10)->get();
        //Lấy 3 tập gần nhất
        $episode = Episode::with('rMovie')->where('movie_id', $movie->id)->orderBy('episode', 'desc')->take(3)->get();
        //Lấy tổng phim đã ra mắt
        $episode_current_list = Episode::with('rMovie')->where('movie_id', $movie->id)->get();
        $episode_current_list_count = $episode_current_list->count();

        //Đánh giá phim
        $rating = Rating::where('movie_id', $movie->id)->avg('rating');
        $rating = round($rating);
        $count_total = Rating::where('movie_id', $movie->id)->count();

        return view('pages.movie', compact('category', 'country', 'genre', 'movie', 'movie_related', 'phimhot_sidebar', 'phimhot_trailer', 'episode', 'episode_tapdau', 'episode_current_list_count', 'rating', 'count_total'));
    }

    public function _year($year)
    {
        $category = Category::orderBy('id', 'desc')->where('status', 1)->get();
        $country = Country::orderBy('id', 'desc')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'desc')->where('status', 1)->get();

        $year_movie = $year;

        $movie = Movie::where('year', $year_movie)->where('status', 1)->orderBy('updated_at', 'desc')->paginate(40);
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('updated_at', 'desc')->take(20)->get();
        $phimhot_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('updated_at', 'desc')->take(10)->get();
        return view('pages.year', compact('category', 'country', 'genre', 'year_movie', 'movie', 'phimhot_sidebar', 'phimhot_trailer'));
    }

    public function _tag($tag)
    {
        $category = Category::orderBy('id', 'desc')->where('status', 1)->get();
        $country = Country::orderBy('id', 'desc')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'desc')->where('status', 1)->get();

        $movie = Movie::where('tags', 'LIKE', '%' . $tag . '%')->where('status', 1)->orderBy('updated_at', 'desc')->paginate(40);
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('updated_at', 'desc')->take(20)->get();
        $phimhot_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('updated_at', 'desc')->take(10)->get();
        return view('pages.tag', compact('category', 'country', 'genre', 'tag', 'movie', 'phimhot_sidebar', 'phimhot_trailer'));
    }
    public function watch($slug, $tap)
    {
        $category = Category::orderBy('id', 'desc')->where('status', 1)->get();
        $country = Country::orderBy('id', 'desc')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'desc')->where('status', 1)->get();

        $movie = Movie::with('rCategory', 'rGenre', 'rCountry', 'rEpisode')->where('slug', $slug)->where('status', 1)->first();

        $movie_related = Movie::with('rCategory', 'rGenre', 'rCountry', 'rMovie_Genre')->where('category_id', $movie->category_id)->orderBy(DB::raw('RAND()'))->whereNotIn('slug', [$slug])->where('status', 1)->get();
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('updated_at', 'desc')->take(20)->get();
        $phimhot_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('updated_at', 'desc')->take(10)->get();
        $tapphim = $tap;
        $episode = Episode::with('rMovie')->where('movie_id', $movie->id)->where('episode', $tap)->first();
        //Cập nhật lượt xem
        Movie::where('slug', $slug)->update([
            'views' => $movie->views + 1
        ]);
        return view('pages.watch', compact('category', 'country', 'genre', 'movie', 'movie_related', 'phimhot_sidebar', 'phimhot_trailer', 'episode', 'tapphim'));
    }

    public function episode()
    {
        return view('pages.episode');
    }

    public function filter_movie()
    {



        $sapxep = $_GET['order'];
        $genre_id = $_GET['genre_id'];
        $country_id = $_GET['country_id'];
        $year = $_GET['year'];
        if ($sapxep == '' && $genre_id == '' && $country_id == '' && $year == '') {
            return redirect()->back();
        } else {
            $category = Category::orderBy('id', 'desc')->where('status', 1)->get();
            $country = Country::orderBy('id', 'desc')->where('status', 1)->get();
            $genre = Genre::orderBy('id', 'desc')->where('status', 1)->get();
            $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('updated_at', 'desc')->take(20)->get();
            $phimhot_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('updated_at', 'desc')->take(10)->get();

            $movie = Movie::with('rCategory', 'rGenre', 'rCountry', 'rEpisode')
                ->orWhere('genre_id', $genre_id)->orWhere('country_id', $country_id)
                ->orWhere('year', $year)->orderBy('updated_at', 'desc')
                ->paginate(30);
            return view('pages.locphim', compact('category', 'country', 'genre', 'phimhot_sidebar', 'phimhot_trailer', 'movie'));
        }
    }

    public function add_rating(Request $request)
    {
        $data = $request->all();

        $ip_address = $request->ip();
        $rating_count = DB::table('ratings')->where('movie_id', $data['movie_id'])->where('ip_address', $ip_address)->count();
        if ($rating_count > 0) {
            echo 'exist';
        } else {
            DB::table('ratings')->insert([
                'movie_id' => $data['movie_id'],
                'rating' => $data['index'],
                'ip_address' => $ip_address
            ]);
            echo 'done';
        }
    }
}
//Đến bài 80 trong chuỗi phim