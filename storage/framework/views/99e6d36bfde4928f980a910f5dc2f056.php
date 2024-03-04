<?php $__env->startSection('content'); ?>


<dialog id="miModal">
    <a href="/expense_reports/<?php echo e($dataExpense['expense_report_id']); ?>" id="cerrarModal" title="Cerar sin guardar">
        <span class="material-symbols-outlined">
            cancel
        </span>
    </a>
    <h2>Edit Expense <?php echo e($dataExpense['id']); ?>: <?php echo e($dataExpense['description']); ?></h2>
    <form action="/expense_reports/<?php echo e($dataExpense['id']); ?>" method="POST" id="expense">
        <input type="hidden" id="editMode">
        <?php echo csrf_field(); ?>
        <?php echo method_field('put'); ?>
        <div class="fields">
            <div class="columnForm first">
                <div class="inputForm">
                    <label for="description">
                        Description
                    </label>
                    <input type="text" id="description" name="description" value="<?php echo e($dataExpense['description']); ?>">
                </div>
            </div>
            <div class="columnForm">
                <div class="inputForm">
                    <label for="price">
                        Price
                    </label>
                    <input type="number" id="price" name="price" value="<?php echo e($dataExpense['price']); ?>">
                </div>
            </div>
        </div>
        <div class="buttons">
            <a href="/expenses/<?php echo e($dataExpense['id']); ?>/confirmDelete" id="delete-btn" title="Delete expense"><span
                    class="material-symbols-outlined">
                    delete </span></a>
            <button type="submit" class="button"><span class="material-symbols-outlined">
                    save </span>Save</button>
        </div>
    </form>

</dialog>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/victor/info/victor/Insync/vmorenomarin@gmail.com/Google Drive/git/laravel-project/resources/views/ExpenseReports/formEditExpense.blade.php ENDPATH**/ ?>