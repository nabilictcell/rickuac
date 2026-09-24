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
            <h2 class="title text-white">TEAMS OF RESEARCH & INNOVATION</h2>
            <ol class="breadcrumb text-left text-black mt-10">
                <li><a href="{{ route('ict') }}">Home</a></li>
                <li><a href="#">Pages</a></li>
                <li class="active text-gray-silver">{{ $category }}</li>
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
                                @foreach ($teams as $item)
                                <div class="col-xs-3 col-sm-3 col-md-3 sm-text-center mb-30 mb-sm-30">
                                    <div class="team maxwidth400">
                                        <div class="thumb"><img class="img-fullwidth" src="{{ asset($item->image) }}" alt="{{ $item->title }}"></div>
                                        <div class="content border-1px border-bottom-theme-color-2-2px p-15 bg-light clearfix">
                                          <h4 class="name text-theme-color-2 mt-0"><small>{{ $item->title }}</small></h4>
                                           {{-- <p class="mb-20">{!! $item->detail !!}</p> --}}
                                          <a class="btn btn-theme-colored btn-sm pull-right flip" href="{{ route('get_team_details',['slug'=>$item->slug]) }}">view details</a>
                                          <!--<ul class="styled-icons icon-dark icon-circled icon-theme-colored icon-sm pull-left flip">-->
                                          <!--  <li><a href="#"><i class="fa fa-facebook"></i></a></li>-->
                                          <!--  <li><a href="#"><i class="fa fa-twitter"></i></a></li>-->
                                          <!--  <li><a href="#"><i class="fa fa-google-plus"></i></a></li>-->
                                          <!--</ul>-->
                                          <!--<a class="btn btn-theme-colored btn-sm pull-right flip" href="page-teachers-details.html">view details</a>-->
                                        </div>
                                      </div>
                                </div>
                                @endforeach
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
