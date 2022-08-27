
@extends("frontend.layout")
@section("do-du-lieu")

<?php 
	$news = DB::table("news")->where("id","=",$id)->first();
 ?>
 <div class="col-12  "> 
<h2>{{$news->name}}</h2>
<img src=" {{ asset('upload/news/'.$news->photo) }}" alt="">

<P>{{!! $news->description !!}}</P>
<P>{{ $news->content }}</P>	

</div>

@endsection