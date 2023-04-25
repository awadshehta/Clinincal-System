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
            <div align="center" style="padding:100px;">
               <table>
                    <tr style="padding:20px;">
                        <th style="padding:10px">Name</th>
                        <th style="padding:10px">Phone</th>
                        <th style="padding:10px">Speciality</th>
                        <th style="padding:10px">Room No/th>
                        <th style="padding:10px">Image</th>
                        <th colspan="2" style="padding:10px">Update/Delete</th>
                    </tr>
                    @foreach($data as $doctor)
                    <tr align="center" style="background-color:skyblue;padding:20px;">
                        <td>{{$doctor->name}}</td>
                        <td>{{$doctor->phone}}</td>
                        <td>{{$doctor->speciality}}</td>
                        <td>{{$doctor->room}}</td>
                        <td>
                            <img src="doctorimages/{{$doctor->image}}" alt="">
                        </td>
                        <td>
                            <a href="{{url('update_doctor', $doctor->id)}}" class="btn btn-success">Update</a>
                        </td>
                        <td>
                            <a href="{{url('delete_doctor', $doctor->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
               </table> 
            </div>
        </div>
        @include('admin.script')
  </body>
</html>
