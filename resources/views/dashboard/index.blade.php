@extends('dashboard.master')

@section('content')
<div class="row">

    <div class="col-md-12">
        <div class="card ">
            <div class="card-header ">
                <h4 class="card-title">Laba</h4>

            </div>
            <div class="card-body ">
                <canvas id="myChart" ></canvas>
            </div>

        </div>
    </div>
</div>
<div class="row">

    <div class="col-md-12">
        <div class="card strpied-tabled-with-hover">
            <div class="card-header ">
                <div class="row">
                    <div class="col-md-2">
                            <h4 class="text-black">Data</h4>
                    </div>

                </div>

            </div>
            <div class="card-body table-full-width table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr><th>Tanggal</th>
                        <th>Name</th>
                        <th>Jumlah</th>
                        <th>Tipe</th>
                    </tr></thead>
                    <tbody>
                        @foreach($transaction as $row)
                       <tr>
                       <td>{{$row['date']}}</td>
                        <td>{{ $row['name'] }}</td>
                        <td>{{ $row['price'] }}</td>
                         @if($row['type'] == 'Pemasukan')
                            <td> <span class="fa fa-circle text-info"></span> Pemasukan</td>
                            @else
                            <td><span class="fa fa-circle text-danger"></span>Pengeluaran</td>
                            @endif
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
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"> </script> --}}

 <script>
$.ajax({
url: "/admin/ajaxdashboard",
type: "GET",
dataType: 'json',
success: function(rtnData) {
    $.each(rtnData, function(dataType, data) {
                 var aku = [];
                var hello = [];
                var cobarray = [];
                rtnData['labels'].forEach((res) => {
                    var coba = new Date(res['date']).toLocaleString();
                    var coba2 = new Date(res['date']);
                    var total = res['data'];
                    var x = {};
                    var y = {};
                    var jumlah = {
                        x: coba2,
                        y: total
                    };
                    aku.push(coba);
                    hello.push(jumlah);

                });

                var result = {aku};
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: aku,
        datasets: [{
            label: 'Laba',
            data: hello,
            backgroundColor:
                'rgba(255, 99, 132, 0.2)',
            borderColor:
                'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

});
        },
        error: function(rtnData) {
            alert('error' + rtnData);
            console.log(rtnData + " asdnjanj");
        }
    });

</script>
@endsection
