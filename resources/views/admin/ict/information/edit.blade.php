@extends('admin.dashboard-ict')
@section('css')
<!--  summernote -->
    <link href="{{asset('admin/assets/summernote/dist/summernote.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/bootstrap-datepicker/css/datepicker.css')}}" />
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
               Information Update
            </header>
            <div class="panel-body">
                <form action="{{ route('ict-information-update',['id'=>$information->id])}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data" autocomplete="off">
                    {{ csrf_field() }}
                          <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                            <label class="control-label col-md-2">Title</label>
                            <div class="col-md-10">
                                <input type="text" name="title" class="form-control" id="title" value="{{ $information->title }}"/>
                                @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('detail') ? ' has-error' : '' }}">
                            <label class="control-label col-md-2">Detail</label>
                            <div class="col-md-10">
                                <textarea name="detail" class="form-control summernote">{!! $information->detail !!}</textarea>
                                @if ($errors->has('detail'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('detail') }}</strong>
                                  </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('category') ? ' has-error' : '' }}">
                            <label class="control-label col-md-2">Category</label>
                            <div class="col-md-3">
                                <select name="category" class="form-control">
                                    <option value="">Select Category</option>
                                    <option value="Forms"  {{ ($information->category == 'Forms' ? "selected":"") }}>Forms</option>
                                    {{-- <option value="Event" {{ ($information->category == 'Event' ? "selected":"") }}>Event</option>
                                    <option value="Notice" {{ ($information->category == 'Notice' ? "selected":"") }}>Notice</option> --}}
                                </select>
                                @if ($errors->has('category'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('category') }}</strong>
                                  </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('attachment') ? 'has-error': ''}}">
                            <label class="control-label col-md-2">Attachment</label>
                            <div class="col-md-3">

                                <input type="file" name="attachment" class="form-control"/>
                                @if ($errors->has('attachment'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('attachment')}}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('link') ? ' has-error' : '' }}">
                            <label class="control-label col-md-2">Link</label>
                            <div class="col-md-10">
                                <input type="text" name="link" class="form-control" value="{{ $information->link }}"/>
                                @if ($errors->has('link'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('link') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-2">
                                <a href="{{ route('ict-information-index')}}" class="btn btn-md btn-info">Go Back</a>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-success btn-md pull-right" type="submit">Update</button>
                            </div>
                      </div>
                </form>
            </div>
        </section>
    </div>
  </div>
@endsection
@section('js')
	@include('admin.notification')
    <script type="text/javascript">
        $('#title').blur(function () {
            var titleValue = this.value.toLowerCase().trim();
            var slugValue = titleValue.replace(/&/g, '-and-')
                    .replace(/[^a-z0-9-]/g, '-')
                    .replace(/\-\-+/g, '-')
                    .replace(/^-+|-+$/g, '');

            $('#slug').val(slugValue);
        });
    </script>
    <!--summernote-->
  <script src="{{asset('admin/assets/summernote/dist/summernote.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('admin/assets/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
  <script src="{{asset('admin/js/advanced-form-components.js')}}"></script>
  <script type="text/javascript">
      jQuery(document).ready(function(){
          $('.summernote').summernote({
              height: 200,                 // set editor height
              minHeight: null,             // set minimum height of editor
              maxHeight: null,             // set maximum height of editor
              focus: true                 // set focus to editable area after initializing summernote
          });
      });
  </script>
@endsection
