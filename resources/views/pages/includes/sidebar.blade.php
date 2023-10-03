<aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
        <div class="section-bar clearfix">
            <div class="section-title">
                <span>Phim hot</span>

            </div>
        </div>
        <section class="tab-content">
            <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
                <div class="halim-ajax-popular-post-loading hidden"></div>
                <div id="halim-ajax-popular-post" class="popular-post">

                    @foreach ($phimhot_sidebar as $item)
                        <div class="item post-37176">
                            <a href="{{ route('movie', $item->slug) }}" title="{{ $item->title }}">
                                <div class="item-link">
                                    @php
                                        $image_check = substr($item->image, 0, 5);
                                    @endphp
                                    @if ($image_check == 'https')
                                        <img class="lazy post-thumb" src="{{ $item->image }}" alt="{{ $item->title }}"
                                            title="{{ $item->title }}">
                                    @else
                                        <img class="lazy post-thumb" src="{{ Storage::url($item->image) }}"
                                            alt="{{ $item->title }}" title="{{ $item->title }}">
                                    @endif

                                    <span class="is_trailer">
                                        @if ($item->resolution == 0)
                                            HD
                                        @elseif($item->resolution == 1)
                                            SD
                                        @elseif($item->resolution == 2)
                                            HD CAM
                                        @elseif($item->resolution == 3)
                                            CAM
                                        @elseif($item->resolution == 4)
                                            FULL HD
                                        @else
                                            Trailer
                                        @endif
                                    </span>
                                </div>
                                <p class="title">{{ $item->title }}</p>

                            </a>
                            <div class="viewsCount" style="color: #9d9d9d;">
                                @if ($item->views > 0)
                                    {{ $item->views }} lượt xem
                                @endif
                            </div>
                            <div class="viewsCount" style="color: #9d9d9d;">
                                {{ $item->year }}
                            </div>
                            <div style="float: left;">
                                <ul class="list-inline rating">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <li style="font-size:20px;color:#ffcc00;padding:0;">&#9733;</li>
                                    @endfor
                                </ul>
                            </div>
                        </div>
                    @endforeach




                </div>
            </div>
        </section>
        <div class="clearfix"></div>
    </div>
</aside>

<aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
        <div class="section-bar clearfix">
            <div class="section-title">
                <span>Top View</span>

            </div>
        </div>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item active">
                <a class="nav-link filter-sidebar" id="pills-home-tab" data-toggle="pill" href="#ngay" role="tab"
                    aria-controls="pills-home" aria-selected="true">Ngày</a>
            </li>
            <li class="nav-item">
                <a class="nav-link filter-sidebar" id="pills-profile-tab" data-toggle="pill" href="#tuan"
                    role="tab" aria-controls="pills-profile" aria-selected="false">Tuần</a>
            </li>
            <li class="nav-item">
                <a class="nav-link filter-sidebar" id="pills-contact-tab" data-toggle="pill" href="#thang"
                    role="tab" aria-controls="pills-contact" aria-selected="false">Tháng</a>
            </li>
        </ul>


        <div class="tab-content" id="pills-tabContent">
            <div id="halim-ajax-popular-post-default" class="popular-post">
                <span id="show_data_default"></span>
            </div>
            <div class="tab-pane fade show active" id="tuan" role="tabpanel" aria-labelledby="pills-home-tab">
                <div id="halim-ajax-popular-post" class="popular-post">

                    <span id="show_data"></span>
                </div>
            </div>

        </div>
        <div class="clearfix"></div>
    </div>
</aside>

<aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
        <div class="section-bar clearfix">
            <div class="section-title">
                <span>Phim sắp chiếu</span>

            </div>
        </div>
        <section class="tab-content">
            <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
                <div class="halim-ajax-popular-post-loading hidden"></div>
                <div id="halim-ajax-popular-post" class="popular-post">

                    @foreach ($phimhot_trailer as $item)
                        <div class="item post-37176">
                            <a href="{{ route('movie', $item->slug) }}" title="{{ $item->title }}">
                                <div class="item-link">


                                    @php
                                        $image_check = substr($item->image, 0, 5);
                                    @endphp
                                    @if ($image_check == 'https')
                                        <img class="lazy post-thumb" src="{{ $item->image }}"
                                            alt="{{ $item->title }}" title="{{ $item->title }}">
                                    @else
                                        <img class="lazy post-thumb" src="{{ Storage::url($item->image) }}"
                                            alt="{{ $item->title }}" title="{{ $item->title }}">
                                    @endif


                                    <span class="is_trailer">
                                        @if ($item->resolution == 0)
                                            HD
                                        @elseif($item->resolution == 1)
                                            SD
                                        @elseif($item->resolution == 2)
                                            HD CAM
                                        @elseif($item->resolution == 3)
                                            CAM
                                        @elseif($item->resolution == 4)
                                            FULL HD
                                        @else
                                            Trailer
                                        @endif
                                    </span>
                                </div>
                                <p class="title">{{ $item->title }}</p>
                            </a>
                            <div class="viewsCount" style="color: #9d9d9d;">
                                @if ($item->views > 0)
                                    {{ $item->views }} lượt xem
                                @endif
                            </div>
                            <div class="viewsCount" style="color: #9d9d9d;">
                                {{ $item->year }}
                            </div>
                            <div style="float: left;">
                                <ul class="list-inline rating">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <li style="font-size:20px;color:#ffcc00;padding:0;">&#9733;</li>
                                    @endfor
                                </ul>
                            </div>
                        </div>
                    @endforeach




                </div>
            </div>
        </section>
        <div class="clearfix"></div>
    </div>
</aside>
