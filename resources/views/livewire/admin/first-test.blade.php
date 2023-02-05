<div>
    <div class="row">
        <div class="col-lg-2"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add">
            Tambah Data
          </button></div>
        <div class="col-lg-1 mb-1">
            <select wire:model='result' class="form-control">
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
        <div class="col-lg-3 mb-1">
            <input type="text" wire:model='search' class="form-control" placeholder="Cari Peserta">
        </div>
    </div>

    @if(session('pesan'))
    <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-check"></i> Sukses!</h5>
    {{session('pesan')}}
    </div>
    @endif
    @if(session('gagal'))
    <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-times"></i> Gagal!</h5>
    {{session('gagal')}}
    </div>
    @endif

        <table class="table table-striped table-responsive-lg">
            <thead>
            <tr>
                <th>Id Peserta</th>
                <th>Nama</th>
                <th>No Ujian</th>
                <th>Jumlah Putaran</th>
                <th>Kelebihan Jarak</th>
                <th>Hasil Gerakan</th>
                <th>Tanggal Test</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
                <tr>
                    <td>{{ $d->id_peserta }}</td>
                    <td>{{ $d->nama }}</td>
                    <td>{{ $d->noujian }}</td>
                    <td>{{ $d->putaran }}</td>
                    <td>{{ $d->jarak }}</td>
                    <td>{{ $d->gerakan }}</td>
                    <td>{{ date('d M Y', strtotime($d->created_at)) }}</td>
                    <td><button class="btn btn-success btn-sm mb-1" wire:click="edit({{$d->id_test1}})" data-toggle="modal" data-target="#edit">Edit</button>
                        <button class="btn btn-danger btn-sm mb-1" data-toggle="modal" data-target="#delete" wire:click="konfirmasiHapus({{$d->id_test1}})">Hapus</button></td>
                </tr>
            @endforeach
        </tbody>

        </table>

        {{-- {{ $data->links() }} --}}



      <!-- Modal EDIT USER -->
      <div wire:ignore.self class="modal fade" id="edit">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container">
                <form>
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nama Peserta</label>
                            <select class="form-control" wire:model="id_peserta" disabled>
                                <option value="">Cari Peserta</option>
                                @foreach ($peserta as $p)
                                    <option value="{{ $p->id_peserta }}">{{ $p->id_peserta }} - {{ $p->nama }}</option>
                                @endforeach
                            </select>
                            <div class="text-danger">
                                @error('id_peserta')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Putaran</label>
                            <input name="putaran" class="form-control" wire:model="putaran">
                            <div class="text-danger">
                                @error('putaran')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                          <label>Kelebihan Jarak</label>
                          <input name="jarak" class="form-control" wire:model="jarak">
                          <div class="text-danger">
                              @error('jarak')
                                  {{$message}}
                              @enderror
                          </div>
                      </div>

                      <div class="form-group">
                        <label>Hasil Gerakan</label>
                        <input name="gerakan" class="form-control" wire:model="gerakan">
                        <div class="text-danger">
                            @error('gerakan')
                                {{$message}}
                            @enderror
                        </div>
                    </div>
                    </div>

                </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <div class="form-group">
                <button class="btn btn-primary btn-sm" wire:click.prevent="update()">Simpan</button>
              </form>
            </div>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


      <!-- Modal Delete USER -->
      <div wire:ignore.self class="modal fade" id="delete">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Hapus User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    Apakah anda yakin untuk menghapus user ini?

                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <div class="form-group">
                <button class="btn btn-danger btn-sm" wire:click="delete()">Hapus</button>
            </div>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <!-- Modal ADD USER -->
  <div wire:ignore.self class="modal fade" id="add">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container">
            <form>
            @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nama Peserta</label>
                            <select class="form-control" wire:model="id_peserta">
                                <option value="">Cari Peserta</option>
                                @foreach ($peserta as $p)
                                    <option value="{{ $p->id_peserta }}">{{ $p->id_peserta }} - {{ $p->nama }}</option>
                                @endforeach
                            </select>
                            <div class="text-danger">
                                @error('id_peserta')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Putaran</label>
                            <input name="putaran" class="form-control" wire:model="putaran">
                            <div class="text-danger">
                                @error('putaran')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                          <label>Kelebihan Jarak</label>
                          <input name="jarak" class="form-control" wire:model="jarak">
                          <div class="text-danger">
                              @error('jarak')
                                  {{$message}}
                              @enderror
                          </div>
                      </div>

                      <div class="form-group">
                        <label>Hasil Gerakan</label>
                        <input name="gerakan" class="form-control" wire:model="gerakan">
                        <div class="text-danger">
                            @error('gerakan')
                                {{$message}}
                            @enderror
                        </div>
                    </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <div class="form-group">
            <button class="btn btn-primary btn-sm" wire:click.prevent="create()" id="tambahclose">Simpan</button>
          </form>
        </div>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <script>
    window.addEventListener('closeModal', event => {
     $("#add").modal('hide');
    })
    window.addEventListener('closeModal', event => {
     $("#edit").modal('hide');
    })
    window.addEventListener('closeModal', event => {
     $("#delete").modal('hide');
    })
    window.addEventListener('closeModal', event => {
     $("#reset").modal('hide');
    })

  </script>
    </div>
