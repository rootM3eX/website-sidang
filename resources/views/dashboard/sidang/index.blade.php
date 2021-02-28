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
                Input Data Sidang
                <small>Isilah form dibawah ini</small>
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
                  <form action="{{ url('add-data-sidang')}}" method="post" enctype="multipart/form-data">
                  @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Ruangan</label>
                                <input type="text" name="ruangan" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nomor Perkara</label>
                                <input type="number" name="nomor" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="#">Agenda</label>
                                    <textarea class="textarea" name="agenda" placeholder="Place some text here"
                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>
                        </div>  <!-- Col-md-6 -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Para Pihak</label>
                                <input type="text" name="pihak" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Majelis Hakim</label>
                                <input type="text" name="hakim" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Photo</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="photo">
                            </div>
                            <div class="form-group">
                                <label for="#">panitera pengganti</label>
                                <input type="text" name="pengganti" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>  <!-- Col-md-6 -->
                    </div> <!-- Row -->
                  </form>
                  
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