<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
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

            @if(session()->has('message'))
                <div style="height:25%">
                  <div class="alert alert-danger" >
                      <button class="close" data-dismiss="alert">x</button>
                      {{session()->get('message');}}
                  </div>
                </div>
                <br>
            @endif
            <div align="center" style="padding:100px;float:left">
              <form action="{{url('search_result')}}" method="POST" enc-type="multipart/form-data">
                @csrf
                <input type="text" name="name" width="250px" style="color:black;" placeholder="enter sick name">
                <input type="submit" value="Search" class="btn btn-success" style="display:block;margin-top:15px;">
              </form>
            </div>
        </div>
      </div>
        @include('admin.script')
  </body>
</html>
