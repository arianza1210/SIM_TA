@extends("layouts.main")

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Pendapatan</h1>
        <a href="{{ route('omset.create') }}" class="btn btn-success btn-icon-split mb-3">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah Data</span>
        </a>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>No Polisi</th>
                                <th>Nama Supir</th>
                                <th>Biaya/1 Mobil</th>
                                <th>Pengeluaran JKT</th>
                                <th>Pengeluaran LPG</th>
                                <th>Jumlah</th>
                                <th>Action</th>

                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>02/10/2021</td>
                                <td>BE 9781 BE</td>
                                <td>Buyung</td>
                                <td>Rp. 6.000.000</td>
                                <td>Rp. 6.000.000</td>
                                <td>Rp. 6.000.000</td>
                                <td>Rp. 6.000.000</td>
                                <td><a href="{{ route("omset.edit", 1) }}" class="btn-circle btn-warning btn-sm">
                                        <span class="icon text-white-20">
                                            <i class="fas fa-pen"></i>
                                        </span>
                                    </a>
                                    <a href="#" class="btn-circle btn-danger btn-sm">
                                        <span class="icon text-white-20">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                    </a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
