<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-sm-flex align-items-center mb-4">
                    <h4 class="card-title mb-sm-0">Transaction table</h4>
                    <!-- <a href="#" class="text-dark ml-auto mb-3 mb-sm-0"> View all Products</a> -->
                </div>
                <div class="border  rounded p-1">
                    <table id="myTable" class="table  table-fluid table-striped" width="100%">
                        <thead class="text-left">
                            <tr>
                                <th class="font-weight-bold">Transaction ID</th>
                                <th class="font-weight-bold">Status</th>
                                <th class="font-weight-bold">reference No.</th>
                                <th class="font-weight-bold">Trace No.</th>
                                <th class="font-weight-bold">Amount</th>
                                <th class="font-weight-bold">App Name</th>
                                <th class="font-weight-bold">Paygate</th>
                                <th class="font-weight-bold">Type</th>
                                <th class="font-weight-bold">QR Method</th>
                                <th class="font-weight-bold">Date Created</th>
                                <th class="font-weight-bold">Time Created</th>
                                <th class="font-weight-bold">Date Modified</th>
                                <th class="font-weight-bold">Mbile Number</th>
                                <th class="font-weight-bold">City</th>
                                <th class="font-weight-bold">Transaction Amount</th>
                                <th class="font-weight-bold">document stamp tax</th>
                                <th class="font-weight-bold">fees pcab</th>
                                <th class="font-weight-bold">legal research fund</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(async function() {
        var table = $('#myTable').DataTable({
            dom: '<"pull-left"b><"pull-right"f>rt<"row"<"col-sm-4"l><"col-sm-4"i><"col-sm-4"p>>',
            scrollX: '300px',
            scrollCollapse: true,
            columns: [{
                    "data": "name"
                },
                {
                    "data": "position"
                },
                {
                    "data": "office"
                },
                {
                    "data": "extn"
                },
                {
                    "data": "start_date"
                },
                {
                    "data": "salary"
                }
            ],
            data: [
                {
                    name: 123,
                    position: 123,
                    office: 123,
                    extn: 123,
                    start_date: 123,
                    salary: 123,
                },
                {
                    name: 123,
                    position: 123,
                    office: 123,
                    extn: 123,
                    start_date: 123,
                    salary: 123,
                }
            ]
        });

        const response = await fetch(window.location.origin + "/get-transactions");
        const strData = await response.json()
        const callback = JSON.parse(strData.replace(/[\\]/g, "").replace(/\"\{/g, "{").replace(/\}\"/g, "}")).data
        console.log(callback)
    })
    // console.log(await fetch("http://localhost/pcab_dev/get-transactions"))
    // console.log(await fetch("http://pcab_dev.test/get-transactions"))
</script>