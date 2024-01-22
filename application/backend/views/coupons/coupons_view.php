<div class="app-content  my-3 my-md-5">
                    <div class="side-app">
                        <div class="page-header">
                            <h4 class="page-title">Manage Coupons </h4>
                            <ol class="breadcrumb">
                            <section class="content-header">
                            <h1>
                                <a href="<?= site_url('admin_coupons') ?>" class="btn btn-info">Referesh</a>
                            </h1>
                            </section>
                            </ol>
                        </div>
                        <!--/Page-Header-->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Coupons List</h3> 

                                        <div class="col-md-6 pull-right">
                                        <?php message(); ?>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="table-responsive mb-0 ">
                                            <table class="data-table-example table table-striped table-bordered table-hover text-nowrap mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>SL No</th>
                                                        <th>Segemnt List</th>
                                                        <th>Coupon Date</th>                                                       
                                                        <th>No of Coupons</th>
                                                        <th>Course</th> 
                                                        <th>User</th>                                                        
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php  $cnt = 1; //print_pre($records)?>
                                                    <?php foreach ($records as $rec) { print_r($rec); ?>
                                                        <tr>
                                                        <td><?php echo $cnt; ?></td>
                                                        <td><?php echo get_segemnt($rec->segment_id); ?></td>
                                                        <td><?php echo ucfirst($rec->coupon_date); ?></td>
                                                        <td><?php echo ucfirst($rec->no_of_coupon); ?></td>
                                                        <td><?php echo ucfirst($rec->course); ?></td>
                                                        <td><?php echo ucfirst($rec->user_id); ?></td>
                                                        <td><?php echo date('d-m-Y',strtotime($rec->date_added)); ?></td>
                                                        
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