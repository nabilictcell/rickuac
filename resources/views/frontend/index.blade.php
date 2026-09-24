@extends('frontend.master')
@section('title')
Research Cell| Khulna University
@endsection
@section('main_content')
  @include('frontend.slider')
  <!-- Section: About -->
  <section class="">
      <div class="section-content">
        <div class="row">
    <div class="container">
          <div class="col-md-9">
          <article class="post media-post clearfix pb-0 mb-10">
            <h2 class="text-uppercase font-weight-600 mt-0 font-28 line-bottom">Message From Director</h2>
            <a class="post-thumb" href="#">
              <img src="{{ asset($director->image) }}" alt="" width="200" height="180" title="Prof. Md. Sharif Hasan Limon">
            </a>
            {{-- <p class="addReadMore">{!! $director->detail !!}</p> --}}
                {{-- <div class="addReadMore"> --}}
                    <p>{!! $director->detail !!}</p>
                    <br>
                    <p>
                     <b>
                        Dr. Kazi Mohammed Didarul Islam <br>
                        Email: office@ric.ku.ac.bd <br>
                        Contact: 02-477734139, 01726-852004
                     </b>
                    </p>
                {{-- </div> --}}
          </article>
          </div>
          <div class="col-md-3">
            @include('frontend.sidebar')
          </div>
        </div>
      </div>
    </div>
  </section>
 <!--Section: COURSES -->
