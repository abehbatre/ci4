<?= $this->extend('_layout/default') ?>


<?= $this->section('title') ?>
<title><?= getenv('APP_NAME') ?> &mdash; <?= $title ?> </title>
<?= $this->endSection() ?>

<?= $this->section('add-css') ?>
<!-- SweetAlert2 -->
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<?= $this->endSection() ?>



<?= $this->section('content') ?>
<!-- Main content -->
<section class="section">
	<div class="section-header">
		<div class="row ml-2">
			<div class="col-auto mr-auto">
				<h1><?= $title ?></h1>
			</div>
			<div class="col-auto">
				<button type="button" class="btn btn-block btn-success" onclick="add()" title="Add"> <i class="fa fa-plus"></i> Add</button>
			</div>
		</div>

		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
			<div class="breadcrumb-item active"><a href="#"><?= $title ?></a></div>
		</div>
	</div>
	<div class="section-body">
		<!-- /.card-header -->
		<div class="card">
			<div class="card-body">
				<table id="data_table" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Id</th>
							<th>Classroom code</th>
							<th>Classroom name</th>

							<th></th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
		<!-- /.card-body -->
	</div>
</section>


<!-- Add modal content -->
<div id="add-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="text-center bg-info p-3">
				<h4 class="modal-title text-white" id="info-header-modalLabel">Add</h4>
			</div>
			<div class="modal-body">
				<form id="add-form" class="pl-3 pr-3">
					                        <div class="row">
 							<input type="hidden" id="id" name="id" class="form-control" placeholder="Id" maxlength="11" required>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="classroomCode"> Classroom code: <span class="text-danger">*</span> </label>
									<input type="text" id="classroomCode" name="classroomCode" class="form-control" placeholder="Classroom code" maxlength="100" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="classroomName"> Classroom name: <span class="text-danger">*</span> </label>
									<input type="text" id="classroomName" name="classroomName" class="form-control" placeholder="Classroom name" maxlength="100" required>
								</div>
							</div>
						</div>

					<div class="form-group text-center">
						<div class="btn-group">
							<button type="submit" class="btn btn-success" id="add-form-btn">Add</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
						</div>
					</div>
				</form>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Add modal content -->
<div id="edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="text-center bg-info p-3">
				<h4 class="modal-title text-white" id="info-header-modalLabel">Update</h4>
			</div>
			<div class="modal-body">
				<form id="edit-form" class="pl-3 pr-3">
					                        <div class="row">
 							<input type="hidden" id="id" name="id" class="form-control" placeholder="Id" maxlength="11" required>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="classroomCode"> Classroom code: <span class="text-danger">*</span> </label>
									<input type="text" id="classroomCode" name="classroomCode" class="form-control" placeholder="Classroom code" maxlength="100" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="classroomName"> Classroom name: <span class="text-danger">*</span> </label>
									<input type="text" id="classroomName" name="classroomName" class="form-control" placeholder="Classroom name" maxlength="100" required>
								</div>
							</div>
						</div>

					<div class="form-group text-center">
						<div class="btn-group">
							<button type="submit" class="btn btn-success" id="edit-form-btn">Update</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
						</div>
					</div>
				</form>

			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /.content -->
<?= $this->endSection() ?>


<?= $this->section('add-js') ?>
<!-- DataTables -->
<script src="https://adminlte.io/themes/v3/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- SweetAlert2 -->
<script src="https://adminlte.io/themes/v3/plugins/sweetalert2/sweetalert2.min.js"></script>

<!-- page script -->
<script>
$(function () {
	$('#data_table').DataTable({
		"paging": true,
		"lengthChange": false,
		"searching": true,
		"ordering": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
		"ajax": {
			"url": '<?php echo base_url($controller.'/getAll') ?>',			
			"type": "POST",
			"dataType": "json",
			async: "true"
		}	  
	});
});
function add() {
	// reset the form 
	$("#add-form")[0].reset();
	$(".form-control").removeClass('is-invalid').removeClass('is-valid');		
	$('#add-modal').modal('show');
	// submit the add from 
	$.validator.setDefaults({
		highlight: function(element) {
			$(element).addClass('is-invalid').removeClass('is-valid');
		},
		unhighlight: function(element) {
			$(element).removeClass('is-invalid').addClass('is-valid');
		},
		errorElement: 'div ',
		errorClass: 'invalid-feedback',
		errorPlacement: function(error, element) {
			if (element.parent('.input-group').length) {
				error.insertAfter(element.parent());
			} else if ($(element).is('.select')) {
				element.next().after(error);
			} else if (element.hasClass('select2')) {
				//error.insertAfter(element);
				error.insertAfter(element.next());
			} else if (element.hasClass('selectpicker')) {
				error.insertAfter(element.next());
			} else {
				error.insertAfter(element);
			}
		},

		submitHandler: function(form) {
			
			var form = $('#add-form');
			// remove the text-danger
			$(".text-danger").remove();

			$.ajax({
				url: '<?php echo base_url($controller.'/add') ?>',						
				type: 'post',
				data: form.serialize(), // /converting the form data into array and sending it to server
				dataType: 'json',
				beforeSend: function() {
					$('#add-form-btn').html('<i class="fa fa-spinner fa-spin"></i>');
				},					
				success: function(response) {

					if (response.success === true) {

						Swal.fire({
							position: 'bottom-end',
							icon: 'success',
							title: response.messages,
							showConfirmButton: false,
							timer: 1500
						}).then(function() {
							$('#data_table').DataTable().ajax.reload(null, false).draw(false);
							$('#add-modal').modal('hide');
						})
						
					} else {

						if (response.messages instanceof Object) {
							$.each(response.messages, function(index, value) {
								var id = $("#" + index);

								id.closest('.form-control')
									.removeClass('is-invalid')
									.removeClass('is-valid')
									.addClass(value.length > 0 ? 'is-invalid' : 'is-valid');

								id.after(value);

							});
						} else {
							Swal.fire({
								position: 'bottom-end',
								icon: 'error',
								title: response.messages,
								showConfirmButton: false,
								timer: 1500
							})

						}
					}
					$('#add-form-btn').html('إضافة');
				}
			});

			return false;
		}
	});
	$('#add-form').validate();
}

