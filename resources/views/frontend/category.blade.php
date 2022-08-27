{{--  <div class="col-2">
						<div class="col-sm">					 		
				 			<ul> <h3>Danh mục</h3>
				 				<?php 
				 				//->get() là lấy tất cả kết quả trả về
				 				//có thể dùng full sql
				 				//$categories = DB::select("select *from categories order by id desc")
				 				$categories = DB::table("categories")->orderBy("id","desc")->get();
				 				  ?>
				 				  @foreach($categories as $rows)
				 				<li><a href="{{url('category/news/'.$rows->id)}}">{{$rows->name}}</a></li>
				 			
				 				@endforeach
				 			</ul>


				 			{{-- <div style="padding-top:100.000%;position:relative;"><iframe src="https://gifer.com/embed/4Kj3" width="100%" height="100%" style='position:absolute;top:0;left:0;' frameBorder="0" allowFullScreen></iframe></div> --}}
				
				 	</div>

  </div> --}}