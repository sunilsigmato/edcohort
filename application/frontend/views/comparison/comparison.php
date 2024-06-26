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
$comparison_id = count(explode(',', $this->input->get('brandID') ?? ''));
$segment = $this->input->get('segment');
$segment_temp = $segment;
if($this->session->userdata('user_id'))
{
    $user_id = $this->session->userdata('user_id');
}
$brandID_header = $this->input->get('brandID');
//$brandIDs = explode(',', $brandID_header); // Split $brandID string into an array of IDs
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

if($get_breadcrumb)
{
    $breadcrumb_name1 = $get_breadcrumb->breadcrumb1_name;
     $breadcrumb_name2 = $get_breadcrumb->breadcrumb2_name;
}
$get_single_course_detail = get_single_coure_detail($course);
$get_brand_compare = get_brand_compare_detail($course,$segment);
$get_review_average_rating = get_review_average_rating($course);
$get_course_detail = get_course_detail($get_single_course_detail->course_id);*/
?>
<!--banner start-->
<div class="inner-banner">
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
                <li ><a
                        href="<?php echo base_url(); ?>complaint?segment=<?php echo $segment_temp; ?>">Complaint
                    </a></li>
                <li class="active"><a
                        href="<?php echo base_url(); ?>comparison?segment=<?php echo $segment_temp; ?>">Compare
                    </a></li>
                <li><a
                        href="<?php echo base_url(); ?>counselling?segment=<?php echo $segment_temp; ?>">Counselling
                    </a></li>
                <li><a
                        href="<?php echo base_url(); ?>cohort?segment=<?php echo $segment_temp; ?>">Cohort</a>
                </li>
                <li><a
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
                                    src="<?php echo base_url(); ?>uploads/brand/<?php //echo  $get_single_course_detail->brand_image; ?>">
            </div>
            <div class="col-md-6 pt-3 course-name-display">
                <h1 class="mb-3"><?php //echo  $get_course_detail; ?></h1>
                <div>
                <span class="rating-btn-display"><?php //echo $get_review_average_rating ?> / 5</span>
                <!--<?php if($get_brand_compare) { ?>
                    <span class="rating-btn-display"><?php //echo $get_brand_compare->overall_brand ?> / 10</span>
                    <?php } ?>  -->
                    <?php ?>
                     
                            <!--VEENA-->
                            <div class="dropdown">
  <!-- <button class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">  -->
  <!--<img src="<?php echo base_url(); ?>assets/images/rating-4.png" alt=""> --></label>
 <!-- </button>  -->


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
  </ul>
