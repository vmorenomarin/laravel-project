<?php $__env->startSection('content'); ?>


<dialog id="miModal">
    <h2>Eliminar gasto <?php echo e($expense['id']); ?></h2>
    <form action="<?php echo e(route('expenses.destroy', $expense['id'])); ?>" method="POST" id="expense">
        <?php echo csrf_field(); ?>
        <?php echo method_field('delete'); ?>
        <p>¿Está seguro de eliminar el gasto <b><?php echo e($expense['description']); ?></b> (<?php echo e($expense['id']); ?>)?</p>
        <a href="/expenses/<?php echo e($expense['id']); ?>/edit" id="cerrarModal" title="Cancelar">
            <span class="material-symbols-outlined">cancel</span>
        </a>
        <div class="buttons alert">
            <button type="submit" class="button">
                <span class="material-symbols-outlined">delete </span>
                Eliminar
            </button>
        </div>
    </form>

</dialog>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/victor/info/victor/Insync/vmorenomarin@gmail.com/Google Drive/git/laravel-project/resources/views/alerts/confirmAlertExpense.blade.php ENDPATH**/ ?>