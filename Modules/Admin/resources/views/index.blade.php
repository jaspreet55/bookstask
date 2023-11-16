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
									<div class="stats-icon purple"> 
										<i class="iconly-boldProfile"></i> </div>
								</div>
								<div class="col-md-8">
									<h6 class="text-muted font-semibold">Users</h6>
									<h6 class="font-extrabold mb-0"></h6> </div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-6 col-lg-3 col-md-6">
					<div class="card">
						<div class="card-body px-3 py-4-5">
							<div class="row">
								<div class="col-md-4">
									<div class="stats-icon blue"><i class="bi bi-cart-plus-fill ordericon"></i> </div>
								</div>
								<div class="col-md-8">
									<h6 class="text-muted font-semibold">products</h6>
									<h6 class="font-extrabold mb-0">6</h6> </div>
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
                        <h4 class="card-title m-0">Latest Orders</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body p-3">
                            <!-- Table with outer spacing -->
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
