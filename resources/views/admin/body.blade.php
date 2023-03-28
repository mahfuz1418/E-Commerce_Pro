<div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-3">={{ $total_product }}</h3>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total Product</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-3">={{ $total_order }}</h3>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total Order</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                        <h3 class="mb-3">={{$total_customer}}</h3>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total Customer</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-3">${{ $total_revenue }}</h3>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total Revenue</h6>
                  </div>
                </div>
              </div>

            </div>
            <div class="row">
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-3">={{ $total_delivered }}</h3>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Order Delivered</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-3">={{ $total_processing }}</h3>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Order Processing</h6>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
          </footer>
          <!-- partial -->
        </div>