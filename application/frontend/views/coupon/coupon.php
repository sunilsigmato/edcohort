<?php $course = $this->input->get('course'); 
$brandID = $this->input->get('brand');
$product_type = $this->input->get('product_type');
$board = $this->input->get('board');
$class = $this->input->get('class');
$batch = $this->input->get('batch');
$customer_rating = $this->input->get('customer_rating');
$date_posted = $this->input->get('date_posted');
$sort_by = $this->input->get('sort_by');
$segment = $this->input->get('segment');

  //  print_ex($product_list);
?>
<?php 

$get_breadcrumb = get_breadcrumb_value();
$breadcrumb_name1 = '';
$breadcrumb_name2 = '';

$get_single_course_detail = get_single_coure_detail($course);
$get_brand_compare = get_brand_compare_detail($course,$segment);

if($get_breadcrumb)
{   
    $breadcrumb_name1 = $get_breadcrumb->breadcrumb1_name;
    $breadcrumb_name2 = $get_breadcrumb->breadcrumb2_name;
}
?>
<!--banner start-->
<div class="inner-banner ">
    <div class="col-md-3 breadcrumb-design">

        <div class="breadcrumb">
            <ul>
                <li>Home</li>
                <li><?php echo @$breadcrumb_name1; ?> </li>
                <li><a href="#"><?php echo @$breadcrumb_name2; ?></a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-9">

        <div class="tab-menu">
            <ul>
                <li><a
                        href="<?php echo base_url(); ?>complaint?course=<?php echo @$course; ?>&segment=<?php echo $segment; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Complaint
                    </a></li>
                <li><a
                        href="<?php echo base_url(); ?>comparison?course=<?php echo @$course; ?>&segment=<?php echo $segment; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Compare
                    </a></li>
                <li><a
                        href="<?php echo base_url(); ?>counselling?course=<?php echo @$course; ?>&segment=<?php echo $segment; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Counselling
                    </a></li>
                <li><a
                        href="<?php echo base_url(); ?>cohort?course=<?php echo @$course; ?>&segment=<?php echo $segment; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Cohort
                    </a></li>
                <li><a
                        href="<?php echo base_url(); ?>review?course=<?php echo @$course; ?>&segment=<?php echo $segment; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Reviews
                    </a></li>
                <li class="active"><a
                        href="<?php echo base_url(); ?>coupon?course=<?php echo @$course; ?>&segment=<?php echo $segment; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Coupons
                    </a></li>
            </ul>
        </div>
    </div>
</div>
<!--banner end-->
<div class="content">

    <?php
   /* print_R(get_breadcrumb_value());
    exit;*/
?>


    <div class="container-fluid review-top-section">

        <div class="row">
            <div class="col-md-1 course-img p-3 text-center">

            <img class="card-img-top" style="height: 150px;"
                                    src="<?php echo base_url(); ?>uploads/product/image/<?php echo  $get_single_course_detail->product_image; ?>">
            </div>
            <div class="col-md-6 pt-3 course-name-display">
            <h1 class="mb-3"><?php echo  $get_single_course_detail->product_name; ?></h1>
                <div>
                    <span class="rating-btn-display"><?php echo $get_brand_compare->overall_brand ?> / 10</span>
                    <label for="rating2" class="rating-display"><img
                            src="<?php echo base_url(); ?>assets/images/rating-4.png" alt=""> </label>
                            <div class="dropdown">
  <button class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
  <img
                            src="<?php echo base_url(); ?>assets/images/rating-4.png" alt=""> </label>
  </button>

  



  <ul class="dropdown-menu p-0 m-0" aria-labelledby="dropdownMenuButton1" style="border: 0px solid">
                       
            <!------> 
    
            <li><a class="dropdown-item p-0 m-0" href="#"><div class="card" style="width: 18rem;  border: 0px solid ">
          
  <ul class="list-group list-group-flush">
  <li class="list-group-item d-flex">
    <div class="single-line" style="white-space: nowrap;">
        <img src="<?php echo base_url(); ?>assets/images/rating-4.png" alt="" style="display: inline-block; margin-right: 10px;">
        <div style="display: inline-block;">
            <span class="heading" style="font-weight:bold; font-size: larger;">3.7 out of 5</span>
        </div>
    </div>
</li>

            
    <li class="list-group-item" style="font-weight:normal;">129 ratings</li>
    <li class="list-group-item">

  
        <div class="progress my-2">
       <div class="d-flex ">
       <p>1</p>
        <div class="progress-bar" role="progressbar" style="width: 50%; background-color:orange;color:black;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
        <p>25%</p>

       </div>
        


