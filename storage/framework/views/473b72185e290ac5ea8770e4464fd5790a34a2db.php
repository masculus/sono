<?php $__env->startSection('title','Employee list'); ?>

<!-- Changed by Yuris to support Materialize CSS -->


<?php $__env->startSection('vendor-style'); ?>

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('table/vendors/vendors.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('table/vendors/flag-icon/css/flag-icon.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('table/vendors/data-tables/css/jquery.dataTables.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('table/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('table/vendors/data-tables/css/select.dataTables.min.css')); ?>">
<!-- END: VENDOR CSS-->
<!-- BEGIN: Page Level CSS-->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('table/css/themes/vertical-modern-menu-template/materialize.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('table/css/themes/vertical-modern-menu-template/style.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('table/css/pages/data-tables.min.css')); ?>">
<!-- END: Page Level CSS-->
<!-- BEGIN: Custom CSS-->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('table/css/custom/custom.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-style'); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<?php if(Session::has('success_message')): ?>
    <a name="info_button" class="waves-effect waves-light btn green" onclick="this.parentNode.removeChild(this);">
      <i class="material-icons left">done</i><?php echo session('success_message'); ?></a>
<?php endif; ?>


<!-- users list start -->
<section class="users-list-wrapper section">
    <!-- Header Starts -->
    <div class="row valign-wrapper mb-1 mt-1">
        <div class="col s9 m9 l9 left-align">
            <h5 class="white-text"><?php echo e(trans('employees.model_plural')); ?></h5>
            <p><?php echo auth()->user()->renderOrgName(); ?></p>
        </div>
        <div class="col s3 m3 l3 right-align">
            <a href="<?php echo e(route('employees.employee.create')); ?>" class="btn-floating btn waves-effect waves-light red">
                <i class="material-icons" title="<?php echo e(trans('employees.create')); ?>">add</i>
            </a>
        </div>
    </div>
  <!-- TABLE -->
  <div class="row">
  
    <div class="col s12">
      <div class="container">
        <div class="section section-data-tables">
          <!-- Page Length Options -->
          <div class="row">
          <div class="col s12">
            <div class="card">
              <div class="card-content">
              
                <div class="row">
                  <div class="col s12">
                    <table id="page-length-option" class="display">
                      <thead>
                        <tr>
                          <th><?php echo e(trans('employees.Employee_Name')); ?></th>
                          <th><?php echo e(trans('employees.Employee_Phone')); ?></th>
                          <th><?php echo e(trans('employees.Is_Active')); ?></th>
                          <th><?php echo e(trans('employees.Organisation_ID')); ?></th>
                          <th><?php echo e(trans('locale.thshow')); ?></th>
                          <th><?php echo e(trans('locale.thedit')); ?></th>
                          <th><?php echo e(trans('locale.thdelete')); ?></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                            <td><?php echo e($employee->Employee_Name); ?></td>
                            <td><?php echo e($employee->Employee_Phone); ?></td>
                            <td><?php echo e(($employee->Is_Active) ? 'Yes' : 'No'); ?></td>
                            <td><?php echo e(optional($employee->Organisation)->Organisation_Name); ?></td>

                            <form method="POST" action="<?php echo route('employees.employee.destroy', $employee->Employee_ID); ?>" accept-charset="UTF-8">
                              <td class="">
                                <a class="btn-flat" href="<?php echo e(route('employees.employee.show', $employee->Employee_ID )); ?>"><i class="material-icons dark-blue-text">remove_red_eye</i></a>
                              </td>
                              <td>
                                <a class="btn-flat" href="<?php echo e(route('employees.employee.edit', $employee->Employee_ID )); ?>"><i class="material-icons green-text">edit</i></a>
                              </td>
                              <td>
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <input name="_method" value="DELETE" type="hidden">
                                <button type="submit" class="btn-flat" title="<?php echo e(trans('employees.delete')); ?>" onclick="return confirm(&quot;<?php echo e(trans('employees.confirm_delete')); ?>&quot;)">
                                    <i class="material-icons red-text">delete_forever</i>
                                </button>
                              </td>

                            </form>
                          </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                      <tfoot>
                        
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- users list ends -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('vendor-script'); ?>
<script src="<?php echo e(('table/js/vendors.min.js')); ?>"></script>
<script src="<?php echo e(('table/vendors/data-tables/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(('table/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(('table/js/plugins.min.js')); ?>"></script>
<script src="<?php echo e(('table/js/search.min.js')); ?>"></script>
<script src="<?php echo e(('table/js/custom/custom-script.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-script'); ?>
<script src="<?php echo e(('table/js/scripts/data-tables.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\data\li\webde\resources\views/employees/index.blade.php ENDPATH**/ ?>