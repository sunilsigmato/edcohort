<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!--banner start-->
<div class="banner inner-banner-box">
<div class="container">

    <h1>Review</h1>

</div>
</div>
<!--banner end-->

<!--content start-->
<div class="content">
<?php 	  $course = $this->input->get('course'); 
          $brandID = $this->input->get('brand');
          $product_type = $this->input->get('product_type');
          $board = $this->input->get('board');
          $class = $this->input->get('class');
          $batch = $this->input->get('batch');
          $customer_rating = $this->input->get('customer_rating');
          $date_posted = $this->input->get('date_posted');
          $sort_by = $this->input->get('sort_by');
          $segment = $this->input->get('segment');
          $res_filter_brand = getseg_brand_list($segment);
          $res_filter_segment = get_segement();
          $res_filter_class = getseg_class_list($segment);
          $res_filter_course = getseg_crse_list($segment);
          $get_single_course_detail = get_single_coure_detail($course);
          
    ?>

    <!--start-->
    <div class="review-box">
    <div class="container bg-1 ">
    <?php echo message(); ?>
<!--<form action="<?php echo base_url(); ?>review-submit" method="post" enctype="multipart/form-data">-->
   
    <?php echo csrf_field(); ?>
    <input type="hidden" class="form-control" name="product_id" id="product_id" placeholder="Your Name" value="<?php echo $course; ?>">
    <input type="hidden" class="form-control" name="product_type" id="product_type" placeholder="Your Name" value="<?php echo $product_type; ?>">
    <input type="hidden" class="form-control" name="user_id" id="userid" placeholder="Your Name" value="<?php echo $this->session->userdata('user_id'); ?>">
    <input type="hidden" class="form-control" name="email" id="email"  value="<?php echo $this->session->userdata('user_email'); ?>">
    <input type="hidden" class="form-control" name="name" id="name"  value="<?php echo $this->session->userdata('user_fullname'); ?>">
    <input type="hidden" class="form-control" id="phone" name="phone" value="<?php echo $this->session->userdata('user_phone'); ?>">

    <input type="hidden" value = "<?php echo $segment?>" class = "segment">
    <input type="hidden" value = "<?php echo $course ?>" class = "course">
    <input type="hidden" value = "<?php echo $get_single_course_detail->class_id ?>" class = "filter_class">
    <input type="hidden" value = "<?php echo $get_single_course_detail->course_id ?>" class = "filter_course">
    <input type="hidden" value = "<?php echo $get_single_course_detail->batch_id ?>" class = "filter_batch">
    <input type="hidden" value = "<?php echo $get_single_course_detail->board_id ?>" class = "filter_board">
        <div class="row">

            <div class=" col-md-6">
                <label class="input-title">Write a*</label>
                <div class="select-box">
                    <select name="write_review" id="write_review">
                        <option selected>Review</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <label class="input-title">Segment*</label>
                <div class="select-box">
                    <select name="filter_segment" id="filter_segment" class="filter_segment">
                <?php foreach($res_filter_segment as $segments){ ?>
                        <option value="<?php echo $segments->id; ?>" <?php if($segments->id
                         == $segment){ echo 'selected'; } ?>><?php echo $segments->segment_name; ?></option>
                    <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <label class="input-title">Brand name*</label>
                <div class="select-box">
                    <select name="brand" id="brand" class = "brand">
                        <?php foreach($brand_records as $brands){?>
                        <option value="<?php echo $brands->brand_id; ?>" <?php if($brands->brand_id == @$get_single_course_detail->brand_id){ echo 'selected'; } ?>><?php echo $brands->brand_name; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="col-6">
                <label class="input-title">Class</label>
                <div class="select-box">
                <select name="filter_class_dropdown" id="filter_class_dropdown">
                <?php foreach($res_filter_class as $classes){?>
                <option value="<?php echo $classes->class_id; ?>" <?php if($classes->class_id == @$get_single_course_detail->class_id){ echo 'selected'; } ?>><?php echo $classes->title; ?></option>
                <?php } ?>
                        </select>
        </div>
        </div>
            
            <div class="col-6">
                <label class="input-title">Select Board</label>
                <div class="select-box">
                <select name="board" id="board">
                <?php foreach($board_records as $boards){?>
                <option value="<?php echo $boards->board_id; ?>" <?php if($boards->board_id == $get_single_course_detail->board_id){ echo 'selected'; } ?>><?php echo $boards->board_name; ?></option>
                <?php } ?>
                        </select>
            </div>
            </div>
            
            

            <div class="col-6">
                <label class="input-title">Select Course</label>
                <div class="select-box">
                <select name="filter_course_dropdown" id="filter_course_dropdown">
                <?php foreach($res_filter_course as $classes){?>
                <option value="<?php echo $classes->id; ?>" <?php if($classes->id == @$get_single_course_detail->course_id){ echo 'selected'; } ?>><?php echo $classes->course_name; ?></option>
                <?php } ?>
                        </select>
        </div>
        </div>

        
                    
        <div class="col-6">
                <label class="input-title">Batch (Cohort) <span>Please select year that you will be appearing exam</span></label>
                <div class="select-box">
                <select name="batch" id="batch">
                        <?php foreach($batch_records as $batchs){?>
                        <option value="<?php echo $batchs->batch_id; ?>" <?php if($batchs->batch_id == @$get_single_course_detail->batch_id){ echo 'selected'; } ?>><?php echo $batchs->batch_name; ?></option>
                        <?php } ?>
                    </select>
                </div>
        </div>


        <div class="review-field-row">
            <div class="review-col">
                <label class="input-title">Title</label>
                <input type="text" placeholder="Title related to review " name="review_title" class="review-input">
                <div class="checkbox-col">
                    <div class="checkbox">
                        <input type="checkbox" value="2" name="review_associated_offline" id="checkbox-1" <?php if($product_type == 2){ echo 'checked'; } ?>><label for="checkbox-1"></label>
                    </div>
                    Is this review associated with offline course
                </div>
            </div>
        </div>
        <div class="review-field-row">
            <div class="review-col">
                <label class="input-title">Ratings (Optional)</label>
                <div class="review-checkbox rating-style">
                <input type="hidden" id="rating" name="rating" value="<?php echo $customer_rating; ?>">
                    <div class="rating">
                    <i class="ratings_stars fa fa-star <?php if($customer_rating >= 1){ echo 'selected'; } ?>" data-rating="1"></i>
                    <i class="ratings_stars fa fa-star <?php if($customer_rating >= 2){ echo 'selected'; } ?>" data-rating="2"></i>
                    <i class="ratings_stars fa fa-star <?php if($customer_rating >= 3){ echo 'selected'; } ?>" data-rating="3"></i>
                    <i class="ratings_stars fa fa-star <?php if($customer_rating >= 4){ echo 'selected'; } ?>" data-rating="4"></i>
                    <i class="ratings_stars fa fa-star <?php if($customer_rating >= 5){ echo 'selected'; } ?>" data-rating="5"></i>
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
                <div class="reply-footer-left">
                    <div class="checkbox-col">
                        <div class="checkbox">
                            <input type="checkbox" name="review_discussion" value="1" id="checkbox-2"><label for="checkbox-2"></label>
                        </div>
                        Get updates on this discussion
                    </div>
                </div>
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
                                                class="btn btn-primary text-right btn-md mb-1 form-control cnfrmreview">Submit </button>
                                            <?php }else{ ?>
                                            <a href="javascript:void(0)" class="btn btn-primary text-right btn-md mb-1"
                                                data-bs-effect="effect-scale" data-bs-toggle="modal"
                                                data-bs-target="#login-button">Submit</a>
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

                    <div class="rate-checkbox checkbox-col">
                        <div class="checkbox">
                            <input type="checkbox" value="" id="checkbox-2"><label for="checkbox-2"></label>
                        </div>
                        Get updates on this discussion
                    </div>

                    <div>
                        <button type="button" class="rate-submit-btn">Submit</button>
                    </div>



                </div>

            </div>


        </div>
    </div>
</div>
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

       
      
        $("#filter_segment").change(function()
        {
            filter_segment_id =  $(this).val();
             $.ajax({
              type : 'POST',    
               url: "<?php echo base_url(); ?>filter/get_brand_detail",
              data:{
                segment:filter_segment_id,
              }, 
              dataType: "json",   
              success: function (response) {
                // console.log(response.data);
                 var options = '';
                for (var i = 0; i < response.data.length; i++) {
                    options += '<option value="' + response.data[i].brand_id + '">' + response.data[i].brand_name + '</option>';
                }
                //console.log(options);
                $('#brand').empty().append(options); 
              }
           });
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
       
        $("#brand").change(function()
        {
            filter_brand_id = $(this).val();
             $.ajax({
              type : 'POST',    
               url: "<?php echo base_url(); ?>filter/get_filter_class_detail",
              data:{
                brand_id : filter_brand_id,
                segment:filter_segment_id,
              }, 
              dataType: "json",   
              success: function (response) {
                  // console.log(response.data);
                  var options = '';
                for (var i = 0; i < response.data.length; i++) {
                    options += '<option value="' + response.data[i].class_id + '">' + response.data[i].title + '</option>';
                }
                //console.log(options);
                $('#filter_class_dropdown').empty().append(options); 
              }
           });

        });

        $("#filter_class_dropdown").change(function()
        {
            filter_class_id = $(this).val();
            $.ajax({
              type : 'POST',    
               url: "<?php echo base_url(); ?>filter/get_filter_course_detail",
              data:{
                segment:filter_segment_id,
                board: filter_board_id,
                class: filter_class_id,
                brand_id : filter_brand_id,
               // batch: filter_batch_id,
              }, 
              dataType: "json",   
              success: function (response) {
                   console.log(response.data);
                  var options = '';
                for (var i = 0; i < response.data.length; i++) {
                    options += '<option value="' + response.data[i].id + '">' + response.data[i].course_name + '</option>';
                }
                //console.log(options);
                $('#filter_course_dropdown').empty().append(options); 
              }
           });

        });

        $("#filter_course_dropdown").change(function()
        {
            filter_course_id = $(this).val();
            $.ajax({
              type : 'POST',    
               url: "<?php echo base_url(); ?>filter/get_filter_batch_detail_write_review",
              data:{
                segment:filter_segment_id,
                //board: filter_board_id,
                class: filter_class_id,
                brand_id : filter_brand_id,
                course : filter_course_id,
               // batch: filter_batch_id,
              }, 
              dataType: "json",   
              success: function (response) {
                   console.log(response.data);
                  var options = '';
                for (var i = 0; i < response.data.length; i++) {
                    options += '<option value="' + response.data[i].batch_id + '">' + response.data[i].batch_name + '</option>';
                }
                //console.log(options);
                $('#batch').empty().append(options); 
              }
           });

        });

        $("#batch").change(function()
        {
             filter_batch_id = $(this).val();
        });
        $(".apply_filter").click(function()
        {
            $.ajax({
              type : 'POST',    
               url: "<?php echo base_url(); ?>filter/get_filter_result_detail",
              data:{
                segment:filter_segment_id,
                board: filter_board_id,
                class: filter_class_id,
                brand_id : filter_brand_id,
                course : filter_course_id,
                batch: filter_batch_id,
              }, 
              dataType: "json",   
              success: function (response) {
                   console.log(response.data[0]);
                   if(response.data == "")
                   {
                        alert("No data found");
                   }else{
                        filter_batch_id = response.data[0].batch_id;
                        filter_segment_id = response.data[0].segment_id;
                        filter_board_id = response.data[0].board_id;
                        product_id = response.data[0].product_id;
                        window.location="<?php echo base_url();?>coupon/?course="+product_id+"&segment="+filter_segment_id;
                   }
              }
           });

        })

          /** End Filter Section */

         
            $('.cnfrmreview').click(function() {

                write_review_notes = $('.write_review_notes').val();
                review_title = $('.review-input').val();
                if(!filter_segment_id)
                {
                   alert("Select Segement");    
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
                if(!filter_brand_id)
                {   
                    alert("Select Brand");        
                    return false;       
                }
                if(!filter_batch_id)
                {
                    alert("Select Batch");
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
                if(review_title == '')
                {
                    alert("review title  should not be empty.");
                    $('.review_title').focus();
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
                                window.location="<?php echo base_url();?>review/?course="+product_id+"&segment="+filter_segment_id;
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