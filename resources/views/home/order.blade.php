<!DOCTYPE html>
<html>

<head>
     <!-- Basic -->
     <meta charset="utf-8" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <!-- Mobile Metas -->
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
     <!-- Site Metas -->
     <meta name="keywords" content="" />
     <meta name="description" content="" />
     <meta name="author" content="" />
     <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="">
     <title>Famms - Fashion HTML Template</title>
     <!-- bootstrap core css -->
     <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}" />
     <!-- font awesome style -->
     <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
     <!-- Custom styles for this template -->
     <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
     <!-- responsive style -->
     <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session()->get('message') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center bg-dark text-light p-3 h4">All Youre Order History Here!</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th> SL No. </th>
                                        <th> Title </th>
                                        <th> Quantity </th>
                                        <th> Price </th>
                                        <th> Payment Status </th>
                                        <th> Delivery Status </th>
                                        <th> Image </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($orders as $order)
                                        <tr>
                                            <td> {{ $loop->iteration }} </td>
                                            <td> {{ $order->product_title }} </td>
                                            <td> {{ $order->quantity }} </td>
                                            <td> $ {{ $order->price }} </td>
                                            <td> {{ $order->payment_status }} </td>
                                            <td> {{ $order->delevery_status }} </td>
                                            <td> <img style="height: 100px; width: auto;"
                                                    src="{{ asset('product') }}/{{ $order->image }}" alt="">
                                            </td>
                                            <td>
                                                @if ($order->delevery_status === 'Processing')
                                                    <a href="{{ route('cancel.order', $order->id) }}" class="btn btn-danger">Cancel Order</a>
                                                @else
                                                    <p class="text-danger">Not Allowed</p>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- footer start -->
    @include('home.footer')
    <!-- footer end -->
    <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

        </p>
    </div>
    <!-- jQery -->
    <script src="home/js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="home/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="home/js/bootstrap.js"></script>
    <!-- custom js -->
    <script src="home/js/custom.js"></script>
</body>

</html>
