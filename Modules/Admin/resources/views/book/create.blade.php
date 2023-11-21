@extends('admin::layouts.master')
@section('addstyle')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
	@endsection
	@section('content')

    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
          @if(Session::has('alert-' . $msg))

          <p class="auto-close alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
          @endif
        @endforeach
        @if ($errors->any())
                 <div class="auto-close alert alert-danger">
             @foreach ($errors->all() as $error)
                    <div>{{$error}}</div>
             @endforeach
                </div>
         @endif
    </div> 
    	  <!-- Animated -->
    <div class="animated fadeIn">
    	<div class="row">
    		<div class="col-md-12">
    			<div class="card">
                    <div class="card-header">
                        <strong>Save Book</strong>
                    </div>
                    <br>
                    <div class="card-body card-block">
                           
                    	{!! Form::open(['route' => 'book.store','class' => 'form-horizontal','method' => 'post','files' => true]) !!}
                            
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    {!! Form::label('title', 'Book Title',['class'=> 'form-control-label']) !!}
                                   
                                </div>
                                <div class="col-12 col-md-9">
                                   
                                    {!! Form::text('title', old('title'), ['class' => 'form-control','placeholder' => 'Enter Book Title...','id' => 'bookTitle']) !!}
                                    @if($errors->has('title'))
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    {!! Form::label('author', 'Book author',['class'=> 'form-control-label']) !!}
                                </div>
                                <div class="col-12 col-md-9">
                                    {!! Form::text('author', old('author'), ['class' => 'form-control','placeholder' => 'Enter Author Name','id' => 'author']) !!}
                                    @if($errors->has('author'))
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('author') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    {!! Form::label('genre', 'Book genre',['class'=> 'form-control-label']) !!}
                                </div>
                                <div class="col-12 col-md-9">
                                    {!! Form::text('genre', old('genre'), ['class' => 'form-control','placeholder' => 'Enter genre','id' => 'genre']) !!}
                                    @if($errors->has('genre'))
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('genre') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    {!! Form::label('description', 'Description',['class'=> 'form-control-label']) !!}                                   
                                </div>
                                <div class="col-12 col-md-9">
                                    {!! Form::textarea('description', old('description'), ['class' => 'form-control','placeholder' => 'Enter Product Name...','id' => 'description','rows' => '5']) !!}
                                    @if($errors->has('description'))
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    {!! Form::label('isbn', 'Isbn',['class'=> 'form-control-label']) !!}
                                </div>
                                <div class="col-12 col-md-9">
                                    {!! Form::text('isbn', old('isbn'), ['class' => 'form-control','placeholder' => 'Enter isbn','id' => 'bookIsbn']) !!}
                                    @if($errors->has('isbn'))
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('isbn') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    {!! Form::label('published', 'Published',['class'=> 'form-control-label']) !!}
                                </div>
                                <div class="col-12 col-md-9">
                                <div class="input-group date" id="datepicker">
                                        <input type="text" class="form-control" id="date" name="published"/>
                                        <span class="input-group-append">
                                        <span class="input-group-text bg-light d-block">
                                            <i class="bi bi-calendar"></i>
                                        </span>
                                        </span>
                                    </div>
            
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    {!! Form::label('publisher', 'Publisher',['class'=> 'form-control-label']) !!}
                                </div>
                                <div class="col-12 col-md-9">
                                    {!! Form::text('publisher', old('publisher'), ['class' => 'form-control','placeholder' => 'Enter publisher','id' => 'publisher']) !!}
                                    @if($errors->has('publisher'))
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('publisher') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    {!! Form::label('image', 'Image',['class'=> 'form-control-label']) !!}
                                </div>
                                <div class="col-12 col-md-9">
                                    <label class="btn-file btn btn-primary">Browse
                                        <input type="file" id="prod_image" name="prod_image" class="form-control-file">
                                    </label>
                                   
                                    @if($errors->has('prod_image'))
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('prod_image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row append-img-edit mb-15" style="display: none;">
                               <div class="offset-3 col-md-9 appended-div">
                               </div>
                            </div>
                       
                          	<div class="row form-group">
                          		<div class="offset-3 col-md-9">
                                   
                                    
                                        <input type="submit" class="btn btn-primary" name="save" value="Save">
                                    <a href="{{ route('book.list')}}" class="btn btn-secondary" name="cancel"> Cancel</a>
                          			 
                          		</div>
                          	</div>
                   		{!! Form::close() !!}
                    </div>
                           
                </div>
    		</div>
    	</div>
    </div>

	@endsection
	@section('addscript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
	<!-- <script type="text/javascript" src="{{ asset('js/admin/assets/js/product.js')}}"></script> -->
    <script>
        $(function(){
            $('#datepicker').datepicker({
                format: 'yyyy-mm-dd',
             autoclose: true,
            });
        });
    </script>
    <script type="text/javascript">

    var count ='';
    jQuery("#prod_image").change(function(e){
        jQuery('.appended-div').html('');
        readimageURL(this);
    });
     function readimageURL(input) {
               
        count = document.getElementById("prod_image").files.length;
            console.log(count);   
        if (count > 0 && count < 4) {
            
            var total_file = document.getElementById("prod_image").files.length;

             for(var i=0;i<total_file;i++)
            {      
                    jQuery('.append-img-edit').css('display','block');
                    jQuery('.append-img-edit').find('.appended-div').append('<div id="preview_img_'+i+'" class="preview-img-edit">'
                        +'<img src="'+URL.createObjectURL(event.target.files[i])+'" width="120">'
                        +'</div>');
            }
        }else{
             jQuery('.append-img-edit').css('display','block');
        }
    }
    </script>
	@endsection
