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
                            <option
                                @php
(isset($_GET['genre_id']) &&  $_GET['genre_id'] == $item->id)  ? 'selected' : '' @endphp
                                value="{{ $item->id }}">{{ $item->title }}</option>
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
