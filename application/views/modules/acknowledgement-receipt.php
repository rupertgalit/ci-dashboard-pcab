<style>
    .custom-button {
        background-color: #4CAF50;
        border: none;
        color: black;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 11px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 4px;

    }

    .export-btn {
        color: black !important;
        /* Ensure the color is applied */
    }

    .custom-button:hover {
        background-color: #45a049;
        /* Darker Green */
    }

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
                                                <label for="modal_start_date"
                                                    class="mr-2 d-flex align-items-center">Start Date:</label>
                                                <input type="date" id="modal_start_date" class="form-control"
                                                    style="width: 16rem;">
                                                <label for="modal_end_date"
                                                    class="mr-2 ml-4 d-flex align-items-center">End Date:</label>
                                                <input type="date" id="modal_end_date" class="form-control"
                                                    style="width: 16rem;">
                                                <div id="validationMessage"></div>
                                            </div>
                                        </div>

                                        <div id="modalDataTableContainer" class="overflow-auto"></div>
                                    </div>
                                    <div class="modal-footer bg-white border-top-0">
                                        <button type="button"
                                            class="btn-sm btn-outline-dark mr-3 mb-2 rounded preview-btn-modal">Preview</button>
                                        <button type="button"  onclick="downloadPDF()"
                                            class="btn-sm btn-outline-dark mr-3 mb-2 rounded" >Download</button>
                                        <button type="button"
                                            class="btn-sm btn-outline-dark mr-3 mb-2 rounded "data-toggle="modal"
                            data-target="#Submit_deposit" id="submit-deposit">Submit Deposit</button>

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

                                                    <th colspan="2" class="text-center">Electronic Acknowledgement
                                                        Receipt</th>

                                                    <th rowspan="3" class="text-center">Payor</th>
                                                    <th rowspan="3" class="text-center">Particulars</th>

                                                    <th colspan="4" class="text-center">Amount</th>
                                                </tr>
                                                <tr>
                                                    <th rowspan="2" class="text-center">Date</th>
                                                    <th rowspan="2" class="text-center">Number</th>
                                                    <th rowspan="2" class="text-center">Total per AR</th>
                                                    <th colspan="3" class="text-center">Breakdown Collection</th>
                                                </tr>
                                                <tr>
                                                    <th class="text-center">CIAP-PCAB</th>
                                                    <th colspan="1" class="text-center">DST</th>
                                                    <th colspan="1" class="text-center">LRF</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php

                                                foreach ($data as $row) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row["date"] . "</td>";
                                                    echo "<td>" . $row["date"] . "</td>";
                                                    echo "<td>" . $row["name_of_payor"] . "</td>";
                                                    echo "<td>" . $row["particulars"] . "</td>";
                                                    echo "<td>"  . $row["particulars"] .  "</td>";
                                                    echo "<td>"  . $row["txn_amount"] .  "</td>";
                                                    echo "<td>"  . $row["txn_amount"] .  "</td>";

                                                 
                                                    echo "<td></td>";

                                                    echo "</tr>";
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer bg-white border-top-0">

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
                            <th class="font-weight-bold">Transaction ID</th>
                            <th class="font-weight-bold">Reference No.</th>
                            <th class="font-weight-bold">Name of Payor</th>
                            <!-- <th class="font-weight-bold">Mobile No.</th> -->
                            <th class="font-weight-bold">Particular</th>
                            <th class="font-weight-bold">Status</th>
                            <th class="font-weight-bold">PCAB Fee</th>
                            <th class="font-weight-bold">Legal Research Fund</th>
                            <th class="font-weight-bold">Documentary Stamp</th>
                            <th class="font-weight-bold">NGSI Convenience Fee</th>
                            <th class="font-weight-bold">Total Amount</th>
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
                                $date = date_create($row['date']);
                                echo "<tr>";
                                echo "<td>" . $row["trans_id"] . "</td>";
                                echo "<td>" . $row["txn_amount"] . "</td>";
                                echo "<td>" . $row["name_of_payor"] . "</td>";
                                echo "<td>" . $row["particulars"] . "</td>";
                                echo "<td>" . $row["status"] . "</td>";
                                echo "<td>&#8369; " . $row["fees_pcab"] . "</td>";
                                echo "<td>&#8369; " . $row["legal_research_fund"] . "</td>";
                                echo "<td>&#8369; " . $row["document_stamp_tax"] . "</td>";
                                echo "<td>&#8369; " . $row["document_stamp_tax"] . "</td>";
                                echo "<td>" . $row['txn_amount'] . "</td>";
                                echo "<td><button type='button'style='width: 80px; height: 25px;' class=' btn-outline-dark border-0 btn-print-receipt' data-receipt-id='" . $row['trans_id'] . "'  onclick='printRow(" . $row['trans_id'] . ")'>Download</button></td>";
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
<div class="modal fade" id="Submit_deposit" tabindex="-1" role="dialog" aria-labelledby="Submit_depositnModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg d-flex justify-content-center" role="document">
        <div id="Submit_depositModal" class="modal-content" style="width: 25rem;">
            <div class="modal-header">
                <h5 class="modal-title" id="Submit_depositModalLabel">Collection to Settle</h5>
                <button type="button" class="close text-right pr-4" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body bg-white pb-3">
                <!-- awdawd -->
                <div class="d-flex flex-column">
                    <label class="pb-1">Day(s) of Collection</label>
                    <div for="dateFrom">
                        <span>From</span>
                        <input type="date" id="dateFrom" aria-label="Date from" class="p-2 border rounded"></input>

                    </div>
                    <div for="dateFrom" class="mt-4">
                        <span>To</span>
                        <input type="date" id="dateTo" aria-label="Date to" class="p-2 border border-black rounded"></input>
                    </div>
                    <input type="text" id="referreceNo" aria-label="Date to" class="p-2 border border-black mt-2 rounded"></input>
                    <input type="text" id="dateOfDeposit" aria-label="Date to" class="p-2 border border-black mt-2 rounded"></input>
                    <input type="text" id="depositedAmount" aria-label="Date to" class="p-2 border border-black mt-2 rounded"></input>
                    <input type="text" id="dateTo" aria-label="Date to" class="p-2 border border-black mt-2 rounded"></input>
                </div>
            </div>
            <div class="modal-footer bg-white border-top-0">

                <button type="button" class="btn-sm btn-outline-dark m-0 ml-2 mb-2 rounded submit-deposit-btn-modal" id="">Cancel</button>
                <button type="button" class="btn-sm btn-outline-dark m-0 ml-2 mb-2 rounded submit-deposit-btn-modal" id="">Submit</button>

            </div>
        </div>
    </div>
