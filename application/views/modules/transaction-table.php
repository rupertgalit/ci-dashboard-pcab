<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-sm-flex align-items-center mb-4">
                    <div class="container">
                        <!-- dropdown button -->
                        
                       
                    </div>
                    <a href="#" class="text-dark ml-auto mb-3 mb-sm-0"> View all Products</a>
                </div>
                <div class="border  rounded p-1">
                    <table id="myTable" class="table  table-fluid table-striped" width="100%">
                        <thead class="text-left">
                            <tr>
                                <th class="font-weight-bold">Transaction ID</th>
                                <th class="font-weight-bold">Reference No.</th>
                                <th class="font-weight-bold">Name of Payor</th>
                                <th class="font-weight-bold">Mobile No.</th>
                                <th class="font-weight-bold">Particular</th>
                                <th class="font-weight-bold">Status</th>
                                <th class="font-weight-bold">PCAB Fee</th>
                                <th class="font-weight-bold">Legal Research Fund</th>
                                <th class="font-weight-bold">Documentary Stamp</th>
                                <th class="font-weight-bold">NGSI Convenience Fee</th>
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

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        .<div class="card">
    <div class="card-body mx-4">
        <div class="container">
            <h2 class="mb-0">Electronic Official Receipts</h2>
            <p class="mb-0">Name of the Agency: Philippine Contractors Accreditation Board (PCAB)</p>
            <p class="mb-0">Location: Metro Manila</p>

            <div class="row mt-3">
                <ul class="list-unstyled">
                    <li class="text-black">Summary</li>
                    <li class="text-muted mt-auto"><span class="text-black">Company Name: </span>532 BUILDER CORPORATION</li>
                    <li class="text-muted mt-auto"><span class="text-black">License Number: </span>50717</li>
                    <li class="text-muted mt-auto"><span class="text-black">License Category: </span>C</li>
                    <li class="text-muted mt-auto"><span class="text-black">Type: </span>Update</li>
                    <li class="text-muted mt-auto"><span class="text-black">CFY: </span>2023/2024</li>
                    <li class="text-muted mt-auto"><span class="text-black">Date and Time of Receipt: </span>2024-01-09 14:02:29</li>
                    <li class="text-muted mt-auto"><span class="text-black">Nature of Collection: </span>PCAB </li>
                </ul>
            </div>

            <h4 class="mt-3">Amount received / Summary of Fee</h4>
            <p class="mb-0">Updating of License Category</p>

            <div class="row mt-3">
                <div class="col-xl-4">
                    <p>1. Filing fee:</p>
                </div>
                <div class="col-xl-2">
                    <p class="float-end">1,200.00</p>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <p>3. License Fee:</p>
                </div>
                <div class="col-xl-2">
                    <p class="float-end">100.00
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <p>4. Documentary stamp Tax:</p>
                </div>
                <div class="col-xl-2">
                    <p class="float-end">30.00
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <p>5. Legal Research Fund:</p>
                </div>
                <div class="col-xl-2">
                    <p class="float-end">12.00
                    </p>
                </div>
            </div>
            <div class="row text-black">
                <div class="col-xl-12">
                    <p class="float-end fw-bold">Total amount (PHP): 3,742.00 Grand Total Amount to be paid (PHP): 3,742.00</p>
                </div>
            </div>

            <div class="row mt-3">
                <ul class="list-unstyled">
                    <li class="text-muted mt-auto"><span class="text-black">eOR Number: </span>eOR-00064107</li>
                    <li class="text-muted mt-auto"><span class="text-black">Transaction Number: </span>20240109GXCHPHM2XXXG00000000000334280</li>
                    <li class="text-muted mt-auto"><span class="text-black">Model of Payment: </span>NP_QRPH</li>
                    <li class="text-muted mt-auto"><span class="text-black">Type: </span>Update</li>
                    <li class="text-muted mt-auto"><span class="text-black">CFY: </span>2023/2024</li>
                    <li class="text-muted mt-auto"><span class="text-black">Date and Time of Receipt: </span>2024-01-09 14:02:29</li>
                    <li class="text-muted mt-auto"><span class="text-black">Order of Payment Slip Number(Request Reference Number): </span>PCAB </li>
                </ul>
            </div>
        </div>
    </div>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->
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