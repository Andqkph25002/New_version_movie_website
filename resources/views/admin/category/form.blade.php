@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Quản lý danh mục</div>

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
                        @if (!isset($category))
                            {!! Form::open(['route' => 'category.store', 'method' => 'POST']) !!}
                        @else
                            {!! Form::open(['route' => ['category.update', $category->id], 'method' => 'PUT']) !!}
                        @endif

                        <div class="form-group">
                            {!! Form::label('title', 'Title', []) !!}
                            {!! Form::text('title', isset($category) ? $category->title : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập tiêu đề ...',
                                'id' => 'title',
                                'onkeyup' => 'ChangeToSlug()',
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Slug', []) !!}
                            {!! Form::text('slug', isset($category) ? $category->slug : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập slug ...',
                                'id' => 'slug',
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Description', []) !!}
                            {!! Form::textarea('description', isset($category) ? $category->description : '', [
                                'style' => 'resize:none',
                                'class' => 'form-control',
                                'placeholder' => 'Nhập mô tả ...',
                                'id' => 'description',
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', 'Status', []) !!}
                            {!! Form::select('status', ['1' => 'Hiển thị', '0' => 'Không'], isset($category) ? $category->status : '', [
                                'class' => 'form-control',
                                'id' => 'status',
                            ]) !!}
                        </div>
                        @if (!isset($category))
                            {!! Form::submit('Thêm danh mục', ['class' => 'btn btn-success mt-4']) !!}
                        @else
                            {!! Form::submit('Cập nhật danh mục', ['class' => 'btn btn-primary mt-4']) !!}
                        @endif


                        {!! Form::close() !!}
                    </div>
                </div>
                <table class="table table-hover" id="table_movie">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên danh mục</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Quản lý</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->slug }}</td>
                                <td>{{ $item->description }}</td>
                                <td>
                                    @if ($item->status == 1)
                                        Hiển thị
                                    @else
                                        Không hiển thị
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('category.edit', $item->id) }}" class="btn btn-primary">Sửa</a>

                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['category.destroy', $item->id],
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
