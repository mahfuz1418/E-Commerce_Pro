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
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />
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
                        <h4 class="card-title text-center bg-dark text-light p-3 h4">All Youre Carts Here!</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th> SL No. </th>
                                        <th> Product Title </th>
                                        <th> Product Quantity </th>
                                        <th> Price </th>
                                        <th> Image </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $total = 0;
                                    ?>
                                    @foreach ($carts as $cart)
                                        <tr>
                                            <td> {{ $loop->iteration }} </td>
                                            <td> {{ $cart->product_title }} </td>
                                            <td> {{ $cart->quantity }} </td>
                                            <td> $ {{ $cart->price }} </td>
                                            <td> <img style="height: 100px; width: auto;" src="{{ asset('product') }}/{{ $cart->image }}" alt=""> </td>
                                            <td>
                                                <a href="{{ route('remove.cart', $cart->id) }}" class="btn btn-danger">Remove Product</a>
                                            </td>
                                        </tr>
                                        <?php
                                            $total = $total + $cart->price;
                                        ?>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>Total</td>
                                        <td>$ {{ $total }}</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                                
                            </table>
                            <div class="d-flex justify-content-end">
                                <div>
                                    @if ($total!=0)    
                                    <a href="{{ route('cash.order') }}" class="btn btn-success">Cash On Delivery</a>
                                    <a href="{{ route('stripe', $total) }}" class="btn btn-info">Pay Using Card</a>
                                    @endif
                                </div>
                            </div>
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
