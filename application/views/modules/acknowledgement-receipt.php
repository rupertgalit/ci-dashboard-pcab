<style>
    table {
        border-top: 1px black solid;
    }

    th {
        border: 1px black solid;
        border-width: 1px 0 1px 1px;
        border-collapse: collapse;
    }

    th:last-child {
        border-right: 1px black solid;
    }

    #EcollectTable table {
        border: 0;
    }

    .btn-generate-container button {
        min-width: 13rem;
    }

    /* #EcollectTable tr:first-child th:first-child {
        border-width: 1px 0 1px 0;
    }

    #EcollectTable tr:first-child th:last-child {
        border-width: 0 0 1px 1px;
    }

    #EcollectTable tr:nth-child(2) th:first-child {
        border-left: 0;
    } */

    #EcollectTable tr th {
        border-width: 1px 0 1px 1px;
    }

    #EcollectTable tr th:last-child {
        border-right-width: 1px !important;
    }

    .search-btn {
        height: 2.9rem !important;
        width: 7rem;
        border: 0 !important;
    }

    .top-btn-container {}
</style>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card m-0" id="toPrint">
        <div class="card py-2 px-1">


            <div class="btn-generate-container row">
                <div class="col row d-flex justify-content-end py-2">
                    <div class="card-body">
                        <div class="d-sm-flex align-items-center mb-4">
                            <!--     -->
                        </div>
                    </div>
                    <div class=" col-mb-3 mr-3 mt-3">
                        <button class="btn-lg btn-outline-dark rounded border-0" data-toggle="modal"
                            data-target="#Daily_CollectionModal">Daily Collection</button>
                        <div class="modal fade" id="Daily_CollectionModal" tabindex="-1" role="dialog"
                            aria-labelledby="Daily_CollectionModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm" role="document">
                                <div id="DailyCollectModal" class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="Daily_CollectionModalLabel">Daily Collection</h5>
                                        <button type="button" class="close text-right pr-4" data-dismiss="modal"
                                            aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body bg-white pb-3">
                                        <div class="row mb-2">
                                            <div class="col-12 d-flex flex-row flex-wrap">
                                                <label for="modal_selected_date"
                                                    class="mr-2 d-flex align-items-center">Select Date:</label>
                                                <input type="date" id="modal_selected_date" value="2022-02-18"
                                                    class="form-control" style="width: 16rem;">
                                                <div id="validationMessage"></div>

                                            </div>
                                        </div>

                                        <div id="modalDataTableContainer" class="overflow-auto"></div>
                                    </div>
                                    <div class="modal-footer bg-white border-top-0">
                                        <button type="button"
                                            class="btn-sm btn-outline-dark mr-3 mb-2 rounded preview-btn-modal">Preview</button>
                                        <button type="button"
                                            class="btn-sm btn-outline-dark mr-3 mb-2 rounded download-btn-modal">Download</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" col-mb-3 mr-3 mt-3">
                        <button class="btn-lg btn-outline-dark rounded border-0 w-50" data-toggle="modal"
                            data-target="#exportModal">E-Collection</button>
                        <div class="modal fade" id="exportModal" tabindex="-1" role="dialog"
                            aria-labelledby="exportModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exportModalLabel">E-Collection </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body  bg-white pb-3">
                                        <label for="monthFilter">Select Month: </label>
                                        <select id="monthFilter">
                                            <option value="0">All Months</option>
                                            <option value="1">January</option>
                                            <option value="2">February</option>
                                            <option value="3">March</option>
                                            <option value="4">April</option>
                                            <option value="5">May</option>
                                            <option value="6">June</option>
                                            <option value="7">July</option>
                                            <option value="8">August</option>
                                            <option value="9">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                        <table id="EcollectTable" class="table table-striped text-center" width="100%">
                                            <thead>
                                                <tr>
                                                    <th colspan="2">Electronic Acknowledgement Receipt</th>
                                                    <th rowspan="3">Responsibility Center Code</th>
                                                    <th rowspan="3">Payor</th>
                                                    <th rowspan="3">Particulars</th>
                                                    <th rowspan="3">PREXC/PAP</th>
                                                    <th colspan="4">Amount</th>
                                                </tr>
                                                <tr>
                                                    <th rowspan="2">Date</th>
                                                    <th rowspan="2">Number</th>
                                                    <th rowspan="2">Total per AR</th>
                                                    <th colspan="3">Breakdown Collection</th>
                                                </tr>
                                                <tr>
                                                    <th>CIAP-PCAB</th>
                                                    <th colspan="1">DST</th>
                                                    <th colspan="1">LRF</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php

                                                foreach ($data as $row) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row["date_time"] . "</td>";
                                                    echo "<td>" . $row["ar_number"] . "</td>";
                                                    echo "<td></td>";
                                                    echo "<td>" . $row["name_of_payor"] . "</td>";
                                                    echo "<td>" . $row["particulars"] . "</td>";
                                                    echo "<td></td>";
                                                    echo "<td>&#8369; " . number_format((float) $row["service_charge"], 2, '.', '') . "</td>";
                                                    echo "<td>&#8369; " . number_format((float) $row["tax"], 2, '.', '') . "</td>";
                                                    echo "<td>&#8369; " . number_format((float) $row["total_amount"], 2, '.', '') . "</td>";
                                                    echo "<td></td>";

                                                    echo "</tr>";
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer bg-white border-top-0">
                                        <button type="button"
                                            class="btn-sm btn-outline-dark mr-3 mb-2 rounded border-0 btn-download-collection">Download
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Button 2 Trigger -->
            </div>

            <div class="overflow-hidden border-top border-bottom border-black">
                <div class="top-btn-container row mb-1 py-2 px-1">
                    <div class="col-md-2 mb-2">
                        <label for="start_date">Start Date:</label>
                        <input type="date" id="start_date" class="form-control">
                    </div>
                    <div class="col-md-2 mb-2">
                        <label for="end_date">End Date:</label>
                        <input type="date" id="end_date" class="form-control">

                    </div>
                    <div class="col-md-auto mb-2 d-flex align-items-end">
                        <button class="btn-outline-dark border-0 btn-sm w-100 h-50 px-4 search-btn">Select</button>
                    </div>
                </div>
            </div>

            <div class="scrollable-container" style="padding: 0.5rem;">

                <table id="myTable" class="table table-striped text-center" width="100%">
                    <!-- Your table headers go here -->
                    <thead>
                        <tr>
                            <th class="font-weight-bold">ID</th>
                            <th class="font-weight-bold">AR Number</th>
                            <th class="font-weight-bold">Date and Time</th>
                            <th class="font-weight-bold">Agency Name</th>
                            <th class="font-weight-bold">Name of Payor</th>
                            <th class="font-weight-bold">Particulars</th>
                            <th class="font-weight-bold">PCAB Fees:</th>
                            <th class="font-weight-bold">document stamp tax</th>
                            <th class="font-weight-bold">Legal Research Fund:</th>
                            <th class="font-weight-bold">NGSI Convenience fee</th>
                            <th class="font-weight-bold">Reference Number</th>
                            <th class="font-weight-bold">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Assuming $data is your array of data
                        if (empty($data)) {
                            echo "<tr><td colspan='10'>No data available</td></tr>";
                        } else {
                            foreach ($data as $row) {
                                $date = date_create($row['date_time']);
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row["ar_number"] . "</td>";
                                echo "<td>" . $row["date_time"] . "</td>";
                                echo "<td>CIAP - PCAB</td>";
                                echo "<td>" . $row["name_of_payor"] . "</td>";
                                echo "<td>Break Down of PCAB Fees</td>";
                                echo "<td>&#8369; " . number_format((float) $row["amount"], 2, '.', '') . "</td>";
                                echo "<td>&#8369; " . number_format((float) $row["service_charge"], 2, '.', '') . "</td>";
                                echo "<td>&#8369; " . number_format((float) $row["tax"], 2, '.', '') . "</td>";
                                echo "<td>&#8369; " . number_format((float) $row["total_amount"], 2, '.', '') . "</td>";
                                echo "<td>" . $row["reference_number"] . "</td>";
                                echo "<td><button type='button'style='width: 80px; height: 25px;' class=' btn-outline-dark border-0 btn-print-receipt' data-receipt-id='" . $row['id'] . "'  onclick='printRow(" . $row['id'] . ")'>Download</button></td>";
                                echo "</tr>";
                            }
                        }
                        ?>

                    </tbody>

                </table>
            </div>
            <div class='row divider'>
                <div class='col-12 my-5 py-2 border'></div>
            </div>
        </div>

    </div>
