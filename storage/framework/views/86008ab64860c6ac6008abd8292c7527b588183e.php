<?php $__env->startSection('content'); ?>

<?php echo $__env->make('components._message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>




<div class="row">
	<a href="<?php echo e(route('student.create')); ?>">
		<button type="button" class="btn btn-primary btn-rounded-deep" id="btn-m"><i class="fa fa-plus"></i>&nbsp;เพิ่ม</button>
	</a>
</div>
<?php $__currentLoopData = $student2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="text-danger">
	ท่านยังไม่ได้ใส่เกรด <?php echo e($s2->NAME); ?> เทอม <?php echo e($s2->SEMESTER); ?>

</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<!-- semester1 -->
<div class="card">
	<div class="card-header">เทอม 1</div>
	<table class="table">
		<thead>
			<tr>
				<th>#</th>
				<th>ชื่อวิชา</th>
				<th>หน่วยกิจ</th>
				<th>เกรด</th>
			</tr>
		</thead>
		<tbody>
			<?php $__currentLoopData = $semester1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<th scope="row"><?php echo e($loop->index+1); ?> </th>
				<td><?php echo e($s->NAME); ?></td>
				<td><?php echo e($s->CREDIT); ?></td>
				<td><?php echo e($s->GRADE); ?></td>
				<td>
					<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal-<?php echo e($s->SID); ?>">แก้ไข</button> &nbsp;&nbsp;

					<form action="<?php echo e(route('student.destroy',$s->SID)); ?>"  method="POST" onclick="return confirm(' ท่านแน่ใจว่าต้องการลบข้อมูลหรือไม่ ')" style="display: inline-block">
						<?php echo e(csrf_field()); ?>

						<?php echo e(method_field('DELETE')); ?>

						<button type="submit" class="btn btn-danger btn-sm">ลบ</button>
					</form>
				</td>
				<div class="modal" id="myModal-<?php echo e($s->SID); ?>" role="dialog">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">แก้ไขเกรด</h4>
							</div>
							<div class="modal-body">
								<form action="<?php echo e(route('student.update',$s->SID)); ?>" method="post" id="add-form-<?php echo e($s->SID); ?>" >
									<?php echo e(csrf_field()); ?>

									<?php echo e(method_field('PATCH')); ?>

									ชื่อวิชา : <span ><?php echo e($s->NAME); ?></span><br><br>
									เกรด : <select id="custom-select" class="" name="grade">
										<option value="<?php echo e($s->GRADE); ?>" selected="true"><?php echo e($s->GRADE); ?></option>
										<?php $__currentLoopData = $grade; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($g->GRADE_NAME); ?>" name=grade[]><?php echo e($g->GRADE_NAME); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
								</form>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-primary" onclick="$('#add-form-<?php echo e($s->SID); ?>').submit()">Save changes</button>
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
	<div class="card-group">
		<div class="card">
			<div class="card-block text-xs-center">
				<h4 class="mb-0"><strong>GPA</strong></h4>
			</div>
		</div>
		<div class="card">
			<div class="card-block text-xs-center">
				<?php if($gpa->total_credit != 0): ?>
				<h4 class="text-success mb-0"><strong><?php echo e(number_format($s1_gpa2->total_all / $s1_gpa->total_credit,2)); ?></strong></h4>
				<?php endif; ?>
			</div>
		</div>
	</div>


	<!-- End semester1 -->

	<!-- semester2 -->
	<div class="card">
		<div class="card-header">เทอม 2</div>
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>ชื่อวิชา</th>
					<th>หน่วยกิจ</th>
					<th>เกรด</th>
				</tr>
			</thead>
			<tbody>
				<?php $__currentLoopData = $semester2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<th scope="row"><?php echo e($loop->index+1); ?> </th>
					<td><?php echo e($s->NAME); ?></td>
					<td><?php echo e($s->CREDIT); ?></td>
					<td><?php echo e($s->GRADE); ?></td>
					<td>
						<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal-<?php echo e($s->SID); ?>">แก้ไข</button> &nbsp;&nbsp;

						<form action="<?php echo e(route('student.destroy',$s->SID)); ?>"  method="POST" onclick="return confirm(' ท่านแน่ใจว่าต้องการลบข้อมูลหรือไม่ ')" style="display: inline-block">
							<?php echo e(csrf_field()); ?>

							<?php echo e(method_field('DELETE')); ?>

							<button type="submit" class="btn btn-danger btn-sm">ลบ</button>
						</form>
					</td>
					<div class="modal" id="myModal-<?php echo e($s->SID); ?>" role="dialog">
						<div class="modal-dialog modal-sm">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">แก้ไขเกรด</h4>
								</div>
								<div class="modal-body">
									<form action="<?php echo e(route('student.update',$s->SID)); ?>" method="post" id="add-form-<?php echo e($s->SID); ?>" >
										<?php echo e(csrf_field()); ?>

										<?php echo e(method_field('PATCH')); ?>

										ชื่อวิชา : <span ><?php echo e($s->NAME); ?></span><br><br>
										เกรด : <select id="custom-select" class="" name="grade">
											<option value="<?php echo e($s->GRADE); ?>" selected="true"><?php echo e($s->GRADE); ?></option>
											<?php $__currentLoopData = $grade; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($g->GRADE_NAME); ?>" name=grade[]><?php echo e($g->GRADE_NAME); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
									</form>
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-primary" onclick="$('#add-form-<?php echo e($s->SID); ?>').submit()">Save changes</button>
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		</table>
		<div class="card-group">
			<div class="card">
				<div class="card-block text-xs-center">
					<h4 class="mb-0"><strong>GPA</strong></h4>
				</div>
			</div>
			<div class="card">
				<div class="card-block text-xs-center">
					<?php if($gpa->total_credit != 0): ?>
					<h4 class="text-success mb-0"><strong><?php echo e(number_format($s2_gpa2->total_all / $s2_gpa->total_credit,2)); ?></strong></h4>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<!-- End semester2 -->

		<!-- All semester -->
		<div class="card">
			<div class="card-header">รวมทุกเทอม</div>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>ชื่อวิชา</th>
						<th>หน่วยกิจ</th>
						<th>เกรด</th>
						<th>เทอม</th>
					</tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $student; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<th scope="row"><?php echo e($loop->index+1); ?> </th>
						<td><?php echo e($s->NAME); ?></td>
						<td><?php echo e($s->CREDIT); ?></td>
						<td><?php echo e($s->GRADE); ?></td>
						<td><?php echo e($s->SEMESTER); ?></td>
						<td>
							<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal-<?php echo e($s->SID); ?>">แก้ไข</button> &nbsp;&nbsp;

							<form action="<?php echo e(route('student.destroy',$s->SID)); ?>"  method="POST" onclick="return confirm(' ท่านแน่ใจว่าต้องการลบข้อมูลหรือไม่ ')" style="display: inline-block">
								<?php echo e(csrf_field()); ?>

								<?php echo e(method_field('DELETE')); ?>

								<button type="submit" class="btn btn-danger btn-sm">ลบ</button>
							</form>
						</td>
						<div class="modal" id="myModal-<?php echo e($s->SID); ?>" role="dialog">
							<div class="modal-dialog modal-sm">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">แก้ไขเกรด</h4>
									</div>
									<div class="modal-body">
										<form action="<?php echo e(route('student.update',$s->SID)); ?>" method="post" id="add-form-<?php echo e($s->SID); ?>" >
											<?php echo e(csrf_field()); ?>

											<?php echo e(method_field('PATCH')); ?>

											ชื่อวิชา : <span ><?php echo e($s->NAME); ?></span><br><br>
											เกรด : <select id="custom-select" class="" name="grade">
												<option value="<?php echo e($s->GRADE); ?>" selected="true"><?php echo e($s->GRADE); ?></option>
												<?php $__currentLoopData = $grade; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($g->GRADE_NAME); ?>" name=grade[]><?php echo e($g->GRADE_NAME); ?></option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</select>
										</form>
									</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-primary" onclick="$('#add-form-<?php echo e($s->SID); ?>').submit()">Save changes</button>
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
			<div class="card-group">
				<div class="card">
					<div class="card-block text-xs-center">
						<h4 class="mb-0"><strong>GPA</strong></h4>
					</div>
				</div>
				<div class="card">
					<div class="card-block text-xs-center">
						<?php if($gpa->total_credit != 0): ?>
						<h4 class="text-success mb-0"><strong><?php echo e(number_format($gpa2->total_all / $gpa->total_credit,2)); ?></strong></h4>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- All semester -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout_', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>