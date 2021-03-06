<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <form class="needs-validation" novalidate action="/backoffice" method="post" enctype="multipart/form-data" id="register-form">
                        <?php echo csrf_field(); ?>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">ชื่อสินค้า</label>
                                <input type="text" value="<?php echo e(Auth::user()->id); ?>"hidden name="userid" >
                                <input type="text" class="form-control" name="product_name" placeholder="First name"
                                       required>
                                <div class="invalid-feedback">
                                    กรุณาใส่ชื่อผัก
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02">นํ้าหนัก(กิโลกรัม)</label>
                                <input type="text" class="form-control"  name="product_weight" placeholder="Last name"
                                       required>
                                <div class="invalid-feedback">
                                    กรุณาใส่จำนวนกิโลกริม
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02">ราคา(ต่อกิโลกรัม)</label>
                                <input type="text" class="form-control"name="product_price" placeholder="Last name"
                                       required>
                                <div class="invalid-feedback">
                                    กรุณาใส่จำนวนกิโลกริม
                                </div>


                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02">ประเภทผักที่ใช้บริโภค</label>
                                <select class="custom-select" name="select">
                                    <?php $__currentLoopData = $type_vet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $iteM_vet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value=<?php echo e($iteM_vet); ?>><?php echo e($iteM_vet); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <lable for="photo"></lable>
                                <input type="file" name="photo" id="photo" class="form-control">
                            </div>


                        </div>

                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>

                    <script>
                        // Example starter JavaScript for disabling form submissions if there are invalid fields
                        (function () {
                            'use strict';
                            window.addEventListener('load', function () {
                                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                var forms = document.getElementsByClassName('needs-validation');
                                // Loop over them and prevent submission
                                var validation = Array.prototype.filter.call(forms, function (form) {
                                    form.addEventListener('submit', function (event) {
                                        if (form.checkValidity() === false) {
                                            event.preventDefault();
                                            event.stopPropagation();
                                        }
                                        form.classList.add('was-validated');
                                    }, false);
                                });
                            }, false);
                        })();
                    </script>


                </div>

            </div>
        </div>
<?php $__env->stopSection(); ?>
        <?php $__env->startPush('scripts'); ?>
            <script>

                $('#register-form').submit(function (e) {
                    e.preventDefault();
                    var url = $(this).attr('action');
                    var method = $(this).attr("method");

                    $.ajax({
                        type:method,
                        url:url,
                        data:$(this).serialize(),
                        dataType:'json',
                        statusCode: {

                            422: function (data) {
                                var textError = '';
                                $.each(data.responseJSON.errors,function (key,value) {

                                    textError+=value.message+"\n";

                                });
                                swal('ขออภัย',textError,'error')
                            }

                        },
                        success: function (data){

                            swal({

                                title:"สำเร็จ",
                                text:data.message,
                                type:"success"

                            })
                                .then(()=>{
                                    if(data.type=='redirect') {
                                        location.replace(data.url);
                                    } else {
                                        location.reload();
                                    }

                                })

                        }

                    })

                })

            </script>



    <?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>