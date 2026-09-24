@extends('frontend.master')
@section('title')
Research Cell| Khulna University
@endsection
@section('main_content')
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ asset('frontend/images/banner1.png') }}">
    <div class="container pt-70 pb-20">
        <!-- Section Content -->
        <div class="section-content">
        <div class="row">
            <div class="col-md-12">
            <h2 class="title text-white">Director Of RESEARCH & INNOVATION</h2>
            <ol class="breadcrumb text-left text-black mt-10">
                <li><a href="{{ route('ict') }}">Home</a></li>
                <li><a href="#">Pages</a></li>
                <li class="active text-gray-silver">Director</li>
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
                             {{-- <div class="col-sx-9 col-sm-3 col-md-3">
                                <div class="doctor-thumb">
                                  <img src="{{ asset($director->image) }}" alt="{{ $director->name }}">
                                </div>
                                <div class="info p-16 bg-black-333">
                                  <h4 class="text-white">{{ $director->name }}</h4>
                                  <p class="text-gray-silver">{!! $director->address!!}</p>
                                  <p class="text-gray-silver">{{ $director->designation }}</p>
                                </div>
                             </div>
                             <div class="col-xs-9 col-sm-9 col-md-9">
                                  <p>{!! $director->detail !!}</p>
                            </div> --}}
                            <div class="row">
                                <div class="col-md-3 col-sm-12">
                                    <div class="doctor-thumb">
                                        <img src="{{ asset($director->image) }}" alt="{{ $director->name }}">
                                    </div>
                                    <div class="info p-16 bg-black-333">
                                        <h4 class="text-black">{{ $director->name }}</h4>
                                        <p class="text-black">{!! $director->address !!}</p>
                                        <p class="text-black">{{ $director->designation }}</p>
                                    </div>
                                </div>
                                <div class="col-md-9 col-sm-12">
                                    <div class="addReadMore">
                                        <p>{!! $director->detail !!}</p>
                                    </div>
                                </div>
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
    <script>
        $(document).ready(function() {
            // This limit you can set after how many characters you want to show Read More
            var carLmt = 500;
            var readMoreTxt = " Read More";
            var readLessTxt = " Read Less";

            $(".addReadMore p").each(function() {
                if ($(this).text().length > carLmt) {
                    var content = $(this).text().slice(0, carLmt);
                    var html = content + "<span class='moreellipses'>&hellip;</span><span class='morecontent' style='display: none;'>" + $(this).text().slice(carLmt) + "</span>&nbsp;<a href='' class='readMore'>" + readMoreTxt + "</a>";
                    $(this).html(html);
                }
            });

            $(".readMore").click(function(e) {
                e.preventDefault();
                var thisLink = $(this);
                var ctn = thisLink.closest('.addReadMore');
                var moreCont = ctn.find('.morecontent');
                var thisCont = thisLink.closest('p');

                if (thisLink.hasClass("less")) {
                    thisLink.removeClass("less");
                    thisLink.html(readMoreTxt);
                    moreCont.hide();
                } else {
                    thisLink.addClass("less");
                    thisLink.html(readLessTxt);
                    moreCont.show();
                }
            });
        });
    </script>
@endsection
