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
$segment_temp = $segment;
if($this->session->userdata('user_id'))
{
    $user_id = $this->session->userdata('user_id');
}

$res_segment=get_segement_id($segment);
if($res_segment)
{
   $segment = $res_segment;
}
else
{
    header("Location: " . base_url());
    exit;
}

  //  print_ex($product_list);
?>

<style>

/* Override the selection box styling */

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

<?php 

/*$get_breadcrumb = get_breadcrumb_value();
$breadcrumb_name1 = '';
$breadcrumb_name2 = '';

$get_single_course_detail = get_single_coure_detail($course);
//print_r($get_single_course_detail);

$get_brand_compare = get_brand_compare_detail($course,$segment);
$get_review_average_rating = get_review_average_rating($course);
$get_course_detail = get_course_detail($get_single_course_detail->course_id);

if($get_breadcrumb)
{   
    $breadcrumb_name1 = $get_breadcrumb->breadcrumb1_name;
    $breadcrumb_name2 = $get_breadcrumb->breadcrumb2_name;
}*/
?>
<!--banner start-->
<div class="inner-banner ">
    <div class="col-md-3 breadcrumb-design">

        <div class="breadcrumb">
            <ul>
                <li>Home</li>
                <li><?php //echo @$breadcrumb_name1; ?> </li>
                <li><a href="#"><?php //echo @$breadcrumb_name2; ?></a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-9">

        <div class="tab-menu">
            <ul>
            <li ><a href="<?php echo base_url(); ?>complaint?segment=<?php echo $segment_temp; ?>">Complaint
                    </a></li>
                <li ><a
                        href="<?php echo base_url(); ?>comparison?segment=<?php echo $segment_temp; ?>">Compare
                    </a></li>
                <li ><a
                        href="<?php echo base_url(); ?>counselling?segment=<?php echo $segment_temp; ?>">Counselling
                    </a></li>
                
                <li><a
                        href="<?php echo base_url(); ?>review?segment=<?php echo $segment_temp; ?>">Reviews
                       <!-- <?php echo $review_count; ?> --></a></li>
                <li class="active"><a
                        href="<?php echo base_url(); ?>coupon?segment=<?php echo $segment_temp; ?>">Coupons</a>
                </li>
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
            <div class="col-md-1 course-img p-3 text-center brandCard">

         <!--   <img class="card-img-top" style="height: 150px;"
                                    src="<?php echo base_url(); ?>uploads/brand/<?php echo  $get_single_course_detail->brand_image; ?>"> -->
            </div>
            <div class="col-md-6 pt-3 course-name-display">
            <h1 class="mb-3"><?php //echo  $get_course_detail; ?></h1>
                <div>
                <span class="rating-btn-display"><?php //echo $get_review_average_rating ?> </span>
                  <!-- <?php if($get_brand_compare) { ?>
                    <span class="rating-btn-display"><?php echo $get_brand_compare->overall_brand ?> / 10</span>
                  <?php } ?> -->
                    <label for="rating2" class="rating-display">
                        <!--<img
                            src="<?php echo base_url(); ?>assets/images/rating-4.png" alt="">-->
                            <div class="dropdown">
  <!-- <button class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"> -->
  <!--<img src="<?php echo base_url(); ?>assets/images/rating-4.png" alt="">--> </label>
  <!-- </button> -->


  <ul class="dropdown-menu p-0 m-0" aria-labelledby="dropdownMenuButton1" style="border: 0px solid">                     
            <li><a class="dropdown-item p-0 m-0" href="#"><div class="card" style="width: 22rem;  border: 0px solid ">
  <ul class="list-group list-group-flush">
  <li class="list-group-item d-flex">
    <div class="single-line" style="white-space: nowrap;">
        <div style="display: inline-block;">
            <span class="heading" style="font-weight:bold; font-size: larger;">3.7 out of 5</span>
        </div>
    </div>
