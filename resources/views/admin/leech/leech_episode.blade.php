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

                        <th scope="col">Tên phim</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Số tập</th>
                        <th scope="col">Tập phim</th>
                        <th scope="col">Server</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>


                    @foreach ($response['episodes'] as $key => $item)
                        <tr>

                            <td scope="col">{{ $response['movie']['name'] }}</td>
                            <td scope="col">{{ $response['movie']['slug'] }}</td>
                            <td scope="col">{{ $response['movie']['episode_total'] }}</td>
                            <td>{{ $item['server_name'] }}</td>
                            <td>
                                @foreach ($item['server_data'] as $item)
                                    <ul>
                                        <li>Tập : {{ $item['name'] }}</li>
                                        <input type="text" class="form-control" value="{{ $item['link_embed'] }}">
                                        <input type="text" class="form-control" value="{{ $item['link_m3u8'] }}">
                                    </ul>
                                @endforeach
                            </td>

                            <td>
                                @php
                                $movie = \App\Models\Movie::where('slug' , $response['movie']['slug'])->first();

                            @endphp
                            @if (!$movie)
                            <form action="{{ route('leech-movie-store', $response['movie']['slug']) }}" method="post">
                                @csrf
                                <input type="submit" class="btn btn-success" value="Add Movie">
                            </form>
                            <form action="{{ route('leech-episode-store', $response['movie']['slug']) }}"
                                method="post">
                                @csrf
                                <input type="submit" value="Thêm tập phim" class="btn btn-success">
                            </form>
                            @else
                              <input type="submit" disabled value="Đã thêm" class="btn btn-success">
                            @endif 
                               
                                <form action="" method="post">
                                    @csrf
                                    <input type="submit" value="Xóa tập phim" class="btn btn-danger">
                                </form>
                            </td>


                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
