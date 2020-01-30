<form action="<?php echo base_url('borrow/save'); ?>">

    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Borrow</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="">
                    </div>
               
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="number" class="form-control" required="" name="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Capital</label>
                        <select class="form-control select2 required" required="required" style="width: 100%;">
                            <option value=""> - Please Select - </option>
                            <option value="1">(₱100000) Canadian</option>
                            <option value="2">(₱200000) Filipino</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">

                        <input type="submit" value="Submit" class="form-control btn btn-success" name="">
                    </div>
                </div>
                
            </div>
            <!-- /.row -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Add a new payment here
        </div>
    </div>
</form>
<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Recent Transactions</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Date</th>
                    </tr>
                    <tr>
                        <td>Kuya</td>
                        <td>₱ 2000</td>
                        <td>10:30 AM January 21, 2020</td>
                    </tr>
                </table>
           
            </div>
            
            
        </div>
        <!-- /.row -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        Recent Payments are displayed here
    </div>
</div>