<div id="page-wrapper">	 <?php $this->load->view('doctor_templates/new-sidebar'); ?>	<div class="row">		<div class="col-lg-12">									   <div class="panel panel-default">				<div class="panel-heading title-bar-blue" style="font-weight:bold;">					<i class="fa fa-list"></i> List Complimentary Ad 				</div>                        <!-- /.panel-heading -->                        <div class="panel-body">                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">                                <thead>									<tr class="first-row">									   <th class="br-n">S.No.</th>									  <th class="br-n">Ad Title</th>									  <th class="br-n">Ad Size</th>									  <th class="br-n">Description</th>									  <th class="br-n">File</th>									  <th class="br-n">Active Since</th>									  <th class="br-n">Actions</th>								  </tr>                                 </thead>                                <tbody>								<?php $i='1'; foreach ($complist as $row) { ?>					          <tr>							  	<td><?php echo $i++; ?></td>								<td><?php echo $row->title; ?></td>								<td><?php echo $row->ad_size; ?></td> 								<td class="center"><?php echo substr($row->description, 0,20); ?></td>								<td class="center">									<?php if($row->image !=''){ 										$filename = 'uploads/'.$row->image;										if (file_exists($filename)) {										?>									<a target="_blank" href="<?php echo base_url(); ?>uploads/<?php echo $row->image; ?>"><img width="30" height="40" src="<?php echo base_url(); ?>uploads/<?php echo $row->image; ?>"></a>										<?php } } ?>								</td>								<td><?php echo $row->created; ?></td> 								<td class="center">									<a class="btn btn-info edit-compl" href="javascript:;" data-id="<?php echo $row->id; ?>">										<i class="fa fa-pencil-square-o" aria-hidden="true"></i>									</a>									<a class="btn btn-danger" onclick="return confirm('Are you sure?');" href="<?php echo base_url(); ?>panels/supermacdaddy/doctor/deletecomplim/<?php echo $row->id; ?>">										<i class="fa fa-trash-o" aria-hidden="true"></i>									</a>								</td>							</tr>							<?php } ?>							                                 </tbody>                            </table>                        </div>                    </div>									<div class="panel panel-default">				<div class="panel-heading title-bar-blue" style="font-weight:bold;">					<i class="fa fa-edit"></i> Complimentary Ad				</div>				<div class="panel-body">					<form name="user" method="post" enctype="multipart/form-data" action="">						<div id="form-alerts"></div>						<div class="row">							<div class="col-sm-6">								<div class="col-sm-12">									<div class="form-group">										<label>Ad Title</label>										<input class="form-control" name="title" autocomplete="off" value="" type="text" required="">									</div>								</div>								<div class="col-sm-12">									<div class="form-group">										<label>Ad Size</label>										<select class="form-control" name="ad_size" required="" id="ad_size">											<option value="1080x1920">1080 x 1920</option>										</select>										Please upload image in proper size menstion.									</div>								</div>               								<div class="col-sm-6">									<div class="form-group ">										<label>Choose File</label>										<input  name="image" autocomplete="off" type="file" required="" id="create_taskimage">										<span id="setcreate_taskimage"></span>										<input name="remove_image_task" type="hidden" id="get_imagetask_hidden">																			</div>								</div>								<div class="col-sm-12">									<div class="form-group ">										<label>Active Since </label>										<input class="form-control datetimepicker4" type="text" name="created"  autocomplete="off" placeholder="DD/MM/YYY" required="">									</div>								</div> 							</div>							<div class="col-sm-6 logo-upload" >								<div class="form-group ">									<label>Description</label>									<textarea class="form-control" name="description" placeholder="" rows ="9" required=""></textarea>								</div>							</div>						</div><br>						<div class="row">							<div class="creatUserBottom ">								<div class="">									<div class="vert-pad">										<button type="submit" name="save_btn" class="btn-green">Save Changes</button>									</div>          								</div>								<div class="">									<div class="vert-pad" style="margin-top: 15px;text-decoration: none !important;">										<a href="<?=base_url('panels/supermacdaddy/doctor');?>" class="btn-grey" data-dismiss="modal" >Cancel</a>									</div>								</div>							</div>						</div>					</form>				</div>			</div>		</div>	</div></div><!--Edit  Modal --><div class="modal fade" id="editcomplpopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">	<div class="modal-dialog" role="document">		<div class="modal-content">			<div class="modal-header title-bar-orange">			  <h5 style="color:#000;width:93%;float:left;font-weight: bold;" class="modal-title" id="exampleModalLabel">Edit Complimentary Ad </h5>			  <button style="width:6%;float:left;" type="button" class="close" data-dismiss="modal" aria-label="Close">				<span style="color:#fff;font-size: 20px;font-weight: bold;" aria-hidden="true">&times;</span>			  </button>			</div>			<div class="modal-body">				<form name="user" method="post" action="" enctype="multipart/form-data" >					<div class="row">						<div class="editcompldata">						<!--/AJAX CALL/-->						 </div>     					</div>					<br>					<div class="modal-footer">						<div class="row">							<div class="creatUserBottom">								<div class="">									<div class="vert-pad">										<button type="submit" name="update_btn" class="btn btn-success btn-green">Update</button>										<button type="button" class="btn btn-warning btn-grey" data-dismiss="modal" style="margin-top:0px;">Cancel</button>									</div>          								</div>							</div>						</div>					</div>				</form>			</div>		</div>  	</div></div> <script>	$( document ).ready(function() {				$(".datetimepicker4").datepicker({			format: 'yyyy-mm-dd',		    autoclose: true,		});	});	$(".edit-compl").click(function(){		var id =$(this).attr("data-id");		$.ajax({		  type: "post",		  url:"<?php echo base_url();?>panels/supermacdaddy/doctor/edit_complimentary",		  data: "&id="+id,		  success: function(response){			$(".editcompldata").html(response);			$('#editcomplpopup').modal('show') ;			$(".datetimepicker4").datepicker({				format: 'yyyy-mm-dd',				autoclose: true,			});					  } 		});		    });				$("#create_taskimage").change(function () {		var formData = new FormData();		var file_data = $('#create_taskimage').prop('files')[0];		formData.append('image', file_data);		var ad_size =$('#ad_size').val();		formData.append('ad_size', ad_size);		$.ajax({			type:'POST',			url:"<?php echo base_url();?>panels/supermacdaddy/doctor/temp_view",			data: formData,            cache:false,            contentType: false,            processData: false,            dataType: "JSON",            success:function(data){                console.log(data.success);				$('#setcreate_taskimage').html('<br><img src="<?=base_url()?>uploads/tmp_file/'+data.success+'" >');				$('#get_imagetask_hidden').val(data.success);            },            error: function(data){                console.log(data);            }			});		    });</script>