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
                            <th>Transactions</th>
                            <th>Deposited Amount</th>
                        </tr>
                    </thead>
                    <tbody class="w-100">

                        <?php
                        $fmt = new NumberFormatter('en-US', NumberFormatter::CURRENCY);
                        $fmt->setPattern(str_replace('¤#', "\xC2\xA0#", $fmt->getPattern()));

                        if ($data != false)
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
                                echo "<td>
                                    <a tabindex='0' class='btn-sm' role='button' data-toggle='popover' data-placement='bottom' data-trigger='focus' title='Deposit of " . date_format(date_create($row["deposited_date"]), "m/d/Y") . "' data-content='" . json_encode($row) . "'>View</a>
                                </td>";
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
                if (!date) return "<i>N/A<i>";
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

                $('[data-toggle="tooltip"]').tooltip({
                    boundary: 'window'
                })
                $('[data-toggle="popover"]').popover({
                    content: function() {
                        const data = JSON.parse($(this).attr('data-content'))
                        const totalUndeposited = Math.abs(parseFloat(data.transactions?.balance_fees_pcab ?? 0)) + Math.abs(parseFloat(data.transactions?.balance_document_stamp_tax ?? 0)) + Math.abs(parseFloat(data.transactions?.balance_legal_research_fund ?? 0))
                        const totalDeposited = Math.abs(parseFloat(data.transactions.fees_pcab)) + Math.abs(parseFloat(data.transactions.document_stamp_tax)) + Math.abs(parseFloat(data.transactions.legal_research_fund))
                        const totalCollection = Math.abs(
                            parseFloat(data.fees_pcab) +
                            parseFloat(data.document_stamp_tax) +
                            parseFloat(data.legal_research_fund) +
                            parseFloat(data.last_deposit_transactions?.balance_fees_pcab ?? 0) +
                            parseFloat(data.last_deposit_transactions?.balance_document_stamp_tax ?? 0) +
                            parseFloat(data.last_deposit_transactions?.balance_legal_research_fund ?? 0)
                        )
                        console.log(data)

                        return `
                        <div class="mb-2 d-flex flex-row po-content"><span class="col-2 p-0 text-nowrap po-content"></span><span class="pr-0 font-weight-bold col po-content">(&#8369;) Collections<span class="collection-label">(+ Balance from last report)</span></span><span class="pr-0 font-weight-bold col">(&#8369;) Deposited</span><span class="pr-0 font-weight-bold col po-content">(&#8369;) Undeposited<span class="collection-label">(This Report)</span></span></div>
                        <div class="mb-0 d-flex flex-row po-content"><span class="col-2 p-0 text-nowrap po-content"><p class="d-inline text-center po-content"><b class="px-auto">PCAB Fees</b><br/><span>(0052-1684-30)</span></p></span><span class="p-0 col po-content ">${parseToCurrency(Math.abs(parseFloat(data.last_deposit_transactions?.balance_fees_pcab ?? 0)) + parseFloat(data.fees_pcab))}<br><span class="collection-label">(+ ${parseToCurrency(Math.abs(parseFloat(data.last_deposit_transactions?.balance_fees_pcab ?? 0)))})</span></span><span class="p-0 col">${parseToCurrency(data.transactions.fees_pcab)}</span><span class="p-0 col">${parseToCurrency(Math.abs(parseFloat(data.transactions?.balance_fees_pcab ?? 0)))}</span></div>
                        <div class="mb-0 d-flex flex-row po-content"><span class="col-2 p-0 text-nowrap po-content"><p class="d-inline text-center po-content"><b class="px-auto">DST</b><br/><span>(3402-2866-00)</span></p></span><span class="p-0 col po-content ">${parseToCurrency(Math.abs(parseFloat(data.last_deposit_transactions?.balance_document_stamp_tax ?? 0)) + parseFloat(data.document_stamp_tax))}<br><span class="collection-label">(+ ${parseToCurrency(Math.abs(parseFloat(data.last_deposit_transactions?.balance_document_stamp_tax ?? 0)))})</span></span><span class="p-0 col">${parseToCurrency(data.transactions.document_stamp_tax)}</span><span class="p-0 col">${parseToCurrency(Math.abs(parseFloat(data.transactions?.balance_document_stamp_tax ?? 0)))}</span></div>
                        <div class="mb-0 d-flex flex-row po-content"><span class="col-2 p-0 text-nowrap po-content"><p class="d-inline text-center po-content"><b class="px-auto">LRF</b><br/><span>(3402-2866-00)</span></p></span></span><span class="p-0 col po-content ">${parseToCurrency(Math.abs(parseFloat(data.last_deposit_transactions?.balance_legal_research_fund ?? 0)) + parseFloat(data.legal_research_fund))}<br><span class="collection-label">(+ ${parseToCurrency(Math.abs(parseFloat(data.last_deposit_transactions?.balance_legal_research_fund ?? 0)))})</span></span><span class="p-0 col">${parseToCurrency(data.transactions.legal_research_fund)}</span><span class="p-0 col">${parseToCurrency(Math.abs(parseFloat(data.transactions?.balance_legal_research_fund ?? 0)))}</span></div>
                        <div class="mb-0 d-flex flex-row po-content"><span class="col-2 p-0 text-nowrap po-content"><p class="d-inline text-center po-content"><b class="px-auto">Total</b></p></span><span class="p-0 col">${parseToCurrency(totalCollection)}</span><span class="p-0 col">${parseToCurrency(totalDeposited)}</span><span class="p-0 col">${parseToCurrency(totalUndeposited)}</span></div>
                        `
                        // <p class="d-inline text-center"><b class="px-auto">PCAB Fees</b><br/><span>(0052-1684-30)</span></p>
                        // <p class="d-inline text-center"><b class="px-auto">DST</b><br/><span>(3402-2866-00)</span></p>
                        // <p class="d-inline text-center"><b class="px-auto">LRF</b><br/><span>(3402-2866-00)</span></p>
                        // <b>PCAB Fees (0052-1684-30)</b>
                        // <p class="pl-2 mb-0">Deposited: </p>
                        // <p class="pl-2 mb-0 text-right">${parseToCurrency(data.transactions.fees_pcab)}</p>
                        // <p class="pl-2 mb-0">Undeposited: </p>
                        // <p class="pl-2 mb-0 text-center">${parseToCurrency(Math.abs(parseFloat(data.transactions?.balance_fees_pcab) ?? 0))}</p>
                        // <b>DST (3402-2866-00)</b>
                        //  <p class="pl-2 mb-0">Deposited:</p>
                        // <p class="pl-2 mb-0 text-right">${parseToCurrency(data.transactions.document_stamp_tax)}</p>
                        // <p class="pl-2 mb-0">Undeposited: </p>
                        // <p class="pl-2 mb-0 text-center">${parseToCurrency(Math.abs(parseFloat(data.transactions?.balance_document_stamp_tax) ?? 0))}</p>
                        // <b>LRF (3402-2866-00)</b>
                        //  <p class="pl-2 mb-0">Deposited:</p>
                        // <p class="pl-2 mb-0 text-right">${parseToCurrency(data.transactions.legal_research_fund)}</p>
                        // <p class="pl-2 mb-0">Undeposited: </p>
                        // <p class="pl-2 mb-0 text-center">${parseToCurrency(Math.abs(parseFloat(data.transactions?.balance_legal_research_fund) ?? 0))}</p>
                    },
                    container: 'body',
                    fallbackPlacement: ["top", "bottom"],
                    html: true,
                    boundary: 'viewport',
                });
                $(document).on("click", ({
                    target
                }) => {
                    console.log(target.parentElement)
                    if (target.parentElement.classList.contains("popover") || target.parentElement.classList.contains("popover-body") || target.parentElement.classList.contains("po-content") || target.parentElement.type == "span")
                        return

                    $('.popover').removeClass("show")
                    $('.popover').remove()


                })
            });

            const parseToCurrency = val => {
                if (!val) return "0.00"
                return parseFloat(val).toLocaleString('en-US', {
                    maximumFractionDigits: 2,
                    minimumFractionDigits: 2
                })
            }

            const content = (data) => `
        <div class="mx-auto" style="[mb];width: 50rem;">
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
                        <img width="100%" height="5px" style="margin-top: -10px;"
                            src="assets/images/NGSI_header.png" alt="logo" class="logo-dark" />
                    </div>
                    <div class="mt-3">
                        <div class="text-center text-uppercase py-3">
                            <b><u>Certification&nbsp; of Deposit</u></b>
                        </div>
                        <div class="text-center m-3">
                            <b>Summary</b>
                        </div>
                        <table class="border-0">
                            <tbody>
                                <tr>
                                    <td colspan="3">Undeposited Collections per last Report,<br>(Date: ${data.last_date ? shortDateFormat(data.last_date): "N/A"})
                                    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CIAP&nbsp;-&nbsp;PCAB<p style="vertical-align:center;position:absolute;margin-top:-20px;margin-left:500px;font-size: 12px;"> (P ${parseToCurrency(data.last_deposit_transactions?.balance_fees_pcab ?? "0.00")})</p>
                                    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DST&nbsp;&nbsp;&nbsp<p style="vertical-align:center;position:absolute;margin-top:-20px;margin-left:500px;font-size: 12px;"> (P ${parseToCurrency(data.last_deposit_transactions?.balance_document_stamp_tax ?? "0.00")})</p>
                                    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LRF&nbsp;&nbsp;<p style="vertical-align:center;position:absolute;margin-top:-20px;margin-left:500px;font-size: 12px;"> (P ${parseToCurrency(data.last_deposit_transactions?.balance_legal_research_fund ?? "0.00")})</p>
                                    </td>
                                    <td class="text-right" style="vertical-align:top;"><div class="w-100 d-inline-block text-right" style="padding-right: .7rem;">P ${parseToCurrency(data.last_txn_amont ?? "0.00")}</div></td>
                              </tr>
                                <tr>
                                    <td colspan="3">Collections, ${data.date_from != data.date_to ? shortDateFormat(data.date_from) + " to " + shortDateFormat(data.date_to) : shortDateFormat(data.date_from)}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="pl-3 pb-3">Total Number of Transaction <p style="vertical-align:center;position:absolute;margin-top:-20px;margin-left:490px;font-size: 12px;"> ${(data.ttl_trnsact ?? "0")}</p></td>
                                   
                                </tr>
                                <tr>
                                    <td colspan="2" class="pl-3" style="margin-top:-10px;position:absolute;margin-left:.5px;">Total Amount of Collection <p style="vertical-align:center;position:absolute;margin-top:-20px;margin-left:675px;font-size: 12px;">P ${parseToCurrency(Math.abs(
                            parseFloat(data.no_ngsi_fee) 
                           
                        ))}</p></td>
                                    <td></td>
                                </tr>

                                <tr>
                               
                                    <td colspan="2" style="padding-left:4.5rem;">CIAP - PCAB</td>
                                    <td class="text-right" style="padding-right:2.6rem;">(
                                        P ${parseToCurrency(data.fees_pcab)})</td>
                                    <td class="text-right"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="padding-left:4.5rem;">DST</td>
                                    <td class="text-right" style="padding-right:2.6rem;">(P  ${parseToCurrency(data.document_stamp_tax)})</td>
                                    <td class="text-right"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="padding-left:4.5rem;">LRF</td>
                                    <td class="text-right" style="padding-right:2.6rem;">(P ${parseToCurrency(data.legal_research_fund)})</td>
                                    <td class="text-right"></td>
                                </tr>
                                <tr >
                                    <td colspan="3" class="pb-3">Deposit / Fund Transfers </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="pl-5">
                                
                                            <span>
                                                (Date: ${shortDateFormat(data.deposited_date)})
                                            </span>
                                        
                                    </td>
                                    <td class="text-left" style="padding-right:2rem;"></td>
                                    <td class="text-right"></td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td colspan="2" class="pl-3" style="margin-top:-10px;position:absolute;margin-left:.5px;">Total Amount of Collection <p style="vertical-align:center;position:absolute;margin-top:-20px;margin-left:675px;font-size: 12px;">P ${parseToCurrency(data.deposited_amount)}</p></td>
                                    <td></td>
                                </tr>
                                <tr>
                               
                               <td colspan="2" style="padding-left:4.5rem;">CIAP - PCAB &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ref No.:  ${data.transactions?.pcab_ref_no ?? "N/A"}</td>
                               <td class="text-right" style="padding-right:2.6rem;"> (
                                   P ${parseToCurrency(data.transactions?.fees_pcab)})</td>
                               <td class="text-right"></td>
                           </tr>
                           <tr>
                               <td colspan="2" style="padding-left:4.5rem;">DST &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ref No.:  ${data.transactions?.dst_ref_no ?? "N/A"}</td>
                               <td class="text-right" style="padding-right:2.6rem;">(P  ${parseToCurrency(data.transactions?.document_stamp_tax)})</td>
                               <td class="text-right"></td>
                           </tr>
                           <tr>
                               <td colspan="2" style="padding-left:4.5rem;">LRF &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ref No.:  ${data.transactions?.lrf_ref_no ?? "N/A"}</td>
                               <td class="text-right" style="padding-right:2.6rem;">(P ${parseToCurrency(data.transactions?.legal_research_fund)})</td>
                               <td class="text-right"></td>
                           </tr>

                               
                                <tr>
                                    <td colspan="3">Undeposited Collections, this Report</td>
                                    <td class="text-right">&nbsp;<div class="w-100 d-inline-block text-right" style="padding-right: .9rem;"> P ${parseToCurrency(data.undeposit_collection)}</div></td>
                                </tr>

                                <tr>
                               
                                    <td colspan="2" style="padding-left:4.5rem;">CIAP - PCAB</td>
                                    <td class="text-right" style="padding-right:2.6rem;">(
                                        P ${parseToCurrency(data.transactions?.balance_fees_pcab)})</td>
                                    <td class="text-right"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="padding-left:4.5rem;">DST</td>
                                    <td class="text-right" style="padding-right:2.6rem;">(P  ${parseToCurrency(data.transactions?.balance_document_stamp_tax)})</td>
                                    <td class="text-right"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="padding-left:4.5rem;">LRF</td>
                                    <td class="text-right" style="padding-right:2.6rem;">(P ${parseToCurrency(data.transactions?.balance_legal_research_fund)})</td>
                                    <td class="text-right"></td>
                                </tr>

                            </tbody>
                        </table>

                        <div
                            style="text-align: justify;text-justify: inter-word;margin-top: 2rem; font-size: .9rem; line-height:32px;">
                            This is to certify the above is true and correct statement. That the amount collected is
                            to deposited intact
                            to the Landbank of the Philippines (LANDBANK) bank accounts with account number
                            <b>CIAP - PCAB</b> (0052-1684-30), <b>BTr-CIAP-NGSI-DST</b> (3402-2866-00)m ,<b>BTr-CIAP-NGSI-
                            LRF</b> (3402-2866-19) and dully supported by attached proof of deposit. Details of collections can be generated from our online
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