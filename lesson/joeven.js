$(document).ready(function(){

    var stored_lesson_data = '';
    var result_pool = [];
    var content_pool = [];
    var folders = "#folder_1,#folder_2,#folder_3,#folder_4,#folder_5";
    var active_content = "";
    var active_content_data = {};
    var content_order = [];
    var lesson_data = {};
    var active_portal = "youtube";
    //suddenshutdown
    //AIzaSyDsB_WGyzL6VpZcoxoCRGTclvh5nkWixJc
    //017301866149964088276:l0dgsrgie8b
    
    //cervezajoeven@gmail.com
    //AIzaSyCQABaeip2nXZiL5sr1aTf0Oq3VbfPK_-k
    //005829641482717962768:2e59rdva9xk
    var key = "AIzaSyCQABaeip2nXZiL5sr1aTf0Oq3VbfPK_-k";
    var cx = "017301866149964088276:l0dgsrgie8b";

    // deploy_stored_data(stored_lesson_data);
    adjust_iframe();

    // window.addEventListener("resize", adjust_iframe());
    function youtube_search(query,maxResults = 10){
        var youtube_api = "https://www.googleapis.com/youtube/v3/search?part=snippet &q="+query+"&type=video&maxResults="+maxResults+"&key=AIzaSyBZRyffCijnVZvK_QnUk-_jadiLZ8_6f00";
        $.ajax({
            url: youtube_api,
            context: document.body
        }).done(function(data) {
            var processed_data = process_data(data,"youtube");
            result_pool = processed_data;
            populate_search_content(processed_data);
        });
    }

    function google_search(query,maxResults = 10){
        var api = "https://www.googleapis.com/customsearch/v1?key="+key+"&cx="+cx+"&q="+query;
        $.ajax({
            url: api,
            context: document.body
        }).done(function(data) {
            var processed_data = process_data(data,"google");
            result_pool = processed_data;
            populate_search_content(processed_data);
        });
    }

    function google_image_search(query,maxResults = 10){
        var api = "https://www.googleapis.com/customsearch/v1?key="+key+"&cx="+cx+"&searchType=image&q="+query;
        $.ajax({
            url: api,
            context: document.body
        }).done(function(data) {
            var processed_data = process_data(data,"google_image");
            result_pool = processed_data;
            populate_search_content(processed_data);
        });
    }

    function reset_result_pool(){
        result_pool = {};
    }

    function portal_change(portal_name){
        active_portal = portal_name;
    }

    function reset_population(){
        $(".content_result").remove();
        reset_result_pool();
    }

    function generate_id(){
        var n = new Date().getTime();
        return n;
    }

    function sort_content_order(){
        content_order = [];
        $.each($(".folder_contents"),function(key,ul){

            $.each($(ul).find("li"),function(li_key,li_value){
                content_order.push($(li_value).attr("result_id"));
            });
        });
        change_detected();
    }

    function process_data(data,type){
        var data_population = [];
        switch(type) {
            case "youtube":
                data.items.forEach(function(item, index, arr){
                    data_population[index] = {
                        result_id:generate_id()+"_"+index,
                        title:item.snippet.title,
                        description:item.snippet.description,
                        image:encodeURIComponent(item.snippet.thumbnails.high.url),
                        type:"youtube",
                        source: encodeURIComponent("https://www.youtube.com/embed/"+item.id.videoId),
                    };

                });
                
                return data_population;
            break;
            case "google":
                data.items.forEach(function(item, index, arr){
                    var has_pagemap = item.hasOwnProperty("pagemap");
                    var has_image = false;
                    if(has_pagemap){
                        has_image = item.pagemap.hasOwnProperty("cse_image");
                    }
                    
                    data_population[index] = {
                        result_id:generate_id()+"_"+index,
                        title:item.title,
                        description:item.snippet,
                        image:"website.png",
                        type:"website",
                        source:encodeURIComponent(item.link),
                    };
                    
                    if(has_image){
                        data_population[index].image = encodeURIComponent(item.pagemap.cse_image[0].src);
                    }

                });
                return data_population;
            break;
            case "google_image":
                data.items.forEach(function(item, index, arr){

                    data_population[index] = {
                        result_id:generate_id()+"_"+index,
                        title:item.title,
                        description:item.snippet,
                        image:encodeURIComponent(item.link),
                        type:"image",
                        source:encodeURIComponent(item.link),
                    };

                });
                return data_population;
            break;
            default:
                return null;
        }
    }
    function update_active_content(data){
        active_content = data;
    }

    function get_content_data(result_id) {
        var return_data;
        content_pool.forEach(function(item, index, arr){
            if(result_id == item.content.result_id){
                return_data = item;
            }
        });
        return return_data;
    }

    function adjust_iframe(){
        switch (screen.height) {
            case 720:
                $(".student_view_content_iframe").css("height","537px");
            break;
            case 900:
                $(".student_view_content_iframe").css("height","717px");
            break;
        }
    }

    function render_student_view(){
        
        $(".content_type").hide();
        
        if(active_content_data){
            $(".student_view_title").text(active_content_data.content.title);
            switch (active_content_data.content.type){
                case "youtube":
                    $(".student_view_content_iframe").show();
                    $(".student_view_content_iframe").attr("src",decodeURIComponent(active_content_data.content.source));
                break;
                case "image":
                console.log("image");
                    $(".image_content").show();
                    $(".image_content").css("height",screen.height-180);
                    $(".image_content").attr("src",decodeURIComponent(active_content_data.content.source));
                    $(".image_content").attr("data-src",decodeURIComponent(active_content_data.content.source));
                    $(document).find('[data-magnify=gallery]').magnify();
                break;
                case "website":
                    $(".student_view_content_iframe").show();
                    $(".student_view_content_iframe").css("height",screen.height-180);
                    $(".student_view_content_iframe").attr("src",decodeURIComponent(active_content_data.content.source));
                break;
            }
            $(".student_view_title").text(active_content_data.content.title);
        }else{

        }
    }

    function reset_student_view(){
        $(".student_view_content_iframe").attr("src","");
    }
    function get_current_order(){
        var return_key = 0;
        $.each(content_order,function(key,value){

            if(active_content_data.content.result_id==value){
                
                return_key = key;
            }
        });
        return return_key;
    }

    function get_slides(order){
        active_content_data = get_content_data(content_order[order]);
        active_content = content_order[order];
        render_student_view();
    }

    function get_next(){
        var end_order = content_order.length-1;
        var current_order = get_current_order();
        
        if(current_order<end_order){
            var next_order = current_order+1;
            active_content_data = get_content_data(content_order[next_order]);
            active_content = content_order[next_order];
            render_student_view();
        }else{
            $(".next").attr("disabled","disabled");
        }
    }
    function get_previous(){
        var current_order = get_current_order();
        
        if(current_order>0){
            var next_order = current_order-1;
            active_content_data = get_content_data(content_order[next_order]);
            active_content = content_order[next_order];
            render_student_view();
        }
    }

    function populate_slides(){
        $(".actual_slide").remove();
        $.each(content_order,function(key,value){
            var new_slide = $(".slide_clone").clone();
            new_slide.css("display","inline-block");
            new_slide.addClass("actual_slide");
            new_slide.removeClass("slide_clone");
            var new_slide_data = decodeURIComponent(get_content_data(value).content.image);
            new_slide.find("img").attr("src",new_slide_data);
            $(".student_view_slides").append(new_slide);
        });
        check_active_thumbnail();
    }

    function check_active_thumbnail(){
        $(document).find(".slide_active").removeClass("slide_active");
        $.each(content_order,function(key,value){
            if(active_content == value){
                $(".actual_slide").eq(key).addClass("slide_active");
            }
        });
    }

    function remove_content(result_id){
        content_order = $.grep(content_order, function(value) {
          return value != result_id;
        });

        // console.log(content_pool);
        $.each(content_pool,function(key,value){
            if(value.content.result_id == result_id){
                content_pool.splice(key,1);
            }
        });

    }

    function download(content, fileName, contentType) {
        var a = document.createElement("a");
        var file = new Blob([content], {type: contentType});
        a.href = URL.createObjectURL(file);
        a.download = fileName;
        a.click();
    }

    function change_detected(){

        lesson_data = {
            content_order:content_order,
            content_pool:content_pool,
            folder_names:"Engage,Explore,Explain,Extend,LAS",
        };

        // console.log(JSON.stringify(lesson_data).replace(/\//g, '\\/'));
        // console.log(JSON.stringify(lesson_data).replace(/'/g,'\\\"'));
    }

    function deploy_stored_data(stored_lesson_data){
        console.log(JSON.parse(stored_lesson_data));

    }

    $( function() {
        $(folders+",#result_container" ).sortable({
            connectWith: ".connectedSortable",
            receive: function(event,ui) {
                if (this === ui.item.parent()[0]) {
                    if(ui.item.parent().attr("id")!="result_container"){

                        $(ui.item[0]).removeClass('content_result');
                        $(ui.item[0]).addClass('content_already');
                        var result_id = $(ui.item[0]).attr("result_id");
                        
                        result_pool.forEach(function(item, index, arr){
                            if(result_id==item.result_id){
                                var folder_id = ui.item.parent().attr("id");
                                var content = {folder_id:folder_id,content:item}
                                content_pool.push(content);
                            }
                        });

                    }
                    
                }
                sort_content_order();
                
            },
            stop:function(event,ui){
                sort_content_order();
            },
            beforeStop: function(ev, ui) {
                if ($(ui.item).hasClass('content_already') && $(ui.placeholder).parent()[0] != this) {
                    $(this).sortable('cancel');
                }
            }
        }).disableSelection();
    });

    $(".extremeright_icon").click(function(){
        var portal_name = $(this).attr("portal");
        $(".extremeright_icon").removeClass("icon_active");
        $(this).addClass("icon_active");
        portal_change(portal_name);
        reset_population();
        $(".submit_button").click();
    });
    $('.trigger').click(function() {
        // $('.slider').toggleClass('close');
        var trigger_id = $(this).attr("id");
        
        if($('.'+trigger_id+'_slider').hasClass('close')){
            
            $(".trigger").removeClass('active_trigger');
            $('.slider').addClass('close');
            $(this).addClass('active_trigger');
            $('.'+trigger_id+'_slider').removeClass('close');
        }else{
            $(this).removeClass('active_trigger');
            $('.'+trigger_id+'_slider').addClass('close');
        }
        

    });

    $(".folder_container").hide();
    $(".folder_container").eq(0).show();
    $(".folder").click(function(){
        var folder_index = $(this).index();
        $('.folder').removeClass('folder_active');
        $(this).addClass('folder_active');
        $(".folder_container").hide();
        $(".folder_container").eq(folder_index).show();

    });

    

    function populate_search_content(data){
        var populous = $(".content_hidden").clone();
        data.forEach(function(item, index, arr){
            populous = $(".content_hidden").clone();
            $(populous).removeClass("content_hidden");
            $(populous).addClass("content_result");
            $(populous).show();
            switch(item.type) {
                case "youtube":
                    $(populous).css("background-color","rgb(255, 83, 83)");
                break;
                case "website":
                    $(populous).css("background-color","rgb(0, 84, 169)");
                break;
                case "image":
                    $(populous).css("background-color","rgb(56, 177, 55)");
                break;
            }
            
            $(populous).attr("result_id",item.result_id);
            $(populous).find(".content_header").find("span").text(item.title);
            $(populous).find(".content_body").find("img").attr("src",decodeURIComponent(item.image));
            $(populous).find(".content_footer").find("span").text(item.description);
            $(".search_content").last().after($(populous));
            
        });
    }
    $("#search_portal").on("keyup",function(event){
        if (event.keyCode === 13) {
            event.preventDefault();
            reset_population();
            $(".submit_button").click();
        }
    });

    $(".submit_button").on("click",function(){
        var search = $("#search_portal").val();
        switch(active_portal) {
            case "youtube":
               youtube_search(search);
            break;
            case "google":
               google_search(search);
            break;
            case "google_image":
               google_image_search(search);
            break;
            default:
                return null;
        }

        
    });
    
    $(".slideshow_action").click(function(){
        
        $(".edit_area").toggleClass("close_edit");
        $(".student_view").toggleClass("student_view_close");
        active_content_data = get_content_data(content_order[0]);
        active_content = content_order[0];
        adjust_iframe();
        render_student_view();
        populate_slides();
    });
    $(".close_student_view").click(function(){
        $(".edit_area").toggleClass("close_edit");
        $(".student_view").toggleClass("student_view_close");
        reset_student_view();
    });
    $(document).on("dblclick",".content_already",function(){

        var result_id = $(this).attr("result_id");
        update_active_content(result_id);
        active_content_data = get_content_data(result_id);
        $(".edit_area").toggleClass("close_edit");
        $(".student_view").toggleClass("student_view_close");
        render_student_view();
    });
    $(".student_view-title").click(function(){

        $(".student_view-slideshows").toggleClass("slideshows_close");

    });
    $(".next").click(function(){
        get_next();
        check_active_thumbnail();
    });
    $(".previous").click(function(){
        get_previous();
        check_active_thumbnail();
    });
    $('.student_view_slides').hide();
    $(".student_view_title").click(function(){
        
        $('.student_view_slides').slideToggle("fast");
    });

    $('.student_view_slides').mousewheel(function(e, delta) {
        this.scrollLeft -= (delta * 40);
        e.preventDefault();
    });
    $(".slide").click(function(){
        
        $(".slide").removeClass("slide_active");
        $(this).addClass("slide_active");

    });
    
    $(document).on("dblclick",".content_already",function(){
        populate_slides();
    });
    $(document).on("click",".actual_slide",function(){
        var the_index = $(this).index()-1;
        get_slides(the_index);
        check_active_thumbnail();
    });
    $(document).on("mouseover",".content_already",function(){
        $(this).find(".content_close").show();
    });
    $(document).on("mouseout",".content_already",function(){
        $(this).find(".content_close").hide();
    });
    $(document).on("click",".content_close",function(){
        var delete_li = $(this).parent().parent();
        var delete_result_id = $(this).parent().parent().attr("result_id");
        remove_content(delete_result_id);
        $(delete_li).remove();
        
    });

});