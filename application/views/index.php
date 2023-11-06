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
    <link rel="stylesheet" href=<?php echo base_url('/assets/vendors/simple-line-icons/css/simple-line-icons.css'); ?> />
    <link rel="stylesheet" href=<?php echo base_url('/assets/vendors/flag-icon-css/css/flag-icon.min.css'); ?> />
    <link rel="stylesheet" href=<?php echo base_url('/assets/vendors/css/vendor.bundle.base.css'); ?> />


    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href=<?php echo base_url('/assets/vendors/css/vendor.bundle.base.css'); ?> />
    <link rel="stylesheet" href=<?php echo base_url('/assets/vendors/css/vendor.bundle.base.css'); ?> />
    <link rel="stylesheet" href=<?php echo base_url('/assets/vendors/daterangepicker/daterangepicker.css'); ?> />
    <link rel="stylesheet" href=<?php echo base_url('/assets/vendors/chartist/chartist.min.css'); ?> />

    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href=<?php echo base_url('/assets/css/style.css'); ?> />
    <!-- End layout styles -->
    <link rel="shortcut icon" href=<?php echo base_url('/assets/images/favicon.png'); ?> />

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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"
        integrity="sha512-qZvrmS2ekKPF2mSznTQsxqPgnpkI4DNTlrdUmTzrDgektczlKNRRhy5X5AAOnx5S09ydFYWWNSfcEqDTTHgtNA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/3.0.6/purify.min.js"
        integrity="sha512-H+rglffZ6f5gF7UJgvH4Naa+fGCgjrHKMgoFOGmcPTRwR6oILo5R+gtzNrpDp7iMV3udbymBVjkeZGNz1Em4rQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"
        integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script> -->
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
                <div class="box">
                    <div class="container">
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                    </div>
                </div>
                <div class="content-wrapper p-0">
                    <!-- main view container -->
                    <?php
                    $view = isset($route) ? $route : "dashboard";
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
    <script src=<?php echo base_url('/assets/js/off-canvas.js'); ?>></script>
    <script src=<?php echo base_url('/assets/js/misc.js'); ?>></script>
    <script src=<?php echo base_url('/assets/vendors/daterangepicker/daterangepicker.js'); ?>></script>
    <script src=<?php echo base_url('/assets/vendors/chartist/chartist.min.js'); ?>></script>

    <!-- endinject -->
    <!-- Custom js for this page -->

    <!-- <script src=<?php echo base_url('/assets/js/dashboard.js'); ?>></script> -->

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.js"></script>
    <!-- End custom js for this page -->
</body>
<script>
    setTimeout(() => { $(".main-panel .box").css("display", "none") }, 1000)
</script>
<style>
    html,
    body {
        overflow: hidden !important;
    }

    div.container-scroller {
        height: 100% !important;
    }

    div.container-scroller .card.w-100 {
        height: 100vh !important;
        overflow-y: auto;
    }

    div.main-panel #myTable_wrapper div.row div#myTable_length

    /*.dataTables-length*/
        {
        margin-top: 10px;
    }

    nav.navbar a {
        font-size: 0.7rem;
        color: #FFF;
    }

    nav.navbar a:hover {
        text-decoration: none;
        background-color: white;
        transition-duration: 1s;
        color: #000 !important;
        border-left-color: black !important;
    }

    .footer-powered-by {
        position: fixed;
        width: 15rem;
        bottom: 0;
        color: #999;
        /* background-color: #282828; */
        background-color: #181824;
        font-size: 0.6rem;
        padding: 1rem;
        transition: 1s;
        border-top: 0.1rem solid #333;
    }

    .footer-powered-by img {
        object-position: -20% 0;
        object-fit: cover;
    }

    .footer-powered-by a {
        background: linear-gradient(to right, #f2bf3d, #4f80f4, #e8696f);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-size: .7rem;
        font-weight: 600;
    }

    .footer-powered-by a img {
        transition-duration: .3s;
        transform: scale();
    }

    .footer-powered-by a img:hover {
        height: 3.2rem;
        width: 3.2rem;
    }

    .navbar-brand-wrapper {
        height: 5rem !important;
    }

    .sidebar.sidebar-offcanvas {
        height: 100%;
    }

    #sidebar .nav.nav-container {
        overflow-y: auto;
        height: 94vh;
        padding-bottom: 5rem;
        margin-top: 1rem;
    }

    div.card-body {
        /* height: 100vh !important; */
    }

    @media (max-width: 991px) {
        .navbar-brand-wrapper {
            height: 4.4rem !important;
            width: fit-content !important;
            display: inline-flex;
            border-bottom: 0.001rem black solid;
        }

        .navbar-brand-wrapper a {
            margin-top: 0 !important;
        }

        .navbar-menu-wrapper {
            background-color: #181824;
        }

        .navbar span.icon-menu {
            color: white;
        }

        .main-panel .box .container {
            left: 0 !important;
        }

        .sidebar.sidebar-offcanvas {
            overflow: hidden;
            margin-top: 0;
        }

        #sidebar .nav.nav-container {
            margin-top: 0.1rem;
        }
    }


    .main-panel .box {
        display: flex;
        align-content: center;
        flex-wrap: wrap;
        position: fixed;
        background: #DDD;
        height: 100%;
        width: 100%;
        z-index: 1;
        opacity: 0.7;
    }

    .main-panel .box .container {
        left: -6rem;
        width: 7rem;
        display: flex;
        position: relative;
    }

    .main-panel .box .container .dot {
        width: 15px;
        height: 15px;
        border-radius: 50%;
        background-color: gray;
        animation: move 500ms linear 0ms infinite;
        margin-right: 30px;
    }

    .main-panel .box .container .dot:first-child {
        position: absolute;
        top: 0;
        left: 0;
        animation: grow 500ms linear 1ms infinite;
    }

    .main-panel .box .container .dot:last-child {
        position: absolute;
        top: 0;
        right: 0;
        margin-right: 0;
        animation: grow 500ms linear 0s infinite reverse;
    }


    @keyframes grow {
        from {
            transform: scale(0, 0);
            opacity: 0;
        }

        to {
            transform: scale(1, 1);
            opacity: 1;
        }
    }

    @keyframes move {
        from {
            transform: translateX(0px)
        }

        to {
            transform: translateX(45px)
        }
    }

    ::-webkit-scrollbar {
        width: 5px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #888;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    /* .card {
        min-height: 0;
        max-height: 95vh;
    }
    .table-responsive {
        overflow-y: auto;
    } */
</style>

</html>