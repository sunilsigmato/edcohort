<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php
$segment = $this->input->get('segment');
$segment_temp = $segment;
?>
<!--banner start-->
<div class="inner-banner ">
    <div class="col-md-3 breadcrumb-design">
        <div class="breadcrumb">
            <ul>
                <li>Home </li>
                <li><?php //echo @$breadcrumb_name1; ?> </li>
                <li><a href="#"><?php //echo @$breadcrumb_name2; ?></a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-9">
        <div class="tab-menu">
            <ul>
                <li><a
                        href="<?php echo base_url(); ?>complaint?segment=<?php echo $segment_temp; ?>">Complaint
                    </a></li>
                <li><a
                        href="<?php echo base_url(); ?>comparison?segment=<?php echo $segment_temp; ?>">Compare
                    </a></li>
                <li><a
                        href="<?php echo base_url(); ?>counselling?segment=<?php echo $segment_temp; ?>">Counselling
                    </a></li>
              
                <li class="active"><a
                        href="<?php echo base_url(); ?>review?segment=<?php echo $segment_temp; ?>">Reviews
                       <!-- <?php echo $review_count; ?> --></a></li>
                <li><a
                        href="<?php echo base_url(); ?>coupon?segment=<?php echo $segment_temp; ?>">Coupons</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--banner end-->
<div class="banner inner-banner-box">
<div class="container">

    <h1>Review</h1>

</div>
</div>
<!--banner end-->

<style>

