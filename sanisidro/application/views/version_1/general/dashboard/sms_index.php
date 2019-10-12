<style type="text/css">
    .bootstrap-select .dropdown-toggle .filter-option{
        padding:0!important;
    }
    .bs-caret{
        display: none;
    }
</style>
<?php $banner_data = $general_class->data['banner_data']?>
<?php $announcement_data = $general_class->data['announcement_data']?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="header">
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-12">
                        <h1>Welcome to <?php echo $school_status['shortcut'] ?> Community</h1>
                    </div>
                </div>
                <ul class="header-dropdown m-r--5">
                    <!-- <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Another action</a></li>
                            <li><a href="javascript:void(0);">Something else here</a></li>
                        </ul>
                    </li> -->
                </ul>
            </div>
            <div class="body">
                
                <center>
                    <!-- <div style="width: 60%;">
                        
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">

                            <ol class="carousel-indicators">
                                <?php foreach ($banner_data as $banner_key => $banner_value):?>
                                    <li data-target="#myCarousel" data-slide-to="<?php echo $banner_key?>" class="<?php if($banner_key==0):?> active <?php endif;?>"></li>
                                <?php endforeach; ?>
                            </ol>


                            <div class="carousel-inner">

                                <?php foreach ($banner_data as $banner_key => $banner_value):?>
                                    <div class="item <?php if($banner_key==0):?> active <?php endif;?>">
                                        <img src="<?php echo $general_class->ben_image('company/steps/banner/'.$banner_value['banner_url']); ?>" alt="Los Angeles" style="width:<?php echo $banner_value['banner_width']; ?>%;margin:0 auto;">
                                    </div>
                                <?php endforeach; ?>

                            </div>


                            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div> -->
               </center> 

            </div>
            
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
<script type="text/javascript">
</script>