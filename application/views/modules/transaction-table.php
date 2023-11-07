<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-sm-flex align-items-center mb-4">
                    <h4 class="card-title mb-sm-0">Transaction table</h4>
                    <!-- <a href="#" class="text-dark ml-auto mb-3 mb-sm-0"> View all Products</a> -->
                </div>
                <div class="table-responsive border  rounded p-1">
                    <table id="myTable" class="table  table-fluid table-striped" width="100%">
                        <thead class="text-left">
                            <tr>
                                <th class="font-weight-bold">No.</th>
                                <th class="font-weight-bold">Transaction Ref.</th>
                                <th class="font-weight-bold">Client Ref</th>
                                <th class="font-weight-bold">Trace No.</th>
                                <th class="font-weight-bold">Amount</th>
                                <th class="font-weight-bold">App Name</th>
                                <th class="font-weight-bold">Paygate</th>
                                <th class="font-weight-bold">Status</th>
                                <th class="font-weight-bold">Type</th>
                                <th class="font-weight-bold">QR Method</th>
                                <th class="font-weight-bold">Date Created</th>
                                <th class="font-weight-bold">Time Created</th>
                                <th class="font-weight-bold">Date Modified</th>
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
    $(document).ready(function () {
        $('#myTable')?.DataTable();
    });
</script>