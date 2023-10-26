<style>
    table,
    th {
        border: 1px black solid;
        border-width: 1px 0 1px 1px;
        border-collapse: collapse;  
    }

    th:last-child {
        border-right: 1px black solid;
    }
</style>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-sm-flex align-items-center mb-4">
                    <h4 class="card-title mb-sm-0">Deposite</h4>
                </div>
            </div>

            <div class="table-responsive border">
                <table id="myTable" class="table table-striped text-center" width="100%">
                    <thead>
                        <tr>
                            <th colspan="2">Electronic Acknowledgement Receipt</th>
                            <th rowspan="3">Responsibility Center Code</th>
                            <th rowspan="3">Payor</th>
                            <th rowspan="3">Particulars</th>
                            <th rowspan="3">PREXC/PAP</th>
                            <th colspan="3">Amount</th>
                        </tr>
                        <tr>
                            <th rowspan="2">Date</th>
                            <th rowspan="2">Number</th>
                            <th rowspan="2">Total per AR</th>
                            <th colspan="3">Breakdown Collection</th>
                        </tr>
                        <tr>
                            <th>Taxes</th>
                            <th colspan="1">Fees</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        foreach ($data as $row) {
                            echo "<tr>";
                            echo "<td>" . $row["date_time"] . "</td>";
                            echo "<td>" . $row["ar_number"] . "</td>";
                            echo "<td>" . $row["agency_name"] . "</td>";
                            echo "<td>" . $row["name_of_payor"] . "</td>";
                            echo "<td>" . $row["particulars"] . "</td>";
                            echo "<td>&#8369; " . $row["amount"] . "</td>";
                            echo "<td>&#8369; " . $row["service_charge"] . "</td>";
                            echo "<td>&#8369; " . $row["tax"] . "</td>";
                            echo "<td>&#8369; " . $row["total_amount"] . "</td>";
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
            dom: 'rt<"row"<"col-sm-4"l><"col-sm-4"i><"col-sm-4"p>>'
        });
    });
</script>