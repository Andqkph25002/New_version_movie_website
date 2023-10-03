@extends('layout')
@section('content')
    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="yoast_breadcrumb hidden-xs"><span><span><a href="">Lọc Phim</a> »
                                    <span class="breadcrumb_last" aria-current="page">2023</span></span></span></div>
                    </div>
                </div>
            </div>
            <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                <div class="ajax"></div>
            </div>
        </div>
        <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
            <section>
                <div class="section-bar clearfix">
                    <h1 class="section-title"><span>Phim 2020</span></h1>
                </div>
                <div class="section-bar clearfix">
                    <div class="row">
                        <form action="{{ route('locphim') }}" method="get">

                            <div class="col-md-2">
                                <div class="form-group">

                                    <select name="order" class="form-control" id="exampleFormControlSelect1">
                                        <option value="">Sắp xếp</option>
                                        <option value="date">Ngày đăng</option>
                                        <option value="year">Năm sản xuất</option>
                                        <option value="name_a_z">Tên phim</option>
                                        <option value="views">Lượt xem</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">

                                    <select name="genre_id" class="form-control" id="exampleFormControlSelect1">
                                        <option value="">--Thể loại--</option>
                                        @foreach ($genre as $item)
                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">

                                    <select name="country_id" class="form-control" id="exampleFormControlSelect1">
                                        <option value="">--Quốc gia--</option>
                                        @foreach ($country as $item)
                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">

                                    {!! Form::selectYear('year', 2003, 2025, '', [
                                        'class' => 'form-control',
                                        'placeholder' => 'Năm',
                                    ]) !!}
                                </div>
                            </div>

                            <div class="col-md-1">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-default" value="Lọc phim">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="halim_box">

                    @foreach ($movie as $item)
                        <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                            <div class="halim-item">
                                <a class="halim-thumb" href="{{ route('movie', $item->slug) }}">
                                    <figure> @php
                                        $image_check = substr($item->image, 0, 5);
                                    @endphp
                                    @if ($image_check == 'https')
                                        <img class="lazy img-responsive" src="{{ $item->image }}"
                                            alt="{{ $item->title }}" title="{{ $item->title }}">
                                    @else
                                        <img class="lazy img-responsive" src="{{ Storage::url($item->image) }}"
                                            alt="{{ $item->title }}" title="{{ $item->title }}">
                                    @endif
                                    </figure>
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
                                    </span>
                                    <span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                                        @if ($item->phude == 0)
                                            Phụ đề
                                            @if ($item->season != 0)
                                                - Season {{ $item->season }}
                                            @endif
                                        @else
                                            Thuyết minh
                                            @if ($item->season != 0)
                                                - Season {{ $item->season }}
                                            @endif
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
                <div class="clearfix"></div>
                <div class="text-center">
                    <ul class='page-numbers'>
                        {{ $movie->links() }}
                    </ul>
                </div>
            </section>
        </main>
        @include('pages.includes.sidebar')
    </div>
@endsection
