
<!-- load file layout.blade.php -->
@extends("backend.layout")
<!-- đổ dữ liệu ben dưới vào file layout.blade.php, đổ vào tag do-du-lieu -->
 @section("do-du-lieu")
  <div class="main-content position-relative bg-gray-100   h-100">
    <!-- Navbar -->
   
    <!-- End Navbar -->
    <div class="container-fluid px-2 px-md-4">
      <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <span class="mask  bg-gradient-primary  opacity-6"></span>
      </div>
  <a href="{{ url('admin/news/create')}}" style="color:#e91e63;margin-top:5px;background-color:#fff;padding: 3px;border-radius: 5px;" ><i class="fas fa-user-plus"></i>Add new</a>
     <!-- quản lí user -->
      
        


        <table class="table-system-user">
         <tr>
                    <th style="width:100px;">Image</th>
                    <th>Title</th>
                    <th style="width:200px;">Category</th>
                    <th style="width:100px;">Hot news</th>
                    <th style="width:100px;"></th>
                </tr>

                @foreach($data as $rows)
                <tr>
                    <td>
                     @if(file_exists('upload/news/'.$rows->photo))
                        <img src="{{ asset('upload/news/'.$rows->photo) }}" style="width:100px;">
                        @endif
                    </td>
                    <td>{{ $rows->name }}</td>
                    <td> 
                         <?php 
                        $category = DB::table("categories")->where("id","=",$rows->category_id)->first();
                       echo isset($category->name)?$category->name:"";
                         ?> 
                    </td>
                    <td style="text-align:center;">
                        @if($rows->hot == 1)
                        Hot
                        @endif
 
                    </td>

                    <td style="text-align:center;">
                        <a href="{{ url('admin/news/update/'.$rows->id )}}" >Edit</a>
                        <a href="{{ url('admin/news/delete/'.$rows->id ) }}" onclick="return window.confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
          @endforeach
        
        </table>
        
         {{$data->render() }}
            
     
    </div>
 
  </div>


@endsection