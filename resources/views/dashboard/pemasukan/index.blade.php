@extends('dashboard.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card strpied-tabled-with-hover">
            <div class="card-header ">
                <div class="row">
                    <div class="col-md-2">
                            <h4 class="text-black">Pemasukan</h4>
                    </div>
                    <div class="col-md-10">
                            <div class="col text-right">
                                    <a  href="{{ Route('pengeluaran.show') }}" class="btn btn-info" id="">Tambah</a>
                            </div>
                    </div>
                </div>

            </div>
            <div class="card-body table-full-width table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr><th>kode</th>
                        <th>Name</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                    </tr></thead>
                    <tbody>

                      <tr>

                      </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
