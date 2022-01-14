<div class="col-sm-3">
	<div class="left-sidebar">
		<h2>Category</h2>
		<div class="panel-group category-products" id="accordian">
			<!--category-productsr-->
			@foreach($danhmucsaches as $danhmucsach)
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						@if($danhmucsach->categoryChildren->count())
						<a data-toggle="collapse" data-parent="#accordian" href="#sportswear_{{$danhmucsach->id}}">
							<span class="badge pull-right">							
								<i class="fa fa-plus"></i>
							</span>
							{{$danhmucsach->DMS_Tieude}}
						</a>
						@else
						<a href="{{route('category.product', ['slug' => $danhmucsach->slug, 'id' => $danhmucsach->id])}}">
							<span class="badge pull-right">
							</span>
							{{$danhmucsach->DMS_Tieude}}
						</a>
						@endif
					</h4>
				</div>
				<div id="sportswear_{{$danhmucsach->id}}" class="panel-collapse collapse">
					<div class="panel-body">
						<ul>
							@foreach($danhmucsach->categoryChildren as $categoryChildren)
							<li>
								<a href="{{route('category.product', ['slug' => $categoryChildren->slug, 'id' => $categoryChildren->id])}}">
									{{$categoryChildren->DMS_Tieude}}
								</a>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		<!--/category-products-->


	</div>
</div>