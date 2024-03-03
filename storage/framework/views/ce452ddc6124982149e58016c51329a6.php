<?php $__env->startSection('content'); ?>


<dialog id="miModal">
    <h2>Eliminar reporte <?php echo e($report['id']); ?></h2>
    <form action="/expense_reports/<?php echo e($report['id']); ?>" method="POST" id="reports">
        <?php echo csrf_field(); ?>
        <?php echo method_field('delete'); ?>
        <p>¿Está seguro de eliminar el reporte <?php echo e($report['id']); ?></p>
        <a href="/expense_reports/<?php echo $report['id']; ?>/edit" id="cerrarModal" title="Cancelar">
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
<?php echo $__env->make('templates.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/victor/Insync/vmorenomarin@gmail.com/git/laravel-project/resources/views/alerts/confirmAlertReport.blade.php ENDPATH**/ ?>