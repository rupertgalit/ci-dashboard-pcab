

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->

        <?php $this->load->view('./admin/partials/_navbar.php'); ?>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->

            <?php $this->load->view('./admin/partials/_sidebar.php'); ?>

            <!-- partial -->
            <div class="main-panel">                      
                <div class="content-wrapper">
                    <!-- <div class="row purchace-popup">
              <div class="col-12 stretch-card grid-margin">
                <div class="card card-secondary">
                  <span class="card-body d-lg-flex align-items-center">
                    <p class="mb-lg-0">Get tons of UI components, Plugins, multiple layouts, 20+ sample pages, and more! </p>
                    <a href="https://www.bootstrapdash.com/product/stellar-admin/?utm_source=organic&utm_medium=banner&utm_campaign=free-preview" target="_blank" class="btn btn-warning purchase-button btn-sm my-1 my-sm-0 ml-auto">Upgrade To Pro</a>
                    <button class="close popup-dismiss ml-2">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </span>
                </div>
              </div>
            </div> -->
                    <!-- <div class="row">
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Sessions by channel</h4>
                    <div class="aligner-wrapper">
                      <canvas id="sessionsDoughnutChart" height="210"></canvas>
                      <div class="wrapper d-flex flex-column justify-content-center absolute absolute-center">
                        <h2 class="text-center mb-0 font-weight-bold">8.234</h2>
                        <small class="d-block text-center text-muted  font-weight-semibold mb-0">Total Leads</small>
                      </div>
                    </div>
                    <div class="wrapper mt-4 d-flex flex-wrap align-items-cente">
                      <div class="d-flex">
                        <span class="square-indicator bg-danger ml-2"></span>
                        <p class="mb-0 ml-2">Assigned</p>
                      </div>
                      <div class="d-flex">
                        <span class="square-indicator bg-success ml-2"></span>
                        <p class="mb-0 ml-2">Not Assigned</p>
                      </div>
                      <div class="d-flex">
                        <span class="square-indicator bg-warning ml-2"></span>
                        <p class="mb-0 ml-2">Reassigned</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body performane-indicator-card">
                    <div class="d-sm-flex">
                      <h4 class="card-title flex-shrink-1">Performance Indicator</h4>
                      <p class="m-sm-0 ml-sm-auto flex-shrink-0">
                        <span class="data-time-range ml-0">7d</span>
                        <span class="data-time-range active">2w</span>
                        <span class="data-time-range">1m</span>
                        <span class="data-time-range">3m</span>
                        <span class="data-time-range">6m</span>
                      </p>
                    </div>
                    <div class="d-sm-flex flex-wrap">
                      <div class="d-flex align-items-center">
                        <span class="dot-indicator bg-primary ml-2"></span>
                        <p class="mb-0 ml-2 text-muted font-weight-semibold">Complaints (2098)</p>
                      </div>
                      <div class="d-flex align-items-center">
                        <span class="dot-indicator bg-info ml-2"></span>
                        <p class="mb-0 ml-2 text-muted font-weight-semibold"> Task Done (1123)</p>
                      </div>
                      <div class="d-flex align-items-center">
                        <span class="dot-indicator bg-danger ml-2"></span>
                        <p class="mb-0 ml-2 text-muted font-weight-semibold">Attends (876)</p>
                      </div>
                    </div>
                    <div id="performance-indicator-chart" class="ct-chart mt-4"></div>
                  </div>
                </div>
              </div>
            </div> -->



                    <!-- table -->

                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-sm-flex align-items-center mb-4">
                                        <h4 class="card-title mb-sm-0">Products Inventory</h4>
                                        <!-- <a href="#" class="text-dark ml-auto mb-3 mb-sm-0"> View all Products</a> -->
                                    </div>
                                    <div class="table-responsive border  rounded p-1">
                                        <table id="myTable" class="table  table-fluid table-striped" width="100%">
                                            <thead>
                                                <tr>
                                                    <th class="font-weight-bold">Store ID</th>
                                                    <th class="font-weight-bold">Name</th>
                                                    <th class="font-weight-bold">Amount</th>
                                                    <th class="font-weight-bold">Gateway</th>
                                                    <th class="font-weight-bold">Created at</th>
                                                    <th class="font-weight-bold">Paid at</th>
                                                    <th class="font-weight-bold">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>
                                                        <img class="img-sm rounded-circle"
                                                            src=<?php echo base_url('./assets/images/faces/face1.jpg');?>
                                                            alt="profile image"> Katie Holmes
                                                    </td>
                                                    <td>$3621</td>
                                                    <td><img src=<?php echo base_url('./assets/images/dashboard/alipay.png');?>
                                                            alt="alipay" class="gateway-icon mr-2"> alipay</td>
                                                    <td>04 Jun 2019</td>
                                                    <td>18 Jul 2019</td>
                                                    <td>
                                                        <div class="badge badge-success p-2">Payment Success</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>
                                                        <img class="img-sm rounded-circle"
                                                            src=<?php echo base_url('./assets/images/faces/face2.jpg');?>
                                                            alt="profile image"> Minnie Copeland
                                                    </td>


                                                    <td>$6245</td>
                                                    <td><img src=<?php echo base_url('./assets/images/dashboard/paypal.png');?>
                                                            alt="alipay" class="gateway-icon mr-2"> Paypal</td>
                                                    <td>25 Sep 2019</td>
                                                    <td>07 Oct 2019</td>
                                                    <td>
                                                        <div class="badge badge-danger p-2">Payment Failed</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>
                                                        <img class="img-sm rounded-circle"
                                                            src=<?php echo base_url('./assets/images/faces/face3.jpg');?>
                                                            alt="profile image"> Rodney Sims
                                                    </td>
                                                    <td>$9265</td>
                                                    <td><img src=<?php echo base_url('./assets/images/dashboard/alipay.png');?>
                                                            alt="alipay" class="gateway-icon mr-2"> alipay</td>
                                                    <td>12 dec 2019</td>
                                                    <td>26 Aug 2019</td>
                                                    <td>
                                                        <div class="badge badge-warning p-2">Payment Cancelled</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>
                                                        <img class="img-sm rounded-circle"
                                                            src=<?php echo base_url('./assets/images/faces/face4.jpg');?>
                                                            alt="profile image"> Carolyn Barker
                                                    </td>
                                                    <td>$2263</td>
                                                    <td><img src=<?php echo base_url('./assets/images/dashboard/alipay.png');?>
                                                            alt="alipay" class="gateway-icon mr-2"> alipay</td>
                                                    <td>30 Sep 2019</td>
                                                    <td>20 Oct 2019</td>
                                                    <td>
                                                        <div class="badge badge-primary p-2">Pending</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>
                                                        <img class="img-sm rounded-circle"
                                                            src=<?php echo base_url('./assets/images/faces/face4.jpg');?>
                                                            alt="profile image"> Carolyn Barker
                                                    </td>
                                                    <td>$2263</td>
                                                    <td><img src=<?php echo base_url('./assets/images/dashboard/alipay.png');?>
                                                            alt="alipay" class="gateway-icon mr-2"> alipay</td>
                                                    <td>30 Sep 2019</td>
                                                    <td>20 Oct 2019</td>
                                                    <td>
                                                        <div class="badge badge-success p-2">Payment Success</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>6</td>
                                                    <td>
                                                        <img class="img-sm rounded-circle"
                                                            src=<?php echo base_url('./assets/images/faces/face4.jpg');?>
                                                            alt="profile image"> Carolyn Barker
                                                    </td>
                                                    <td>$2263</td>
                                                    <td><img src=<?php echo base_url('./assets/images/dashboard/alipay.png');?>
                                                            alt="alipay" class="gateway-icon mr-2"> alipay</td>
                                                    <td>30 Sep 2019</td>
                                                    <td>20 Oct 2019</td>
                                                    <td>
                                                        <div class="badge badge-success p-2">Payment Success</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>7</td>
                                                    <td>
                                                        <img class="img-sm rounded-circle"
                                                            src=<?php echo base_url('./assets/images/faces/face4.jpg');?>
                                                            alt="profile image"> Carolyn Barker
                                                    </td>
                                                    <td>$2263</td>
                                                    <td><img src=<?php echo base_url('./assets/images/dashboard/alipay.png');?>
                                                            alt="alipay" class="gateway-icon mr-2"> alipay</td>
                                                    <td>30 Sep 2019</td>
                                                    <td>20 Oct 2019</td>
                                                    <td>
                                                        <div class="badge badge-primary p-2">Pending</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>8</td>
                                                    <td>
                                                        <img class="img-sm rounded-circle"
                                                            src=<?php echo base_url('./assets/images/faces/face4.jpg');?>
                                                            alt="profile image"> Carolyn Barker
                                                    </td>
                                                    <td>$2263</td>
                                                    <td><img src=<?php echo base_url('./assets/images/dashboard/alipay.png');?>
                                                            alt="alipay" class="gateway-icon mr-2"> alipay</td>
                                                    <td>30 Sep 2019</td>
                                                    <td>20 Oct 2019</td>
                                                    <td>
                                                        <div class="badge badge-primary p-2">Pending</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>9</td>
                                                    <td>
                                                        <img class="img-sm rounded-circle"
                                                            src=<?php echo base_url('./assets/images/faces/face4.jpg');?>
                                                            alt="profile image"> Carolyn Barker
                                                    </td>
                                                    <td>$2263</td>
                                                    <td><img src=<?php echo base_url('./assets/images/dashboard/alipay.png');?>
                                                            alt="alipay" class="gateway-icon mr-2"> alipay</td>
                                                    <td>30 Sep 2019</td>
                                                    <td>20 Oct 2019</td>
                                                    <td>
                                                        <div class="badge badge-success p-2">Payment Success</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>10</td>
                                                    <td>
                                                        <img class="img-sm rounded-circle"
                                                            src=<?php echo base_url('./assets/images/faces/face4.jpg');?>
                                                            alt="profile image"> Carolyn Barker
                                                    </td>
                                                    <td>$2263</td>
                                                    <td><img src=<?php echo base_url('./assets/images/dashboard/alipay.png');?>
                                                            alt="alipay" class="gateway-icon mr-2"> alipay</td>
                                                    <td>30 Sep 2019</td>
                                                    <td>20 Oct 2019</td>
                                                    <td>
                                                        <div class="badge badge-warning p-2">Payment Cancelled</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>11</td>
                                                    <td>
                                                        <img class="img-sm rounded-circle"
                                                            src=<?php echo base_url('./assets/images/faces/face4.jpg');?>
                                                            alt="profile image"> Carolyn Barker
                                                    </td>
                                                    <td>$2263</td>
                                                    <td><img src=<?php echo base_url('./assets/images/dashboard/alipay.png');?>
                                                            alt="alipay" class="gateway-icon mr-2"> alipay</td>
                                                    <td>30 Sep 2019</td>
                                                    <td>20 Oct 2019</td>
                                                    <td>
                                                        <div class="badge badge-danger p-2">Payment Failed</div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->

                

                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

