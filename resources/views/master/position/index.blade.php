@extends('layout')
@section('content')
<h1 class="mt-4">Posisi</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active">Posisi</li>
</ol>
@if ($message = Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ Session::get('success') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if (Session::has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ Session::get('error')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="mb-4">
    <div class="card">
        <div class="card-header">
            <div class="row justify-content-between">
                <h3 class="col-11">Data Posisi</h3>
                <div class="col-1">
                    <a href="/position/add" class="btn btn-sm btn-primary"><span class="fa fa-plus"></span></a>
                </div>

            </div>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-condensed table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Posisi</th>
                            <th>Hari Kerja</th>
                            <th>Lembur</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data as $key => $value) { ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $value->name; ?></td>
                                <td><?php echo number_format($value->work_days) ?> hari</td>
                                <td>Rp. <?php echo number_format($value->overtime); ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="/position/edit/{{$value->id}}" class="btn btn-sm btn-success"><span class="fa fa-pencil"></span></a>
                                        <button type="button" class="btn btn-sm btn-danger" onclick="showDialogDelete('{{$value->id;}}')"><span class="fa fa-remove"></span></button>
                                    </div>
                                </td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<form action="/position/delete" method="post" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Posisi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @csrf
                <input type="hidden" name="id" id="id" />
                <p>Anda yakin ingin menghapus posisi ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
        </div>
    </div>
</form>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        let table = new DataTable('.table');
    });

    function showDialogDelete(id) {
        $("#exampleModal #id").val(id);
        $("#exampleModal").modal('show');
    }
</script>
@endsection
