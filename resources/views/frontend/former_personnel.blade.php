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
            <h2 class="title text-white">FORMER PERSONNEL OF RESEARCH & INNOVATION</h2>
            <ol class="breadcrumb text-left text-black mt-10">
                <li><a href="{{ route('ict') }}">Home</a></li>
                <li><a href="#">Pages</a></li>
                <li class="active text-gray-silver">Former Personnel</li>
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
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>From</th>
                                <th>To</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($former_personnels as $item)
                            <tr>
                                <th scope="row">{{ $loop->index+1 }}</th>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->designation }}</td>
                                <td>{{ $item->from }}</td>
                                <td>{{ $item->to }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
