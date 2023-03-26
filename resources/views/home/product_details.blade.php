<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <base href="/public">
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
    <div class="hero_area ">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
        <div class="row justify-content-center my-5">
            <div class="col-sm-6 col-md-6 col-lg-6 bg-light">
                <div class="box py-3">

                    <div class="img-box text-center">
                        <img class="py-3" style="height: auto; width: 500px"
                            src="{{ asset('product') }}/{{ $product->image }}" alt="">
                    </div>
                    <div class="detail-box">
                        <h5 class="py-1">
                            {{ $product->title }}
                        </h5>
                        @if ($product->discount_price != null)
                            <h6  style="color: blue">
                                Discount Price: $ {{ $product->discount_price }}
                            </h6>
                            <h6  class="mb-2" style="color: red; text-decoration: line-through">
                                Price: $ {{ $product->price }}
                            </h6>

                            <div class="row py-1">
                                <div class="col-4">
                                    <h6>
                                        Product Description:
                                    </h6>
                                </div>
                                <div class="col-8">
                                    <h6>
                                        {{ $product->description }}
                                    </h6>
                                </div>
                            </div>
                            <div class="row py-1">
                                <div class="col-4">
                                    <h6>
                                        Product Quantity:
                                    </h6>
                                </div>
                                <div class="col-8">
                                    <h6>
                                        {{ $product->quantity }}
                                    </h6>
                                </div>
                            </div>
                            <div class="row py-1">
                                <div class="col-4">
                                    <h6>
                                        Product Category:
                                    </h6>
                                </div>
                                <div class="col-8">
                                    <h6>
                                        {{ $product->categoryRelation->category_name }}
                                    </h6>
                                </div>
                            </div>
                        @else
                            <h6 style="color: blue">
                                Price: $ {{ $product->price }}
                            </h6>
                            <div class="row py-1">
                                <div class="col-4">
                                    <h6>
                                        Product Description:
                                    </h6>
                                </div>
                                <div class="col-8">
                                    <h6>
                                        {{ $product->description }}
                                    </h6>
                                </div>
                            </div>
                            <div class="row py-1">
                                <div class="col-4">
                                    <h6>
                                        Product Quantity:
                                    </h6>
                                </div>
                                <div class="col-8">
                                    <h6>
                                        {{ $product->quantity }}
                                    </h6>
                                </div>
                            </div>
                            <div class="row py-1">
                                <div class="col-4">
                                    <h6>
                                        Product Category:
                                    </h6>
                                </div>
                                <div class="col-8">
                                    <h6>
                                        {{ $product->categoryRelation->category_name }}
                                    </h6>
                                </div>
                            </div>
                        @endif
                        <div class="btn-box">
                            <form action="{{ route('add.cart', $product->id) }}" method="post">
                                @csrf
                                <div class="row py-1">
                                    <div class="col-4">
                                        <h6 class="py-2">
                                            Product Category:
                                        </h6>
                                    </div>
                                    <div class="col-8">
                                        <input class="m-0 py-1 w-25" type="number" min="1"  value="1"
                                            name="quantity">
                                    </div>
                                </div>

                                <button class="btn btn-outline-info mt-3">
                                    Add Cart
                                </button>
                            </form>

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
