<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href=<?php echo base_url('./assets/vendors/simple-line-icons/css/simple-line-icons.css'); ?> />
    <link rel="stylesheet" href=<?php echo base_url('./assets/vendors/flag-icon-css/css/flag-icon.min.css'); ?> />
    <link rel="stylesheet" href=<?php echo base_url('./assets/vendors/css/vendor.bundle.base.css'); ?> />

    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href=<?php echo base_url('./assets/endors/css/vendor.bundle.base.css'); ?> />
    <link rel="stylesheet" href=<?php echo base_url('./assets/endors/css/vendor.bundle.base.css'); ?> />
    <link rel="stylesheet" href="./vendors/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="./vendors/chartist/chartist.min.css" />

    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href=<?php echo base_url('./assets/css/style.css'); ?> />
    <!-- End layout styles -->
    <link rel="shortcut icon" href=<?php echo base_url('./assets/images/favicon.png'); ?> />

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
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>application/helpers/print-element.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>



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
                <div class="content-wrapper p-0">
                    <!-- main view container -->
                    <?php
                    $view = isset($route) ? $route : "admin_dashboard";
                    $this->load->view('./modules/' . $view);

                    ?>

                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->



                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>


    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src=<?php echo base_url('./assets/off-canvas.js'); ?>></script>
    <script src=<?php echo base_url('./assets/js/misc.js.js'); ?>></script>

    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src=<?php echo base_url('./assets/js/dashboard.js'); ?>></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.js"></script>
    <!-- End custom js for this page -->
</body>
<style>
    div.main-panel #myTable_wrapper div.row div#myTable_length

    /*.dataTables-length*/
        {
        margin-top: 10px;
    }
</style>

</html>