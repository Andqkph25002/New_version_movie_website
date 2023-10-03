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
                        <th scope="col">Image</th>
                        <th scope="col">Slug</th>
                        {{-- <th scope="col">Trailer</th> --}}
                        <th scope="col">Mô tả</th>
                        <th scope="col">Danh mục</th>
                        <th scope="col">Thể loại</th>
                        <th scope="col">Quốc gia</th>
                        <th scope="col">Phim hot</th>
                        <th scope="col">Định dạng</th>
                        <th scope="col">Phụ đề</th>
                        <th scope="col">Thời lượng</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Ngày cập nhật</th>
                        <th scope="col">Năm phim</th>
                        <th scope="col">Top View</th>
                        <th scope="col">Từ khóa</th>
                        <th scope="col">Seasion</th>
                        <th scope="col">Episode</th>
                        <th scope="col">Thuộc tính</th>
                        <th scope="col">Quản lý</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->title }}</td>
                            <td>
                                @php
                                    $image_check = substr($item->image , 0 ,5);
                                @endphp
                                @if ($image_check == 'https')
                                <img src="{{ $item->image }}" width="100" height="100" alt="">
                                @else
                                <img src="/storage/{{ $item->image }}" width="100" height="100" alt="">
                                @endif
                               
                                <input type="file" data-movie_id="{{ $item->id }}" id="file-{{ $item->id }}"
                                    class="form-control file_image" accept="image/*">
                                <span id="error_image"></span>
                              
                            </td>
                            <td>{{ $item->slug }}</td>
                            <td>{{ substr($item->description, 0, 50) }}</td>




                            <td>
                                {!! Form::select('category_id', $category, isset($item) ? $item->category_id : '', [
                                    'class' => 'category_choose',
                                    'id' => $item->id,
                                ]) !!}
                            </td>







                            <td>
                                @foreach ($item->rMovie_Genre as $key => $genre)
                                    <span class="badge text-bg-dark">{{ $genre->title }}</span>
                                @endforeach
                            </td>




                            <td>
                                {!! Form::select('country_id', $country, isset($item) ? $item->country_id : '', [
                                    'class' => 'country_choose',
                                    'id' => $item->id,
                                ]) !!}
                            </td>
                            <td>

                                {!! Form::select('phim_hot', ['1' => 'Có', '0' => 'Không'], isset($item) ? $item->phim_hot : '', [
                                    'class' => 'phimhot_choose',
                                    'id' => $item->id,
                                ]) !!}
                            </td>

                            <td>

                                {!! Form::select(
                                    'resolution',
                                    ['0' => 'HD', '1' => 'SD', '2' => 'HD CAM', '3' => 'CAM', '4' => 'FULL HD', '5' => 'Trailer'],
                                    isset($item) ? $item->resolution : '',
                                    [
                                        'class' => 'resolution_choose',
                                        'id' => $item->id,
                                    ],
                                ) !!}
                            </td>

                            <td>

                                {!! Form::select('phude', ['0' => 'Phụ đề', '1' => 'Thuyết minh'], isset($item) ? $item->phude : '', [
                                    'class' => 'phude_choose',
                                    'id' => $item->id,
                                ]) !!}
                            </td>

                            <td>{{ $item->thoi_luong }}</td>
                            <td>

                                {!! Form::select('status', ['1' => 'Hiển thị', '0' => 'Không'], isset($item) ? $item->status : '', [
                                    'class' => 'status_choose',
                                    'id' => $item->id,
                                ]) !!}
                            </td>

                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->updated_at }}</td>
                            <td>
                                <form method="post">
                                    @csrf
                                    {!! Form::selectYear('year', 2003, 2025, isset($item->year) ? $item->year : '', [
                                        'class' => 'selectYear',
                                        'id' => $item->id,
                                        'placeholder' => 'Năm phim',
                                    ]) !!}
                                </form>
                            </td>
                            <td>
                                {!! Form::select(
                                    'topview',
                                    ['0' => 'Ngày', '1' => 'Tuần', '2' => 'Tháng'],
                                    isset($movie) ? $movie->topview : '',
                                    [
                                        'class' => 'select-topview',
                                        'id' => $item->id,
                                        'placeholder' => 'View',
                                    ],
                                ) !!}

                            </td>

                            <td>{{ $item->tags }}</td>

                            <td>
                                <form method="post">
                                    @csrf
                                    {!! Form::selectRange('season', 0, 20, isset($item->season) ? $item->season : '', [
                                        'class' => 'selectSeason',
                                        'id' => $item->id,
                                    ]) !!}
                                </form>
                            </td>
                            <td>{{ $item->sotap }}</td>
                            <td>
                                {!! Form::select(
                                    'thuocphim',
                                    ['phimle' => 'Phim lẻ', 'phimbo' => 'Phim bộ'],
                                    isset($item) ? $item->thuocphim : '',
                                    [
                                        'class' => 'thuocphim_choose',
                                        'id' => $item->id,
                                    ],
                                ) !!}
                            </td>
                            <td>
                                <a href="{{ route('movie.edit', $item->id) }}" class="btn btn-primary">Sửa</a>

                                {!! Form::open([
                                    'method' => 'DELETE',
                                    'route' => ['movie.destroy', $item->id],
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
