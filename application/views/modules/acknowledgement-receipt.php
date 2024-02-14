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

    a:focus,
    input:focus {
        border: 2px solid #000 !important;
    }

    td.day:hover {
        background: #ffffa2;

    }

    td.today.active.day {
        background: #ff7373;
        color: #fff;
    }

    th.clear {
        text-align: center;
        background: #00507A;
        color: #fff;
    }

    th.clear:hover {
        text-align: center;
        background: #909090;
        color: #fff;

    }

    .datepicker td,
    .datepicker th {
        cursor: pointer;
    }


    span.month:hover {
        background: #ffffa2;

    }

    .custom-button:hover {
        background-color: #45a049;
        /* Darker Green */
    }

    table {
        border-top: 1px black solid;
    }

    .export-btn {
        color: #000 !important;
        background: #bde8ff !important;
        border: 1px solid black !important;

    }

    .dataTables_empty {
        display: table-cell !important;
    }

    .modal-header .close {
        margin: -43px -26px -25px auto !important;
        color: #555 !important;
    }

    .modal .modal-dialog .modal-content .modal-header {
        display: inline-block !important;
    }

    .modal .modal-dialog .modal-content .modal-header .close span {
        font-size: 20px;
        font-weight: 900 !important;
        color: #6a6a6a;
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
        background: #00507a;
    }

    .btn-generate-container button:hover {
        min-width: 13rem;
        background: #909090;
    }

    .close {
        background: none !important;
    }

    .close:hover {
        background: none !important;
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


    .form-group {
        display: flex;
        align-items: center;
    }

    .date-label {
        margin-top: 5px;
        margin-right: 10px;
    }

    .date-input-group {
        max-width: 170px;
        margin-right: 20px;
    }

    .custom-date-input input[type="date"] {
        appearance: none;
        -webkit-appearance: none;
        padding: 0.375rem 0.75rem;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        margin-right: 0.5rem;
        /* Adjust margin as needed */
    }

    /* Additional styling to hide the calendar icon */
    .custom-date-input input[type="date"]::-webkit-calendar-picker-indicator {
        display: none;
    }
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
                        <button class="btn-lg btn-outline-dark rounded border-0" data-toggle="modal" data-target="#Daily_CollectionModal">Daily Collection</button>
                        <div class="modal fade" id="Daily_CollectionModal" tabindex="-1" role="dialog" aria-labelledby="Daily_CollectionModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm" role="document">
                                <div id="DailyCollectModal" class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="Daily_CollectionModalLabel">Daily Collection</h5>
                                        <button type="button" class="close text-right pr-4" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body bg-white pb-3">
                                        <div class="row mb-2">
                                            <div class="col-12 d-flex flex-row flex-wrap">
                                                <div class="custom-date-input">
                                                    <label for="modal_start_date" class="mr-2 d-flex align-items-center">Start Date:</label>
                                                    <input type="date" id="modal_start_date" class="form-control" style="width: 16rem;">
                                                </div>
                                                <div class="custom-date-input">
                                                    <label for="modal_end_date" class="mr-2  d-flex align-items-center">End Date:</label>
                                                    <input type="date" id="modal_end_date" class="form-control" style="width: 16rem;">
                                                </div>
                                                <div id="validationMessage"></div>
                                            </div>
                                        </div>

                                        <div id="modalDataTableContainer" class="overflow-auto"></div>
                                    </div>
                                    <div class="modal-footer bg-white border-top-0 d-flex ">
                                        <button type="button" class="btn-sm btn-outline-dark mr-3 mb-2 rounded preview-btn-modal">Preview</button>
                                        <button type="button" onclick="printDailyReport()" class="btn-sm btn-outline-dark mr-3 mb-2 rounded">Download</button>
                                        <?php if ($_SESSION['usertype'] == "SUPERADMIN")
                                            echo '<button type="button" class="btn-sm btn-outline-dark mr-3 mb-2 rounded " data-toggle="modal" data-target="#Submit_deposit" id="submit-deposit" data-backdrop="static" data-keyboard="false">Submit Deposit</button>' ?>


                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class=" col-mb-3 mr-3 mt-3">
                        <button class="btn-lg btn-outline-dark rounded border-0 w-50" data-toggle="modal" data-target="#exportModal">E-Collection</button>
                        <div class="modal fade" id="exportModal" tabindex="-1" role="dialog" aria-labelledby="exportModalLabel" aria-hidden="true">
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
                                                    <th rowspan="2" class="text-center">Date<i class="m-0">(mm/dd/yyyy)</i></th>
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
                                                $fmt = new NumberFormatter('en-US', NumberFormatter::CURRENCY);
                                                $fmt->setPattern(str_replace('¤#', "\xC2\xA0#", $fmt->getPattern()));
                                                foreach ($data as $row) {
                                                    echo "<tr>";
                                                    echo "<td>" . date_format(date_create($row['date']), "m/d/Y") . "</td>";
                                                    echo "<td>" . $row["mobile_number"] . "</td>";
                                                    echo "<td>" . $row["name_of_payor"] . "</td>";
                                                    echo "<td>" . $row["particulars"] . "</td>";
                                                    $total_per_AR = $row["fees_pcab"] + $row["document_stamp_tax"] + $row["legal_research_fund"];
                                                    echo "<td>" . $fmt->formatCurrency(floatval($total_per_AR), "PHP") . "</td>";
                                                    echo "<td class='text-right'>" . $fmt->formatCurrency(floatval($row["fees_pcab"]), "PHP") . "</td>";
                                                    echo "<td class='text-right'>" . $fmt->formatCurrency(floatval($row["document_stamp_tax"]), "PHP") . "</td>";
                                                    echo "<td class='text-right'> " . $fmt->formatCurrency(floatval($row["legal_research_fund"]), "PHP") . "</td>";

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

            <div class="form-group">
                <label for="startDate" class="date-label">Start Date:</label>
                <div class="input-group date date-input-group" id="startDatePicker">
                    <input type="text" class="form-control" name="startDate" id="startDate" style="z-index: 2; background:#fff;border:1px solid black; cursor:pointer;" readonly placeholder="mm /dd /yyyy">
                    <span class="input-group-addon" id="startDateIcon">
                        <i class="glyphicon glyphicon-calendar"></i>
                    </span>
                </div>

                <label for="endDate" class="date-label">End Date:</label>
                <div class="input-group date date-input-group" id="endDatePicker">
                    <input type="text" class="form-control" name="endDate" id="endDate" style="background:#fff;border:1px solid black;cursor:pointer;" readonly placeholder="mm /dd / yyyy">
                    <span class="input-group-addon" id="endDateIcon">
                        <i class="glyphicon glyphicon-calendar"></i>
                    </span>
                </div>
            </div>

            <div class="scrollable-container" style="padding: 0.5rem;">

                <table id="myTable" class="table table-striped text-center" width="100%">
                    <!-- Your table headers go here -->
                    <thead>
                        <tr>


                            <th class="font-weight-bold">Txn. ID</th>
                            <th class="font-weight-bold">Date<i class="m-0">(mm/dd/yyyy)</i></th>
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
                            echo "<tr py-5><td colspan='10'>No data available</td></tr>";
                        } else {
                            foreach ($data as $row) {
                                $date = date_create($row['date']);
                                echo "<tr>";


                                echo "<td>" . $row["trans_id"] . "</td>";
                                echo "<td>" . date_format(date_create($row['date']), "m/d/Y") . "</td>";
                                echo "<td>" . $row["reference_number"] . "</td>";
                                echo "<td>" . $row["name_of_payor"] . "</td>";
                                echo "<td>" . $row["particulars"] . "</td>";
                                echo "<td>" . $row["status"] . "</td>";
                                echo "<td class='text-right'>&#8369; " . $fmt->formatCurrency(floatval($row["fees_pcab"]), "PHP") . "</td>";
                                echo "<td class='text-right'>&#8369; " . $fmt->formatCurrency(floatval($row["legal_research_fund"]), "PHP") . "</td>";
                                echo "<td class='text-right'>&#8369; " . $fmt->formatCurrency(floatval($row["document_stamp_tax"]), "PHP") . "</td>";
                                echo "<td class='text-right'>&#8369; " . $fmt->formatCurrency(floatval($row["ngsi_convenience_fee"]), "PHP") . "</td>";
                                $total_AR = $row["fees_pcab"] + $row["document_stamp_tax"] + $row["legal_research_fund"] + $row["ngsi_convenience_fee"];
                                echo "<td class='text-right'>&#8369; " . $fmt->formatCurrency(floatval($total_AR), "PHP") . "</td>";
                                $total_per_AR_formatted = number_format($total_per_AR, 2);
                                echo "<td><button type='button'style='width: 80px; height: 25px; background: #555;' class=' btn-outline-dark border-0 btn-print-receipt' data-receipt-id='" . $row['trans_id'] . "'  onclick='printRow(" . $row['trans_id'] . ")'>Download</button></td>";
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
    <div class="modal-dialog modal-lg d-flex justify-content-center mt-3" role="document">
        <div id="Submit_depositModal" class="modal-content" style="width: 24rem;">
            <div class="modal-header">
                <h5 class="modal-title" id="Submit_depositModalLabel">Collection(s) Settlement</h5>
                <button type="button" class="close text-right pr-4 text-dark" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body bg-white pb-3">
                <!-- awdawd -->
                <div class="d-flex flex-column input-form">
                    <span class="message" style="position:relative; bottom: 1rem"></span>
                    <div style="display:inline">
                        <label class="pb-1">Day(s) of Collection</label>
                        <span class="m-0 p-0 ml-1 total-collection" style="margin-top:3px!important;">Total: &#8369; 0.00</span>
                    </div>
                    <div class="d-flex flex-row justify-content-between mt-3 mb-4 border-bottom-1">
                        <div id="dateRange">
                            <input type="date" name="collection_date_from" class="p-2 border rounded" value="">

                        </div>
                        <div id="dateRange">
                            <input type="date" name="collection_date_to" class="p-2 border border-black rounded" value="">
                        </div>
                    </div>
                    <!-- <div id="referenceNo">
                        <span>Reference No. *</span>
                        <input type="text" name="deposit_reference_no" class="p-2 pl-3 border border-black mt-3 rounded w-100">
                    </div> -->
                    <div id="settlements">
                        <div id="dateOfDeposit">
                            <input type="date" name="deposited_date" class="p-2 pl-3 mb-2 rounded w-100 border">
                        </div>
                        <label class="pb-2">CIAP-PCAB <div style="display:inline"><span class="m-0 p-0 ml-2 pcab-fee" style="margin-top:3px!important;">Total: &#8369; 0.00</span></div></label>
                        <div id="fees_pcab" class="d-flex flex-row justify-content-between border-bottom">
                            <div id="referenceNo">
                                <span>Reference No. *</span>
                                <input type="text" name="reference_no" class="p-2 pl-3 border border-black mb-2 w-100 rounded">
                            </div>
                            <div style="width:10px;"></div>
                            <div id="amount">
                                <span>Amount ( &#8369; ) *</span>
                                <input type="text" name="amount" class="p-2 pl-3 border border-black mb-2 w-100 rounded text-right">
                            </div>
                        </div>
                        <label class="pb-2">Documentary Stamp Tax <div style="display:inline"><span class="m-0 p-0 ml-2 dst" style="margin-top:3px!important;">Total: &#8369; 0.00</span></div></label>
                        <div id="document_stamp_tax" class="d-flex flex-row justify-content-between border-bottom">
                            <div id="referenceNo">
                                <span>Reference No. *</span>
                                <input type="text" name="reference_no" class="p-2 pl-3 border border-black mb-2 w-100 rounded">
                            </div>
                            <div style="width:10px;"></div>
                            <div id="amount">
                                <span>Amount ( &#8369; ) *</span>
                                <input type="text" name="amount" class="p-2 pl-3 mb-2 w-100  border rounded text-right">
                            </div>
                        </div>
                        <label class="pb-2">Legal Research Fund <div style="display:inline"><span class="m-0 p-0 ml-2 lrf" style="margin-top:3px!important;">Total: &#8369; 0.00</span></div></label>
                        <div id="legal_research_fund" class="d-flex flex-row justify-content-between">
                            <div id="referenceNo">
                                <span>Reference No. *</span>
                                <input type="text" name="reference_no" class="p-2 pl-3 mb-2 w-100 border rounded">
                            </div>
                            <div style="width:10px;"></div>
                            <div id="amount">
                                <span>Amount ( &#8369; ) *</span>
                                <input type="text" name="amount" class="p-2 pl-3 mb-2 w-100 border rounded text-right">
                            </div>
                        </div>
                        <div class="text-right sum-of-deposit">Total Deposit <br /> &#8369; <p class="p-0 m-0 px-2 d-inline border-bottom border-dark">0.00</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-white border-top py-2 px-3">

                <button type="button" class="btn-sm border-0 m-0 ml-2 mb-2 rounded close-modal bg-secondary" id="cancelDeposit" data-dismiss="modal" aria-hidden="true">Cancel</button>
                <!-- <button type="button" class="btn-sm border-0 m-0 ml-2 mb-2 rounded close-modal bg-secondary" id="confirmDeposit" data-toggle="modal" data-target="#DepositConfirmationModal" data-backdrop="static" data-keyboard="false">confirm</button> -->
                <button type="button" class="btn-sm border-0 m-0 ml-2 mb-2 rounded submit-deposit-btn-modal" id="submitDeposit" onmouseover="this.style.opacity=1" onmouseleave="this.style.opacity=.8" style="background-color:#00507a;opacity:.8;">
                    <i class="icon-settings spin" hidden></i> <span>Submit</span><span hidden>Submitting</span>
                </button>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="DepositConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="Confirmation_depositnModal" aria-hidden="true">
    <div class="modal-dialog modal-lg d-flex justify-content-center" role="document">
        <div class="modal-content" style="width: auto;">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation Modal</h5>
                <button type="button" class="close text-right pr-4 text-dark" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body bg-white pb-3 " style="width: auto; padding: 1rem 2rem;">
                You are about to submit a deposit, are you sure ?
                <table>
                    <thead>
                        <th></th>
                        <th>Collections</th>
                        <th>To Deposit</th>
                        <th>Undeposited</th>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
    $(document).ready(function() {
        function getCurrentDate() {
            const today = new Date();
            const year = today.getFullYear();
            const month = (today.getMonth() + 1).toString().padStart(2, '0');
            const day = today.getDate().toString().padStart(2, '0');
            return `${month}-${day}-${year}`;
        }

        // Set default values for start and end date
        $('#startDate').val(getCurrentDate());
        $('#endDate').val(getCurrentDate());

        // Initialize datepicker for the first DataTable
        $('#startDate, #endDate').datepicker({
            format: 'mm-dd-yyyy',
            autoclose: true,
            todayHighlight: true,
            clearBtn: true,
            orientation: 'bottom',
        });

        var table = $('#myTable').DataTable({
            dom: '<"pull-left"b><"pull-right"f>rt<"row"<"col-sm-4"l><"col-sm-4"i><"col-sm-4"p>>',
            scrollX: '90%',
            scrollCollapse: true,
        });

        $('.search-btn').on('click', function() {
            table.draw();
        });

        // Modify the start and end date filtering to only apply to the specific DataTable
        $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
            if (settings.nTable.id !== 'myTable') {
                return true;
            }
            var startDate = $('#startDate').val();
            var endDate = $('#endDate').val();
            var currentDate = new Date(data[1]);

            var formattedStartDate = new Date(startDate);
            var formattedEndDate = new Date(endDate);

            if (
                (isNaN(formattedStartDate) || isNaN(formattedEndDate)) ||
                (startDate === '' && endDate === '') ||
                (startDate === '' && currentDate <= formattedEndDate) ||
                (formattedStartDate <= currentDate && endDate === '') ||
                (formattedStartDate <= currentDate && currentDate <= formattedEndDate)
            ) {
                return true;
            }
        });

        // Trigger initial table draw
        table.draw();

        // Update table on date change
        $('#startDate, #endDate').on('change', function() {
            table.draw();
        });
    });

    $(document).ready(function() {
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
                customize: function(csv) {
                    // Modify the header row according to the provided <thead> structure
                    var header = 'Electronic Acknowledgement Receipt, ,, , Amount\n';
                    var header1 = ',, ,, , Breakdown Collection\n';
                    csv = header + header1 + csv;
                    return csv;
                }
            }]
        });

        $('#monthFilter').on('change', function() {
            var selectedMonth = $(this).val();
            if (selectedMonth === "0") {
                // Clear the filter completely if "All Months" is selected
                dataTable.column(0).search('').draw();
            } else {
                var specificMonth = selectedMonth.padStart(2, '0'); // Pad with zero if needed

                // Use DataTables API to filter by a specific month
                dataTable.column(0).search(specificMonth, true, false).draw();
            }
        });

        // Modify the month filtering to only apply to the specific DataTable
        $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
            if (settings.nTable.id !== 'EcollectTable') {
                return true;
            }
            var selectedMonth = $('#monthFilter').val();
            if (selectedMonth == 0) {
                return true;
            }
            var dateParts = data[0].split('/'); // Split date string by '/'
            var rowMonth = parseInt(dateParts[0]); // Parse month from date string
            return rowMonth == selectedMonth;
        });
    });


    const _jsonData = JSON.parse('<?php echo json_encode($data) ?>')

    const toLocalCurrency = (val) => parseFloat(val).toLocaleString('en-US', {
        maximumFractionDigits: 2,
        minimumFractionDigits: 2
    })

    function applyDateFilter() {
        var start_date = $('#startDate').val();
        var end_date = $('#endDate').val();

        table.draw();
    }


    $('#modal_start_date, #modal_end_date').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
        clearBtn: true,
        orientation: 'bottom',
    });
    // Modal date filter
    $('.preview-btn-modal').on('click', function() {
        var modalStartDate = $('#modal_start_date').val();
        var modalEndDate = $('#modal_end_date').val();


        // Validation for start and end date
        if (!modalStartDate || !modalEndDate) {
            $('#validationMessage').html('<span style="font-size:.8rem; color: red; text-align:center;" role="alert">Please select both start and end dates.</span>');
            return;
        }

        // Your existing code for data filtering and display goes here
        const filteredData = _jsonData.filter(item => {
            let itemDate = new Date(item.date);
            let modalStartDateObj = new Date(modalStartDate);
            let modalEndDateObj = new Date(modalEndDate);

            return itemDate >= modalStartDateObj && itemDate <= modalEndDateObj;
        });

        if (!filteredData.length) {
            $('#validationMessage').html('<span style="font-size:.8rem; color: red; text-align:center;" role="alert">No data found for the selected date range.</span>');
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
        modalTableHead.classList.add('thead'); // Added light background for the table head
        modalTableHead.innerHTML = ` <tr><th colspan="8" class="text-center">Collection</th></tr><tr><th style="width:${100 / 9}%;" rowspan="2">Date & Time</th><th style="width:${100 / 9}%;" rowspan="2">AR Number</th><th style="width:${100 / 9}%;" rowspan="2">Name of Payor</th><th style="width:${100 / 9}%;" rowspan="2">Reference Number</th><th style="width:${100 / 9}%;">CIAP-PCAB</th><th style="width:${100 / 9}%;">LRF</th><th style="width:${100 / 9}%;">DST</th><th style="width:${100 / 9}%;" rowspan="2">Total Collection</th></tr><tr><th>Account No.</th><th>Account No.</th><th>Account No.</th></tr>`;

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
            const LRF = parseFloat(row.legal_research_fund);
            const DST = parseFloat(row.document_stamp_tax);

            // Sum of fees_pcab, legal_research_fund, and document_stamp_tax
            const collection = CIAPPCAB + LRF + DST;

            // Add to total amounts
            totalCIAPPCAB += CIAPPCAB;
            totalLRF += LRF;
            totalDST += DST;
            totalCollection += collection;

            // Append row to modal table body
            modalTableBody.innerHTML += `<tr><td class="text-left" style='width:${100 / 9}%;padding-left:18px;'>${row.date}</td><td class="text-center" style='width:${100 / 9}%;padding-left:18px;'>${row.reference_number}</td><td style='width:${100 / 9}%;padding-left:18px;'>${row.name_of_payor}</td><td style='width:${100 / 9}%;padding-left:18px;'>${row.reference_number}</td><td class="text-right" style='width:${100 / 9}%;'>${CIAPPCAB.toFixed(2)}</td><td class="text-right" style='width:${100 / 9}%;'>${LRF.toFixed(2)}</td><td class="text-right" style='width:${100 / 9}%;'>${DST.toFixed(2)}</td><td class="text-right">${collection.toFixed(2)}</td></tr>`;
        });

        // Append the new table to the modal body
        modalTable.appendChild(modalTableHead);
        modalTable.appendChild(modalTableBody);
        modalBody.appendChild(modalTable);

        // Append totals row to modal table body
        // if ("<?= $_SESSION['usertype'] ?>" == "SUPERADMIN")
        modalTableBody.innerHTML += `<tr><td class="text-right" colspan="4">Total:</td><td class="text-right">${totalCIAPPCAB.toFixed(2)}</td><td class="text-right">${totalLRF.toFixed(2)}</td><td class="text-right">${totalDST.toFixed(2)}</td><td class="text-right">${totalCollection.toFixed(2)}</td></tr>`;

        // Append the modal body to the modal content
        modalContent.appendChild(modalBody);

        // Append the modal content to the modal container
        document.getElementById('modalDataTableContainer').appendChild(modalContent);

        // Change the modal dialog size with a transition
        var modalDialog = $('#Daily_CollectionModal .modal-dialog');

        // Remove table content when modal is closed
        $('#Daily_CollectionModal').on('hidden.bs.modal', function(e) {
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

    $('#modal_start_date, #modal_end_date').on("change", function() {
        $('#validationMessage').empty();
    });

    $('.download-btn-modal').on('click', function() {
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
    $('#Daily_CollectionModal').on('hidden.bs.modal', function(e) {
        $('#modalDataTableContainer').empty();

    });



    async function printDailyReport(startDate, endDate) {

        // Your code to fetch data and generate PDF report goes here
        const filteredData = _jsonData.filter(object => {
            if (object.date >= $("#Daily_CollectionModal #modal_start_date").val() && object.date <= $("#Daily_CollectionModal #modal_end_date").val()) return object
        })
        let doc = new jspdf.jsPDF({
            orientation: 'p',
            unit: 'px'
        })

        let printContent = ``;
        let i = 0;
        let rowsPerPage = "";
        let totalAmount = 0
        let yOffset = 0; // Track vertical position

        const header = `
        <div class="mx-auto d-flex flex-column border-dark" style="/*margin-top:50px*/;width:70rem;height:5rem;">
          <br>

        <div class="d-flex align-items-center justify-content-center" style="height: 250px;">

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
            
            
           </div>
            <br>
           <div class="d-flex align-items-center justify-content-center" style="height: 250px;">

             <img width="100%" height="6px" style="margin-top: -10px; margin-left:30px; margin-right:30px;" src="assets/images/NGSI_header.png" alt="logo" class="logo-dark" />
           
             </div>
           
           <br>
    
           <div class="d-flex align-items-center justify-content-center" style="height: 250px;">

           <div class="text-center text-uppercase py-3">
                    <p class="font-weight-bold" style="color:black;">LIST &nbsp;OF &nbsp;DAILY &nbsp;COLLECTION<p>

                    <p style="color:black;margin-top:-20px;">Agency : &nbsp;CONSTRUCTIONINDUSTRY &nbsp;OF &nbsp;THE &nbsp;PHILIPPINES<p>

                    <p class="text-justify" style="color:black;margin-top:-20px;">Board Phillippines Construction Accreditation board (PCAB)<p>

                    
                    <p class="text-capitalize" style="color:black;margin-top:-20px;">Date : ______<p>

                    
                   

                     </div>
                     
            </div>
            <p class="text-right" style="color:black;margin-top:-20px;margin-right:50px;">Report No : ______ <p>
            
           
            <br>
        </div> `;

        //test
        let perPage = rows => `

        <div id="PDFContent" class="mx-auto d-flex flex-column border-dark" style="height:78.85rem;padding-top:15rem;border:1px black ;">
          
        <div class="mx-auto d-flex flex-column border-dark" style="/*margin-top:60rem*/;width:69rem;height:5rem;">  
        <table style="margin-left:7px;margin-right:5px;">
                <thead>
                    <tr>
                        <th colspan="8" class="text-center">COLLECTION</th>

                    </tr>
                    <tr>
                        <th rowspan="2">Date and Time</th>
                        <th rowspan="2">AR No.</th>
                        <th rowspan="2">Name of Payor</th>
                        <th rowspan="2">Reference No.</th>
                        <th>CIAP-PCAB</th>
                        <th>LRF</th>
                        <th>DST</th>
                        <th rowspan="2">Total Collection</th>
                    </tr>
                    <tr>
                        <th>Account No.</th>
                        <th>Account No.</th>
                        <th>Account No.</th>
                    </tr>
                </thead>
                <tbody>
                    ${rows}
                </tbody>
            </table> 
            </div>
          `

        const content = row => `
            <tr>
                <td  style="  border: 1px solid black;">${row?.date ?? "&nbsp;"}</td>
                <td  style="  border: 1px solid black;">${row?.reference_number ?? ""}</td>
                <td style="  border: 1px solid black;">${row?.name_of_payor ?? ""}</td>
                <td style="  border: 1px solid black;" >${row?.referenceNumber ?? ""}</td>
                <td style="  border: 1px solid black;">${row?.fees_pcab ?? ""}</td>
                <td style="  border: 1px solid black;">${row?.legal_research_fund ?? ""}</td>
                <td style="  border: 1px solid black;">${row?.document_stamp_tax ?? ""}</td>
                <td style="  border: 1px solid black;">${parseFloat(parseFloat(row?.fees_pcab ?? 0) + parseFloat(row?.legal_research_fund ?? 0) + parseFloat(row?.document_stamp_tax ?? 0)).toFixed(2)}</td>
            <tr>
            `;

        for (let i = 0; i < filteredData.length; i++)
            rowsPerPage += content(filteredData[i])

        const footer = `
      

        <div class="mx-auto d-flex flex-column border-dark "style=";width:70rem;height:5rem;position:absolute;bottom: 0;">
         <div class="d-flex align-items-center justify-content-center" style="height: 250px;">
              <div class="row mt-4" style="margin:50px">
            
                 <div class="col-sm">
                  <img style="margin-left:25%; background-position:center; margin-bottom:-15px;z-index:0;position:relative;transform:scale(1.1)"width="35%" height="35%" src="assets/images/ma'am_je.png" alt="logo"
                                            class="logo-dark" />
                      <p style="position:relative;left:11px;margin:0;margin-top:-80px;">Prepared By: </p>
                      <p style="margin-top:60px;margin-left:155px;font-size: 18px; font-family: Arial, Helvetica, sans-serif;z-index:1;position:relative;">
                                            Jeremie Soliveres </p>
                        <p style=" margin-top:-20px; margin-left: 170px; font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
                                            Accounting Specialist</p>
                                    </div>

                <div class="col-sm">
                 <img style="margin-left:13rem; margin-bottom:-15px;" width="35%"
                                            height="35%" src="assets/images/sir_peter.png" alt="logo"
                                            class="logo-dark" />
                  <p style="position:relative;left:5.7rem;margin:0;margin-top:-80px;">Approved By: </p>
                   <p style="margin-top:60px;margin-left: 13.5rem;font-size: 18px; font-family: Arial, Helvetica, sans-serif;">
                   Mischell A. Fernandez</p>
                     <p style=" margin-top:-20px; margin-left: 218px; font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
                     Admin Officer III/Cashier II CIAP</p>
                       </div>


              </div>       
             </div>
             <p style="position:relative;margin-left:10px;">Page : 1</p>
            </div>


 

       
     
        `;



        //awdperPage(rowsPerPage)
        doc.html(header + perPage(rowsPerPage) + footer, {
            html2canvas: {
                scale: .40

            },
            async callback(pdf) {
                const date = new Date();
                await pdf.save(`list_of_colletion-${date.toLocaleDateString()}.pdf`);
            },
        })

    }

    async function printRow(trans_id) {
        const rowData = _jsonData.find(obj => obj.trans_id == trans_id);
        let doc = new jspdf.jsPDF({
            orientation: 'p',
            unit: 'px'
        });

        // Set agency name directly to "CIAP - PCAB"
        let agencyName = "CIAP - PCAB";
        const totalAmount = parseFloat(rowData.fees_pcab) +
            parseFloat(rowData.legal_research_fund) +
            parseFloat(rowData.document_stamp_tax) +
            parseFloat(rowData.ngsi_convenience_fee);

        const Amount = parseFloat(rowData.fees_pcab) +
            parseFloat(rowData.legal_research_fund) +
            parseFloat(rowData.document_stamp_tax);


        let content = `
  
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
                            <div class="col">${rowData.trans_id}</div>
                        </div>
                        <div class="row d-flex">
                            <div class="col">Date and Time: </div>
                            <div class="col">${rowData.date}</div>
                        </div>
                    </div>
                </div>
                <div class='row pt-4 pb-3'>
                    <div class="col">
                        <div class="row d-flex pl-5">
                            <div class="col text-capitalize ">Agency Name<div class="float-right">  :</div></div>
                            <div class="col">${agencyName}</div>
                        </div>
    `;


        content += `
    <div class="row d-flex pl-5">
            <div class="col text-capitalize ">Name of Payor<div class="float-right">  :</div></div>
            <div class="col"> ${rowData.name_of_payor}</div>
        </div>
        <div class="row d-flex pl-5">
            <div class="col text-capitalize ">Particular<div class="float-right">  :</div></div>
            <div class="col">PCAB fee</div>
        </div>
        <div class="row d-flex pl-5">
            <div class="col text-capitalize ">Amount<div class="float-right ">:</div></div>
            <div class="col"> ${Amount.toFixed(2)} </div>
        </div>
        <div class="row d-flex pl-5">
        <div class="col text-capitalize pl-4">PCAB Fee<div class="float-right pr-2">:</div></div>
            <div class="col"> (${parseFloat(rowData.fees_pcab).toFixed(2)})</div>
        </div>
        <div class="row d-flex pl-5">
            <div class="col text-capitalize pl-4">Legal Research Fee<div class="float-right pr-2">:</div></div>
            <div class="col"> (${parseFloat(rowData.legal_research_fund).toFixed(2)})</div>
        </div>
        <div class="row d-flex pl-5">
            <div class="col text-capitalize pl-4">Documentary Stamp<div class="float-right pr-2">:</div></div>
            <div class="col"> (${parseFloat(rowData.document_stamp_tax).toFixed(2)})</div>
        </div>
        <div class="row d-flex pl-5">
            <div class="col text-capitalize ">NGSI Conveniece fee<div class="float-right">:</div></div>
            <div class="col"> ${parseFloat(rowData.ngsi_convenience_fee).toFixed(2)}</div>
        </div>
        <div class="row d-flex pl-5">
            <div class="col text-capitalize ">Total Amount<div class="float-right ">:</div></div>
            <div class="col"> ${totalAmount.toFixed(2)} </div>
        </div>
        <div class="row d-flex pl-5">
            <div class="col text-capitalize ">Reference Number<div class="float-right">:</div></div>
            <div class="col"> ${rowData.reference_number}</div>
        </div>
    `;

        content += ` 
                    </div>
                </div>
                <div class="row mb-4">
                    <span class="col font-italic font-weight-light">This is a system generated receipt. Signature is not required.</span>
                </div>
            </div>
            <div class="row">
                <div class="col-1">Note:</div>
                <div class="col">
                    <div>This proforma represents minimum data.</div>
                    <div>Moreover, the format may vary depending on the system being used</div>
                </div>
            </div>
        </div>
    `;

        doc.html(content, {
            html2canvas: {
                scale: .5
            },
            callback: async function(doc) {
                const date = new Date();
                await doc.save(`acknowledge-reciept-${date.toLocaleDateString()}.pdf`);


            },
            x: 25,
            y: 10,
        });
    }

    const updateToDepositAmount = ({
        total_pcab_fee,
        total_lrf,
        total_dst,
        total_collection
    }, resetToZero = false) => {
        $("#Submit_deposit span.total-collection").text(`Total: ₱ ${toLocalCurrency(resetToZero ? 0 : total_collection)}`)
        $("#Submit_deposit span.pcab-fee").text(`Total: ₱ ${toLocalCurrency(resetToZero ? 0 : total_pcab_fee)}`)
        $("#Submit_deposit span.dst").text(`Total: ₱ ${toLocalCurrency(resetToZero ? 0 : total_dst)}`)
        $("#Submit_deposit span.lrf").text(`Total: ₱ ${toLocalCurrency(resetToZero ? 0 : total_lrf)}`)
    }

    const depositTotal = () => {
        let total = 0
        $("#Submit_deposit #amount input").each(function() {
            total += parseFloat(this.value ? this.value.replace(",", "") : 0)
        })
        $("#Submit_deposit .sum-of-deposit p").text(toLocalCurrency(total))
    }

    let dbTotalCollection = 0;
    let data;

    $("#dateOfDeposit input, #dateRange input").on("click", function() {
        this.showPicker();
    })

    $("#dateRange input").on("input", async function() {
        $("#Submit_deposit .message").text("").removeClass("error", "success");
        const body = {
            collection_date_to: $("input[name='collection_date_to'").val(),
            collection_date_from: $("input[name='collection_date_from'").val()
        }
        updateToDepositAmount({}, true)
        let toPopulate = false;
        data = null;
        if (body.collection_date_from && body.collection_date_to)
            try {
                const res = await fetch("/total-txn-amount", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(body)
                }).then(res => res.json())

                if (!res.status)
                    throw res;
                if (new Date(body.collection_date_from) > new Date(body.collection_date_to)) {
                    $("#Submit_deposit .message").text("Date 'From' must not greater than 'To'").addClass("error");
                    resetTotals();
                    return;
                }
                data = res.data;

                if (data && Object.values(data).every(val => val)) {
                    updateToDepositAmount(data)
                    return;
                }
                throw false
            } catch (e) {
                updateToDepositAmount({}, true)
                $("#Submit_deposit .message").text(e ? "Error occured, please try it again by changing date." : "Range has no collection to calculate.").addClass("error");
            }

    })

    $("#dateRange input, #referenceNo input, #dateOfDeposit input, #amount input").on("input", function() {
        if (this.value != "") {
            this.parentElement.classList.add("filled")
            this.parentElement.classList.remove("error")
        } else
            this.parentElement.classList.remove("filled", "error")
    })

    $("#amount input").on("blur", function() {
        const regex = /(?:^[1-9]([0-9]+)?(?:\.[0-9]{1,2})?$)|(?:^(?:0)$)|(\.\d)/
        if (this.value != "") {
            if (!regex.test(this.value))
                this.parentElement.classList.add("error")
            else {
                this.value = toLocalCurrency(this.value.replace(",", ""))
                depositTotal()
            }
        } else {
            this.parentElement.classList.remove("error")
        }
    })
    $("#amount input").on("focus", function() {
        this.value = this.value.replace(',', '')
    })

    $("#cancelDeposit").on("click", async () => {
        $("#Submit_deposit .message").text("").removeClass("success");
        $("#Submit_deposit .filled").removeClass("filled");
        $("#Submit_deposit input").val("")
        $("#Submit_deposit #dateRange input").val("")
        $("#Submit_deposit").removeClass('loading')
    })


    $("#confirmDeposit").on("click", function() {
        let payload = {
            document_stamp_tax: {},
            fees_pcab: {},
            legal_research_fund: {}
        }
        let isInvalid = false
        $("#Submit_deposit input").each(function() {
            let value = this.value

            if (this.name == "deposited_date") {
                value = new Date(this.value) <= new Date() ? this.value : ""
            }

            if (value == "") {
                this.parentElement.classList.add("error")
                isInvalid = true;
                return;
            }
            if (this.name == "amount" || this.name == "reference_no") {
                const mainParent = this.parentElement.parentElement;
                payload[mainParent.id][this.name] = this.name == "amount" ? this.value.replaceAll(",", "") : this.value;
                return;

            }
            payload[this.name] = this.value;
        })
        if (isInvalid) return;

        if (new Date(payload.collection_date_from) > new Date(payload.collection_date_to)) {
            $("[name=collection_date_from]").parent().addClass("error");
            return;
        }

        if ($("#Submit_deposit .settlements .error").length) return;
        let toAppend = ""
        let totalAmount = {
            collection: 0,
            deposit: 0,
            undeposited: 0
        }
        const totalProps = {
            fees_pcab: "total_pcab_fee",
            document_stamp_tax: "total_dst",
            legal_research_fund: "total_lrf"
        }
        for (prop of ["fees_pcab", "document_stamp_tax", "legal_research_fund"]) {
            totalAmount.collection += parseFloat(data[totalProps[prop]])
            totalAmount.deposit += parseFloat(payload[prop].amount)
            totalAmount.undeposited += parseFloat(data[totalProps[prop]]) - parseFloat(payload[prop].amount)
            toAppend += `<tr><td class="text-capitalize">${prop.replaceAll("_"," ")}</td><td class="text-right">${toLocalCurrency(data[totalProps[prop]])}</td><td class="text-right">${toLocalCurrency(payload[prop].amount)}</td><td class="text-right">${toLocalCurrency(data[totalProps[prop]] - payload[prop].amount)}</td></tr>`
        }
        $("#DepositConfirmationModal table tbody").html(toAppend + `<tr><td class="text-capitalize">Total</td><td class="text-right">${toLocalCurrency(totalAmount.collection)}</td><td class="text-right">${toLocalCurrency(totalAmount.deposit)}</td><td class="text-right">${toLocalCurrency(totalAmount.undeposited)}</td></tr>`)
        console.log(payload, totalAmount)
    })

    $("#submitDeposit").on("click", async () => {
        let payload = {
            document_stamp_tax: {},
            fees_pcab: {},
            legal_research_fund: {}
        }
        let isInvalid = false
        $("#Submit_deposit input").each(function() {
            let value = this.value

            if (this.name == "deposited_date") {
                value = new Date(this.value) <= new Date() ? this.value : ""
            }

            if (value == "") {
                this.parentElement.classList.add("error")
                isInvalid = true;
                return;
            }
            if (this.name == "amount" || this.name == "reference_no") {
                const mainParent = this.parentElement.parentElement;
                payload[mainParent.id][this.name] = this.name == "amount" ? this.value.replaceAll(",", "") : this.value;
                return;

            }
            payload[this.name] = this.value;
        })
        if (isInvalid) return;

        if (new Date(payload.collection_date_from) > new Date(payload.collection_date_to)) {
            $("[name=collection_date_from]").parent().addClass("error");
            return;
        }

        if ($("#Submit_deposit .settlements .error").length) return;
        console.log(payload)
        $("#Submit_deposit").addClass('loading')

        try {
            const res = await fetch("/submit-deposit", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(payload)
            }).then(res => res.json())

            if (res.status) {
                $("#Submit_deposit .message").text("Deposit settlement submitted succesfully.").addClass("success");
                setTimeout(() => {
                    $(".modal button[data-dismiss=modal").each(function() {
                        this.click()
                    })
                    $("#Submit_deposit .message").text("").removeClass("success");
                    $("#Submit_deposit .filled").removeClass("filled");
                    $("#Submit_deposit input").val("")
                    $("#Submit_deposit #dateRange input").val('<?php echo date('Y-m-d'); ?>')
                    $("#Submit_deposit").removeClass('loading')
                }, 1500)
                return
            }
            throw (res)

        } catch (e) {
            $("#Submit_deposit .message").text("An error occured, please try again.").addClass("error");
            $("#Submit_deposit").removeClass('loading')
        }
    })
</script>