@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Quản lý link phim</div>

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
                        @if (!isset($linkMovie))
                            {!! Form::open(['route' => 'link.store', 'method' => 'POST']) !!}
                        @else
                            {!! Form::open(['route' => ['link.update', $linkMovie->id], 'method' => 'PUT']) !!}
                        @endif

                        <div class="form-group">
                            {!! Form::label('title', 'Title', []) !!}
                            {!! Form::text('title', isset($linkMovie) ? $linkMovie->title : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập tiêu đề ...',
                                'id' => 'title',
                                'onkeyup' => 'ChangeToSlug()',
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('description', 'Description', []) !!}
                            {!! Form::textarea('description', isset($linkMovie) ? $linkMovie->description : '', [
                                'style' => 'resize:none',
                                'class' => 'form-control',
                                'placeholder' => 'Nhập mô tả ...',
                                'id' => 'description',
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', 'Status', []) !!}
                            {!! Form::select('status', ['1' => 'Hiển thị', '0' => 'Không'], isset($linkMovie) ? $linkMovie->status : '', [
                                'class' => 'form-control',
                                'id' => 'status',
                            ]) !!}
                        </div>
                        @if (!isset($linkMovie))
                            {!! Form::submit('Thêm link', ['class' => 'btn btn-success mt-4']) !!}
                        @else
                            {!! Form::submit('Cập nhật link', ['class' => 'btn btn-primary mt-4']) !!}
                        @endif


                        {!! Form::close() !!}
                    </div>
                </div>
                <table class="table table-hover" id="table_movie">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Status</th>

                            <th scope="col">Quản lý</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($link_list as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->title }}</td>

                                <td>{{ $item->description }}</td>
                                <td>
                                    @if ($item->status == 1)
                                        Hiển thị
                                    @else
                                        Không hiển thị
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('link.edit', $item->id) }}" class="btn btn-primary">Sửa</a>

                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['link.destroy', $item->id],
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
    </div>
@endsection
