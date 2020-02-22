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
        Details for order id : {{ $orderDetails->id }}
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Responsive Hover Table</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>

            <!-- IF SOLO -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Order ID</th>
                    <th>Participant Name</th>
                    <th>College ID</th>
                    <th>College</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Year</th>
                    <th>Event </th>
                    <th>Play Status</th>
                    <th>Paid Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Order id</td>
                    <td>lorem ipsume</td>
                    <td>lorem ipsume 2</td>
                    <td>lorem ipsume</td>
                    <td>lorem ipsume 2</td>
                    <td>lorem ipsume</td>
                    <td>lorem ipsume 2</td>
                    <td>
                      @for($event = 1; $event<=3 ; $event ++)
                        Each event name here<br>
                      @endfor
                    </td>
                    <td>
                      @for($event = 1; $event<=3 ; $event ++)
                        Each event play status here<br>
                      @endfor
                    </td>
                    <td>
                      @for($event = 1; $event<=3 ; $event ++)
                        Each event pay status here<br>
                      @endfor
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- IF TEAM -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Order ID</th>
                    <th>Participant Name</th>
                    <th>College ID</th>
                    <th>College</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Year</th>
                    <th>Event </th>
                    <th>Play Status</th>
                    <th>Paid Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Order id</td>
                    <td>lorem ipsume</td>
                    <td>lorem ipsume 2</td>
                    <td>lorem ipsume</td>
                    <td>lorem ipsume 2</td>
                    <td>lorem ipsume</td>
                    <td>lorem ipsume 2</td>
                    <td>
                      @for($event = 1; $event<=3 ; $event ++)
                        Each event name here<br>
                      @endfor
                    </td>
                    <td>
                      @for($event = 1; $event<=3 ; $event ++)
                        Each event play status here<br>
                      @endfor
                    </td>
                    <td>
                      @for($event = 1; $event<=3 ; $event ++)
                        Each event pay status here<br>
                      @endfor
                    </td>
                  </tr>
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
