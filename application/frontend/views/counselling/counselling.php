
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.7/handlebars.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/handlebar-custom.min.js" type="text/javascript"></script>
<?php $course = $this->input->get('course'); 
$brandID = $this->input->get('brand');
$product_type = $this->input->get('product_type');
$board = $this->input->get('board');
$class = $this->input->get('class');
$batch = $this->input->get('batch');
$customer_rating = $this->input->get('customer_rating');
$date_posted = $this->input->get('date_posted');
$sort_by = $this->input->get('sort_by');
$date_picker = $this->input->get('date_picker');
$segment = $this->input->get('segment');
$page = $this->input->get('page');
$user_id = '';
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
?>
<?php 

/*$get_breadcrumb = get_breadcrumb_value();
$breadcrumb_name1 = '';
$breadcrumb_name2 = '';

$get_single_course_detail = get_single_coure_detail($course);
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
                <li><a
                        href="<?php echo base_url(); ?>complaint?course=<?php echo @$course; ?>&segment=<?php echo $segment; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Complaint
                    </a></li>
                <li><a
                        href="<?php echo base_url(); ?>comparison?course=<?php echo @$course; ?>&segment=<?php echo $segment; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Compare
                    </a></li>
                <li class="active"><a
                        href="<?php echo base_url(); ?>counselling?course=<?php echo @$course; ?>&segment=<?php echo $segment; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Counselling
                <li><a
                        href="<?php echo base_url(); ?>cohort?course=<?php echo @$course; ?>&segment=<?php echo $segment; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Cohort</a>
                </li>
                <li><a
                        href="<?php echo base_url(); ?>review?course=<?php echo @$course; ?>&segment=<?php echo $segment; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Reviews</a>
                </li>
                <li><a
                        href="<?php echo base_url(); ?>coupon?course=<?php echo @$course; ?>&segment=<?php echo $segment; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Coupons</a>
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
            <div class="col-md-1 course-img p-3 text-center brandCard crd-image">

            <img class="card-img-top" style="height: 150px;"
                                    src="<?php echo base_url(); ?>uploads/brand/<?php //echo  $get_single_course_detail->brand_image; ?>">

            </div>
            <div class="col-md-6 pt-3 course-name-display">
            <h1 class="mb-3"><?php //echo  $get_course_detail; ?></h1>
                <div>
                <span class="rating-btn-display"><?php //echo $get_review_average_rating ?> / 5</span>
              <!--  <?php if($get_brand_compare) { ?>
                    <span class="rating-btn-display"><?php //echo $get_brand_compare->overall_brand ?>/5</span>
                    <?php } ?>  -->
                 
                    <label for="rating2" class="rating-display">
                    <div class="dropdown">
 <!-- <button class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">  -->
  <!--<img src="<?php echo base_url(); ?>assets/images/rating-4.png" alt=""> --> </label>
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
                </label>

<!----->








<!------>


                </div>
                <div class="pt-3 total-review-display">
                    <h4> Excellent Review </h4>
                </div>
            </div>
            <div class="col-md-4 pt-3 write-review-icon ">
            <?php if ($this->session->userdata('user_id')) { ?>
                            <a href="<?php echo base_url();?>write-a-complaint?course=<?php echo @$course; ?>&segment=<?php echo $segment;?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>"
                    class=" text-decoration-none ">
                    <i class="fa-solid fa-circle-user fa-2xl design-user"></i> <span> Write a Complaint </span> <label
                        for="rating2"><!--<img src="<?php echo base_url();?>assets/images/rating-1.png" alt="">--> </label>
                </a>
                        <?php } else { ?>
                        <a href="javascript:void(0)" class="review-btns text-decoration-none" data-bs-effect="effect-scale"
                            data-bs-toggle="modal" data-bs-target="#login-button"><i class="fa-solid fa-circle-user fa-2xl design-user"></i> <span> Write a Complaint </span> <label
                        for="rating2"><!--<img src="<?php echo base_url();?>assets/images/rating-1.png" alt=""> </label>--></a>
                        <?php } ?>

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
                        <form action="<?php echo base_url(); ?>counselling-search" id="form" name="form" method="post">
                        <?php echo csrf_field(); 
                        $res_filter_brand = getseg_brand_list($segment);
                        $res_filter_segment = get_segement();
                        $res_filter_class = getseg_class_list($segment);
                        $res_filter_course = getseg_crse_list($segment);
                       // print_R($res_filter_course);
                        
                        ?>
                            <?php echo csrf_field(); ?>
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
                                    <option value="<?php echo $brands->brand_id; ?>">
                                        <?php echo $brands->brand_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                           
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
                        <?php
                            $month = date('m');
                            $day = date('d');
                            $year = date('Y');
                            $today = $day . '-' . $month . '-' . $year;
                            ?>
                            
                        <div class="filter-col date-filter">
                                <h3 class="filter-col-title">Date</h3>
                                <label for="datepicker">Pick a Date
                                    <input type="text" name="cdate" id="datepicker" value = <?php echo isset($date_picker) ? $date_picker : $today; ?> class ="datepicker" autocomplete="off">
                                </label>
                            </div>
                        <div class=" filter-col ">
                            <div class="filter-list-box">
                                <button type="button" class="apply-btn apply_filter">Apply Filter</button>
                            </div>
                        </div>
                             
                        </form>
                  <!--  </div> -->
                    <!--left end-->


                    <!--right start-->
                    <div class="review-right">
                    </div>
                    <!--right end-->
                </div>
                <!--end-->
                <!--center start-->
                <div class="col-md-8">
                    <div class="review-center">

                    <div class="review-inner-center">
                    <div id="selectedValues"></div>  <!-- for filter values display -->
                        <div class="tab-link">

                            <ul>
                                <li>
                                    <a href="<?php echo base_url(); ?>counselling?course=<?php echo $course; ?>&segment=<?php echo $segment; ?>"
                                        class="active">Events</a>
                                </li>
                                        
                                <li>
                                    <a href="<?php echo base_url(); ?>upcoming-counselling?course=<?php echo $course; ?>&segment=<?php echo $segment; ?>">UpComing  Event</a>
                                </li>
                                
                            </ul>
                        </div>
                                </div>
                                
                                <style>
                            img {
                                    max-width: 100%;
                                    display: block;
                                }

                                .card-list-con {
                                /*width: 90%;*/
                                /*max-width: 300px;*/
                                }

                                .card-con {
                                background-color: #f1f1f1;
                                box-shadow: 0 0 0 1px rgba(#000, .05), 0 20px 50px 0 rgba(#000, .1);
                                /*border-radius: 15px;*/
                                overflow: hidden;
                                /*padding: 1.25rem;*/
                                position: relative;
                                transition: .15s ease-in;
                                
                                &:hover, &:focus-within {
                                    box-shadow: 0 0 0 2px #16C79A, 0 10px 60px 0 rgba(#000, .1);
                                    transform: translatey(-5px);
                                }
                                }

                                .card-image-con {
                               /* border-radius: 10px;*/
                                overflow: hidden;
                                height: 220px;
                                position: relative;
                                object-fit: cover;


                                }

                                .card-header-con {
                                margin-top: 1.5rem;
                                display: flex;
                                align-items: center;
                                justify-content: space-between;
                                a {
                                    font-weight: 600;
                                    font-size: 1.375rem;
                                    line-height: 1.25;
                                    padding-right: 1rem;
                                    text-decoration: none;
                                    color: inherit;
                                    will-change: transform;
                                    &:after {
                                    content: "";
                                    position: absolute;
                                    left: 0;
                                    top: 0;
                                    right: 0;
                                    bottom: 0;
                                    }
                                }
                                
                                
                                }

                                .icon-button {
                                border: 0;
                                background-color: #fff;
                                border-radius: 50%;
                                width: 2.5rem;
                                height: 2.5rem;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                flex-shrink: 0;
                                font-size: 1.25rem;
                                transition: .25s ease;
                                box-shadow: 0 0 0 1px rgba(#000, .05), 0 3px 8px 0 rgba(#000, .15);
                                z-index: 1;
                                cursor: pointer;
                                color: #565656;
                                
                                svg {
                                    width: 1em;
                                    height: 1em;
                                }
                                &:hover, &:focus {
                                    background-color: #EC4646;
                                    color: #FFF;
                                }
                                }

                                .card-footer-con {
                                margin-top: 1.25rem;
                                border-top: 1px solid #ddd;
                                padding-top: 1.25rem;
                                display: flex;
                                align-items: center;
                                flex-wrap: wrap;
                                justify-content: space-between;
                                padding: 14px;
                                }

                                .card-meta-con {  
                                display: flex;
                                align-items: center;
                                color: #787878;
                                &:first-child:after {
                                    display: block;
                                    content: "";
                                    width: 4px;
                                    height: 4px;
                                    border-radius: 50%;
                                    background-color: currentcolor;
                                    margin-left: .75rem;
                                    margin-right: .75rem;
                                }
                                svg {
                                    flex-shrink: 0;
                                    width: 1em;
                                    height: 1em;
                                    margin-right: .25em;
                                }
                                }
                                </style>
                <script id="review-template" type="text/x-handlebars-template">
                    <div class="container">
                    <div class="total-review">{{total_items}} Events</div>
                    <div class="row">
                        {{#if items}}
                            {{#each items}}
                            <div class="col-md-4 col-sm-6 mb-4">
                                <div class="card-list-con">
                                    <article class="card-con">
                                    <figure class="card-image-con">
                                    <img src="{{image_path}}" style="width:100%" alt="Full-size Image">    
                                    </figure>
                                    <div class="card-header event-title">
                                        {{event_title}}
                                    </div>
                                    <div class="card-footer-con">
                                        <div class="card-meta-con card-meta--views">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" display="block" id="EyeOpen">
                                                <path d="M21.257 10.962c.474.62.474 1.457 0 2.076C19.764 14.987 16.182 19 12 19c-4.182 0-7.764-4.013-9.257-5.962a1.692 1.692 0 0 1 0-2.076C4.236 9.013 7.818 5 12 5c4.182 0 7.764 4.013 9.257 5.962z" />
                                                <circle cx="12" cy="12" r="3" />
                                            </svg>
                                            {{event_start_time}}
                                        </div>
                                        <div class="card-meta-con card-meta--date">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" display="block" id="Calendar">
                                                <rect x="2" y="4" width="20" height="18" rx="4" />
                                                <path d="M8 2v4" />
                                                <path d="M16 2v4" />
                                                <path d="M2 10h20" />
                                            </svg>
                                        {{event_date}}
                                        </div>
                                        <div class="card-meta-con card-meta--views">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" display="block" id="EyeOpen">
                                                <path d="M21.257 10.962c.474.62.474 1.457 0 2.076C19.764 14.987 16.182 19 12 19c-4.182 0-7.764-4.013-9.257-5.962a1.692 1.692 0 0 1 0-2.076C4.236 9.013 7.818 5 12 5c4.182 0 7.764 4.013 9.257 5.962z" />
                                                <circle cx="12" cy="12" r="3" />
                                            </svg>
                                            {{interest_count}}
                                        </div> 
                                    </div>
                                    <?php if($this->session->userdata('user_id')){ ?>
                                    <div class="book-event">
                                        <a href="javascript:void(0)" class="btn btn-primary counselling_reply_submit" id="counselling_reply_submit" onclick="counselling_submit({{event_id}} ,'<?php echo $this->session->userdata('user_id') ?>')">Book Event</a>
                                    </div>
                                    <?php }else{ ?>
                                    <div class="book-event">
                                        <a href="javascript:void(0)" data-bs-toggle="modal" class="btn btn-primary" data-bs-target="#login-button">Book Event </a>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>

                            {{/each}}
                            <div id="pagination-div-id" class="dataTables_paginate paging_simple_numbers">    
                            </div>
                            {{else}}
                            <div class="review-row-reply">
                            <h4>No result found..!!</h4>
                            </div>
                        {{/if}}
                    </div>
                    </div>
                </script>
                <div class="reviews-wrapper"></div>        
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

                <div class="helpful-box">
                    <div class="container">
                        <!-- <div id="summernote"></div> -->
                        <h2 class="helpful-title">You might find this helpful!</h2>
                        <div class="helpful-inner-box d-flex">
                            <div class="helpful-left">
                            </div>
                            <div class="helpful-center">
                                <h3>Article topic title related to Search “Byju’s”</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has
                                    been
                                    the indus.....
                                </p>
                            </div>
                            <div class="helpful-right">
                                <a href="#"
                                    class="d-flex flex-wrap justify-content-center align-items-center text-center">Quick
                                    Read<br /> 1 min</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--content end-->

            <!-- Modal -->
            <div class="modal fade calendar-modal" id="dateModal" tabindex="-1" aria-labelledby="dateModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-body">

                            <h2 class="date-title"><span>Please select confirm your availability by selecting date
                                    and
                                    time</span></h2>
                            <div class="calendar-main-box d-flex justify-content-between">

                                <div class="calendar-box">
                                    <input class="form-control fc-datepicker" name="date" placeholder="MM/DD/YYYY"
                                        type="text">

                                </div>

                                <div class="select-time-box">
                                    <h4 class="time-title">Selected date</h4>

                                    <div class="time-box">
                                        <input class="form-control" id="tpBasic" placeholder="Set time"
                                            name="start_time" type="text">
                                    </div>

                                    <a href="javascript:void(0)" class="time-btn" data-bs-dismiss="modal"
                                        data-bs-toggle="modal" data-bs-target="#TimeModal">Select time</a>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade calendar-modal" id="TimeModal" tabindex="-1" aria-labelledby="TimeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <h2 class="date-title"><span>Please select confirm your availability by selecting date and
                                time</span>
                        </h2>

                        <div class="time-main-box d-flex">

                            <div class="select-time-box">
                                <h4 class="time-title">Selected date</h4>

                                <div class="time-box">
                                    <h2>10<span>th</span></h2>
                                    <p>August</p>
                                    <p>2022</p>
                                </div>
                            </div>

                        </div>


                        <div class="updates-title">
                            You will recieve updates on your registered phone number and on email-id
                        </div>

                        <div class="updates-field d-flex align-items-center">
                            <input type="text" value="+91 8237412256">
                            <a href="#">Edit</a>
                        </div>

                        <div class="updates-field d-flex align-items-center">
                            <input type="text" value="Example@gmail.com">
                            <a href="#">Edit</a>
                        </div>

                        <a href="#" class="confirm-btn">Confirm</a>


                    </div>
                </div>
            </div>
            <input type="hidden" value = "<?php echo $segment?>" class = "segment">
            <input type="hidden" value = "<?php echo $course ?>" class = "course">
            <input type="hidden" value = "<?php //echo $get_single_course_detail->class_id ?>" class = "filter_class">
            <input type="hidden" value = "<?php //echo $get_single_course_detail->course_id ?>" class = "filter_course">
            <input type="hidden" value = "<?php //echo $get_single_course_detail->batch_id ?>" class = "filter_batch">
            <input type="hidden" value = "<?php //echo $get_single_course_detail->board_id ?>" class = "filter_board">
            <input type="hidden" value = "<?php //echo $get_single_course_detail->product_type ?>" class = "filter_online_offline">
            <input type="hidden" value = "<?php echo $page ?>" class = "page">

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
            var filter_online_offline = $('.filter_online_offline').val();
            var product_id = '';
            var date_picker ='';
            var page = '';
            page = $('.page').val();

            if(date_picker == '')
        {
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();
            today =  yyyy + '-' + mm + '-' +dd ;
            FilterDatePickerText = today;
            isClickedDatePicker =true;
            date_picker = today;

        }

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
        var isClickedBoard = false;
        var FilterBoardText = '';
        var BoardParamKey ='board';
        var isClickedDatePicker = false;
        var FilterDatePickerText = '';
        var DatePickerParamKey ='date_picker';
        var requestData = {};
            requestData.segment = filter_segment_id;
            requestData.brand = '';
            requestData.board = '';
            requestData.class = '';
            requestData.course = '';
            requestData.batch = '';
            requestData.page = page;
            requestData.user_id = '';
            requestData.datepicker = date_picker;
            requestData.type = 'today';
            ajax_cal_data();

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
            get_all_data();
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

        $("#datepicker").change(function()
        {
            date_picker = $(this).val();
            var parts = date_picker.split('-'); // Splitting the date string by '-'
            // Rearranging the parts
            var year = parts[2];
            var month = parts[1];
            var day = parts[0];
            var formattedDate = year + '-' + month + '-' + day;
             FilterDatePickerText = formattedDate;
             isClickedDatePicker =true;
             get_all_data();
        });
       /* if(date_picker == '')
        {
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();
            today =  yyyy + '-' + mm + '-' +dd ;
            FilterDatePickerText = today;
            isClickedDatePicker =true;
            date_picker = today;

        }*/
        
        $(".apply_filter").click(function()
        {
            
            date_picker = $('.datepicker').val();
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
                date_picker: date_picker,
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
                        window.location="<?php echo base_url();?>counselling/?course="+product_id+"&segment="+filter_segment_id+"&date_picker="+date_picker;
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
                requestData.segment = filter_segment_id;
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
            if (isClickedDatePicker) {
                urlParams.set(DatePickerParamKey, FilterDatePickerText);
                requestData.datepicker = FilterDatePickerText;
                add_filter_values(DatePickerParamKey,FilterDatePickerText);
            }
            
           var newURL = window.location.protocol + '//' + window.location.host + window.location.pathname + '?' + urlParams.toString();
            window.history.pushState({ path: newURL }, '', newURL);
            ajax_cal_data();
        }

        function add_filter_values(val1,val2)
        {
            
            //console.log(requestData);
            var urlParams = new URLSearchParams(window.location.search);
            var brn_value = val1 + '=' + val2 ;
            var span = document.createElement("span");
            span.classList.add("value-span");
            //console.log(brn_value);
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
                    if(split_val == DatePickerParamKey)
                    {
                        isClickedDatePicker = false;
                        requestData.datepicker = today;
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
               url: "<?php echo base_url(); ?>filter/get_all_data_counselling",
              data: requestData, 
              dataType: "json",   
              success: function (response) {
                   
                if (response && response.items.length > 0) {
                    
                // Compile the Handlebars template
                var templateScript = $("#review-template").html();
                var template = Handlebars.compile(templateScript);
                var pageLinkHTML = response.page_link;
        
               // paginationContainer.innerHTML = pageLinkHTML 
                
               // console.log(pageLinkHTML);
               // document.getElementById('paginationContainer').innerHTML = pageLinkHTML;   
                // Render the template with the response data
                var html = template(response);

                // Append the rendered HTML to the DOM
                $('.reviews-wrapper').html(html);
                $(".paging_simple_numbers").html(pageLinkHTML);
            }
            else{
                  // Compile the Handlebars template
                  var templateScript = $("#review-template").html();
                var template = Handlebars.compile(templateScript);
                    
                // Render the template with the response data
                var html = template(response);

                // Append the rendered HTML to the DOM
                $('.reviews-wrapper').html(html);
            }
              }
           });
        }
        /** End Filter Section */


            });
            function counselling_submit(event_id,user_id)
                {
                    $.ajax({
                type : 'POST',    
                url: "<?php echo base_url(); ?>filter/event_submit",
                data:{
                    user_id:user_id,
                    event_id:event_id
                }, 
                    dataType: "json",   
                    success: function (response) {
                         console.log(response);
                         alert(response.data);
                         location.reload();
                       
                    }
                });
                }
           
            </script>

            <script type="text/javascript">
            $(document).ready(function() {
                $('.dateinput').datepicker({
                    format: "yyyy/mm/dd"
                });
            });
            </script>