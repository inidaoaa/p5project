@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        {{ __('Siswa') }}
                    </div>
                    <div class="float-end">
                        <a href="{{ route('siswa.index') }}" class="btn btn-sm btn-outline-primary">Kembali</a>
                    </div>
                </div>

                <div class="card-body">
                    <img src="{{ asset('storage/siswas/' . $siswa->foto) }}" class="w-100 rounded">
                    <hr>
                    <p class="tmt-3">
                       {{ ($siswa->nama_siswa) }}
                    </p>
                    <p class="tmt-3">
                        {{ ($siswa->jenis_kelamin) }}
                    </p>
                    <p class="tmt-3">
                        {{ ($siswa->agama) }}
                    </p>
                    <p class="tmt-3">
                        {{ ($siswa->tmpt_lahir) }}
                    </p>
                    <p class="tmt-3">
                        {{ ($siswa->tgal_lahir) }}
                    </p>
                    <p class="tmt-3">
                        {{ ($siswa->kelas->kelas) }}
                    </p>
                    <p class="tmt-3">
                        {{ ($siswa->jurusan->nama_jurusan) }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
