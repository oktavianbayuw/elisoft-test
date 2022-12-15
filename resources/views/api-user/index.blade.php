@extends('layouts.layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            {{-- <h1>User</h1> --}}
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Api</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          {{-- <h3 class="card-title">User</h3> --}}
          <button type="button" class="btn btn-primary hit-data-api" data-id="{{ route('api.user') }}">Hit API</button>
        </div>
        
        <!-- /.card-body -->
      </div>

    </section>

    <section class="content user-data-api">

        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            {{-- <h3 class="card-title">User</h3> --}}
            <p class="list-data-api"></p>
            <button type="button" class="btn btn-primary hide-data-api">Hide</button>
          </div>
          
          <!-- /.card-body -->
        </div>
  
      </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Data User </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{-- <form> --}}
            <div class="form-group">
              <label for="exampleInputEmail1">Nama</label>
              <input type="text" disabled class="form-control user-name" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" disabled class="form-control user-email" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Created At</label>
              <input type="text" disabled class="form-control user-createdAt" id="exampleInputPassword1">
            </div>
          {{-- </form> --}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    $('.user-data-api').hide();

    $('.hit-data-api').click(function(e) {
        e.preventDefault();
        const url = $(this).data('id');
        $('.user-data-api').show();
        $.get(url, function(data) {
            console.log(JSON.stringify(data));
            $('.list-data-api').text(JSON.stringify(data, null, 4));
        });
    });

    $('.hide-data-api').click(function(e) {
        e.preventDefault();
        $('.user-data-api').hide();
    });
  </script>
@endsection


