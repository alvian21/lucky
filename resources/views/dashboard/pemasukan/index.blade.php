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
                                    <a  href="{{ Route('pemasukan.show') }}" class="btn btn-info" id="">Tambah</a>
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
                        <th>Aksi</th>
                    </tr></thead>
                    <tbody>
                        @foreach($data as $row)
                      <tr>
                        <td style="display: none;">{{ $row->id }}</td>
                      <td>{{$row->kode}}</td>
                      <td>{{$row->name}}</td>
                      <td>{{$row->qty}}</td>
                      <td>{{$row->price}}</td>
                      <td>
                        <button type="button" class="btn btn-primary" id="edit" data-id="{{$row->id}}">Edit</button>
                      <button type="button" class="btn btn-danger delete" data-id="{{$row->id}}" >Hapus</a>

                      </td>
                      </tr>
                      @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Pemasukan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="formedit">
                <input type="hidden" name="id" id="id">
                <div class="form-group">
                  <label for="kode_barang">Kode Barang</label>
                  <input type="text" class="form-control" id="kode_barang" name="kode_barang" >
                </div>
                <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" >
                </div>
                  <div class="form-group">
                    <label for="jumlah_barang">Jumlah Barang</label>
                    <input type="text" class="form-control" id="jumlah_barang" name="jumlah_barang">
                </div>
                <div class="form-group">
                    <label for="harga_barang">Harga Barang</label>
                    <input type="text" class="form-control" id="harga_barang" name="harga_barang">
                </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="savedata">Save changes</button>
        </div>
    </form>
      </div>
    </div>
  </div>
@endsection
@section('script')

<script src="{{ asset('assets/js/sweetalert.js') }}"></script>
<script>
$(document).ready(function(){
    $('.delete').on('click', function(){
        var id = $(this).data('id');
        console.log(id);
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: '{{ Route("pemasukan.delete") }}',
                    type: 'GET',
                    data: {
                    'delete': 1,
                    'id': id,
                  },
                  success: function(response){
                    swal("Berhasil!", "Data has been delete", "success");
                    window.setTimeout(function(){window.location.reload()}, 2000);
                  }
                  });
            }
          })
    });

    $('#edit').on('click', function(){
        $('#exampleModal').modal('show');
        var tr = $(this).closest('tr');
        var data = tr.children('td').map(function(){
            return $(this).text();
        }).get();
        $('#id').val(data[0]);
       $('#kode_barang').val(data[1]);
       $('#nama_barang').val(data[2]);
       $('#jumlah_barang').val(data[3]);
       $('#harga_barang').val(data[4]);
    //    var form = ('#formedit').serialize();
       $('#savedata').on('click', function(){
          var id = $('#id').val();
            var kode = $('#kode_barang').val();
            var name = $('#nama_barang').val();
            var jumlah = $('#jumlah_barang').val();
            var harga = $('#harga_barang').val();
           var form = {
            'edit':1,
            'id':id,
            'name':name,
            'jumlah':jumlah,
            'kode':kode,
            'harga':harga
           };
           $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                 });
             $.ajax({
                url: '{{Route("pemasukan.edit")}}',
                method: 'POST',
                data: form,
                success:function(response){
                    $('#exampleModal').modal('hide');
                    swal("Berhasil!", "Data has been edited", "success");
                    window.setTimeout(function(){window.location.reload()}, 1500);
                }
            });
       });

    });
});
</script>

@endsection
