@extends('pages.home')

@section('content')

<div class="row">
    <div class="container">
        <div class="col-sm-12">
            <h3>{{ $title }}</h3>
            <a href="{{ route('siswa.add') }}" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-plus"></i> Add</a>
            <a href="{{ route('siswa.pdf') }}" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-save-file"></i> Seve to PDF</a>
            <br/><br/>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <table class="table table-hover" id="table">
                              <thead>
                                <th>No.Induk Siswa</th>
                                <th>Nama Siswa</th>
                                <th>Alamat</th>
                                <th>Jenis Kelamin</th>
                                <th>Kelas</th>
                                <th>&nbsp;</th>
                              </thead>
                              <tbody>
                                @foreach($data as $row)
                                <tr>
                                    <td>{{$row->no_induk_siswa}}</td>
                                    <td>{{$row->nama_siswa}}</td>
                                    <td>{{$row->alamat}}</td>
                                    <td>{{$row->jenis_kelamin}}</td>
                                    <td>{{$row->nama_kelas}}</td>
                                    <td>
                                        <a href="{{ URL::route('siswa.edit', $row->id_siswa) }}" class="btn btn-xs btn-primary" title="Edit">
                                        <i class="glyphicon glyphicon-edit"></i></a>
                                        <a href="{{ URL::route('siswa.delete', $row->id_siswa) }}" class="btn btn-xs btn-danger" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Are you sure ?">
                                        <i class="glyphicon glyphicon-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection()


