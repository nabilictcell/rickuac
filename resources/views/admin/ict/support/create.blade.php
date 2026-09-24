@extends('admin.dashboard-ict')
@section('css')
<!--  summernote -->
    <link href="{{asset('admin/assets/summernote/dist/summernote.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/bootstrap-datepicker/css/datepicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/bootstrap-datetimepicker/css/datetimepicker.css')}}" />
    <!--<link href=”https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css” rel=”stylesheet”>-->

@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                Support Create
            </header>
            <div class="panel-body">
                <form action="{{ route('ict-support-store')}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data" autocomplete="off">
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
                        <div class="form-group {{ $errors->has('detail') ? ' has-error' : '' }}">
                            <label class="control-label col-md-2">Detail</label>
                            <div class="col-md-10">
                                <textarea name="detail" class="form-control summernote"></textarea>
                                @if ($errors->has('detail'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('detail') }}</strong>
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
                        <div class="form-group {{ $errors->has('category_id') ? ' has-error' : '' }}">
                            <label class="control-label col-md-2">Category</label>
                            <div class="col-md-3">
                                <select name="category_id" class="form-control">
                                  <option value="">Select Category</option>
                                  @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                  @endforeach
                                </select>
                                @if ($errors->has('category_id'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('category_id') }}</strong>
                                  </span>
                                @endif
                            </div>
                        </div>
                        {{-- <div class="form-group {{ $errors->has('event_date') ? ' has-error' : '' }}">
                            <label class="control-label col-md-2">Event Date</label>
                            <div class="col-md-3">
                                <input type="text" name="event_date" class="form-control default-date-picker" />
                                @if ($errors->has('event_date'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('event_date') }}</strong>
                                  </span>
                                @endif
                            </div>
                            <label class="control-label col-md-2">Event Time</label>
                            <div class="col-md-3">
                                <input class="form-control" type="text" id="datetime1" name="event_time" required/>
                                @if ($errors->has('event_time'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('event_time') }}</strong>
                                  </span>
                                @endif
                            </div>

                        </div>
                        <div class="form-group {{ $errors->has('starting_date') ? ' has-error' : '' }}">
                            <label class="control-label col-md-2">Starting Date</label>
                            <div class="col-md-3">
                                <input type="text" name="starting_date" class="form-control default-date-picker" />
                                @if ($errors->has('starting_date'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('starting_date') }}</strong>
                                  </span>
                                @endif
                            </div>
                            <label class="control-label col-md-2">Starting Time</label>
                            <div class="col-md-3">
                                <input class="form-control" type="text" id="datetime2" name="starting_time" required/>
                                @if ($errors->has('event_time'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('event_time') }}</strong>
                                  </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('ending_date') ? ' has-error' : '' }}">
                            <label class="control-label col-md-2">Ending Date</label>
                            <div class="col-md-3">
                                <input type="text" name="ending_date" class="form-control default-date-picker" />
                                @if ($errors->has('ending_date'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('ending_date') }}</strong>
                                  </span>
                                @endif
                            </div>
                            <label class="control-label col-md-2">Ending Time</label>
                            <div class="col-md-3">
                                <input class="form-control" type="text" id="datetime3" name="ending_time" required/>
                                @if ($errors->has('event_time'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('event_time') }}</strong>
                                  </span>
                                @endif
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <div class="col-md-2"></div>
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
    <!-- Include Moment.js CDN -->
    <script type="text/javascript" src=
"https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js">
    </script>

    <!-- Include Bootstrap DateTimePicker CDN -->
    <script src=
"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js">
        </script>
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
  <script>

        // Below code sets format to the
        // datetimepicker having id as
        // datetime
        $('#datetime1').datetimepicker({
            format: 'hh:mm:ss a'
        });
        $('#datetime2').datetimepicker({
            format: 'hh:mm:ss a'
        });
        $('#datetime3').datetimepicker({
            format: 'hh:mm:ss a'
        });
    </script>
@endsection
