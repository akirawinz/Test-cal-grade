<?php $__env->startSection('content'); ?>
<?php echo $__env->make('components._error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="card-block">
  <h4>เพิ่มชือวิชา</h4>
  <form action="<?php echo e(route('subject.store')); ?>" method="POST">
  	<?php echo e(csrf_field()); ?>

    <div class="form-group row">
      <label  class="col-sm-3 col-form-label">ชื่อวิชา</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="name[]" placeholder="กรุณากรอกชื่อวิชา">
      </div>
    </div>
    <div class="form-group row">
      <label  class="col-sm-3 col-form-label">หน่วยกิจ</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="credit[]" placeholder="กรุณากรอกหน่วยกิจ">
      </div>
    </div>
    <hr>
    <div id="add-me"></div>
    <div class="form-group row mb-0">
      <div class="offset-sm-3 col-sm-9">
      	<button id="add-form" type="button" class="btn btn-default">เพิ่ม</button>
        <button type="submit" class="btn btn-primary">บันทึก</button>
      </div>
    </div>
  </form>
</div>
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
				'<div class="del">'
				+'<div class="form-group row">'
				+'<label  class="col-sm-3 col-form-label">ชื่อวิชา</label>'
				+'<div class="col-sm-9">'
				+'<input type="text" class="form-control" name="name[]" placeholder="กรุณากรอกชื่อวิชา">'
				+'</div>'
				+'</div>'
				+'<div class="form-group row">'
				+'<label  class="col-sm-3 col-form-label">หน่วยกิจ</label>'
				+'<div class="col-sm-9">'
				+'<input type="text" class="form-control" name="credit[]" placeholder="กรุณากรอกหน่วยกิจ">'
				+'</div>'
				+'</div>'
				+'<button type="button" class="btn btn-danger" id="del">Delete</button>'
				+'<hr>'
				+'</div>'

				);

			$('button.btn.btn-danger').click(function() {
				var whichtr = $(this).closest(".del");
				whichtr.remove(); 
			});

		});
	});

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout_', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>