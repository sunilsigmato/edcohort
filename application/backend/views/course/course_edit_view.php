<div class="app-content  my-3 my-md-5">
                    <div class="side-app">
                        <div class="page-header">
                            <h4 class="page-title">Course</h4>
                            <ol class="breadcrumb">
                            <section class="content-header">
                            <h1>
                                <a href="<?= site_url('admin_course') ?>" class="btn btn-info">Manage</a>
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
                                        <h3 class="card-title">Edit Course</h3>
                                    </div>
                                    <div class="card-body mb-0">
                                        <?php //print_ex($class_detail);
                                        foreach ($course_detail as $course){ ?>
                                        <form class="form-horizontal" action="<?php echo base_url(); ?>admin_course/edit_course_submit" method="post" enctype="multipart/form-data">
                                            <div class="form-group ">
                                                 <input type="hidden" name="id" value="<?php echo @$course->id ?>">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="examplenameInputname2">Class Name <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" id="course_name" name="course_name" value="<?php echo $course->course_name; ?>" placeholder="Enter Name" required onkeyup="category_slug_name(this.value)" required>
                                                         <input type="hidden" class="form-control" id="course_slug" name="course_slug" placeholder="Enter Course Name" value="<?php echo $course->course_name; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                             <div class="form-group ">                                                
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="examplenameInputname2">Course Description <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-9">
                                                          <textarea id="editor1" class="form-control no-resize" name="course_description" rows="3" cols="80" ><?php echo $course->course_description; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                           <!-- <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Status</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="status" id="status" required>
                                                          <option value="1" <?php if($course->status=="1"){ echo "selected"; } ?>>Active</option>
                                                          <option value="0" <?php if($course->status=="0"){ echo "selected"; } ?>>Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> -->
                                           
                                            <div class="form-group mb-0 row justify-content-end">
                                                <div class="col-md-9 float-end">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                     <button type="button" class="btn btn-danger waves-effect waves-light" onclick="window.history.back()">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                    <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


<script>
    function category_slug_name(value)
    {
        $.ajax(
            {
                type: "POST",
                dataType:'json',
                url:"<?php echo base_url();?>admin_class/get_class_slug_name",
                data: {class_name: value},
                async: false,
                success: function(data)
                {
                    //alert(data);
                    var slug=data.slug_name;
                    $("#segment_slug").val(slug);
                }
            });
    }

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