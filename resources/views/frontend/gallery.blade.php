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
            <h2 class="title text-white">GALLERY OF RESEARCH & INNOVATION</h2>
            <ol class="breadcrumb text-left text-black mt-10">
                <li><a href="{{ route('ict') }}">Home</a></li>
                <li><a href="#">Pages</a></li>
                <li class="active text-gray-silver">Gallery</li>
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
                <div class="section-content">
                    <div class="row">
                      <div class="col-md-12">
                        <!-- Portfolio Gallery Grid -->
                        <div id="grid" class="gallery-isotope grid-4 gutter clearfix">

                          @foreach ($galleries as $item)
                          <!-- Portfolio Item Start -->
                          <div class="gallery-item {{ $item->category }}">
                            <div class="thumb">
                              <img class="img-fullwidth" src="{{ asset($item->image) }}" alt="project">
                              <div class="overlay-shade"></div>
                              <div class="icons-holder">
                                <div class="icons-holder-inner">
                                  <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                    <a data-lightbox="image" href="{{ asset($item->image) }}"><i class="fa fa-plus"></i></a>
                                    <a href="#"><i class="fa fa-link"></i></a>
                                  </div>
                                </div>
                              </div>
                              <a class="hover-link" data-lightbox="image" href="{{ asset($item->image) }}">View more</a>
                            </div>
                          </div>
                          @endforeach
                          <!-- Portfolio Item End -->
                        </div>
                        <!-- End Portfolio Gallery Grid -->
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
