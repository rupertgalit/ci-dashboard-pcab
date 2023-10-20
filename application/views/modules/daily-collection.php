<style>
    .modal-dialog {
        transition: width 20s ease-in-out;
    }

    div#DailyCollectionForm div.data-table {
        font-size: 13px;
    }

    div#DailyCollectionForm div.custom-font-size {
        font-size: 12px;
    }
</style>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-sm-flex align-items-center mb-4">
                    <h4 class="card-title mb-sm-0">Daily Collection</h4>
                </div>
            </div>

            <div>
            </div>

            <div class="d-flex justify-content-end mb-3">

                <div class="col-md-2 ">
                    <button class="btn-lg btn-outline-dark rounded border-0" data-toggle="modal"
                        data-target="#Daily_CollectionModal">Daily Collection</button>
                    <div class="modal fade" id="Daily_CollectionModal" tabindex="-1" role="dialog"
                        aria-labelledby="Daily_CollectionModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm" role="document">
                            <div id="DailyCollectModal" class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="Daily_CollectionModalLabel">Daily Collection</h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body bg-white pb-3">
                                    <div class="row mb-2">
                                        <div class="col-12 d-flex flex-row flex-wrap">
                                            <label for="modal_selected_date"
                                                class="mr-2 d-flex align-items-center">Select Date:</label>
                                            <input type="date" id="modal_selected_date" class="form-control"
                                                style="width: 16rem;">
                                            <div id="validationMessage"></div>

                                        </div>
                                    </div>

                                    <div id="modalDataTableContainer" class="overflow-auto"></div>
                                </div>
                                <div class="modal-footer bg-white border-top-0">
                                    <button type="button"
                                        class="btn-sm btn-outline-dark mr-3 mb-2 rounded search-btn-modal">Preview</button>
                                    <button type="button"
                                        class="btn-sm btn-outline-dark mr-3 mb-2 rounded download-btn-modal">Download</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <button class="btn-lg btn-outline-dark rounded border-0" data-toggle="modal"
                        data-target="#exportModal" disabled>E-Collection & Deposite</button>
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
                                <div class="modal-body">
                                    <!-- Add your export options here, if needed -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn-sm btn-outline-dark mr-3 mb-2 rounded border-0"
                                        data-dismiss="modal">Close</button>
                                    <button type="button" class="btn-sm btn-outline-dark mr-3 mb-2 rounded border-0"
                                        onclick="fnExcelReport()">Export Data</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive border">
                <div class="d-grid gap-2 d-md-block">

                    <div class="table-responsive border">
                        <div class="row mb-1 ml-auto mt-2 ">
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
                                <button class="btn-outline-dark  border-0 rounded h-100 w-50 search-btn">Select</button>
                            </div>
                        </div>
                    </div>
                    <table id="myTable" class="table table-striped text-center" width="100%">
                        <thead>
                            <tr>
                                <th class="font-weight-bold">Date and Time</th>
                                <th class="font-weight-bold">AR Number</th>
                                <th class="font-weight-bold">Name of Payor</th>
                                <th class="font-weight-bold">Particulars</th>
                                <th class="font-weight-bold">Reference Number</th>
                                <th class="font-weight-bold">Amount</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            foreach ($data as $row) {
                                echo "<tr>";
                                echo "<td>" . $row["date_time"] . "</td>";
                                echo "<td>" . $row["ar_number"] . "</td>";
                                echo "<td>" . $row["name_of_payor"] . "</td>";
                                echo "<td>" . $row["particulars"] . "</td>";
                                echo "<td>" . $row["reference_number"] . "</td>";
                                echo "<td>" . $row["amount"] . "</td>";
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
<script>
    $(document).ready(function () {

        var table = $('#myTable').DataTable({
            dom: '<"pull-left"b><"pull-right"f>rt<"row"<"col-sm-4"l><"col-sm-4"i><"col-sm-4"p>>'
        });

        $('.search-btn').on('click', function () {
            table.draw();
        });

        // Date filter
        $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
            var startDate = $('#start_date').val();
            var endDate = $('#end_date').val();
            var currentDate = data[0];

            if ((startDate === '' && endDate === '') ||
                (startDate === '' && currentDate <= endDate) ||
                (startDate <= currentDate && endDate === '') ||
                (startDate <= currentDate && currentDate <= endDate)) {
                return true;
            }

            return false;
        });

        // Modal date filter
        $('.search-btn-modal').on('click', function () {
            var modalStartDate = $('#modal_selected_date').val();

            if (!modalStartDate) {

                $('#validationMessage').html('<span style="font-size:.8rem; color: red; margin-left:1.5rem;" role="alert">Please select a date.</span>');
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
            modalTableHead.innerHTML = '<tr><th>Date and Time</th><th>AR Number</th><th>Name of Payor</th><th>Particulars</th><th>Reference Number</th><th>Amount</th></tr>';

            var modalTableBody = document.createElement('tbody');

            // Clone the original table
            var originalTable = document.getElementById('myTable');

            // Find rows that match the selected date
            var matchingRows = Array.from(originalTable.querySelectorAll('tbody tr')).filter(function (row) {
                var rowDate = row.cells[0].textContent; // Assuming the date is in the first column
                return rowDate === modalStartDate;
            });

            // Append the matching rows to the modal table body
            matchingRows.forEach(function (row) {
                modalTableBody.appendChild(row.cloneNode(true));
            });

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
                console.log("yes")
                return;
            }
            // Clear existing content in the modal
            $('#validationMessage').empty();

            printDailyReport(modalStartDate);
        })

        async function printDailyReport(date) {

            const modalStartDate = $('#modal_selected_date').val();
            const data = JSON.parse(`<?php echo json_encode($data) ?>`)

            const filteredData = data.filter(object => object["date_time"] === modalStartDate);

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
    <div class="text-uppercase">[Intermediary Name]</div>
    <b class="text-uppercase">List of daily collection</b>
    <div>For [Agency Name]</div>
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
        <div class="border border-dark col-1 d-flex align-items-center justify-content-around border-right-0">
            Date and Time
        </div>
        <div class="border border-dark col-1 d-flex align-items-center justify-content-around border-right-0">
            AR Number
        </div>
        <div class="border border-dark col d-flex align-items-center justify-content-around border-right-0">
            Name of payor
        </div>
        <div class="border border-dark col d-flex align-items-center justify-content-around border-right-0">
            Particulars
        </div>
        <div
            class="border border-dark col-2 d-flex align-items-center justify-content-around border-right-0 text-center">
            Reference Number
        </div>
        <div class="border border-dark col-1 d-flex align-items-center justify-content-around">
            Amount
        </div>
    </div>
    <div class="t-body p-0 m-0">
    `

                    //             ${i % 2 == 1 ? '<div class="row" style="width: 52vw; border-bottom:1px black solid; border-bottom-style: dashed; margin: 6rem 0 6.18rem 0"></div>' : ''}
                    // ${i % 2 == 1 && i != 39 ? "margin-bottom:12rem !important;" : ""}
                    rows.forEach(row => {
                        totalAmount += parseFloat(row?.total_amount??0)
                        content += `
            <div class="row row-data">
                <div class="border border-dark border-right-0 border-top-0 col-1">${row?.date_time ?? "&nbsp;"}</div>
                <div class="border border-dark border-right-0 border-top-0 col-1">${row?.ar_number ?? ""}</div>
                <div class="border border-dark border-right-0 border-top-0 col">${row?.name_of_payor ?? ""}</div>
                <div class="border border-dark border-right-0 border-top-0 col">${row?.particulars ?? ""}</div>
                <div class="border border-dark border-right-0 border-top-0 col-2">${row?.reference_number ?? ""}</div>
                <div class="border border-dark border-top-0 col-1 text-right">${row?.total_amount ?? ""}</div>
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
<div class="row py-4">
    <div class="col-8">
    </div>
    <div class="col flex flex-column">
        <div class="row">
            Page No. <div
                class="list-inline-item font-weight-light border-dark border-bottom custom-font-size px-3">${i + 1}
            </div> of <div
                class="list-inline-item font-weight-light border-dark border-bottom custom-font-size px-3">[total-page]
            </div>
        </div>
        <div class="row">
            Date and time generated: <div class="list-inline-item font-weight-light custom-font-size px-3 pt-1">
            </div>
        </div>
    </div>
</div>
</div></div>`
                    i++
                } catch (e) { console.log(e) }
            }

            // document.write(printContent.replace("[content]", content).replaceAll("[total-page]", i))

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

            doc.html(printContent.replace("[content]", content).replaceAll("[total-page]", i).replaceAll("[total-amount]", parseFloat(totalAmount).toFixed(2)), {
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
        }


    });

</script>