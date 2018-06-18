<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="text-right " style="margin-bottom: 10px">
                    <a href="/backoffice/create">
                        <button type="submit" class="btn btn-outline-primary">+ Add order</button>

                    </a>
                    
                    <div class="card">

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ลำดับ</th>
                                <th scope="col"></th>
                                <th scope="col">ชื่อสินค้า</th>
                                <th scope="col">จำนวนกิโลกรัม</th>
                                <th scope="col">ราคา</th>
                                <th scope="col-2"></th>
                            </tr>
                            </thead>
                            <?php if(!empty($list_item)): ?>
                                <tbody>
                                <?php $__currentLoopData = $list_item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th scope="row"><?php echo e($items->id); ?></th>
                                        <td class="img-thumbnail" style="width: 200px ; height: 200px">
                                            <img src="/storage/photo_vet/<?php echo e($items->product_img); ?>"
                                                 class="img-thumbnail rounded">
                                        </td>
                                        <td><?php echo e($items->product_name); ?></td>
                                        <td><?php echo e($items->product_total); ?></td>
                                        <td><?php echo e($items->product_price); ?></td>
                                        <td>
                                            <div class="text-center">
                                                <form action="/backoffice/<?php echo e($items->id); ?>/edit" class="col-auto"
                                                >
                                                    <button type="submit" class="btn btn-outline-info float-left">Edit
                                                    </button>
                                                </form>

                                                <form action="/backoffice/<?php echo e($items->id); ?>" method="post"
                                                      class="col-auto ">
                                                    <?php echo method_field('DELETE'); ?>
                                                    <?php echo csrf_field(); ?>
                                                    <button type="submit"
                                                            class="btn btn-outline-danger delete float-left ">Delete
                                                    </button>
                                                </form>

                                            </div>

                                            
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>
                            <?php else: ?>
                                <div class="text-center">
                                    <p>ไม่มีรายการ</p>
                                </div>
                            <?php endif; ?>

                        </table>
                    </div>

                </div>
            </div>
        </div>
        <?php if(session('success')): ?>
            <div class="alert alert-warning alert-dismissible fade show">
                <strong>Success</strong><?php echo e('success'); ?>

                <button type="button" class="close" data-dismiss="alert">
                    <span>x</span>
                </button>
            </div>
        <?php endif; ?>
        <?php $__env->stopSection(); ?>
        <?php $__env->startPush('scripts'); ?>
            <script>
                <?php if(count($errors)>0): ?>
                $('.alert').alert();
                <?php endif; ?>
                $('.delete').click(function () {
                    var id = $(this).attr('data-id');
                    $('#' + id).submit();
                });
            </script>
    <?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>