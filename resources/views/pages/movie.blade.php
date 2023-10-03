@extends('layout')
@section('content')
    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="yoast_breadcrumb hidden-xs">
                            <span><span><a
                                        href="{{ route('category', $movie->rCategory->slug) }}">{{ $movie->rCategory->title }}</a>
                                    »
                                    @foreach ($movie->rMovie_Genre as $item)
                                        <a href="{{ route('genre', $item->slug) }}">{{ $item->title }} | </a>
                                    @endforeach
                                    <span><a
                                            href="{{ route('country', $movie->rCountry->slug) }}">{{ $movie->rCountry->title }}</a>
                                        » <span class="breadcrumb_last"
                                            aria-current="page">{{ $movie->title }}</span></span>
                                </span></span>
                        </div>
                    </div>
                </div>
            </div>
            <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                <div class="ajax"></div>
            </div>
        </div>
        <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
            <section id="content" class="test">
                <div class="clearfix wrap-content">

                    <div class="halim-movie-wrapper">
                        <div class="title-block">
                            <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="38424">
                                <div class="halim-pulse-ring"></div>
                            </div>
                            <div class="title-wrapper" style="font-weight: bold;">
                                Bookmark
                            </div>
                        </div>
                        <div class="movie_info col-xs-12">
                            <div class="movie-poster col-md-3">
                                @php
                                    $image_check = substr($movie->image, 0, 5);
                                @endphp
                                @if ($image_check == 'https')
                                    <img class="movie-thumb" src="{{ $movie->image }}" alt="{{ $movie->title }}">
                                @else
                                    <img class="movie-thumb" src="{{ Storage::url($movie->image) }}"
                                        alt="{{ $movie->title }}">
                                @endif

                                @if ($movie->resolution != 5)
                                    <div class="bwa-content">
                                        <div class="loader"></div>
                                        @if (isset($episode_tapdau->episode))
                                            <a href="{{ route('watch.page', ['slug' => $movie->slug, 'tap' => $episode_tapdau->episode]) }}"
                                                class="bwac-btn">
                                                <i class="fa fa-play"></i>
                                            </a>
                                        @else
                                            <a href="#watch_trailer" class="bwac-btn">
                                                <i class="fa fa-play"></i>
                                            </a>
                                        @endif

                                    </div>
                                @else
                                    <a href="#watch_trailer" style="display: block" class="btn btn-primary">Xem trailer</a>
                                @endif

                            </div>
                            <div class="film-poster col-md-9">
                                <h1 class="movie-title title-1"
                                    style="display:block;line-height:35px;margin-bottom: -14px;color: #ffed4d;text-transform: uppercase;font-size: 18px;">
                                    {{ $movie->title }}</h1>
                                <h2 class="movie-title title-2" style="font-size: 12px;">{{ $movie->name_eng }}</h2>
                                <ul class="list-info-group">
                                    <li class="list-info-group-item"><span>Trạng Thái</span> : <span class="quality">
                                            @if ($movie->resolution == 0)
                                                HD
                                            @elseif($movie->resolution == 1)
                                                SD
                                            @elseif($movie->resolution == 2)
                                                HD CAM
                                            @elseif($movie->resolution == 3)
                                                CAM
                                            @elseif($movie->resolution == 4)
                                                FULL HD
                                            @else
                                                Trailer
                                            @endif
                                        </span>
                                        @if ($movie->resolution != 5)
                                            <span class="episode">

                                                @if ($movie->phude == 0)
                                                    Phụ đề
                                                @else
                                                    Thuyết minh
                                                @endif
                                            </span>
                                        @endif

                                    </li>
                                    <li class="list-info-group-item"><span>Điểm IMDb</span> : <span
                                            class="imdb">7.2</span></li>
                                    <li class="list-info-group-item"><span>Thời lượng</span> : {{ $movie->thoi_luong }}
                                    </li>
                                    <li class="list-info-group-item"><span>Số tập</span> :
                                        @if ($movie->thuocphim === 'phimbo')
                                            {{ $episode_current_list_count }} /
                                            {{ $movie->sotap }} - @if ($episode_current_list_count == $movie->sotap)
                                                Hoàn thành
                                            @else
                                                Đang cập nhật
                                            @endif
                                        @else
                                            Phim lẻ
                                        @endif

                                    </li>

                                    <li class="list-info-group-item"><span>Thể loại</span> :
                                        @foreach ($movie->rMovie_Genre as $item)
                                            <a href="{{ route('genre', $item->slug) }}"
                                                rel="category tag">{{ $item->title }} | </a>
                                        @endforeach
                                    </li>





                                    <li class="list-info-group-item"><span>Danh mục</span> :
                                        @foreach ($movie->rMovie_Category as $item)
                                            <a href="{{ route('category', $item->slug) }}"
                                                rel="category tag">{{ $item->title }} | </a>
                                        @endforeach
                                    </li>



                                    <li class="list-info-group-item"><span>Quốc gia</span> : <a
                                            href="{{ route('country', $movie->rCountry->slug) }}"
                                            rel="tag">{{ $movie->rCountry->title }}</a></li>

                                    <li class="list-info-group-item"><span>Tập phim mới nhất</span> :
                                        @if ($movie->thuocphim === 'phimbo')
                                            @foreach ($episode as $item)
                                                <a href="{{ route('watch.page', ['slug' => $item->rMovie->slug, 'tap' => $item->episode]) }}"
                                                    rel="tag">Tập
                                                    {{ $item->episode }} | </a>
                                            @endforeach
                                        @else
                                            Full
                                        @endif



                                    </li>

                                    <ul class="list-inline rating" title="Average Rating">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @php
                                                if ($i <= $rating) {
                                                    $color = 'color:#ffcc00;';
                                                } else {
                                                    $color = 'color:#ccc;';
                                                }
                                                
                                            @endphp

                                            <li title="star_rating"
                                                style="cursor:pointer; {{ $color }} font-size:40px" class="rating"
                                                id="{{ $movie->id }}-{{ $i }}"
                                                data-index="{{ $i }}" data-movie_id="{{ $movie->id }}"
                                                data-rating="{{ $rating }}">
                                                &#9733;
                                            </li>
                                        @endfor

                                    </ul>
                                    <span class="total_rating">Đánh giá : {{ $rating }} / {{ $count_total }}</span>



                                </ul>
                                <div class="movie-trailer hidden"></div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div id="halim_trailer"></div>
                    <div class="clearfix"></div>
                    <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Nội dung phim</span></h2>
                    </div>
                    <div class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                            <article id="post-38424" class="item-content">
                                {{ $movie->description }}
                            </article>
                        </div>
                    </div>

                    <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Tag phim</span></h2>
                    </div>
                    <div class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                            <article id="post-38424" class="item-content">



                                @if ($movie->tags != null)
                                    @php
                                        $tags = [];
                                        $tags = explode(',', $movie->tags);
                                    @endphp
                                    <ul>
                                        @foreach ($tags as $key => $tag)
                                            <li><a href="{{ url('tag/' . $tag) }}">{{ $tag }}</a></li>
                                        @endforeach


                                    </ul>
                                @else
                                    {{ $movie->title }}
                                @endif

                            </article>
                        </div>
                    </div>

                    <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Trailer phim</span></h2>
                    </div>
                    <div class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                            <article id="watch_trailer" class="item-content">
                                <iframe width="100%" height="380"
                                    src="https://www.youtube.com/embed/{{ $movie->trailer }}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen></iframe>
                            </article>
                        </div>
                    </div>

                    <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Bình luận</span></h2>
                    </div>
                    <div class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                            @php
                                $current_url = Request::url();
                            @endphp
                            <article id="watch_trailer" class="item-content">
                                <div class="fb-comments" data-href="{{ $current_url }}" data-width="100%"
                                    data-numposts="10" style="color: aliceblue"></div>
                            </article>
                        </div>
                    </div>
                </div>
            </section>
            <section class="related-movies">
                <div id="halim_related_movies-2xx" class="wrap-slider">
                    <div class="section-bar clearfix">
                        <h3 class="section-title"><span>CÓ THỂ BẠN MUỐN XEM</span></h3>
                    </div>
                    <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">

                        @foreach ($movie_related as $item)
                            <article class="thumb grid-item post-38498">
                                <div class="halim-item">
                                    <a class="halim-thumb" href="{{ route('movie', $item->slug) }}"
                                        title="{{ $item->title }}">
                                        <figure><img class="lazy img-responsive" src="{{ Storage::url($item->image) }}"
                                                alt="{{ $item->title }}" title="{{ $item->title }}"></figure>
                                        <span class="status">
                                            @if ($item->resolution == 0)
                                                HD
                                            @elseif($item->resolution == 1)
                                                SD
                                            @elseif($item->resolution == 2)
                                                HD CAM
                                            @elseif($item->resolution == 3)
                                                CAM
                                            @elseif($item->resolution == 4)
                                                FULL HD
                                            @else
                                                Trailer
                                            @endif
                                        </span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                                            @if ($item->phude == 0)
                                                Phụ đề
                                            @else
                                                Thuyết minh
                                            @endif
                                        </span>
                                        <div class="icon_overlay"></div>
                                        <div class="halim-post-title-box">
                                            <div class="halim-post-title ">
                                                <p class="entry-title">{{ $item->title }}</p>
                                                <p class="original_title">{{ $item->name_eng }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </article>
                        @endforeach
                    </div>
                    <script>
                        jQuery(document).ready(function($) {
                            var owl = $('#halim_related_movies-2');
                            owl.owlCarousel({
                                loop: true,
                                margin: 4,
                                autoplay: true,
                                autoplayTimeout: 4000,
                                autoplayHoverPause: true,
                                nav: true,
                                navText: ['<i class="hl-down-open rotate-left"></i>',
                                    '<i class="hl-down-open rotate-right"></i>'
                                ],
                                responsiveClass: true,
                                responsive: {
                                    0: {
                                        items: 2
                                    },
                                    480: {
                                        items: 3
                                    },
                                    600: {
                                        items: 4
                                    },
                                    1000: {
                                        items: 4
                                    }
                                }
                            })
                        });
                    </script>
                </div>
            </section>
        </main>
        @include('pages.includes.sidebar')
    </div>
@endsection
