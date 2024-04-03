<?php
$get_single_course_detail = get_single_coure_detail($event_detail[0]->product_id);

?>
<div class="app-content  my-3 my-md-5">
                    <div class="side-app">
                        <div class="page-header">
                            <h4 class="page-title">Event</h4>
                            <ol class="breadcrumb">
                            <section class="content-header">
                            <h1>
                                <a href="<?= site_url('admin_event') ?>" class="btn btn-info">Manage</a>
                            </h1>
                            </section>
                            </ol> 
                        </div>
                        <!--/Page-Header-->
                        
<?php
//print_R($event_detail);
?>
                        <div class="row">                           
                            <!-- end col -->
                            <div class="col-xl-12">
                                 <?php message(); ?>
                                <div class="card m-b-20">
                                    <div class="card-header">
                                        <h3 class="card-title">Edit Event</h3>
                                    </div>
                                    <div class="card-body mb-0">
                                    
                                            
                                            <?php
                                            
                                            $resp_get_speaker_role_list = '';
                                            $resp_get_speaker_role_list = get_speaker_role_list();
                                            ?>

                                             <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                                    <label for="">Event Code <span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <div class="form-line ">
                                                            <input type="text" class="form-control" id="code" value="<?php echo $event_detail[0]->event_code ?>" name="code" required placeholder="Event Code" maxlength="40" readonly = 'true'>
                                                        </div>                                           
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                                    <label for="">Title<span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <div class="form-line ">
                                                            <input type="text" class="form-control" id="title" value="<?php echo $event_detail[0]->event_title ?>" name="title" required placeholder="Title" maxlength="40">
                                                        </div>                                           
                                                    </div>
                                                </div>
                                            </div>

											<div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                                    <label for="">Date <span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <div class="form-line ">
                                                            <input type="date" class="form-control" id="event_date" value="<?php echo $event_detail[0]->event_date ?>" name="date" required placeholder="date" min="<?php echo date('Y-m-d'); ?>">
                                                        </div>                                           
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                                    <label for="">From Time <span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <div class="form-line ">
                                                            <input type="time" class="form-control" id="from_time" name="from_time" value="<?php echo $event_detail[0]->event_start_time ?>" required placeholder="From Time" maxlength="10">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                                    <label for="">To Time <span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <div class="form-line ">
                                                            <input type="time" class="form-control" id="to_time" name="to_time" value="<?php echo $event_detail[0]->event_end_time ?>" required placeholder="To Time" maxlength="10">
                                                        </div>                                           
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                                        <label class="form-label">Event Type</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                                        <select class="form-control" name="event_type" id="event_type" required>
                                                          <option value="1" <?php if(@$event_detail['0']->event_type=="1"){ echo "selected"; } ?>>Online</option>
                                                          <option value="0" <?php if(@$event_detail['0']->event_type=="0"){ echo "selected"; } ?>>Offline</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                             
                                            <div class="form-group ">
                                                <div class="row">
                                                   <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                                        <label class="form-label">Role</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                                        <select class="form-control" name="role_id" id="role_id"  onchange="doAction(this)"  required>
                                                          <?php foreach ($resp_get_speaker_role_list as  $role) { ?>
                                                              <option value="<?php echo $role->customer_id ?>" <?php if(@$role->customer_id == $event_detail[0]->taken_by){ echo "selected"; } ?>><?php echo $role->firstname ?></option>
                                                         <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>  
                                            

                                            <div class="form-group ">                                                
                                                <div class="row">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                                        <label class="form-label">Event Description</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                                        <textarea class="form-control"  name="event_desc" id="event_desc" Placeholder= "Event Description" required=""  rows="2"><?php echo $event_detail[0]->event_description ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                                        <label class="form-label">Status</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                                        <select class="form-control" name="status" id="status" required>
                                                          <option value="1"  <?php if(@$event_detail['0']->status=="1"){ echo "selected"; } ?>>Active</option>
                                                          <option value="0"  <?php if(@$event_detail['0']->status=="0"){ echo "selected"; } ?>>Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php 
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
                                                            <option value="<?php echo $segments->id; ?>" <?php if(@$segments->id == $get_single_course_detail->segment_id){ echo "selected"; } ?>>
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
                                                        <option value="<?php echo $brands->brand_id; ?>" <?php if(@$brands->brand_id == $get_single_course_detail->brand_id){ echo "selected"; } ?>>
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
                                                        <option value="<?php echo $classes->class_id; ?>"  <?php if(@$classes->class_id == $get_single_course_detail->class_id){ echo "selected"; } ?>>
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
                                                            <option value="<?php echo $classes->id; ?>"  <?php if(@$classes->id == $get_single_course_detail->course_id){ echo "selected"; } ?>>
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
                                                            <option value="<?php echo $batches->batch_id; ?>" <?php if(@$batches->batch_id == $get_single_course_detail->batch_id){ echo "selected"; } ?>>
                                                                <?php echo $batches->batch_name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                              
                                            <div class="form-group mb-0 row justify-content-end">
                                                <div class="col-md-9 float-end">
                                                    <button counselling="submit" class=" submit_event btn btn-primary waves-effect waves-light">Submit</button>
                                                     <button counselling="button" class="btn btn-danger waves-effect waves-light" onclick="window.history.back()">Cancel</button>
                                                </div>
                                            </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
                <input type="hidden" value = "<?php echo $segment?>" class = "segment">
                                           
                                            <input type="hidden" value = "<?php echo $get_single_course_detail->class_id ?>" class = "filter_class">
                                            <input type="hidden" value = "<?php echo $get_single_course_detail->course_id ?>" class = "filter_course">
                                            <input type="hidden" value = "<?php echo $get_single_course_detail->batch_id ?>" class = "filter_batch">
                                            <input type="hidden" value = "<?php echo $get_single_course_detail->board_id ?>" class = "filter_board">
                                            <input type="hidden" value = "<?php echo $get_single_course_detail->product_type ?>" class = "filter_online_offline">
                                            <input type="hidden" value = "<?php echo $get_single_course_detail->brand_id ?>" class = "brand" id = "brand">
                                            <input type="hidden" value = "<?php echo $event_detail[0]->event_id ?>" class = "event_id" id = "event_id">
                                            
                                           
<!-- JQuery js-->
<script src="<?php echo base_url(); ?>/assets/js/jquery-3.2.1.min.js"> </script>
<script>
    
    

    function doAction(val){
        //Forward browser to new url
       
        var roleId = $('#role_id').val();

        if(roleId == 2){
             $("#role_div").show();
         }else{
          $("#role_div").hide();  
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
        var filter_board_id = $('.filter_board').val();
        var event_id = $('.event_id').val();
        var filter_online_offline = $('.filter_online_offline').val();
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
        }
       

        $("#filter_segment").change(function()
        { 
           
           var drop_down_text = $('#filter_segment :selected').text();
           drop_down_text = drop_down_text.trim();
           if(drop_down_text == 'K12' || drop_down_text == 'K-12' || drop_down_text == 'k12')
           {
                 $(".cal-h3").html('CLASS');
                 $('.board-k12').css('display', 'block');
                $('.board-other').css('display', 'none');
           }
           else
           {
                $(".cal-h3").html('COURSE SEGMENT');
                $('.board-other').css('display', 'block');
                $('.board-k12').css('display', 'none');
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
               // board: 1,
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
               //board: 1,
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

        $(".submit_event").click(function()
        {
             event_code = $('#code').val();
             event_title = $('#title').val();
             event_date = $('#event_date').val();
             event_from_time = $('#from_time').val();
             event_to_time = $('#to_time').val();
             event_type = $('#event_type').val();
            event_role =  $('#role_id').val();
            event_description =  $('#event_desc').val();
            event_status = $('#status').val();
            if(!event_code)
            {
                alert("Event Code Cannot Be Empty");    
                return false;
            }
            if(!event_title)
            {
                alert("Event Title Cannot Be Empty");    
                return false;
            }
            if(!event_date)
            {
                alert("Event Date  Cannot Be Empty");    
                return false;
            }
            if(!event_from_time)
            {
                alert("Event From Time Cannot Be Empty");    
                return false;
            }
            if(!event_to_time)
            {
                alert("Event To Time Cannot Be Empty");    
                return false;
            }
            if(!event_description)
            {
                alert("Event Description Cannot Be Empty");    
                return false;
            }

            if(!filter_segment_id)
                {
                   alert("Select Segement");    
                   return false;
                }
               /* if(!filter_board_id)
                {
                   alert("Select Board");          
                   return false;            
                }*/
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
            
            $.ajax({
              type : 'POST',    
               url: "<?php echo base_url(); ?>filter/update_event_detail",
              data:{
                segment:filter_segment_id,
                board: filter_board_id,
               // board: 1,
                class: filter_class_id,
                brand_id : filter_brand_id,
                course : filter_course_id,
                batch: filter_batch_id,
                event_code : event_code,
                event_title : event_title,
                event_date : event_date,
                event_from_time : event_from_time,
                event_to_time : event_to_time,
                event_description : event_description,
                event_status: event_status,
                event_role : event_role,
                event_type : event_type,
                event_id : event_id,


              }, 
              dataType: "json",   
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