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
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr class="text-center">
                                                <th>SL No</th>
                                                <th> Title </th>
                                                <th> Price </th>
                                                <th> Discount Price </th>
                                                <th> Category </th>
                                                <th> Quantity </th>
                                                <th> Image </th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($products as $product)
                                                <tr class="text-center">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $product->title }}</td>
                                                    <td>{{ $product->price }}</td>
                                                    <td> {{ $product->discount_price }} </td>
                                                    <td> {{ $product->category}} </td>
                                                    <td> {{ $product->quantity }} </td>
                                                    <td>
                                                        <img style="height: 80px; width: auto; border-radius:0%"
                                                            src="{{ asset('product') }}/{{ $product->image }}"
                                                            alt="image">
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-danger"
                                                            href="{{ route('delete.product', $product->id) }}">Delete</a>
                                                        <a class="btn btn-info" href="{{ route('edit.product', $product->id) }}">Edit</a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="text-danger">No Product Added</td>
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
