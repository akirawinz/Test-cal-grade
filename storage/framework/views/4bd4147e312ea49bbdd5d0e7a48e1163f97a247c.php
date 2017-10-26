<?php $__env->startSection('content'); ?>

<button type="button" class="btn btn-primary btn-rounded-deep" id="btn-m"><i class="fa fa-plus"></i>&nbsp;เพิ่ม</button>
<div class="card">
	<div class="card-header">รายชื่อวิชา</div>
	<table class="table">
		<thead>
			<tr>
				<th>#</th>
				<th>ชื่อวิชา</th>
				<th>หน่วยกิจ</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th scope="row">1</th>
				<td>Mark</td>
				<td>Otto</td>
			</tr>
		</tbody>
	</table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout_', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>