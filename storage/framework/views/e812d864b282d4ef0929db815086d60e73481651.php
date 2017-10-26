<?php $__env->startSection('content'); ?>
<?php echo $__env->make('components._error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<form method="post" action="<?php echo e(route('student.store')); ?>" class="form-horizontal">
	<div class="card">
		<div class="card-header">เพิ่มวิชา <small class="text-danger">( * ท่านสามารถเลือกวิชาไว้ก่อนแล้วค่อยมาเพิ่มเกรดทีหลังได้ )</small></div> 
		<?php echo e(csrf_field()); ?>

		<table class="table" id="add-me">
			<select id="custom-select" class="custom-select" name="semester" >
				<option disabled="true" value="choose" selected>เลือกเทอม</option>
				<option  value="1" >1</option>
				<option  value="2" >2</option>
				<option  value="s" >s</option>
      </select>
			<thead>
				<tr>
					<th width="300">ชื่อวิชา</th>
					<th>เกรด</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<!-- select data from subject table -->
					<td>
						<select id="custom-select" class="form-control custom-select" name="id_s[]" >
							<option disabled="true" value="choose" selected>เลือกวิชา</option>
							<?php $__currentLoopData = $subject; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		          <option value="<?php echo e($s->ID); ?>" ><?php echo e($s->NAME); ?> / <?php echo e($s->CREDIT); ?> หน่วยกิจ</option>
		          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	          </select>
					</td>
					<td>
						<select id="custom-select" class="form-control custom-select" name="grade[]">
						 <option value="N" disabled="true" selected="true">เลือกเกรด</option>
							<?php $__currentLoopData = $grade; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	            <option value="<?php echo e($g->GRADE_NAME); ?>" name=grade[]><?php echo e($g->GRADE_NAME); ?></option>
	            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	          </select>
					</td>
				</tr>
			</tbody>
		</table>
		<div class="form-group row mb-0">
	    <div class="offset-sm-3 col-sm-9"  style="margin-bottom: 20px">
	    	<button id="add-form" type="button" class="btn btn-success">เพิ่ม</button>
	      <button type="submit" class="btn btn-primary">บันทึก</button>
	    </div>
	  </div>
	</div>
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
 <script type="text/javascript">
	var i = 0;
	 var id_i = 1;
	$(document).ready(function() {
		$('#add-form').click(function() {
			i++;
			id_i++;						
			$('#add-me').append(
				'<tr>'+
				'<td>'+
				'<select id="custom-select" name="id_s[]" class="form-control custom-select"><option disabled="true" selected value="choose">เลือกวิชา</option><?php $__currentLoopData = $subject; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($s->ID); ?>" ><?php echo e($s->NAME); ?> / <?php echo e($s->CREDIT); ?> หน่วยกิจ</option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select>'
				+'</td>'
				+'<td>'
				+'<select id="custom-select" name="grade[]" class="form-control custom-select"><option value="N" disabled="true" selected="true">เลือกเกรด</option><?php $__currentLoopData = $grade; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($g->GRADE_NAME); ?>" name=grade[]><?php echo e($g->GRADE_NAME); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select>'
				+'</td>'
				+'<td>'
				+'<button id="'+i+'" type="button" class="btn btn-danger delegated-btn">Delete</button>'
				+'</td>'
				+'</tr>'
				);

			$('button.btn.btn-danger').click(function() {
				var whichtr = $(this).closest("tr");
				whichtr.remove(); 
			});

		});
	});

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout_', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>