<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-12">

                <?php if(auth()->guard()->guest()): ?>
                    
                <?php else: ?>

                    <div class="text-right">
                        <a href="/basket/<?php echo e(Auth::user()->id); ?>">
                            <button type="button" class="btn btn-outline-info"> Total product
                                <h5 id="txt-product"></h5>
                            </button>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="row">
            <?php $__currentLoopData = $list_order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-4">
                    <div class="card-body">

                        <div class="card">
                            <div class="img-thumbnail">
                                <img src="/storage/photo_vet/<?php echo e($order->product_img); ?>"
                                     class="img-thumbnail">
                            </div>

                            <div class="text-center">
                                <h4 class="title"><a href=""><?php echo e($order->product_name); ?></a></h4>
                                <p class="description">คงเหลือ:<?php echo e($order->product_total); ?>กิโลกรัม</p>
                                <p class="description">ราคา/กิโลกรัม: <?php echo e($order->product_price); ?></p>
                            </div>

                            <form action="/basket" method="post" class="form-control text-center border-0">
                                <?php echo csrf_field(); ?>
                                <input type="text" name="token_basket" value="<?php echo e($basket_key); ?>" hidden>


                                <?php if(auth()->guard()->guest()): ?>

                                <?php else: ?>
                                    <input type="text" name="userid" value="<?php echo e(Auth::user()->id); ?>" hidden>
                                    <button type="submit" class="btn btn-outline-success btn-submit "
                                            name="select_product"
                                            value="<?php echo e($order->id); ?>">
                                        Select product
                                    </button>
                                <?php endif; ?>
                            </form>

                        </div>

                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function () {
            var x = 0;

            $('.btn-submit').click(function () {
                console.log(x += 1)
                $('#txt-product').text(x)
                $('.btn').addClass('active');
            });


            $('.active').click(function () {
                console.log(x -= 1)
                $('#txt-product').text(x)
                $('.btn').removeClass('active');

            });

            //Todo:: //ปัญหา alert  ที่เกิดทุกครั้ง ที่ refesh page

            // $('.emtry').show(3000,
            //     swal("กรุณา login เข้าสู่ระบบ")
            // );


        })
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>