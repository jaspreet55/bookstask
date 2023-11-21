@extends('admin::layouts.master')
	@section('addstyle')
		<link rel="stylesheet" href="{{asset('css/admin/sweetalert/sweetalert.css')}}">
	@endsection
  @section('content')
  <div class="row">
        <div class="col-lg-12">
            <div class="breadcrumbs">
                <div class="breadcrumbs-inner">
                    <div class="row m-0">
                        <div class="col-sm-4">
                            <div class="page-header float-left">
                                <div class="page-title">
                                    <h1>Books List</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
          @if(Session::has('alert-' . $msg))
          <div class="auto-close alert alert-{{ $msg }} alert-dismissible fade show" role="alert">
             
              {{ Session::get('alert-' . $msg) }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
        @endforeach
    </div> 
  	<div class="animated fadeIn">
      <div class="row">
        <div class="col-md-12">
          <div class="text-right m-2">
            <a href="{{ route('book.create')}}" class ="btn btn-warning btn-md">Add Book</a>
          </div>
        </div>  
    </div>
    	<div class="row">

	        <div class="col-md-12">
	            <div class="card">
	                <div class="card-header">
	                    <!-- <strong class="card-title">Books List</strong> -->
	                </div>
	                <div class="card-body p-3">

					            
                          <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    
                                    <th>title</th>
                                    <!-- <th>Category</th> -->
                                    <th>author</th>
                                    <th>publisher</th>
                                    <th>published</th>
                                    <th>Action</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                            @if ($books->count())
                               @foreach ($books as $row)
                                <tr id="book_id_{{$row->id}}">
                                  
                                  <td>{{ $row->id }}</td>
                                  <td>{{ $row->title }}</td>
                                  <!-- <td>{{ $row->price }}</td> -->
                                  <td>{{ $row->author }}</td>
                                  <td>{{ $row->publisher }}</td>
                                  <td>{{ date('Y-m-d',strtotime($row->published))}}</td>
                                 
                                  <td style="display: inline-flex;">
                                  <a href="{{route('book.edit',['id'=>base64_encode($row->id)])}}" class="btn btn-primary btn-sm">Edit </a>  ||
 
                                  <a data-id="{{$row->id}}" data-token="{{ csrf_token() }}" href = "javascript:void(0);" id="confirm_delete_book" class=" btn btn-danger btn-sm">Delete</a>
   
                                  </td> 
                                </tr>
                              @endforeach
                            @else
                              <tr>
                                <td colspan="6" class="text-center">
                                  No Available records
                                </td>
                              </tr>
                            @endif
                              
                            </tbody>
                          </table>
	                
	                </div>
	            </div>
	        </div>

	    </div>
	</div>
  @endsection
  @section('addscript')

    <script src="{{asset('js/admin/assets/js/sweetalert/sweetalert.min.js')}}"></script>

    <script type="text/javascript">
        window.success = '{{ Session::get('success') }}';
        window.error = '{{ Session::get('error') }}';
    </script>
    <script src="{{asset('js/admin/assets/js/sweetalert/custom.js')}}"></script>
 
  @endsection