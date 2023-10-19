<div class="row">
    <div class="col-md-12 grid-margin stretch-card" id="toPrint">
        <div class="card">
            <div class="card-body">
                <div class="d-sm-flex align-items-center mb-4">
                    <h4 class="card-title mb-sm-0">Acknowledge Reciept</h4>
                </div>
            </div>

            <div class="table-responsive border">
                <div class="row mb-1 ml-auto ">
                    <div class="col-md-2">
                        <label for="start_date">Start Date:</label>
                    </div>
                    <div class="col-md-2">
                        <label for="end_date">End Date:</label>
                    </div>
                </div>
                <div class="row mb-3 ml-auto">
                    <div class="col-md-2">
                        <input type="date" id="start_date" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <input type="date" id="end_date" class="form-control">
                    </div>
                    <div class="col-md-2 ">
                        <label>&nbsp;</label>
                        <button class="btn-outline-dark border-0 btn-sm h-100 w-50 search-btn">Select</button>
                    </div>
                </div>

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
                            <th class="font-weight-bold">Amount</th>
                            <th class="font-weight-bold">Service Charge</th>
                            <th class="font-weight-bold">Tax</th>
                            <th class="font-weight-bold">Total Amount</th>
                            <th class="font-weight-bold">Reference Number</th>
                            <th class="font-weight-bold">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Assuming $data is your array of data
                        foreach ($data as $row) {
                            $date = date_create($row['date_time']);
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row["ar_number"] . "</td>";
                            echo "<td>" . $row["date_time"] . "</td>";
                            echo "<td>" . $row["agency_name"] . "</td>";
                            echo "<td>" . $row["name_of_payor"] . "</td>";
                            echo "<td>" . $row["particulars"] . "</td>";
                            echo "<td>&#8369; " . $row["amount"] . "</td>";
                            echo "<td>&#8369; " . $row["service_charge"] . "</td>";
                            echo "<td>&#8369; " . $row["tax"] . "</td>";
                            echo "<td>&#8369; " . $row["total_amount"] . "</td>";
                            echo "<td>" . $row["reference_number"] . "</td>";
                            echo "<td><button type='button' class='btn-sm btn-outline-info btn-print-receipt' data-receipt-id='" . $row['id'] . "'  onclick='printRow(" . $row['id'] . ")'>Download</button></td>";
                            echo "</tr>";
                        }
                        ?>

                    </tbody>

                </table>
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
            dom: '<"pull-left"b><"pull-right"f>rt<"row"<"col-sm-4"l><"col-sm-4"i><"col-sm-4"p>>'
        });

        $('.search-btn').on('click', function () {
            table.draw();
        });
    });

    const _jsonData = JSON.parse('<?php echo json_encode($data) ?>')

    async function printRow(id) {
        const rowData = _jsonData.find(obj => obj.id == id)
        let doc = new jspdf.jsPDF({
            orientation: 'p', unit: 'px'
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


            //             ${i % 2 == 1 ? '<div class="row" style="width: 52vw; border-bottom:1px black solid; border-bottom-style: dashed; margin: 6rem 0 6.18rem 0"></div>' : ''}
            // ${i % 2 == 1 && i != 39 ? "margin-bottom:12rem !important;" : ""}

            content += `
                <div class="mx-auto my-5" style="width: 50rem; ">
                    <div class="text-center my-3">Letterhead of the Intermediary</div>
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
                <div class='row pt-4 pb-3'>
                <div class="col">
                `;

            for (const key in rowData) {
                if (["id", "ar_number", "date_time"].includes(key)) continue

                content += `
                        <div class="row d-flex">
                            <div class="col text-capitalize">${key.split("_").join(" ")}<div class="float-right">:</div>
                            </div>
                            <div class="col">
                                ${rowData[key]}
                            </div>
                    </div>
                `;

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
        } catch (e) { console.log(e) }
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
    }


    function applyDateFilter() {
        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();

        console.log(start_date, end_date)
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

</script>