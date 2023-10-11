<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-sm-flex align-items-center mb-4">
                    <h4 class="card-title mb-sm-0">Transaction table</h4>
                    <!-- <a href="#" class="text-dark ml-auto mb-3 mb-sm-0"> View all Products</a> -->
                </div>
                <div class="table-responsive border  rounded p-1">
                </div>
                    <table id="myTable" class="table  table-fluid table-striped" width="100%">
                        <thead class="text-left">
                            <tr>
                            <th class="font-weight-bold">AR Number</th>
                            <th class="font-weight-bold">Responsibility Center Code</th>
                            <th class="font-weight-bold">Payor</th>
                            <th class="font-weight-bold">Particulars</th>
                            <th class="font-weight-bold">PREXC/PAP</th>
                            <th class="font-weight-bold">Amount-Total Collection</th>
                            <th class="font-weight-bold">Amount-Breakdown Collection</th>
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