</div>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
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
        var today = new Date();
        var dateString = today.getFullYear() + '-' + (today.getMonth() + 1).toString().padStart(2, '0') + '-' + today.getDate().toString().padStart(2, '0');
        var filename = 'NGSI_E-Collection_' + dateString;

        var dataTable = $('#EcollectTable').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                extend: 'csv',
                text: 'Export',
                filename: filename,
                className: 'export-btn', // Add class name for styling
                customize: function (csv) {
                    // Modify the header row according to the provided <thead> structure
                    var header = 'Electronic Acknowledgement Receipt, ,, , Amount\n';
                    var header1 = ',, ,, , Breakdown Collection\n';
                    csv = header + header1 + csv;
                    return csv;
                }
            }]
        });

        // Event handler for month filter
        $('#monthFilter').on('change', function () {
            var selectedMonth = $(this).val();

            // Use DataTables API to filter by month
            dataTable.column(0).search(selectedMonth ? `-${selectedMonth.padStart(2, '0')}` : "", true, false).draw();
            var filteredData = dataTable.rows({ search: 'applied' }).data().toArray();
        });
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
        var modalStartDate = $('#modal_start_date').val();
        var modalEndDate = $('#modal_end_date').val();

        console.log(modalEndDate, modalStartDate)
        // Validation for start and end date
        if (!modalStartDate || !modalEndDate) {
            $('#validationMessage').html('<span style="font-size:.8rem; color: red; margin-left:1.5rem;" role="alert">Please select both start and end dates.</span>');
            return;
        }

        // Your existing code for data filtering and display goes here
        const filteredData = _jsonData.filter(item => {
            let itemDate = new Date(item.date)
            let modalSD = new Date(modalStartDate)
            let modalED = new Date(modalEndDate)

            console.log(itemDate, modalSD, modalED, itemDate >= modalSD, itemDate <= modalED)
            return itemDate >= modalSD && itemDate <= modalED;
        });

        if (!filteredData.length) {
            $('#validationMessage').html('<span style="font-size:.8rem; color: red; margin-left:1.5rem;" role="alert">No data found for the selected date range.</span>');
            return;
        }

        // Clear existing content in the modal
        $('#validationMessage').empty();
        $('#modalDataTableContainer').empty();

        // Create a new div to wrap the table and add additional elements if needed     
        var modalContent = document.createElement('div');
        modalContent.classList.add('modal-content', 'table-responsive'); // Add classes for styling and responsiveness

        var modalBody = document.createElement('div');
        modalBody.classList.add('modal-body-content');

        // Create a new table with the matching rows and an id
        var modalTable = document.createElement('table');
        modalTable.id = 'modalDataTable'; // Add id to the table
        modalTable.classList.add('table', 'table-bordered', 'table-hover', 'table-striped'); // Add DataTable styling classes

        var modalTableHead = document.createElement('thead');
        modalTableHead.classList.add('thead-light'); // Added light background for the table head
        modalTableHead.innerHTML = ' <tr><th colspan="8" class="text-center">Collection</th></tr><tr><th rowspan="2">Date & Time</th><th rowspan="2">AR Number</th><th rowspan="2">Name of Payor</th><th rowspan="2">Reference Number</th><th>CIAP-PCAB</th><th>LRF</th><th>DST</th><th rowspan="2">Total Collection</th></tr><tr><th>Account No.</th><th>Account No.</th><th>Account No.</th></tr>';

        var modalTableBody = document.createElement('tbody');

        // Initialize variables to hold the total amounts
        let totalCIAPPCAB = 0;
        let totalLRF = 0;
        let totalDST = 0;
        let totalCollection = 0;

        // Iterate through filtered data to calculate totals
        filteredData.forEach((row) => {
            // Parse amounts to numbers
            const CIAPPCAB = parseFloat(row.fees_pcab);
            const LRF = parseFloat(row.txn_amount);
            const DST = parseFloat(row.txn_amount);
            const collection = parseFloat(row.txn_amount);

            // Add to total amounts
            totalCIAPPCAB += CIAPPCAB;
            totalLRF += LRF;
            totalDST += DST;
            totalCollection += collection;

            // Append row to modal table body
            modalTableBody.innerHTML += `<tr><td>${row.date}</td><td>${row.trans_id}</td><td>${row.name_of_payor}</td><td>${row.reference_number}</td><td>${CIAPPCAB.toFixed(2)}</td><td>${LRF.toFixed(2)}</td><td>${DST.toFixed(2)}</td><td class="text-right">${collection.toFixed(2)}</td></tr>`;
        });

        // Append the new table to the modal body
        modalTable.appendChild(modalTableHead);
        modalTable.appendChild(modalTableBody);
        modalBody.appendChild(modalTable);

        // Append totals row to modal table body
        modalTableBody.innerHTML += `<tr><td colspan="4">Total:</td><td>${totalCIAPPCAB.toFixed(2)}</td><td>${totalLRF.toFixed(2)}</td><td>${totalDST.toFixed(2)}</td><td class="text-right">${totalCollection.toFixed(2)}</td></tr>`;

        // Append the modal body to the modal content
        modalContent.appendChild(modalBody);

        // Append the modal content to the modal container
        document.getElementById('modalDataTableContainer').appendChild(modalContent);

        // Change the modal dialog size with a transition
        var modalDialog = $('#Daily_CollectionModal .modal-dialog');

        // Remove table content when modal is closed
        $('#Daily_CollectionModal').on('hidden.bs.modal', function (e) {
            // Reset form fields
            $('#modal_start_date').val('');
            $('#modal_end_date').val('');
            // Clear any validation messages
            $('#validationMessage').empty();
            // Clear table content
            $('#modalDataTableContainer').empty();
        });

        // Ensure that it stays in modal-lg size
        if (!modalDialog.hasClass('modal-lg')) {
            modalDialog.removeClass('modal-sm');
            modalDialog.addClass('modal-lg');
            modalDialog.css('transition', 'width 0.5s ease-in-out'); // Adjust the duration and easing as needed
        }

        // Initialize DataTable for the modal table with sorting enabled
        var table = $('#modalDataTable').DataTable({
            dom: '<"pull-left"b><"pull-right"f>rt<"row"<"col-sm-4"l><"col-sm-4"i><"col-sm-4"p>>',
            scrollX: '90%',
            scrollCollapse: true,
        });

    });

    $('#modal_start_date, #modal_end_date').on("change", function () {
        $('#validationMessage').empty();
    });

    $('.download-btn-modal').on('click', function () {
        var modalStartDate = $('#modal_start_date').val();
        var modalEndDate = $('#modal_end_date').val();

        if (!modalStartDate || !modalEndDate) {
            $('#validationMessage').html('<span style="font-size:.8rem; color: red; margin-left:1.5rem;" role="alert">Please select both start and end dates.</span>');
            return;
        }

        // Clear existing content in the modal
        $('#validationMessage').empty();

        printDailyReport(modalStartDate, modalEndDate);
    });

    // Remove table content when modal is closed
    $('#Daily_CollectionModal').on('hidden.bs.modal', function (e) {
        $('#modalDataTableContainer').empty();

    });



