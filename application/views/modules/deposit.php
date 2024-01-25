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
                    <button class='btn-sm btn-outline-dark border-0 px-3 py-1 rounded ' type='button' data-toggle='modal' data-target='#editModal'>
                        Settle
                    </button>
                    <!-- <button style="margin-top: -20px;" type="button"
                        class="btn-sm btn-outline-dark border-0 mr-3 mb-2 rounded download-btn-modal">Deposit</button> -->
                </div>


                <table id="myTable" class="text-center ecollection-table-container" width="100%">
                    <thead class="w-100">
                        <tr>
                            <th colspan="2">Undeposited Collection (per last Report)</th>
                            <th colspan="3">Collections</th>
                            <th colspan="4">Deposit / Fund Transfer</th>
                            <th rowspan="2">Undeposited Collection (this Report)</th>
                            <th rowspan="2" class="text-center">Action</th>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Total No. of Transaction</th>
                            <th>Total Amt. of Collection</th>
                            <th>Date</th>
                            <th>Ref. No.</th>
                            <th>Amount</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody class="w-100">

                        <?php
                        usort($data, function ($a, $b) {
                            return strtotime($a['date_time']) < strtotime($b['date_time']);
                        });

                        foreach ($data as $key => $row) {
                            echo "<tr>";
                            echo "<td>" . $row["date_time"] . "</td>";
                            echo "<td>" . $row["ar_number"] . "</td>";
                            echo "<td>" . $row["agency_name"] . "</td>";
                            echo "<td>" . $row["name_of_payor"] . "</td>";
                            echo "<td>" . $row["particulars"] . "</td>";
                            echo "<td>&#8369; " . number_format((float) $row["amount"], 2, '.', '') . "</td>";
                            echo "<td>&#8369; " . number_format((float) $row["service_charge"], 2, '.', '') . "</td>";
                            echo "<td>&#8369; " . number_format((float) $row["tax"], 2, '.', '') . "</td>";
                            echo "<td>&#8369; " . number_format((float) $row["total_amount"], 2, '.', '') . "</td>";
                            echo "<td>&#8369; " . number_format((float) $row["total_amount"], 2, '.', '') . "</td>";
                            echo "<td><button class='btn-sm btn-outline-dark border-0 px-3 py-1 rounded download-btn-modal' onclick='downloadDeposit()'>Download</button></td>";
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
            $(document).ready(function() {

                var table = $('#myTable').DataTable({
                    dom: '<"pull-left"b><"pull-right"f>rt<"row"<"col-sm-4"l><"col-sm-4"i><"col-sm-4"p>>',
                });
            });

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
                                    <td colspan="3">Undeposited Collections per last Report,<br>(date: ${data.last_deposit_date})</td>
                                    <td class="text-right" style="vertical-align:top;">P <div class="w-100 d-inline-block text-right">${data.last_undeposited_amount.toFixed(2)}</div></td>
                                </tr>
                                <tr>
                                    <td colspan="3">Collections, ${data.collections_date}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="pl-5 pb-3">Total Number of Transaction</td>
                                    <td colspan="2" class="text-right" style="padding-right:3rem;">${data.number_of_transaction}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="pl-5">Total Amount of Collection</td>
                                    <td class="text-right" style="padding-right:3rem;">P <div class="w-100 d-inline-block text-right">${data.total_collected.toFixed(2)}</div></td>
                                    <td class="text-right">${data.total_collected.toFixed(2)}</td>
                                </tr>
                                <tr class="p-0">
                                    <td colspan="2" style="padding-left:4rem;">CIAP-PCAB</td>
                                    <td class="text-right" style="padding-right:3rem;">(${data.fees.pcab.toFixed(2)})</td>
                                    <td class="text-right"></td>
                                </tr>
                                <tr class="p-0">
                                    <td colspan="2" style="padding-left:4rem;">DST</td>
                                    <td class="text-right" style="padding-right:3rem;">(${data.fees.dst.toFixed(2)})</td>
                                    <td class="text-right"></td>
                                </tr>
                                <tr class="p-0">
                                    <td colspan="2" style="padding-left:4rem;">LRF</td>
                                    <td class="text-right" style="padding-right:3rem;">(${data.fees.lrf.toFixed(2)})</td>
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
                                                    style="width:5rem;display:inline-block">${data.deposit_date}</label>
                                            </span>
                                            <span class="position-relative"><label class="text-center m-0"
                                                    style="width:5rem;display:inline-block;">P <div class="w-100 d-inline-block text-right">${data.deposited_amount.toFixed(2)}</div></label></span>
                                        </div>
                                    </td>
                                    <td class="text-left" style="padding-right:3rem;"></td>
                                    <td class="text-right">(${data.deposited_amount.toFixed(2)})</td>
                                </tr>
                                <tr style="vertical-align: top;">
                                    <td colspan="2" class="pl-5 pb-3">Reference No.:  ${data.ref_no}</td>
                                    <td class="text-right" style="padding-right:3rem;"></td>
                                    <td class="text-right"></td>
                                </tr>
                                <tr>
                                    <td colspan="3">Undeposited Collections, this Report</td>
                                    <td class="text-right">P <div class="w-100 d-inline-block text-right">${((data.last_undeposited_amount + data.total_collected) - data.deposited_amount).toFixed(2)}</div></td>
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

            function downloadDeposit() {
                let doc = new jspdf.jsPDF({
                    orientation: 'p',
                    unit: 'px'
                })

                const now = new Date()

                const months = Array.from({
                    length: 12
                }, (item, i) => {
                    return new Date(0, i).toLocaleString('en-US', {
                        month: 'short'
                    })
                });


                const data = {
                    last_undeposited_amount: 0.00,
                    last_deposit_date: `${months[now.getMonth()]} /${(now.getDate()-1).toString().padStart(2, "0")}/${now.getFullYear()}`,
                    collections_date: `${months[now.getMonth()]} /${(now.getDate()).toString().padStart(2, "0")}/${now.getFullYear()}`,
                    number_of_transaction: 56,
                    total_collected: 1000.00,
                    deposit_date: now.toLocaleDateString().padStart(10, "0"),
                    ref_no: 10023323399,
                    deposited_amount: 1000.00,
                    fees: {
                        pcab: 958.00,
                        dst: 30.00,
                        lrf: 12.00
                    }
                }
                console.log(data, months)

                doc.html(`<div id="PDFContent" class="mx-auto d-flex flex-column border-dark" style="width:55.8rem;padding-top:6rem;/*border:1px black solid;*/">${content(data)}</div>`, {
                    html2canvas: {
                        scale: .5
                    },
                    async callback(pdf) {
                        const date = new Date();
                        document.querySelector(".card").innerHTML = content(data);
                        // await pdf.save(`receipt-${date.toLocaleDateString()}.pdf`);
                    },
                })
            }

            document.querySelector(".download-btn-modal").addEventListener("click", () => {
                console.log("click")
                let doc = new jspdf.jsPDF({
                    orientation: 'p',
                    unit: 'px'
                })

                let content = `
        <div class="mx-auto my-5 d-flex justify-content-center" style="width: 67.5rem; ">
            <div class="w-75">
            <div class="container mt-3 justify-content-center mb-4">
                                <div class="row justify-content-center">
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
            <div class="">
                <div class="text-center text-uppercase py-3">
                    <u>Certification &nbsp;&nbsp; of Deposit</u>
                </div>
                <div class="text-center m-3">
                    <b>Summary</b>
                </div>
                <table class="border-0">
                <tbody>
                    <tr>
                        <td colspan="3">Undeposited Collections per last Report,</td>
                        <td class="text-right"> ${''}</td>
                    </tr>
                    <tr>
                        <td colspan="3">(date: ${'mmm/dd/yyyy'})</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="3">Collections, ${'mmm/dd/yyyy'}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="pl-5 pb-3">Total Number of Transaction</td>
                        <td colspan="2" class="text-right" style="padding-right:3rem;">${''}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="pl-5">Total Amount of Collection</td>
                        <td class="text-right" style="padding-right:3rem;">${''}</td>
                        <td class="text-right">${''}</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="pb-3">Deposit / Fund Transfers</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="pl-5">
                            <div class="w-100 d-flex justify-content-between">
                                <span>
                                    Date: <label class="border-bottom border-dark text-center m-0"
                                        style="width:5rem;display:inline-block"></label>
                                </span>
                                <span class="position-relative">${''}</span>
                            </div>
                        </td>
                        <td class="text-right" style="padding-right:3rem;"></td>
                        <td class="text-right">${''}</td>
                    </tr>
                    <tr style="background-color: #FFF!important;vertical-align: top;">
                        <td colspan="2" class="pl-5 pb-3">Total Amount of Collection</td>
                        <td class="text-right" style="padding-right:3rem;">${''}</td>
                        <td class="text-right">${''}</td>
                    </tr>
                    <tr>
                        <td colspan="3">Undeposited Collections, this Report</td>
                        <td class="text-right"> ${''}</td>
                    </tr>
                    </tbody>
                </table>
                <div style=" text-align: justify;text-justify: inter-word;margin-top: 2rem; font-size: .9rem">
                    This is to certify the above is true and correct statement. That the amount collected is to deposited intact
                    to the ${'[bank name]'} bank account of the ${"[agency name]"} with amount number ${'[account number]'}, and duly supported
                    by attached proof of deposit. Details of collections can be generated from our online reporting facility or
                    in the attached electronic file of the List if Daily Collection.
                </div>

                <div class="w-100 mt-5">
                            <div class="container">
                                <div class="row mt-4">
                                    <div class="col pl-5">
                                        <img style="margin-left:25%; background-position:center; margin-bottom:-15px;z-index:0;position:relative;transform:scale(1.1)"
                                            width="35%" height="35%" src="assets/images/ma'am_je.png" alt="logo"
                                            class="logo-dark" />
                                        <p style="position:relative;left:-11px;margin:0;">Prepared By: </p>
                                        <p
                                            style="margin-top: -25px;margin-left: 87px;font-size: 18px; font-family: Arial, Helvetica, sans-serif;z-index:1;position:relative;">
                                            Jeremie Soliveres </p>
                                        <p
                                            style=" margin-top: -24px; margin-left: 106px; font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
                                            Accounting Specialist</p>
                                    </div>
                                    <div class="col pl-5">
                                        <img style="margin-left:13rem; margin-bottom:-15px;" width="35%"
                                            height="35%" src="assets/images/sir_peter.png" alt="logo"
                                            class="logo-dark" />
                                        <p style="position:relative;left:5.7rem;margin:0;">Approved By: </p>
                                        <p
                                            style="margin-top: -25px;margin-left: 12rem;font-size: 18px; font-family: Arial, Helvetica, sans-serif;">
                                            Peter Lingatong</p>
                                        <p
                                            style=" margin-top: -24px; margin-left: 13rem; font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
                                            Chairman & CEO</p>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
            </div>
        </div>
        <div style="display:block;width:100%;border-bottom:1px #666 dashed;"></div>`

                doc.html(content, {
                    html2canvas: {
                        scale: .4,
                    },
                    callback: async function(doc) {
                        // doc.addPage(
                        //     { orientation: 'p', unit: 'px' }
                        // )
                        // await doc.save(`daily-collection-`)
                        await doc.output("dataurlnewwindow", "receipt-123.pdf");
                    },
                    x: 7,
                    y: 7,
                })
            })
        </script>