@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-5">
                            <h3>Dashboard</h3>
                        </div>
                        <div class="col-sm-7">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">
                                <i class="fas fa-home"></i> Home
                            </a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $li_user }}</h3>

                            <p>Total Registered Users</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ route('frontend_users') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$li_department}}</h3>

                            <p>Total Department</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{route('department_list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $li_product }}</h3>

                            <p>Total Active Products</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ route('product_list') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $li_order }}</h3>

                            <p>Total Orders</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->

            </div>
            <div class="row">
                <div class="col-md-12 ">
                    <div class="card card-outline card-warning p-3 data-preview">
                        <div class="table-responsive">
                            <table id=" " class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>New Order</th>
                                        <th>Complete Order</th>
                                        <th>Incomplete Order</th>
                                        <th>Failed Order</th>
                                        <th>Cancelled Order</th>
                                        <th>Quote Order</th>
                                        <th> Refunded Order</th>
                                        <th> Unpaid Order</th>
                                        <th> Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="{{ route('order_list') .'?st=New' }}">{{$order_no['o_New']}} </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('order_list') .'?st=Complete' }}">{{$order_no['o_Complete']}} </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('order_list') .'?st=Incomplete' }}">{{$order_no['o_Incomplete']}} </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('order_list') .'?st=Failed' }}">{{$order_no['o_Failed']}} </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('order_list') .'?st=Cancelled' }}">{{$order_no['o_Cancelled']}} </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('order_list') .'?st=Quote' }}">{{$order_no['o_Quote']}} </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('order_list') .'?st=Refunded' }}">{{$order_no['o_Refunded']}} </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('order_list') .'?st=Unpaid' }}">{{$order_no['o_Unpaid']}} </a>
                                        </td>
                                        <th>{{$li_order}}</th>

                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

 
                </div>
                <div class="col-md-12">
                    <div class="card card-outline card-info spec-details">
                        <div class="card-body">
                            <h3 class="heading">Order Report #Last 12 Months</h3>
                            <canvas id="saleRepMonth" width="400" height="120"></canvas>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-6">
                    <div class="card card-outline card-info spec-details">
                        <div class="card-body">
                            <h3 class="heading">Total user added report</h3>
                            <canvas id="myChart2" width="400" height="200"></canvas>
                        </div>
                    </div>
                </div> -->
            </div>


        </div>
    </div>
</div>


<!--- -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <p></p>
            </div>
        </div>
    </div>
</div>
<!--- -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>

<script>
    const ctx = document.getElementById('saleRepMonth').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'line', // bar
        data: {
            labels: <?= $saleRepMonthList ?>,
            datasets: [{
                label: 'Orders',
                data: <?= $saleRepOrderList ?>,
                backgroundColor: [
                    'rgba(30, 194, 69, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(30, 194, 69, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(30, 194, 69, 0.6)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 0
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    const ctx2 = document.getElementById('myChart2').getContext('2d');
    const myChart2 = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 6, 13, 50, 60, 40, 20, 100, 80],
                backgroundColor: [
                    'rgba(60, 94, 69, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(30, 94, 69, 0.6)',
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
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection