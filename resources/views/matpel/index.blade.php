@extends('pages.home')

@section('content')

<div class="row">
    <div class="container">
        <div class="col-sm-12">
            <h3>{{ $title }}</h3>
            <a href="{{ route('matpel.add') }}" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-plus"></i> Add</a>
            <br/><br/>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                    <th>No.</th>
                                    <th>Kode Mata Pelajaran</th>
                                    <th>Nama Mata Pelajaran</th>
                                    <th>KKM</th>
                                    <th>&nbsp;</th>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                    @foreach($data as $row)
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo $row->kode_matpel ?></td>
                                            <td><?php echo $row->nama_matpel ?></td>
                                            <td><?php echo $row->kkm ?></td>
                                            <td style="text-align:center;width:15%;">
                                                <a href="{{ URL::route('matpel.edit', $row->id_matpel) }}" class="btn btn-xs btn-primary">
                                                <i class="glyphicon glyphicon-edit"></i> Edit</a>
                                                <a href="{{ URL::route('matpel.delete', $row->id_matpel) }}" class="btn btn-xs btn-danger">
                                                <i class="glyphicon glyphicon-trash"></i> Hapus</a>
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


