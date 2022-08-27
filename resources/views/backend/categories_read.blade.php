
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
  <a href="{{ url('admin/categories/create')}}" style="color:#e91e63;margin-top:5px;background-color:#fff;padding: 3px;border-radius: 5px;" ><i class="fas fa-user-plus"></i>Add categories</a>
     <!-- quản lí user -->
      
        


        <table class="table-system-user">
          <tr>
            <th>Name</th>
           
            
            
            <th>Edit</th>
          </tr>
          
          @foreach($data as $rows)
          
          <tr>
            
            <td> {{$rows->name}} </td>
            
           
          
            <td> <a href="{{url('admin/categories/delete/'.$rows->id) }}" style="font-size: 20px;" title="delete"><i class="far fa-trash-alt" onclick="return window.confirm('Bạn có muốn xoá không?');"></i></a>
             

              <a href="{{ url('admin/categories/update/'.$rows->id )}}" style="font-size: 20px;" title="edit"><i class="fas fa-edit"></i></a>
            </td> 
           
          </tr>
          @endforeach
        
        </table>
       
       {{$data->render()}}
            
     
    </div>
 
  </div>


@endsection