<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="text-right border-primary">
                    <a href="/backoffice/create">+ add</a>
                </div>
                <div class="card">

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">ลำดับ</th>
                            <th scope="col">ชื่อสินค้า</th>
                            <th scope="col">จำนวนสินค้า</th>
                            <th scope="col">ประเภทสินค้า</th>
                            <th scope="col">ราคา</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $list_item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($items->id); ?></th>
                                <td class="img-thumbnail" style="width: 200px ; height: 200px">
                                    <img src="/storage/photo_vet/<?php echo e($items->product_img); ?>"
                                         class="figure-img img-fluid rounded">
                                </td>
                                <td><?php echo e($items->product_name); ?></td>
                                <td><?php echo e($items->product_total); ?></td>
                                <td><?php echo e($items->product_price); ?></td>
                                <td>
                                        <button type="button" class="btn btn-outline-danger">delete</button>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>