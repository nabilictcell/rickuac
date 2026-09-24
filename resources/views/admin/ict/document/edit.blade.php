@extends('admin.dashboard-iqac')
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
              Document Update
            </header>
            <div class="panel-body">
                <form action="{{ route('iqac-document-update',['id'=>$document->id])}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data" autocomplete="off">
                    {{ csrf_field() }}
                          <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                            <label class="control-label col-md-2">Title</label>
                            <div class="col-md-10">
                                <input type="text" name="title" class="form-control" id="title" value="{{ $document->title }}"/>
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
                                <textarea name="detail" class="form-control summernote">{!! $document->detail !!}</textarea>
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
                                    <option value="Ordinance"  {{ ($document->category == 'Teaching-Learning' ? "selected":"") }}>Ordinance</option>
                                    <option value="Curriculum" {{ ($document->category == 'Curriculum' ? "selected":"") }}>Curriculum</option>
                                    <option value="Report" {{ ($document->category == 'Report' ? "selected":"") }}>Report</option>
                                </select>
                                @if ($errors->has('category'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('category') }}</strong>
                                  </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('image') ? 'has-error': ''}}">
                            <label class="control-label col-md-2">Image</label>
                            <div class="col-md-3">
                                <span><img src="{{ asset($document->image) }}" alt="Not Found" width="50" height="40" ></span>
                                <input type="file" name="image" class="form-control"/>
                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image')}}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('link') ? ' has-error' : '' }}">
                            <label class="control-label col-md-2">Link</label>
                            <div class="col-md-10">
                                <input type="text" name="link" class="form-control" value="{{ $document->link }}"/>
                                @if ($errors->has('link'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('link') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('order_by_number') ? ' has-error' : '' }}">
                            <label class="control-label col-md-2">Order by Number</label>
                            <div class="col-md-3">
                                <input type="text" name="order_by_number" class="form-control" value="{{ $document->order_by_number }}"/>
                                @if ($errors->has('order_by_number'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('order_by_number') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-2">
                                <a href="{{ route('iqac-document-index')}}" class="btn btn-md btn-info">Go Back</a>
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