<section class="bg-lighter">
  <div class="container pb-40">
    <div class="section-title mb-0">
    <div class="row">
      <div class="col-md-8">
        <h2 class="text-uppercase font-28 line-bottom mt-0 line-height-1">Our <span class="text-theme-color-2 font-weight-400">Activity</span></h2>
     </div>
    </div>
    </div>
    <div class="section-content">
        <div class="row">
         <div class="section-title mb-0">
            <div class="row">
              <div class="col-md-8">
                <h4 class="text-black mt-0 mb-0" style="margin-left: 1.3%;"><span class="price">News | <a href="{{ route('new_activity',['id'=>1]) }}"> view all</a></span></h4>
             </div>
            </div>
        </div>
        @if(!empty($training[0]))
        <div class="col-sm-6 col-md-3">
          <div class="service-block bg-white">
            {{-- <div class="thumb"> <img alt="featured project" src="{{ asset($training[0]->attachment) }}" class="img-fullwidth" width="265px" height="195px"></div> --}}
            <div class="content text-left flip p-25 pt-0">
              <h4 class="line-bottom mb-10">{{ $training[0]->title }}</h4>
              <p>{{ \Illuminate\Support\Str::limit(strip_tags($workshop[0]->detail), 40, '...') }}</p>
              <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10" href="{{ route('newactivity_details',['slug'=>$training[0]->slug]) }}">view details</a>
            </div>
          </div>
        </div>
        @endif
        @if(!empty($training[1]))
        <div class="col-sm-6 col-md-3">
          <div class="service-block bg-white">
           {{-- <div class="thumb"> <img alt="featured project" src="{{ asset($training[1]->attachment) }}" class="img-fullwidth" width="265px" height="195px"></div> --}}
            <div class="content text-left flip p-25 pt-0">
              <h4 class="line-bottom mb-10">{{ $training[1]->title }}</h4>
              <p>{{ \Illuminate\Support\Str::limit(strip_tags($workshop[0]->detail), 40, '...') }}</p>
              <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10" href="{{ route('newactivity_details',['slug'=>$training[1]->slug]) }}">view details</a>
            </div>
          </div>
        </div>
        @endif
        @if(!empty($training[2]))
        <div class="col-sm-6 col-md-3">
          <div class="service-block bg-white">
            {{-- <div class="thumb"> <img alt="featured project" src="{{ asset($training[2]->attachment) }}" class="img-fullwidth" width="265px" height="195px"></div> --}}
            <div class="content text-left flip p-25 pt-0">
              <h4 class="line-bottom mb-10">{{ $training[2]->title }}</h4>
              <p>{{ \Illuminate\Support\Str::limit(strip_tags($workshop[0]->detail), 40, '...') }}</p>
              <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10" href="{{ route('newactivity_details',['slug'=>$training[2]->slug]) }}">view details</a>
            </div>
          </div>
        </div>
        @endif
        @if(!empty($training[3]))
        <div class="col-sm-6 col-md-3">
          <div class="service-block bg-white">
            {{-- <div class="thumb"> <img alt="featured project" src="{{ asset($training[3]->attachment) }}" class="img-fullwidth" width="265px" height="195px"></div> --}}
            <div class="content text-left flip p-25 pt-0">
              <h4 class="line-bottom mb-10">{{ $training[3]->title }}</h4>
              <p>{{ \Illuminate\Support\Str::limit(strip_tags($workshop[0]->detail), 40, '...') }}</p>
              <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10" href="{{ route('newactivity_details',['slug'=>$training[3]->slug]) }}">view details</a>
            </div>
          </div>
        </div>
        @endif
     </div>
        <div class="row">
         <div class="section-title mb-0">
            <div class="row">
              <div class="col-md-8">
                <h4 class="text-black mt-0 mb-0" style="margin-left: 1.3%;"><span class="price">Notices | <a href="{{ route('new_activity',['id'=>3]) }}"> view all</a></span></h4>
             </div>
            </div>
        </div>
        @if(!empty($workshop[0]))
        <div class="col-sm-6 col-md-3">
          <div class="service-block bg-white">
            {{-- <div class="thumb"> <img alt="featured project" src="{{ asset($workshop[0]->attachment) }}" class="img-fullwidth" width="265px" height="195px"></div> --}}
            <div class="content text-left flip p-25 pt-0">
              <h4 class="line-bottom mb-10">{{ $workshop[0]->title }}</h4>
              <p>{{ \Illuminate\Support\Str::limit(strip_tags($workshop[0]->detail), 40, '...') }}</p>
              <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10" href="{{ route('newactivity_details',['slug'=>$workshop[0]->slug]) }}">view details</a>
            </div>
          </div>
        </div>
        @endif
        @if(!empty($workshop[1]))
        <div class="col-sm-6 col-md-3">
          <div class="service-block bg-white">
            {{-- <div class="thumb"> <img alt="featured project" src="{{ asset($workshop[1]->attachment) }}" class="img-fullwidth" width="265px" height="195px"></div> --}}
            <div class="content text-left flip p-25 pt-0">
              <h4 class="line-bottom mb-10">{{ $workshop[1]->title }}</h4>
              <p>{{ \Illuminate\Support\Str::limit(strip_tags($workshop[0]->detail), 40, '...') }}</p>
              <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10" href="{{ route('newactivity_details',['slug'=>$workshop[1]->slug]) }}">view details</a>
            </div>
          </div>
        </div>
        @endif
        @if(!empty($workshop[2]))
        <div class="col-sm-6 col-md-3">
          <div class="service-block bg-white">
            {{-- <div class="thumb"> <img alt="featured project" src="{{ asset($workshop[2]->attachment) }}" class="img-fullwidth" width="265px" height="195px"></div> --}}
            <div class="content text-left flip p-25 pt-0">
              <h4 class="line-bottom mb-10">{{ $workshop[2]->title }}</h4>
              <p>{{ \Illuminate\Support\Str::limit(strip_tags($workshop[0]->detail), 40, '...') }}</p>
              <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10" href="{{ route('newactivity_details',['slug'=>$workshop[2]->slug]) }}">view details</a>
            </div>
          </div>
        </div>
        @endif
        @if(!empty($workshop[3]))
        <div class="col-sm-6 col-md-3">
          <div class="service-block bg-white">
            {{-- <div class="thumb"> <img alt="featured project" src="{{ asset($workshop[3]->attachment) }}" class="img-fullwidth" width="265px" height="195px"> --}}
            {{-- </div> --}}
            <div class="content text-left flip p-25 pt-0">
              <h4 class="line-bottom mb-10">{{ $workshop[3]->title }}</h4>
              <p>{{ \Illuminate\Support\Str::limit(strip_tags($workshop[0]->detail), 40, '...') }}</p>
              <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10" href="{{ route('newactivity_details',['slug'=>$workshop[3]->slug]) }}">view details</a>
            </div>
          </div>
        </div>
        @endif
     </div>
     <div class="row">
        @if(!empty($seminar))
        <div class="col-sm-6 col-md-3">
          <div class="service-block bg-white">
            <div class="thumb"> <img alt="featured project" src="{{ asset($seminar->attachment) }}" class="img-fullwidth" width="265px" height="195px">
            <h4 class="text-white mt-0 mb-0"><span class="price">Club | <a href="{{ route('get_all_activity',['id'=>3]) }}" style="color: white;"> view all</a></span></h4>
            </div>
            <div class="content text-left flip p-25 pt-0">
              <h4 class="line-bottom mb-10">{{ $seminar->title }}</h4>
              {{-- <p>{{ str_limit(strip_tags($seminar->detail),40,'...') }}</p> --}}
              <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10" href="#">view details</a>
            </div>
          </div>
        </div>
        @endif

     </div>
    </div>
  </div>
</section>
    <section id="gallery" class="bg-lighter">
      <div class="container">
         <div class="section-title mb-10">
           <div class="row">
             <div class="col-md-12">
               <h2 class="mt-0 text-uppercase text-theme-colored title line-bottom line-height-1">Our<span class="text-theme-color-2 font-weight-400"> Gallery</span></h2>
             </div>
           </div>
         </div>
         <div class="section-content">
           <div class="row">
             <div class="col-md-12">
               <!-- Works Filter -->
               <div class="portfolio-filter font-alt align-center">
                 <a href="#" class="active" data-filter="*">All</a>
                 <!--<a href="#Training" class="" data-filter=".Training">Training</a>-->
                 <!--<a href="#Workshop" class="" data-filter=".Workshop">Workshop</a>-->
                 <!--<a href="#Meeting" class="" data-filter=".Meeting">Meeting</a>-->
               </div>
               <!-- End Works Filter -->

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
       </div >
     </section>
     <script>
        $(document).ready(function() {
            // This limit you can set after how many characters you want to show Read More
            var carLmt = 700;
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
