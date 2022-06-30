@extends('mahasiswa.layout')

@section('content')

    <div class="container mt-5">

        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Edit mahasiswa
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="{{ route('mahasiswa.update', $mahasiswa->nim) }}" id="myForm"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="Nim">Nim</label>
                            <input type="text" name="nim" class="form-control" id="Nim" value="{{ $mahasiswa->nim }}"
                                aria-describedby="Nim">
                        </div>
                        <div class="form-group">
                            <label for="Nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="Nama" value="{{ $mahasiswa->nama }}"
                                aria-describedby="Nama">
                        </div>
                        <div class="form-group">
                            <label for="Kelas">Kelas</label>
                            <select name="kelas" class="form-control">
                                @foreach ($kelas as $kls)
                                    <option value="{{ $kls->id }}"
                                        {{ $mahasiswa->kelas_id == $kls->id ? 'selected' : '' }}>{{ $kls->nama_kelas }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Jurusan">Jurusan</label>
                            <input type="Jurusan" name="jurusan" class="form-control" id="Jurusan"
                                value="{{ $mahasiswa->jurusan }}" aria-describedby="Jurusan">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input autocomplete="off" type="text" name="email" class="form-control"
                                value="{{ $mahasiswa->email }}">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input autocomplete="off" type="text" name="alamat" class="form-control"
                                value="{{ $mahasiswa->alamat }}">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input autocomplete="off" type="date" name="tanggal_lahir"
                                value="{{ $mahasiswa->tanggal_lahir }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Jurusan">Foto</label>
                            <br>
                            <img width="50%"
                                src="{{ $mahasiswa->foto ? asset('storage/' . $mahasiswa->foto) : asset('storage/images/default.png') }}"
                                alt="{{ $mahasiswa->foto }}">
                            <input type="file" name="foto" class="form-control mt-3">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
