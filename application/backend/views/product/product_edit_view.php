<script src="//cdn.ckeditor.com/4.9.2/full/ckeditor.js"></script>
<div class="app-content  my-3 my-md-5">
                    <div class="side-app">
                        <div class="page-header">
                            <h4 class="page-title">Product</h4>
                            <ol class="breadcrumb">
                            <section class="content-header">
                            <h1>
                                <a href="<?= site_url('admin_product') ?>" class="btn btn-info">Manage</a>
                            </h1>
                            </section>
                            </ol>
                        </div>
                        <!--/Page-Header-->

                        <div class="row">                           
                            <!-- end col -->
                            <div class="col-xl-12">
                                 <?php message(); ?>
                                 <div id="errorMsgDiv"></div>
                                <div class="card m-b-20">
                                    <div class="card-header">
                                        <h3 class="card-title">Edit Product</h3>

                                        
                                    </div>
                                    <div class="card-body mb-0">

                                       <!-- <form class="form-horizontal" action="<?php echo base_url(); ?>admin_product/add_product_submit" role="form" method="post" enctype="multipart/form-data">  -->
                                       <?php foreach ($product_detail as $row): 
                                       
                                        ?>     
                                       <div class="form-group ">                                                
                                                <div class="row">
                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                                        <label class="form-label" id="examplenameInputname2">Item Title <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                                        <input class="form-control" type="text" value="<?php echo $row->product_name ?>" required="" name="item_title" id="item_title" >
                                                    </div>
                                                </div>
                                            </div>
                                            <?php 
                                                        $resp_get_seg_list = '';
                                                         $resp_get_seg_list = getSegmentList();
                                                      
                                                         $segment = 1;
                                                         $res_filter_segment = get_segement();
                                                         $res_filter_brand = getseg_brand_list($segment);
                                                         $res_filter_class = getseg_class_list($segment);
                                                         $res_filter_course = getseg_crse_list($segment);
                                                         $res_filter_board = getallBoardList();
                                                    ?>
                                                    
                                                    
                                                    <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                                        <label class="form-label">Segment</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                                        <select class="form-control" name="brand" id="filter_segment" >
                                                        <option value= "" >Select</option>
                                                        <?php foreach($res_filter_segment as $segments){?>
                                                         <option value="<?php echo $segments->id; ?>" <?php if(@$segments->id == $row->segment_id){ echo "selected"; } ?>>
                                                                <?php echo $segments->segment_name; ?></option>
                                                            <?php } ?>
                                                        </select>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                                        <label class="form-label">Brand</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                                        <select class="form-control brand" name="brand" id="brand" required>
                                                        <?php foreach($res_filter_brand as $brands){?>
                                                        <option value="<?php echo $brands->brand_id; ?>" <?php if(@$segments->id == $row->brand_id){ echo "selected"; } ?>>
                                                            <?php echo $brands->brand_name; ?></option>
                                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="board-k12" style="display:none">
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                                            <label class="form-label">Board</label>
                                                        </div>
                                                        <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                                        <select class="form-control" name="filter_board_online_dropdown" id="filter_board_online_dropdown" required>
                                                            <option value= "" >Select</option>
                                                            <option value="1" >Online</option>
                                                            <option value="0" >Offline</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="board-other" style="display:none">
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                                        <label class="form-label">Board</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                                    <select class="form-control" name="filter_board_cbse_dropdown" id="filter_board_cbse_dropdown" required>
                                                    <option value= "" >Select</option>
                                                    <?php foreach($res_filter_board as $board){?>
                                                        <option value="<?php echo $board->board_id; ?>">
                                                            <?php echo $board->board_name; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>

                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                                        <label class="form-label cal-h3">Class</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                                    <select class="form-control" name="filter_class_dropdown" id="filter_class_dropdown" required>
                                                    <?php foreach($res_filter_class as $classes){?>
                                                        <option value="<?php echo $classes->class_id; ?>"  <?php if(@$classes->class_id == $row->class_id){ echo "selected"; } ?>>
                                                            <?php echo $classes->title; ?></option>
                                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                                        <label class="form-label">Course</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                                        <select class="form-control" name="filter_course_dropdown" id="filter_course_dropdown" required>
                                                        <?php foreach($res_filter_course as $classes){?>
                                                            <option value="<?php echo $classes->id; ?>"  <?php if(@$classes->id == $row->course_id){ echo "selected"; } ?>>
                                                            <?php echo $classes->course_name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                                        <label class="form-label">BATCH</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                                        <select class="form-control" name="batch" id="batch" required>
                                                        <?php foreach($batch_records as $batches){?>
                                                            <option value="<?php echo $batches->batch_id; ?>"  <?php if(@$batches->batch_id == $row->batch_id){ echo "selected"; } ?>>
                                                                <?php echo $batches->batch_name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>




                                            
                                          <!--  <div class="form-group ">                                                
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="examplenameInputname2">Select Category  <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="parent_category" id="parent_category" onchange="" required>
                                                            <option value="0">Select</option>
                                                              <?php if($resp_get_cat_list){ ?>
                                                            <?php foreach ($resp_get_cat_list as $r) { ?>
                                                            <option value="<?php echo $r->category_id; ?>"><?php echo $r->category_name ;?></option>
                                                            <?php } } ?>
                                                        </select>  
                                                    </div>
                                                </div>
                                            </div> 
                                            
                                       



                                            <div class="form-group ">                                                
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="examplenameInputname2">Brand Name</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select class="form-control show-tick" name="brand_name" required="" id="brand_name" onchange="" >
                                                      
                                                        <?php foreach ($brand_list as $brand) { ?>
                                                        <option value="<?php echo $brand->brand_id; ?>"><?php echo getBrandList($brand->brand_id);?></option>
                                                        <?php } ?>
                                                    </select> 
                                                    </div>
                                                </div>
                                            </div>

                                             <div class="form-group ">                                                
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="examplenameInputname2">Class Name</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select class="form-control show-tick" name="class_name" required="" id="class_name" onchange="" >
                                                      
                                                        <?php foreach ($class_list as $class) { ?>
                                                        <option value="<?php echo $class->class_id; ?>"><?php echo getClassList($class->class_id);?></option>
                                                        <?php } ?>
                                                    </select> 
                                                    </div>
                                                </div>
                                            </div>
                                            <?php 
                                                 $resp_get_course_list = '';
                                                 $resp_get_course_list = get_course();
                                            ?>
                                            <div class="form-group ">                                                
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="examplenameInputname2">Course Name</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select class="form-control show-tick" name="course_id" required="" id="course_id" onchange="" >
                                                       
                                                        <?php foreach ($resp_get_course_list as $course) { ?>
                                                        <option value="<?php echo $course->id; ?>"><?php echo $course->course_name;?></option>
                                                        <?php } ?>
                                                    </select> 
                                                    </div>
                                                </div>
                                            </div>

                                               <div class="form-group ">                                                
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="examplenameInputname2">Board Name</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select class="form-control show-tick" name="board_name" required="" id="board_name" onchange="" >
                                                        
                                                        <?php foreach ($board_list as $board) { ?>
                                                        <option value="<?php echo $board->board_id; ?>"><?php echo getboardList($board->board_id);?></option>
                                                        <?php } ?>
                                                    </select>  
                                                    </div>
                                                </div>
                                            </div>

                                               <div class="form-group ">                                                
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="examplenameInputname2">Batch Name</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select class="form-control show-tick" name="batch_name" required="" id="batch_name" onchange="" >
                                                     
                                                        <?php foreach ($batch_list as $batch) { ?>
                                                        <option value="<?php echo $batch->batch_id; ?>"><?php echo getbatchList($batch->batch_id);?></option>
                                                        <?php } ?>
                                                    </select> 
                                                    </div>
                                                </div>
                                            </div>  -->

                                            <div class="form-group ">                                                
                                                <div class="row">
                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                                        <label class="form-label" id="examplenameInputname2">Product Short Description</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                                        <textarea class="form-control"  name="product_short_description" id="product_short_description" required=""  rows="2"><?php echo $row->product_short_description ?></textarea>
                                                    </div>
                                                </div>
                                            </div>



                                             <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                                        <label class="form-label" id="inputPassword5">Product Long Description</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                                        <textarea class="form-control product_descriptions"  name="product_descriptions" id="product_descriptions"  rows="4"><?php echo $row->product_description ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                             <?php
                                           
                                            
                                               // $resp_get_grad_list = '';
                                              //  $resp_get_grad_list = get_graduated_in();
                                               
                                            ?>
                                            <!--  <div class="form-group ">                                                
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="examplenameInputname2">Graduated In  <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="grad_category" id="grad_category" onchange="" required>
                                                            <option value="0">Select</option>
                                                              <?php if($resp_get_grad_list){ ?>
                                                            <?php foreach ($resp_get_grad_list as $r) { ?>
                                                            <option value="<?php echo $r->id; ?>"><?php echo $r->graduated_name ;?></option>
                                                            <?php } } ?> 
                                                        </select>  
                                                    </div>
                                                </div>
                                            </div>

                                             <div class="form-group ">                                                
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="examplenameInputname2">Sort Order</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                       <input class="form-control" type="text" name="product_sort" id="product_sort" >
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputPassword5">Image</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                         <img id="upload_pic" class="img-thumbnail" src="<?php echo base_url() ?>../camera_icon.png" alt="no-image">

                                                       <input type="file" name="img_upload[]" id="img_upload" onchange="readURL(this);" style="padding: 12px 0px;width:206px;margin-left:0px;outline:none">
                                                    </div>
                                                </div>
                                            </div>  -->

                                            <!--<div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputPassword5">Select multiple files:</label>
                                                    </div>
                                                    <div class="col-md-9">                                                         
                                                       <input id="files" type="file" name="img_upload[]" multiple style="outline:none"/>
                                                        <div class="col-md-12" id="output_img" style="margin-bottom: 12px;">
                                                            <output id="result" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --> 

                                           <!-- <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputPassword5">Video File</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="file" name="video_upload[]" id="video_upload"  multiple style="padding: 12px 5px;width:206px;margin-left:0px;outline:none">    
                                                        <span>File format should be mp4</span>                
                                                    </div>
                                                </div>
                                            </div> 

                                            <div id="product_video"> 
                                                <div class="row clearfix" id="form_vd_id_0">
                                                    <div class="col-md-3">
                                                        <label for="">Video Url Link</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-8">
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input class="form-control" type="text" name="video_link[]" id="video_link_0" placeholder="http://your-domain.com/video-url">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
                                                        <button  type="button" class="btn btn-info" onclick="return product_video()"><i class="fa fa-plus"></i> Add</button>                                     
                                                    </div>
                                                </div>
                                            </div>  -->


                                          <!--  <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputEmail3">Meta Tag Title</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Meta Tag Title">
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputEmail3">Meta Tag Description</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control no-resize" id="meta_description" name="meta_description" rows="3" cols="80" placeholder="Meta Tag Description"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputEmail3">Meta Tag Keyword</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control no-resize" id="meta_keyword" name="meta_keyword" rows="3" cols="80" placeholder="Meta Tag Keyword"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="product_feature" >
                                                <div class="row clearfix" id="form_gr_id_0">
                                                <div class="col-md-3">
                                                    <label for="">Product Features</label>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-6 col-xs-8">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input class="form-control" type="text" name="product_feature[]" id="product_feature_0" >
                                                        </div> 
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-3">
                                                    <button  type="button" class="btn btn-info" onclick="return product_feature()"><i class="fa fa-plus"></i> Add</button>                                     
                                                </div>
                                            </div> 
                                            </div>

                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Product Type</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select class="form-control"  name="product_type" id="product_type" >
                                                        <option value="1">Online</option>
                                                        <option value="2">Offline</option>
                                                    </select> 
                                                    </div>
                                                </div>
                                            </div> -->
                                            
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                                        <label class="form-label">Status</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                                        <select class="form-control"  name="product_status" id="product_status" >
                                                        <option value="active">Active</option>
                                                        <option value="inactive">Inactive</option>
                                                    </select> 
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="form-group mb-0 row justify-content-end">
                                                <div class="col-md-9 float-end">
                                                    <button type="submit" class="submit_event btn btn-primary waves-effect waves-light" >Submit</button>
                                                     <button type="button" class="btn btn-danger waves-effect waves-light" onclick="window.history.back()">Cancel</button>
                                                </div>
                                            </div>
                                            <?php endforeach ?>
                                            
                                       <!-- </form>  -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<input type="hidden" value = "<?php echo $segment?>" class = "segment">
                                           
<input type="hidden" value = "<?php echo $product_detail[0]->class_id ?>" class = "filter_class">
<input type="hidden" value = "<?php echo $product_detail[0]->course_id ?>" class = "filter_course">
<input type="hidden" value = "<?php echo $product_detail[0]->batch_id ?>" class = "filter_batch">
<input type="hidden" value = "<?php echo $product_detail[0]->board_id ?>" class = "filter_board">
<input type="hidden" value = "<?php echo $product_detail[0]->product_type ?>" class = "filter_online_offline">
<input type="hidden" value = "<?php echo $product_detail[0]->brand_id ?>" class = "brand" id = "brand">

<script>
    CKEDITOR.replace( 'product_description' );
</script>
<script src="<?php echo base_url(); ?>/assets/js/jquery-3.2.1.min.js"> </script>
<script>
    function product_attribute()
    {
        var select=$("#attribute_name_0").html();
        var count= $('#product_tag').children('.row').length;
        $("#product_tag").append(`<div class="row clearfix" id="form_gr_id_`+count+`">
            <div class="col-lg-2 col-md-2 col-sm-3 col-12 form-control-label">
                <label for="">Product Attributes <span style="color:red">*</span></label>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-3 col-12">
                <div class="form-group">
                    <div class="form-line">
                        <select name="attribute_name[]" id="attribute_name_`+count+`" required="" class="form-control" onchange="getAttrValue(this.value,`+count+`)">
                            `+select+`                                                       
                        </select>
                    </div> 
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-3 col-xs-8">
                <div class="form-group">
                    <div class="form-line" id="attribute_value_`+count+`">
                    <input class="form-control" type="text" name="product_attribute[]" required="" id="" >
                    </div>  
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
                <button type="button" style="" class="btn bg-red wave-effects" id="remove_`+count+`" value="remove" onclick="return remove_product_tag(`+count+`)"><i class="fa fa-times"></i> Remove</button>                                         
            </div>
        </div>`);
       
    }
    function remove_product_tag(value)
    {
        $("#form_gr_id_"+value).remove();
    }
</script>
<script>
    function product_feature()
    {
        var count= $('#product_feature').children('.row').length;
        $("#product_feature").append(`<div class="row clearfix" id="form_gr_id_`+count+`">
                                    <div class="col-md-3">
                                        <label for="">Product Features</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-8">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input class="form-control" type="text" name="product_feature[]" id="product_feature_`+count+`" >
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-3">
                                        <button type="button" style="" class="btn bg-red wave-effects" id="remove_`+count+`" value="remove" onclick="return remove_product_feature(`+count+`)"><i class="fa fa-times"></i> Remove</button>
                                    </div>
                                </div> `);
    }
    function remove_product_feature(value)
    {
        $("#form_gr_id_"+value).remove();
    }
</script>
<script>
    function product_video()
    {

        var count= $('#product_video').children('.row').length;
        console.log(count)
        $("#product_video").append(`<div class="row clearfix" id="form_vd_id_`+count+`">
            <div class="col-md-3">
                <label for="">Video Url Link</label>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-8">
                <div class="form-group">
                    <div class="form-line">
                        <input class="form-control" type="text" name="video_link[]" id="video_link_`+count+`" >
                    </div> 
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
                <button type="button" style="" class="btn bg-red wave-effects" id="remove_`+count+`" value="remove" onclick="return remove_product_video(`+count+`)"><i class="fa fa-times"></i> Remove</button>
            </div>
        </div> `);
    }
    function remove_product_video(value)
    {
        $("#form_vd_id_"+value).remove();
    }
</script>
<script>
    function readURL(input)
    {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#upload_pic')
                    .attr('src', e.target.result)
                    .width(160)
                    .height(140);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script>
   /* window.onload = function(){
        //Check File API support
        if(window.File && window.FileList && window.FileReader)
        {
            var filesInput = document.getElementById("files");

            filesInput.addEventListener("change", function(event){

                var files = event.target.files; //FileList object
                var output = document.getElementById("result");
                //output.innerHTML="";
                for(var i = 0; i< files.length; i++)
                {
                    var file = files[i];

                    //Only pics
                    if(!file.type.match('image'))
                        continue;

                    var picReader = new FileReader();

                    picReader.addEventListener("load",function(event){

                        var picFile = event.target;

                        var div = document.createElement("div");

                        div.innerHTML = "<img style='height:170px;float:left;' class='thumbnail' src='" + picFile.result + "'" +
                            "title='" + picFile.name + "'/> ";

                        output.insertBefore(div,null);
                        div.children[1].addEventListener("click", function(event){
                            div.parentNode.removeChild(div);
                        });

                    });
                    $('#output_img').on({
                        'click': function(e) {
                            if (e.target.id == 'el') return;
                            e.preventDefault();
                            e.stopPropagation();
                        }
                    })

                    //Read the image
                    picReader.readAsDataURL(file);
                }

            });
        }
        else
        {
            console.log("Your browser does not support File API");
        }
    }*/

    function getAttrValue(id,val)
    {
        $.ajax(
            {
                type: "POST",
                dataType:'json',
                url:"<?php echo base_url();?>admin_product/getAttrValue",
                data: {attribute_id: id},
                async: false,
                success: function(data)
                {
                    //alert(data);
                    var html="";
                    var dataLength=data.length;
                    if(dataLength>0)
                    {   
                        html +=`<select name="product_attribute[]" id="" required="" class="form-control" >`;
                        for (var i = 0; i < dataLength; i++) {
                            html +=`<option value="`+data[i].value+`">`+data[i].value+`</option>`;
                        }
                        html +=`</select>`;                      
                    }
                    else
                    {
                        html +=`<input class="form-control" type="text" required="" name="product_attribute[]" id="" >`;
                    }
                    $("#attribute_value_"+val).html(html);

                }
            });
    }
    function getOptionValue(id) 
    {
        var value=$("#option_name").val();
        console.log(value)
    }
</script>
<script>
function showProductOptoin(id,chk) {
    if(chk==true)
    {
        $('#product_option_div_'+id).show();
    }
    else
    {
        $('#product_option_div_'+id).hide();
        $('#product_option_div_'+id+ ' select').selectpicker('deselectAll');
        $('#product_option_div_'+id+ ' input').removeAttr('checked');
    }
}
</script>
<script>
    function saveOption(){
        var option =$("#options select").serializeArray();
        var check =$("#options input:checkbox").serializeArray();
        var name =$("#options input:hidden").serializeArray();

        $.ajax({
                type: "post",
                dataType:'html',
                url:"<?php echo base_url();?>admin_product/saveOption",
                data: {option: option,check: check,name:name},
                success: function(data)
                {
                    $('#variation_div_first').html(data);
                    $('#variation_div').html('');
                }
            });        
    }
</script>
<script>
    function addVariation(){
        var html=$('#hidden_variation').html();
        $('#variation_div').append(html);        
    }
</script>
<script>
    $(document).on("click", ".removeVariation", function() {
       $(this).closest('.row').remove()
    });
</script>
<script>
    $(document).on("click", ".expandVariation", function() {       
       var display_next=$(this).closest('div').next('.expand_variation');
       var display=display_next.css("display");
       $('.expand_variation').css({"display": "none"});
       $('.expandVariation').html('<i class="fa fa-arrow-down"></i>');   

       if (display === "block") {
            display_next.css({"display": "none"});
            $(this).html('<i class="fa fa-arrow-down"></i>');            
        } else {
            display_next.css({"display": "block"});
            $(this).html('<i class="fa fa-arrow-up"></i>');         
        }
    });
</script>
<script>
    
</script>

<script>
 $(document).ready(function() {
        var radio_btn_val = '';
        filter_segment
        /** Coupon  Code **/
        $(".date_div").css("visibility", "hidden");
        $(".day_after_tmr_header").css("visibility", "hidden");
        $(".today_header").css("visibility", "hidden");
        $(".tmr_header").css("visibility", "hidden");

        $(".day_after_tmr_data").css("visibility", "hidden");
        $(".today").css("visibility", "hidden");
        $(".tommorow").css("visibility", "hidden");
         /** End Coupon  Code **/

        /** Start Filter Section */
            /** Apply Select 2 */
           /* $('.filter_segment').select2();
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
        var filter_board_id = '';
        //var filter_online_offline = $('.filter_online_offline').val();
        var product_id = '';
        var event_code ='';
        var event_title = '';
        var event_date = '';
        var event_from_time ='';
        var event_to_time ='';
        var event_type ='';
        var event_role = '';
        var event_description = '';
        var event_status = '';
        var link = '';
        var img_upload = '';
        var interested = '';


        console.log(filter_segment_id);
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
            //filter_board_id = filter_online_offline;
            
        }
        $('.board-k12').css('display', 'none');
          $('.board-other').css('display', 'none');

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
            if(filter_segment_id == "")
            {
                alert("Please Select Valid Segment");
                return false;
            }
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
        $("#brand").change(function()
        {
            filter_brand_id = $(this).val();
            filter_class(filter_brand_id,filter_segment_id);
        });

        $("#filter_board_online_dropdown").change(function()
        {
           filter_board_id =  $(this).val();
           filter_class(filter_brand_id,filter_segment_id);
          
        });
        $("#filter_board_cbse_dropdown").change(function()
        {
           filter_board_id =  $(this).val();
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
                    }
                    options += '<option value="' + response.data[i].batch_id + '">' + response.data[i].batch_name + '</option>';
                }
                //console.log(options);
                $('#batch').empty().append(options); 
              }
           });
        }

    //     function validateForm(){
    //     var item_title=$("#item_title").val();
    //     var parent_category=$("#parent_category").val();
    //    // var seller_sku=$("#seller_sku").val();
    //     var product_short_description=$("#product_short_description").val();
    //    // var price=$("#price").val();

    //     /*var file1=document.getElementById("img_upload").files.length;
    //     var file2=document.getElementById("files").files.length;
    //     var file_length=parseInt(file1)+parseInt(file2);*/

    //     var message="";
    //     if($.trim(item_title)==""){
    //         alert("Title should not be empty");
    //         return;
    //         message +="<span>Title should not be empty.</span>";            
    //     }
    //     if(parent_category== "" || parent_category== null){
    //         message+="<span>Category should not be empty.</span>"; 
    //     }
    //     // if($.trim(seller_sku)==""){
    //     //     message+="<span>SKU should not be empty.</span>";
    //     // }       
    //     if($.trim(product_short_description)==""){
    //         message+="<span>Short Description should not be empty.</span>";
    //     }       
    //     // if($.trim(price)==""|| parseFloat(price) < 0){
    //     //     message+="<span>Price should not be empty or Zero.</span>";
    //     // }       
    //    /* if(parseInt(file_length) == 0){
    //         message+="<span>Image should not be empty.</span>";
    //     }*/

    //     $("#errorMsgDiv").html("");
    //     $("#errorMsgDiv").html(message);
    //     if(message.length){
    //         return false;
    //     }else{
    //         return true;
    //     }       
        
    // }

        $(".submit_event").click(function()
        {
           
            product_title = $('#item_title').val();
            product_short_description =  $('#product_short_description').val();
            product_description =  $('.product_descriptions').val();
            product_status = $('#product_status').val();
           
            if(!product_title)
            {
                alert("Event Title Cannot Be Empty");    
                return false;
            }
          
            
            if(!product_short_description)
            {
                alert("Event Short Description Cannot Be Empty");    
                return false;
            }
            if(!product_status)
            {
                alert("Event Status Cannot Be Empty");    
                return false;
            }
            if(!filter_segment_id)
                {
                   alert("Select Segment");    
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
                

     

              
                        var form_data = new FormData();
                        form_data.append('segment', filter_segment_id);
                        form_data.append('board', filter_board_id);
                        form_data.append('class', filter_class_id);
                        form_data.append('brand_id', filter_brand_id);
                        form_data.append('course', filter_course_id);
                        form_data.append('batch', filter_batch_id);
                        form_data.append('product_title', product_title);
                        form_data.append('product_description', product_description);
                        form_data.append('product_short_description', product_short_description);
                        form_data.append('product_status', product_status);
                        
                    

            $.ajax({
              type : 'POST',    
               url: "<?php echo base_url(); ?>filter/edit_product_details",
               data: form_data,
               Type: "json",   
               contentType: false,
               processData: false,
              success: function (response) {
                   console.log(response);
                   
                   if(response.data == "")
                   {
                        alert("No data found");
                   }else{
                        if(response.status == "1")
                        {
                            alert(response.data);
                            window.location="<?php echo base_url();?>admin_event";
                        }
                      
                   }
              }
           });

        })

    });
</script>