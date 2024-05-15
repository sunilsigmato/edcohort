<?php
$brand = $this->input->get('brand');
$segment = $this->input->get('segment');

   // print_ex($_GET);
?>
<!--banner start-->



  <!-- New Design Start -->
  <button type="button" class="filter-btn">Filter</button>

<!--left start-->
<div class="container-fluid review-top-section">
    <div class="row review-top-next">
        <!--- Filtr Starts  --->
        <div class="col-md-2 review-left">

            <h3 class="filter-title">Filter</h3>
                    <form action="<?php echo base_url(); ?>review-search" method="post" name="form" id="form">

                        <?php echo csrf_field(); 
                            $res_filter_brand = getseg_brand_list($segment);
                            $res_filter_segment = get_segement();
                            $res_filter_class = getseg_class_list($segment);
                            $res_filter_course = getseg_crse_list($segment);
                        ?>
                        <div class="filter-col">
                            <h3 class="filter-col-title">Segment</h3>
                            <div class="select-box">                              
                                <select name="brand" id="filter_segment" class="filter_segment">
                                    <?php foreach($res_filter_segment as $segments){?>
                                    <option value="<?php echo $segments->id; ?>"
                                        <?php if($segment == @$segments->id){ echo 'selected'; } ?>>
                                        <?php echo $segments->segment_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="filter-col">
                            <h3 class="filter-col-title">BRAND</h3>
                            <div class="select-box">                              
                                <select name="brand" id="brand" class="brand">
                                    <?php foreach($res_filter_brand as $brands){?>
                                    <option value="<?php echo $brands->brand_id; ?>"
                                        <?php if($brands->brand_id == @$get_single_course_detail->brand_id){ echo 'selected'; } ?>>
                                        <?php echo $brands->brand_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class=" filter-col ">
                            <div class="filter-list-box">
                                <!--<button type="submit" class="apply-btn">Apply Filter</button>-->
                                <button type="button" class="apply-btn apply_filter">Apply Filter</button>
                            </div>
                        </div>
                    </form>
                </div>
        

            <!-- Filter Ends -->
            <!-- Review Starts  -->
            <div class="col-md-8">
                <!-- <div class="write-review-section">
            <div class="row">
                 <div class="col-md-4 pt-3 write-review-icon ">
                <i class="fa-solid fa-circle-user fa-2xl design-user"></i> <span> Write a review </span> <label for="rating2"><img src="<?php //echo base_url();?>assets/images/rating-1.png"
                              alt=""> </label>
            
            
        </div>
            </div>
        </div> -->
                <div class="review-center">
                    <div class="review-btn-box">

                    </div>

                    <div class="review-inner-center">
                        

                        <div class="total-review">
                         
                        </div>
                        <div class="review-box">
                            
                        <?php
                            $resp_all_course_list = getall_course_list($segment,$brand);
                            //print_R($resp_all_course_list);
                        ?>

<div class="container pt-5" id="brandCard">
                    <div class=" d-block d-md-flex row">
                        
                        <?php foreach ($resp_all_course_list as $r)  { 
                          
                            ?>
                        <div class="col-sm-12 col-xl-3 col-lg-4 mb-3">
                            <div class="card brandCard">
                                <img class="card-img-top"
                                    src="<?php echo base_url(); ?>uploads/brand/<?php echo $r->brand_image; ?>"
                                    alt="<?php echo $r->product_name; ?>">
                                <div class="card-body text-center">
                                    <h5 style ="overflow:hidden;text-overflow: ellipsis; white-space: nowrap;"><?php echo $r->product_name; ?></h5>
                                    <div class="popular-star-rating m-2">
                                        <?php for ($i = 1; $i <= 5; $i++) { ?>
                                        <i
                                            class="fa fa-star<?php echo ($r->product_rating >= $i) ? ' text-yellow' : ''; ?>"></i>  
                                        <?php } ?>
                                    </div>
                                    <hr>
                                    <a href="<?php echo base_url(); ?>review?course=<?php echo $r->product_id; ?>&segment=<?php echo $segment; ?>"
                                        style="text-decoration:none; ">
                                        <div class="view-program-font viewButton">
                                            View Program
                                        </div>
                                    </a>
                                    <!-- <p class="card-text rating-number">
                                        <img src="<?php echo base_url(); ?>/assets/images/Star.png" alt="">3.2
                                    </p> -->
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                            </div>
                           
                           
                        </div>

                       
                    </div>
            </div>
           
            <!-- Review Ends -->
           
            <!-- Review right side content -->
            <div class="col-md-2">
                <div class="review-right">
                    <div class="stick-right">
                        <div class="community-side-col">
                            <h3>10th PCM Community</h3>
                            <p>48 Students from your classdiscussing on your interested course</p>
                            <button type="button" class="discussing-btn">Start discussing</button>
                        </div>
                        <div class="star-box">
                            <h3 class="star-title">Star %</h3>
                            <div class="star-col">
                                <div class="star-col-image"></div>
                                <h4>41% </h4>
                                <p>Willing to refer at BYJU's</p>
                            </div>
                            <div class="star-col">
                                <div class="star-col-image"></div>
                                <h4>Top 3 Courses</h4>
                                <ul class="top-courses-list">
                                    <li>Cohort 1</li>
                                    <li>Cohort 2</li>
                                    <li>Cohort 3</li>
                                </ul>
                            </div>
                            <div class="star-col">
                                <div class="star-col-image"></div>
                                <h4>43%</h4>
                                <p>Willing to refer at BYJU's</p>
                            </div>
                            <div class="progress-bar-box">
                                <div class="d-flex progress-bar">
                                    <div style="width: 75%;"><span>75%</span></div>
                                    <div style="width: 25%;"><span>25%</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="score-box">
                            <h3>Brand score card</h3>
                            <div class="score-content"></div>
                            <button class="score-btn">View report</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Review right side content Ends-->


        </div>

        <!-- New Design Ends -->


        <!--end-->
        <div class="helpful-box">
            <div class="container">
                <!-- <div id="summernote"></div> -->
                <h2 class="helpful-title">You might find this helpful!</h2>
                <div class="helpful-inner-box d-flex">
                    <div class="helpful-left">
                    </div>
                    <div class="helpful-center">
                        <h3>Article topic title related to Search “Byju’s”</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been
                            the indus.....
                        </p>
                    </div>
                    <div class="helpful-right">
                        <a href="#" class="d-flex flex-wrap justify-content-center align-items-center text-center">Quick
                            Read<br /> 1 min</a>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <input type="hidden" value = "<?php echo $segment?>" class = "segment">
    <input type="hidden" value = "<?php echo $segment?>" class = "brand">

    <!--content end-->
    <!-- <script src="<?php echo base_url(); ?>assets/js/ajax/manage_review_ajax.js"></script> -->
    <script>
    $(document).ready(function() {

          /** Start Filter Section */
            /** Apply Select 2 */
            $('.filter_segment').select2();
            $('.brand').select2();
            $('#filter_class_dropdown').select2();
            $('#filter_course_dropdown').select2();
            $('#batch').select2();
            
               /**End   Apply Select 2 */
        var filter_toggle_online = $("#online").val();
        var filter_toggle_offline = $("#offline").val();
        var filter_segment_id = $('.segment').val();
        var filter_brand_id = $('.brand').val();
        var filter_class_id = $('.filter_class').val();
        var filter_course_id = $('.filter_course').val();
        var filter_batch_id = $('.filter_batch').val();
        var filter_board_id = $('.filter_board').val();
        var parameter_course = $('.course').val();
        var filter_online_offline = $('.filter_online_offline').val();
        var product_id = '';
        var ratings = '';
        var sort_by ='';
        
          /** Start Filter Section */
        if(filter_segment_id == 1)
        {
            $('.board-k12').css('display', 'block');
            $('.board-other').css('display', 'none');
        }
        else
        {
            $('.board-other').css('display', 'block');
            $('.board-k12').css('display', 'none');
            filter_board_id = filter_online_offline;
            
        }

        $("#filter_segment").change(function()
        { 
            
           var drop_down_text = $('#filter_segment :selected').text();
           drop_down_text = drop_down_text.trim();
           if(drop_down_text == 'K12' || drop_down_text == 'K-12' || drop_down_text == 'k12')
           {
                 $(".cal-h3").html('CLASS');
           }
           else
           {
                $(".cal-h3").html('COURSE SEGMENT');
           }
            filter_segment_id =  $(this).val();
            if(filter_segment_id == 1)
            {
                $('.board-k12').css('display', 'block');
                $('.board-other').css('display', 'none');
            }
            else
            {
                $('.board-other').css('display', 'block');
                $('.board-k12').css('display', 'none');  
            }
            filter_brand(filter_segment_id);
        });

 
        $('.toggle_cbsc').click(function() {
            filter_board_id = $('#cbsc').val();
            $("#icsc-toggle").removeClass('active');
            $("#cbsc-toggle").addClass('active');

        });
        $('.toggle_icsc').click(function() {
            filter_board_id = $('#icsc').val();
            
            $("#icsc-toggle").addClass('active');
            $("#cbsc-toggle").removeClass('active');

        });
        $('.toggle_online').click(function() { 
            filter_board_id = $('#online').val();
            $("#offline-toggle").removeClass('active');
            $("#online-toggle").addClass('active');

        });
        $('.toggle_offline').click(function() {
            filter_board_id = $('#offline').val();
            $("#online-toggle").removeClass('active');
            $("#offline-toggle").addClass('active');
        });
   
        $("#brand").change(function()
        {
            filter_brand_id = $(this).val();
            filter_class(filter_brand_id,filter_segment_id);
        });


        $("#filter_class_dropdown").change(function()
        {
            filter_class_id = $(this).val();
            filter_course(filter_brand_id,filter_segment_id,filter_board_id,filter_class_id);
        });

        $("#filter_course_dropdown").change(function()
        {
            filter_course_id = $(this).val();
            filter_batch(filter_brand_id,filter_segment_id,filter_board_id,filter_class_id,filter_course_id);

        });

        $("#batch").change(function()
        {
             filter_batch_id = $(this).val();
        });
        /** Rating Code  **/
        $('input[name="customer_rating"]').change(function(){
            if($(this).is(':checked')){
                 ratings = $(this).val();
                 if(ratings == 'all' || ratings == 'All' || ratings == 'ALL')
                 {
                    ratings = '';
                 }
                 location.reload();
                 window.location="<?php echo base_url();?>review/?course="+parameter_course+"&segment="+filter_segment_id+"&sort_by="+sort_by+"&customer_rating="+ratings;
               // console.log("Selected rating: " + ratingValue);
               //alert(ratings);
            }
        });
         /** End Rating Code  **/
         $('input[name="sort_by"]').change(function(){
            if($(this).is(':checked')){
                sort_by = $(this).val();
                location.reload();
               // console.log("Selected rating: " + ratingValue);
              window.location="<?php echo base_url();?>review/?course="+parameter_course+"&segment="+filter_segment_id+"&sort_by="+sort_by;
              //location.reload();
            }
        });
        $(".apply_filter").click(function()
        {
            window.location="<?php echo base_url();?>all-product/?brand="+filter_brand_id+"&segment="+filter_segment_id;

        })

        function filter_brand(segment_id)
        {
            $.ajax({
                type : 'POST',    
                url: "<?php echo base_url(); ?>filter/get_brand_detail",
                data:{
                    segment:segment_id,
                }, 
                    dataType: "json",   
                    success: function (response) {
                        // console.log(response.data);
                        var options = '';
                        var filter_brand_id_temp = '';
                        for (var i = 0; i < response.data.length; i++) {
                            if(i==0)
                            {
                                filter_brand_id = response.data[i].brand_id;
                                filter_brand_id_temp = filter_brand_id;
                            }
                            options += '<option value="' + response.data[i].brand_id + '">' + response.data[i].brand_name + '</option>';
                        }
                        $('#brand').empty().append(options);
                        if(filter_brand_id_temp)
                        {
                            filter_class(filter_brand_id,segment_id) 
                        }

                    }
                });
        }

        function filter_class(brand_id,segment_id)
        {
            $.ajax({
                type : 'POST',    
                url: "<?php echo base_url(); ?>filter/get_filter_class_detail",
                data:{
                    brand_id : brand_id,
                    segment:segment_id,
                }, 
                dataType: "json",   
                success: function (response) {
                    // console.log(response.data);
                    var options = '';
                    var filter_class_id_temp = '';
                    for (var i = 0; i < response.data.length; i++) {
                        if(i==0)
                    {
                        filter_class_id = response.data[i].class_id;
                        filter_class_id_temp = filter_class_id;
                    }
                        options += '<option value="' + response.data[i].class_id + '">' + response.data[i].title + '</option>';
                    }
                    //console.log(options);
                        $('#filter_class_dropdown').empty().append(options); 
                    if(filter_class_id_temp)
                    {
                        filter_course(brand_id,segment_id,filter_board_id,filter_class_id_temp)
                    }
                }
            });
        }
        function filter_course(brand_id,segment_id,board_id,class_id)
        {
        $.ajax({
              type : 'POST',    
               url: "<?php echo base_url(); ?>filter/get_filter_course_detail",
              data:{
                segment:segment_id,
                board: board_id,
                class: class_id,
                brand_id : brand_id,
               // batch: filter_batch_id,
              }, 
              dataType: "json",   
              success: function (response) {
                   console.log(response.data);
                  var options = '';
                  var filter_course_id_temp = '';
                for (var i = 0; i < response.data.length; i++) {
                    if(i==0)
                    {
                        filter_course_id = response.data[i].id;
                        filter_course_id_temp = filter_course_id
                    }
                    options += '<option value="' + response.data[i].id + '">' + response.data[i].course_name + '</option>';
                }
                //console.log(options);
                $('#filter_course_dropdown').empty().append(options); 
                if(filter_course_id_temp)
                {
                    filter_batch(brand_id,segment_id,board_id,class_id,filter_course_id_temp)
                }
              }
           });
        }

        function filter_batch(brand_id,segment_id,board_id,class_id,course_id)
        {
            $.ajax({
              type : 'POST',    
               url: "<?php echo base_url(); ?>filter/get_filter_batch_detail",
              data:{
                segment:segment_id,
                board: board_id,
                class: class_id,
                brand_id : brand_id,
                course : course_id,
               // batch: filter_batch_id,
              }, 
              dataType: "json",   
              success: function (response) {
                   console.log(response.data);
                  var options = '';
                for (var i = 0; i < response.data.length; i++) {
                    if(i==0)
                    {
                        filter_batch_id = response.data[i].batch_id;
                    }
                    options += '<option value="' + response.data[i].batch_id + '">' + response.data[i].batch_name + '</option>';
                }
                //console.log(options);
                $('#batch').empty().append(options); 
              }
           });
        }
        
        /** End Filter Section */


        

      /*  $('#category').change(function() {
            var category_id = $('#category').val();
            if (category_id != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>get-class-list",
                    method: "POST",
                    data: {
                        category_id: category_id
                    },
                    success: function(data) {
                        $('#board').html(data);
                        // $('#city').html('<option value="">Select City</option>');
                    }
                });
            } else {
                $('#state').html('<option value="">Select State</option>');
                $('#city').html('<option value="">Select City</option>');
            }
        });

        $('#brand').change(function() {
            var brand_id = $('#brand').val();
            if (brand_id != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>get-board-list",
                    method: "POST",
                    data: {
                        brand_id: brand_id
                    },
                    success: function(data) {
                        $('#board').html(data);
                        // $('#city').html('<option value="">Select City</option>');
                    }
                });
            } else {
                // $('#state').html('<option value="">Select State</option>');
                // $('#city').html('<option value="">Select City</option>');
            }
        });*/

        // $('#brand').change(function() {
        //     var brand_id = $('#brand').val();
        //     if (brand_id != '') {
        //         $.ajax({
        //             url: "<?php echo base_url(); ?>get-board-list",
        //             method: "POST",
        //             data: {
        //                 brand_id: brand_id
        //             },
        //             success: function(data) {
        //                 $('#board').html(data);
        //                 // $('#city').html('<option value="">Select City</option>');
        //             }
        //         });
        //     } else {
        //        // $('#state').html('<option value="">Select State</option>');
        //        // $('#city').html('<option value="">Select City</option>');
        //     }
        // });


     /*   $('#board').change(function() {
            var brand_id = $('#brand').val();
            var product_type = $('input[name="product_type"]:checked').val();
            var board_id = $('#board').val();
            //alert(product_type);
            if (board_id != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>get-class-list",
                    method: "POST",
                    data: {
                        board_id: board_id,
                        product_type: product_type,
                        brand_id: brand_id
                    },
                    success: function(data) {
                        $('#class').html(data);
                    }
                });
            }
        });


        $('#class').change(function() {
            var brand_id = $('#brand').val();
            var product_type = $('input[name="product_type"]:checked').val();
            var board_id = $('#board').val();
            var class_id = $('#class').val();
            if (class_id != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>get-batch-class",
                    method: "POST",
                    data: {
                        board_id: board_id,
                        product_type: product_type,
                        brand_id: brand_id,
                        class_id: class_id
                    },
                    success: function(data) {
                        $('#batch').html(data);
                    }
                });
            }
        });*/

        // $('#board').change(function(){
        //     var board_id = $('#board').val();
        //     if(board_id != '')
        //     {
        //         $.ajax({
        //             url:"<?php echo base_url(); ?>get-course-batch",
        //             method:"POST",
        //             data:{board_id:board_id},
        //             success:function(data)
        //             {
        //                 $('#batch').html(data);
        //             }
        //         });
        //     }
        // }); 



        // $('#state').change(function() {
        //     var state_id = $('#state').val();
        //     if (state_id != '') {
        //         $.ajax({
        //             url: "<?php echo base_url(); ?>dynamic_dependent/fetch_city",
        //             method: "POST",
        //             data: {
        //                 state_id: state_id
        //             },
        //             success: function(data) {
        //                 $('#city').html(data);
        //             }
        //         });
        //     } else {
        //         $('#city').html('<option value="">Select City</option>');
        //     }
        // });




    });

    function productReviewReadMore(val) {
        //Forward browser to new url
        $("#reviewShort_" + val).hide();
        $("#review-read_" + val).hide();
        $("#reviewFull_" + val).show();


    }

    function productReviewReadShort(val) {
        //Forward browser to new url
        $("#reviewFull_" + val).hide();
        $("#reviewShort_" + val).show();
        $("#review-read_" + val).show();

    }

    function productReviewReplyReadMore(val) {
        //Forward browser to new url
        $("#reviewReplyShort_" + val).hide();
        $("#reviewReplyFull_" + val).show();

    }

    function productReviewReplyReadShort(val) {
        //Forward browser to new url
        $("#reviewReplyFull_" + val).hide();
        $("#reviewReplyShort_" + val).show();

    }

    function divShow(val) {
        //Forward browser to new url
        if ($('#commentDiv_' + val).css('display') == 'none') {
            $('#commentDiv_' + val).css('display', 'block');
        } else {
            $('#commentDiv_' + val).css('display', 'none');
        }

    }

    function divSubReply(reviewId,prrId,product_id,user_id) {
     
        sub_comment_content= $('#commentid_'+prrId).val();
        if(sub_comment_content== ''){
            alert("Enter the comment");
            return false;
        }
      
        $.ajax({
            url: base_url + 'filter/review_sub_reply',
            dataType: 'json',
            type: 'post',
            data: {
                review_id: reviewId,
                user_id: user_id,
                product_id: product_id,
                prr_id : prrId,
                sub_comment_content : sub_comment_content
            },
            success: function(data) {
                if (data.status == '1') {

                     alert(data.data); 
                    location.reload();
                } else if (data.status == '0') {
                    alert(data.data); 
                }
            }
           
        });

    }

    function ed_comment(val)
    {
        if ($('#subcommentDiv_' + val).css('display') == 'none') {
            $('#subcommentDiv_' + val).css('display', 'block');
        } else {
            $('#subcommentDiv_' + val).css('display', 'none');
        }
    }

    function viewRepliesAll(val) {
        if ($('.review_reply_' + val).css('display') == 'none') {
            $('.review_reply_' + val).css('display', 'block');
        } else {
            $('.review_reply_' + val).css('display', 'none');
        }
    }
    function viewRepliesAll_level2(val) {
        if ($('.review_reply_lev2_' + val).css('display') == 'none') {
            $('.review_reply_lev2_' + val).css('display', 'block');
        } else {
            $('.review_reply_lev2_' + val).css('display', 'none');
        }
    }

    function viewRepliesAll_level1(val) {
        if ($('.review_reply_lev1_' + val).css('display') == 'none') {
            $('.review_reply_lev1_' + val).css('display', 'block');
        } else {
            $('.review_reply_lev1_' + val).css('display', 'none');
        }
    }

    function productReviewLike(review_id, user_id, action) {
        // alert(review_id+' '+user_id);  
        //$(".alert-outline-success").hide();
        //$("#text-message-success").html(''); 
        //var value_form = $('#product_review').serialize();          
        $.ajax({
            url: base_url + 'review-like',
            dataType: 'json',
            type: 'post',
            data: {
                review_id: review_id,
                user_id: user_id,
                action: action
            },
            success: function(data) {
                if (data.status == '1') {
                    // alert('1'); 
                    location.reload();
                } else if (data.status == '0') {
                    //alert('0'); 
                }
            },
            beforeSend: function() {
                $("#global-loader").show();
                $("#body").addClass('opacity-body');
            },
            complete: function() {
                $("#global-loader").hide();
                $("#body").removeClass('opacity-body');
            }
        });

    }

    function productReviewReply(id) { // alert();  
        //$(".alert-outline-success").hide();
        //$("#text-message-success").html(''); 
        var value_form = $('#product_review_reply_' + id).serialize();
        $.ajax({
            url: base_url + 'review-reply-submit',
            dataType: 'json',
            type: 'post',
            data: value_form,
            success: function(data) {
                if (data.status == '1') {
                    $("#reg-message-success_" + id).show();
                    $("#text-message-success_" + id).html(data.message);
                    setTimeout(function() {
                        $("#reg-message-success_" + id).hide();
                        $("#text-message-success_" + id).html('');
                        $("#reg-message-success_" + id).hide('blind', {}, 500)
                        location.reload();
                    }, 3000);

                } else if (data.status == '0') {
                    $("#reg-message-error_" + id).show();
                    $("#text-message-error_" + id).html(data.message);
                    setTimeout(function() {
                        $("#reg-message-error_" + id).hide();
                        $("#text-message-error_" + id).html('');
                        $("#reg-message-error_" + id).hide('blind', {}, 500)
                    }, 5000);
                }
            },
            beforeSend: function() {
                $("#global-loader").show();
                $("#body").addClass('opacity-body');
            },
            complete: function() {
                $("#global-loader").hide();
                $("#body").removeClass('opacity-body');
            }
        });

    }


    function prodcutType(val) {
        //Some code
        //alert(val);
        var product_type = val;
        var brand_id = $('#brand').val();

        if (product_type == 1) {
            $("#offline-toggle").removeClass('active');
            $("#online-toggle").addClass('active');

        } else {
            $("#online-toggle").removeClass('active');
            $("#offline-toggle").addClass('active');
        }

        $.ajax({
            url: base_url + 'get-board-list',
            dataType: 'json',
            type: 'post',
            data: {
                product_type: product_type,
                brand_id: brand_id
            },
            success: function(data) {
                $('#board').html(data);
                // $('#city').html('<option value="">Select City</option>');
            },
            beforeSend: function() {
                $("#global-loader").show();
                $("#body").addClass('opacity-body');
            },
            complete: function() {
                $("#global-loader").hide();
                $("#body").removeClass('opacity-body');
            }
        });
    }


    //   window.onscroll = function() {myFunction()};

    // var header = document.getElementById("sideleft-fix");
    // var sticky = header.offsetTop;

    // function myFunction() {
    //   if (window.pageYOffset > sticky) {
    //     header.classList.add("sticky");
    //   } else {
    //     header.classList.remove("sticky");
    //   }
    // }
    </script>