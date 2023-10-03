@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="mt-4">

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

            <table class="table table-hover" id="table_movie">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên phim</th>
                        <th scope="col">Tên chính thức</th>
                        <th scope="col">Image</th>

                        <th scope="col">Image poster</th>
                        <th scope="col">Slug</th>
                        <th scope="col">_Id</th>
                        <th scope="col">Year</th>
                        <th scope="col">Quản lý</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($response['items'] as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['origin_name'] }}</td>
                            <td><img src="{{ $response['pathImage'] . $item['thumb_url'] }}" alt="" width="150"
                                    height="160"></td>
                            <td><img src="{{ $response['pathImage'] . $item['poster_url'] }}" alt="" width="150"
                                    height="160"></td>
                            <td>{{ $item['slug'] }}</td>
                            <td>{{ $item['_id'] }}</td>
                            <td>{{ $item['year'] }}</td>
                            <td>
                                <a href="{{ route('leech-detail-movie', $item['slug']) }}" class="btn btn-primary">Chi
                                    tiết</a>
                                    @php
                                        $movie = \App\Models\Movie::where('slug' , $item['slug'])->first();

                                    @endphp
                                    @if (!$movie)
                                    <form action="{{ route('leech-movie-store', $item['slug']) }}" method="post">
                                        @csrf
                                        <input type="submit" class="btn btn-success" value="Add Movie">
                                    </form>
                                    @else
                                        <input type="submit" class="btn btn-primary" disabled value="Đã thêm">
                                    @endif
                              


                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
@endsection