</div>
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
    <div class="container-fluid review-top-section">
        <div class="row review-top-next">
            <!--left start-->
        <div class="container-fluid review-top-section">
            <div class="row review-top-next">
                <!--- Filtr Starts  --->
                <div class="col-md-2 review-left">

                    <h3 class="filter-title">Filter</h3>
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

                        <!--<div class="filter-col">
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
                        </div> -->

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
                                <div class="input-toggle toggle_icsc active<?php //if(@$filter_icsc_id == $get_single_course_detail->board_id){ echo 'active';} ?>"
                                    id="icsc-toggle" >
                                    <label><?php echo $filter_icsc_name ?></label>
                                    <input class="btn btn-lg btn-primary active" type="radio" name="product_type" id="icsc" value="1">
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
                                        <?php //if($boards->board_id == @$product_list['0']->board_id){ echo 'selected'; } ?>>
                                        <?php echo $boards->board_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div> -->

                        <div class="filter-col">
                            <h3 class="filter-col-title cal-h3">CLASS</h3>
                            <div class="select-box">
                                <select name="filter_class_dropdown" id="filter_class_dropdown">
                                    <?php 
                                     $cr=1;
                                     $fclass_id ='';
                                    foreach($res_filter_class as $classes){
                                        if($cr==1)
                                        {
                                            $fclass_id = $classes->class_id;
                                        }    
                                        $cr++;
                                        ?>
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
                                    <?php 
                                    $cl=1;
                                    $fcourse_id ='';
                                    foreach($res_filter_course as $classes){
                                    if($cl==1)
                                    {
                                        $fcourse_id = $classes->id;
                                    }    
                                    $cl++;
                                    ?>
                                    <option value="<?php echo $classes->id; ?>"
                                        <?php //if($classes->id == @$get_single_course_detail->course_id){ echo 'selected'; } ?>>
                                        <?php echo $classes->course_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>


                      <!--  <div class="filter-col">
                            <h3 class="filter-col-title">BATCH (Cohort) <span>Running Year</span></h3>
                            <div class="select-box">
                                <select name="batch" id="batch">
                                    <?php foreach($batch_records as $batches){?>
                                    <option value="<?php echo $batches->batch_id; ?>"
                                        <?php if($batches->batch_id == @$get_single_course_detail->batch_id){ echo 'selected'; } ?>>
                                        <?php echo $batches->batch_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div> -->
                       <!-- <div class=" filter-col ">
                            <div class="filter-list-box">
                                <button type="button" class="apply-btn apply_filter">Apply Filter</button>
                            </div>
                        </div>-->
                    </form>

                </div>
            <!-- Left End -->

            <!--center start-->
            <div class="col-md-8">
            <div id="selectedValues" style="display:none"></div>  <!-- for filter values display -->
            <div id="test_id"></div>
                <div class="review-center">
                    <!-- <div class="review-btn-box">

                    </div> -->
                    <!-- <div class="review-btn-box">
                <button type="button" class="review-btn" data-bs-toggle="modal" data-bs-target="#compareModal"><img
                        src="<?php echo base_url(); ?>assets/images/review-icon2.png" alt=""> Add a brand to
                    compare</button>
            </div> -->

                    <div class="brand-add-box d-flex justify-content-center align-items-center">
                        <?php //print_ex($compare_list1); 
                ?>
                        <!--col-->
                        <?php if (!empty($compare_list1)) {
                    foreach ($compare_list1 as $comp_list1) {
                       
                        $resp_brand_details1 =  get_brand_details($comp_list1->brand_id);
                       if($resp_brand_details1)
                       {
                       
                        ?>
                        <div class="popular-col">
                        <div class="close-button">
                            <button type="button" id="btn_close" value="<?php echo $comp_list1->brand_id; ?>" class="close-button btn_close">X</button>
                        </div>
                        
                            <a href="<?php echo $resp_brand_details1->brand_slug; ?>">
                                <div class="popular-col-image"><img
                                        src="<?php echo base_url(); ?>uploads/brand/<?php echo $resp_brand_details1->brand_image; ?>"
                                        alt="" /></div>
                                <h3><?php echo $resp_brand_details1->brand_name; ?></h3>
                                <div>
                                </div>
                            </a>
                        </div>
                        <?php } }
                } ?>
                        <!--col-->
                        <?php if (!empty($compare_list2)) {
                           //print_R($compare_list2);
                    foreach ($compare_list2 as $comp_list2) { 
                        $resp_brand_details2 =  get_brand_details($comp_list2->brand_id);
                       if($resp_brand_details2)
                       {
                        ?>
                        <div class="popular-col">
                        <div class="close-button">
                            <button type="button" id="btn_close" value="<?php echo $comp_list2->brand_id; ?>" class="close-button btn_close">X</button>
                        </div>
                            <a href="<?php echo $resp_brand_details2->brand_slug; ?>">
                                <div class="popular-col-image"><img
                                        src="<?php echo base_url(); ?>uploads/brand/<?php echo $resp_brand_details2->brand_image; ?>"
                                        alt="" /></div>
                                <h3><?php echo $resp_brand_details2->brand_name; ?></h3>
                                <div>
                                   
                                </div>
                            </a>
                        </div>
                        <?php } }
                } ?>
                        <?php if (!empty($compare_list3)) {
                    foreach ($compare_list3 as $comp_list3) { 
                        $resp_brand_details3 =  get_brand_details($comp_list3->brand_id);
                        if($resp_brand_details3)
                        {
                        ?>
                        <div class="popular-col">
                        <div class="close-button">
                            <button type="button" id="btn_close" value="<?php echo $comp_list3->brand_id; ?>" class="close-button btn_close">X</button>
                        </div>
                            <a href="<?php echo $resp_brand_details3->brand_slug; ?>">
                                <div class="popular-col-image"><img
                                        src="<?php echo base_url(); ?>uploads/brand/<?php echo $resp_brand_details3->brand_image; ?>"
                                        alt="" /></div>
                                <h3><?php echo $resp_brand_details3->brand_name; ?></h3>
                                <div>
                                </div>
                            </a>
                        </div>
                        <?php } }
                } ?>
                        <?php 
                        
                        if ($comparison_id >= 3) { ?>
                        <?php } else { ?>
                        <button type="button" class="add-brand-icon" data-bs-toggle="modal"
                            data-bs-target="#compareModal">
                            <img src="<?php echo base_url(); ?>assets/images/add-icon.png" alt="">
                            Add brand to compare
                        </button>
                        <?php } ?>
                    </div>
                    <div class="brand-review-table p-3">
                        <table class="table table-bordered text-center">
                            <tr>
                                <th style="background:#ebf6ff" colspan=" 4">Overview</th>
                            </tr>
                            <tr>
                                <?php
                                ////print_R($compare_list1);
                                ?>
                                <td class="compare-table"> Overall ratings</td>
                                <?php if (!empty($compare_list1)) { ?>
                                <td class="first-column"><span
                                        class="rating-number"><?php echo @$compare_list1[0]->overall_brand; ?> /
                                        10
                                    </span>
                                </td>
                                <?php } ?>
                                <?php if (!empty($compare_list2)) { ?>
                                <td class="second-column"><span
                                        class="rating-number"><?php echo @$compare_list2[0]->overall_brand; ?>
                                        /
                                        10</span>
                                </td>
                                <?php } ?>
                                <?php if (!empty($compare_list3)) { ?>
                                <td class="thrid-column"><span
                                        class="rating-number"><?php echo @$compare_list3[0]->overall_brand; ?> /
                                        10</span>
                                </td>
                                <?php } ?>
                            </tr>

                            <!-- <tr>
                                <th colspan="4">Faculty</th>
                            </tr> -->
                            <tr>
                                <td class="compare-table">Faculty</td>
                                <?php if (!empty($compare_list1)) { ?>
                                <td class="first-column"><?php echo @$compare_list1[0]->faculty_quality; ?></td>
                                <?php } ?>
                                <?php if (!empty($compare_list2)) { ?>
                                <td class="second-column"><?php echo @$compare_list2[0]->faculty_quality; ?></td>
                                <?php } ?>
                                <?php if (!empty($compare_list3)) { ?>
                                <td class="thrid-column"><?php echo @$compare_list3[0]->faculty_quality; ?></td>
                                <?php } ?>
                            </tr>

                            <!-- <tr>
                                <th colspan="4">Aging of Co.</th>
                            </tr> -->
                            <tr>
                                <td class="compare-table">Aging of Co.</td>
                                <?php if (!empty($compare_list1)) {
                            //print_R($compare_list1);
                            ?>
                                <td class="first-column"><?php echo @$compare_list1[0]->aging; ?></td>
                                <?php } ?>
                                <?php if (!empty($compare_list2)) { ?>
                                <td class="second-column"><?php echo @$compare_list2[0]->aging; ?></td>
                                <?php } ?>
                                <?php if (!empty($compare_list3)) { ?>
                                <td class="thrid-column"><?php echo @$compare_list3[0]->aging; ?></td>
                                <?php } ?>
                            </tr>
                            <!-- <tr>
                                <th colspan="4">Academic Results</th>
                            </tr> -->
                            <tr>
                                <td class="compare-table">Academic Results</td>
                                <?php if (!empty($compare_list1)) { ?>
                                <td class="first-column"><?php echo @$compare_list1[0]->acadmic_quality; ?></td>
                                <?php } ?>
                                <?php if (!empty($compare_list2)) { ?>
                                <td class="second-column"><?php echo @$compare_list2[0]->acadmic_quality; ?></td>
                                <?php } ?>
                                <?php if (!empty($compare_list3)) { ?>
                                <td class="thrid-column"><?php echo @$compare_list3[0]->acadmic_quality; ?></td>
                                <?php } ?>
                            </tr>
                            <!-- <tr>
                                <th colspan="4">Referral Score</th>
                            </tr> -->
                            <tr>
                                <td class="compare-table">Referral Score</td>
                                <?php if (!empty($compare_list1)) { ?>
                                <td class="first-column"><?php echo @$compare_list1[0]->referal_score; ?></td>
                                <?php } ?>
                                <?php if (!empty($compare_list2)) { ?>
                                <td class="second-column"><?php echo @$compare_list2[0]->referal_score; ?></td>
                                <?php } ?>
                                <?php if (!empty($compare_list3)) { ?>
                                <td class="thrid-column"><?php echo @$compare_list3[0]->referal_score; ?></td>
                                <?php } ?>
                            </tr>
                            <!-- <tr>
                                <th colspan="4">Complaint Score</th>
                            </tr> -->
                            <tr>
                                <td class="compare-table">Complaint Score</td>
                                <?php if (!empty($compare_list1)) { ?>
                                <td class="first-column"><?php echo @$compare_list1[0]->complaint_score; ?></td>
                                <?php } ?>
                                <?php if (!empty($compare_list2)) { ?>
                                <td class="second-column"><?php echo @$compare_list2[0]->complaint_score; ?></td>
                                <?php } ?>
                                <?php if (!empty($compare_list3)) { ?>
                                <td class="thrid-column"><?php echo @$compare_list3[0]->complaint_score; ?></td>
                                <?php } ?>
                            </tr>
                            <!-- <tr>
                                <th colspan="4">Market Reputation</th>
                            </tr> -->
                            <tr>
                                <td class="compare-table">Market Reputation</td>
                                <?php if (!empty($compare_list1)) { ?>
                                <td class="first-column"><?php echo @$compare_list1[0]->market_reputation; ?></td>
                                <?php } ?>
                                <?php if (!empty($compare_list2)) { ?>
                                <td class="second-column"><?php echo @$compare_list2[0]->market_reputation; ?></td>
                                <?php } ?>
                                <?php if (!empty($compare_list3)) { ?>
                                <td class="thrid-column"><?php echo @$compare_list3[0]->market_reputation; ?></td>
                                <?php } ?>
                            </tr>
                            <!-- <tr>
                                <th colspan="4">Edcohort Rating</th>
                            </tr> -->
                            <tr>
                                <td class="compare-table">Edcohort Rating</td>
                                <?php if (!empty($compare_list1)) { ?>
                                <td class="first-column"><?php echo @$compare_list1[0]->edcohort_rating; ?></td>
                                <?php } ?>
                                <?php if (!empty($compare_list2)) { ?>
                                <td class="second-column"><?php echo @$compare_list2[0]->edcohort_rating; ?></td>
                                <?php } ?>
                                <?php if (!empty($compare_list3)) { ?>
                                <td class="thrid-column"><?php echo @$compare_list3[0]->edcohort_rating; ?></td>
                                <?php } ?>
                            </tr>


                        </table>
                    </div>
                </div>

                <!--center end-->

            </div>
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
                                been
                                the indus.....</p>
                        </div>
                        <div class="helpful-right">
                            <a href="#"
                                class="d-flex flex-wrap justify-content-center align-items-center text-center">Quick
                                Read<br /> 1 min</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--content end-->
            <!--wrapper end-->
            <!-- Modal -->
            <div class="modal fade compare-modal-box" id="compareModal" tabindex="-1"
                aria-labelledby="compareModalModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <h3 class="search-title">
                            <!--Search--> Brands to compare
                        </h3>
                        <input type="hidden" class="form-control" name="course" id="course" placeholder="Your Name"
                            value="<?php echo $course; ?>">
                        <input type="hidden" class="form-control" name="brand" id="brand" placeholder="Your Name"
                            value="<?php echo $brandID; ?>">
                        <input type="hidden" class="form-control" name="product_type" id="product_type"
                            placeholder="Your Name" value="<?php echo $product_type; ?>">
                        <input type="hidden" class="form-control" name="board" id="board" placeholder="Your Name"
                            value="<?php echo $board; ?>">
                        <input type="hidden" class="form-control" name="class" id="class" placeholder="Your Name"
                            value="<?php echo $class; ?>">
                        <input type="hidden" class="form-control" name="batch" id="batch" placeholder="Your Name"
                            value="<?php echo $batch; ?>">
                        <input type="hidden" class="form-control" name="customer_rating" id="customer_rating"
                            placeholder="Your Name" value="<?php echo $customer_rating; ?>">
                        <input type="hidden" class="form-control" name="date_posted" id="date_posted"
                            placeholder="Your Name" value="<?php echo $date_posted; ?>">
                        <input type="hidden" class="form-control" name="sort_by" id="sort_by" placeholder="Your Name"
                            value="<?php echo $sort_by; ?>">
                        <input type="hidden" class="form-control" name="segment" id="segment" placeholder="Your Name"
                            value="<?php echo $segment; ?>">

                            <input type="hidden" value = "<?php echo $segment?>" class = "segment">
                            <input type="hidden" value = "<?php //echo $course ?>" class = "course">
                            <input type="hidden" value = "<?php echo $fclass_id ?>" class = "filter_class">
                            <input type="hidden" value = "<?php echo $fcourse_id ?>" class = "filter_course">
                            <input type="hidden" value = "<?php //echo $get_single_course_detail->batch_id ?>" class = "filter_batch">
                            <input type="hidden" value = "<?php //echo $get_single_course_detail->board_id ?>" class = "filter_board">
                            <input type="hidden" value = "<?php //echo $get_single_course_detail->product_type ?>" class = "filter_online_offline">
                            <input type="hidden" value = "<?php echo $brandID_header ?>" class = "brandID_header">
                            <input type="hidden" value = "<?php echo $segment_temp ?>" class = "segment_temp">
                            

                        <!-- <div class="brand-search-box">
                <div class="search-result-col" id="search-1" style="display: none;"><a href="#"><img src="<?php echo base_url(); ?>assets/images/close3.png" alt=""></a></div>
                <div class="search-result-col" id="search-2" style="display: none;"> <a href="#"><img src="<?php echo base_url(); ?>assets/images/close3.png" alt=""></a></div>
                <div class="search-result-col" id="search-3" style="display: none;"> <a href="#"><img src="<?php echo base_url(); ?>assets/images/close3.png" alt=""></a></div>
                <input class="brand-search-input" type="text" placeholder="Ex.Vedantu, unacademy ">
            </div> -->
            <script id="review-template" type="text/x-handlebars-template">
                        <div class="popular-row">
                            <!--col-->
                            <input type="text" id="brandSearchInput" placeholder="Search brand..." onkeyup="filterBrands()">
                            
                            {{#if items}}
                                {{#each items}}

                                
                             
                                    
                                <div class="popular-col brand-item">
                                    <a href="javascript:void(0)"
                                        onclick="compare_brand({{brand_name}},{{brand_id}})">
                                        <input type="checkbox" name="brand_select[]" id="brand_select"
                                            value="{{brand_id}}" >
                                        <div class="popular-col-image"><img
                                                src="{{brand_image}}">
                                        </div>
                                        <h3>{{brand_name}}</h3>
                                    </a>
                                </div>
                                {{/each}}
                            {{/if}}
                           
                            <?php 
                          //  $res_brand_list = getseg_brand_list($segment);
                            ?>
                          <!--  <?php foreach ($res_brand_list as $brand) {
                              ////  print_R($brand); 
                                ?>
                            <div class="popular-col">
                                <a href="javascript:void(0)"
                                    onclick="compare_brand('<?php echo $brand->brand_name; ?>','<?php echo $brand->brand_id; ?>')">
                                    <input type="checkbox" name="brand_select[]" id="brand_select"
                                        value="<?php echo $brand->brand_id; ?>"
                                        <?php if ($brand->brand_id == $brandID) { ?> checked <?php } ?>>
                                    <div class="popular-col-image"><img
                                            src="<?php echo base_url(); ?>uploads/brand/<?php echo $brand->brand_image; ?>">
                                    </div>
                                    <h3><?php echo $brand->brand_name; ?></h3>
                                </a>
                            </div>
                            <?php } ?>  -->
                        </div>

                        </script>
                        <div class="reviews-wrapper"> </div>
                        
                        <div class="compare-info">
                            <div class="compare-info-left">You can compare maximum 3 brands</div>
                            <div class="compare-info-right"><span id="selectCount">0</span> of 3 selected</div>
                            <div class="compare-info-left-error" id="compare-info-left-error"
                                style="color:red; display: none;">
                                You can compare maximum only 3 brands</div>
                        </div>
                        <a href="javascript:void(0)" class="confirm-btn" id="compareBtn">Compare</a>
                    </div>
                    
                </div>
            </div>
          
            <!--libs-->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
            <!--plugin js-->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous">
            </script>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/ScrollToFixed/1.0.8/jquery-scrolltofixed-min.js'>
            </script>
            <script src="<?php echo base_url(); ?>assets/js/script.js"></script>
            <script>
                 $(document).ready(function() {
        var radio_btn_val = '';
        filter_segment
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
        var brandID_header = $('.brandID_header').val();
        var segment_temp = $('.segment_temp').val();
        var product_id = '';
        if(filter_board_id == '')
        {
            filter_board_id = 1;
        }
        console.log(filter_course_id);
        var isClickedSegment = true;
        var drop_down_text =$('#filter_segment :selected').text().trim(); // for segment text
        var SegmentParamKey ='segment';
        var isClickedClass = false;
        var FilterClassText = '';
        var ClassParamKey ='class';
        var isClickedCourse = false;
        var FilterCourseText = '';
        var CourseParamKey ='course';
        var isClickedBoard = false;
        var FilterBoardText = '';
        var BoardParamKey ='board';
       

        var requestData = {};
            requestData.segment = filter_segment_id;
            requestData.board = filter_board_id;
            requestData.class = filter_class_id;
            requestData.course = filter_course_id;
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
            filter_class(filter_segment_id);
            get_all_data();
        });

 
        $('.toggle_cbsc').click(function() {
            filter_board_id = $('#cbsc').val();
            $("#icsc-toggle").removeClass('active');
            $("#cbsc-toggle").addClass('active');
            isClickedBoard = true;
            FilterBoardText = 'cbsc';
            get_all_data();
            filter_class(filter_segment_id);

        });
        $('.toggle_icsc').click(function() {
            filter_board_id = $('#icsc').val();
            
            $("#icsc-toggle").addClass('active');
            $("#cbsc-toggle").removeClass('active');
            isClickedBoard = true;
            FilterBoardText = 'icsc';
            get_all_data();
            filter_class(filter_segment_id);

        });
        $('.toggle_online').click(function() { 
            filter_board_id = $('#online').val();
            $("#offline-toggle").removeClass('active');
            $("#online-toggle").addClass('active');
            isClickedBoard = true;
            FilterBoardText = 'online';
            get_all_data();
            filter_class(filter_segment_id);

        });
        $('.toggle_offline').click(function() {
            filter_board_id = $('#offline').val();
            $("#online-toggle").removeClass('active');
            $("#offline-toggle").addClass('active');
            isClickedBoard = true;
            FilterBoardText = 'offline';
            get_all_data();
            filter_class(filter_segment_id);
        });
   
        $("#brand").change(function()
        {
            filter_brand_id = $(this).val();
            filter_class(filter_brand_id,filter_segment_id);
        });


        $("#filter_class_dropdown").change(function()
        {
            filter_class_id = $(this).val();
           
            FilterClassText = $('#filter_class_dropdown :selected').text().trim();
            filter_course(filter_brand_id,filter_segment_id,filter_board_id,filter_class_id);
            isClickedClass =true;
            
           
        });

        $("#filter_course_dropdown").change(function()
        {
            filter_course_id = $(this).val();
           
            FilterCourseText = $('#filter_course_dropdown :selected').text().trim();
           // filter_batch(filter_brand_id,filter_segment_id,filter_board_id,filter_class_id,filter_course_id);
            isClickedCourse =true;
            get_all_data();
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
                   //console.log(response.data[0]);
                   if(response.data == "")
                   {
                        alert("No data found");
                   }else{
                        filter_batch_id = response.data[0].batch_id;
                        filter_segment_id = response.data[0].segment_id;
                        filter_board_id = response.data[0].board_id;
                        product_id = response.data[0].product_id;
                        window.location="<?php echo base_url();?>comparison/?course="+product_id+"&segment="+filter_segment_id;
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

        function filter_class(segment_id)
        {
            
            $.ajax({
                type : 'POST',    
                url: "<?php echo base_url(); ?>filter/get_filter_class_detail_comparison",
                data:{
                  // brand_id : brand_id,
                    segment:segment_id,
                    filter_board_id:filter_board_id,
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
                    requestData.class = filter_class_id;
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
               url: "<?php echo base_url(); ?>filter/get_filter_course_detail_comparison",
              data:{
                segment:segment_id,
                board: board_id,
                class: class_id,
              //  brand_id : brand_id,
               // batch: filter_batch_id,
              }, 
              dataType: "json",   
              success: function (response) {
                  // console.log(response.data);
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
                requestData.course = filter_course_id;
                get_all_data();
                
                $('#filter_course_dropdown').empty().append(options); 
                if(filter_course_id_temp)
                {
                    //filter_batch(brand_id,segment_id,board_id,class_id,filter_course_id_temp)
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
               url: "<?php echo base_url(); ?>filter/get_all_data_comparison",
              data: requestData, 
              dataType: "json",   
              success: function (response) {
                   
                if (response && response.items.length > 0) {
                    //console.log(response.total_items);
                    
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
                $("#test_id").html(response.total_items +' Brand Available');

            }
            else{
                  // Compile the Handlebars template
                var templateScript = $("#review-template").html();
                var template = Handlebars.compile(templateScript);
                    
                // Render the template with the response data
                var html = template(response);

                // Append the rendered HTML to the DOM
                $('.reviews-wrapper').html(html);
              
                $("#test_id").html('0 Brand Available');
            }
              }
           });
        }
        var brandID='';
        var numberChecked = '';
        $('#compareBtn').click(function() {
                 numberChecked = $("input[name='brand_select[]']:checked").length;
                //alert(numberChecked);
                if (numberChecked > 3) {
                    //alert(numberChecked);
                    $("#compare-info-left-error").show();
                } else {
                    $("#compare-info-left-error").hide();
                    var srs = [];
                    $("input[name='brand_select[]']:checked").each(function() {
                        //alert( $(this).val() );
                        srs.push($(this).val());
                    });
                    brandID = srs.toString();
                    compare_click();
                    // alert(srs);
                   
                    //    $.ajax({
                    //         url:"<?php echo base_url(); ?>comparison-search",
                    //         method:"POST",
                    //         data:{brandID:brandID},
                    //         success:function(data)
                    //         {
                    //             $('#batch').html(data);
                    //         }
                    //     });
                }
            });
            $('.btn_close').click(function() {
                var btn_value = $(this).val()
               console.log(brandID_header); 
                //  let valuesArray = brandID_header.split(',');
               if (brandID_header.includes(btn_value)) {
                // Remove value from string
                brandID_header = brandID_header.split(',')
                               .filter(value => value !== btn_value)
                               .join(',');
                               brandID = brandID_header;
            } 
            compare_click();   
            });

            function compare_click()
            {
                
                var course = $('#course').val();
                var brand = $('#brand').val();
                var product_type = $('#product_type').val();
                var board = $('#board').val();
                var classid = $('#class').val();
                var batch = $('#batch').val();
                var customer_rating = $('#customer_rating').val();
                var date_posted = $('#date_posted').val();
                var sort_by = $('#sort_by').val();
                var segment = $('#segment').val();
                window.location = base_url + 'comparison?brandID=' + brandID + '&segment=' + segment_temp;
            }

       

    });
        /** End Filter Section */                                       

        function filterBrands() // Search Brand 
        {
            // Get input value and convert to lowercase for case-insensitive search
            var input = document.getElementById('brandSearchInput').value.toLowerCase();
            // Get all brand items
            var brandItems = document.getElementsByClassName('brand-item');
            // Loop through each brand item
            for (var i = 0; i < brandItems.length; i++) {
                var brandName = brandItems[i].getElementsByTagName('h3')[0];
                var brandCheckbox = brandItems[i].getElementsByClassName('brand-checkbox')[0];

                // Check if the brand name matches the search input
                if (brandName.innerHTML.toLowerCase().indexOf(input) > -1) {
                    brandItems[i].style.display = "";  // Show matching brand item
                } else {
                    brandItems[i].style.display = "none";  // Hide non-matching brand item
                }
            }
        }

        

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

            function viewRepliesAll(val) {
                if ($('.review_reply_' + val).css('display') == 'none') {
                    $('.review_reply_' + val).css('display', 'block');
                } else {
                    $('.review_reply_' + val).css('display', 'none');
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
            
       

            /*function compare_brand_remove(id)
        {
                console.log(numberChecked);
        }*/
            </script>


            <script type="text/javascript">
            var count = 0;
            
            function compare_brand(name, id) {
                //count++;
                // alert(count);
                if (count < 3) {
                    $("input[name='brand_select[]']:checked").on('change', function() {
                        var $el = $(this);
                        if ($el.prop('checked')) {
                            count++;
                            $('#selectCount').html("");
                            $('#selectCount').html("<span>" + count + "</span>");
                            //alert(count);

                            // $('#search-'+count+'').append("<p>"+name+"</p>");  
                            // $('#search-'+count+'').show(); 
                        } else {
                            count--;
                            // $('#search-'+count+'').append();  
                            // $('#search-'+count+'').hide(); 
                            $('#selectCount').html("");
                            $('#selectCount').html("<span>" + count + "</span>");
                        }
                    });
                } else {
                    $('#compare-info-left-error').show();
                }
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