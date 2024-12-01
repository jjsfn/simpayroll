@extends('layout')
@section('content')
<h1 class="mt-4">Form Posisi</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="/position">Posisi</a></li>
    <li class="breadcrumb-item active">Form Posisi</li>
</ol>
@if ($message = Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ Session::get('success') }}</strong>
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
<div class="card mt-4">
    <div class="card-header">
        <h3>Form Tambah Posisi</h3>
    </div>
    <div class="card-body">
        <form action="/position/save" method="post">
            @csrf
            <div class="form-group">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" id="name" class="form-control text-capitalize" required />
            </div>
            <div class="form-group">
                <label for="work_days" class="form-label">Hari kerja</label>
                <input type="number" name="work_days" id="work_days" class="form-control" min="1" required />
            </div>
            <div class="form-group">
                <label for="overtime" class="form-label">Lembur</label>
                <input type="number" name="overtime" id="overtime" class="form-control" min="0" required />
            </div>
            <div class="d-flex justify-content-center mt-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
