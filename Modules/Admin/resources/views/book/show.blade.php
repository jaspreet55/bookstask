@extends('admin::layouts.master')
@section('addstyle')
<style type="text/css">
.showimage{
	width: 185px;
	height: 185px;
	margin-right: 10px;
	margin-bottom: 10px;
	float: left;
}
table td.attachfile{
	border-top: none;
}
</style>
@endsection
	@section('content')

	<div class="animated fadeIn">
    	<div class="row">
	       <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Product Detail</strong>
                    </div>
                    <div class="card-body">
                    	@if(!empty($product))
                        <table class="table">
                            <thead>
	                        </thead>
	                        <tbody>
	                            <tr>
	                                <th>Product Name</th>
	                                <td>{{ (array_key_exists('name',$product) ? ucwords($product['name']) : '--' )}}</td>
	                            </tr>
	                          
	                           <!--  <tr>
	                                <th>Product Price</th>
	                                <td>{{ (array_key_exists('price',$product) ? $product['price'] : '--' )}}</td>
	                               
	                            </tr> -->
	                            <tr>
	                                <th>Weight</th>
	                                <td>{{ (array_key_exists('weight',$product) ? $product['weight'] : '--' )}}</td>
	                                
	                            </tr>
	                            @php
	                            	if($product['purity'] != null)
	                            	{
	                            		$purity = json_decode($product['purity']);
	                            		$purity = implode(',', $purity);
	                            	}else{
	                            	$purity = '';

	                            	}
	                          
	                            @endphp
	                            <tr>
	                                <th>Purity</th>
	                                <td>{{ ($purity != null) ? $purity : '--' }}</td>
	                            </tr>
	                            <tr>
	                                <th>Product Created</th>
	                                <td>{{ (array_key_exists('created_at',$product) ? \Carbon\Carbon::parse($product['created_at'])->format('m-d-Y') : '--' )}}</td>
	                            </tr>
	                            <tr>
	                                <th>Product Description</th>
	                                <td>{{ (array_key_exists('description',$product) ? $product['description'] : '--' )}}</td>
	                            </tr>

	                          
	                            @if(array_key_exists('category',$product))
		                            @if(!empty($product['category']))
		                            <tr>
		                                <th>Product Category</th>
		                                <td>{{ (array_key_exists('name',$product['category']) ? ucwords($product['category']['name']) : '--' )}}</td>
		                            </tr>
		                            @endif
	                            @endif
	                             @if(array_key_exists('state',$product))
		                            @if(!empty($product['state']))
		                            <tr>
		                                <th>State</th>
		                                <td>{{ (array_key_exists('name',$product['state']) ? ucwords($product['state']['name']) : '--' )}}</td>
		                            </tr>
		                            @endif
	                            @endif
	                        </tbody>
                    	</table>
                    	@endif
               	 	</div>
            	</div>
	    	</div>
		</div> 
		<div class="row">
	       <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Product Attachments</strong>
                    </div>
                    <div class="card-body">
                    	@if(!empty($product))
                        <table class="table">
                            <thead>
                                
                              
	                        </thead>
	                        <tbody>
	                          	
	                            <tr>
                                	@if(!empty($product['attachments']))
			                                <td class="avatar attachfile" width="150">
	                                	@foreach($product['attachments'] as $val)
	                                		@if($val['type'] == 'medium')
			                                	<div class="showimage">
			                                		<img src="{{ asset($val['path']) }}">
			                                	</div>
			                                @endif
	                                	@endforeach
			                                	<div class="clearfix"></div>
			                                </td>
	                                @else
		                                <td class="attachfile">
		                                	<div class="text-center">
		                                		<h4>No Attachment Available</h4>
		                                	</div>
		                                </td>
                                	@endif
	                            </tr>
	                        </tbody>
                    	</table>
                    	@endif
               	 	</div>
            	</div>
	    	</div>
		</div> 
	</div>
	
	@endsection

	@section('addscript')
	<script>
</script>
	@endsection