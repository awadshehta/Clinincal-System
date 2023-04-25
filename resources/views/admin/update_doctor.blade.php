<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    @include('admin.css')
    <style>
        label{
            width:200px;
            display: inline-block;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div class="container" align="center" style="padding-top:100px">

                @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button class="close" data-dismiss="alert">x</button>
                        {{session()->get('message');}}
                    </div>

                @endif

                <form action="{{url('doctor_edit', $data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style="padding:15px">
                        <label for="Name">Doctor Name</label>
                        <input type="text" name="name" style="color:black" value="{{$data->name}}" required>
                    </div>

                    <div style="padding:15px">
                        <label for="Name">Doctor Phone</label>
                        <input type="text" name="phone" style="color:black" value="{{$data->phone}}" required>
                    </div>

                    <div style="padding:15px">
                        <label for="Name">Doctor Speciality</label>
                        <select name="speciality" style="color:black;width:200px;" " selected>
                            <option value="{{$data->speciality}}">{{$data->speciality}}</option>
                            <option value="skin">Skin</option>
                            <option value="heart">Heart</option>
                            <option value="eye">Eye</option>
                            <option value="nose">Nose</option>
                        </select>
                    </div>

                    <div style="padding:15px">
                        <label for="Name">Room No</label>
                        <input type="text" name="room" style="color:black" value="{{$data->room}}" required >
                    </div>

                    <div style="padding:15px">
                        <label for="Name">Doctor Image</label>
                        <img width="100px" height="100px" src="doctorimages/{{$data->image}}" alt="">
                    </div>

                    <div style="padding:15px">
                        <label for="Name">New Image</label>
                        <input type="file" name="image" required>
                    </div>

                    <div style="padding:15px">
                        <input type="submit" name="submit" vlaue="update" class="btn btn-success">
                    </div>

                </form>
            </div>
        </div>
    
        @include('admin.script')
  </body>
</html>