function edit(id) {
	$.ajax({
		url: '<?php echo base_url($controller.'/getOne') ?>',
		type: 'post',
		data: {
			id: id
		},
		dataType: 'json',
		success: function(response) {
			// reset the form 
			$("#edit-form")[0].reset();
			$(".form-control").removeClass('is-invalid').removeClass('is-valid');				
			$('#edit-modal').modal('show');	

			$("#edit-form #id").val(response.id);
			$("#edit-form #classroomCode").val(response.classroom_code);
			$("#edit-form #classroomName").val(response.classroom_name);

			// submit the edit from 
			$.validator.setDefaults({
				highlight: function(element) {
					$(element).addClass('is-invalid').removeClass('is-valid');
				},
				unhighlight: function(element) {
					$(element).removeClass('is-invalid').addClass('is-valid');
				},
				errorElement: 'div ',
				errorClass: 'invalid-feedback',
				errorPlacement: function(error, element) {
					if (element.parent('.input-group').length) {
						error.insertAfter(element.parent());
					} else if ($(element).is('.select')) {
						element.next().after(error);
					} else if (element.hasClass('select2')) {
						//error.insertAfter(element);
						error.insertAfter(element.next());
					} else if (element.hasClass('selectpicker')) {
						error.insertAfter(element.next());
					} else {
						error.insertAfter(element);
					}
				},

				submitHandler: function(form) {
					var form = $('#edit-form');
					$(".text-danger").remove();
					$.ajax({
						url: '<?php echo base_url($controller.'/edit') ?>' ,						
						type: 'post',
						data: form.serialize(), 
						dataType: 'json',
						beforeSend: function() {
							$('#edit-form-btn').html('<i class="fa fa-spinner fa-spin"></i>');
						},								
						success: function(response) {
							if (response.success === true) {

								Swal.fire({
									position: 'bottom-end',
									icon: 'success',
									title: response.messages,
									showConfirmButton: false,
									timer: 1500
								}).then(function() {
									$('#data_table').DataTable().ajax.reload(null, false).draw(false);
									$('#edit-modal').modal('hide');
								})

							} else {

								if (response.messages instanceof Object) {
									$.each(response.messages, function(index, value) {
										var id = $("#" + index);

										id.closest('.form-control')
											.removeClass('is-invalid')
											.removeClass('is-valid')
											.addClass(value.length > 0 ? 'is-invalid' : 'is-valid');

										id.after(value);

									});
								} else {
									Swal.fire({
										position: 'bottom-end',
										icon: 'error',
										title: response.messages,
										showConfirmButton: false,
										timer: 1500
									})

								}
							}
							$('#edit-form-btn').html('تعديل');
						}
					});

					return false;
				}
			});
			$('#edit-form').validate();

		}
	});
}	

function remove(id) {	
	Swal.fire({
	  title: 'هل أنت متأكد من عملية الحذف؟',
	  text: "!لا يمكنك التراجع بعد التأكيد",
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'تأكيد',
	  cancelButtonText: 'تراجع'		  
	}).then((result) => {		

	  if (result.value) {
		$.ajax({
			url: '<?php echo base_url($controller.'/remove') ?>',
			type: 'post',
			data: {
				id: id
			},
			dataType: 'json',
			success: function(response) {

				if (response.success === true) {
					Swal.fire({
						position: 'bottom-end',
						icon: 'success',
						title: response.messages,
						showConfirmButton: false,
						timer: 1500
					}).then(function() {
						$('#data_table').DataTable().ajax.reload(null, false).draw(false);
					})
				} else {
					Swal.fire({
						position: 'bottom-end',
						icon: 'error',
						title: response.messages,
						showConfirmButton: false,
						timer: 1500
					})

					
				}
			}
		});
	  }
	})		
}  
</script>
<?= $this->endSection() ?>
