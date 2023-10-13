
<?php $data = [["date_time" => "2023-02-06"]]; ?>

<div id="DailyCollectionForm" class="bg-whites mx-auto mt-5" style="width: 70rem">
    <div class="border border-dark p-2 px-4">
        <div class="text-center">
            <div class="text-uppercase">[Intermediary Name]</div>
            <b class="text-uppercase">List of daily collection</b>
            <div>For [Agency Name]</div>
            <div class="row d-flex align-items-center">
                <div class="col-12">
                    <div class="list-inline-item ">Date:</div>
                    <div class="list-inline-item font-weight-light border-dark border-bottom custom-font-size px-3"><?php echo $data[0]["date_time"] ?></div>
                </div>
            </div>
        </div>
        <div class="row text-right pb-2">
            <div class="col">Report No. <div class="list-inline-item font-weight-light border-dark border-bottom custom-font-size px-3">2023100001</div>
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
                <?php
                for ($i = 0; $i < 10; $i++) {
                    echo "<div class='row'>";
                    echo "<div class='border border-dark border-right-0 border-top-0 col-1'>123</div>";
                    echo "<div class='border border-dark border-right-0 border-top-0 col-1'>-</div>";
                    echo "<div class='border border-dark border-right-0 border-top-0 col'>-</div>";
                    echo "<div class='border border-dark border-right-0 border-top-0 col'>-</div>";
                    echo "<div class='border border-dark border-right-0 border-top-0 col-2'>-</div>";
                    echo "<div class='border border-dark border-top-0 col-1 text-right'>123</div>";
                    echo "</div>";
                }
                ;


                ?>
                <div class="row">
                    <div class="border border-dark border-right-0 border-top-0 col-1">123</div>
                    <div class="border border-dark border-right-0 border-top-0 col-1">-</div>
                    <div class="border border-dark border-right-0 border-top-0 col">-</div>
                    <div class="border border-dark border-right-0 border-top-0 col">-</div>
                    <div class="border border-dark border-right-0 border-top-0 col-2">-</div>
                    <div class="border border-dark border-top-0 col-1 text-right">123</div>
                </div>
            </div>

            <div class="row t-total-row">
                <div class="border border-dark border-right-0 border-top-0 col-1"></div>
                <div class="border border-dark border-right-0 border-top-0 col-1"></div>
                <div class="border border-dark border-right-0 border-top-0 col text-center">Total Amount</div>
                <div class="border border-dark border-right-0 border-top-0 col"></div>
                <div class="border border-dark border-right-0 border-top-0 col-2"></div>
                <div class="border border-dark border-top-0 col-1 text-right">&#8369; &nbsp; xxx.xx</div>
            </div>
        </div>
        <div class="row py-4">
            <div class="col-8">
            </div>
            <div class="col flex flex-column">
                <div class="row">
                    Page No. <div class="list-inline-item font-weight-light border-dark border-bottom custom-font-size px-3">1</div> of <div
                            class="list-inline-item font-weight-light border-dark border-bottom custom-font-size px-3">1</div>
                    </div>
                    <div class="row">
                        Date and time generated: <div class="list-inline-item font-weight-light custom-font-size px-3 pt-1"><?php echo $data[0]["date_time"] ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    div#DailyCollectionForm div.data-table {
        font-size: 13px;
    }

    div#DailyCollectionForm div.custom-font-size {
        font-size: 12px;
    }

    /* div.data-table .t-head div {
                        padding: 0 1rem 0 1rem;
                        border: 1px black solid;
                        text-align: center;
                    } */
</style>