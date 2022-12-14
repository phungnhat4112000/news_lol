
@extends("backend.layout")
@section("do-du-lieu")
 <div class="main-content position-relative bg-gray-100  h-100">
 
             <!-- Reques::get("notify") <=> request("email") -->
                    @if(Request::get("notify") == "emailExists")
                    <p class="alert-danger text-center text-white">Email đã tồn tại!</p>
                    @endif
        
            
              
      
        <form method="post" action="{{ $action }}">
            <!-- trong laravel, muon bat duoc du lieu thi co tag csrf() -->
            <!-- viet tuong minh ham csrf(): <input type='hidden' name='csrf_token' value='...' -->
            <!-- @csrf -->
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Name</div>
                <div class="col-md-10">
                    <input type="text" value="{{ isset($record->name)?$record->name:'' }}" name="name" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Email</div>
                <div class="col-md-10">
                    <input type="email" value="{{ isset($record->email
                    )?$record->email:'' }}" name="email" class="form-control" required

                    >
                   
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Password</div>
                <div class="col-md-10">
                    <input type="password" name="password" @if(isset($record->email)) placeholder="Không đổi password thì không nhập thông tin vào ô textbox này" @else required @endif class="form-control">
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <input type="submit" value="Process" class="btn btn-primary">
                </div>
            </div>
            <!-- end rows -->
        </form>

        </div>
    

 </div>

 @endsection