</li>

            
    <li class="list-group-item" style="font-weight:normal;">129 Global Ratings</li>
    <li class="list-group-item">
    <div class="row">
        <div class = "col-md-2 pt-1">
            <span> 5 star </span>
        </div>
        <div class = "col-md-8">
            <div class="progress my-2">
                <div class="progress-bar" role="progressbar" style="width: 100%; background-color:orange;color:black;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">100%</div>
            </div>
        </div>
        <div class = "col-md-2 pt-1">
            <span> 100% </span>
        </div>
        <div class = "col-md-2 pt-1">
            <span> 4 star </span>
        </div>
        <div class = "col-md-8">
            <div class="progress my-2">
                <div class="progress-bar" role="progressbar" style="width: 75%; background-color:orange;color:black;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">75%</div>
            </div>
        </div>
        <div class = "col-md-2 pt-1">
            <span> 75% </span>
        </div>
        <div class = "col-md-2 pt-1">
            <span> 3 star </span>
        </div>
        <div class = "col-md-8">
            <div class="progress my-2">
                <div class="progress-bar" role="progressbar" style="width: 50%; background-color:orange;color:black;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">50%</div>
            </div>
        </div>
        <div class = "col-md-2 pt-1">
            <span> 50% </span>
        </div>
        <div class = "col-md-2 pt-1">
            <span> 2 star </span>
        </div>
        <div class = "col-md-8">
            <div class="progress my-2">
                <div class="progress-bar" role="progressbar" style="width: 25%; background-color:orange;color:black;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">25%</div>
            </div>
        </div>
        <div class = "col-md-2 pt-1">
            <span> 25% </span>
        </div>
        <div class = "col-md-2 pt-1">
            <span> 1 star </span>
        </div>
        <div class = "col-md-8">
            <div class="progress my-2">
                <div class="progress-bar" role="progressbar" style="width: 15%; background-color:orange;color:black;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">15%</div>
            </div>
        </div>
        <div class = "col-md-2 pt-1">
            <span> 15% </span>
        </div>

    </div>


    </li>
  </ul>

</div></a></li>
             
            <!------> 
  </ul>
