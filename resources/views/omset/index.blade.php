@extends("layouts.main")

@section('content')
<div class="container-fluid">
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil!</strong> {{ session('success') }}.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pendapatan</h1>
    <div class="d-flex">
        <a href="{{ route('omset.create') }}" class="btn btn-success btn-icon-split mb-3">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah Data</span>
        </a>
        <select class="btn btn-secondary dropdown-toggle mb-3 ml-3" aria-label="Default select example">
            <option selected>Bulan</option>
            <option value="01">Januari</option>
            <option value="02">Februari</option>
            <option value="03">Maret</option>
            <option value="04">April</option>
            <option value="05">Mei</option>
            <option value="06">Juni</option>
            <option value="07">Juli</option>
            <option value="08">Agustus</option>
            <option value="09">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
        </select>

        <select class="btn btn-secondary dropdown-toggle mb-3 ml-1" aria-label="Default select example">
            <option selected>Tahun</option>
            <option value="1">2022</option>
            <option value="2">2023</option>
            <option value="3">2024</option>
        </select>

        <button type="button" class="btn btn-primary mb-3 ml-1"><i class="fas fa-search"></i> Cari</button>
        <div class="ml-auto">
            <button class="btn btn-warning mb-3"><i class="fas fa-file-code"></i> Backup</button>
            <button class="btn btn-success mb-3"><i class="fas fa-file-excel"></i> Excel</button>
            <button class="btn btn-primary mb-3"><i class="fas fa-file-word"></i> Word</button>
            <button class="btn btn-danger mb-3"><i class="fas fa-file-pdf"></i> PDF</button>
        </div>
    </div>
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
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($omsets as $omset)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $omset->created_at->format('Y-m-d') }}</td>
                            <td>{{ $omset->nopol }}</td>
                            <td>{{ $omset->nama_supir }}</td>
                            <td id="uang">{{ $omset->biaya_mobil }}</td>
                            <td id="uang">{{ $omset->pengeluaran_jkt }}</td>
                            <td id="uang">{{ $omset->pengeluaran_lpg }}</td>
                            <td id="uang">{{ $omset->jumlah_omset_bersih }}</td>
                            <td><a href="{{ route('omset.edit', $omset->id) }}" class="btn-circle btn-warning btn-sm">
                                    <span class="icon text-white-20">
                                        <i class="fas fa-pen"></i>
                                    </span>
                                </a>
                                <form action="{{ route('omset.delete', $omset->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method("DELETE")
                                    <button onclick="return confirm('Apakah ingin menghapus data ini ?')" class="btn-circle btn-danger btn-sm">
                                        <span class="icon text-white-20">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="7">TOTAL</td>
                            <td colspan="2" id="uang">{{ $omsets->sum('jumlah_omset_bersih') }}</td>
                            <td style="display: none;"></td>
                            <td style="display: none;"></td>
                            <td style="display: none;"></td>
                            <td style="display: none;"></td>
                            <td style="display: none;"></td>
                            <td style="display: none;"></td>
                            <td style="display: none;"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection

@section('myscript')
<script>
    $(document).ready(function() {
        const uang = document.querySelectorAll("#uang");
        for (const x of uang) {
            x.innerHTML = rupiah(x.innerHTML)
        }
    });
</script>
@endsection