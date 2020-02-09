<form action="<?php echo base_url('loan/save'); ?>" method="POST" >
    <div class="card card-default">
        

            <div class="card-header">
                <h3 class="card-title">Loan Details</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Borrower's Name</label>
                            <select class="form-control select2 required" name="borrower_id" required="required" style="width: 100%;">
                                <option value="">Please Select</option>
                                <?php foreach ($borrowers as $borrower_key => $borrower_value) :?>
                                    <option value="<?php echo $borrower_value['id']; ?>"><?php echo $borrower_value['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Capitals</label>
                            <select class="form-control select2 required" name="capital_id" required="required" style="width: 100%;">
                                <option value="">Please Select</option>
                                <?php foreach ($capitals as $capital_key => $capital_value) :?>
                                    <option value="<?php echo $capital_value['id']; ?>"><?php echo $capital_value['name']; ?> (₱ <?php echo number_format($capital_value['amount']); ?> / ₱ <?php echo number_format($capital_value['amount']); ?>)</option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        

                        <div class="form-group">
                            <label>Current Date</label>
                            <input type="date" value="<?php echo date('Y-m-d'); ?>" disabled="" class="form-control" name="amount">
                        </div>
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="number" min="100" value="2000" onkeyup="calculate_gives_payable();calculate_expected_receivable();" class="form-control amount" name="amount">
                        </div>
                        
                        
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Percentage</label>
                            <input type="number" min="1" value="5" onkeyup="calculate_gives_payable();calculate_expected_receivable();" class="form-control percentage" name="percentage">
                        </div>
                        <div class="form-group">
                            <label>Expected Gives per Month</label>
                            <input type="number" onkeyup="calculate_gives();" placeholder="2" value="2" min="1" class="form-control gives_per_month" name="gives_per_month">
                        </div>
                        <div class="form-group">
                            <label>Expected Term (Months)</label>
                            <input type="number" onkeyup="calculate_deadline();calculate_gives();calculate_gives_payable();calculate_expected_receivable();" placeholder="3" value="3" class="form-control term" name="term">
                        </div>
                        <div class="form-group">
                            <label>Interest</label>
                            <input type="number" readonly="" class="form-control interest" name="interest">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Gives Payable</label>
                            <input type="number" readonly="" class="form-control gives_payable" name="gives_payable">
                        </div>
                        <div class="form-group">
                            <label>Gives</label>
                            <input type="number" readonly="" class="form-control gives" name="gives">
                        </div>
                        <div class="form-group">
                            <label>Deadline</label>
                            <input type="date" readonly="" class="form-control deadline" name="deadline">
                        </div>
                        <div class="form-group">
                            <label>Expected Receivable</label>
                            <input type="number" readonly="" class="form-control is-valid expected_receivable" name="expected_receivable">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            
                            <input type="submit" value="Add Loan" class="form-control btn btn-success" name="">
                        </div>
                    </div>
                    
                </div>
                <!-- /.row -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                For borrowers to loan
            </div>
    </div>
</form>
<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Loans</h3>

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
                        <th>Deadline</th>
                        <th>Details</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    <?php foreach($data as $data_key=>$data_value): ?>
                        <tr>
                            <td><?php echo $data_value['name'] ?></td>
                            <td><?php echo $data_value['amount'] ?></td>
                            <td><?php echo date("F d, Y",strtotime($data_value['deadline'])) ?></td>
                            <td>
                                <button onclick="detail_data(<?php echo $data_value['id'] ?>)" class="btn btn-primary form-control"><i class="fas fa-tasks"></i>Details</button>
                            </td>
                            <td>
                                <button onclick="edit_data(<?php echo $data_value['id'] ?>)" class="btn btn-info form-control"><i class="fas fa-pen"></i>Edit</button>
                            </td>
                            <td>
                                <button onclick="delete_data(<?php echo $data_value['id'] ?>)" class="btn btn-danger form-control"><i class="fas fa-trash"></i>Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
           
            </div>
            
            
        </div>
        <!-- /.row -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        Loaners are listed here
    </div>
</div>

<?php $this->load->view('parts/footer'); ?>
<script type="text/javascript">

    function delete_data(id){
        if(confirm("Are you sure to delete this data?")){
            window.location.href = "<?php echo base_url('loan/delete/') ?>"+id;
        }else{

        }
    }
    function edit_data(id){
        window.location.href = "<?php echo base_url('loan/edit/') ?>"+id;
    }

    function detail_data(id){
        window.location.href = "<?php echo base_url('loan/detail/') ?>"+id;
    }

    function calculate_gives(){
        var term = parseInt($(".term").val());
        var gives_per_month = parseInt($(".gives_per_month").val());
        var gives = term*gives_per_month;
        $(".gives").val(gives);
    }

    function calculate_deadline(){
        var x = $(".term").val(); //or whatever offset
        var CurrentDate = new Date();
        CurrentDate.setMonth(CurrentDate.getMonth() + x);
        var day = ("0" + CurrentDate.getDate()).slice(-2);
        var month = ("0" + (CurrentDate.getMonth() + 1)).slice(-2);

        var today = CurrentDate.getFullYear()+"-"+(month)+"-"+(day) ;
        $(".deadline").val(today);
    }

    function calculate_gives_payable(){
        var amount = parseInt($(".amount").val());
        var percentage = parseInt($(".percentage").val())/100;
        var term = parseInt($(".term").val());
        var gives = parseInt($(".gives").val());
        var gives_payable = Math.ceil((amount+((amount*percentage)*term))/gives);
        var interest = Math.ceil((amount*percentage));
        $(".gives_payable").val(gives_payable);
        $(".interest").val(interest);
    }

    function calculate_expected_receivable(){
        var gives_payable = parseInt($(".gives_payable").val());
        var gives = parseInt($(".gives").val());
        var expected_receivable = gives_payable*gives;
        $(".expected_receivable").val(expected_receivable);
    }
    $(document).ready(function(){
        calculate_gives();
        calculate_deadline();
        calculate_gives_payable();
        calculate_expected_receivable();
    });

</script>