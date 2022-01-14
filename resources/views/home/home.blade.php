@extends('layouts.master')

@section('title')
<title>Home | E-Shopper</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('home/home.css')}}">
@endsection

@section('js')
<link rel="stylesheet" href="{{asset('home/home.js')}}">
@endsection

@section('content')

<body>

	<!--slider-->
	@include('home.components.slider')
	<!--/slider-->

	<section>
		<div class="container">
			<div class="row">
				@include('components.sidebar')
				<div class="col-sm-9 padding-right">
					<!--features_items-->
					@include('home.components.featureitem')
					<!--features_items-->

					<!--category-tab-->
					@include('home.components.category_tab')
					<!--/category-tab-->

					<!--recommended_items-->
				
					@include('home.components.recommend')
					<!--/recommended_items-->

				</div>

			</div>
		</div>
	</section>


</body>
@endsection