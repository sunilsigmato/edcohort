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

   // print_ex($_GET);
?>
<!--banner start-->
<?php 

$get_breadcrumb = get_breadcrumb_value();
$breadcrumb_name1 = '';
$breadcrumb_name2 = '';

$get_single_course_detail = get_single_coure_detail($course);
//print_R($get_single_course_detail->course_id);

$get_brand_compare = get_brand_compare_detail($course,$segment);
$get_review_average_rating = get_review_average_rating($course);
$get_course_detail = get_course_detail($get_single_course_detail->course_id);
if($get_breadcrumb)
{   
    $breadcrumb_name1 = $get_breadcrumb->breadcrumb1_name;
    $breadcrumb_name2 = $get_breadcrumb->breadcrumb2_name;
}
?>
<div class="inner-banner ">
    <div class="col-md-3 breadcrumb-design">
        <div class="breadcrumb">
            <ul>
                <li>Home </li>
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
                        href="<?php echo base_url(); ?>cohort?course=<?php echo @$course; ?>&segment=<?php echo $segment; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Cohort</a>
                </li>
                <li class="active"><a
                        href="<?php echo base_url(); ?>review?course=<?php echo @$course; ?>&segment=<?php echo $segment; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Reviews
                        <?php echo $review_count; ?></a></li>
                <li><a
                        href="<?php echo base_url(); ?>coupon?course=<?php echo @$course; ?>&segment=<?php echo $segment; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Coupons</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--banner end-->
<!--content start-->
<?php
   /* print_R(get_breadcrumb_value());
    exit;*/
