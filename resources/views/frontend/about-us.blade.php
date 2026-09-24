@extends('frontend.master')
@section('title')
  Research Cell| Khulna University
@endsection
@section('main_content')
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ asset('frontend/frontend/images/Ictbanner.png') }}">
    <div class="container pt-70 pb-20">
        <!-- Section Content -->
        <div class="section-content">
        <div class="row">
            <div class="col-md-12">
            <h2 class="title text-white">OFFICE OF RESEARCH & INNOVATION</h2>
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
                    @if(!empty($about))
                    <!-- Section: About -->
                    <h3 class="font-weight-600 mt-0 font-28 line-bottom">{{ $about->title }}</h3>
                    <h4 class="text-theme-colored text-justify">{!! $about->detail !!}</p>
                        @if(!empty($about->link))
                             <a class="btn btn-theme-colored btn-flat btn-lg mt-10 mb-sm-30" href="{{ $about->link }}">Click Here to View →</a>
                        @endif
                    @else
                    <h2>Sorry!!! No Post Available</h2>
                    @endif
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
