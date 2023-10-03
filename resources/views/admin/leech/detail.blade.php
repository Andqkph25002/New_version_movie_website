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

                        <th scope="col">_id</th>
                        <th scope="col">name</th>
                        <th scope="col">slug</th>

                        <th scope="col">origin_name</th>
                        <th scope="col">thumb_url</th>
                        <th scope="col">episode_total</th>
                        <th scope="col">time</th>
                        <th scope="col">episode_current</th>
                        <th scope="col">episode_total</th>
                        <th scope="col">quality</th>
                        <th scope="col">year</th>
                        <th scope="col">time</th>
                        <th scope="col">category</th>
                        <th scope="col">country</th>
                        <th scope="col">Tập phim</th>
                    </tr>
                </thead>
                <tbody>



                    <tr>

                        <td scope="col">{{ $res_movie['_id'] }}</td>
                        <td scope="col">{{ $res_movie['name'] }}</td>
                        <td scope="col">{{ $res_movie['slug'] }}</td>

                        <td scope="col">{{ $res_movie['origin_name'] }}</td>
                        <td scope="col"><img src="{{ $res_movie['poster_url'] }}" width="150" height="150"
                                alt=""></td>
                        <td scope="col">{{ $res_movie['episode_total'] }}</td>
                        <td scope="col">{{ $res_movie['time'] }}</td>
                        <td scope="col">{{ $res_movie['episode_current'] }}</td>
                        <td scope="col">{{ $res_movie['episode_total'] }}</td>
                        <td scope="col">{{ $res_movie['quality'] }}</td>
                        <td scope="col">{{ $res_movie['year'] }}</td>
                        <td scope="col">{{ $res_movie['time'] }}</td>
                        <td scope="col">
                            @foreach ($res_movie['category'] as $cate)
                                <span class="badge text-bg-dark">{{ $cate['name'] }}</span>
                            @endforeach
                        </td>
                        <td scope="col">
                            @foreach ($res_movie['country'] as $cou)
                                <span class="badge text-bg-dark">{{ $cou['name'] }}</span>
                            @endforeach
                        </td>
                        <td><a href="{{ route('leech-episode-movie', $res_movie['slug']) }}" class="btn btn-success">Tập
                                phim</a></td>

                    </tr>

                </tbody>
            </table>
        </div>
    </div>
@endsection
