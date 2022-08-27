<!-- load file layout vào đây -->
@extends('frontend.layout')
@section('do-du-lieu')


<!-- new -->
<?php 
		$categories = DB::table("categories")->orderBy("id","desc")->get();
	 ?>
	@foreach($categories as $rowsCategory)
	
			

			 <?php 
	    	$otherNews = DB::table("news")->where("category_id","=",$rowsCategory->id)->offset(0)->take(4)->get();
	     ?>
	     @foreach($otherNews as $rows)
	<div class="col-sm-6 col-6 mb-xl-5  "> 
				<a href="{{ url('news/detail/'.$rows->id) }} " style="display: block;" class="card">
				<div class="card-flex " style="">

				<div class="img-link p-2">
				<img class="card-img-top "src="{{ asset('upload/news/'.$rows->photo) }}" alt="Card image" style="max-width:100%">
				</div>

				<div class="title-text p-2 " >

				<h5 class="text-hightn" style="">{{ $rows->name }}
	                <!-- lien quan den ckeditor thi phai dung ky hieu sau -->
	              
				</h5>


				</div>

				</div>	
				</a>
	</div>
	@endforeach

@endforeach


<!-- end new  -->



				 		



				 	


		



				 	</div>
				 </div>





				 

 			

@endsection
