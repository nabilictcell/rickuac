@extends('admin.dashboard-ict')
@section('css')
    <link href="{{asset('admin/assets/advanced-datatable/media/css/demo_page.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/advanced-datatable/media/css/demo_table.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/data-tables/DT_bootstrap.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="row">
  <div class="col-lg-12">
      <section class="panel">
          <header class="panel-heading">
              Information List
           <div class="btn-group pull-right">
	             <a href="{{ route('ict-information-create')}}" class="btn btn-md btn-success">Add New</a>
	       </div>
          </header>

          <div class="panel-body">
            <div class="adv-table">
                <table  class="display table table-bordered table-striped" id="dynamic-table">
                <thead>
                  <th width="5%">SL</th>
                  <th width="40%">Title</th>
                  <th width="25%">Category</th>
                  <th width="10%">Attachment</th>
                  <th width="20%" class="text-center">Action</th>
                </thead>
                <tbody>
                    @foreach ($informations as $item)
                  <tr>
                      <td>{{$loop->index+1}}</td>
                      <td>{{ $item->title }}</td>
                      <td>{{ $item->category }}</td>
                      <td><a href="{{ asset($item->attachment) }}" class="btn btn-success">Click Here To View</a></td>
                      <td>
                          <a href="{{ route('ict-information-edit',['id'=>$item->id]) }}" class="btn btn-md btn-success">Edit</a>
                          ||
                          <form id="delete-form-{{ $item->id }}" method="post" action="{{ route('ict-information-destroy',['id'=>$item->id]) }}" style="display: none">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        </form>
                          <a href="" class="btn btn-danger" onclick="
                                  if(confirm('Are you sure, You Want to delete this?'))
                                  {
                                  event.preventDefault();
                                  document.getElementById('delete-form-{{ $item->id }}').submit();
                                  }
                                  else{
                                  event.preventDefault();
                                  }" ><i class="icon-trash"></i>Delete
                          </a>
                      </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th width="5%">SL</th>
                  <th width="40%">Title</th>
                  <th width="25%">Category</th>
                  <th width="10%">Attachment</th>
                  <th width="20%" class="text-center">Action</th>
                </tr>
                </tfoot>
                </table>
                </div>
          </div>
      </section>
  </div>
</div>
<!-- page end-->
@endsection
@section('js')
	@include('admin.notification')
    <script type="text/javascript" language="javascript" src="{{asset('admin/assets/advanced-datatable/media/js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/assets/data-tables/DT_bootstrap.js')}}"></script>
    <script src="{{asset('admin/js/dynamic_table_init.js')}}"></script>
@endsection
