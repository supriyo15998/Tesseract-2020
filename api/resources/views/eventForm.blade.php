<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ $title }}</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  @include('layouts.navbar')

  @include('layouts.sidebar')

  <div class="content-wrapper">
    <section class="content-header">
      <h1>Add Events</h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Events</a></li>
        <li class="active">Add Events</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box box-primary" style="padding: 4%">
            <div class="box-header with-border" style="text-align: center; font-weight: bold;">
              <h3 class="box-title">Add Events</h3>
            </div>
            @if($errors->any())
              <div class="alert alert-danger">
                <ul> 
                  @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <form method="POST" action="{{ route('registerEvent') }}" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="category_id">Event Category</label>
                  <select id="event_category" class="form-control" name="category_id">
                    <option autofocus selected="">Select Package Category</option>
                    @foreach($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputName">Event Name</label>
                  <input type="text" name="name" id="inputName" class="form-control">
                </div>
                <div class="form-group">
                  <label for="price">Price</label>
                  <input id="price" name="price" type="number" class="form-control">
                </div>
               
                <div class="form-group">
                  <label for="description">Event Description</label>
                  <textarea name="description" id="description" class="form-control"></textarea>
                </div>
                
                <div class="form-group">
                  <label for="rules">Event Rules</label>
                  <input type="file" id="rules" name="rules">
                </div>

                <div class="form-group d-flex flex-column">
                  <label for="image">Upload Event Photo</label>
                  <input type="file" id="image" name="photo">
                </div>
                <div class="form-group d-flex flex-column">
                  <input type="submit" name="create_package" class="btn btn-success" value="Create Event">
                </div>
              </div>
            <form>
          </div>
        </div>
      </div>
    </section>
  </div>
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
<script src="{{ asset('bower_components/fastclick/lib/fastclick.js')}}"></script>
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('dist/js/demo.js') }}"></script>
</body>
</html>
