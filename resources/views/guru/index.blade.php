@extends('pages.home')

@section('content')

<div class="row">
    <div class="container">
        <div class="col-sm-12">
            <h3>{{ $title }}</h3>
            <a href="{{ route('guru.add') }}" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-plus"></i> Add</a>
            <br/><br/>

            @include('Guru._search')
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <table class="table table-hover" id="table">
                              <thead>
                                <th>No.Induk Guru</th>
                                <th>Nama Guru</th>
                                <th>Alamat</th>
                                <th>Jenis Kelamin</th>
                                <th>Mata Pelajaran</th>
                                <th>&nbsp;</th>
                              </thead>
                              <tbody>
                                <?php $i = 1; ?>
                                @foreach($data as $row)
                                <tr>
                                    <td><?php echo $row->no_induk_guru ?></td>
                                    <td><?php echo $row->nama_guru ?></td>
                                    <td><?php echo $row->alamat ?></td>
                                    <td><?php echo $row->jenis_kelamin == 'Laki - Laki' ? 'Laki-Laki' : 'Perempuan' ?></td>
                                    <td><?php echo $row->matpel->nama_matpel ?></td>
                                    <td style="text-align:center;width:15%;">
                                        <a href="{{ URL::route('guru.edit', $row->id_guru) }}" class="btn btn-xs btn-primary" title="Edit">
                                        <i class="glyphicon glyphicon-edit"></i></a>
                                        <a href="{{ URL::route('guru.delete', $row->id_guru) }}" class="btn btn-xs btn-danger" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Are you sure ?">
                                        <i class="glyphicon glyphicon-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                        </div>
                    </div>
                    <?php echo $data->render(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection()