</div>
</div>

<script>

    $(document).ready(function () {

        var table = $('#myTable').DataTable({
            dom: '<"pull-left"b><"pull-right"f>rt<"row"<"col-sm-4"l><"col-sm-4"i><"col-sm-4"p>>',
            scrollX: '90%',
            scrollCollapse: true,
        });

        $('.search-btn').on('click', function () {
            table.draw();
        });

    });
    $(document).ready(function () {
        var dataTable = $('#EcollectTable').DataTable({
            dom: 'rt<"row"<"col-sm-4"l><"col-sm-4"i><"col-sm-4"p>>'
        });
        $('#monthFilter').on('change', function () {
            var selectedMonth = $(this).val();

            // Use DataTables API to filter by month
            dataTable.column(0).search(selectedMonth ? `-${selectedMonth.padStart(2, '0')}` : "", true, false).draw();
            var filteredData = dataTable.rows({ search: 'applied' }).data().toArray();
        });
        // $('#monthFilter').on('change', function () {
        //     var selectedMonth = $(this).val();

        //     const toSearch = selectedMonth < 10 ? `0${selectedMonth}` : selectedMonth

        //     // console.log(toSearch, selectedMonth ? `2023-${toSearch}` : "")
        //     // Use DataTables API to filter by month
        //     dataTable.column(0).search(toSearch ? `2022-${toSearch}` : "", true, false).draw();
        // });
        // Call the printECollectionReport function with the selected month
    
    });
    const _jsonData = JSON.parse('<?php echo json_encode($data) ?>')

    function applyDateFilter() {
        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();

    }

    $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
        var startDate = $('#start_date').val();
        var endDate = $('#end_date').val();
        var currentDate = data[2]; // Assuming date is at index 2

        if ((startDate === '' && endDate === '') ||
            (startDate === '' && currentDate <= endDate) ||
            (startDate <= currentDate && endDate === '') ||
            (startDate <= currentDate && currentDate <= endDate)) {
            return true;
        }

        return false;
    });
    // Modal date filter
    $('.preview-btn-modal').on('click', function () {
        var modalStartDate = $('#modal_selected_date').val();
        const filteredData = _jsonData.filter(item => item.date_time == modalStartDate)

        if (!modalStartDate) {

            $('#validationMessage').html('<span style="font-size:.8rem; color: red; margin-left:1.5rem;" role="alert">Please select a date.</span>');
            return;
        }

        if (!filteredData.length) {
            $('#validationMessage').html('<span style="font-size:.8rem; color: red; margin-left:1.5rem;" role="alert">No data found.</span>');
            return;
        }

        // Clear existing content in the modal
        $('#validationMessage').empty();
        $('#modalDataTableContainer').empty();

        // Create a new div to wrap the table and add additional elements if needed     
        var modalContent = document.createElement('div');

        // Set a class for the modal body, e.g., 'modal-body-content'
        var modalBody = document.createElement('div');
        modalBody.classList.add('modal-body-content');

        // Create a new table with the matching rows and an id
        var modalTable = document.createElement('table');
        modalTable.id = 'modalDataTable'; // Add id to the table
        modalTable.classList.add('table'); // Added 'table-responsive' for fixed size

        var modalTableHead = document.createElement('thead');
        modalTableHead.classList.add('thead-light'); // Added light background for the table head
        modalTableHead.innerHTML = ' <tr><th colspan="8" class="text-center">Collection</th></tr><tr><th rowspan="2">Date & Time</th><th rowspan="2">AR Number</th><th rowspan="2">Name of Payor</th><th rowspan="2">Reference Number</th><th>CIAP-PCAB</th><th>LRF</th><th>DST</th><th rowspan="2">Total Amount</th></tr><tr><th>Acount Number</th><th>Acount Number</th><th>Acount Number</th></tr>';

        var modalTableBody = document.createElement('tbody');

        // Clone the original table
        var originalTable = document.getElementById('myTable');
        modalTableBody.innerHTML = "";
        console.log(_jsonData.filter(item => item.date_time == modalStartDate))
        filteredData
            .forEach((row) => {
                modalTableBody.innerHTML += `<tr><td>${row.date_time}</td><td>${row.ar_number}</td><td>${row.name_of_payor}</td><td>${row.name_of_payor}</td><td>${row.name_of_payor}</td><td>${row.particulars}</td><td>${row.reference_number}</td><td class="text-right">${row.total_amount}</td></tr>`
            })

        // Find rows that match the selected date
        // var matchingRows = Array.from(originalTable.querySelectorAll('tbody tr')).filter(function (row) {
        //     var rowDate = row.cells[2].textContent; // Assuming the date is in the first column
        //     return rowDate === modalStartDate;
        // });

        // console.log(matchingRows)

        // // Append the matching rows to the modal table body
        // matchingRows.forEach(function (row) {
        //     modalTableBody.appendChild(row.cloneNode(true));
        // });

        // Append the new table to the modal body
        modalTable.appendChild(modalTableHead);
        modalTable.appendChild(modalTableBody);
        modalBody.appendChild(modalTable);

        // Append the modal body to the modal content
        modalContent.appendChild(modalBody);

        // Append the modal content to the modal container
        document.getElementById('modalDataTableContainer').appendChild(modalContent);

        // Initialize DataTable for the modal table without the search feature
        $('#modalDataTable').DataTable({
            dom: '<"pull-left"b>rt<"row"<"col-sm-4"l><"col-sm-4"i><"col-sm-4"p>>',
        });

        // Change the modal dialog size with a transition
        var modalDialog = $('#Daily_CollectionModal .modal-dialog');

        // Ensure that it stays in modal-lg size
        if (!modalDialog.hasClass('modal-lg')) {
            modalDialog.removeClass('modal-sm');
            modalDialog.addClass('modal-lg');
            modalDialog.css('transition', 'width 20s ease-in-out'); // Adjust the duration and easing as needed
        }

        // Trigger the search functionality again
        table.draw();
    });

    $('#modal_selected_date').on("change", (el) => {
        $('#validationMessage').empty();
    })

    // Add a function for the close button in the modal
    $('.close, [data-dismiss="modal"]').on('click', function () {
        // Clear existing content in the modal
        $('#validationMessage').empty();
        $('#modalDataTableContainer').empty();

        // Reset the selected date input
        $('#modal_selected_date').val('');

        // Hide the modal when the close button is clicked
        $('#Daily_CollectionModal').modal('hide');
        $('#validationMessage').modal('hide');

        var modalDialog = $('#Daily_CollectionModal .modal-dialog');

        // Toggle between 'modal-lg' and 'modal-sm' classes
        if (modalDialog.hasClass('modal-lg')) {
            modalDialog.removeClass('modal-lg');
            modalDialog.addClass('modal-sm');
        }
    });



    $('.download-btn-modal').on('click', function () {
        var modalStartDate = $('#modal_selected_date').val();

        if (!modalStartDate) {

            $('#validationMessage').html('<span style="font-size:.8rem; color: red; margin-left:1.5rem;" role="alert">Please select a date.</span>');
            return;
        }
        // Clear existing content in the modal
        $('#validationMessage').empty();

        printDailyReport(modalStartDate);
    })

    async function printDailyReport() {

        const modalStartDate = $('#modal_selected_date').val();

        const filteredData = _jsonData.filter(object => object["date_time"] === modalStartDate);

        let doc = new jspdf.jsPDF({
            orientation: 'p',
            unit: 'px'
        })

        let printContent = `
    <html><title>Receipt</title>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
        <\/script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"><\/link>
        <style>
            div#DailyCollectionForm div.data-table {
                font-size: 13px;
            }

            div#DailyCollectionForm div.custom-font-size {
                font-size: 12px;
            }

            div#DailyCollectionForm div.data-table div.row-data {
                font-size: 12px;
                overflow: nowrap;
            }
            div#DailyCollectionForm div.data-table div.t-body div.row-data:nth-child(2) {
                width: 405.3px;
                white-space: nowrap;
                overflow: visible;
            }
        </style></head><body>
        [content]
</div>
</div>
</div>
        </html>
        `;
        let i = 0;
        let content = "";
        let totalAmount = 0
        while (filteredData.length - (i * 10) > 0) {
            let rows = filteredData.slice(i * 10, i * 10 + 10)

            if (rows.length < 10) {
                addIndex = 10 - rows.length
                rows = rows.concat(Array(addIndex).fill(null))
            }

            try {
                content += `
            ${i % 3 !== 0 ? '<div class="row" style="width: 89.5vw; border-bottom:1px black solid; border-bottom-style: dashed; margin: 6rem 0 6rem 0"></div>' : ''}
<div id="DailyCollectionForm-${i}" class="bg-whites mx-auto mt-5" style="width: 90rem;${(i + 1) % 3 !== 0 || i == 0 ? "" : "margin-bottom: 8rem !important;"} }">
<div class="border border-dark p-2 px-4">
<div class="text-center">
<div class="container mt-3 justify-content-center mb-4">
<div class="container mt-3 justify-content-center mb-4">
                        <div class="row justify-content-center">
                            <div class="col-md-3">
                                <img  height="100px" style="margin-left:-1rem;" src="assets/images/ngsi-letterhead.png" alt="logo" class="logo-dark" />
                            </div>
                            <div class="col-md-4 mt-3"  style="margin-left:2rem;">
                                <p class="font-weight-bold" style="font-family: Century Gothic; font-size:16px;" ;>NET GLOBAL SOLUTIONS&nbsp;&nbsp; INC.</p>
                                <p style="margin-top: -20px;margin-bottom: -5px; font-family: Century Gothic;margin-left:-5rem;">Tel. No. 632 82877374</p>
                                <p style=" line-height: 80%; color:blue;margin-top: 10px;">Support@netglobalsolutions.net</p>
                            </div>
                        </div>
                         <img width="100%" height="100%" style="margin-top: -10px;" src="assets/images/NGSI_header.png" alt="logo" class="logo-dark" />
                    </div>
    <b class="text-uppercase">List of daily collection</b>
    <div>Agency: CONSTRUCTION INDUSTY AUTHORITY OF THE PHILIPPINES</div>
        <div>Board: Philippine Constraction Accreditation board(PCAB)</div>
    <div class="row d-flex align-items-center">
        <div class="col-12">
            <div class="list-inline-item ">Date:</div>
            <div class="list-inline-item font-weight-light border-dark border-bottom custom-font-size px-3">
                10/12/2023
            </div>
        </div>
    </div>
</div>
<div class="row text-right pb-2">
    <div class="col">Report No. <div
            class="list-inline-item font-weight-light border-dark border-bottom custom-font-size px-3">
            ${Math.floor(Math.random() * 1000000000)}
    </div>
    </div>
</div>
<div class="col-12 d-flex flex-column data-table py-0">
<div class="row t-head">
    <div class="border border-dark col-12 d-flex align-items-center justify-content-around text-center">
        Collection
    </div>
</div>
<div class="row ">
    <div class="border border-dark col d-flex align-items-center justify-content-around  border-bottom-0 text-center ">
        Date and Time
    </div>
    <div class="border border-dark col d-flex align-items-center justify-content-around border-bottom-0 text-center">
        AR Number
    </div>
    <div class="border border-dark col d-flex align-items-center justify-content-around border-bottom-0 text-center">
        Name of payor
    </div>
    <div class="border border-dark col d-flex align-items-center justify-content-around border-bottom-0 text-center">
        Reference Number
    </div>
    <div class="border border-dark col-2 d-flex align-items-center justify-content-around border-right-0 text-center">
        CIAP-PCAB
    </div>
    <div class="border border-dark col d-flex align-items-center justify-content-around text-center">
        LRF
    </div>
    <div class="border border-dark col d-flex align-items-center justify-content-around text-center">
        DST
    </div>
    <div class="border border-dark col d-flex align-items-center justify-content-around border-bottom-0 text-center">
        Total Amount
    </div>
</div>
<div class="row ">
    <div class="border border-dark col d-flex align-items-center justify-content-around border-top-0 ">

    </div>
    <div class="border border-dark col d-flex align-items-center justify-content-around border-top-0">

    </div>
    <div class="border border-dark col d-flex align-items-center justify-content-around border-top-0">

    </div>
    <div class="border border-dark col d-flex align-items-center justify-content-around border-top-0">

    </div>
    <div class="border border-dark col-2 d-flex align-items-center justify-content-around border-right-0 text-center">
        Account No.
    </div>
    <div class="border border-dark col d-flex align-items-center justify-content-around text-center">
        Account No.
    </div>
    <div class="border border-dark col d-flex align-items-center justify-content-around text-center">
        Account No.
    </div>
    <div class="border border-dark col d-flex align-items-center justify-content-around border-top-0">

    </div>
</div>

    <div class="t-body p-0 m-0">
    `

                //             ${i % 2 == 1 ? '<div class="row" style="width: 52vw; border-bottom:1px black solid; border-bottom-style: dashed; margin: 6rem 0 6.18rem 0"></div>' : ''}
                // ${i % 2 == 1 && i != 39 ? "margin-bottom:12rem !important;" : ""}
                rows.forEach(row => {
                    totalAmount += parseFloat(row?.total_amount ?? 0)
                    content += `
            <div class="row row-data">
                <div class="border border-dark border-right-0 border-top-0 col">${row?.date_time ?? "&nbsp;"}</div>
                <div class="border border-dark border-right-0 border-top-0 col">${row?.ar_number ?? ""}</div>
                <div class="border border-dark border-right-0 border-top-0 col">${row?.name_of_payor ?? ""}</div>
                <div class="border border-dark border-right-0 border-top-0 col">${row?.particulars ?? ""}</div>
                <div class="border border-dark border-right-0 border-top-0 col-2">${row?.reference_number ?? ""}</div>
                <div class="border border-dark border-right-0 border-top-0 col">${row?.particulars ?? ""}</div>
                <div class="border border-dark border-right-0 border-top-0 col">${row?.reference_number ?? ""}</div>
                <div class="border border-dark border-top-0 col text-right">${parseFloat(row?.total_amount ?? 0).toFixed(2)}</div>
            </div>
            `;
                });
                content += `</div>
        <div class="row t-total-row">
        <div class="border border-dark border-right-0 border-top-0 col"></div>
        <div class="border border-dark border-right-0 border-top-0 col"></div>
        <div class="border border-dark border-right-0 border-top-0 col"></div>
        <div class="border border-dark border-right-0 border-top-0 col text-center">Total Amount</div>
        <div class="border border-dark border-right-0 border-top-0 col-2"></div>
        <div class="border border-dark border-right-0 border-top-0 col"></div>
        <div class="border border-dark border-right-0 border-top-0 col"></div>
        <div class="border border-dark border-top-0 col text-right">P &nbsp; [total-amount]</div>
    </div>
</div>
</div>
<div class="row mt-4" >
                                        <div class="col" style="position:relative; margin-left:6.5rem;  ">
                                            
                                            <p >Prepared By: </p>
                        
                                        </div>
                                        <div class="col" style="position:relative;left:120px; ">
                                            
                                            <p >Checked & Certified By: </p>
                                           
                                        </div>
                                    </div>
<div class="row" style="height:6rem;  margin-bottom:4rem;">
                                        <div class="col" style="position:relative; margin-left:6.5rem;  ">
                                        <img style="margin-left: 5rem;background-position:center;z-index:0;transform:scale(1.1);display:block;position:relative;"  height="70px" src="assets/images/ma'am_je.png" alt="logo" class="logo-dark" />
                                            <p style="margin-top:-20px;margin-left:87px;font-size:18px;font-family:Arial,Helvetica,sans-serif;z-index:1;position:relative;">
                                                   Jeremie Soliveres </p>
                                            <p style="margin-top:-24px;margin-left:90px;font-family:Arial,Helvetica,sans-serif;font-size:12px;z-index:1;position:relative;">
                                                Accounting Specialist</p>
                                                <p style="margin-top:-22px;margin-left:90px;font-family:Arial,Helvetica,sans-serif;font-size:12px;z-index:1;position:relative;">
                                                Netglobal Solution Inc</p>
                                        </div>
                                        <div class="col" style="position:relative;left:120px; margin-top:4.5rem;">
                                            
                                            
                                            <p style="margin-top:-25px;margin-left:10rem;font-size:18px;font-family:Arial,Helvetica,sans-serif;z-index:1;position:relative;">
                                            Mischell A. Fernandez</p>
                                            <p style=" margin-top:-24px;margin-left:10rem;font-family:Arial,Helvetica,sans-serif;font-size:12px;z-index:1;position:relative;">
                                            Admin Officer III/Cashier II </p>
                                            <p style=" margin-top:-22px;margin-left:10rem;font-family:Arial,Helvetica,sans-serif;font-size:12px;z-index:1;position:relative;">
                                            CIAP </p>
                                        </div>
                                    </div>
</div>
</div>`
                i++;
            } catch (e) {
                console.log(e)
            }
        }

        doc.html(printContent.replace("[content]", content).replaceAll("[total-page]", i).replaceAll("[total-amount]", parseFloat(totalAmount).toFixed(2)), {
            html2canvas: {
                scale: .3
            },
            callback: async function (doc) {
                // doc.addPage(
                //     { orientation: 'p', unit: 'px' }
                // )
                await doc.save(`daily-collection-`)
                // await doc.output("dataurlnewwindow", "receipt-123.pdf");
            },
            x: 7,
            y: 7,
        })
    }

    async function printRow(id) {
        const rowData = _jsonData.find(obj => obj.id == id)
        let doc = new jspdf.jsPDF({
            orientation: 'p',
            unit: 'px'
        })

        let printContent = `
            <html><title>Receipt</title>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
                integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
                <\/script>
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
                integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"><\/link></head><body>
                [content]
                </html>
                `;
        let content = ""
        try {

            content += `
            <div class="mx-auto my-5" style="width: 50rem; ">
            <div class="container mt-3 justify-content-center mb-5">
                    <div class="row justify-content-center mb-2">
                        <div class="col-md-3">
                            <img  height="100px" style="margin-left:-1rem;" src="assets/images/ngsi-letterhead.png" alt="logo" class="logo-dark" />
                        </div>
                        <div class="col-md-4 mt-3"  style="margin-left:11rem;">
                            <p class="font-weight-bold" style="font-family: Century Gothic; font-size:16px;" ;>NET GLOBAL SOLUTIONS&nbsp;&nbsp; INC.</p>
                            <p style="margin-top: -20px;margin-bottom: -5px; font-family: Century Gothic;">Tel. No. 632 82877374</p>
                            <p style=" line-height: 80%; color:blue;margin-top: 10px;">Support@netglobalsolutions.net</p>
                        </div>
                    </div>
                     <img width="100%" height="100%" style="margin-top: -10px;" src="assets/images/NGSI_header.png" alt="logo" class="logo-dark" />
                </div>

                <div class="border border-dark">    
                <div class="text-center text-uppercase py-4">
                    <u>Acknowledgement &nbsp; Receipt</u>  
            </div>
            <div class="row d-flex">
                <div class="col"></div>
                <div class="col">
                    <div class="row d-flex">
                        <div class="col">AR Number: </div>
                        <div class="col">
                            ${rowData.ar_number}
                        </div>
                    </div>
                    <div class="row d-flex">
                        <div class="col">Date and Time: </div>
                        <div class="col">
                           ${rowData.date_time}
                        </div>
                    </div>
                </div>
            </div>
            <div class='row pt-4 pb-3 px-2'>
            <div class="col">
            `;
            for (let key in rowData) {
                if (["id", "ar_number", "date_time", "tax"].includes(key)) continue;

                let value = rowData[key];

                // Check if key is a special case
                if (key == "total_amount" || key == "amount" || key == "service_charge") {
                    value = parseFloat(value ?? 0).toFixed(2);
                }

                // Change the display name for "service_charge"
                if (key == "service_charge") {
                    key = "NGSI Convenience Fee";
                }

                if (key == "agency_name") {
                    value = "CIAP - PCAB";
                }
                if (key == "particulars") {
                    value = "Break Down of PCAB Fees";
                }
                content += `
        <div class="row d-flex">
            <div class="col text-capitalize">${key.split("_").join(" ")}<div class="float-right">:</div></div>
            <div class="col">
                ${value}
            </div>
        </div>
    `;

                if (key == "amount") {
                    content += `
            <div class="row d-flex">
                <div style="margin-left:1px;" class="col text-capitalize pl-4">PCAB Fee<div class="float-right pr-2">:</div></div>
                <div class="col" style="position: relative;left: -8px;">
                    ${parseFloat(500).toFixed(2)}
                </div>
            </div>
            <div class="row d-flex">
                <div style="margin-left:1px;" class="col text-capitalize pl-4">Documentary Stamp Fee<div class="float-right pr-2">:</div></div>
                <div class="col" style="position: relative;left: -8px;">
                    ${parseFloat(20).toFixed(2)}
                </div>
            </div>
            <div class="row d-flex">
                <div style="margin-left:1px;" class="col text-capitalize pl-4">Legal Research Fee<div class="float-right pr-2">:</div></div>
                <div class="col" style="position: relative;left: -8px;">
                    ${parseFloat(15).toFixed(2)}
                </div>
            </div>`;
                }
            }
            content += ` </div>
                </div>
                    <div class="row mb-4">
                        <span class="col font-italic font-weight-light">This is a system generated receipt. Signature is not required.</span>
                    </div>
                </div>`;

            content += `<div class="row">
                    <div class="col-1">Note:</div>
                    <div class="col">
                        <div>This proforma represents minimum data.</div>
                        <div>Moreover, the format may vary depending on the system being used</div>
                    </div>
                </div></div>
                `;
            //     let doc = window.open("", "My Page", "height=700,width=900,titlebar=no,resizable=no")
            //     doc.document.write(`<html><title>Receipt</title>
            //  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
            // integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
            // <\/script>
            // <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
            // integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"><\/link></head><body>`);
            //     doc.document.write(printContent);
            //     doc.document.write("</html>")
            //     doc.document.close();
            //     doc.document.onkeydown = (key) => alert(key)
            //     setTimeout(() => { doc.print(); doc.close(); }, 300)

            doc.html(content, {
                html2canvas: {
                    scale: .5
                },
                callback: async function (doc) {
                    // doc.addPage(
                    //     { orientation: 'p', unit: 'px' }
                    // )
                    // document.querySelector(".card").innerHTML = content;
                    await doc.output("dataurlnewwindow", "receipt.pdf");
                },
                x: 25,
                y: 10,
            })
        } catch (e) {
            console.log(e)
        }
    }

    $('.btn-download-collection').on('click', function () {
        printECollectionReport();
    });

    async function printECollectionReport() {
        const selectedMonth = $('#selectedMonth').val();

        const filteredData = _jsonData.filter(object => object["date_time"] === selectedMonth);

        let doc = new jspdf.jsPDF({
            orientation: 'p',
            unit: 'px'
        });

        let printContent = `
        <html><title>Receipt</title>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
        <\/script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"><\/link>
        <style>
            div#ECollectionForm div.data-table {
                font-size: 13px;
            }

            div#ECollectionForm div.custom-font-size {
                font-size: 12px;
            }

            div#ECollectionForm div.data-table div.row-data {
                font-size: 12px;
                overflow: nowrap;
            }
            div#ECollectionForm div.data-table div.t-body div.row-data:nth-child(2) {
                width: 405.3px;
                white-space: nowrap;
                overflow: visible;
            }
        </style></head><body>
        [content]
</div>
</div>
</div>
        </html>
    `;
        let i = 0;
        let content = "";
        let totalAmount = 0; // Initialize totalAmount here

        while (filteredData.length - (i * 10) > 1) {
            let rows = filteredData.slice(i * 10, i * 10 + 10);

            if (rows.length < 10) {
                addIndex = 10 - rows.length;
                rows = rows.concat(Array(addIndex).fill(null));
            }

            try {
                content += `
                ${i % 3 !== 0 ? '<div class="row" style="width: 89.5vw; border-bottom:1px black solid; border-bottom-style: dashed; margin: 6rem 0 6rem 0"></div>' : ''}
                <div id="ECollectionForm-${i}" class="bg-whites mx-auto mt-5" style="width: 90rem;${(i + 1) % 3 !== 0 || i == 0 ? "" : "margin-bottom: 10rem !important;margin-top: 50rem !important;"} }">
                <div class="container "style="margin-top: 10rem !important;">
        <div class="row">
            <div class="col text-center">
                <span class="fs-3 font-weight-bold">REPORT OF e-COLLECTION AND DEPOSIT</span>
                <p class="fs-6">By:NET GLOBAL SOLUTIONS INC.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-8">
                <span>Entity Name:<div
                        class="list-inline-item font-weight-light border-dark border-bottom custom-font-size px-5"></div>
                </span><br>
                <span>Fund Cluster:<div
                        class="list-inline-item font-weight-light border-dark border-bottom custom-font-size px-5"></div>
                </span>
            </div>
            <div class="col-4">
                <span>Report No.:<div
                        class="list-inline-item font-weight-light border-dark border-bottom custom-font-size px-5"></div>
                </span><br>
                <span>Sheet No.:<div
                        class="list-inline-item font-weight-light border-dark border-bottom custom-font-size px-5"></div>
                </span><br>
                <span>Date:<div class="list-inline-item font-weight-light border-dark border-bottom custom-font-size px-5">
                    </div></span>
            </div>
        </div>
    </div>

    <div class="container mt-3 border border-dark table-bordered">
    <div class="row t-head">
        <div
            class="border border-dark col-3 d-flex align-items-center text-center justify-content-around border-right-0">
            Electronic Acknowledgement Receipt
        </div>
        <div class="border border-dark col-5 d-flex align-items-center justify-content-around border-right-0">

        </div>
        <div class="border border-dark col-4 d-flex align-items-center justify-content-around border-right-0">
            Amount
        </div>
    </div>
    <div class="row t-head">
        <div class="border border-dark col-9 d-flex align-items-center justify-content-around border-right-0">
        </div>
        <div class="border border-dark col-3 d-flex align-items-center justify-content-around border-right-0">
            Breakdown Collection
        </div>
    </div>
    <div class="row t-head">
        <div class="border border-dark col-1 d-flex align-items-center justify-content-around border-right-0">
            Date and Time
        </div>
        <div class="border border-dark col-1 d-flex align-items-center justify-content-around border-right-0">
            Number
        </div>
        <div class="border border-dark col-2 d-flex text-center align-items-center justify-content-around border-right-0">
            Responsibility Center Code
        </div>
        <div
            class="border border-dark col-1 d-flex align-items-center justify-content-around border-right-0 text-center">
            Payor
        </div>
        <div class="border border-dark col-1 d-flex align-items-center justify-content-around border-right-0">
            Particulars
        </div>
        <div class="border border-dark col-1 d-flex align-items-center justify-content-around">
            PREXC &nbsp;/PAP
        </div>
        <div class="border border-dark col-2 d-flex align-items-center justify-content-around">
            Totla per AR
        </div>
        <div class="border border-dark col-1 d-flex align-items-center justify-content-around">
            CIAP-PCAB
        </div>
        <div class="border border-dark col-1 d-flex align-items-center justify-content-around">
            DST
        </div>
        <div class="border border-dark col-1 d-flex align-items-center justify-content-around">
            LRF
        </div>
    </div>
    <div class="t-body p-0 m-0">
    `

                //             ${i % 2 == 1 ? '<div class="row" style="width: 52vw; border-bottom:1px black solid; border-bottom-style: dashed; margin: 6rem 0 6.18rem 0"></div>' : ''}
                // ${i % 2 == 1 && i != 39 ? "margin-bottom:12rem !important;" : ""}
                rows.forEach(row => {
                    totalAmount += parseFloat(row?.total_amount ?? 0);
                    content += `
        <div class="row row-data">
            <div class="border border-dark border-right-0 border-top-0 col-1">${row?.date_time ?? "&nbsp;"}</div>
            <div class="border border-dark border-right-0 border-top-0 col-1">${row?.ar_number ?? ""}</div>
            <div class="border border-dark border-right-0 border-top-0 col-2"></div>
            <div class="border border-dark border-right-0 border-top-0 col-1">${row?.name_of_payor ?? ""}</div>
            <div class="border border-dark border-right-0 border-top-0 col-1 text-center">${row?.particulars ?? ""}</div>
            <div class="border border-dark border-right-0 border-top-0 col-1"></div>
            <div class="border border-dark border-right-0 border-top-0 col-2">${parseFloat(row?.service_charge ?? 0).toFixed(2)}</div>
            <div class="border border-dark border-right-0 border-top-0 col-1">${parseFloat(row?.tax ?? 0).toFixed(2)}</div>
            <div class="border border-dark border-top-0 col-1 text-right-1">${parseFloat(row?.total_amount ?? 0).toFixed(2)}</div>
            <div class="border border-dark border-right-0 border-top-0 col-1"></div>
        </div>
    `;
                });
                content += `</div>
        <div class="row t-total-row">
        <div class="border border-dark border-right-0 border-top-0 col-1"></div>
        <div class="border border-dark border-right-0 border-top-0 col-1"></div>
        <div class="border border-dark border-right-0 border-top-0 col text-center">Total Amount</div>
        <div class="border border-dark border-right-0 border-top-0 col"></div>
        <div class="border border-dark border-right-0 border-top-0 col-2"></div>
        <div class="border border-dark border-top-0 col-1 text-right">P &nbsp; [total-amount]</div>
    </div>
</div>

    <div class="container border border-dark ">
        <div class="row justify-content-center  ml-5 mt-3">
            <div class="col-6">
                <h5>Summary</h5>
                <span class="text-left">Undeposited Collections per last report</span><br>
                <span class="text-left">Collections per AR Nos.<div
                        class="list-inline-item font-weight-light border-dark border-bottom custom-font-size px-5"></div>
                    to <div class="list-inline-item font-weight-light border-dark border-bottom custom-font-size px-5">
                    </div></span>
            </div>
            <div class="col-2">
                <br>
                <span class="text-left">
                    <span>&#8369;</span>
                </span><br>
                <span class="text-left">&nbsp;&nbsp;</span>
            </div>
        </div>

        <div class="row justify-content-md-center"> <!-- Centering the second row -->
            <div class="col-3">
                <h5>Deposit</h5>
                <span>Date:<div class="list-inline-item font-weight-light border-dark border-bottom custom-font-size px-5">
                    </div></span>
                <span>Ref #<div class="list-inline-item font-weight-light border-dark border-bottom custom-font-size px-5">
                    </div></span>
            </div>
            <div class="col-md-1">
                <br>
                <p></p>
            </div>
            <div class="col-2 d-flex flex-column">
                <br>
                <p class="text-center ml-3 custom-font-size px-5">_______________________</p>
            </div>  
        </div>

        <div class="row justify-content-center"> <!-- Centering the third row -->
            <div class="col-4">
                <p>Undeposited Collections, this Report</p>
            </div>
            <div class="col-2 d-flex flex-column">
            </span>
                <span class="text-center ml-4 custom-font-size px-5">_____________________</span>
            </div>
        </div>
    </div>

    <div class="container border border-dark text-center ">
        <h5 class="mt-4 font-weight-bold">CERTIFICATION</h5>
        <p style="text-align: justify;margin-left: 15%; margin-right: 15%;">
            &nbsp;&nbsp;I hereby certify on my official oath that I have reviewed and found in order the above statement of
            all
            collection
            based on the list provided by (Intermediary) corresponding to the period stated above for which Electronic AR
            Nos.
            _____________ to ______________ inclusive, consisting of __(number of)__ transactions, were actually issued by
            them in
            the amount shown thereon. I also certify that I have verified and confirmed that the amount of<br>
            __________________________ was deposited and credited to the appropriate bank account of this agency
        </p>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-md-6">
                    <p>
                        <span style="border-top: 1px solid black; display: inline-block;padding:0 50px;">Name and Signature
                            of the Designated Officer</span>
                    </p>
                </div>
            </div>
            <br>
            <div class="row justify-content-end">
                <div class="col-3">
                    <p>
                        <span style="border-top: 1px solid black; display: inline-block;padding: 0 15px;">Official
                            Designated</span>
                    </p>
                </div>

                <div class="col-3">
                    <p>
                        <span style="border-top: 1px solid black; display: inline-block; padding: 0 25px;">Date</span>
                    </p>
                </div>
            </div>
        </div>


    </div>
    <div class="container"style="margin-bottom:25rem !important;"">
    </div>

                </div>
            `;

                // Update totalAmount inside the loop
                rows.forEach(row => {
                    totalAmount += parseFloat(row?.total_amount ?? 0);
                });
                doc.addPage();
                i++;
            } catch (e) {
                console.log(e);
            }
        }
        let pdfHeight = 1200; // Adjust this value based on your content
        doc.html(printContent.replace("[content]", content).replaceAll("[total-page]", 1).replaceAll("[total-amount]", totalAmount.toFixed(2)), {
            html2canvas: {
                scale: .31
            },
            callback: async function (doc) {
                await doc.output("dataurlnewwindow", "e-collectionReport.pdf");
            },
            x: 15,
            y: 15,
        });
    }


    $('#DownloadECollect').on('click', (e) => console.log(e))

    $('botton.btn-print-receipt').on('click', (e) => console.log(e))
</script>