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
                <table align="center" style="background-color:#000;">
                    <tr style="padding:20px;">
                        <th style="padding:10px">Customer Name</th>
                        <th style="padding:10px">Email</th>
                        <th style="padding:10px">Phone</th>
                        <th style="padding:10px">Doctor Name</th>
                        <th style="padding:10px">Date</th>
                        <th style="padding:10px">Message</th>
                        <th style="padding:10px">Status</th>
                        <th style="padding:10px" colspan="2">Approve/Cancel</th>
                    </tr>
                    @foreach($data as $appointment)
                    <tr align="center" style="background-color:skyblue;padding:20px;">
                        <td>{{$appointment->name}}</td>
                        <td>{{$appointment->email}}</td>
                        <td>{{$appointment->phone}}</td>
                        <td>{{$appointment->doctor}}</td>
                        <td>{{$appointment->date}}</td>
                        <td>{{$appointment->message}}</td>
                        <td>{{$appointment->status}}</td>
                        <td>
                            <a href="{{url('approve', $appointment->id)}}" class="btn btn-success">Approve</a>
                        </td>
                        <td>
                            <a href="{{url('cancel', $appointment->id)}}" class="btn btn-danger">Cancel</a>
                        </td>
                    </tr>

                    @endforeach
                </table>
            </div>

            
        </div>
    
        @include('admin.script')
  </body>
</html>
