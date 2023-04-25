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
            @else
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
                    </tr>
                    @foreach($rows as $data)
                    <tr align="center" style="background-color:skyblue;padding:20px;">
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{$data->phone}}</td>
                        <td>{{$data->doctor}}</td>
                        <td>{{$data->date}}</td>
                        <td>{{$data->message}}</td>
                        <td>{{$data->status}}</td>
                    </tr>

                    @endforeach
                </table>

                </div>
            @endif
            
        </div>
      </div>
    
        @include('admin.script')
  </body>
</html>
