<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
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
              @if ($errors->any())
              @foreach ($errors->all() as $error)
                  <ul>
                      <li>
                          <p class="text-danger">{{ $error }}</p>
                      </li>
                  </ul>
              @endforeach
          @endif

              
              
                <form  action="{{ route('update.product', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Add Product</h4>
                            <form class="forms-sample">
                              <div class="form-group">
                                <label for="exampleInputName1">Product Title</label>
                                <input type="text" class="form-control text-light" id="exampleInputName1" placeholder="Product Title" name="product_title" value="{{ $product->title }}">
                              </div>
                              <div class="form-group">
                                <label for="exampleTextarea2">Product Description</label>
                                <textarea class="form-control text-light" id="exampleTextarea2" rows="4" placeholder="Product Description" name="product_des">{{ $product->description }}</textarea>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputprice1">Product Price</label>
                                <input type="number" class="form-control text-light" id="exampleInputprice1" placeholder="Price" name="product_price" value="{{ $product->price }}">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputprice2">Discount Price</label>
                                <input type="number" class="form-control text-light" id="exampleInputprice2"  name="dis_price" value="{{ $product->discount_price }}">
                              </div>
                              <div class="form-group">
                                <label for="exampleSelectGender">Product Category</label>
                                <select class="form-control text-light" id="exampleSelectGender" name="category">
                                    <option value="" selected>Select Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputquantity">Product Quantity</label>
                                <input type="text" class="form-control text-light" id="exampleInputquantity"  name="product_quantity" value="{{ $product->quantity }}">
                              </div>
                              <div class="form-group">
                                <label>Current Image</label>
                                <div class="input-group col-xs-12">
                                  <img style="height: 100px; width: auto;" src="{{ asset('product') }}/{{ $product->image }}" alt="">
                                </div>
                              </div>
                              <div class="form-group">
                                <label>Product Image</label>
                                <div class="input-group col-xs-12">
                                  <input type="file" class="form-control file-upload-info" name="product_image" id="" >
                                </div>
                              </div>
                              <button type="submit" class="btn btn-primary mr-2">Update Product</button>
                            </form>
                          </div>
                        </div>
                      </div>
                </form>
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
