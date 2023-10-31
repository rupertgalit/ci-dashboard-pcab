<?php $dash_report = array_slice($data, 0, 5) ?>
<div class="container-scroller dashboard-container d-flex flex-direction-row">
    <div class="card w-100 p-3">

        <div class="row d-flex flex-wrap">
            <div class="col-6">
                <div class="card">
                    <div class="card-title">
                        ack. report table
                    </div>
                    <div class="card-body">
                        <table class="ack-table">
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
                                foreach ($dash_report as $row) {
                                    echo "<tr>";
                                    echo "<td>" . date_format(date_create($row['date_time']), "m/d/Y") . "</td>";
                                    echo "<td>" . str_pad($row['ar_number'], 10, "0", STR_PAD_LEFT)  . "</td>";
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
                    <div class="card-body"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .dashboard-container table {
        width: 100%
    }

    .dashboard-container table thead th {
        padding: .2rem;
        background-color: #DDE;
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
        background-color: #EEE;
    }
</style>