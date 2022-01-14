@extends('layouts.master')

@section('title')
<title>Blog | E-Shopper</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('home/home.css')}}">
@endsection

@section('js')
<link rel="stylesheet" href="{{asset('home/home.js')}}">
@endsection

@section('content')

<body>

	<section>
		<div class="container">
			<div class="row">
				<!--sidebar-->
				@include('components.sidebar')
				<!--sidebar-->
				<div class="col-sm-9">

					<div class="blog-post-area">
						<h2 class="title text-center">Latest From our Blog</h2>


						<div class="single-blog-post">
							@foreach($tintucs as $tintuc)
							<h3>{{$tintuc->TT_TieuDe}}</h3>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i> {{$tintuc->TT_TacGia}}</li>
									<!-- <li><i class="fa fa-clock-o"></i> 1:33 pm</li> -->
									<li><i class="fa fa-calendar"></i> {{$tintuc->TT_Ngay}}</li>
								</ul>
								<span>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-half-o"></i>
								</span>
							</div>
							<a href="">
								<img src="{{config('app.base_url') . $tintuc->TT_paths}}" alt="">
							</a>
							<p>{{$tintuc->TT_HienThi}}</p>
							<a class="btn btn-primary" href="">Read More</a>

							@endforeach
						</div>


						<div class="pagination-area">
							<ul class="pagination">
								{{$tintucs->links()}}
							</ul>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>

</body>
@endsection