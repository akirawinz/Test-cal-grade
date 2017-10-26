<?php if(Session::has('flash_message')): ?>
<div class="alert alert-danger"><li><?php echo e(Session::get('flash_message')); ?></li></div>
<?php endif; ?>


<?php if(count($errors)>0): ?>
<div class="alert alert-danger" role="alert">
	<strong>Error : </strong>
	<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<li><?php echo e($error); ?></li>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php endif; ?>


<?php if(Session::has('success')): ?>
<dlv class="alert alert-success1" role="alert">
	<?php echo e(Session::get('success')); ?>

</dlv>
<?php endif; ?>

<?php if(Session::has('delete')): ?>
<dlv class="alert alert-success1" role="alert">
	<?php echo e(Session::get('delete')); ?>

</dlv>
<?php endif; ?>

<?php if(Session::has('add')): ?>
<dlv class="alert alert-success" role="alert">
	<?php echo e(Session::get('add')); ?>

</dlv>
<?php endif; ?>

<?php if(Session::has('update')): ?>
<dlv class="alert alert-success1" role="alert">
	<?php echo e(Session::get('update')); ?>

</dlv>
<?php endif; ?>

<style type="text/css" media="screen">
.alert-success1{
	color:#777;
	background-color: #8EF3C5;
}

</style>