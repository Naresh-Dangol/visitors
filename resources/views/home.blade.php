@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		@if(Auth::user()->user_role == 'super_admin')
		<section class="content">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h2 class="text-center">Welcome to Dashboard</h2> <hr> 
		           <!--  <?php 
						$now = Carbon\Carbon::now()->toDateString();
						$end_date = Carbon\Carbon::parse('2018-9-29');
						?> -->
						
						
						<!-- Total visitors -->
						<div class="col-lg-4 col-md-6">
							<a href="{{url('/visitors')}}">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<div class="row">
											<div class="text-center">
												<div class=""><h3>Total Visitors</h3></div>
												<div class="badge">{{count($totalVisitors)}}
												</div>
												
											</div>
										</div>
									</div>
									
									<div class="panel-footer">
										<span class="pull-left">View Details</span>
										<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
										<div class="clearfix"></div>
									</div>
									
								</div>
							</a>
						</div>

						<!-- visitors today -->
						<div class="col-lg-4 col-md-6">
							<a href="{{url('/visitors/today')}}">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<div class="row">
											<div class="text-center">
												<div class=""><h3>Total Today's Visitors</h3></div>					              
												<div class="badge">	{{--count($todayVisitors)--}}
												</div>
												
											</div>
										</div>
									</div>
									
									<div class="panel-footer">
										<span class="pull-left">View Details</span>
										<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
										<div class="clearfix"></div>
									</div>
									
								</div>
							</a>
						</div>

						<!-- visitors on waiting -->
						<div class="col-lg-4 col-md-6">
							<a href="{{url('/visitors/waiting')}}">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<div class="row">
											<div class="text-center">
												<div class=""><h3>Visitors On Waiting</h3></div>
												<div class="badge">{{count($noVisitorDetails)}}</div>
												
											</div>
										</div>
									</div>
									
									<div class="panel-footer">
										<span class="pull-left">
											View Details
										</span>
										<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
										<div class="clearfix"></div>
									</div>
								</div>
							</a>
						</div>

						<div class="col-lg-4 col-md-6">
							<a href="{{url('/visitors/nextAppointment')}}">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<div class="row">
											<div class="text-center">
												<div class=""><h3>Appointment For Next Visit</h3></div>
												<div class="badge">
													
													{{count($appForNextVisit)}}
													
													
												</div>
												
												
												<div style="color: #990129">
													
													{{-- Carbon\Carbon::parse('next week')->addDays(7)->toDateString() --}}
													
												</div>
											</div>
										</div>
									</div>
									
									<div class="panel-footer">
										<span class="pull-left">
											View Details
										</span>
										<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
										<div class="clearfix"></div>
									</div>
									
								</div>
							</a>
						</div>


						<div class="col-lg-4 col-md-6">
							<a href="">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<div class="row">
											<div class="text-center">
												<div class=""><h3>Pre-Appointment For Today</h3></div>
												<div class="badge">{{--count($todayVisitors)--}}</div>
												
											</div>
										</div>
									</div>
									
									<div class="panel-footer">
										<span class="pull-left">View Details</span>
										<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
										<div class="clearfix"></div>
									</div>
									
								</div>
							</a>
						</div>
					</div>     
				</div>
			</section>

		@else
		<section class="content">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h2 class="text-center">Welcome to Dashboard</h2> <hr> 
		           <!--  <?php 
						$now = Carbon\Carbon::now()->toDateString();
						$end_date = Carbon\Carbon::parse('2018-9-29');
						?> -->
						
						
						<!-- Total visitors -->
						<div class="col-lg-4 col-md-6">
							<a href="{{url('/visitors')}}">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<div class="row">
											<div class="text-center">
												<div class=""><h3>Total Visitors</h3></div>
												<div class="huge">{{count($totalVisitors)}}</div>
												
											</div>
										</div>
									</div>
									
									<div class="panel-footer">
										<span class="pull-left">View Details</span>
										<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
										<div class="clearfix"></div>
									</div>
									
								</div>
							</a>
						</div>

						<!-- visitors today -->
						<div class="col-lg-4 col-md-6">
							<a href="{{url('/visitors/today')}}">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<div class="row">
											<div class="text-center">
												<div class=""><h3>Total Today's Visitors</h3></div>					              
												<div class="huge">	{{--count($todayVisitors)--}}
												</div>
												
											</div>
										</div>
									</div>
									
									<div class="panel-footer">
										<span class="pull-left">View Details</span>
										<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
										<div class="clearfix"></div>
									</div>
									
								</div>
							</a>
						</div>

						<!-- visitors on waiting -->
						<div class="col-lg-4 col-md-6">
							<a href="{{url('/visitors/waiting')}}">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<div class="row">
											<div class="text-center">
												<div class=""><h3>Visitors On Waiting</h3></div>
												<div class="huge">{{count($noVisitorDetails)}}</div>
												
											</div>
										</div>
									</div>
									
									<div class="panel-footer">
										<span class="pull-left">
											View Details
										</span>
										<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
										<div class="clearfix"></div>
									</div>
								</div>
							</a>
						</div>

						<div class="col-lg-4 col-md-6">
							<a href="{{url('/visitors/nextAppointment')}}">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<div class="row">
											<div class="text-center">
												<div class=""><h3>Appointment For Next Visit</h3></div>
												<div class="huge">
													
													{{count($appForNextVisit)}}
													
													
												</div>
												
												
												<div style="color: #990129">
													
													{{-- Carbon\Carbon::parse('next week')->addDays(7)->toDateString() --}}
													
												</div>
											</div>
										</div>
									</div>
									
									<div class="panel-footer">
										<span class="pull-left">
											View Details
										</span>
										<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
										<div class="clearfix"></div>
									</div>
									
								</div>
							</a>
						</div>


						<div class="col-lg-4 col-md-6">
							<a href="">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<div class="row">
											<div class="text-center">
												<div class=""><h3>Pre-Appointment For Today</h3></div>
												<div class="huge">{{--count($todayVisitors)--}}</div>
												
											</div>
										</div>
									</div>
									
									<div class="panel-footer">
										<span class="pull-left">View Details</span>
										<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
										<div class="clearfix"></div>
									</div>
									
								</div>
							</a>
						</div>
					</div>     
				</div>
			</section>
		@endif

		


		</div>
	</div>
	@endsection





