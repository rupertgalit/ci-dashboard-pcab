
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-sm-flex align-items-center mb-4">
                    <h4 class="card-title mb-sm-0">Transaction table</h4>
                    <a href="#" class="text-dark ml-auto mb-3 mb-sm-0"> View all Products</a>
</div>
    <div class="border  rounded p-1">
        <table id="myTable" class="table  table-fluid table-striped" width="100%">
            <thead class="text-left">
                <tr>
                    <th class="font-weight-bold">Transaction ID</th>
                    <th class="font-weight-bold">Reference No.</th>
                    <th class="font-weight-bold">Mobile No.</th>
                    <th class="font-weight-bold">Status</th>
                    <th class="font-weight-bold">PCAB Fee</th>
                    <th class="font-weight-bold">Legal Research Fund</th>
                    <th class="font-weight-bold">Documentary Stamp</th>
                    <th class="font-weight-bold">Total Amount</th>
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
    $(document).ready(async function () {

        const response = await fetch(window.location.origin + "https://pcab-demo.netglobalsolutions.net/get-data");
        console.log(response);
        const strData = await response.json()
        const callback = JSON.parse(strData.replace(/[\\]/g, "").replace(/\"\{/g, "{").replace(/\}\"/g, "}")).data
        const data = callback
            .map(data => {
                const { status,
                    referenceNumber,
                    trans_id,
                    legal_research_fund,
                    document_stamp_tax,
                    fees_pcab,
                    txn_amount, } = data;
                return {
                    status,
                    referenceNumber,
                    trans_id,
                    legal_research_fund,
                    document_stamp_tax,
                    fees_pcab,
                    txn_amount,
                }
            })
        console.log(callback);

        var table = $('#myTable').DataTable({
            dom: '<"pull-left"b><"pull-right"f>rt<"row"<"col-sm-4"l><"col-sm-4"i><"col-sm-4"p>>',
            scrollX: '300px',
            scrollCollapse: true,
            createdRow: function (row, data, dataIndex) {
                $(row).attr('amount');
            },
            columns: [
                {
                    "data": "referenceNumber"
                },
                {
                    "data": "reference_number"
                },
                {
                    "data": "mobile_number"
                },
                {
                    "data": "status"
                 },
                {
                    "data": "fees_pcab"
                },
                {
                    "data": "legal_research_fund"
                },
                {
                    "data": "document_stamp_tax"
                },
                {
                    "data": "txn_amount"
                }
            ],
            data


        });

    });
</script>