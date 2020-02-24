<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Order Details</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  @include('layouts.navbar')
  @include('layouts.sidebar')

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Details for order id : {{ $order->id }}
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              @if($order->is_team)
              <h3 class="box-title">Team Details</h3>
              @else
              <h3 class="box-title">Participant Details</h3>
              @endif
            </div>
            @if($order->is_team)
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Role</th>
                    <th>Name</th>
                    <th>College ID</th>
                    <th>Phone</th>
                    <th>College</th>
                    <th>Year</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($order->team->members as $member)
                  <tr>
                    <td>{{ $order->team->leader_id == $member->id ? 'Leader' : 'Member' }}</td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->college_id }}</td>
                    <td>{{ $member->phone }}</td>
                    <td>{{ $member->college }}</td>
                    <td>{{ $member->year }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            @else
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>College ID</th>
                    <th>Phone</th>
                    <th>College</th>
                    <th>Year</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{ $order->participant->name }}</td>
                    <td>{{ $order->participant->college_id }}</td>
                    <td>{{ $order->participant->phone }}</td>
                    <td>{{ $order->participant->college }}</td>
                    <td>{{ $order->participant->year }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            @endif
            <hr>
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Event </th>
                    <th>Price </th>
                    <th>Paid Status</th>
                    <th>Played Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($order->events as $event)
                    <tr>
                      <td>{{ $event->name }}</td>
                      <td>{{ $event->price }}</td>
                      <td><span class="label label-{{ $event->pivot->paid == 0 ? 'danger' : 'success'}}">{{ $event->pivot->paid == 0 ? 'Not Paid' : 'Paid'}}</span></td>
                      <td><span class="label label-{{ $event->pivot->played == 0 ? 'danger' : 'success'}}">{{ $event->pivot->played == 0 ? 'Not Played' : 'Played'}}</span></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
  <div class="control-sidebar-bg"></div>
</div>
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('dist/js/demo.js') }}"></script>
</body>
</html>
