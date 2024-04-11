<div class="app-content  my-3 my-md-5">
					<div class="side-app">
						<div class="page-header">
							<h4 class="page-title">Event Registers List</h4>
							<ol class="breadcrumb">
							<section class="content-header">
                            <h1>
                                <a href="<?= site_url('admin_event/add_event') ?>" class="btn btn-info">Add Event</a>
                            </h1>
                            </section>
							</ol>
						</div>
						<!--/Page-Header-->

						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Event Registers List</h3> 
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
                                                        <th>Event Code</th>
														<th>Customer  Name</th>
														<th>Event Date</th>
														<th>Title</th>
														<th>Start Time</th>
														<th>End Time</th>
														<th>Taken By</th> 
													</tr>
												</thead>
												<tbody>
                                                   
													<?php  $cnt = 1; //print_pre($records)?>
													<?php foreach ($records as $rec) {
                                                        
														?>
														<tr>
														<td><?php echo $cnt; ?></td>
														<td><?php echo ucfirst($rec->event_code); ?></td>
														<td><?php echo (get_user_name($rec->user_id)); ?></td>
                                                        <td><?php echo date('d-m-Y',strtotime(($rec->event_date))); ?></td>
														<td><?php echo $rec->event_title; ?></td>
														<td><?php echo date('H:i:s',strtotime($rec->event_start_time)); ?></td>
														<td><?php echo date('H:i:s',strtotime($rec->event_end_time)); ?></td>
                                                        <td><?php echo (get_user_name($rec->taken_by)); ?></td>
														
														
														
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