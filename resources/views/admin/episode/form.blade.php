@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card">
                    <a href="{{ route('episode.index') }}" class="btn btn-success">Danh sách tập phim</a>
                    <div class="card-header">Quản lý tập phim</div>

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


                        @if (!isset($episode))
                            {!! Form::open([
                                'route' => 'episode.store',
                                'method' => 'POST',
                                'enctype' => 'multipart/form-data',
                                'autocomplete' => 'off',
                            ]) !!}
                        @else
                            {!! Form::open([
                                'route' => ['episode.update', $episode->id],
                                'method' => 'PUT',
                                'enctype' => 'multipart/form-data',
                            ]) !!}
                        @endif


                        <div class="form-group">
                            {!! Form::label('movie', 'Chọn phim', []) !!}
                            {!! Form::select(
                                'movie_id',
                                ['0' => 'Chọn phim', 'Phim mới nhất' => $list_movie],
                                isset($episode) ? $episode->movie_id : '',
                                [
                                    'class' => 'form-control',
                                    'id' => 'select_movie',
                                ],
                            ) !!}
                        </div>


                        <div class="form-group">
                            {!! Form::label('linkphim', 'Link phim', []) !!}
                            {!! Form::text('link_phim', isset($episode) ? $episode->link_phim : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập link phim ...',
                                'id' => 'link_phim',
                            ]) !!}
                        </div>
                        @if (isset($episode->episode))
                            <div class="form-group">
                                {!! Form::label('episode', 'Tập phim', []) !!}
                                {!! Form::text('episode', isset($episode) ? $episode->episode : '', [
                                    'class' => 'form-control',
                                    'placeholder' => '',
                                    'id' => 'episode',
                                    isset($episode) ? 'readonly' : '',
                                ]) !!}
                            </div>
                        @else
                            <div class="form-group">
                                {!! Form::label('episode', 'Tập phim', []) !!}
                                <select name="episode" id="show_movie" class="form-control">

                                </select>
                            </div>
                        @endif


                        @if (!isset($episode))
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
