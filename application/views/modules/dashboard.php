<?php $dash_report = array_slice($data, 0, 5) ?>
<div class="dashboard-container d-flex flex-direction-row">
    <div class="card w-100 p-3 pb-5">
        <div class="row d-flex flex-wrap">
            <div class="col-6">
                <div class="card">
                    <div class="card-title">
                        ack. report table
                        <a class=" btn-success btn-view-all-ack " href="acknowledgement-receipt" style="background: #555!important;">View All</a>
                    </div>

                    <div class="card-body">
                        <table class="ack-table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>AR Number</th>
                                    <th>Reference No.</th>
                                    <th>Name of Payor</th>
                                    <th class="text-right pr-3">(₱) Total Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($dash_report as $row) {
                                    echo "<tr>";
                                    echo "<td>" . date_format(date_create($row['date']), "m/d/Y") . "</td>";
                                    echo "<td>" . str_pad($row['reference_number'], 10, "0", STR_PAD_LEFT) . "</td>";
                                    echo "<td>" . str_pad($row['referenceNumber'], 10, "0", STR_PAD_LEFT) . "</td>";
                                    echo "<td>" . $row['name_of_payor'] . "</td>";
                                    echo "<td class='text-right'>" . number_format((float) $row["txn_amount"], 2, '.', '') . "</td>";
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
                    <a class=" btn-success btn-view-all" href="deposit"style="background: #555!important;" >View All</a>
                </div>
                <div class="card-body">
                    <table class="deposit-table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>AR Number</th>
                                <th>Reference No.</th>
                                <th>Name of Payor</th>
                                <th class="text-right pr-3">(₱) Total Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($dash_report as $key => $row) {
                                echo "<tr>";
                                echo "<td>" . date_format(date_create($row['date']), "m/d/Y") . "</td>";
                                echo "<td>" . str_pad($row['reference_number'], 10, "0", STR_PAD_LEFT) . "</td>";
                                echo "<td>" . str_pad($row['referenceNumber'], 10, "0", STR_PAD_LEFT) . "</td>";
                                echo "<td>" . $row['name_of_payor'] . "</td>";
                                echo "<td class='text-right'>" . number_format((float) $row["txn_amount"], 2, '.', '') . "</td>";
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
                    <div class="card-body pt-2">
                        <div class="row summary-chart-container mt-3">
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
        const data = {
            // A labels array that can contain any sort of values
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            // Our series array that contains series objects or in this case series data arrays
            series: [
                [200, 200, 200, 200, 200, 200, 200, 200, 200, 200, 200, 796],
                [700, 430, 725, 390, 686, 392, 757, 500, 820, 400, 962, 420]
            ]
        };
        var options = {
            height: 300,
            // width: 300,
            fullWidth: true,
            axisY: {
                high: 1000,
                low: 0,
                referenceValue: 1000,
                type: Chartist.AutoScaleAxis,
                ticks: [0, 250, 500, 750, 1000]
            },
            showArea: true,
            showPoint: false,
            chartPadding: 30,
        }

        const responsiveOptions = [
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
        // $(".row.summary-chart-container").addClass("p-0")
    })  
</script>

<style>
    .btn-view-all {
        position: absolute;
        border: 0;
        left: 8.5rem;
        font-size: 10px;
        color: #FFFFFF;
        padding: 4px 8px;
        width: 6rem;
        text-align: center;
        transition-duration: 1.4s;
        text-decoration: none;
        overflow: hidden;
        cursor: pointer;
        margin-top: 0rem;
    }
    .btn-view-all-ack {
        position: absolute;
        border: 0;
        left: 10rem;
        font-size: 10px;
        color: #FFFFFF;
        padding: 4px 8px;
        width: 6rem;
        text-align: center;
        transition-duration: 1.4s;
        text-decoration: none;
        overflow: hidden;
        cursor: pointer;
        margin-top: 0rem;
    }

    .dashboard-container .card-body {
        padding: auto -1.1rem !important;
    }

    @media screen and (max-width: 1201px) {
        .dashboard-container .col-6 {
            min-width: 100%;
        }
    }

    .card .card-title {
        color: #343a40;
        margin-bottom: -1.25rem;
        text-transform: capitalize;
        font-family: "Open Sans", sans-serif;
        font-weight: 600;
        font-size: 1.125rem;
    }
</style>