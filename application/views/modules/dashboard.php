<div class="container-scroller">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                        <h4 class="card-title mb-sm-0">Products Inventory</h4>
                    </div>
                    <div class="table-responsive border  rounded p-1">
                        <table id="myTable" class="table  table-fluid table-striped" width="100%">
                            <thead>
                                <tr>
                                    <th class="font-weight-bold">Store ID</th>
                                    <th class="font-weight-bold">Name</th>
                                    <th class="font-weight-bold">Amount</th>
                                    <th class="font-weight-bold">Gateway</th>
                                    <th class="font-weight-bold">Created at</th>
                                    <th class="font-weight-bold">Paid at</th>
                                    <th class="font-weight-bold">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($dash_report as $row) {
                                    echo "<tr>";
                                    echo "<td>" . date_format(date_create($row['date_time']), "m/d/Y") . "</td>";
                                    echo "<td>" . str_pad($row['ar_number'], 10, "0", STR_PAD_LEFT) . "</td>";
                                    echo "<td>" . $row['reference_number'] . "</td>";
                                    echo "<td>" . $row['name_of_payor'] . "</td>";
                                    echo "<td class='text-right'>" . number_format((float) $row["total_amount"], 2, '.', '') . "</td>";
                                    echo "</tr>";
                                }
                                ;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card-title">
                    deposit table
                </div>
                <div class="card-body">
                    <table class="deposit-table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>AR Number</th>
                                <th>Reference No.</th>
                                <th>Name of Payor</th>
                                <th class="text-right pr-3">Total Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($dash_report as $key => $row) {
                                echo "<tr>";
                                echo "<td>" . date_format(date_create($row['date_time']), "m/d/Y") . "</td>";
                                echo "<td>" . str_pad($row['ar_number'], 10, "0", STR_PAD_LEFT) . "</td>";
                                echo "<td>" . $row['reference_number'] . "</td>";
                                echo "<td>" . $row['name_of_payor'] . "</td>";
                                echo "<td class='text-right'>" . number_format((float) $row["total_amount"], 2, '.', '') . "</td>";
                                echo "</tr>";
                            }
                            ;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-title">
                        Reports Statistics
                    </div>
                    <div class="card-body">
                        <div class="row income-expense-summary-chart mt-3">
                            <div class="col-md-12">
                                <div class="ct-chart" id="income-expense-summary-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(() => {
        const jsonData = JSON.parse('<?php echo json_encode($data) ?>')
        var data = {
            // A labels array that can contain any sort of values
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            // Our series array that contains series objects or in this case series data arrays
            series: [
                [505, 781, 480, 985, 410, 822, 388, 874, 350, 642, 320, 796],
                [700, 430, 725, 390, 686, 392, 757, 500, 820, 400, 962, 420]
            ]
        };

        var options = {
            height: 300,
            fullWidth: true,
            axisY: {
                high: 1000,
                low: 250,
                referenceValue: 1000,
                type: Chartist.FixedScaleAxis,
                ticks: [250, 500, 750, 1000]
            },
            showArea: true,
            showPoint: false
        }
    
    var responsiveOptions = [
            ['screen and (max-width: 480px)', {
                height: 150,
                axisX: {
                    labelInterpolationFnc: function (value) {
                        return value;
                    }
                }
            }]
        ];
        // Create a new line chart object where as first parameter we pass in a selector
        // that is resolving to our chart container element. The Second parameter
        // is the actual data object.
        new Chartist.Line('#income-expense-summary-chart', data, options, responsiveOptions);
    })
    console.log(jsonData)
</script>

<style>
    .dashboard-container table {
        width: 100%
    }

    .dashboard-container table thead th {
        padding: .2rem;
        background-color: #bfe7c1;
        text-align: center;
    }

    .dashboard-container table tr td:first-child {
        text-align: center;
    }

    .dashboard-container table tr td:last-child {
        padding-right: 1rem;
    }

    .dashboard-container table td {
        padding-left: 1rem;
        width: 1rem;
        white-space: nowrap;
        padding-bottom: .5rem;
        align-items: center;
    }

    .dashboard-container table tr:nth-child(odd) {
        background-color: #e5f4e6;
    }
</style>