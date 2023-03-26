<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.navbar')
            <!-- partial -->
            <div class="main-panel ">
                <div class="content-wrapper ">
                    @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('message') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Product Table</h4>
                                <div class="table-responsive ">
                                    <table class="table table-striped "  >
                                        <thead >
                                            <tr class="text-center" >
                                                <th>SL No</th>
                                                <th> Name </th>
                                                <th> Email </th>
                                                <th> Phone </th>
                                                <th> Address </th>
                                                <th> Product Title </th>
                                                <th> Quantity </th>
                                                <th> Price </th>
                                                <th> Payment Status </th>
                                                <th> Delevery Status </th>
                                                <th> Image </th>
                                                <th> Delivered </th>
                                                <th> Pdf Download </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($orders as $order)
                                                <tr class="text-center text-light" >
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $order->name }}</td>
                                                    <td>{{ $order->email }}</td>
                                                    <td> {{ $order->phone }} </td>
                                                    <td> {{ $order->address }} </td>
                                                    <td> {{ $order->product_title }} </td>
                                                    <td> {{ $order->quantity }} </td>
                                                    <td> ${{ $order->price }}/= </td>
                                                    <td> {{ $order->payment_status }} </td>
                                                    <td> {{ $order->delevery_status }} </td>
                                                    <td>
                                                        <img style="height: 50px; width: auto; border-radius:0%"
                                                            src="{{ asset('product') }}/{{ $order->image }}"
                                                            alt="image">
                                                    </td>
                                                    <td>
                                                        @if ($order->delevery_status == 'Processing')
                                                        <a href="{{ route('delivered.product', $order->id) }}" class="btn btn-primary" onclick="return confirm('Are You sure your product delivered!!')">Delivered</a>
                                                        @else
                                                            <p class="text-success">Delivered</p>
                                                        @endif
                                                        
                                                    </td>
                                                    <td><a href="{{ route('get.pdf', $order->id) }}" class="btn btn-info">Print Pdf</a></td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="text-danger">No order placed yet</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
</body>

</html>