</div>

                        </label>
  
                </div>
                <div class="pt-3 total-review-display">
                    <h4> Excellent Review </h4>
                </div>
            </div>
            <div class="col-md-4 pt-3 write-review-icon">
            <?php if ($this->session->userdata('user_id')) { ?>
            
                <a href="<?php echo base_url();?>write-a-review?course=<?php echo @$course; ?>&segment=<?php echo $segment;?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>"
                    class="review-btns text-decoration-none">
                    <i class="fa-solid fa-circle-user fa-2xl design-user"></i> <span> Write a review </span> <label
                        for="rating2"> </label>
                </a>

                
                <?php } else { ?>
                        <a href="javascript:void(0)" class="review-btns text-decoration-none" data-bs-effect="effect-scale"
                            data-bs-toggle="modal" data-bs-target="#login-button"><i class="fa-solid fa-circle-user fa-2xl design-user"></i> <span> Write a review </span> <label
                        for="rating2"> </label></a>
                        <?php } ?>
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

                    <!--<h3 class="filter-title">Filter</h3> -->
                    <form action="<?php echo base_url(); ?>coupon-search" method="post" name="form" id="form">
                        <?php echo csrf_field(); 
                        $res_filter_brand = getseg_brand_list($segment);
                        $res_filter_segment = get_segement();
                        $res_filter_class = getseg_class_list($segment);
                        $res_filter_course = getseg_crse_list($segment);
                       // print_R($res_filter_course);
                        
                        ?>
                        <div class="filter-col">
                            <h3 class="filter-col-title">Segement</h3>
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
                                <option value="all">All</option>
                                    <?php foreach($res_filter_brand as $brands){?>
                                    <option value="<?php echo $brands->brand_id; ?>"
                                        <?php if($brands->brand_id == @$get_single_course_detail->brand_id){ echo 'selected'; } ?>>
                                        <?php echo $brands->brand_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                      <!--  <div class="filter-col">
                            <div class="btn-group btn-toggle filter-toggle-box">
                                <div class="input-toggle <?php if(@$get_single_course_detail->product_type == 1){ echo 'active';} ?>"
                                    id="online-toggle">
                                    <label>Online</label>

                                    <input class="btn btn-lg btn-default" type="radio" name="product_type"
                                        <?php if(@$get_single_course_detail->product_type == 1){ echo 'checked';} ?>
                                        id="online" value="1" onClick="prodcutType(1)">
                                </div>
                                <div class="input-toggle <?php if(@$get_single_course_detail->product_type == 2){ echo 'active';} ?>"
                                    id="offline-toggle">
                                    <label>Offline</label>
                                    <input class="btn btn-lg btn-primary active" type="radio" name="product_type"
                                        <?php if(@$get_single_course_detail->product_type == 2){ echo 'checked';} ?>
                                        id="offline" value="2" onClick="prodcutType(2)">
                                </div>
                            </div>
                        </div> -->

                        <div class="filter-col">
                        <h3 class="filter-col-title">BOARD</h3>
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
                        <div class="board-k12" style="display:none">
                                                   
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
                           <!-- Online offline filter -->
                        <div class="board-other" style="display:none">
                                                   
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
                        <!-- End of Online offline filter -->

                        <!-- <p class="online-results">Showing <span>(2677)</span> Online Cohort results for BYJU’s</p>-->
                        </div>


                        <!--<div class="filter-col">
                            <h3 class="filter-col-title">BOARD</h3>
                            <div class="select-box">
                                
                                <select name="board" id="board">
                                    <?php foreach($board_records as $boards){
                                       
                                        ?>
                                    <option value="<?php echo $boards->board_id; ?>"
                                        <?php if($boards->board_id == @$product_list['0']->board_id){ echo 'selected'; } ?>>
                                        <?php echo $boards->board_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div> -->

                        <div class="filter-col">
                            <h3 class="filter-col-title cal-h3">CLASS</h3>
                            <div class="select-box">
                                <select name="filter_class_dropdown" id="filter_class_dropdown">
                                <option value="all">All</option>
                                    <?php foreach($res_filter_class as $classes){?>
                                    <option value="<?php echo $classes->class_id; ?>"
                                        <?php //if($classes->class_id == @$get_single_course_detail->class_id){ echo 'selected'; } ?>>
                                        <?php echo $classes->title; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="filter-col">
                            <h3 class="filter-col-title">COURSE</h3>
                            <div class="select-box">
                                <select name="filter_course_dropdown" id="filter_course_dropdown">
                                <option value="all">All</option>
                                    <?php foreach($res_filter_course as $classes){?>
                                    <option value="<?php echo $classes->id; ?>"
                                        <?php //if($classes->id == @$get_single_course_detail->course_id){ echo 'selected'; } ?>>
                                        <?php echo $classes->course_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>


                        <div class="filter-col">
                            <h3 class="filter-col-title">BATCH (Cohort) <span>Running Year</span></h3>
                            <div class="select-box">
                                <select name="batch" id="batch">
                                <option value="all">All</option>
                                    <?php foreach($batch_records as $batches){?>
                                    <option value="<?php echo $batches->batch_id; ?>"
                                        <?php //if($batches->batch_id == @$get_single_course_detail->batch_id){ echo 'selected'; } ?>>
                                        <?php echo $batches->batch_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class=" filter-col ">
                            <div class="filter-list-box">
                                <button type="button" class="apply-btn apply_filter">Apply Filter</button>
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
                        <style>
     </style>

    <div class="container pt-3">
    <div class="voucher-container d-flex flex-column flex-md-row">
        <div class="voucher-body col-md-8">
            <div class="voucher-title">VOUCHER</div>
            <div class="voucher-validity">Valid Until <strong>23 June 2023</strong></div>
            <div class="voucher-description">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus volutpat velit at magna vehicula luctus.
            </div>
        </div>
         <div class="row voucher-label col-md-4">
            <div class="col-md-5"> 
                <span class="voucher-text col-md-2">VOUCHER</span>
            </div>
            <div class="col-md-5" style="align-content: space-around;"> 
            <span class="voucher-amount">$25</span> 
            </div>
        
        
    </div>
    </div>
   <!--<div class="hr-coupon"> </div>-->

<div class="selection ">
    <?php if($this->session->userdata('user_id')){ ?>
                                        
                                        <div class="coupon-option">
                                        <div class = "coupon-label-radio">
                                           <label class="me-3 button-cls">
                                               <input type="radio" value="today" class="option-input radio date_radio" name="group1" />
                                               <div class = "coupon-label-type">  Today </div>
                                           </label>
                                       </div>
                                       <div class = "coupon-label-radio">
                                           <label class="me-3 button-cls">
                                               <input type="radio" value="tommorow" class="option-input radio date_radio" name="group1" />
                                               <div class = "coupon-label-type"> Tommorow </div>
                                           </label>
                                       </div>
                                       <div class = "coupon-label-radio">
                                           <label class="me-3 button-cls">
                                               <input type="radio" value="day_after_tmr" class="option-input radio date_radio" name="group1" />
                                               <div class = "coupon-label-type"> Day After Tomorrow   </div>
                                           </label>
                                       </div>
                                   </div>


                                           <?php }else{ ?>
                                               <fieldset id="group1">
                                               <a href="javascript:void(0)" class=" text-right btn-md mb-1"
                                               data-bs-effect="effect-scale" data-bs-toggle="modal"
                                               data-bs-target="#login-button">
                                              
                                        <div class="coupon-option">
                                        <div class = "coupon-label-radio">
                                           <label class="me-3 button-cls">
                                               <input type="radio" value="today" class="option-input radio date_radio_login" name="group1" />
                                               <div class = "coupon-label-type">  Today </div>
                                           </label>
                                       </div>
                                       <div class = "coupon-label-radio">
                                           <label class="me-3 button-cls">
                                               <input type="radio" value="tommorow" class="option-input radio date_radio_login" name="group1" />
                                               <div class = "coupon-label-type"> Tommorow </div>
                                           </label>
                                       </div>
                                       <div class = "coupon-label-radio">
                                           <label class="me-3 button-cls">
                                               <input type="radio" value="day_after_tmr" class="option-input radio date_radio_login" name="group1" />
                                               <div class = "coupon-label-type"> Day After Tomorrow   </div>
                                           </label>
                                       </div>
                                   </div> 
                                           </a>
                                           </fieldset>
                                           <?php } ?>

                                           
                                           <table  class="table">
                                            
                                            <thead>
                                                <tr class="text-center">
                                                      <td class = "today_header">Today</td>
                                                      <td class = "tmr_header">Tommorow </td>
                                                      <td class = "day_after_tmr_header">Day After Tommorow </td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="danger text-center">
                                                    <td class="today"><?php //echo $res_coupon_count_today ?></td>
                                                    <td class="tommorow"><?php //echo $res_coupon_count_tommorow ?></td>
                                                    <td class="day_after_tmr_data"><?php //echo $res_coupon_count_tommorow ?></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <div class="d-flex align-items-center justify-content-center date_div coupon-title">
                                            <label for="coupons">
                                                <h3>Select  Date</h3>
                                            </label>
                                            <input type="date" class="form-control ms-3" id="date_sel"
                                                style="width:300px ">
                                                
                                        </div>
                                            
                                        <?php if($this->session->userdata('user_id')){ ?>
                                            <input type="hidden" value = "<?php echo $this->session->userdata('user_id')?>" class = "user_id">
                                            <div class="submit-div pb-3">
                                                <button type=" button" 
                                                    class="coupon-submit cnfrmcpn">Submit </button>
                                            </div>
                                            <?php }else{ ?>
                                                <div class="submit-div pb-3">
                                                    <button type=" button" 
                                                    class="coupon-submit" data-bs-target="#login-button"  data-bs-effect="effect-scale" data-bs-toggle="modal">Submit </button>
                                                </div>
                                          
                                            <!--     <button type="button" class="review-btn" data-bs-effect="effect-scale" data-bs-toggle="modal" data-bs-target="#exampleModal3">Get Your Coupon Here</button> -->
                                            <?php } ?>

    </div>
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

            <input type="hidden" value = "<?php echo $segment?>" class = "segment">
            <input type="hidden" value = "<?php //echo $course ?>" class = "course">
            <input type="hidden" value = "<?php //echo $get_single_course_detail->class_id ?>" class = "filter_class">
            <input type="hidden" value = "<?php //echo $get_single_course_detail->course_id ?>" class = "filter_course">
            <input type="hidden" value = "<?php //echo $get_single_course_detail->batch_id ?>" class = "filter_batch">
            <input type="hidden" value = "<?php //echo $get_single_course_detail->board_id ?>" class = "filter_board">
            <input type="hidden" value = "<?php //echo $get_single_course_detail->product_type ?>" class = "filter_online_offline">


    <script>

function prodcutType(val) {
        var product_type = val;
        if (product_type == 1) {
            $("#offline-toggle").removeClass('active');
            $("#online-toggle").addClass('active');

        } else {
            $("#online-toggle").removeClass('active');
            $("#offline-toggle").addClass('active');
        }

      
    }


    $(document).ready(function() {
        var radio_btn_val = '';
        filter_segment
        /** Coupon  Code **/
        $(".date_div").css("visibility", "hidden");
        $(".day_after_tmr_header").css("visibility", "hidden");
        $(".today_header").css("visibility", "hidden");
        $(".tmr_header").css("visibility", "hidden");
        $(".table").css("display", "none");
        $(".submit-div").css("display","none");

        $(".day_after_tmr_data").css("visibility", "hidden");
        $(".today").css("visibility", "hidden");
        $(".tommorow").css("visibility", "hidden");
         /** End Coupon  Code **/

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
        var filter_brand_id = $('#brand').val();
        var filter_class_id = $('.filter_class').val();
        var filter_course_id = $('.filter_course').val();
        var filter_batch_id = $('.filter_batch').val();
        var filter_board_id = $('.filter_board').val();
        var filter_online_offline = $('.filter_online_offline').val();
        var product_id = '';
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
            filter_class(filter_brand_id,filter_segment_id);

        });
        $('.toggle_icsc').click(function() {
            filter_board_id = $('#icsc').val();
            
            $("#icsc-toggle").addClass('active');
            $("#cbsc-toggle").removeClass('active');
            filter_class(filter_brand_id,filter_segment_id);

        });
        $('.toggle_online').click(function() { 
            filter_board_id = $('#online').val();
            $("#offline-toggle").removeClass('active');
            $("#online-toggle").addClass('active');
            filter_class(filter_brand_id,filter_segment_id);

        });
        $('.toggle_offline').click(function() {
            filter_board_id = $('#offline').val();
            $("#online-toggle").removeClass('active');
            $("#offline-toggle").addClass('active');
            filter_class(filter_brand_id,filter_segment_id);
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
                if(options == '')
                {
                    filter_batch_id = '';
                }
              }
           });
        }
        
        /** End Filter Section */
        
        $('.date_radio').click(function() {
             radio_btn_val = $(this).val();
             user_id = $('.user_id').val();
             segment = $('.segment').val();
             course = $('.course').val();
             
             console.log(radio_btn_val);
             if(filter_segment_id == '')
            {
                alert("Please Select Segment");
                return
            }
            if(filter_brand_id ==='' || filter_brand_id == 'all')
            {
                $(this).prop('checked', false);
                alert("Please Select Brand");
                return  
            }
            console.log(filter_brand_id);
            if(filter_board_id == '' || filter_board_id =='all')
            {
                $(this).prop('checked', false);
                alert("Please Select Board");
                return  
            }
            if(filter_class_id == '' || filter_class_id =='all')
            {
                alert("Please Select Class");
                return  
            }
            if(filter_course_id == '' || filter_course_id =='all')
            {
                $(this).prop('checked', false);
                alert("Please Select Course");
                return  
            }
            if(filter_batch_id == '' || filter_batch_id =='all')
            {
                $(this).prop('checked', false);
                alert("Please Select Course");
                return  
            }

             $.ajax({
              type : 'POST',    
               url: "<?php echo base_url(); ?>couponadd/today_tommorow_coupon_list",
              data:{
                user_id : user_id,
                segment:segment,
                course:course,
                filter_brand_id : filter_brand_id,
                filter_board_id : filter_board_id,
                filter_class_id : filter_class_id,
                filter_course_id : filter_course_id,
                filter_batch_id : filter_batch_id,
              }, 
              dataType: "json",   
              success: function (response) {
                 console.log(response);
                 $(".table").css("display", "");
                 $(".today_header").css("visibility", "visible");
                 $(".tmr_header").css("visibility", "visible");
                 $(".submit-div").css("display","");
                
                 $(".today").css("visibility", "visible");
                 $(".tommorow").css("visibility", "visible");
                 var tdElement_today = document.querySelector('.today');
                 var tdElement_tommorow = document.querySelector('.tommorow');

                 tdElement_today.innerHTML = response.today;
                 tdElement_tommorow.innerHTML = response.tommorow;
                
              }
           })

             if(radio_btn_val == 'day_after_tmr')
             {
                $(".date_div").css("visibility", "visible");
             }
             else{
                $(".date_div").css("visibility", "hidden");
              
             }

        });

        $(".date_div").change(function()
        {
            var a = $('.date_div').val(); 
            var user_id = $('.user_id').val();
            var segment = $('.segment').val();
            var course = $('.course').val();
            var date_sel = $('#date_sel').val();
            
            $.ajax({
              type : 'POST',    
               url: "<?php echo base_url(); ?>couponadd/all_coupon_count_list",
              data:{
                user_id : user_id,
                selected_date:date_sel,
                segment:segment,
                course:course,
                filter_brand_id : filter_brand_id,
                filter_board_id : filter_board_id,
                filter_class_id : filter_class_id,
                filter_course_id : filter_course_id,
                filter_batch_id : filter_batch_id,
              }, 
              dataType: "json",   
              success: function (response) {
                 console.log(response);
                 $(".day_after_tmr_header").css("visibility", "visible");
                 $(".today_header").css("visibility", "visible");
                 $(".tmr_header").css("visibility", "visible");
                 $(".submit-div").css("display","");

                 $(".day_after_tmr_data").css("visibility", "visible");
                 $(".today").css("visibility", "visible");
                 $(".tommorow").css("visibility", "visible");

                 var tdElement_day_after_tmr = document.querySelector('.day_after_tmr_data');
                 var tdElement_today = document.querySelector('.today');
                 var tdElement_tommorow = document.querySelector('.tommorow');
                 
                 tdElement_day_after_tmr.innerHTML = response.selected_date;
                 tdElement_today.innerHTML = response.today;
                 tdElement_tommorow.innerHTML = response.tommorow;
                // alert(response.message);
              }
           })
            
        });

        $('.cnfrmcpn').click(function() {
            //alert(filter_brand_id);
            /*if(!empty(filter_brand_id))
            {
                alert("byeee");
            }*/
            if(filter_segment_id == '')
            {
                alert("Please Select Segment");
                return
            }
            if(filter_brand_id ==='' || filter_brand_id == 'all')
            {
                alert("Please Select Brand");
                return  
            }
            console.log(filter_brand_id);
            if(filter_board_id == '' || filter_board_id =='all')
            {
                alert("Please Select Board");
                return  
            }
            if(filter_class_id == '' || filter_class_id =='all')
            {
                alert("Please Select Class");
                return  
            }
            if(filter_course_id == '' || filter_course_id =='all')
            {
                alert("Please Select Course");
                return  
            }
            if(filter_batch_id == '' || filter_batch_id =='all')
            {
                alert("Please Select Course");
                console.log(filter_course_id);
                return  
            }
            if(radio_btn_val == ''){
               // alert('Please select date range');
                alert('Please select date range'); 
                return 
            }else{
            
              var user_id = $('.user_id').val();
              var date_sel = $('#date_sel').val();
              var segment = $('.segment').val();
              var course = $('.course').val();
              const date = new Date();
              var day = '';
              var month = '';
              var year = '';
              var currentDate = '';
              var DateCmpr = '';
                if(radio_btn_val == 'now' || radio_btn_val == 'today')
                {
                     day = (date.getDate()).toString().padStart(2, "0");
                     month = (date.getMonth() + 1).toString().padStart(2, "0");
                     year = date.getFullYear();
                     currentDate = `${year}-${month}-${day}`;
                }
                if(radio_btn_val == 'tommorow')
                {
                     day = (date.getDate() + 1).toString().padStart(2, "0");
                     month = (date.getMonth() + 1).toString().padStart(2, "0");
                     year = date.getFullYear();
                     currentDate = `${year}-${month}-${day}`;
                }
                if(radio_btn_val == 'day_after_tmr')
                {
                     day = (date.getDate()).toString().padStart(2, "0");
                     month = (date.getMonth() + 1).toString().padStart(2, "0");
                     year = date.getFullYear();
                     DateCmpr = `${year}-${month}-${day}`;
                     if(date_sel <  DateCmpr)
                     {
                        alert("Please select proper date");
                        return
                     }
                     else{
                        currentDate = date_sel;
                     }
                }
                
            
            //console.log(currentDate);
             $.ajax({
              type : 'POST',    
               url: "<?php echo base_url(); ?>couponadd/cnfrm_coupon",
              data:{
                radio_btn_val:radio_btn_val,
                user_id : user_id,
                date:currentDate,
                segment:segment,
                course:course,
                filter_brand_id : filter_brand_id,
                filter_board_id : filter_board_id,
                filter_class_id : filter_class_id,
                filter_course_id : filter_course_id,
                filter_batch_id : filter_batch_id,
              }, 
              dataType: "json",   
              success: function (response) {
                 console.log(response.message);
                 alert(response.message);
              }
           })
            }
        }); 

        
    
    
    });

       </script>