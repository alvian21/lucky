@extends('dashboard.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Pengeluaran</h4>
            </div>
            <div class="card-body">
                @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    {{$errors->first()}}
                </div>
                @endif
            <form method="POST" action="{{Route('pengeluaran.create')}}" >
                @csrf
                <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label>Kode Barang</label>
                                <input type="text" class="form-control" name="kode"placeholder="Tipe" >
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" class="form-control" name="name" placeholder="Nama" >
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jumlah Barang</label>
                                <input type="text" class="form-control qty" placeholder="Jumlah" name="qty">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Harga Barang</label>
                                <input type="text" class="form-control harga" placeholder="Harga" name="price">
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="total">Total Harga</label>
                                <input type="text" class="form-control total" id="total"  name="total">
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
@section('script')
<script>
$(document).ready(function(){
   
        $('.harga , .qty').on('keyup', function(){
            var harga = $('.harga').val();
            var qty = $('.qty').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                 });
            $.ajax({
                url:'/admin/pengeluaran/create/total',
                method:'POST',
                data:{'harga':harga,'qty':qty},
                success:function(response){
                    $('.total').val(response);
                }
            });
        });
});
</script>
@endsection
