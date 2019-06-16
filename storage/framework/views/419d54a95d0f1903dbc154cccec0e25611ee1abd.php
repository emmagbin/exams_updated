<?php $__env->startSection('header_scripts'); ?>
    <link href="<?php echo e(CSS); ?>ajax-datatables.css" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo e(PREFIX); ?>"><i class="mdi mdi-home"></i></a> </li>
                        <li><?php echo e($title); ?></li>
                    </ol>
                </div>
            </div>

            <!-- /.row -->
            <div class="panel panel-custom">
                <div class="panel-heading">

                    <h1><?php echo e($title); ?></h1>
                </div>
                <div class="panel-body packages">
                    <div>
                        <table class="table table-striped table-bordered datatable" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th><?php echo e(getPhrase('test_date')); ?></th>
                                <th><?php echo e(getPhrase('quiztitle')); ?></th>
                                <th><?php echo e(getPhrase('user')); ?></th>
                                <th><?php echo e(getPhrase('marks_obtained')); ?></th>
                                <th><?php echo e(getPhrase('negative_marks')); ?></th>
                                <th><?php echo e(getPhrase('total_marks')); ?></th>
                                <th><?php echo e(getPhrase('percentage')); ?></th>
                                <th><?php echo e(getPhrase('exam_status')); ?></th>

                            </tr>
                            </thead>

                        </table>
                    </div>

                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer_scripts'); ?>

    <?php echo $__env->make('common.datatables', array('route'=>'student_performance.dataTable'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.adminlayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>