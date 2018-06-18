<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">ชื่อสินค้า</th>
                            <th scope="col">จำนวนสินค้า</th>
                            <th scope="col">ราคา</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php if(empty($goods_list)): ?>
                            <h1>ไม่มีรายการข้อมูล</h1>
                        <?php else: ?>
                            <?php $__currentLoopData = $goods_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <td style="width: 200px;height: 200px">
                                        <img src="/storage/photo_vet/<?php echo e($items->product_img); ?>" class="img-thumbnail">
                                    </td>
                                    <td><?php echo e($items->product_name); ?></td>
                                    <td><?php echo e($items->product_total); ?></td>
                                    <td><?php echo e($items->product_price); ?></td>
                                    <td>

                                        <form action="/basket/<?php echo e($items->product_id); ?>" method="post">
                                            <?php echo method_field('DELETE'); ?>
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="btn btn-danger delete ">Delete</button>
                                        </form>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        </tbody>
                    </table>a

                </div>
                <div class="border text-center">
                    <p>ราคาทั้งหมด:<strong><?php echo e($total_price); ?></strong></p>
                    <form action="/payorder" method="post" class="sumbit-pay">
                        <?php echo csrf_field(); ?>
                        <button type="button" class="btn btn-outline-success ">ยืนยัน</button>
                    </form>


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

        $('.sumbit-pay').click(function () {
            swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this imaginary file!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel plx!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm) {
                    if (isConfirm) {
                        swal("Complete", "Your pay orders.", "success");
                    } else {
                        swal("Cancelled", "Your don't pay orders.", "error");
                    }
                });
        });



    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>