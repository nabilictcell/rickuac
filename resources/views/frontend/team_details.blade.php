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
                <li class="active text-gray-silver">Team Details</li>
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
                            <div class="col-sx-9 col-sm-3 col-md-3">
                                <div class="doctor-thumb">
                                  <img src="{{ asset($teams->image) }}" alt="{{ $teams->name }}">
                                </div>
                                <div class="info p-16 bg-black-333">
                                  <h4 class="text-black">{{ $teams->title }}</h4>
                                  {{-- <p class="text-gray-silver">{!! $teams->address!!}</p> --}}
                                  {{-- <p class="text-gray-silver">{{ $teams->category }}</p> --}}
                                </div>
                             </div>
                             <div class="col-xs-9 col-sm-9 col-md-9">
                                  <p>{!! $teams->detail !!}</p>
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
