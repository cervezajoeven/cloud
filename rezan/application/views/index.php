<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>₱ 45,000</h3>

                <p>Collection Today</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>12</h3>

                <p>Number of Payers Today</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    
</div>
<form action="<?php echo base_url('payment/save'); ?>">

    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Payment</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Payer</label>
                        <select class="form-control select2 required" required="required" style="width: 100%;">
                            <option value="">- Please Select -</option>
                            <option value="1">Joyce</option>
                            <option value="1">Ronnie</option>
                            <option value="1">Agi</option>
                            <option value="1">Isko</option>
                            <option value="1">Bornoc</option>
                        </select>
                    </div>
               
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="number" class="form-control" required="" name="">
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