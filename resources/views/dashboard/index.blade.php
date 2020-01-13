@extends('dashboard.master')

@section('content')
<div class="row">

    <div class="col-md-12">
        <div class="card ">
            <div class="card-header ">
                <h4 class="card-title">Users Behavior</h4>
                <p class="card-category">24 Hours performance</p>
            </div>
            <div class="card-body ">
                <canvas id="myChart" ></canvas>
            </div>
            <div class="card-footer ">
                <div class="legend">
                    <i class="fa fa-circle text-info"></i> Open
                    <i class="fa fa-circle text-danger"></i> Click
                    <i class="fa fa-circle text-warning"></i> Click Second Time
                </div>
                <hr>
                <div class="stats">
                    <i class="fa fa-history"></i> Updated 3 minutes ago
                </div>
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
                        <tr><th>kode</th>
                        <th>Name</th>
                        <th>Jumlah</th>
                        <th>Tipe</th>
                    </tr></thead>
                    <tbody>
                        @foreach($transaction as $row)
                       <tr>
                       <td>{{$row['kode']}}</td>
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
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"> </script>

<script>
$.ajax({
url: "",
type: "GET",
dataType: 'json',
success: function(rtnData) {
    $.each(rtnData, function(dataType, data) {
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
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