?>
<div class="content">
    <div class="container-fluid review-top-section">
        <div class="row">
            <div class="col-md-1 course-img p-3 text-center brandCard">
                <img class="card-img-top" style="height: 150px;"
                                    src="<?php echo base_url(); ?>uploads/brand/<?php echo  $get_single_course_detail->brand_image; ?>">
            </div>
            <div class="col-md-6 pt-3 course-name-display">
                <h1 class="mb-3"><?php echo  $get_course_detail; ?></h1>
                <div>
                <span class="rating-btn-display"><?php echo $get_review_average_rating ?> / 5</span>
                <!--<?php if($get_brand_compare) { ?>
                    <span class="rating-btn-display"><?php echo $get_brand_compare->overall_brand ?>/5</span>
                    <?php } ?>-->
                    <label for="rating2" class="rating-display">
                    <!--<img
                            src="<?php echo base_url();?>assets/images/rating-4.png" alt=""> </label>
                         </label> -->


                         <!---->
                         <div class="dropdown">
  <!-- <button class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"> -->
  <!--<img src="<?php echo base_url(); ?>assets/images/rating-4.png" alt="">--> </label>
 <!-- </button>  -->

  



  <ul class="dropdown-menu p-0 m-0" aria-labelledby="dropdownMenuButton1" style="border: 0px solid">
                       
            <!------> 
    
            <li><a class="dropdown-item p-0 m-0" href="#"><div class="card" style="width: 22rem;  border: 0px solid ">
          
  <ul class="list-group list-group-flush">
  <li class="list-group-item d-flex">
    <div class="single-line" style="white-space: nowrap;">
        <!--<img src="<?php echo base_url(); ?>assets/images/rating-4.png" alt="" style="display: inline-block; margin-right: 10px;"> -->
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






                         <!----->
                </div>
                <div class="pt-3 total-review-display">
                <h4> Excellent   Review </h4>
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
                                <option value="all">All</option>
                                    <?php foreach($res_filter_brand as $brands){?>
                                    <option value="<?php echo $brands->brand_id; ?>">
                                        <?php echo $brands->brand_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <!--<div class="filter-col">
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
                        </div> -->

                       <!-- <div class="filter-col">
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
                            <div class="input-toggle toggle_cbsc <?php if(@$filter_cbsc_id == $get_single_course_detail->board_id){ echo 'active';} ?>"
                                id="cbsc-toggle">
                                <label><?php echo $filter_cbsc_name ?> </label>

                                <input class="btn btn-lg btn-default" type="radio" name="product_type"
                                    <?php if(@$filter_cbsc_id == 2){ echo 'checked';} ?>
                                    id="cbsc" value="2" >
                            </div>
                            <div class="input-toggle toggle_icsc <?php if(@$filter_icsc_id == $get_single_course_detail->board_id){ echo 'active';} ?>"
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
                                                       <div class="input-toggle toggle_online <?php if(@$filter_online_id == $get_single_course_detail->product_type){ echo 'active';} ?>"
                                                           id="online-toggle">
                                                           <label><?php echo $filter_online_name ?> </label>
                       
                                                           <input class="btn btn-lg btn-default" type="radio" name="product_type"
                                                               <?php if(@$filter_online_id == 1){ echo 'checked';} ?>
                                                               id="online" value="1" >
                                                       </div>
                                                       <div class="input-toggle toggle_offline <?php if(@$filter_offline_id == $get_single_course_detail->product_type){ echo 'active';} ?>"
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

                       <div class="filter-col">
                            <h3 class="filter-col-title cal-h3">CLASS</h3>
                            <div class="select-box">
                                <select name="filter_class_dropdown" id="filter_class_dropdown">
                                <option value="all">All</option>
                                    <?php foreach($res_filter_class as $classes){?>
                                    <option value="<?php echo $classes->class_id; ?>">
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
                                    <option value="<?php echo $classes->id; ?>">
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
                                    <option value="<?php echo $batches->batch_id; ?>">
                                        <?php echo $batches->batch_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="filter-col">
               <h3 class="filter-col-title">TYPE</h3>
               <div class="filter-list-box">
               <ul>
               <li>
               <input type="radio" name="type" id="type1">
               <label for="type1">Unresolved <span>(112)</span></label>
               </li>
               
               <li>
               <input type="radio" name="type" id="type2">
               <label for="type2">Resolved <span>(112)</span></label>
               </li>
               </ul>
               </div>
            </div> -->
                        
                        <div class="filter-col">
                            <h3 class="filter-col-title">CUSTOMER RATING</h3>
                            <div class="filter-list-box">
                                <ul>
                                    
                                    <li>
                                            <input type="radio" name="customer_rating" id="ratingall" value="all">
                                            <label for="ratingall">All</label>
                                            
                                    </li>
                                    <li>
                                        <input type="radio" name="customer_rating" id="rating1" value="5" 
                                            <?php if(@$customer_rating == 5){ echo 'checked';} ?>>
                                        <label for="rating1"><img
                                                src="<?php echo base_url();?>assets/images/rating-5.png" alt=""></label>
                                    </li>
                                    <li>
                                        <input type="radio" name="customer_rating" id="rating2" value="4"
                                            <?php if(@$customer_rating == 4){ echo 'checked';} ?>>
                                        <label for="rating2"><img
                                                src="<?php echo base_url();?>assets/images/rating-4.png" alt=""></label>
                                    </li>
                                    <li>
                                        <input type="radio" name="customer_rating" id="rating3" value="3"
                                            <?php if(@$customer_rating == 3){ echo 'checked';} ?>>
                                        <label for="rating3"><img
                                                src="<?php echo base_url();?>assets/images/rating-3.png" alt=""></label>
                                    </li>
                                    <li>
                                        <input type="radio" name="customer_rating" id="rating4" value="2"
                                            <?php if(@$customer_rating == 2){ echo 'checked';} ?>>
                                        <label for="rating4"><img
                                                src="<?php echo base_url();?>assets/images/rating-2.png" alt=""></label>
                                    </li>
                                    <li>
                                        <input type="radio" name="customer_rating" id="rating5" value="1"
                                            <?php if(@$customer_rating == 1){ echo 'checked';} ?>>
                                        <label for="rating5"><img
                                                src="<?php echo base_url();?>assets/images/rating-1.png" alt=""></label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- <div class="filter-col">
               <h3 class="filter-col-title">DATE POSTED</h3>
               <div class="filter-list-box">
               <ul>
               <li>
               <input type="radio" name="date_posted" id="Custom1" value="21-11-2022">
               <input type="text" id="datepicker" name="date_posted"></p> 
               </li>
               </ul>
               </div>
            </div> -->
                        <div class="filter-col">
                            <h3 class="filter-col-title">SORT BY</h3>
                            <div class="filter-list-box">
                                <ul>
                                    <li>
                                        <input type="radio" name="sort_by" id="sort1" value="trending_first"
                                            <?php if(@$sort_by == 'desc'){ echo 'checked';} ?>>
                                        <label for="sort1">Trending First </label>
                                    </li>
                                    <li>
                                        <input type="radio" name="sort_by" id="sort2" value="most_critical"
                                            <?php if(@$sort_by == 'asc'){ echo 'checked';} ?>>
                                        <label for="sort2">Most Critical </label>
                                    </li>
                                </ul>
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
                        <div class="tab-link">

                            <ul>
                                <li>
                                    <a href="<?php echo base_url(); ?>review?course=<?php echo $course; ?>&segment=<?php echo $segment; ?>"
                                        class="active">All</a>
                                </li>
                                <?php if($this->session->userdata('user_id')){ ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>my-review?course=<?php echo $course; ?>&segment=<?php echo $segment; ?>">My
                                        Review</a>
                                </li>
                                <?php } else {  ?>
                                <li>
                                    <a href="javascript:void(0)" data-bs-effect="effect-scale" data-bs-toggle="modal"
                                        data-bs-target="#login-button">My Review</a>
                                </li>
                                <?php } ?>
                                

                            </ul>
                        </div>

                        <div class="total-review">
                            <!-- 9 of --><?php echo $review_count;?> Review<?php if($review_count > 1){ echo "s"; } ?>
                        </div>
                        <div class="review-box">
                            <?php if($review_list){ ?>
                            <?php foreach($review_list as $review){
                                ?>
                            <!--review row start-->
                            <div class="review-row">
                                <div class="review-user-image"><span></span></div>
                                <div
                                    class="review-title-row d-flex flex-wrap justify-content-between align-items-center">
                                    <h2 class="review-title">
                                        <?php echo ucwords($review->user_name); ?> <span><img
                                                src="<?php  base_url() ?>assets/images/verifyicon.png" alt=""></span>

                                        <div class="review-title-dropdown">
                                            <h2 class="review-title ">
                                                <div class="review-user-image"><span></span></div>
                                                <?php echo ucwords($review->user_name); ?> <span><img
                                                        src="<?php  base_url() ?>assets/images/verifyicon.png"
                                                        alt=""></span>
                                                <p>Counsellor</p>
                                            </h2>
                                            <div class="review-info-box">
                                                <div class="review-info-left">Followers 180</div>
                                                <div class="review-info-right"><a href="#">Visit Profile</a></div>
                                            </div>
                                            <a href="#" class="follow-btn">Follow</a>
                                        </div>
                                    </h2>
                                    <?php   $current = strtotime(date("Y-m-d"));
                                    $date    = strtotime($review->product_review_added);
                                    $today = '';
                                    $datediff = $date - $current;
                                    $difference = floor($datediff/(60*60*24));
                                    if($difference==0)
                                    {
                                        $today = 'today';
                                    } ?>

                                    <div class="review-rating">
                                        <?php if($review->product_rating == 1){?>
                                        <i class="fa fa-star text-yellow"></i><i class="fa fa-star"></i> <i
                                            class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                            class="fa fa-star"></i>
                                        <?php } ?>
                                        <?php if($review->product_rating == 2){?>
                                        <i class="fa fa-star text-yellow"></i><i class="fa fa-star text-yellow"></i> <i
                                            class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                            class="fa fa-star"></i>
                                        <?php } ?>
                                        <?php if($review->product_rating == 3){?>
                                        <i class="fa fa-star text-yellow"></i><i class="fa fa-star text-yellow"></i> <i
                                            class="fa fa-star text-yellow"></i> <i class="fa fa-star"></i> <i
                                            class="fa fa-star"></i>
                                        <?php } ?>
                                        <?php if($review->product_rating == 4){?>
                                        <i class="fa fa-star text-yellow"></i><i class="fa fa-star text-yellow"></i> <i
                                            class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i>
                                        <i class="fa fa-star"></i>
                                        <?php } ?>
                                        <?php if($review->product_rating == 5){?>
                                        <i class="fa fa-star text-yellow"></i><i class="fa fa-star text-yellow"></i> <i
                                            class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i>
                                        <i class="fa fa-star text-yellow"></i>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="review-date <?php echo $today ?>">
                                    <?php if(!empty($today)){ echo "Today"; }else{ echo date('d F Y',strtotime($review->product_review_added));  }?>
                                </div>

                                <hr />
                                <div>
                                    <h2 class="review-cmt-title"><?php echo $review->product_review_title; ?></h2>
                                </div>
                                <div class="review-content" id="reviewShort_<?php echo $review->product_review_id;?>">
                                    <?php echo substr($review->product_review,0,185); ?>
                                </div>
                                <?php  $words = substr_count($review->product_review, " ");
         if($words > 30){?>
                                <div class="review-read" id="review-read_<?php echo $review->product_review_id;?>">
                                    <a href="javascript:void(0)"
                                        id="reviewShortRM_<?php echo $review->product_review_id;?>"
                                        onclick="productReviewReadMore('<?php echo $review->product_review_id;?>')">(Read
                                        more)</a>
                                </div>
                                <?php } ?>
                                <div class="review-content" style="display:none"
                                    id="reviewFull_<?php echo $review->product_review_id;?>">
                                    <?php echo $review->product_review; ?>
                                    <div class="review-read">
                                        <a href="javascript:void(0)"
                                            id="reviewShortRS_<?php echo $review->product_review_id;?>"
                                            onclick="productReviewReadShort('<?php echo $review->product_review_id;?>')">(Read
                                            Short)</a>
                                    </div>
                                </div>
                                <hr />
                                <div class="review-footer d-flex flex-wrap justify-content-between align-items-center">
                                    <?php 
         $where_review_reply = 'tbl_product_review_reply.status = 1 and tbl_product_review_reply.sub_id  IS NULL and  review_id = '.$review->product_review_id.'';
         $orderby = 'tbl_customer.customer_type ASC, tbl_product_review_reply.prr_id ASC';
         $review_reply = $this->review_model->selectJoinWhereOrderby('tbl_product_review_reply','user_id','tbl_customer','customer_id',$where_review_reply,$orderby);
         ?>
                                    <?php if(sizeof($review_reply) == 0){ ?>
                                    <div class="review-footer-left mt-3"><?php echo sizeof($review_reply); ?> Replies</div>
                                    <?php } else{ ?>
                                    <div class="review-footer-left mt-3"><?php echo sizeof($review_reply); ?> Replies <a
                                            href="javascript:void(0)"
                                            onclick="viewRepliesAll('<?php echo $review->product_review_id;?>')"
                                            class="view-all-replies">View all replies</a></div>
                                    <?php } ?>
                                    <div class="review-footer-right d-flex">
                                        <?php 
                                    $likeCount = 0;
                                    $likeCountCheck =0;
                                    
                                    $where_like = 'review_id = '.$review->product_review_id.' and action = 1';
                                    $review_reply_cnt = $this->review_model->review_like_count($where_like);
                                    $likeCount = $review_reply_cnt['0']->like_count;
                                    
                                    if($this->session->userdata('user_id')){
                                    $where_like_check = 'review_id = '.$review->product_review_id.' and user_id = '.$this->session->userdata('user_id').' and action = 1';
                                    $review_reply_check = $this->review_model->review_like_count($where_like_check);
                                                        //echo  $this->db->last_query();
                                    $likeCountCheck = $review_reply_check['0']->like_count;}?>
                                         <!-- Start Like Section -->
                                        <?php if($this->session->userdata('user_id')){ ?>
                                        <?php if($likeCount > 0 ){ ?>
                                        <a href="javascript:void(0)"
                                            onclick="productReviewLike('<?php echo $review->product_review_id;?>','<?php echo $this->session->userdata('user_id'); ?>',1)">
                                            <svg xmlns="http://www.w3.org/2000/svg" id="Filled"
                                                class="fa fa-thumbs-up <?php if($likeCountCheck == 1){ echo 'active-svg';} ?>"
                                                viewBox="0 0 24 24" width="24" height="24">
                                                <path
                                                    d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Z" />
                                            </svg> <?php   echo $likeCount; ?>
                                        </a>
                                        <!-- <i class="fa fa-thumbs-up <?php if($likeCountCheck == 1){ echo 'btn-success';} ?>" ></i> <?php   echo $likeCount; ?></a> -->
                                        <?php } ?>
                                        <?php if($likeCount < 1 ) { ?>
                                        <a href="javascript:void(0)"
                                            onclick="productReviewLike('<?php echo $review->product_review_id;?>','<?php echo $this->session->userdata('user_id'); ?>',1)">
                                            <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24"
                                                width="24" height="24">
                                                <path
                                                    d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Zm-3.585,18.4a2.973,2.973,0,0,1-3.83,0C4.947,16.006,2,11.87,2,8.967a4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,11,8.967a1,1,0,0,0,2,0,4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,22,8.967C22,11.87,19.053,16.006,13.915,20.313Z" />
                                            </svg> <?php echo $likeCount; ?>
                                        </a>
                                        <?php } ?>
                                        <?php }else { ?>
                                        <a href="javascript:void(0)" data-bs-effect="effect-scale"
                                            data-bs-toggle="modal" data-bs-target="#login-button">
                                            <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24"
                                                width="24" height="24">
                                                <path
                                                    d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Zm-3.585,18.4a2.973,2.973,0,0,1-3.83,0C4.947,16.006,2,11.87,2,8.967a4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,11,8.967a1,1,0,0,0,2,0,4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,22,8.967C22,11.87,19.053,16.006,13.915,20.313Z" />
                                            </svg> <?php echo $likeCount; ?>
                                        </a>
                                        <?php } ?>
                                        <!-- Start Like Section -->

                                         <!-- Start Reply Section -->
                                        <?php if($this->session->userdata('user_id')){ ?>
                                        <a href="javascript:void(0)" id="reply-"
                                            onclick="divShow(<?php echo $review->product_review_id;?>);">
                                            <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
                                                viewBox="0 0 24 24" width="24" height="24">
                                                <path
                                                    d="M11,9.5v3.5c0,2.206-1.794,4-4,4-.552,0-1-.447-1-1s.448-1,1-1c1.103,0,2-.897,2-2h-1.5c-.828,0-1.5-.672-1.5-1.5v-1.5c0-1.105,.895-2,2-2h1.5c.828,0,1.5,.672,1.5,1.5Zm5.5-1.5h-1.5c-1.105,0-2,.895-2,2v1.5c0,.828,.672,1.5,1.5,1.5h1.5c0,1.103-.897,2-2,2-.553,0-1,.447-1,1s.447,1,1,1c2.206,0,4-1.794,4-4v-3.5c0-.828-.672-1.5-1.5-1.5Zm7.5,4.34v6.66c0,2.757-2.243,5-5,5h-5.917C6.082,24,.47,19.208,.03,12.854-.211,9.378,1.057,5.977,3.509,3.521,5.96,1.066,9.364-.202,12.836,.028c6.26,.426,11.164,5.833,11.164,12.312Zm-2,0c0-5.431-4.085-9.962-9.299-10.315-.229-.016-.458-.023-.685-.023-2.657,0-5.209,1.049-7.092,2.934-2.043,2.046-3.1,4.882-2.899,7.781,.373,5.38,5.023,9.284,11.058,9.284h5.917c1.654,0,3-1.346,3-3v-6.66Z" />
                                            </svg> Reply
                                        </a>
                                        <?php }else{ ?>
                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                            data-bs-target="#login-button">
                                            <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
                                                viewBox="0 0 24 24" width="24" height="24">
                                                <path
                                                    d="M12.836,.028C9.364-.202,5.96,1.066,3.509,3.521,1.057,5.977-.211,9.378,.03,12.854c.44,6.354,6.052,11.146,13.053,11.146h5.917c2.757,0,5-2.243,5-5v-6.66C24,5.861,19.097,.454,12.836,.028Zm-1.836,12.972c0,2.206-1.794,4-4,4-.552,0-1-.447-1-1s.448-1,1-1c1.103,0,2-.897,2-2h-1.5c-.828,0-1.5-.672-1.5-1.5v-1.5c0-1.105,.895-2,2-2h1.5c.828,0,1.5,.672,1.5,1.5v3.5Zm7,0c0,2.206-1.794,4-4,4-.553,0-1-.447-1-1s.447-1,1-1c1.103,0,2-.897,2-2h-1.5c-.828,0-1.5-.672-1.5-1.5v-1.5c0-1.105,.895-2,2-2h1.5c.828,0,1.5,.672,1.5,1.5v3.5Z" />
                                            </svg> Reply
                                        </a>
                                        <?php } ?>
                                        <!-- End Reply Section -->
                                            <!-- Start Share Section -->
                                        <a href="#" class="share-button">
                                            <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24"
                                                width="24" height="24">
                                                <path
                                                    d="M19.333,14.667a4.66,4.66,0,0,0-3.839,2.024L8.985,13.752a4.574,4.574,0,0,0,.005-3.488l6.5-2.954a4.66,4.66,0,1,0-.827-2.643,4.633,4.633,0,0,0,.08.786L7.833,8.593a4.668,4.668,0,1,0-.015,6.827l6.928,3.128a4.736,4.736,0,0,0-.079.785,4.667,4.667,0,1,0,4.666-4.666ZM19.333,2a2.667,2.667,0,1,1-2.666,2.667A2.669,2.669,0,0,1,19.333,2ZM4.667,14.667A2.667,2.667,0,1,1,7.333,12,2.67,2.67,0,0,1,4.667,14.667ZM19.333,22A2.667,2.667,0,1,1,22,19.333,2.669,2.669,0,0,1,19.333,22Z" />
                                            </svg> Share
                                            <div class="sharethis-inline-share-buttons"></div>
                                        </a>
                                          <!-- End Share Section -->

                                    </div>
                                </div>
                                <div id="comment-form" class="row">
                                    <div class="mt-1" style="display:none"
                                        id="commentDiv_<?php echo $review->product_review_id; ?>">
                                        <div class="alert alert-outline alert-outline-success reg-message-success"
                                            id="reg-message-success_<?php echo $review->product_review_id; ?>"
                                            role="alert" style="display:none;">
                                            <button type="button" class="close" data-bs-dismiss="alert"
                                                aria-hidden="true">×</button>
                                            <p id="text-message-success_<?php echo $review->product_review_id; ?>"></p>
                                        </div>
                                        <div class="alert alert-outline alert-outline-danger reg-message-error"
                                            id="reg-message-error_<?php echo $review->product_review_id; ?>"
                                            role="alert" style="display:none">
                                            <button type="button" class="close" data-bs-dismiss="alert"
                                                aria-hidden="true">×</button>
                                            <p id="text-message-error_<?php echo $review->product_review_id; ?>"></p>
                                        </div>
                                        <form class="form-horizontal"
                                            name="product_review_reply_<?php echo $review->product_review_id; ?>"
                                            id="product_review_reply_<?php echo $review->product_review_id; ?>"
                                            action="javascript:void(0)" method="post">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" class="form-control" name="product_id" id="product_id"
                                                placeholder="Your Name" value="<?php echo $course; ?>">
                                            <input type="hidden" class="form-control" name="user_id" id="userid"
                                                placeholder="Your Name"
                                                value="<?php echo $this->session->userdata('user_id'); ?>">
                                            <input type="hidden" class="form-control" name="review_id"
                                                id="review_id_<?php echo $review->product_review_id; ?>"
                                                placeholder="Your Name"
                                                value="<?php echo $review->product_review_id; ?>">
                                            <div class="form-group">
                                                <textarea class="form-control" name="comment" rows="6"
                                                    placeholder="Comment" required="required"
                                                    maxlength="250"></textarea>
                                            </div>
                                            <?php if ($this->session->userdata('user_id')) { ?>
                                            <a href="javascript:void(0)" class="btn btn-primary"
                                                id="review_reply_submit"
                                                onclick="productReviewReply(<?php echo $review->product_review_id; ?>)">Reply</a>
                                            <?php }else{ ?>
                                            <a href="javascript:void(0)" class="btn btn-primary"
                                                data-bs-effect="effect-scale" data-bs-toggle="modal"
                                                data-bs-target="#login-button">Reply</a>
                                            <?php } ?>
                                        </form>
                                    </div>
                                </div>
                                <div class="reply-box">
                                    <?php //print_ex($review_reply);
                                    foreach($review_reply as $reply){
                                     // print_R($reply); ?>
                                    <div class="review-row-reply review_reply_<?php echo $reply->review_id;?> prr_id_<?php echo $reply->prr_id;?>"
                                        style="display:none">
                                        <?php 
                                        //$this->review_model->get_sub_comment($reply->prr_id);
                                        $temp_prr_id = $reply->prr_id;
                                        $temp_review_id = $reply->review_id;
                                        
                                        /*$where_review_reply = 'tbl_product_review_reply.status = 1 and tbl_product_review_reply.sub_id ='.$temp_prr_id.' and  review_id = '.$temp_review_id.'';
                                        $orderby = 'tbl_customer.customer_type ASC, tbl_product_review_reply.prr_id ASC';
                                        $review_sub_reply = $this->review_model->selectJoinWhereOrderby('tbl_product_review_reply','user_id','tbl_customer','customer_id',$where_review_reply,$orderby);*/
                                        // print_R($review_sub_reply);

                                        //print_R($res_sub_review);
                                        /* foreach($review_sub_reply as $sub_reply){
                                            print_r($sub_reply);
                                         }*/
                                         

                                        ?>
                                        <div class="review-user-image"><span></span></div>
                                        <div
                                            class="review-title-row d-flex flex-wrap justify-content-between align-items-center">
                                            <h2 class="review-title">
                                                <?php echo ucfirst($reply->firstname.' '.$reply->lastname); ?></h2>
                                            <div class="review-date">
                                                <?php echo  date('d F Y',strtotime($reply->reply_date)); ?></div>
                                        </div>
                                        <div class="review-content">
                                            <div id="reviewReplyShort_<?php echo $reply->prr_id;?>">
                                                <?php echo substr($reply->reply,0,185); ?>
                                                <?php  $words = substr_count($reply->reply, " ");
                                            if($words > 30){
                                            ?>
                                                <small class="review-read remove-bg"><a href="javascript:void(0)"
                                                        id="reviewReplyShortRM_<?php echo $reply->prr_id;?>"
                                                        onclick="productReviewReplyReadMore('<?php echo $reply->prr_id;?>')">(Read
                                                        More)</a></small>
                                                <?php } ?>
                                            </div>

                                            <!-- Comment Section Start -->
                                            <div class="form-group mb-3" style="display:none"
                                             id="subcommentDiv_<?php echo $reply->prr_id; ?>">
                                                
                                                <?php $form_name = 'comment_sub_reply_'.$reply->prr_id; ?>
                                                <textarea class="form-control" name="comment_sub_reply" rows="6" id = "commentid_<?php echo $reply->prr_id; ?>"
                                                    placeholder="Comment" required="required"
                                                    maxlength="250"></textarea>
                                            </div>
                                            <?php if ($this->session->userdata('user_id')) { ?>
                                            <a href="javascript:void(0)" class="btn btn-primary"
                                                id="review_reply_submit"
                                                onclick="divSubReply(<?php echo $reply->review_id. ',' .$reply->prr_id.','.$course.','.$this->session->userdata('user_id') ;?>);">Submit</a>
                                            <?php }else{ ?>
                                            <a href="javascript:void(0)" class="btn btn-primary"
                                                data-bs-effect="effect-scale" data-bs-toggle="modal"
                                                data-bs-target="#login-button">Submit</a>
                                            <?php } ?>


                                            

                                            <!-- Comment Section Ends -->
<!-- Start Reply Section -->
                                        <?php if($this->session->userdata('user_id')){ ?>
                                            <a href="javascript:void(0)" id="reply-"
                                                onclick="ed_comment(<?php echo $reply->prr_id ;?>);">
                                                <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
                                                    viewBox="0 0 24 24" width="24" height="24">
                                                    <path
                                                        d="M11,9.5v3.5c0,2.206-1.794,4-4,4-.552,0-1-.447-1-1s.448-1,1-1c1.103,0,2-.897,2-2h-1.5c-.828,0-1.5-.672-1.5-1.5v-1.5c0-1.105,.895-2,2-2h1.5c.828,0,1.5,.672,1.5,1.5Zm5.5-1.5h-1.5c-1.105,0-2,.895-2,2v1.5c0,.828,.672,1.5,1.5,1.5h1.5c0,1.103-.897,2-2,2-.553,0-1,.447-1,1s.447,1,1,1c2.206,0,4-1.794,4-4v-3.5c0-.828-.672-1.5-1.5-1.5Zm7.5,4.34v6.66c0,2.757-2.243,5-5,5h-5.917C6.082,24,.47,19.208,.03,12.854-.211,9.378,1.057,5.977,3.509,3.521,5.96,1.066,9.364-.202,12.836,.028c6.26,.426,11.164,5.833,11.164,12.312Zm-2,0c0-5.431-4.085-9.962-9.299-10.315-.229-.016-.458-.023-.685-.023-2.657,0-5.209,1.049-7.092,2.934-2.043,2.046-3.1,4.882-2.899,7.781,.373,5.38,5.023,9.284,11.058,9.284h5.917c1.654,0,3-1.346,3-3v-6.66Z" />
                                                </svg> Reply
                                            </a>
                                            <?php }else{ ?>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#login-button">
                                                <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
                                                    viewBox="0 0 24 24" width="24" height="24">
                                                    <path
                                                        d="M12.836,.028C9.364-.202,5.96,1.066,3.509,3.521,1.057,5.977-.211,9.378,.03,12.854c.44,6.354,6.052,11.146,13.053,11.146h5.917c2.757,0,5-2.243,5-5v-6.66C24,5.861,19.097,.454,12.836,.028Zm-1.836,12.972c0,2.206-1.794,4-4,4-.552,0-1-.447-1-1s.448-1,1-1c1.103,0,2-.897,2-2h-1.5c-.828,0-1.5-.672-1.5-1.5v-1.5c0-1.105,.895-2,2-2h1.5c.828,0,1.5,.672,1.5,1.5v3.5Zm7,0c0,2.206-1.794,4-4,4-.553,0-1-.447-1-1s.447-1,1-1c1.103,0,2-.897,2-2h-1.5c-.828,0-1.5-.672-1.5-1.5v-1.5c0-1.105,.895-2,2-2h1.5c.828,0,1.5,.672,1.5,1.5v3.5Z" />
                                                </svg> Reply
                                            </a>
                                            <?php } ?>

                                            <?php $res_reply_count = get_reply_count($reply->prr_id , $reply->review_id); 
                                             if($res_reply_count) { ?>
                                               
                                                <div class="review-footer-left mt-3"><a
                                                        href="javascript:void(0)"
                                                        onclick="viewRepliesAll_level1('<?php echo $reply->review_id;?>')"
                                                        class="view-all-replies">View all replies</a></div>
                                                <?php } ?>

                                            

                                                   <?php
                                        $res_sub_review = display_sub_review($reply->prr_id , $reply->review_id);
                                        if($res_sub_review)
                                        {
                                            foreach ($res_sub_review as $sub_review)
                                            {
                                               // print_r($sub_review);
                                                ?>
                                                <div class="review-row-reply review_reply_lev1_<?php echo $sub_review->review_id;?> prr_id_<?php echo $sub_review->prr_id;?>"
                                                    style="display:none">
                                                    <div class="review-user-image"><span></span></div>
                                                        <div
                                                            class="review-title-row d-flex flex-wrap justify-content-between align-items-center">
                                                            <h2 class="review-title">
                                                                <?php echo ucfirst($sub_review->firstname.' '.$sub_review->lastname); ?></h2>
                                                            <div class="review-date">
                                                                <?php echo  date('d F Y',strtotime($sub_review->reply_date)); ?></div>
                                                        </div>
                                                        <div class="review-content">
                                                            <div id="reviewReplyShort_<?php echo $sub_review->prr_id;?>">
                                                                <?php echo substr($sub_review->reply,0,185); ?>
                                                                <?php  $words = substr_count($sub_review->reply, " ");
                                                if($words > 30){
                                                ?>
                                                                <small class="review-read remove-bg"><a href="javascript:void(0)"
                                                                        id="reviewReplyShortRM_<?php echo $sub_review->prr_id;?>"
                                                                        onclick="productReviewReplyReadMore('<?php echo $sub_review->prr_id;?>')">(Read
                                                                        More)</a></small>
                                                                <?php } ?>
                                                            </div>

                                                                
                                                          <!-- Comment Section Start -->
                                            <div class="form-group mb-3" style="display:none"
                                        id="subcommentDiv_<?php echo $sub_review->prr_id; ?>">
                                                
                                                <?php $form_name = 'comment_sub_reply_'.$sub_review->prr_id; ?>
                                                <textarea class="form-control" name="comment_sub_reply" rows="6" id = "commentid_<?php echo $sub_review->prr_id; ?>"
                                                    placeholder="Comment" required="required"
                                                    maxlength="250"></textarea>
                                            </div>
                                            <?php if ($this->session->userdata('user_id')) { ?>
                                            <a href="javascript:void(0)" class="btn btn-primary"
                                                id="review_reply_submit"
                                                onclick="divSubReply(<?php echo $sub_review->review_id. ',' .$sub_review->prr_id.','.$course.','.$this->session->userdata('user_id') ;?>);">Submit</a>
                                            <?php }else{ ?>
                                            <a href="javascript:void(0)" class="btn btn-primary"
                                                data-bs-effect="effect-scale" data-bs-toggle="modal"
                                                data-bs-target="#login-button">Submit</a>
                                            <?php } ?>

                                            <!-- Comment Section Ends -->

                                                <!-- Start Reply Section -->
                                        <?php if($this->session->userdata('user_id')){ ?>
                                            <a href="javascript:void(0)" id="reply-"
                                                onclick="ed_comment(<?php echo $sub_review->prr_id ;?>);">
                                                <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
                                                    viewBox="0 0 24 24" width="24" height="24">
                                                    <path
                                                        d="M11,9.5v3.5c0,2.206-1.794,4-4,4-.552,0-1-.447-1-1s.448-1,1-1c1.103,0,2-.897,2-2h-1.5c-.828,0-1.5-.672-1.5-1.5v-1.5c0-1.105,.895-2,2-2h1.5c.828,0,1.5,.672,1.5,1.5Zm5.5-1.5h-1.5c-1.105,0-2,.895-2,2v1.5c0,.828,.672,1.5,1.5,1.5h1.5c0,1.103-.897,2-2,2-.553,0-1,.447-1,1s.447,1,1,1c2.206,0,4-1.794,4-4v-3.5c0-.828-.672-1.5-1.5-1.5Zm7.5,4.34v6.66c0,2.757-2.243,5-5,5h-5.917C6.082,24,.47,19.208,.03,12.854-.211,9.378,1.057,5.977,3.509,3.521,5.96,1.066,9.364-.202,12.836,.028c6.26,.426,11.164,5.833,11.164,12.312Zm-2,0c0-5.431-4.085-9.962-9.299-10.315-.229-.016-.458-.023-.685-.023-2.657,0-5.209,1.049-7.092,2.934-2.043,2.046-3.1,4.882-2.899,7.781,.373,5.38,5.023,9.284,11.058,9.284h5.917c1.654,0,3-1.346,3-3v-6.66Z" />
                                                </svg> Reply
                                            </a>
                                            <?php }else{ ?>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#login-button">
                                                <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
                                                    viewBox="0 0 24 24" width="24" height="24">
                                                    <path
                                                        d="M12.836,.028C9.364-.202,5.96,1.066,3.509,3.521,1.057,5.977-.211,9.378,.03,12.854c.44,6.354,6.052,11.146,13.053,11.146h5.917c2.757,0,5-2.243,5-5v-6.66C24,5.861,19.097,.454,12.836,.028Zm-1.836,12.972c0,2.206-1.794,4-4,4-.552,0-1-.447-1-1s.448-1,1-1c1.103,0,2-.897,2-2h-1.5c-.828,0-1.5-.672-1.5-1.5v-1.5c0-1.105,.895-2,2-2h1.5c.828,0,1.5,.672,1.5,1.5v3.5Zm7,0c0,2.206-1.794,4-4,4-.553,0-1-.447-1-1s.447-1,1-1c1.103,0,2-.897,2-2h-1.5c-.828,0-1.5-.672-1.5-1.5v-1.5c0-1.105,.895-2,2-2h1.5c.828,0,1.5,.672,1.5,1.5v3.5Z" />
                                                </svg> Reply
                                            </a>
                                            <?php } ?>
                                            <?php $res_reply_count = get_reply_count($sub_review->prr_id , $sub_review->review_id); 
                                             if($res_reply_count) { ?>
                                               
                                                <div class="review-footer-left mt-3"><a
                                                        href="javascript:void(0)"
                                                        onclick="viewRepliesAll_level2('<?php echo $sub_review->review_id;?>')"
                                                        class="view-all-replies">View all replies</a></div>
                                                <?php } ?>

                                            <!-- Start sub_review level 2  -->
                                            <?php
                                            $res_sub_review_level2 = display_sub_review($sub_review->prr_id , $sub_review->review_id);
                                            if($res_sub_review_level2)
                                            {
                                                foreach ($res_sub_review_level2 as $sub_review_level2)
                                                {
                                                   // print_R($sub_review_level2);

                                                   ?>
                                                   <div class="review-row-reply mt-3 review_reply_lev2_<?php echo $sub_review_level2->review_id;?> prr_id_<?php echo $sub_review_level2->prr_id;?>"
                                                       style="display:none">
                                                       <div class="review-user-image"><span></span></div>
                                                           <div
                                                               class="review-title-row d-flex flex-wrap justify-content-between align-items-center">
                                                               <h2 class="review-title">
                                                                   <?php echo ucfirst($sub_review_level2->firstname.' '.$sub_review_level2->lastname); ?></h2>
                                                               <div class="review-date">
                                                                   <?php echo  date('d F Y',strtotime($sub_review_level2->reply_date)); ?></div>
                                                           </div>
                                                           <div class="review-content">
                                                               <div id="reviewReplyShort_<?php echo $sub_review_level2->prr_id;?>">
                                                                   <?php echo substr($sub_review_level2->reply,0,185); ?>
                                                                   <?php  $words = substr_count($sub_review_level2->reply, " ");
                                                   if($words > 30){
                                                   ?>
                                                                   <small class="review-read remove-bg"><a href="javascript:void(0)"
                                                                           id="reviewReplyShortRM_<?php echo $sub_review_level2->prr_id;?>"
                                                                           onclick="productReviewReplyReadMore('<?php echo $sub_review_level2->prr_id;?>')">(Read
                                                                           More)</a></small>
                                                                   <?php } ?>
                                                               </div>
   
                                                                   
                                                             <!-- Comment Section Start -->
                                               <div class="form-group" style="display:none"
                                           id="subcommentDiv_<?php echo $sub_review_level2->prr_id; ?>">
                                                   
                                                   <?php $form_name = 'comment_sub_reply_'.$sub_review_level2->prr_id; ?>
                                                   <textarea class="form-control" name="comment_sub_reply" rows="6" id = "commentid_<?php echo $sub_review_level2->prr_id; ?>"
                                                       placeholder="Comment" required="required"
                                                       maxlength="250"></textarea>
                                               </div>
                                             <!--  <?php //if ($this->session->userdata('user_id')) { ?>
                                               <a href="javascript:void(0)" class="btn btn-primary"
                                                   id="review_reply_submit"
                                                   onclick="divSubReply(<?php //echo $sub_review->review_id. ',' .$sub_review->prr_id.','.$course.','.$this->session->userdata('user_id') ;?>);">Submit</a>
                                               <?php //}else{ ?>
                                               <a href="javascript:void(0)" class="btn btn-primary"
                                                   data-bs-effect="effect-scale" data-bs-toggle="modal"
                                                   data-bs-target="#login-button">Submit</a>
                                               <?php //} ?>  -->
   
                                               <!-- Comment Section Ends -->
   
                                                   <!-- Start Reply Section -->
                                         <!--  <?php if($this->session->userdata('user_id')){ ?>
                                               <a href="javascript:void(0)" id="reply-"
                                                   onclick="ed_comment(<?php echo $sub_review->prr_id ;?>);">
                                                   <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
                                                       viewBox="0 0 24 24" width="24" height="24">
                                                       <path
                                                           d="M11,9.5v3.5c0,2.206-1.794,4-4,4-.552,0-1-.447-1-1s.448-1,1-1c1.103,0,2-.897,2-2h-1.5c-.828,0-1.5-.672-1.5-1.5v-1.5c0-1.105,.895-2,2-2h1.5c.828,0,1.5,.672,1.5,1.5Zm5.5-1.5h-1.5c-1.105,0-2,.895-2,2v1.5c0,.828,.672,1.5,1.5,1.5h1.5c0,1.103-.897,2-2,2-.553,0-1,.447-1,1s.447,1,1,1c2.206,0,4-1.794,4-4v-3.5c0-.828-.672-1.5-1.5-1.5Zm7.5,4.34v6.66c0,2.757-2.243,5-5,5h-5.917C6.082,24,.47,19.208,.03,12.854-.211,9.378,1.057,5.977,3.509,3.521,5.96,1.066,9.364-.202,12.836,.028c6.26,.426,11.164,5.833,11.164,12.312Zm-2,0c0-5.431-4.085-9.962-9.299-10.315-.229-.016-.458-.023-.685-.023-2.657,0-5.209,1.049-7.092,2.934-2.043,2.046-3.1,4.882-2.899,7.781,.373,5.38,5.023,9.284,11.058,9.284h5.917c1.654,0,3-1.346,3-3v-6.66Z" />
                                                   </svg> Reply
                                               </a>
                                               <?php }else{ ?>
                                               <a href="javascript:void(0)" data-bs-toggle="modal"
                                                   data-bs-target="#login-button">
                                                   <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
                                                       viewBox="0 0 24 24" width="24" height="24">
                                                       <path
                                                           d="M12.836,.028C9.364-.202,5.96,1.066,3.509,3.521,1.057,5.977-.211,9.378,.03,12.854c.44,6.354,6.052,11.146,13.053,11.146h5.917c2.757,0,5-2.243,5-5v-6.66C24,5.861,19.097,.454,12.836,.028Zm-1.836,12.972c0,2.206-1.794,4-4,4-.552,0-1-.447-1-1s.448-1,1-1c1.103,0,2-.897,2-2h-1.5c-.828,0-1.5-.672-1.5-1.5v-1.5c0-1.105,.895-2,2-2h1.5c.828,0,1.5,.672,1.5,1.5v3.5Zm7,0c0,2.206-1.794,4-4,4-.553,0-1-.447-1-1s.447-1,1-1c1.103,0,2-.897,2-2h-1.5c-.828,0-1.5-.672-1.5-1.5v-1.5c0-1.105,.895-2,2-2h1.5c.828,0,1.5,.672,1.5,1.5v3.5Z" />
                                                   </svg> Replyss
                                               </a>
                                               <?php } 
                                                    
                                            ?> -->
                                            </div>
                                                    </div>

                                                 <?php
                                                   
                                                }
                                             
                                                
                                            }
                                            /** End Sub Review level 2  */

                                            ?>
                                                        </div>
                                                                </div>

                                            <?php
                                            }  // End off sub review foreach
                                        } // end of sub review if condition
                                         ?>
                                        <!-- End Reply Section -->

                                            <div class="review-content" style="display:none"
                                                id="reviewReplyFull_<?php echo $reply->prr_id;?>">
                                                <?php echo $reply->reply; ?> <small class="review-read remove-bg"><a
                                                        href="javascript:void(0)"
                                                        id="reviewReplyShortRS_<?php echo $reply->prr_id;?>"
                                                        onclick="productReviewReplyReadShort('<?php echo $reply->prr_id;?>')">(Read
                                                        Short)</a> </small></div>
                                        </div>
                                    </div>
                                            
                                  <?php  } ?>
                                  
                                </div>
                            </div>
                            <!--review row end-->
                            <?php } ?>
                            <div id="pagination-div-id" class="dataTables_paginate paging_simple_numbers">
                                <?php echo $page_link; ?></div>
                            <?php }else{?>
                            <div class="review-row-reply">
                                <h4>No result found..!!</h4>
                            </div>
                            <?php } ?>
                            <?php 

/*function display_sub_review($prr_id,$review_id)
{   
    $review_sub_reply = 'ss';
    $where_review_reply = '';
    $orderby = '';
    $where_review_reply = 'tbl_product_review_reply.status = 1 and tbl_product_review_reply.sub_id ='.$prr_id.' and  review_id = '.$review_id.'';
    $orderby = 'tbl_customer.customer_type ASC, tbl_product_review_reply.prr_id ASC';
    $review_sub_reply = $this->review_model->selectJoinWhereOrderby('tbl_product_review_reply','user_id','tbl_customer','customer_id',$where_review_reply,$orderby);
    //return $review_sub_reply;
    print_R($review_sub_reply);
    exit;
}*/
?>
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
<style>
.value-span {
            display: inline-block;
            margin-right: 10px;
            padding: 5px;
            background-color: lightblue;
        }

.closeButton {
  cursor: pointer;
}
    </style>
<div id="selectedValues"></div>
    </div>

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

  
    <input type="hidden" value = "<?php echo $segment?>" class = "segment">
    <input type="hidden" value = "<?php echo $course ?>" class = "course">
    <input type="hidden" value = "<?php echo $get_single_course_detail->class_id ?>" class = "filter_class">
    <input type="hidden" value = "<?php echo $get_single_course_detail->course_id ?>" class = "filter_course">
    <input type="hidden" value = "<?php echo $get_single_course_detail->batch_id ?>" class = "filter_batch">
    <input type="hidden" value = "<?php echo $get_single_course_detail->board_id ?>" class = "filter_board">
    <input type="hidden" value = "<?php echo $get_single_course_detail->product_type ?>" class = "filter_online_offline">
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
        var filter_brand_id = $('#brand').val();
        var filter_class_id = $('.filter_class').val();
        var filter_course_id = $('.filter_course').val();
        var filter_batch_id = $('.filter_batch').val();
        var filter_board_id = $('.filter_board').val();
        var parameter_course = $('.course').val();
        var filter_online_offline = $('.filter_online_offline').val();
        var product_id = '';
        var ratings = '';
        var sort_by ='';
        /** Ajax Cal Variable declare  */
        var isClickedBrand = false;
        var FilterBrandText = '';
        var BrandParamKey ='brand';
        var isClickedSegment = true;
        var drop_down_text =$('#filter_segment :selected').text().trim(); // for segment text
        var SegmentParamKey ='segment';
        var isClickedClass = false;
        var FilterClassText = '';
        var ClassParamKey ='class';
        var isClickedCourse = false;
        var FilterCourseText = '';
        var CourseParamKey ='course';
        var isClickedBatch = false;
        var FilterBatchText = '';
        var BatchParamKey ='batch';
        var isClickedRating = false;
        var FilterRatingText = '';
        var RatingParamKey ='rating';
        var isClickedSortby = false;
        var FilterSortbyText = '';
        var SortbyParamKey ='sortby';
        var isClickedBoard = false;
        var FilterBoardText = '';
        var BoardParamKey ='board';

        var requestData = {};
            requestData.segment = filter_segment_id;
            requestData.brand = '';
            requestData.board = '';
            requestData.class = '';
            requestData.course = '';
            requestData.batch = '';
            requestData.rating = '';
            requestData.sortby = '';
            requestData.page = '';
            requestData.user = '';

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
            
           drop_down_text = $('#filter_segment :selected').text();
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
            isClickedBoard = true;
            FilterBoardText = 'cbsc';
            get_all_data();

        });
        $('.toggle_icsc').click(function() {
            filter_board_id = $('#icsc').val();
            
            $("#icsc-toggle").addClass('active');
            $("#cbsc-toggle").removeClass('active');
            isClickedBoard = true;
            FilterBoardText = 'icsc';
            get_all_data();

        });
        $('.toggle_online').click(function() { 
            filter_board_id = $('#online').val();
            $("#offline-toggle").removeClass('active');
            $("#online-toggle").addClass('active');
            isClickedBoard = true;
            FilterBoardText = 'online';
            get_all_data();

        });
        $('.toggle_offline').click(function() {
            filter_board_id = $('#offline').val();
            $("#online-toggle").removeClass('active');
            $("#offline-toggle").addClass('active');
            isClickedBoard = true;
            FilterBoardText = 'offline';
            get_all_data();
        });
   
        $("#brand").change(function()
        {
            filter_brand_id = $(this).val();
            FilterBrandText = $('#brand :selected').text().trim();
            filter_class(filter_brand_id,filter_segment_id);
            isClickedBrand =true;
            get_all_data();
        });


        $("#filter_class_dropdown").change(function()
        {
            filter_class_id = $(this).val();
            FilterClassText = $('#filter_class_dropdown :selected').text().trim();
            filter_course(filter_brand_id,filter_segment_id,filter_board_id,filter_class_id);
            isClickedClass =true;
            get_all_data();
        });

        $("#filter_course_dropdown").change(function()
        {
            filter_course_id = $(this).val();
            FilterCourseText = $('#filter_course_dropdown :selected').text().trim();
            filter_batch(filter_brand_id,filter_segment_id,filter_board_id,filter_class_id,filter_course_id);
            isClickedCourse =true;
            get_all_data();
        });

        $("#batch").change(function()
        {
             filter_batch_id = $(this).val();
             FilterBatchText = $('#batch :selected').text().trim();
             isClickedBatch =true;
             get_all_data();
             
        });
        /** Rating Code  **/
        $('input[name="customer_rating"]').change(function(){
            if($(this).is(':checked')){
                 ratings = $(this).val();
                 FilterRatingText = ratings;
                 if(ratings == 'all' || ratings == 'All' || ratings == 'ALL')
                 {
                    ratings = '';
                 }
                 isClickedRating =true;
                // console.log(FilterRatingText);
                 get_all_data();
                // location.reload();
                // window.location="<?php echo base_url();?>review/?course="+parameter_course+"&segment="+filter_segment_id+"&sort_by="+sort_by+"&customer_rating="+ratings;
               // console.log("Selected rating: " + ratingValue);
               //alert(ratings);
            }
        });
         /** End Rating Code  **/
         $('input[name="sort_by"]').change(function(){
            if($(this).is(':checked')){
                sort_by = $(this).val();
                isClickedSortby = true;
                FilterSortbyText = sort_by;
                get_all_data();
               // console.log(FilterSortbyText);
            //    location.reload();
               // console.log("Selected rating: " + ratingValue);
              //window.location="<?php echo base_url();?>review/?course="+parameter_course+"&segment="+filter_segment_id+"&sort_by="+sort_by;
              //location.reload();
            }
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
                if(filter_batch_id)
                {
                   // get_all_data()
                }
              }
           });
        }
        function get_all_data()
        {
              const selectedValuesDiv = document.getElementById("selectedValues");
            var urlParams = new URLSearchParams(window.location.search);
            if(isClickedSegment)
            {
                urlParams.set(SegmentParamKey, drop_down_text);  
            }
            if (isClickedBrand) {
                urlParams.set(BrandParamKey, FilterBrandText);
                requestData.brand = filter_brand_id;
                add_filter_values(BrandParamKey,FilterBrandText);
            }
            if (isClickedBoard) {
                urlParams.set(BoardParamKey, FilterBoardText);
                requestData.board = filter_board_id;
                add_filter_values(BoardParamKey,FilterBoardText);
            }
            if (isClickedClass) {
                urlParams.set(ClassParamKey, FilterClassText);
                requestData.class = filter_class_id;
                add_filter_values(ClassParamKey,FilterClassText);
            }
            if (isClickedCourse) {
                urlParams.set(CourseParamKey, FilterCourseText);
                requestData.course = filter_course_id;
                add_filter_values(CourseParamKey,FilterCourseText);
            }
            if (isClickedBatch) {
                urlParams.set(BatchParamKey, FilterBatchText);
                requestData.batch = filter_batch_id;
                add_filter_values(BatchParamKey,FilterBatchText);
            }
            if (isClickedRating) {
                urlParams.set(RatingParamKey, FilterRatingText);
                requestData.rating = FilterRatingText;
                add_filter_values(RatingParamKey,FilterRatingText);
            }
            if (isClickedSortby) {
                urlParams.set(SortbyParamKey, FilterSortbyText);
                requestData.sortby = sort_by;
                add_filter_values(SortbyParamKey,FilterSortbyText);
            }

           var newURL = window.location.protocol + '//' + window.location.host + window.location.pathname + '?' + urlParams.toString();
            window.history.pushState({ path: newURL }, '', newURL);
            ajax_cal_data();
        }

        function add_filter_values(val1,val2)
        {
            
            console.log(requestData);
            var urlParams = new URLSearchParams(window.location.search);
            var brn_value = val1 + '=' + val2 ;
            var span = document.createElement("span");
            span.classList.add("value-span");
            console.log(brn_value);
             // Set text content
            span.textContent = val2;
            // Set display value
            span.style.display = "block"; 
            var div = document.getElementById("selectedValues");
            var closeButton = document.createElement("button");
            closeButton.textContent = "X";
            closeButton.setAttribute("data-value", brn_value);

            var selectedValuesDiv = document.getElementById("selectedValues");
            
            // Get all the span elements within the selectedValuesDiv
            var spans = selectedValuesDiv.getElementsByTagName("span");
           // Loop through the spans and retrieve their values
           for (var i = 0; i < spans.length; i++) 
           {
               var value = spans[i].innerHTML;
               // Create a temporary div element
               var tempDiv = document.createElement('div');
               // Set the innerHTML of the div
               tempDiv.innerHTML = value;
               // Get the button element from the div
               var buttonElement = tempDiv.querySelector('button');
               // Retrieve the value of the data-value attribute
               var dataValue = buttonElement.getAttribute('data-value');
               var parts = dataValue.split("="); // Split = before values ex: brand=Buyjs
                var split_val = parts[0]; // output : brand
                if(val1 == split_val) // check param key Duplicate exist or not 
                {
                    spans[i].remove(); // remove if duplicate exist
                }
               
           }

            closeButton.onclick = function() // close button for remove filters
            {
                var valueToRemove = this.getAttribute("data-value"); 
                var spans = document.getElementsByClassName("value-span");
                var parts = valueToRemove.split("=");
                var split_val = parts[0];
                    if(split_val == BrandParamKey)
                    {
                        isClickedBrand = false;
                        requestData.brand = '';
                    }
                    if(split_val == BoardParamKey)
                    {
                        isClickedBoard = false;
                        requestData.board = '';
                    }
                    if(split_val == ClassParamKey)
                    {
                        isClickedClass = false;
                        requestData.class = '';
                    }
                    if(split_val == CourseParamKey)
                    {
                        isClickedCourse = false;
                        requestData.course = '';
                    }
                    if(split_val == BatchParamKey)
                    {
                        isClickedBatch = false;
                        requestData.batch = '';
                    }
                    if(split_val == RatingParamKey)
                    {
                        isClickedRating = false;
                        requestData.rating = '';
                    }
                    if(split_val == SortbyParamKey)
                    {
                        isClickedSortby = false;
                        requestData.sortby = '';
                    }
             //   if (urlParams.has(split_val)) {
                    urlParams.delete(split_val);
             //   }
                var newURL = window.location.protocol + '//' + window.location.host + window.location.pathname + '?' + urlParams.toString();
                
                window.history.pushState({ path: newURL }, '', newURL);
                span.remove();
                ajax_cal_data();
                
            };
            span.appendChild(closeButton);
            // Append the span to the div
            div.appendChild(span);
            document.getElementById("selectedValues").appendChild(span);
           
        }
        function ajax_cal_data()
        {
            $.ajax({
              type : 'POST',    
               url: "<?php echo base_url(); ?>filter/get_all_data",
              data: requestData, 
              dataType: "json",   
              success: function (response) {
                   
                   
              }
           });
        }
        
        /** End Filter Section */

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