@extends('Layout.main')

@section('master')

    <div class="pagetitle">
        <h1>{{ $title }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item">Data</li>
                <li class="breadcrumb-item active">New Mahasiswa</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-md-8">
          <div class="row">

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="card-body">
                  <form method="post" action="{{ route('save') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title mt-3"><b>Masukkan {{ $title }}</b></h5>
                    </div>
                    <div class="modal-body">
                      <div class="form-group row mt-3">
                          <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="nim" name="nim" required>
                          </div>
                      </div>
                        <div class="form-group row mt-3">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="kelas" name="kelas" required>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label for="matkul_id" class="col-sm-2 col-form-label">Mata Kuliah</label>
                            <div class="col-sm-10">
                                <select class="form-select" class="form-control" id="matkul_id" name="matkul_id" required>
                                    <option value="" selected>Pilih Mata Kuliah</option>
                                    @foreach ($data as $item)
                                        <option value="{{ $item->id }}">{{ $item->matkul }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer mt-3">
                        <a type="submit" class="btn btn-secondary" href="{{ route('data')}}">Kembali</a>
                        <button type="reset" class="btn btn-danger mx-2">Reset</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </form>
                </div>

              </div>
            </div><!-- End Recent Sales -->

          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>
@endsection
