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
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Tập phim</th>
                        <th scope="col">Link phim</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Ngày cập nhật</th>

                        <th scope="col">Quản lý</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list_episode as $key => $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->rMovie->title }}</td>
                            <td><img src="/storage/{{ $item->rMovie->image }}" width="120" height="150" alt="">
                            </td>
                            <td>{{ $item->episode }}</td>
                            <td>{{ $item->link_phim }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->updated_at }}</td>

                            <td>
                                <a href="{{ route('episode.edit', $item->id) }}" class="btn btn-primary">Sửa</a>

                                {!! Form::open([
                                    'method' => 'DELETE',
                                    'route' => ['episode.destroy', $item->id],
                                    'onsubmit' => 'return confirm("Are you sure ?")',
                                ]) !!}
                                {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}

                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
@endsection