/* Override the selection box styling */`
.select2-dropdown {
    border: 1px solid #bfbfbf;
  
}


.select2-results__option--highlighted {
    /*background-color: #4CAF50; /* Custom background color for highlighted items */
    /*color: #fff; /* Custom text color for highlighted items */
    color: #000000;
    border-left: 4px solid #82bbdc;
    background: linear-gradient(to right, #f7f7f7, #7cb8db);
}


.select2-container--default .select2-search--dropdown .select2-search__field {
    border: 1px solid #a5a5a5;
}

.select2-container--default .select2-selection--single {
    background-color: #fff;
    border: 1px solid #ededf5;
    border-radius: 7px;
    padding: 4px;
    /* margin-top: 0px; */
    height: 48px;
    padding: 10px;
}

    </style>

<!--content start-->
<div class="content">
<?php 	
        /*  $course = $this->input->get('course'); 
          $brandID = $this->input->get('brand');
          $product_type = $this->input->get('product_type');
          $board = $this->input->get('board');
          $class = $this->input->get('class');
          $batch = $this->input->get('batch');
          $customer_rating = $this->input->get('customer_rating');
          $date_posted = $this->input->get('date_posted');
          $sort_by = $this->input->get('sort_by');*/
          $segment = $this->input->get('segment');
          $segment_temp = $segment;
          $res_segment=get_segement_id($segment);
          if($res_segment)
          {
            $segment = $res_segment;
          }
          $res_filter_brand = getseg_brand_list($segment);
          $res_filter_segment = get_segement();
          $res_filter_class = getseg_class_list($segment);
          $res_filter_course = getseg_crse_list($segment);
        //  $get_single_course_detail = get_single_coure_detail($course);
  
    ?>

    <!--start-->
    <div class="review-box">
    <div class="container bg-1 ">
    <?php echo message(); ?>
<!--<form action="<?php echo base_url(); ?>review-submit" method="post" enctype="multipart/form-data">-->
   
    <?php echo csrf_field(); ?>
  <!--  <input type="hidden" class="form-control" name="product_id" id="product_id" placeholder="Your Name" value="<?php echo $course; ?>">
    <input type="hidden" class="form-control" name="product_type" id="product_type" placeholder="Your Name" value="<?php echo $product_type; ?>"> -->
    <input type="hidden" class="form-control" name="user_id" id="userid" placeholder="Your Name" value="<?php echo $this->session->userdata('user_id'); ?>">
    <input type="hidden" class="form-control" name="email" id="email"  value="<?php echo $this->session->userdata('user_email'); ?>">
    <input type="hidden" class="form-control" name="name" id="name"  value="<?php echo $this->session->userdata('user_fullname'); ?>">
    <input type="hidden" class="form-control" id="phone" name="phone" value="<?php echo $this->session->userdata('user_phone'); ?>">

    <input type="hidden" value = "<?php echo $segment_temp?>" class = "segment_temp">
    <input type="hidden" value = "<?php echo $segment?>" class = "segment">
    <input type="hidden" value = "<?php //echo $course ?>" class = "course">
    <input type="hidden" value = "<?php //echo $get_single_course_detail->class_id ?>" class = "filter_class">
    <input type="hidden" value = "<?php //echo $get_single_course_detail->course_id ?>" class = "filter_course">
    <input type="hidden" value = "<?php //echo $get_single_course_detail->batch_id ?>" class = "filter_batch">
    <input type="hidden" value = "<?php //echo $get_single_course_detail->board_id ?>" class = "filter_board">
    <input type="hidden" value = "<?php //echo $get_single_course_detail->product_type ?>" class = "filter_online_offline">
        <div class="row">

            
            <div class="col-md-6 mt-3">
                <label class="input-title">Segment*</label>
                <div class="select-box">
                    <select name="filter_segment" id="filter_segment" class="filter_segment">
                <?php foreach($res_filter_segment as $segments){ ?>
                        <option value="<?php echo $segments->id; ?>" <?php //if($segments->id
                       //  == $segment){ echo 'selected'; } ?>><?php echo $segments->segment_name; ?></option>
                    <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 mt-3">
                <label class="input-title">Brand name*</label>
                <div class="select-box">
                    <select name="brand" id="brand" class = "brand">
                    <option value = "">Select</option>
                        <?php foreach($brand_records as $brands){?>
                        <option value="<?php echo $brands->brand_id; ?>" <?php //if($brands->brand_id == @$get_single_course_detail->brand_id){ echo 'selected'; } ?>><?php echo $brands->brand_name; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <?php 
                if($board_records)
                {
                    $filter_cbsc_id = $board_records[0]->board_id ;
                    $filter_cbsc_name = $board_records[0]->board_name ;
                    $filter_icsc_id = $board_records[1]->board_id;
                    $filter_icsc_name = $board_records[1]->board_name;
                }
                $filter_online_id = '1';
                $filter_online_name = 'Online';
                $filter_offline_id = '2';
                $filter_offline_name = 'Offline';
            ?>
             <div class="col-md-6 col-sm-12 mt-3">
             <label class="input-title">Board name</label>
             <div class="board-k12 select-box" style="display:none">
                            <div class="btn-group btn-toggle filter-toggle-box">
                            <div class="input-toggle toggle_cbsc <?php //if(@$filter_cbsc_id == $get_single_course_detail->board_id){ echo 'active';} ?>"
                                id="cbsc-toggle">
                                <label><?php echo $filter_cbsc_name ?> </label>

                                <input class="btn btn-lg btn-default" type="radio" name="product_type"
                                    <?php if(@$filter_cbsc_id == 2){ echo 'checked';} ?>
                                    id="cbsc" value="2" >
                            </div>
                            <div class="input-toggle toggle_icsc <?php //if(@$filter_icsc_id == $get_single_course_detail->board_id){ echo 'active';} ?>"
                                id="icsc-toggle">
                                <label><?php echo $filter_icsc_name ?></label>
                                <input class="btn btn-lg btn-primary active" type="radio" name="product_type"
                                    <?php if(@$filter_icsc_id == 1){ echo 'checked';} ?>
                                    id="icsc" value="1" >
                            </div>
                        </div>
                        </div> 

                        <div class="board-other select-box" style="display:none">
                                                   
                                                   <div class="btn-group btn-toggle filter-toggle-box">
                                                       <div class="input-toggle toggle_online <?php //if(@$filter_online_id == $get_single_course_detail->product_type){ echo 'active';} ?>"
                                                           id="online-toggle">
                                                           <label><?php echo $filter_online_name ?> </label>
                       
                                                           <input class="btn btn-lg btn-default" type="radio" name="product_type"
                                                               <?php if(@$filter_online_id == 1){ echo 'checked';} ?>
                                                               id="online" value="1" >
                                                       </div>
                                                       <div class="input-toggle toggle_offline <?php //if(@$filter_offline_id == $get_single_course_detail->product_type){ echo 'active';} ?>"
                                                           id="offline-toggle">
                                                           <label><?php echo $filter_offline_name ?></label>
                                                           <input class="btn btn-lg btn-primary active" type="radio" name="product_type"
                                                               <?php if(@$filter_offline_id == 2){ echo 'checked';} ?>
                                                               id="offline" value="2" >
                                                       </div>
                                                   </div>
                                               </div>

            </div>
            

            <div class="col-md-6 col-sm-12 mt-3">
                <label class="input-title cal-h3">Class</label>
                <div class="select-box">
                <select name="filter_class_dropdown" id="filter_class_dropdown">
                <option value = "">Select</option>
                <?php foreach($res_filter_class as $classes){?>
                <option value="<?php echo $classes->class_id; ?>" <?php //if($classes->class_id == @$get_single_course_detail->class_id){ echo 'selected'; } ?>><?php echo $classes->title; ?></option>
                <?php } ?>
                        </select>
        </div>
        </div>
            
            

            <div class="col-md-6 col-sm-12 mt-3">
                <label class="input-title">Select Course</label>
                <div class="select-box">
                <select name="filter_course_dropdown" id="filter_course_dropdown">
                <option value = "">Select</option>
                <?php foreach($res_filter_course as $classes){?>
                <option value="<?php echo $classes->id; ?>" <?php //if($classes->id == @$get_single_course_detail->course_id){ echo 'selected'; } ?>><?php echo $classes->course_name; ?></option>
                <?php } ?>
                        </select>
        </div>
        </div>

        
                    
        <div class="col-md-6 col-sm-12 mt-3">
                <label class="input-title">Batch (Cohort) <span>Please select year that you will be appearing exam</span></label>
                <div class="select-box">
                <select name="batch" id="batch">
                <option value = "">Select</option>
                        <?php foreach($batch_records as $batchs){?>
                        <option value="<?php echo $batchs->batch_id; ?>" <?php //if($batchs->batch_id == @$get_single_course_detail->batch_id){ echo 'selected'; } ?>><?php echo $batchs->batch_name; ?></option>
                        <?php } ?>
                    </select>
                </div>
        </div>


        <div class="review-field-row mt-3">
            <div class="review-col">
                <label class="input-title">Title</label>
                <input type="text" placeholder="Title related to review " name="review_title" class="review-input">
                <!--<div class="checkbox-col">
                    <div class="checkbox">
                        <input type="checkbox" value="2" name="review_associated_offline" id="checkbox-1" <?php if($product_type == 2){ echo 'checked'; } ?>><label for="checkbox-1"></label>
                    </div>
                    Is this review associated with offline course
                </div> -->
            </div>
        </div>
        <div class="review-field-row ">
            <div class="review-col">
                <label class="input-title">Ratings </label>
                <div class="review-checkbox rating-style">
                <input type="hidden" id="rating" name="rating" value="<?php// echo $customer_rating; ?>">
                    <div class="rating">
                    <i class="ratings_stars fa fa-star <?php //if($customer_rating >= 1){ echo 'selected'; } ?>" data-rating="1"></i>
                    <i class="ratings_stars fa fa-star <?php //if($customer_rating >= 2){ echo 'selected'; } ?>" data-rating="2"></i>
                    <i class="ratings_stars fa fa-star <?php //if($customer_rating >= 3){ echo 'selected'; } ?>" data-rating="3"></i>
                    <i class="ratings_stars fa fa-star <?php //if($customer_rating >= 4){ echo 'selected'; } ?>" data-rating="4"></i>
                    <i class="ratings_stars fa fa-star <?php //if($customer_rating >= 5){ echo 'selected'; } ?>" data-rating="5"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="reply-box">
            <div class="reply-editor">
                <!-- <div id="summernote"></div> -->
              <!--  <textarea class="summernote" name="comment"></textarea>--->
              <textarea class="write_review_notes" name="comment" rows="4" style= "width:100%" ></textarea>
            </div>
            <div class="reply-footer d-flex flex-wrap justify-content-between align-items-center">
                <!--<div class="reply-footer-left">
                    <div class="checkbox-col">
                        <div class="checkbox">
                            <input type="checkbox" name="review_discussion" value="1" id="checkbox-2"><label for="checkbox-2"></label>
                        </div>
                        Get updates on this discussion
                    </div>
                </div>  -->
                <!--<?php if($this->session->userdata('user_id')){ ?>
                 <div class="reply-footer-right">
                    <button type="submit"  data-bs-effect="effect-scale"  class="reply-footer-btn">Post</button>
                </div>
                <?php }else{ ?>
                    <div class="reply-footer-right">
                    <a href="javascript:void(0)" class="reply-footer-btn" data-bs-effect="effect-scale"  data-bs-target="#login-button">Post</a></div>
                <?php } ?> -->


                <?php if($this->session->userdata('user_id')){ ?>
                                            <input type="hidden" value = "<?php echo $this->session->userdata('user_id')?>" class = "user_id">
                                            
                                            <button type=" button" 
                                                class="btn btn-primary text-right btn-md mb-1 form-control cnfrmreview mt-3">Submit </button>
                                            <?php }else{ ?>
                                            <a href="javascript:void(0)" class="btn btn-primary text-right btn-md mb-1"
                                                data-bs-effect="effect-scale" data-bs-toggle="modal"
                                                data-bs-target="#login-button mt-3">Submit</a>
                                            <!--     <button type="button" class="review-btn" data-bs-effect="effect-scale" data-bs-toggle="modal" data-bs-target="#exampleModal3">Get Your Coupon Here</button> -->
                                            <?php } ?>
                
            </div>
        </div>
<!--</form>-->
    </div>
    </div>
    <!--end-->
</div>
<!--content end-->
</div>
<!--wrapper end-->

<!--Star Rating Modal -->
<div class="modal rateModal-box fade" id="rateModal" tabindex="-1" aria-labelledby="rateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">

                <h2 class="rateModal-title">How would you like to rate BYJU's?</h2>
                <div class="rateModal-container">

                    <div class="rate-row d-flex justify-content-between align-items-center">
                        <div class="rate-col rate-title">How was your experience with BYJU’s</div>

                        <div class="rate-col d-flex">
                            <div class="rate-rating"><img src="images/rate-rating.png" alt=""></div>
                            <button type="button" class="rate-close"><img src="images/close2.png" alt=""></button>
                        </div>
                    </div>

                    <div class="rate-row d-flex justify-content-between align-items-center">
                        <div class="rate-col rate-title">Faculty</div>

                        <div class="rate-col d-flex">
                            <div class="rate-rating"><img src="images/rate-rating.png" alt=""></div>
                            <button type="button" class="rate-close"><img src="images/close2.png" alt=""></button>
                        </div>
                    </div>

                    <div class="rate-row d-flex justify-content-between align-items-center">
                        <div class="rate-col rate-title">Customer support</div>

                        <div class="rate-col d-flex">
                            <div class="rate-rating"><img src="images/rate-rating.png" alt=""></div>
                            <button type="button" class="rate-close"><img src="images/close2.png" alt=""></button>
                        </div>
                    </div>

                    <div class="rate-row d-flex justify-content-between align-items-center">
                        <div class="rate-col rate-title">Refund policy</div>

                        <div class="rate-col d-flex">
                            <div class="rate-rating"><img src="images/rate-rating.png" alt=""></div>
                            <button type="button" class="rate-close"><img src="images/close2.png" alt=""></button>
                        </div>
                    </div>

                    <div class="rate-row d-flex justify-content-between align-items-center">
                        <div class="rate-col rate-title">Ease of use</div>

                        <div class="rate-col d-flex">
                            <div class="rate-rating"><img src="images/rate-rating.png" alt=""></div>
                            <button type="button" class="rate-close"><img src="images/close2.png" alt=""></button>
                        </div>
                    </div>

                    <div class="rate-row d-flex justify-content-between align-items-center">
                        <div class="rate-col rate-title">Aspect 6</div>

                        <div class="rate-col d-flex">
                            <div class="rate-rating"><img src="images/rate-rating.png" alt=""></div>
                            <button type="button" class="rate-close"><img src="images/close2.png" alt=""></button>
                        </div>
                    </div>

                    <div class="rate-row d-flex justify-content-between align-items-center">
                        <div class="rate-col rate-title">Aspect 7</div>

                        <div class="rate-col d-flex">
                            <div class="rate-rating"><img src="images/rate-rating.png" alt=""></div>
                            <button type="button" class="rate-close"><img src="images/close2.png" alt=""></button>
                        </div>
                    </div>

                    <div class="rate-row d-flex justify-content-between align-items-center">
                        <div class="rate-col rate-title">Aspect 8</div>

                        <div class="rate-col d-flex">
                            <div class="rate-rating"><img src="images/rate-rating.png" alt=""></div>
                            <button type="button" class="rate-close"><img src="images/close2.png" alt=""></button>
                        </div>
                    </div>

                    <div class="editor-box">
                        <p class="editor-title">(Optional)</p>
                        <div class="editor-inner-box">
                            <img src="images/editor3.png" alt="">
                        </div>
                    </div>

                    <!--<div class="rate-checkbox checkbox-col">
                        <div class="checkbox">
                            <input type="checkbox" value="" id="checkbox-2"><label for="checkbox-2"></label>
                        </div>
                        Get updates on this discussion
                    </div>-->

                    <div>
                        <button type="button" class="rate-submit-btn">Submit</button>
                    </div>                    
                </div>

            </div>


        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script>

$(document).ready(function() {
//     $("form").on('submit', function(){
//    $('#rateModal').show();
// })



    $('.summernote').summernote({
height: 300,
});

  /** Apply Select 2 */
  $('.filter_segment').select2();
            $('.brand').select2();
            $('#filter_class_dropdown').select2();
            $('#filter_course_dropdown').select2();
            $('#batch').select2();
            $('#board').select2();

        var filter_toggle_online = $("#online").val();
        var filter_toggle_offline = $("#offline").val();
        var filter_segment_id = $('.segment').val();
        var filter_brand_id = $('#brand').val();
        var filter_class_id = $('.filter_class').val();
        var filter_course_id = $('.filter_course').val();
        var filter_batch_id = $('.filter_batch').val();
        var filter_board_id = $('.filter_board').val();
        var write_review_notes = '';
        var product_id = '';
        var ratingValue = '';
        var review_title = '';
        var user_id = $('#userid').val();
        var email = $('#email').val();
        var name = $('#name').val();
        var product_id = $('#product_id').val();
        var filter_online_offline = $('.filter_online_offline').val();
        var segment_temp = $('.segment_temp').val();
        
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
                 $(".cal-h3").html('Class');
           }
           else
           {
                $(".cal-h3").html('Course Segment');
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
            filter_course(filter_brand_id,filter_segment_id,filter_board_id,filter_class_id);

        });
        $('.toggle_icsc').click(function() {
            filter_board_id = $('#icsc').val();
            
            $("#icsc-toggle").addClass('active');
            $("#cbsc-toggle").removeClass('active');
            filter_course(filter_brand_id,filter_segment_id,filter_board_id,filter_class_id);

        });
        $('.toggle_online').click(function() { 
            filter_board_id = $('#online').val();
            $("#offline-toggle").removeClass('active');
            $("#online-toggle").addClass('active');
            filter_course(filter_brand_id,filter_segment_id,filter_board_id,filter_class_id);

        });
        $('.toggle_offline').click(function() {
            filter_board_id = $('#offline').val();
            $("#online-toggle").removeClass('active');
            $("#offline-toggle").addClass('active');
            filter_course(filter_brand_id,filter_segment_id,filter_board_id,filter_class_id);
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
       
        function filter_brand(segment_id)
        {
             filter_brand_id ='';
             
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
                                product_id = response.data[i].product_id;
                            }
                            options += '<option value="' + response.data[i].brand_id + '">' + response.data[i].brand_name + '</option>';
                        }
                        $('#brand').empty().append(options);
                        console.log(response);
                        if(filter_brand_id_temp)
                        {
                            filter_class(filter_brand_id,segment_id) 
                        }

                    }
                });
        }

        function filter_class(brand_id,segment_id)
        {
            filter_class_id = '';
             
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
                        product_id = response.data[i].product_id;
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
            filter_course_id = '';
             
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
                        filter_course_id_temp = filter_course_id;
                        product_id = response.data[i].product_id;
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
            filter_batch_id = '';
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
                        product_id = response.data[i].product_id;
                    }
                    options += '<option value="' + response.data[i].batch_id + '">' + response.data[i].batch_name + '</option>';
                }
                //console.log(options);
                $('#batch').empty().append(options); 
              }
           });
        }
         

      
          /** End Filter Section */

         
            $('.cnfrmreview').click(function() {
                
                write_review_notes = $('.write_review_notes').val();
                review_title = $('.review-input').val();
                if(!filter_segment_id)
                {
                   alert("Select Segement");    
                   return false;
                }
                if(!filter_brand_id)
                {   
                    alert("Select Brand");        
                    return false;       
                }
                if(!filter_board_id)
                {
                   alert("Select Board");          
                   return false;            
                }
                if(!filter_class_id)
                {   
                    alert("Select Class");        
                    return false;       
                }
                if(!filter_course_id)
                {   
                    alert("Select Course");        
                    return false;       
                }
                
                if(!filter_batch_id)
                {
                    alert("Select Batch");
                    return false;
                }
                if(review_title == '')
                {
                    alert("review title  should not be empty.");
                    $('.review_title').focus();
                    return false;
                }
                if(ratingValue == '')
                {
                    alert("Select Rating");
                   
                    return false;
                }
                if(write_review_notes == '')
                {
                    alert("Write Note");
                    $('.write_review_notes').focus();
                    return false;
                }
                
                
                /*else{*/
                    
                   $.ajax({
                        type : 'POST',    
                        url: "<?php echo base_url(); ?>filter/submit_review",
                        data:{
                            segment:filter_segment_id,
                            board: filter_board_id,
                            class: filter_class_id,
                            brand_id : filter_brand_id,
                            course : filter_course_id,
                            batch: filter_batch_id,
                            rating: ratingValue,
                            note: write_review_notes,
                            review_title : review_title,
                            user_id : user_id,
                            email : email,
                            name : name,
                            product_id: product_id,

                        }, 
                        dataType: "json",   
                        success: function (response) {
                            console.log(response.data);
                            if(response.status == '1')
                            {
                                alert(response.data);
                                window.location="<?php echo base_url();?>review/?segment="+segment_temp;
                            }
                        }
                    });

               // }

          });

          $('.ratings_stars').click(function()
          {
             //ratingValue = $('#rating').val();
              ratingValue = $(this).data('rating');
            //alert(ratingValue);
          });

   /* $('#category').change(function() {
        var category_id = $('#category').val();
        if (category_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>get-category-list",
                method: "get",
                data: {
                    category_id: category_id
                },
                success: function(data) {
                    $('#board').html(data);
                   // $('#city').html('<option value="">Select City</option>');
                }
            });
        }
    });

        $('#board').change(function() {
        var board_id = $('#board').val();
        if (board_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>get-category-list",
                method: "get",
                data: {
                    board_id: board_id
                },
                success: function(data) {
                    $('#brand').html(data);
                   // $('#city').html('<option value="">Select City</option>');
                }
            });
        }
    });
    $('#brand').change(function() {
        var brand_id = $('#brand').val();
        if (brand_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>get-category-list",
                method: "get",
                data: {
                    brand_id: brand_id
                },
                success: function(data) {
                    $('#class').html(data);
                   // $('#city').html('<option value="">Select City</option>');
                }

            });
}
    });

    $('#class').change(function(){
        var class_id = $('#class').val();
        if(class_id != '')
        {
        $.ajax({
            url:"<?php echo base_url(); ?>get-category-list",
            method:"get",
            data:{class_id:class_id},
            success:function(data)
            {
            $('#batch').html(data);
            }
        });
        }
    }); 
	
	$('#batch').change(function(){
		var category_id = $('#category').val();
		var board_id = $('#board').val();
		var brand_id = $('#brand').val();
        var class_id = $('#class').val();
		var batch_id = $('#batch').val();
		var product_type = $('#product_type').val();
		
        if(batch_id != '')
        {
        $.ajax({
            url:"<?php echo base_url(); ?>get-product-data",
            method:"post",
            data:{category_id:category_id,board_id:board_id,brand_id:brand_id,class_id:class_id,batch_id:batch_id,product_type:product_type},
            success:function(data)
            {
           //$('#batch').html(data);
            }
        });
        }
    }); 
});*/

$('.rating').on('click', '.ratings_stars', function () {
  var star = $(this)
  star.addClass('selected')
  star.prevAll().addClass('selected')
  star.nextAll().removeClass('selected')
  $('#rating').val(star.data('rating'))
});

});
</script>