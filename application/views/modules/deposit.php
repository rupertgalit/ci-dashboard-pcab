<style>
    table,
    th {
        border: 0.5px black solid !important;
        border-width: 0.5px 0 0.5px 0.5px;
        border-collapse: collapse;
    }

    .ecollection-table-container tr th:last-child {
        margin-right: 0.5px;
        border-right: 0.5px black solid;
    }

    /* th:last-child {
        border-right: 1px black solid;
    } */
</style>

<div class="row w-100 mb-5">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body p-1 pt-3">
                <div class="d-sm-flex align-items-center my-4 pl-2">
                    <!-- <h4 class="card-title mb-sm-0">Deposit</h4> -->

                    <!-- <button style="margin-top: -20px;" type="button"
                        class="btn-sm btn-outline-dark border-0 mr-3 mb-2 rounded download-btn-modal">Deposit</button> -->
                </div>


                <table id="myTable" class="text-center ecollection-table-container" width="100%">
                    <thead class="w-100">
                        <tr>
                            <th colspan="2">Undeposited Collection (per last Report)</th>
                            <th colspan="7">Collections</th>
                            <th colspan="3">Deposit / Fund Transfer</th>
                            <th rowspan="2">Undeposited Collection (this Report)</th>
                            <th rowspan="2" style="width: 10rem!important;" class="text-center">Action</th>
                        </tr>
                        <tr>
                            <th>Date <i class="m-0">(mm/dd/yyyy)</i></th>
                            <th>Undeposited Amount</th>
                            <th>Date From <i class="m-0">(mm/dd/yyyy)</i></th>
                            <th>Date To <i class="m-0">(mm/dd/yyyy)</i></th>
                            <th>Total No. of Transaction</th>
                            <th>LRF</th>
                            <th>DSF</th>
                            <th>PCAB Fee</th>
                            <th>Total Amt. of Collection</th>
                            <th>Date <i class="m-0">(mm/dd/yyyy)</i></th>
                            <th>Ref. No.</th>
                            <th>Deposited Amount</th>
                        </tr>
                    </thead>
                    <tbody class="w-100">

                        <?php
                        $fmt = new NumberFormatter('en-US', NumberFormatter::CURRENCY);
                        $fmt->setPattern(str_replace('¤#', "\xC2\xA0#", $fmt->getPattern()));

                        if (!empty($data))
                            foreach ($data as $key => $row) {
                                $undeposited = (float) $row["legal_research_fund"] +
                                    (float) $row["document_stamp_tax"] +
                                    (float) $row["fees_pcab"];
                                echo "<tr>";
                                echo "<td>" .  date_format(date_create($row["last_date"]), "m/d/Y") . "</td>";
                                echo "<td class='text-right'>&#8369; " . ($row["last_txn_amont"] != "" ? $fmt->formatCurrency(floatval($row["last_txn_amont"]), false) : "0.00") . "</td>";
                                echo "<td>" .  date_format(date_create($row["date_from"]), "m/d/Y") . "</td>";
                                echo "<td>" .  date_format(date_create($row["date_to"]), "m/d/Y") . "</td>";
                                echo "<td>" . $row["ttl_trnsact"] . "</td>";
                                echo "<td class='text-right'>&#8369; " . $fmt->formatCurrency(floatval($row["legal_research_fund"]), false) . "</td>";
                                echo "<td class='text-right'>&#8369; " . $fmt->formatCurrency(floatval($row["document_stamp_tax"]), false) . "</td>";
                                echo "<td class='text-right'>&#8369; " . $fmt->formatCurrency(floatval($row["fees_pcab"]), false) . "</td>";
                                echo "<td class='text-right'>&#8369; " . $fmt->formatCurrency(floatval($row["no_ngsi_fee"]), false) . "</td>";
                                echo "<td>" .  date_format(date_create($row["deposited_date"]), "m/d/Y") . "</td>";
                                echo "<td> " .  $row["deposit_reference_no"] . "</td>";
                                echo "<td class='text-right'>&#8369; " . $fmt->formatCurrency(floatval($row["deposited_amount"]), false) . "</td>";
                                echo "<td class='text-right'>&#8369; " . $fmt->formatCurrency(floatval($row["undeposit_collection"]), false) . "</td>";
                                echo "<td><button class='btn-sm btn-outline-dark border-0 px-3 py-1 rounded download-btn-modal' onclick='downloadDeposit($key)'>Download</button></td>";
                                echo "</tr>";
                            }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Modal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="dateInput" class="text-dark">Date:</label>
                                        <input type="date" class="form-control" id="dateInput">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="refNumberInput" class="text-dark">Reference Number:</label>
                                        <input type="text" class="form-control" id="refNumberInput">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="amountInput" class="text-dark">Total Amount:</label>
                                        <input type="text" class="form-control" id="amountInput">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-md btn-success border-0 px-3 py-1 rounded">Submit</button>

                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script>
            const sMonths = Array.from({
                length: 12
            }, (item, i) => {
                return new Date(0, i).toLocaleString('en-US', {
                    month: 'short'
                })
            });
            const shortDateFormat = (date) => {
                if (!date) return "<i>none<i>";
                return new Intl.DateTimeFormat('en-US', {
                    year: "numeric",
                    month: "numeric",
                    day: "numeric"
                }).format(new Date(date))
            }

            const data_collection = JSON.parse('<?= json_encode($data) ?>')
            $(document).ready(function() {


                var table = $('#myTable').DataTable({
                    dom: '<"pull-left"b><"pull-right"f>rt<"row"<"col-sm-4"l><"col-sm-4"i><"col-sm-4"p>>',
                    scrollX: '80%',
                    scrollCollapse: true,
                });
            });

            const parseToCurrency = val => {
                if (!val) return "0.00"
                return parseFloat(val).toLocaleString('en-US', {
                    maximumFractionDigits: 2,
                    minimumFractionDigits: 2
                })
            }

            const content = (data) => `
            <div class="mx-auto d-flex flex-column border-dark" style="/*margin-top:50px*/;width:70rem;height:5rem;">
                    <div class="container justify-content-center mb-1">
                        <div class="row d-flex flex-row justify-content-center">
                            <div class="col-md-3">
                                <img height="100px" style="margin-left:-1rem;"
                                    src="assets/images/ngsi-letterhead.png" alt="logo" class="logo-dark" />
                            </div>
                            <div class="col-md-4 mt-3" style="margin-left:11rem;">
                                <p class="font-weight-bold" style="font-family: Century Gothic; font-size:16px;" ;>
                                    NET GLOBAL SOLUTIONS&nbsp;&nbsp; INC.</p>
                                <p style="margin-top: -20px;margin-bottom: -5px; font-family: Century Gothic;">Tel.
                                    No. 632 82877374</p>
                                <p style=" line-height: 80%; color:blue;margin-top: 10px;">
                                    Support@netglobalsolutions.net</p>
                            </div>
                        </div>
                        <img width="100%" height="100%" style="margin-top: -10px;"
                            src="assets/images/NGSI_header.png" alt="logo" class="logo-dark" />
                    </div>
                    
                    <div class="mt-5">
                        <div class="text-center text-uppercase py-3">
                            <b><u>Certification&nbsp; of Deposit</u></b>
                        </div>
                        <div class="text-center m-3">
                            <b>Summary</b>
                        </div>
                        <table class="border-0">
                            <tbody>
                                <tr>
                                    <td colspan="3">Undeposited Collections per last Report,<br>(date: ${shortDateFormat(data.last_date)})</td>
                                    <td class="text-right" style="vertical-align:top;">P <div class="w-100 d-inline-block text-right" style="padding-right: .7rem;">${parseToCurrency(data.last_txn_amont ?? "0.00")}</div></td>
                                </tr>
                                <tr>
                                    <td colspan="3">Collections, ${data.date_from != data.date_to ? shortDateFormat(data.date_from) + " to " + shortDateFormat(data.date_to) : shortDateFormat(data.date_from)}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="pl-5 pb-3">Total Number of Transaction</td>
                                    <td colspan="2" class="text-right" style="padding-right:2.6rem;vertical-align:top;">${data.ttl_trnsact}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="pl-5">Total Amount of Collection</td>
                                    <td class="text-right" style="padding-right:3.2rem;">P <div class="w-100 d-inline-block text-right">${parseToCurrency(data.txn_amount)}</div></td>
                                    <td class="text-right pr-1">${parseToCurrency(data.txn_amount)}</td>
                                </tr>
                                <tr class="p-0">
                                    <td colspan="2" style="padding-left:4.5rem;">CIAP-PCAB</td>
                                    <td class="text-right" style="padding-right:2.6rem;">(${parseToCurrency(data.fees_pcab)})</td>
                                    <td class="text-right"></td>
                                </tr>
                                <tr class="p-0">
                                    <td colspan="2" style="padding-left:4.5rem;">DST</td>
                                    <td class="text-right" style="padding-right:2.6rem;">(${parseToCurrency(data.document_stamp_tax)})</td>
                                    <td class="text-right"></td>
                                </tr>
                                <tr class="p-0">
                                    <td colspan="2" style="padding-left:4.5rem;">LRF</td>
                                    <td class="text-right" style="padding-right:2.6rem;">(${parseToCurrency(data.legal_research_fund)})</td>
                                    <td class="text-right"></td>
                                </tr>
                                <tr >
                                    <td colspan="3" class="pb-3">Deposit / Fund Transfers</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="pl-5">
                                        <div class="w-100 d-flex justify-content-between">
                                            <span>
                                                Date: <label class="border-bottom border-dark text-center m-0"
                                                    style="width:5rem;display:inline-block">${shortDateFormat(data.deposited_date)}</label>
                                            </span>
                                            <span class="position-relative"><label class="text-center m-0"
                                                    style="width:5rem;display:inline-block;">P <div class="w-100 d-inline-block text-right pr-1">${parseToCurrency(data.deposited_amount)}</div></label></span>
                                        </div>
                                    </td>
                                    <td class="text-left" style="padding-right:3rem;"></td>
                                    <td class="text-right">(${parseToCurrency(data.deposited_amount)})</td>
                                </tr>
                                <tr style="vertical-align: top;">
                                    <td colspan="2" class="pl-5 pb-3">Reference No.:  ${data.deposit_reference_no}</td>
                                    <td class="text-right" style="padding-right:3rem;"></td>
                                    <td class="text-right"></td>
                                </tr>
                                <tr>
                                    <td colspan="3">Undeposited Collections, this Report</td>
                                    <td class="text-right">P <div class="w-100 d-inline-block text-right" style="padding-right: .7rem;">${parseToCurrency(data.undeposit_collection)}</div></td>
                                </tr>
                            </tbody>
                        </table>
                        <div
                            style="text-align: justify;text-justify: inter-word;margin-top: 2rem; font-size: .9rem; line-height:32px;">
                            This is to certify the above is true and correct statement. That the amount collected is
                            to deposited intact
                            to the ${'[bank name]'} bank account of the ${"[agency name]"} with amount number
                            ${'[account number]'}, and duly supported
                            by attached proof of deposit. Details of collections can be generated from our online
                            reporting facility or
                            in the attached electronic file of the List if Daily Collection.
                        </div>

                        <div class="w-100" style="margin-top: 6rem;">
                                <div class="">
                                    <div class="row" style="height:6rem;">
                                        <div class="col" style="position:relative;left:0px">
                                            <img style="margin-left: 20%;background-position:center;margin-bottom:-15px;z-index:0;transform: scale(1.4);display:block;position:relative;top:-7px;height:3rem;" width="35%" height="35%" src="assets/images/ma'am_je.png" alt="logo" class="logo-dark">
                                            <p style="position:relative;left: 1.7rem;margin:0;width: 100px;bottom: 61px;">Prepared By: </p>
                                            <p style="margin-top:-25px;margin-left:87px;font-size: 15px;font-family:Arial,Helvetica,sans-serif;z-index:1;position:relative;text-transform: uppercase;font-weight: 700;margin-bottom: 20px;">
                                                   Jeremie Soliveres </p>
                                            <p style="margin-top:-24px;margin-left:106px;font-family:Arial,Helvetica,sans-serif;font-size:12px;z-index:1;position:relative;margin-bottom: 20px;">
                                                Accounting Specialist</p>
                                        <p style="margin-top:-24px;margin-left: 100px;font-family:Arial,Helvetica,sans-serif;font-size:12px;z-index:1;position:relative;">Netglobal Solutions, Inc.</p></div>
                                        <div class="col" style="position:relative;left:0;">
                                            <img style="margin-left: 14rem;margin-bottom:-15px;background-position:center;margin-bottom:-15px;z-index:0;transform: scale(1.1);display:block;position:relative;top:-7px;height:3rem;left: -26px;" width="35%" height="35%" src="assets/images/sir_peter.png" alt="logo" class="logo-dark">
                                            <p style="position:relative;left: 7.7rem;margin:0;width: 100px;bottom: 61px;">Approved By: </p>
                                            <p style="margin-top:-25px;margin-left:12rem;font-size: 15px;z-index: 1;position: relative;text-transform: uppercase;font-weight: 700;">
                                                Peter Lingatong</p>
                                            <p style="margin-top: -20px;margin-left: 13.5rem;font-family:Arial,Helvetica,sans-serif;font-size:12px;z-index:1;position:relative;">
                                                Chairman &amp; CEO</p>
                                        <p style="margin-top: -20px;margin-left: 200px;font-family:Arial,Helvetica,sans-serif;font-size:12px;z-index:1;position:relative;">Netglobal Solutions, Inc.</p></div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                `;

            function downloadDeposit(key) {
                let doc = new jspdf.jsPDF({
                    orientation: 'p',
                    unit: 'px'
                })

                const now = new Date()

                const data = data_collection[key]
                console.log(data)

                doc.html(`<div id="PDFContent" class="mx-auto d-flex flex-column border-dark" style="width:55.8rem;padding-top:5rem;/*border:1px black solid;*/">${content(data)}</div>`, {
                    html2canvas: {
                        scale: .5
                    },
                    async callback(pdf) {
                        const date = new Date();
                        await pdf.save(`receipt-${date.toLocaleDateString()}.pdf`);
                    },
                })
            }
        </script>