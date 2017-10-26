<?php $__env->startSection('content'); ?>

<?php echo $__env->make('components._message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="row">
	<a href="<?php echo e(route('subject.create')); ?>">
		<button type="button" class="btn btn-primary btn-rounded-deep" id="btn-m"><i class="fa fa-plus"></i>&nbsp;เพิ่ม</button>
	</a>
</div>

<div class="card">
	<div class="card-header">รายชื่อวิชา</div>
	<table class="table">
		<thead>
			<tr>
				<th>#</th>
				<th>ชื่อวิชา</th>
				<th>หน่วยกิจ</th>
				<th>action</th>
			</tr>
		</thead>
		<tbody>
			<?php $__currentLoopData = $subject; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<th scope="row"><?php echo e($loop->index+1); ?> </th>
				<td><?php echo e($s->NAME); ?></td>
				<td><?php echo e($s->CREDIT); ?></td>
				<td>
					<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal-<?php echo e($s->ID); ?>">แก้ไข</button> &nbsp;&nbsp;

					<form action="<?php echo e(route('subject.destroy',$s->ID)); ?>"  method="POST" onclick="return confirm(' ท่านแน่ใจว่าต้องการลบข้อมูลหรือไม่ ')" style="display: inline-block">
						<?php echo e(csrf_field()); ?>

						<?php echo e(method_field('DELETE')); ?>

						<button type="submit" class="btn btn-danger btn-sm">ลบ</button>
					</form>
				</td>
				<div class="modal" id="myModal-<?php echo e($s->ID); ?>" role="dialog">
			    <div class="modal-dialog modal-sm">
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h4 class="modal-title">แก้ไขชื่อวิชา</h4>
			        </div>
			        <div class="modal-body">
			        <form action="<?php echo e(route('subject.update',$s->ID)); ?>" method="post" id="add-form-<?php echo e($s->ID); ?>" >
							<?php echo e(csrf_field()); ?>

							<?php echo e(method_field('PATCH')); ?>

			          ชื่อวิชา : <input type="text"  name="name" value="<?php echo e($s->NAME); ?>"><br><br>
			          หน่วยกิจ : <input type="text" name="credit" value="<?php echo e($s->CREDIT); ?>">
			          </form>
			        </div>
			        <div class="modal-footer">
			        	<button type="submit" class="btn btn-primary" onclick="$('#add-form-<?php echo e($s->ID); ?>').submit()">Save changes</button>
			          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        </div>
			      </div>
			    </div>
			  </div>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout_', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>