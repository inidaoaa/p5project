@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        {{ __('Dashboard') }}
                    </div>
                    <div class="float-end">
                        <a href="{{ route('siswa.index') }}" class="btn btn-sm btn-outline-primary">Kembali</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- nama --}}
                        <div class="mb-3">
                            <label class="form-label">Nama siswa</label>
                            <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror" name="nama_siswa"
                                value="{{ old('nama_siswa') }}" placeholder="Nama siswa" required>
                            @error('nama_siswa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        {{-- jenis_kelamin --}}
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <input type="number" class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin"
                                value="{{ old('jenis_kelamin') }}" placeholder="Jenis kelamin" required>
                            @error('jenis_kelamin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        {{-- agama --}}
                        <div class="mb-3">
                            <label class="form-label">Agama</label>
                            <input type="text" class="form-control @error('agama') is-invalid @enderror" name="agama"
                                value="{{ old('agama') }}" placeholder="Agama" required>
                            @error('agama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        {{-- tmpt-lahir --}}
                        <div class="mb-3">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="date" class="form-control @error('tmpt_lahir') is_invalid @enderror" name="tmpt_lahir"
                                value="{{ old('tmpt_lahir') }}" placeholder="Tempat lahir" required>
                            @error('tmpt_lahir')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        {{-- tempt --}}
                        <div class="mb-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="text" class="form-control @error('tgal_lahir') is-invalid @enderror" name="tgal_lahir"
                                value="{{ old('tgal_lahir') }}" placeholder="Tempat lahir" required>
                            @error('tgal_lahir')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Kelas</label>
                            <select name="id_kelas" id="" class="form-control">
                               @foreach ($kelas as $item )
                                <option value="{{$item->id}}">{{$item->kelas}}</option>
                               @endforeach
                            </select>
                        </div>
                         <div class="mb-3">
                            <label for="">Jurusan</label>
                            <select name="id_jurusan" id="" class="form-control">
                               @foreach ($jurusan as $item )
                                <option value="{{$item->id}}">{{$item->nama_jurusan}}</option>
                               @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">foto</label>
                            <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto"
                                value="{{ old('foto') }}" required></input>
                            @error('foto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-sm btn-warning">Reset</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
