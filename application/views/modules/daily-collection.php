<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-sm-flex align-items-center mb-4">
                    <h4 class="card-title mb-sm-0">Daily Collection</h4>
                </div>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button onclick="fnExcelReport()" class="btn-lg btn-dark mr-3 mb-2 rounded border-0">Export</button>
            </div>
            <div>
            </div>
            <div class="table-responsive border">
                <div class="d-grid gap-2 d-md-block">

                    <div class="table-responsive border">
                        <div class="row mb-3 ml-auto">
                            <div class="col-md-2">
                                <label for="start_date">Start Date:</label>
                                <input type="date" id="start_date" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <label for="end_date">End Date:</label>
                                <input type="date" id="end_date" class="form-control">
                            </div>
                            <div class="col-md-2 ">
                                <label>&nbsp;</label>
                                <button class="btn-outline-info btn-lg mt-4 "
                                    onclick="applyDateFilter()">Select</button>
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
                            // Replace this section with PHP code to fetch and display data from your database
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
        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();
        $('#start_date, #end_date').on('change', function () {
            table.columns(2).search(start_date + ' to ' + end_date).draw();

        });
    });

    function fnExcelReport() {
        var tab_text = "<table border='2px'><tr bgcolor='#87AFC6'>";
        var textRange;
        var j = 0;
        var tab = document.getElementById('myTable'); // id of table

        for (j = 0; j < tab.rows.length; j++) {
            tab_text = tab_text + tab.rows[j].innerHTML + "</tr>";
        }

        tab_text = tab_text + "</table>";
        tab_text = tab_text.replace(/<A[^>]*>|<\/A>/g, ""); //remove if u want links in your table
        tab_text = tab_text.replace(/<img[^>]*>/gi, ""); // remove if u want images in your table
        tab_text = tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

        var blob = new Blob([tab_text], {
            type: 'application/vnd.ms-excel'
        });

        var link = document.createElement('a');
        link.href = window.URL.createObjectURL(blob);
        link.download = 'Daily_Collection.xls';
        link.click();
    }
    function applyDateFilter() {
        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();

        var table = $('#myTable').DataTable();
        table.columns(2).search(start_date + ' to ' + end_date).draw();
    }

</script>