</div>
<div class="progress my-2">
       <div class="progress-bar" role="progressbar" style="width: 50%; background-color:orange;color:black;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
     
     </div>
     <div class="progress my-2">
       
       <div class="progress-bar" role="progressbar" style="width: 75%; background-color:orange;color:black;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
     
     </div>
     <div class="progress my-2">
       
       <div class="progress-bar" role="progressbar" style="width: 100%; background-color:orange;color:black;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
     
     </div>
    </li>
  </ul>
  <div class="card-footer">
  <a href="#" class="stretched-link" style="padding:=100px">Go somewhere</a>
  </div>
</div></a></li>
             
            <!------> 
  </ul>
</div>






                </div>
                <div class="pt-3 total-review-display">
                    <h4> Excellent Review </h4>
                </div>
            </div>
            <div class="col-md-4 pt-3 write-review-icon ">
                <a href="<?php echo base_url(); ?>write-a-review?course=<?php echo @$course; ?>&segment=<?php echo $segment; ?>&brand=<?php echo $brandID; ?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board; ?>&class=<?php echo $class; ?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>"
                    class="review-btns text-decoration-none">
                    <i class="fa-solid fa-circle-user fa-2xl design-user"></i> <span> Write a review </span>
                    <label for="rating2"><img src="<?php echo base_url(); ?>assets/images/rating-1.png" alt="">
                    </label>
                </a>

            </div>

        </div>
    </div>
    <!--start-->
    <div class="review-main-box d-flex">

        <button type="button" class="filter-btn">Filter</button>

        <!--left start-->
        <div class="container-fluid review-top-section">
            <div class="row review-top-next">
                <!--- Filtr Starts  --->
                <div class="col-md-2 review-left">

                    <h3 class="filter-title">Filter</h3>
                    <form action="<?php echo base_url(); ?>coupon-search" method="post" name="form" id="form">
                        <?php echo csrf_field(); ?>

                        <div class="filter-col">
                            <h3 class="filter-col-title">BRAND</h3>
                            <div class="select-box">
                                <select name="brand" id="brand">
                                    <?php foreach($brand_records as $brands){?>
                                    <option value="<?php echo $brands->brand_id; ?>"
                                        <?php if($brands->brand_id == @$product_list['0']->brand_id){ echo 'selected'; } ?>>
                                        <?php echo $brands->brand_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="filter-col">

                            <div class="btn-group btn-toggle filter-toggle-box">
                                <div class="input-toggle <?php if(@$product_list['0']->product_type == 1){ echo 'active';} ?>"
                                    id="online-toggle">
                                    <label>Online</label>
                                    <input class="btn btn-lg btn-default" type="radio" name="product_type"
                                        <?php if(@$product_list['0']->product_type == 1){ echo 'checked';} ?>
                                        id="online" value="1" onClick="prodcutType(1)">
                                </div>
                                <div class="input-toggle <?php if(@$product_list['0']->product_type == 2){ echo 'active';} ?>"
                                    id="offline-toggle">
                                    <label>Offline</label>
                                    <input class="btn btn-lg btn-primary active" type="radio" name="product_type"
                                        <?php if(@$product_list['0']->product_type == 2){ echo 'checked';} ?>
                                        id="offline" value="2" onClick="prodcutType(2)">
                                </div>
                            </div>
                            <!-- <p class="online-results">Showing <span>(2677)</span> Online Cohort results for BYJU’s</p>-->
                        </div>

                        <div class="filter-col">
                            <h3 class="filter-col-title">BOARD</h3>
                            <div class="select-box">
                                <select name="board" id="board">
                                    <?php foreach($board_records as $boards){?>
                                    <option value="<?php echo $boards->board_id; ?>"
                                        <?php if($boards->board_id == @$product_list['0']->board_id){ echo 'selected'; } ?>>
                                        <?php echo $boards->board_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="filter-col">
                            <h3 class="filter-col-title">CLASS</h3>
                            <div class="select-box">
                                <select name="class" id="class">
                                    <?php foreach($class_records as $classes){?>
                                    <option value="<?php echo $classes->class_id; ?>"
                                        <?php if($classes->class_id == @$product_list['0']->class_id){ echo 'selected'; } ?>>
                                        <?php echo $classes->title; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>


                        <div class="filter-col">
                            <h3 class="filter-col-title">BATCH (Cohort) <span>Running Year</span></h3>
                            <div class="select-box">
                                <select name="batch" id="batch">
                                    <?php foreach($batch_records as $batches){?>
                                    <option value="<?php echo $batches->batch_id; ?>"
                                        <?php if($batches->batch_id == @$product_list['0']->batch_id){ echo 'selected'; } ?>>
                                        <?php echo $batches->batch_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class=" filter-col ">
                            <div class="filter-list-box">
                                <button type="submit" class="apply-btn">Apply Filter</button>
                            </div>
                        </div>
                    </form>

                </div>
                <!--left end-->
                <div class="col-md-8">
                    <!--center start-->
                    <div class="review-center coupon-center">
                        <div class="across-row">
                            <div class="across-col-box d-flex justify-content-between">
                                <!--left-->
                                <div class="across">
                                    <div class="standard-box">
                                        <div class="standard-content">
                                            <div class="standard-header">Course Details </div>
                                            <div>
                                                <h4 class="text-center mb-3">
                                                    <?php echo @$product_list['0']->product_name; ?>
                                                </h4>
                                                <p><?php echo @$product_list['0']->product_short_description; ?></p>
                                                <p><?php echo @$product_list['0']->product_description; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--right-->
                                <!-- <div class="across-right">                        
							<div class="standard-content">
								<div class="standard-header">I am Buying</div>
								<form action="">
									<div class="select-box">                            	
										<select name="confirm_bying" id="brand" class="mb-3">
                                        <?php foreach($coupon_records as $coupon){ ?> 
                                            <option value="<?php echo $coupon->coupon_id; ?>" onClick="couponconfirm_bying(<?php echo $coupon->coupon_id; ?>)"><?php echo $coupon->coupon_code ?></option>
                                        <?php } ?>
										</select>
										<a href="javascript:void(0)" class="review-btn" data-bs-effect="effect-scale" data-bs-toggle="modal" data-bs-target="#login-button">Apply Now</a>
									</div>
								</form>
							</div>
						</div> -->
                            </div>
                        
                                    <!-- Coupon New code -->
                        <div class="card">
            
                        <!-- Vinay Latest Code -->
                        <div>
                                <div class="row coupon-style ">
                                    <div class="col-md-12">
                                        <div class=" row coupon-card">
                                            <div class="col-md-10">
                                                <div class="d-flex align-items-center">
                                                    <p>
                                                        <i class="fa-solid fa-check verify-icon"></i>
                                                        Verified today
                                                    </p>
                                                    <p class="ps-5"> <i class="fa-solid fa-users"></i> 218 People Used
                                                        Today
                                                    </p>
                                                </div>
                                                <div>
                                                    <h4>Republic Day Sale:85% Off</h4>
                                                    <h6>Republic Day Sale: Upto 85% Off Sitewide + Extra 10% Off Via
                                                        ICICI B
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col-md-2 d-flex align-items-center">
                                                <div class=" coupon-card-button">Get Deal</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12  coupon-card-input ">
                                    <div class="d-flex align-items-center justify-content-center">  
                                    <div class="dropdown ">
                                    <label for="coupons">
                                                <h5>Enter
                                                    the number of
                                                    coupons</h5>
                                            </label>
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Select                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="#">Now</a></li>
                                            <li><a class="dropdown-item" href="#">Today</a></li>
                                            <li><a class="dropdown-item" href="#">Tommorow</a></li>
                                            <li><a class="dropdown-item" href="#">Select Date</a></li>
                                        </ul>
                                    </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <label for="coupons">
                                                <h5>Enter
                                                    the number of
                                                    coupons</h5>
                                            </label>
                                            <input type="date" class="form-control ms-3" id="exampleInputEmail1"
                                                style="width:300px ">
                                                
                                        </div>
                                        
                                        <hr>
                                       <!-- <div class="d-flex align-items-center justify-content-center">
                                            <label for="coupons">
                                                <h5>Enter
                                                    the number of
                                                    coupons</h5>
                                            </label>
                                            <input type="text" class="form-control ms-3" id="exampleInputEmail1"
                                                style="width:300px ">
                                                
                                        </div>
                                        <hr>-->
                                        <div class="d-flex align-items-center justify-content-center">
                                    
                  
                                        <?php if($this->session->userdata('user_id')){ ?>

<button type=" button" onClick="conformCoupons()"
    class="btn btn-primary text-right btn-md mb-1 form-control">Get
    Your
    Coupon Here </button>
<?php }else{ ?>
<a href="javascript:void(0)" class="btn btn-primary text-right btn-md mb-1"
    data-bs-effect="effect-scale" data-bs-toggle="modal"
    data-bs-target="#login-button">Get
    Your
    Coupon Here</a>
<!--     <button type="button" class="review-btn" data-bs-effect="effect-scale" data-bs-toggle="modal" data-bs-target="#exampleModal3">Get Your Coupon Here</button> -->
<?php } ?>
         
                                                
                                        </div>

   

                                    </div>
                                </div>
                            </div>
                        <!-- Vinal Lates COde Ends -->


</div>
    
                        <!-- Coupond New code ends -->


                        </div>

                    </div>
                </div>
                <!--center end-->

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

            <!--end-->


            <div class="helpful-box">
                <div class="container">

                    <h2 class="helpful-title">You might find this helpful!</h2>

                    <div class="helpful-inner-box d-flex">
                        <div class="helpful-left">
                        </div>

                        <div class="helpful-center">
                            <h3>Article topic title related to Search “Byju’s”</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum
                                has
                                been the
                                indus.....</p>
                        </div>

                        <div
                            class="helpful-right d-flex flex-wrap justify-content-center align-items-center text-center">
                            Quick Read<br /> 1 min
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--content end-->
    </div>
    <!--wrapper end-->


    <script>
    $(document).ready(function() {

        $('#category').change(function() {
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
        });

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


        $('#board').change(function() {
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
        });

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
                    }, 5000);
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
    </script>




    <!--Section-->

</div>
<!--/Section-->



<!--/Coursed Listings-->

<script type="text/javascript"><!--
function doAction(val){
        //Forward browser to new url
        window.location= base_url+'coupon/' + val;
    }
    function conformCoupons()
    {
        var coupon_date = $('#coupon_date').val();
        var segment_id = $('#segment_id').val();
        var course_id = $('#course_id').val();
        var user_id = $('#user_id').val();
        var no_of_coupon = $('#no_of_coupon').val();

        
       $.ajax({
        url: base_url+'test',
        dataType: 'json',
        type: 'post',            
        data:{ 'course' : ''+course_id+'', 'segment_id' : ''+segment_id+'','coupon_date' : ''+coupon_date+'','user_id' : ''+user_id+'','no_of_coupon' : ''+no_of_coupon+'' },                                         
        success: function(data){             
                      
    },
    

});                 

    }

    function conformCoupon(){   

    // alert();  
	 //$(".alert-outline-success").hide();
     //$("#text-message-success").html(''); 

     var course_type = $('#course_type').val();
     var course = $('#course').val();
     var brand = $('#brand').val();
     var user_id = $('#user_id').val();
     var confirm_bying = $('input[name="confirm_bying"]:checked').val();
     var coupon_count = parseInt($("#label_ready_buying_"+confirm_bying).text());
       //var value_form = $('#product_comparison').serialize();

       $.ajax({
        url: base_url+'coupon-submit',
        dataType: 'json',
        type: 'post',            
        data:{ 'course' : ''+course+'', 'brand' : ''+brand+'','confirm_bying' : ''+confirm_bying+'','user_id' : ''+user_id+'' },                                         
        success: function(data){             
           if(data.status=='1')
           {  
              var newcount = parseInt(coupon_count)+1;
              $("#label_ready_buying_"+confirm_bying).empty();
              $("#label_ready_buying_"+confirm_bying).append(newcount);
              $(".reg-message-success").show();
              $("#text-message-success").html(data.message);                   
              setTimeout(function() {
                  $(".reg-message-success").hide();
                  $("#text-message-success").html('');
                  $(".reg-message-success").hide('blind', {}, 500)
              }, 5000);                 
          }
          else if(data.status=='0')
          {  
            $(".reg-message-error").show();              
            $("#text-message-error").html(data.message);
            setTimeout(function() {
             $(".reg-message-error").hide();              
             $("#text-message-error").html('');
             $(".reg-message-error").hide('blind', {}, 500)
         }, 5000); 
        }            
    },
    beforeSend: function () {
        $("#global-loader").show();
        $("#body").addClass('opacity-body');
    },
    complete: function () {
        $("#global-loader").hide();
        $("#body").removeClass('opacity-body');
    } 

});                 

   }

   function couponconfirm_bying(id){ 
      $("#buyer_tr").show();
  }

</script>	