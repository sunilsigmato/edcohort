<div class="app-content  my-3 my-md-5">
                    <div class="side-app">
                        <div class="page-header">
                            <h4 class="page-title">Manage Get In Touch </h4>
                            <ol class="breadcrumb">
                            <section class="content-header">
                            <h1>
                                <a href="<?= site_url('admin_get_in_touch') ?>" class="btn btn-info">Refresh</a>
                            </h1>
                            </section>
                            </ol>
                        </div>
                        <!--/Page-Header-->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Get In Touch List</h3> 

                                        <div class="col-md-6 pull-right">
                                        <?php message(); ?>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="table-responsive mb-0 ">
                                            <table class="data-table-example table table-striped table-bordered table-hover text-nowrap mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>S.no</th>
                                                        <th>Name</th>  
                                                        <th>Email</th>                                                       
                                                        <th>Message</th>
                                                        <th>Status</th>                                                        
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php  $cnt = 1; //print_pre($records)?>
                                                    <?php foreach ($records as $rec) {
                                                        
                                                        ?>
                                                        <tr>
                                                        <td><?php echo $cnt; ?></td>
                                                        <td><?php echo ucfirst($rec->name); ?></td>
                                                        <td><?php echo ucfirst($rec->email); ?></td>
                                                        <td><?php echo ucfirst($rec->message); ?></td>
                                                        <td><?php if($rec->status == 1){ ?>
                                                                <a href="javascript:void(0)" class="btn btn-success btn-sm">Active</a>
                                                            <?php }else{ ?>
                                                                <a href="javascript:void(0)" class="btn btn-warning btn-sm">Inactive</a>
                                                            <?php } ?>
                                                        </td>
                                                        <td><?php echo date('d-m-Y',strtotime($rec->added_on)); ?></td>
                                                        
                                                    </tr>
                                                    <?php $cnt++; } ?>
                                                    
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>