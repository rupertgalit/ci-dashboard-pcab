<style>
    table,
    th {
        border: 1px black solid;
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
                    <h4 class="card-title mb-sm-0">Deposite</h4>
                </div>

                <div class="table-responsive w-100 overflow-hidden">
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

                    </div>

                    <table id="myTable" class="table table-striped text-center ecollection-table-container"
                        width="100%">
                        <thead class="w-100">
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
                        <tbody class="w-100">

                            <?php
                            usort($data, function ($a, $b) {
                                return strtotime($a['date_time']) < strtotime($b['date_time']);
                            });

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
</script>