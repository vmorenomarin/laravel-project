<?php $__env->startSection('content'); ?>


<dialog id="miModal">
    <a href="/expense_reports" id="cerrarModal" title="Cerar sin guardar">
        <span class="material-symbols-outlined">
            cancel
        </span>
    </a>
    <h2>Add a new report</h2>
    <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>
    <form action="/expense_reports" method="POST" id="reports">
        <?php echo csrf_field(); ?>
        <div class="fields">
            <div class="columnForm first">
                <div class="inputForm">
                    <label for="description">
                        Description
                    </label>
                    <input type="text" id="description" name="description">
                </div>
            </div>
            <div class="columnForm">
                <div class="inputForm">
                    <label for="price">
                        Price
                    </label>
                    <input type="number" id="price" name="price" disabled>
                </div>
                <div class="inputForm">
                    <label for="toggle">
                        Paid?
                    </label>
                    <div class="switchContent">
                        <span class="label-value off" data-value="N">No</span>
                        <div class=" switch">
                            <input type="checkbox" id="toggle" name="toggle">
                            <div class=" thumb">
                            </div>
                        </div>
                        <span class="label-value on" data-value="Y">Yes</span>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="button"><span class="material-symbols-outlined">
                save
            </span>Save</button>
    </form>




</dialog>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/victor/info/victor/Insync/vmorenomarin@gmail.com/Google Drive/git/laravel-project/resources/views/ExpenseReports/formCreateReport.blade.php ENDPATH**/ ?>