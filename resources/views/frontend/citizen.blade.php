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
            <h2 class="title text-white">OFFICE OF RESEARCH & INNOVATION</h2>
            <ol class="breadcrumb text-left text-black mt-10">
                <li><a href="{{ route('ict') }}">Home</a></li>
                <li><a href="#">Pages</a></li>
                <li class="active text-gray-silver">CITIZEN CHARTER</li>
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

                        <div class="row" id="citizen_charter">
                            <div class="col-md-12">
                                <h4 class="widget-title title-dots mt-30"><span>Citizen Charter</span></h4>
                                @if ($citizencharter->count()>0)
                                    <div class="col-md-7">
                                        @foreach ($citizencharter  as $value)
                                            {{-- <h4><b>{{$value->title}}</b></h4> --}}
                                            <p style="text-align: justify !important;">{!! $value->description !!} </p>
                                        @endforeach
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
@endsection
