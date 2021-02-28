@extends('layouts.master')

@section('content')

    <section class="content">
      <div class="row">
        <div class="col-md-12">
                @if(Session::has('sukses'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Sukses!</h4>
                    {{ Session::get('sukses') }}
                </div>
                @endif
 
                @if(Session::has('gagal'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Gagal!</h4>
                    {{ Session::get('gagal') }}
                </div>
                @endif

          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                <a href="{{ url('input-data')}}" class="btn btn-success">Input Sidang</a>
              </h3>
              <!-- tools box -->
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fas fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
              <div class="mb-3">
              <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <h3 class="card-title">
                {{ $title }}
              </h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nama</th>
                      <th>Ruangan</th>
                      <th>Nomor</th>
                      <th>Pihak</th>
                      <th>Hakim</th>
                      <th>Pengganti</th>
                      <th>Agenda</th>
                      <th>Photo</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($data as $e=>$dt)
                    <tr>
                      <td>{{ $e+1 }}</td>
                      <td>{{ $dt->nama }}</td>
                      <td>{{ $dt->ruangan }}</td>
                      <td>{{ $dt->nomor }}</td>
                      <td>{{ $dt->pihak }}</td>
                      <td>{{ $dt->hakim }}</td>
                      <td>{{ $dt->pengganti }}</td>
                      <td>{!! $dt->agenda !!}</td>
                        <td>
                            <img src="{{ asset($dt->photo)}}" alt="Data Sidang" width="50px" height="50px">
                        </td>
                        <td>
                            <a href="{{ url('sidang/edit/'.$dt->id)}}" class="btn btn-warning">Edit</a>
                            <a href="{{ url('sidang/hapus/'.$dt->id)}}" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
              </div>
              <p class="text-sm mb-0">
                Editor <a href="https://github.com/bootstrap-wysiwyg/bootstrap3-wysiwyg">Documentation and license
                information.</a>
              </p>
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>

@endsection