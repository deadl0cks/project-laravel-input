@extends('layout.master')

@section('content')

<h1>Edit Data Siswa</h1>
        @if(session('sukses'))
            <div class="alert alert-success" role="alert">
            {{session('sukses')}}
            </div>
        @endif
        <div class="row">
            <div class="col-6">
            </div>

            <div class="modal-body">
                        <form action="/mahasiswa/{{$mahasiswa->id}}/update" method="POST">
                            {{csrf_field()}}
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Depan</label>
                            <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$mahasiswa->nama_depan}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Belakang</label>
                            <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$mahasiswa->nama_belakang}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">NIM</label>
                            <input name="nim" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$mahasiswa->nim}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nilai Tugas</label>
                            <input name="nilaitugas" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$mahasiswa->nilaitugas}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nilai UTS</label>
                            <input name="nilaiuts" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$mahasiswa->nilaiuts}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nilai UAS</label>
                            <input name="nilaiuas" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$mahasiswa->nilaiuas}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Grade</label>
                            <input name="grade" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$mahasiswa->grade}}">
                        </div>
                            <button type="submit" class="btn btn-warning">Update</button>
                        </form>
                    </div>
        </div>
@endsection