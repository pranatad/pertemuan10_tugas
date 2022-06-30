@extends('mahasiswa.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2">
                <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
            </div>
            <div class="float-right my-2">
                <a class="btn btn-success" href="{{ route('mahasiswa.create') }}"> Input Mahasiswa</a>
            </div>
        </div>
    </div>

     <p>Cari Data Mahasiswa :</p>
    <div class="row">
        <div class="col-md-6">
        <div class="input-group mb-3">
            <form class="form-inline" method="POST" action="{{ route('mahasiswa.search') }}">
                @csrf
                <input name="search" class="form-control" type="text" autocomplete="off"
                    placeholder="Cari">
                <button class="btn btn-primary" type="submit">Cari</button>
            </form>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Nim</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Foto</th>
            <th>Action</th>
        </tr>
        @foreach ($mahasiswa as $mhs)
            <tr>
                <td>{{ $mhs->nim }}</td>
                <td>{{ $mhs->nama }}</td>
                <td>{{ $mhs->kelas->nama_kelas }}</td>
                <td>{{ $mhs->jurusan }}</td>
                <td><img width="50px"
                        src="{{ $mhs->foto ? asset('storage/' . $mhs->foto) : asset('storage/images/default.png') }}"
                        alt="{{ $mhs->foto }}">
                </td>
                <td>
                    <form action="{{ route('mahasiswa.destroy', ['mahasiswa' => $mhs->nim]) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('mahasiswa.show', $mhs->nim) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('mahasiswa.edit', $mhs->nim) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                        <a class="btn btn-warning" href="{{ route('mahasiswa.khs', $mhs->nim) }}">Nilai</a>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="row">
        <div class="d-flex">
            {{ $mahasiswa->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
