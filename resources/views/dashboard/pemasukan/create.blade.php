@extends('dashboard.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Pemasukan</h4>
            </div>
            <div class="card-body">
            <form method="POST" action="{{Route('pemasukan.create')}}">
                @csrf
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label>kode Barang</label>
                                <input type="text" class="form-control" placeholder="Nama" name="kode" >
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" class="form-control" placeholder="Tipe" name="name" >
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jumlah Barang</label>
                                <input type="text" class="form-control" placeholder="Jumlah" name="qty">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Harga Barang</label>
                                <input type="text" class="form-control" placeholder="Harga" name="price">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date">Tanggal</label>
                                <input type="date" class="form-control"  name="date">
                            </div>
                        </div>
                    </div>
                <div  style=" display: flex; align-items: center; justify-content: center;">
                        <button id="Simpan" name="submit" type="submit" class="btn btn-info btn-fill">Simpan</button>
                </div>
                <div class="clearfix"></div>

                </form>
            </div>
        </div>
    </div>

</div>
@endsection
