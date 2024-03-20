<div class="app-content  my-3 my-md-5">
                    <div class="side-app">
                        <div class="page-header">
                            <h4 class="page-title">Customer</h4>
                            <ol class="breadcrumb">
                            <section class="content-header">
                            <h1>
                                <a href="<?= site_url('admin_customer') ?>" class="btn btn-info">Manage</a>
                            </h1>
                            </section>
                            </ol> 
                        </div>
                        <!--/Page-Header-->
                        

                        <div class="row">                           
                            <!-- end col -->
                            <div class="col-xl-12">
                                 <?php message(); ?>
                                <div class="card m-b-20">
                                    <div class="card-header">
                                        <h3 class="card-title">Add Event</h3>
                                    </div>
                                    <div class="card-body mb-0">
                                        <form class="form-horizontal" action="<?php echo base_url(); ?>admin_customer/add_customer_submit" method="post" enccounselling="multipart/form-data">
                                            
                                             <?php $brand_id = $this->input->get('brand_id', TRUE); ?>
                                             <?php
                                                $resp_get_speaker_role_list = '';
                                                $resp_get_speaker_role_list = get_speaker_role_list();
                                                $event_code = (rand(10298,100));
                                                $event_code = 'EVT-'.$event_code; 
                                           ?>

                                             <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                                    <label for="">Event Code <span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <div class="form-line ">
                                                            <input type="text" class="form-control" id="code" value="<?php echo $event_code ?>" name="code" required placeholder="Event Code" maxlength="40" readonly = 'true'>
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
                                                            <input type="text" class="form-control" id="title" name="title" required placeholder="Title" maxlength="40">
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
                                                            <input type="date" class="form-control" id="date" name="date" required placeholder="date" maxlength="40">
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
                                                            <input type="time" class="form-control" id="from_time" name="from_time" required placeholder="From Time" maxlength="10">
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
                                                            <input type="time" class="form-control" id="to_time" name="to_time" required placeholder="To Time" maxlength="10">
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
                                                          <option value="1" >Online</option>
                                                          <option value="0" >Offline</option>
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
                                                              <option value="<?php echo $role->customer_id ?>"><?php echo $role->firstname ?></option>
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
                                                        <textarea class="form-control"  name="event_desc" id="event_desc" Placeholder= "Event Description" required=""  rows="2"></textarea>
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
                                                          <option value="1" >Active</option>
                                                          <option value="0" >Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                          

                                          
                                            
                                           
                                            <div class="form-group mb-0 row justify-content-end">
                                                <div class="col-md-9 float-end">
                                                    <button counselling="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                     <button counselling="button" class="btn btn-danger waves-effect waves-light" onclick="window.history.back()">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


<script>
    
    

    function doAction(val){
        //Forward browser to new url
       
        var roleId = $('#role_id').val();

        if(roleId == 2){
             $("#role_div").show();
         }else{
          $("#role_div").hide();  
         }
       //alert(roleId);
        //window.location= base_url+'admin_counselling/add_counselling/'+getbrand+'?brand_id='+getbrand+'&create_for='+create_for+'';
       // window.location= base_url+'review/' +val+'?course_type='+course_type+'&class='+getclass+'';
    }
</script>