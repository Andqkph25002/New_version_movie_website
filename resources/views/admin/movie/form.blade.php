@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card">
                    <a href="{{ route('movie.index') }}" class="btn btn-success">Danh sách phim</a>
                    <div class="card-header">Quản lý phim</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif


                        @if (!isset($movie))
                            {!! Form::open(['route' => 'movie.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        @else
                            {!! Form::open(['route' => ['movie.update', $movie->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                        @endif

                        <div class="form-group">
                            {!! Form::label('title', 'Title', []) !!}
                            {!! Form::text('title', isset($movie) ? $movie->title : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập tiêu đề ...',
                                'id' => 'title',
                                'onkeyup' => 'ChangeToSlug()',
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Slug', []) !!}
                            {!! Form::text('slug', isset($movie) ? $movie->slug : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập slug ...',
                                'id' => 'slug',
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Name English', 'Name English', []) !!}
                            {!! Form::text('name_eng', isset($movie) ? $movie->name_eng : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập tên phim tiếng anh ...',
                                'id' => 'name_eng',
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('trailer', 'Trailer', []) !!}
                            {!! Form::text('trailer', isset($movie) ? $movie->trailer : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Trailer phim ....',
                                'id' => 'trailer',
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('description', 'Description', []) !!}
                            {!! Form::textarea('description', isset($movie) ? $movie->description : '', [
                                'style' => 'resize:none',
                                'class' => 'form-control',
                                'placeholder' => 'Nhập mô tả ...',
                                'id' => 'description',
                            ]) !!}
                        </div>


                        {{-- <div class="form-group">
                            {!! Form::label('category', 'Category', []) !!}
                            {!! Form::select('category_id', $category, isset($movie) ? $movie->category_id : '', [
                                'class' => 'form-control',
                                'id' => 'category',
                            ]) !!}
                        </div> --}}
                        <div class="form-group">
                            {!! Form::label('category', 'Category', []) !!} <br>

                            @foreach ($list_category as $item)
                                @if (isset($movie))
                                    {!! Form::checkbox(
                                        'category_id[]',
                                        $item->id,
                                        isset($movie_category) && $movie_category->contains($item->id) ? true : false,
                                    ) !!}
                                @else
                                    {!! Form::checkbox('category_id[]', $item->id, '') !!}
                                @endif

                                {!! Form::label('category', $item->title) !!}
                            @endforeach
                        </div>



                        <div class="form-group">
                            {!! Form::label('genre', 'Genre', []) !!} <br>

                            @foreach ($list_genre as $item)
                                @if (isset($movie))
                                    {!! Form::checkbox(
                                        'genre_id[]',
                                        $item->id,
                                        isset($movie_genre) && $movie_genre->contains($item->id) ? true : false,
                                    ) !!}
                                @else
                                    {!! Form::checkbox('genre_id[]', $item->id, '') !!}
                                @endif

                                {!! Form::label('genre', $item->title) !!}
                            @endforeach
                        </div>
                        <div class="form-group">
                            {!! Form::label('country', 'Country', []) !!}
                            {!! Form::select('country_id', $country, isset($movie) ? $movie->country_id : '', [
                                'class' => 'form-control',
                                'id' => 'country',
                            ]) !!}
                        </div>


                        <div class="form-group">
                            {!! Form::label('Hot', 'Hot', []) !!}
                            {!! Form::select('phim_hot', ['1' => 'Có', '0' => 'Không'], isset($movie) ? $movie->phim_hot : '', [
                                'class' => 'form-control',
                                'id' => 'phim_hot',
                            ]) !!}
                        </div>


                        <div class="form-group">
                            {!! Form::label('image', 'Image', []) !!}
                            {!! Form::file('image', ['class' => 'form-control', 'id' => 'image']) !!}
                        </div>
                        @if (isset($movie))
                            <div class="form-group mt-2 mb-2">
                                <img id="show_image" src="{{ Storage::url($movie->image) }}" width="100" height="100"
                                    alt="">
                            </div>
                        @else
                            <div class="form-group mt-2 mb-2">
                                <img id="show_image"
                                    src="https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg?20200913095930"
                                    width="100" height="100" alt="">
                            </div>
                        @endif

                        <div class="form-group">
                            {!! Form::label('resolution', 'Resolution', []) !!}
                            {!! Form::select(
                                'resolution',
                                ['0' => 'HD', '1' => 'SD', '2' => 'HD CAM', '3' => 'CAM', '4' => 'FULL HD', '5' => 'Trailer'],
                                isset($movie) ? $movie->resolution : '',
                                [
                                    'class' => 'form-control',
                                    'id' => 'resolution',
                                ],
                            ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Thời lượng', 'Thời lượng', []) !!}
                            {!! Form::text('thoi_luong', isset($movie) ? $movie->thoi_luong : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập thời lượng phim ...',
                                'id' => 'thoi_luong',
                            ]) !!}
                        </div>


                        <div class="form-group">
                            {!! Form::label('sotap', 'Episode', []) !!}
                            {!! Form::text('sotap', isset($movie) ? $movie->sotap : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập số tập ...',
                                'id' => 'sotap',
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('phude', 'Subtitle', []) !!}
                            {!! Form::select('phude', ['0' => 'Phụ đề', '1' => 'Thuyết minh'], isset($movie) ? $movie->phude : '', [
                                'class' => 'form-control',
                                'id' => 'phude',
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Từ khóa', 'Từ khóa', []) !!}
                            {!! Form::textarea('tags', isset($movie) ? $movie->tags : '', [
                                'style' => 'resize:none',
                                'class' => 'form-control',
                                'placeholder' => 'Nhập từ khóa ...',
                                'id' => 'tags',
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('thuocphim', 'Thuộc thể loại phim', []) !!}
                            {!! Form::select(
                                'thuocphim',
                                ['phimle' => 'Phim lẻ', 'phimbo' => 'Phim bộ'],
                                isset($movie) ? $movie->thuocphim : '',
                                [
                                    'class' => 'form-control',
                                    'id' => 'status',
                                ],
                            ) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('status', 'Status', []) !!}
                            {!! Form::select('status', ['1' => 'Hiển thị', '0' => 'Không'], isset($movie) ? $movie->status : '', [
                                'class' => 'form-control',
                                'id' => 'status',
                            ]) !!}
                        </div>
                        @if (!isset($movie))
                            {!! Form::submit('Thêm phim', ['class' => 'btn btn-success mt-4']) !!}
                        @else
                            {!! Form::submit('Cập nhật phim', ['class' => 'btn btn-primary mt-4']) !!}
                        @endif


                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