//     async function printDailyReport(startDate, endDate) {

//         // Your code to fetch data and generate PDF report goes here
//         const filteredData = _jsonData.filter(object => object.date_time >= startDate && object.date_time <= endDate);

//         let doc = new jspdf.jsPDF({
//             orientation: 'p',
//             unit: 'px'
//         })

//         let printContent = `
      
//         `;
//         let i = 1;
//         let content = "";
//         let totalAmount = 0
//         let yOffset = 0; // Track vertical position

//         while (i) {
//             let dataToPopulate = filteredData;
//             // let remainingData = filteredData.length - 10;
//             let rows = [];
//             // splice(starting index e.g. 0, range of indexes e.g. 10)
//             let pivot = i * 10
//             console.log(i, filteredData.splice(0, 10))
//             console.log(dataToPopulate)
//             i++
//             if (i >= 10) i = -1;


//             //             ${i % 2 == 1 ? '<div class="row" style="width: 52vw; border-bottom:1px black solid; border-bottom-style: dashed; margin: 6rem 0 6.18rem 0"></div>' : ''}
//             // ${i % 2 == 1 && i != 39 ? "margin-bottom:12rem !important;" : ""}

//             const content = (row) => `
//             <div class="row row-data">
//                 <div class="border border-dark border-right-0 border-top-0 col">${row?.date_time ?? "&nbsp;"}</div>
//                 <div class="border border-dark border-right-0 border-top-0 col">${row?.ar_number ?? ""}</div>
//                 <div class="border border-dark border-right-0 border-top-0 col">${row?.name_of_payor ?? ""}</div>
//                 <div class="border border-dark border-right-0 border-top-0 col">${row?.particulars ?? ""}</div>
//                 <div class="border border-dark border-right-0 border-top-0 col-2">${row?.reference_number ?? ""}</div>
//                 <div class="border border-dark border-right-0 border-top-0 col">${row?.particulars ?? ""}</div>
//                 <div class="border border-dark border-right-0 border-top-0 col">${row?.reference_number ?? ""}</div>
//                 <div class="border border-dark border-top-0 col text-right">${parseFloat(row?.total_amount ?? 0).toFixed(2)}</div>
//             </div>
//             `;
//             let content = `</div>
//         <div class="row t-total-row">
//         <div class="border border-dark border-right-0 border-top-0 col"></div>
//         <div class="border border-dark border-right-0 border-top-0 col"></div>
//         <div class="border border-dark border-right-0 border-top-0 col"></div>
//         <div class="border border-dark border-right-0 border-top-0 col text-center">Total Amount</div>
//         <div class="border border-dark border-right-0 border-top-0 col-2"></div>
//         <div class="border border-dark border-right-0 border-top-0 col"></div>
//         <div class="border border-dark border-right-0 border-top-0 col"></div>
//         <div class="border border-dark border-top-0 col text-right">P &nbsp; [total-amount]</div>
//     </div>
// </div>
// </div>
// <div class="row mt-4" >
//                                         <div class="col" style="position:relative; margin-left:6.5rem;  ">
                                            
