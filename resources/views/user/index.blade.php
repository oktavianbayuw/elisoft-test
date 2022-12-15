@extends('layouts.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
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
          <h3 class="card-title">User</h3>
          @if ($message = Session::get('message') && $alert = Session::get('alert'))
            <div class="alert alert-{{ $alert }} alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong>{{ $message }}</strong>
            </div>
          @endif
          <div class="card-tools">
            <a href="{{ route('user.create') }}" class="btn btn-tool" title="Collapse">
                <i class="fas fa-plus"></i>
               Tambah Data</a>
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-eye-slash" aria-hidden="true"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects" style="text-align: center">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          No
                      </th>
                      <th style="width: 30%">
                          Name
                      </th>
                      <th style="width: 30%">
                          Email
                      </th>
                      <th style="width: 20%">
                        Action
                      </th>
                  </tr>
              </thead>
              <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($data as $item)
                <tr>
                    <td>
                        {{ $no++ }}
                    </td>
                    <td>
                        <a>
                            {{ $item->name }}
                        </a>
                        <br/>
                        <small>
                           Created at : {{ $item->created_at }}
                        </small>
                    </td>
                    <td>
                        {{ $item->email }}
                    </td>
                    <td class="project-actions text-right">
                        <a data-id="{{ $item->id }}" url="{{ route('user.show', $item->id) }}" style="color: white;" type="button" class="btn btn-primary btn-sm btn-view" data-toggle="modal" data-target="#exampleModal">
                            <i class="fas fa-folder">
                            </i>
                            View
                        </a>
                        <a class="btn btn-info btn-sm" href="#">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        @if ($item->id != Auth::user()->id)
                        <a class="btn btn-danger btn-sm" href="#">
                          <i class="fas fa-trash">
                          </i>
                          Delete
                        </a>
                        @endif
                        
                    </td>
                </tr>
                @endforeach
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

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
    $('.btn-view').click(function() {
      const id = $(this).data('id');
      const url_get = $(this).attr('url');
      $.get(url_get, function(data) {
        $('.user-name').val(data.data.name);
        $('.user-email').val(data.data.email);
        $('.user-createdAt').val(data.data.createdAt);
      });
    });
  </script>
@endsection


