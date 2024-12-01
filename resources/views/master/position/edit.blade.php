@extends('layout')
@section('content')
<h1 class="mt-4">Form Posisi</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="/position">Posisi</a></li>
    <li class="breadcrumb-item active">Form Posisi</li>
</ol>
<div class="card mt-4">
    <div class="card-header">
        <h3>Form Edit Posisi</h3>
    </div>
    <div class="card-body">
        <form action="/position/update" method="post">
            @csrf
            <input type="hidden" name="id" value="<?php echo $data->id;?>">
            <div class="form-group">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" id="name" class="form-control text-capitalize" required value="<?php echo $data->name;?>"/>
            </div>
            <div class="form-group">
                <label for="work_days" class="form-label">Hari kerja</label>
                <input type="number" name="work_days" id="work_days" class="form-control" min="1" required value="<?php echo $data->work_days;?>" />
            </div>
            <div class="form-group">
                <label for="overtime" class="form-label">Lembur</label>
                <input type="number" name="overtime" id="overtime" class="form-control" min="0" required  value="<?php echo $data->overtime;?>"/>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <button type="submit" class="btn btn-warning">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
