@extends('dashboard.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Pemasukan</h4>
            </div>
            <div class="card-body">

            <form >

                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label>kode Barang</label>
                                <input type="text" class="form-control" placeholder="Nama" name="kode" id="kode" >
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label for="namabarang">Nama barang</label>
                                <select class="form-control namabarang" name="nama" id="namabarang">

                                  <option selected value="null">Pilih nama barang</option>
                                  @foreach($exp as $row)
                                <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                              </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jumlah Barang</label>
                                <input type="number" class="form-control qty" id="qty" placeholder="Jumlah" name="qty">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Harga Barang</label>
                                <input type="text" class="form-control harga" placeholder="Harga" name="price" id="price">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date">Tanggal</label>
                                <input type="date" class="form-control"  name="date" id="date">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="total">Total Harga</label>
                                <input type="text" disabled class="form-control total" name="total" id="total">
                            </div>
                        </div>
                    </div>
                <div  style=" display: flex; align-items: center; justify-content: center;">
                        <button id="Simpan"  type="button" class="btn btn-info btn-fill">Simpan</button>
                </div>
                <div class="clearfix"></div>

                </form>
            </div>
        </div>
    </div>

</div>
@endsection
@section('script')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script src="{{ asset('assets/js/sweetalert.js') }}"></script>
<script>
$(document).ready(function(){
    $('#qty').prop('disabled', true);
    $('.namabarang').select2();
        $('.harga , .qty').on('keyup', function(){
            var harga = $('.harga').val();
            var qty = $('.qty').val();
            ajax();
            $.ajax({
                url:'/admin/pemasukan/create/total',
                method:'POST',
                data:{'harga':harga,'qty':qty},
                success:function(response){
                    $('#total').val(response);
                }
            });
        });

        function ajax()
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                 });
        }
    $('.namabarang').on('change', function(){
        var id = $(this).val();
        if (id=='null') {
            $('#qty').prop('disabled', true);
            $('#Simpan').prop('disabled', true);
        }else{
            $('#qty').prop('disabled', false);
        }

        ajax();
            $.ajax({
                url:'/admin/pemasukan/create/fetchjumlah',
                method:'POST',
                data:{'id':id},
                success:function(data){
                    $('#qty').on('keyup', function(){
                        var jumlah = $(this).val();

                        if(jumlah > data){
                            swal("Gagal", "Jumlah maksimum barang "+data, "error");
                            $('#Simpan').prop('disabled', true);
                        }else{
                            $('#Simpan').prop('disabled', false);
                        }
                    });

                }
            });
    });


    $('#Simpan').on('click', function(){
        var kode = $('#kode').val();
        var id = $('#namabarang').val();
        var qty = $('#qty').val();
        var total = $('#total').val();
        var date = $('#date').val();
        var price = $('#price').val();
        ajax();
        $.ajax({
            url:'/admin/pemasukan/create',
            method:'POST',
            data:{'kode':kode,'id':id,'date':date, 'qty':qty, 'total':total,'price':price},
            success:function(response){
                swal("Berhasil!", "Data berhasil ditambahkan", "success");
                    window.setTimeout(function(){window.location.href="/admin/pemasukan"}, 1500);
            }
        });

    });
});
</script>
@endsection