//                                             <p >Prepared By: </p>
                        
//                                         </div>
//                                         <div class="col" style="position:relative;left:120px; ">
                                            
//                                             <p >Checked & Certified By: </p>
                                           
//                                         </div>
//                                     </div>
// <div class="row" style="height:6rem;  margin-bottom:4rem;">
//                                         <div class="col" style="position:relative; margin-left:6.5rem;  ">
//                                         <img style="margin-left: 5rem;background-position:center;z-index:0;transform:scale(1.1);display:block;position:relative;"  height="70px" src="assets/images/ma'am_je.png" alt="logo" class="logo-dark" />
//                                             <p style="margin-top:-20px;margin-left:87px;font-size:18px;font-family:Arial,Helvetica,sans-serif;z-index:1;position:relative;">
//                                                    Jeremie Soliveres </p>
//                                             <p style="margin-top:-24px;margin-left:90px;font-family:Arial,Helvetica,sans-serif;font-size:12px;z-index:1;position:relative;">
//                                                 Accounting Specialist</p>
//                                                 <p style="margin-top:-22px;margin-left:90px;font-family:Arial,Helvetica,sans-serif;font-size:12px;z-index:1;position:relative;">
//                                                 Netglobal Solution Inc</p>
//                                         </div>
//                                         <div class="col" style="position:relative;left:120px; margin-top:4.5rem;">
                                            
                                            
//                                             <p style="margin-top:-25px;margin-left:10rem;font-size:18px;font-family:Arial,Helvetica,sans-serif;z-index:1;position:relative;">
//                                             Mischell A. Fernandez</p>
//                                             <p style=" margin-top:-24px;margin-left:10rem;font-family:Arial,Helvetica,sans-serif;font-size:12px;z-index:1;position:relative;">
//                                             Admin Officer III/Cashier II </p>
//                                             <p style=" margin-top:-22px;margin-left:10rem;font-family:Arial,Helvetica,sans-serif;font-size:12px;z-index:1;position:relative;">
//                                             CIAP </p>
//                                         </div>
//                                     </div>
// </div>
// </div>`


