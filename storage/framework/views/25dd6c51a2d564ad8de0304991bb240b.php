<?php $__env->startSection('content'); ?>
<div class="main">
    <h2>Report</h2>

    <table class="report-table">
        <thead>
            <th>Descripción</th>
            <th>Valor</th>
            <th>Pagado</th>
        </thead>
        <tbody>
            <?php $__currentLoopData = $dataReport; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($record['description']); ?></td>
                <td>$ <?php echo e($record['price']); ?></td>
                <td><?php echo $record['is_active']==true ?
                    '<span class="material-symbols-outlined icon-table-positive">check_circle</span>' : '<span
                        class="material-symbols-outlined icon-table-negative">unpublished</span>'; ?>

                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <a href="/expense_reports/create" id="abrirModal" class="button">
        <span class="material-symbols-outlined">
            add_circle
        </span>
        Agregar reporte
    </a>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/victor/info/victor/Insync/vmorenomarin@gmail.com/Google Drive/git/laravel-project/resources/views/index.blade.php ENDPATH**/ ?>