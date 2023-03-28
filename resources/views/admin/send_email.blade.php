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

                    <form action="{{ route('send.user.mail', $order->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                              <div class="card-body ">
                                <h4 class="card-title">Send Email To - {{ $order->name }}({{ $order->email }})</h4>
                                <form class="forms-sample">
                                  <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Email Gretting</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control text-light" id="exampleInputUsername2" placeholder="Email Gretting" name="gretting">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email First Line</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control text-light" id="exampleInputEmail2" placeholder="Email First Line" name="firstline">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="exampleInputbody" class="col-sm-3 col-form-label">Email Body</label>
                                    <div class="col-sm-9">
                                      <textarea name="body" class="form-control text-light" id="" cols="30" rows="5" placeholder="Email Body" name="body"></textarea>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Email Button Name</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control text-light" id="exampleInputMobile" placeholder="Email Button Name" name="button">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="exampleInputMobileurl" class="col-sm-3 col-form-label">Email Url</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control text-light" id="exampleInputMobileurl" placeholder="Email Url" name="url">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="emaillastname" class="col-sm-3 col-form-label">Email Last Name</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control text-light" id="emaillastname" placeholder="Email Last Name" name="lastname">
                                    </div>
                                  </div>
                                  <button type="submit" class="btn btn-primary mr-2">Send To Mail</button>
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
