<?php $__env->startSection('content'); ?>


<dialog id="miModal">
    <a href="/expense_reports" id="cerrarModal" title="Cerar sin guardar">
        <span class="material-symbols-outlined">
            cancel
        </span>
    </a>
    <h2>Editar reporte <?php echo e($report['id']); ?></h2>
    <form action="/expense_reports/<?php echo e($report['id']); ?>" method="POST" id="reports">
        <input type="hidden" id="editMode">
        <?php echo csrf_field(); ?>
        <?php echo method_field('put'); ?>
        <div class="fields">
            <div class="columnForm first">
                <div class="inputForm">
                    <label for="description">
                        Description
                    </label>
                    <input type="text" id="description" name="description" value="<?php echo e($report['description']); ?>">
                </div>
            </div>
            <div class="columnForm">
                <div class="inputForm">
                    <label for="price">
                        Price
                    </label>
                    <input type="number" id="price" name="price" value="<?php echo e($report['price']); ?>" disabled>
                </div>
                <div class=" inputForm">
                    <label for="toggle">
                        ¿Pagado?
                    </label>
                    <div class="switchContent">
                        <span class="label-value off" data-value="N">No</span>
                        <div class=" switch">
                            <input type="checkbox" id="toggle" name="toggle"
                                value="<?php echo $report['is_active']==1 ? 'S':'N'; ?>">
                            <div class=" thumb">
                            </div>
                        </div>
                        <span class="label-value on" data-value="S">Sí</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="buttons">
            <a href="/expense_reports/<?php echo $report['id']; ?>/confirmDelete" id="delete-btn" title="Eliminar reporte"><span
                    class="material-symbols-outlined">
                    delete </span></a>
            <button type="submit" class="button"><span class="material-symbols-outlined">
                    save </span>Guardar</button>
        </div>
    </form>

</dialog>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/victor/info/victor/Insync/vmorenomarin@gmail.com/Google Drive/git/laravel-project/resources/views/ExpenseReports/formEditReport.blade.php ENDPATH**/ ?>