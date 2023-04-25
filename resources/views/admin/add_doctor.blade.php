<!DOCTYPE html>
<html lang="en">
  <head>
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
                <form action="{{url('upload_doctor')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style="padding:15px">
                        <label for="Name">Doctor Name</label>
                        <input type="text" name="name" style="color:black" placeholder="Enter Doctor Name" required>
                    </div>

                    <div style="padding:15px">
                        <label for="Name">Doctor Phone</label>
                        <input type="text" name="phone" style="color:black" placeholder="Enter Doctor Phone" required>
                    </div>

                    <div style="padding:15px">
                        <label for="Name">Doctor Speciality</label>
                        <select name="speciality" style="color:black;width:200px;" required>
                            <option value="">--Select--</option>
                            <option value="skin">Skin</option>
                            <option value="heart">Heart</option>
                            <option value="eye">Eye</option>
                            <option value="nose">Nose</option>
                        </select>
                    </div>

                    <div style="padding:15px">
                        <label for="Name">Room No</label>
                        <input type="text" name="room" style="color:black" placeholder="Enter Doctor Room No" required >
                    </div>

                    <div style="padding:15px">
                        <label for="Name">Doctor Image</label>
                        <input type="file" name="image" required>
                    </div>

                    <div style="padding:15px">
                        <input type="submit" name="submit" class="btn btn-success">
                    </div>

                </form>
            </div>
        </div>
    
        @include('admin.script')
  </body>
</html>
