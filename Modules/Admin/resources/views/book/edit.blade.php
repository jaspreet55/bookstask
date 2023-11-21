@extends('admin::layouts.master')
@section('addstyle')
    <link rel="stylesheet" href="{{asset('css/admin/sweetalert/sweetalert.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
@endsection
	@section('content')
	
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
          @if(Session::has('alert-' . $msg))

          <div class="auto-close alert alert-{{ $msg }} alert-dismissible fade show" role="alert">
             
              {{ Session::get('alert-' . $msg) }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
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
                        <strong>Update Product</strong>
                    </div>
                    <div class="card-body card-block">

                    	{!! Form::model($book,['route' => ['book.update',base64_encode($book->id),'en'],'class' => 'form-horizontal','method' => 'PUT','files' => true]) !!}
                        <div class="row form-group">
                                <div class="col col-md-3">
                                    {!! Form::label('title', 'Book Title',['class'=> 'form-control-label']) !!}
                                   
                                </div>
                                <div class="col-12 col-md-9">
                                   
                                    {!! Form::text('title', old('title',(isset($book->title) ? $book->title: '')), ['class' => 'form-control','placeholder' => 'Enter Book Title...','id' => 'bookTitle']) !!}
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
                                    {!! Form::text('author', old('author',(isset($book->author) ? $book->author: '')), ['class' => 'form-control','placeholder' => 'Enter Author Name','id' => 'author']) !!}
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
                                    {!! Form::text('genre', old('genre',(isset($book->genre) ? $book->genre: '')), ['class' => 'form-control','placeholder' => 'Enter genre','id' => 'genre']) !!}
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
                                    {!! Form::textarea('description', old('description',(isset($book->description) ? $book->description: '' )), ['class' => 'form-control','placeholder' => 'Enter Product Description...','id' => 'description','rows' => '5']) !!}
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
                                    {!! Form::text('isbn', old('isbn',(isset($book->isbn) ? $book->isbn: '')), ['class' => 'form-control','placeholder' => 'Enter isbn','id' => 'bookIsbn']) !!}
                                    @if($errors->has('genre'))
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
                                        <input type="text" class="form-control" id="date" name="published" value="{{ (isset($book->published) ? $book->published: '')}}"/>
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
                            
                                        <div class="row form-group ">
                                            <div class="col col-md-3">
                                                {!! Form::label('prod_image', 'Image',['class'=> 'form-control-label']) !!}
                                                
                                            </div>
                                            <div class="col-12 col-md-9 filebrowse" >
                                                <label class="btn-file btn btn-primary">Browse
                                                    <input type="file" id="edit_prod_image" name="prod_image" class="form-control-file" >
                                                </label>
                                               
                                                @if($errors->has('prod_image'))
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $errors->first('prod_image') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                <div class="row append-img-edit mb-15">
                                    <div class="offset-3 col-md-9 appended-div">
                                        @if(isset($book->image))
                                            @if($book->image != '')
                                                <div id="preview-img-edit" class="preview-img-edit attach">
                                                    <img src="{{ asset(str_replace("\\","/",$book['image'])) }}" width="120">
                                                    <div class="overlay">
                                                        <a href="javascript:void(0)" class="edit_product_image" data-id="{{ $book->id }}"><i class="bi bi-trash icon "></i></a>
                                                    </div>
                                                </div>
                                              
                                                <br><br>
                                                <div class="text-danger imgerr" role="alert" style="display: block;"></div>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            <div class="appendimagebtn"></div>
                          	<div class="row form-group">
                          		<div class="offset-3 col-md-9">
                                    <input type="submit" class="btn btn-primary" name="update" value="Update">
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
    <script src="{{asset('js/admin/assets/js/sweetalert/sweetalert.min.js')}}"></script>
    <script type="text/javascript">
        window.success = '{{ Session::get('success') }}';
        window.error = '{{ Session::get('error') }}';
    </script>
     <script>
        $(function(){
            $('#datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
            });
        });
    </script>
    <script src="{{asset('js/admin/assets/js/sweetalert/custom.js')}}"></script>
	<script type="text/javascript" src="{{ asset('js/admin/assets/js/product.js')}}"></script>
@endsection
