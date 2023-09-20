<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href=<?php echo base_url('./assets/vendors/simple-line-icons/css/simple-line-icons.css');?>>
    <link rel="stylesheet" href=<?php echo base_url('./assets/vendors/flag-icon-css/css/flag-icon.min.css');?>>
    <link rel="stylesheet" href=<?php echo base_url('./assets/vendors/css/vendor.bundle.base.css');?>>

    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href=<?php echo base_url('./assets/endors/css/vendor.bundle.base.css');?>>
    <link rel="stylesheet" href=<?php echo base_url('./assets/endors/css/vendor.bundle.base.css');?>>
    <link rel="stylesheet" href="./vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="./vendors/chartist/chartist.min.css">

    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href=<?php echo base_url('./assets/css/style.css');?>>
    <!-- End layout styles -->
    <link rel="shortcut icon" href=<?php echo base_url('./assets/images/favicon.png');?>>

    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"> -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>


</head>

<body>


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


    <!-- container-scroller -->
    <!-- plugins:js -->
        <script src=<?php echo base_url('./assets/off-canvas.js');?>></script>
        <script src=<?php echo base_url('./assets/js/misc.js.js');?>></script>  

    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src=<?php echo base_url('./assets/js/dashboard.js');?>></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.js"></script>
    <!-- End custom js for this page -->
</body>

</html>