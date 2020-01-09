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
                      <td>{{$row->kode}}</td>
                      <td>{{$row->name}}</td>
                      <td>{{$row->qty}}</td>
                      <td>{{$row->price}}</td>
                      <td>
                        <a href="" type="button" class="btn btn-primary">Edit</a>
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

@endsection
@section('script')
<script>
$(document).ready(function(){
    $('#delete').on('click', function(){
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
                    url: '/admin/delete',
                    type: 'GET',
                    data: {
                    'delete': 1,
                    'id': id,
                  },
                  success: function(response){


                  }
                  });
            }
          })
    });
});
</script>

@endsection
