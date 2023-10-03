<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Episode;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\MovieGenre;
use App\Models\MovieCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;



class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Movie::with('rCategory', 'rMovie_Genre', 'rCountry', 'rGenre')->orderBy('id', 'desc')->get();
        $category = Category::pluck('title', 'id');
        $country = Country::pluck('title', 'id');
        $path = public_path() . "/json_file/";
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }
        File::put($path . 'movie.json', json_encode($list));
        return view('admin.movie.index', compact('list', 'category', 'country'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = Movie::orderBy('id', 'desc')->get();
        $category = Category::with('rCategory')->pluck('title', 'id');
        $genre = Genre::with('rGenre')->pluck('title', 'id');
        $list_genre = Genre::all();
        $list_category = Category::all();
        $country = Country::with('rCountry')->pluck('title', 'id');
        return view('admin.movie.form', compact('list', 'category', 'genre', 'country', 'list_genre', 'list_category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $movie = new Movie();
        $movie->title = $data['title'];
        $movie->description = $data['description'];
        $movie->slug = $data['slug'];
        $movie->trailer = $data['trailer'];
        $movie->phim_hot = $data['phim_hot'];
        $movie->resolution = $data['resolution'];
        $movie->status = $data['status'];
        $movie->thoi_luong = $data['thoi_luong'];
        $movie->phude = $data['phude'];
        $movie->tags = $data['tags'];
        $movie->sotap = $data['sotap'];
        $movie->name_eng = $data['name_eng'];


        $movie->country_id = $data['country_id'];
        $movie->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $movie->thuocphim = $data['thuocphim'];

        foreach ($data['genre_id'] as $key => $item) {
            $movie->genre_id = $item[0];
        }
        foreach ($data['category_id'] as $key => $item) {
            $movie->category_id = $item[0];
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = hexdec(uniqid()) . '_' . $image->getClientOriginalName();
            $image->storeAs('public/image/movie/', $fileName);
            $movie->image = 'image/movie/' . $fileName;
        }

        $movie->save();

        //Thêm nhiểu thể loại
        $movie->rMovie_Genre()->attach($data['genre_id']);
        $movie->rMovie_Category()->attach($data['category_id']);
        return redirect()->route('movie.index')->with('success', 'Thêm phim thành công !');
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
        $movie = Movie::find($id);
        $movie_genre  = $movie->rMovie_Genre;
          $movie_category  = $movie->rMovie_Category;
        $list = Movie::orderBy('id', 'desc')->get();
        $category = Category::pluck('title', 'id');
        $genre = Genre::pluck('title', 'id');
        $list_genre = Genre::all();
        $list_category = Category::all();

        $country = Country::pluck('title', 'id');
        return view('admin.movie.form', compact('list', 'movie', 'category', 'genre', 'country', 'list_genre', 'movie_genre', 'list_category','movie_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $movie = Movie::find($id);
        $movie->title = $data['title'];
        $movie->description = $data['description'];
        $movie->resolution = $data['resolution'];
        $movie->slug = $data['slug'];
        $movie->trailer = $data['trailer'];
        $movie->thoi_luong = $data['thoi_luong'];
        $movie->phude = $data['phude'];
        $movie->phim_hot = $data['phim_hot'];
        $movie->name_eng = $data['name_eng'];
        $movie->status = $data['status'];
        $movie->sotap = $data['sotap'];
        $movie->thuocphim = $data['thuocphim'];
        $movie->tags = $data['tags'];


        $movie->country_id = $data['country_id'];
        $movie->updated_at = Carbon::now('Asia/Ho_Chi_Minh');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            Storage::delete('/public/' . $movie->image);
            $fileName = hexdec(uniqid()) . '_' . $image->getClientOriginalName();
            $image->storeAs('public/image/movie/', $fileName);
            $movie->image = 'image/movie/' . $fileName;
        }
        foreach ($data['genre_id'] as $key => $item) {
            $movie->genre_id = $item[0];
        }
        foreach ($data['category_id'] as $key => $item) {
            $movie->category_id = $item[0];
        }


        $movie->save();

        $movie->rMovie_Genre()->sync($data['genre_id']);
        $movie->rMovie_Category()->sync($data['category_id']);
        return redirect()->route('movie.index')->with('success', 'Cập nhật phim thành công !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = Movie::find($id);
        $movie_genre = MovieGenre::whereIn('movie_id', [$id]);
        $movie_category = MovieCategory::whereIn('movie_id', [$id]);
        $episode = Episode::whereIn('movie_id', [$id]);
        if ($movie) {
            Storage::delete('/public/' . $movie->image);
            $movie_genre->delete();
            $movie_category->delete();
            $episode->delete();
            $movie->delete();
            return redirect()->route('movie.index')->with('success', 'Xóa thành công');
        }
    }

    public function updateYear(Request $request)
    {
        $data = $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->year = $data['year'];
        $movie->save();
    }
    public function updateSeason(Request $request)
    {
        $data = $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->season = $data['season'];
        $movie->save();
    }

    public function updateTopView(Request $request)
    {
        $data = $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->topview = $data['topview'];
        $movie->save();
    }
    public function filterTopView(Request $request)
    {
        $data = $request->all();
        $movie = Movie::where('topview', $data['value'])->orderBy('updated_at', 'desc')->take(20)->get();
        $output = '';
        foreach ($movie as $key => $item) {
            if ($item->resolution == 0) {
                $text = "HD";
            } else if ($item->resolution == 1) {
                $text = "SD";
            } else if ($item->resolution == 2) {
                $text = "HD CAM";
            } else if ($item->resolution == 3) {
                $text = "CAM";
            } else if ($item->resolution == 4) {
                $text = "FULL HD";
            } else {
                $text = "Trailer";
            }
            $output .= '<div class="item post-37176">
            <a href="' . url('/phim/' . $item->slug) . '" title="' . $item->title . '">
                <div class="item-link">
                    <img src="' . Storage::url($item->image) . '"
                        class="lazy post-thumb" alt="' . $item->title . '"
                        title="' . $item->title . '" />
                    <span class="is_trailer">' . $text . '</span>
                </div>
                <p class="title">' . $item->title . '</p>
            </a>
            <div class="viewsCount" style="color: #9d9d9d;">' . $item->views . ' lượt xem</div>
            <div style="float: left;">
                <span class="user-rate-image post-large-rate stars-large-vang"
                    style="display: block;/* width: 100%; */">
                    <span style="width: 0%"></span>
                </span>
            </div>
        </div>';
        }
        echo $output;
    }

    public function filterTopViewDefault(Request $request)
    {
        $data = $request->all();
        $movie = Movie::where('topview', 0)->orderBy('updated_at', 'desc')->take(20)->get();
        $output = '';
        foreach ($movie as $key => $item) {
            if ($item->resolution == 0) {
                $text = "HD";
            } else if ($item->resolution == 1) {
                $text = "SD";
            } else if ($item->resolution == 2) {
                $text = "HD CAM";
            } else if ($item->resolution == 3) {
                $text = "CAM";
            } else if ($item->resolution == 4) {
                $text = "FULL HD";
            } else {
                $text = "Trailer";
            }
            $output .= '<div class="item post-37176">
            <a href="' . url('/phim/' . $item->slug) . '" title="' . $item->title . '">
                <div class="item-link">
                    <img src="' . Storage::url($item->image) . '"
                        class="lazy post-thumb" alt="' . $item->title . '"
                        title="' . $item->title . '" />
                    <span class="is_trailer">' . $text . '</span>
                </div>
                <p class="title">' . $item->title . '</p>
            </a>
            <div class="viewsCount" style="color: #9d9d9d;">' . $item->views . ' lượt xem</div>
            <div style="float: left;">
                <span class="user-rate-image post-large-rate stars-large-vang"
                    style="display: block;/* width: 100%; */">
                    <span style="width: 0%"></span>
                </span>
            </div>
        </div>';
        }
        echo $output;
    }

    public function updateCategoryMovie(Request $request)
    {
        $data  = $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->category_id = $data['category_id'];
        $movie->save();
    }
    public function updateCountryMovie(Request $request)
    {
        $data  = $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->country_id = $data['country_id'];
        $movie->save();
    }
    public function updateStatusMovie(Request $request)
    {
        $data  = $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->status = $data['status'];
        $movie->save();
    }
    public function updateResolutionMovie(Request $request)
    {
        $data  = $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->resolution = $data['resolution'];
        $movie->save();
    }
    public function updatePhudeMovie(Request $request)
    {
        $data  = $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->phude = $data['phude'];
        $movie->save();
    }
    public function updatePhimhotMovie(Request $request)
    {
        $data  = $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->phim_hot = $data['phim_hot'];
        $movie->save();
    }
    public function updateThuocphimMovie(Request $request)
    {
        $data  = $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->thuocphim = $data['thuocphim'];
        $movie->save();
    }
    public function updateImageMovie(Request $request)
    {
        $get_image = $request->file("file");
        $movie_id = $request->movie_id;
        if ($get_image) {
            $movie = Movie::find($movie_id);
            Storage::delete('/public/' . $movie->image);
            $fileName = hexdec(uniqid()) . '_' . $get_image->getClientOriginalName();
            $get_image->storeAs('public/image/movie/', $fileName);
            $movie->image = 'image/movie/' . $fileName;
            $movie->save();
        }
    }
}
