

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

                    <!-- table -->

                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-sm-flex align-items-center mb-4">
                                        <h4 class="card-title mb-sm-0">Payment Transcation</h4>
                                        <!-- <a href="#" class="text-dark ml-auto mb-3 mb-sm-0"> View all Products</a> -->
                                    </div>
                                    <div class="table-responsive border  rounded p-1">
                                        <table id="myTable" class="table  table-fluid table-striped" width="100%">
                                            <thead>
                                                <tr>
                                                    <th class="font-weight-bold">ID</th>
                                                    
                                                    <th class="font-weight-bold">Name</th>
                                                    <th class="font-weight-bold">Transaction ID</th>
                                                    <th class="font-weight-bold">Amount</th>
                                                    <th class="font-weight-bold">Gateway</th>
                                                    <th class="font-weight-bold">Created at</th>
                                                    <th class="font-weight-bold">Paid at</th>
                                                    <th class="font-weight-bold">Status</th>
                                                </tr>
                                             </thead>
                                            <tbody>

                                            <?php foreach ($data as $row)  { 

                                                     $STATUS = $row['STATUS'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['ID'];?></td>
                                                    
                                                    <td>
                                                        <img class="img-sm rounded-circle"
                                                            src=<?php echo base_url('./assets/images/faces/face1.jpg');?>
                                                            alt="profile image"> <?php echo $row['NAME'];?>
                                                    </td>
                                                    <td><?php echo $row['TRANSACTION_ID'];?></td>
                                                    <td>₱ <?php echo $row['AMOUNT']; ?>.00</td>
                                                    <td>
                                                        <?php
                                                            $gateway = $row['GATEWAY'];
                                                            if ($gateway == 'GCASH') {
                                                                $image = './assets/images/dashboard/gcash.jpg';
                                                            } elseif ($gateway == 'ALIPAY'){
                                                                $image = './assets/images/dashboard/alipay.png';
                                                            } elseif ($gateway == 'QRPH'){
                                                                $image = './assets/images/dashboard/qr-ph.jpg';
                                                            }else {
                                                                $image = './assets/images/dashboard/paypal.png';
                                                            }

                                                            
                                                        ?>
                                                        
                                                    <img src=<?php echo base_url($image);?>
                                                            alt="alipay" class="gateway-icon mr-2"> <?php echo $row['GATEWAY'];?></td>
                                                    <td><?php echo $row['CREATED_AT'];?></td>
                                                    <td><?php echo $row['PAID_AT'];?></td>
                                                    <td>                                                  
                                                                <?php if( $STATUS =='SUCCESS') { ?>
                                                                <span class="badge badge-success p-2">SUCCESS</span>
                                                                <?php } else if( $STATUS == 'CANCELLED') { ?>
                                                                <span class="badge badge-warning p-2">CANCELLED</span>
                                                                <?php } else if( $STATUS == 'CREATED') { ?>
                                                                <span class="badge badge-primary p-2">CREATED</span>
                                                                <?php } else if( $STATUS == 'PENDING') { ?>
                                                                <span class="badge badge-primary p-2">PENDING</span>
                                                                <?php } else if( $STATUS == 'DENIED') { ?>
                                                                <span class="badge badge-danger p-2">DENIED</span>
                                                                <?php } else if( $STATUS == 'ERROR') { ?>
                                                                <span class="badge badge-dark p-2">ERROR</span>
                                                                <?php } else if( $STATUS == 'LOGIN_ERROR') { ?>
                                                                <span class="badge badge-danger p-2">LOGIN_ERROR</span>
                                                                <?php } else if( $STATUS == 'EXPIRED') { ?>
                                                                <span class="badge badge-danger p-2">EXPIRED</span>
                                                                <?php } else if( $STATUS == 'FLAGGED') { ?>
                                                                <span class="badge badge-danger p-2">FLAGGED</span>
                                                                <?php } else if( $STATUS == 'FAILED') { ?>
                                                                <span class="badge badge-danger p-2">FAILED</span>
                                                                <?php   } ?>
                                                     
                                                    </td>
                                                </tr>

                                            <?php } ?>
                                           
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

    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    </script>
