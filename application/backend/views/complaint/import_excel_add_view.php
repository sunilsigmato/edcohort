
<div class="app-content  my-3 my-md-5">
                    <div class="side-app">
                        <div class="page-header">
                            <h4 class="page-title">Import Complaint</h4>
                            <ol class="breadcrumb">
                            <section class="content-header">
                            <h1>
                                <a href="<?= site_url('admin_review') ?>" class="btn btn-info">Manage</a>
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
                                        <h3 class="card-title">Import Complaint Details</h3>
                                    </div>
                                    <div class="card-body mb-0">
                                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group ">                                                
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="examplenameInputname2"Choose File <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="file" class="form-control file-activity" id="excel_file" name="excel_file" placeholder="Upload Excel Here" >
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="progress">
                                                            <input type="html" class="form-control" id="html" name="excel_file"  >
                                                            <div class="progress-bar progress-bar-success myprogress" role="progressbar" style="width:0%">0%</div>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="col-md-12">
                                                        <button type="button" class="btn btn-primary d-none" id="submit_excel_data" name="submit_excel_data">Submit</button>
                                            </div>
                                        </form>
                                        <?php
                                            $this->load->view('complaint/display_result');
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


