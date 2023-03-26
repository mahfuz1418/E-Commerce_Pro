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
              
                <form class="text-center my-5" action="{{ route('add.category') }}" method="post">
                    @csrf
                    <h1 class="" style="font-size: 30px">Add Category</h1>
                    <input class="text-dark" type="text" name="category" id="" placeholder="Category Name">
                    <button class="btn btn-outline-info p-2">Add Category</button>
                </form>

                <div class="row justify-content-center">
                  <div class="col-lg-6 grid-margin stretch-card ">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title text-center ">Category List</h4>
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th>SL No</th>
                                <th>Category Name</th>
                                <th>Created at</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($categories as $category)    
                              <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ \Carbon\Carbon::parse($category->created_at)->format('d M Y')}}</td>
                                <td><a href="{{ route('delete.category', $category->id) }}" class="badge badge-danger">Delete</a></td>
                              </tr>
                              @empty 
                              <tr>
                                <td class="text-danger">No Category Added</td>
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