//             doc.html(`<div id="PDFContent" class="mx-auto d-flex flex-column border-dark" style="width:55.8rem;padding-top:6rem;/*border:1px black solid;*/">${content(data)}</div>`, {
//                 html2canvas: {
//                     scale: .5
//                 },
//                 async callback(pdf) {
//                     const date = new Date();
//                     document.querySelector(".card").innerHTML = content(data);
//                     // await pdf.save(`receipt-${date.toLocaleDateString()}.pdf`);
//                 },
//             })
//         }
//     }
    async function printRow(trans_id) {
        const rowData = _jsonData.find(obj => obj.trans_id == trans_id)
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
                <div class="container mt-3 justify-content-center mb-4">
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
                    <div class="text-center text-uppercase py-3">
                        <u>Acknowledgement &nbsp; Receipt</u>  
                </div>
                <div class="row d-flex">
                    <div class="col"></div>
                    <div class="col">
                        <div class="row d-flex">
                            <div class="col">AR Number: </div>
                            <div class="col">
                                ${rowData.trans_id}
                            </div>
                        </div>
                        <div class="row d-flex">
                            <div class="col">Date and Time: </div>
                            <div class="col">
                               ${rowData.date}
                            </div>
                        </div>
                    </div>
                </div>
                <div class='row pt-4 pb-3'>
                <div class="col">
                `;
            for (let key in rowData) {
                if (["id", "trans_id", "date", "txn_amount"].includes(key)) continue;

                let value = rowData[key];
                console.log(key);

                // Check if key is a special case
                if (key == "total_amount" || key == "amount") {
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
                <div  class="col text-capitalize pl-4">PCAB Fee<div class="float-right pr-2">:</div></div>
                <div class="col">
                    ${parseFloat(500).toFixed(2)}
                </div>
            </div>
            <div class="row d-flex">
                <div  class="col text-capitalize pl-4">Documentary Stamp Fee<div class="float-right pr-2">:</div></div>
                <div class="col">
                    ${parseFloat(20).toFixed(2)}
                </div>
            </div>
            <div class="row d-flex">
                <div  class="col text-capitalize pl-4">Legal Research Fee<div class="float-right pr-2">:</div></div>
                <div class="col">
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

            doc.html(printContent.replace("[content]", content), {
                html2canvas: {
                    scale: .5
                },
                callback: async function (doc) {
                    // doc.addPage(
                    //     { orientation: 'p', unit: 'px' }
                    // )
                    await doc.output("dataurlnewwindow", "receipt.pdf");
                },
                x: 25,
                y: 10,
            })
        } catch (e) {
            console.log(e)
        }
    }


    $('#DownloadECollect').on('click', (e) => console.log(e))

    $('botton.btn-print-receipt').on('click', (e) => console.log(e))

    function downloadPDF() {
        // const doc = new jsPDF();
        // doc.autoTable({ html: '#myTable' });
        // doc.save('table.pdf');
        

        var doc = new jsPDF();
autoTable(doc, "#myTable");
doc.save("table.pdf");

    }
</script>
