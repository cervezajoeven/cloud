<div class="brainee-page_container col-lg-12">
    <?php $general_class->ben_titlebar();?>
    <?php $datatable = array(
            "th"=>array(
                "Announcement Title",
                "Publisher",
            ),
            "td"=>array(
                "announcement_title",
                "username",
            ),
            "data"=>$data,
        );
    ?>
    <?php $general_class->ben_datatable($datatable);?>
</div>