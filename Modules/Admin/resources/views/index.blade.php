@extends('admin::layouts.master')

@section('content')
<div class="page-heading">
	<h3>Dashboard</h3> </div>
<div class="page-content">
	<section class="row">
		<div class="col-12 col-lg-9">
			<div class="row">
				<div class="col-6 col-lg-3 col-md-6">
					<div class="card">
						<div class="card-body px-3 py-4-5">
							<div class="row">
								<div class="col-md-4">
									<div class="stats-icon blue"><i class="bi bi-cart-plus-fill ordericon"></i> </div>
								</div>
								<div class="col-md-8">
									<h6 class="text-muted font-semibold">Books</h6>
									<h6 class="font-extrabold mb-0">{{count($books)}}</h6> </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</section>
	<section class="section">
        <div class="row" id="basic-table">
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title m-0">Latest Books</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body p-3">
                            <!-- Table with outer spacing -->
							<div class="table-responsive">
                                <table class="table table-striped ">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Publisher</th>
                                            <th>Published</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@if(!$books->isEmpty())
                                    	@foreach($books->take(5) as $k=>$v)
                                        <tr>
                                            <td class="text-bold-500">{{$v->id}}</td>
                                            <td>{{ucfirst($v->title)}}</td>
                                            <td class="text-bold-500">{{ucfirst($v->author)}}</td>
                                            <td class="text-bold-500">{{ucfirst($v->publisher)}}</td>
                                            <td class="text-bold-500">{{ucfirst($v->published)}}</td>
                                            
                                            <!-- <td> <span class="badge bg-success">{{ (isset($v->published) && $v->published != '') ? date('Y-m-d',strtotime($v->published)) : '-'}}</span> </td> -->
                                          
                                        </tr>
                                       	@endforeach
                                       	@else
                                       	<tr>
                                       		<td colspan="5" class="text-center">No Books Available</td>
                                       	</tr>
                                       	@endif
                                       	
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
