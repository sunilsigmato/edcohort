<div class="app-content  my-3 my-md-5">
					<div class="side-app">
						<div class="page-header">
							<h4 class="page-title">Customer</h4>
							<ol class="breadcrumb">
							<section class="content-header">
                            <h1>
                                <a href="<?= site_url('admin_customer/add_customer') ?>" class="btn btn-info">Add New</a>
                            </h1>
                            </section>
							</ol>
						</div>
						<!--/Page-Header-->

						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Customer List</h3> 

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
														<th>Phone</th>
														<th>Date</th>
														<th>Details</th>
														<th>Edit</th>
													</tr>
												</thead>
												<tbody>
													<?php  $cnt = 1; //print_pre($records)?>
													<?php foreach ($records as $rec) {
														
														?>
														<tr>
														<td><?php echo $cnt; ?></td>
														<td><?php echo ucfirst($rec->firstname).' '.($rec->lastname); ?></td>
														<td><?php echo $rec->email; ?></td>
														<td><?php echo $rec->phone; ?></td>
														<td><?php echo date('d-m-Y',strtotime($rec->date_added)); ?></td>
														<td>
															<?php if($rec->status == 1){ ?>
																<a href="javascript:void(0)" class="btn btn-success btn-sm">Active</a>
															<?php }else{ ?>
																<a href="javascript:void(0)" class="btn btn-warning btn-sm">Inactive</a>
															<?php } ?>
															
														</td>
														<td>
															<a href="<?php echo base_url(); ?>admin_customer/edit_customer/<?php echo $rec->customer_id; ?>" class="btn btn-outline-light btn-sm waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="Edit"><i class="fe fe-edit-2 fs-16"></i></a>
															<!---<a href="<?php echo base_url(); ?>admin_customer/delete/<?php echo $rec->customer_id; ?>" onclick="return confirm('Are you sure?')" class="btn btn-outline-light btn-sm waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="Delete"><i class="fe fe-trash fs-16"></i></a>-->
														</td>
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