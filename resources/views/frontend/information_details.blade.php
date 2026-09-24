@extends('frontend.master')
@section('title')
Research Cell | Khulna University
@endsection
@section('main_content')
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ asset('frontend/images/banner1.png') }}">
    <div class="container pt-70 pb-20">
        <!-- Section Content -->
        <div class="section-content">
        <div class="row">
            <div class="col-md-12">
            <h2 class="title text-white">INFORMATION DETAIL'S OF RESEARCH & INNOVATION</h2>
            <ol class="breadcrumb text-left text-black mt-10">
                <li><a href="{{ route('ict') }}">Home</a></li>
                <li><a href="#">Information</a></li>
                <li><a href="#">Category - {{ $infotype }}</a></li>
                <li class="active text-gray-silver">{{ $slug }}</li>
            </ol>
            </div>
        </div>
        </div>
    </div>
    </section>
    <section>
        <div class="container mt-30 mb-30 pt-30 pb-30">
          <div class="row">
            <div class="col-md-9">
              <div class="blog-posts">
                <div class="col-md-12">
                  <div class="row list-dashed">
                    <article class="post clearfix mb-30 pb-30">
                       <?php
                        $foo = \File::extension($item->attachment);
                        ?>
                        @if(!empty($item->attachment) && $foo!='pdf')
                          <div class="entry-header">
                            <div class="post-thumb thumb">
                              <img src="{{ asset($item->attachment) }}" alt="" width="1920px" height="1280px" class="img-responsive img-fullwidth">
                            </div>
                          </div>
                      @endif
                      <div class="entry-content border-1px p-20 pr-10">
                        <div class="entry-meta media mt-0 no-bg no-border">
                          <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                            <ul>
                              <li class="font-16 text-white font-weight-600">{{ $item->created_at->day }}</li>
                              <li class="font-12 text-white text-uppercase">{{ $item->created_at->monthName }}</li>
                            </ul>
                          </div>
                          <div class="media-body pl-15">
                            <div class="event-content pull-left flip">
                              <a class="btn btn-info" href="{{ ($item->attachment)?asset($item->attachment):route('get_information_details',['infotype'=>$infotype,'slug'=>$item->slug]) }}">{{ $item->title }}</a>
                            </div>
                          </div>
                        </div>
                        <p class="mt-10">{!! $item->detail !!}</p>
                        @if(!empty($item->link))
                            <a href="{{$item->link}}" class="btn btn-success" target="_blank">Visit Here</a>
                        @endif
                        <div class="clearfix"></div>
                      </div>
                    </article>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
                @include('frontend.sidebar')
            </div>
          </div>
        </div>
      </section>
    </div>
    <!-- end main-content -->
@endsection
