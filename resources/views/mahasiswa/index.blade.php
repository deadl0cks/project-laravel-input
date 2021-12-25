@extends('layout.master')

@section('content')
        @if(session('sukses'))
            <div class="alert alert-success" role="alert">
            {{session('sukses')}}
            </div>
        @endif
        <?php
            $tugas = @$_POST['nilaitugas'];
            $uts = @$_POST['nilaiuts'];
            $uas = @$_POST['nilaiuas'];
            $total = @$_POST['total'];
            $grade = @$_POST['grade'];

            if(isset($_POST['bproses'])){

                //menampung total nilai
                $total = ($tugas + $quis + $uts + $uas) / 4;
        
                //Pengujian Total Nilai untuk mendapatkan Grade
                if($total >= 90){
                    $grade = "A";
                }elseif($total >= 80 && $total < 90){
                    $grade = "AB";
                }elseif($total >= 70 && $total < 80){
                    $grade = "B";
                }elseif($total >= 60 && $total < 70){
                    $grade = "BC";
                }elseif($total >= 50 && $total < 60){
                    $grade = "C";
                }elseif($total >= 40 && $total < 50){
                    $grade = "D";
                }else{
                    $grade = "E";
                }
            }
        ?>
        <div class="row">
            <div class="col-6">
                <h3>Data Mahasiswa</h3>
            </div>

            <table class="table table-hover">
                <tr>
                    <th>NAMA DEPAN</th>
                    <th>NAMA BELAKANG</th>
                    <th>NIM</th> 
                    <th>NILAI TUGAS</th>
                    <th>NILAI UTS</th>
                    <th>NILAI UAS</th>
                    <th>GRADE</th>
                    <th>ACTION</th>
                </tr>
                @foreach($data_mahasiswa as $mahasiswa)
                <tr>
                    <td>{{$mahasiswa->nama_depan}}</td>
                    <td>{{$mahasiswa->nama_belakang}}</td>
                    <td>{{$mahasiswa->nim}}</td>
                    <td>{{$mahasiswa->nilaitugas}}</td>
                    <td>{{$mahasiswa->nilaiuts}}</td>
                    <td>{{$mahasiswa->nilaiuas}}</td>
                    <td>{{$mahasiswa->grade}}</td>
                    <td>
                        <a href="/mahasiswa/{{$mahasiswa->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/mahasiswa/{{$mahasiswa->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ?')">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>

            <div class="col-6">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah Data
                </button>
        
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mahasiswa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="/mahasiswa" method="POST">
                            {{csrf_field()}}
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Depan</label>
                            <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Belakang</label>
                            <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">NIM</label>
                            <input name="nim" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nilai Tugas</label>
                            <input name="nilaitugas" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$tugas?>">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nilai UTS</label>
                            <input name="nilaiuts" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$uts?>">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nilai UAS</label>
                            <input name="nilaiuas" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$uas?>">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Grade</label>
                            <input name="grade" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" value="<?=$total?>" name="bproses">Grade</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    </div>
                    </div>
                </div>
                </div>
            </div>

        </div>
@endsection        