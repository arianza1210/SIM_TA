@extends("layouts.main")

@section("content")
<form class="pendapatan ml-5">
    <h1>Tambah Data Pendapatan</h1>
    <div class="col-sm-5 mb-3 mb-sm-0">
        <div class="form-group">
            <p>Tanggal</p>
            <input type="date" class="form-control form-control-user" id="exampleInputDate" placeholder="Date">
        </div>
        <div class="form-group">
            <p>No Polisi</p>
            <input type="text" class="form-control form-control-user" id="exampleInputNoPol" placeholder="No Polisi">
        </div>
        <div class="form-group">
            <p>Nama Supir</p>
            <input type="text" class="form-control form-control-user" id="exampleInputNoPol" placeholder="Nama Supir">
        </div>
        <div class="form-group">
            <p>Jumlah</p>
            <input type="number" class="form-control form-control-user" id="exampleInputNoPol" placeholder="Jumlah Rp.">
        </div>


        <a href="/delbi/pendapatan/index.php" class="btn btn-success btn-user btn-block">
            Simpan
        </a>
    </div>
</form>
@endsection