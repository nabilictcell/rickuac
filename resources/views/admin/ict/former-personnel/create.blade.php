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
                Former Personnel
            </header>
            <div class="panel-body">
                <form action="{{ route('ict-former-personnel-store')}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data" autocomplete="off">
                    {{ csrf_field() }}
                          <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                            <label class="control-label col-md-2">Title</label>
                            <div class="col-md-10">
                                <input type="text" name="title" class="form-control" id="title"/>
                                @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                            <label class="control-label col-md-2">Address</label>
                            <div class="col-md-10">
                                <textarea name="address" class="form-control summernote"></textarea>
                                @if ($errors->has('address'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('address') }}</strong>
                                  </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('designation') ? ' has-error' : '' }}">
                            <label class="control-label col-md-2">Designation</label>
                            <div class="col-md-3">
                                <input type="text" name="designation" class="form-control" id="from"/>
                                @if ($errors->has('designation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('designation') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('from') ? ' has-error' : '' }}">
                            <label class="control-label col-md-2">From</label>
                            <div class="col-md-3">
                                <input type="text" name="from" class="form-control default-date-picker" id="from"/>
                                @if ($errors->has('from'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('from') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('to') ? ' has-error' : '' }}">
                            <label class="control-label col-md-2">To</label>
                            <div class="col-md-3">
                                <input type="text" name="to" class="form-control default-date-picker" id="to"/>
                                @if ($errors->has('to'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('to') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('order_by_number') ? ' has-error' : '' }}">
                            <label class="control-label col-md-2">Seniority</label>
                            <div class="col-md-3">
                                <input type="text" name="order_by_number" class="form-control" id="order_by_number"/>
                                @if ($errors->has('order_by_number'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('order_by_number') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('slug') ? ' has-error' : '' }}">
                            <label class="control-label col-md-2">Slug</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                       id="slug" name="slug" placeholder="Slug">
                                @if ($errors->has('slug'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('slug') }}</strong>
                                  </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-2">
                                <a href="{{ route('ict-former-personnel-index')}}" class="btn btn-md btn-info">Go Back</a>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-success btn-md pull-right" type="submit">Publish</button>
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
