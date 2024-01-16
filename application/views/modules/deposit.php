<style>
    table,
    th {
        border: 1px black solid !important;
        border-width: 1px 0 1px 1px;
        border-collapse: collapse;
    }

    .ecollection-table-container tr th:last-child {
        margin-right: 1px black solid;
    }

    th:last-child {
        border-right: 1px black solid;
    }
</style>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body p-1 pt-3">
                <div class="d-sm-flex align-items-center my-4 pl-2">
                    <!-- <h4 class="card-title mb-sm-0">Deposit</h4> -->
                    <button type="button"
                        class="btn-sm btn-outline-dark mr-3 mb-2 rounded download-btn-modal">Deposit</button>
                </div>


                <table id="myTable" class="table table-striped text-center ecollection-table-container" width="100%">
                    <thead class="w-100">
                        <tr>
                            <th colspan="2">Undeposited Collection (per last Report)</th>
                            <th colspan="3">Collections</th>
                            <th colspan="4">Deposit / Fund Transfer</th>
                            <th rowspan="2">Undeposited Collection (this Report)</th>
                        </tr>
                        <tr>
                            <th rowspan="2">Date</th>
                            <th rowspan="2">Amount</th>
                            <th rowspan="2">Date</th>
                            <th rowspan="2">Total No. of Transaction</th>
                            <th rowspan="2">Total Amt. of Collection</th>
                            <th rowspan="3">Date</th>
                            <th rowspan="3">Ref. No.</th>
                            <th rowspan="3">Amount</th>
                            <th rowspan="3">Amount</th>
                        </tr>
                    </thead>
                    <tbody class="w-100">

                        <?php
                        // usort($data, function ($a, $b) {
                        //     return strtotime($a['date_time']) < strtotime($b['date_time']);
                        // });
                        
                        foreach ($data as $row) {
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
                            echo "</tr>";
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>


    </div>
</div>
</div>
</div>
<script>
    $(document).ready(function () {

        var table = $('#myTable').DataTable({
            dom: 'rt<"row"<"col-sm-4"l><"col-sm-4"i><"col-sm-4"p>>',
            ordering: false,
            scrollX: true,
        });

        $('.search-btn').on('click', function () {
            table.draw();
        });
    });

    document.querySelector(".download-btn-modal").addEventListener("click", () => {
        console.log("click")
        let doc = new jspdf.jsPDF({
            orientation: 'p', unit: 'px'
        })


        let printContent = `
            <html><title>Receipt</title>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
                integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
                <\/script>
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
                integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"><\/link>
                <style>
                    tbody tr td:last-child {
                        text-align: right !important;
                    }
                    table tbody tr:last-child,
                    table tbody th {
                        border-bottom: 0;
                    }
                    table tr:nth-child(even) {
                        background-color: #FFF !important;
                    }
                    body {
                        display:flex;
                        justify-content:center;
                    }


                </style></head><body>
                [content]
                </html>
                `;
        const content = `
<div class="mx-auto my-5" style="width: 55rem; ">
    <div class="text-center my-3">[Letterhead of the Intermediary]</div>
    <div class="">
        <div class="text-center text-uppercase py-3">
            <u>Certification of Deposit</u>
        </div>
        <div class="text-center m-3">
            <b>Summary</b>
        </div>
        <table class="border-0">
            <tbody>
                <tr>
                    <td colspan="3">Undeposited Collections per last Report,</td>
                    <td>P xxx.xx</td>
                </tr>
                <tr>
                    <td colspan="3">(date: mmm/dd/yyyy)</td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="3">Collections, mmm/dd/yyy</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="pl-5 pb-3">Total Number of Transaction</td>
                    <td colspan="2" class="text-right" style="padding-right:3rem;">xxxx</td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2" class="pl-5">Total Amount of Collection</td>
                    <td class="text-right" style="padding-right:3rem;">xxx.xx</td>
                    <td>xxx.xx</td>
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
                            <span class="position-relative">xxx.xx</span>
                        </div>
                    </td>
                    <td class="text-right" style="padding-right:3rem;"></td>
                    <td>xxx.xx</td>
                </tr>
                <tr>
                    <td colspan="2" class="pl-5 pb-3">Total Amount of Collection</td>
                    <td class="text-right" style="padding-right:3rem;">xxx.xx</td>
                    <td>(xxx.xx)</td>
                </tr>
                <tr>
                    <td colspan="3">Undeposited Collections, this Report</td>
                    <td>P xxx.xx</td>
                </tr>
            </tbody>
        </table>
        <div style=" text-align: justify;text-justify: inter-word;margin-top: 2rem; font-size: .9rem">
            This is to certify the above is true and correct statement. That the amount collected is to deposited intact
            to the [bank name] bank account of the [agency name] with amount number [account number], and duly supported
            by attached proof of deposit. Details of collections can be generated from our online reporting facility or
            in the attached electronic file of the List if Daily Collection.
        </div>

        <div class="w-100 text-right pr-5 mt-3">
            <p class="m-0">Name and Signature</p>
            <p class="m-0">Official Designation&nbsp;</p>
        </div>
    </div>
</div>`

        doc.html(printContent.replace("[content]", content), {
            html2canvas: {
                scale: .3
            },
            callback: async function (doc) {
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