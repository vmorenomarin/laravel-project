<?php $__env->startSection('content'); ?>
<div class="main">
    <h2>Report <?php echo e($report->id); ?>: <?php echo e($report->description); ?></h2>
    <table>
        <thead>
            <th>Descripción</th>
            <th>Price</th>
            <th>Grab Date</th>
            <th>Edit</th>
        </thead>
        <t@body>
            <?php $__currentLoopData = $report->expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($expense->description); ?></td>
                <td>$<?php echo e($expense->price); ?></td>
                <td><?php echo e(date('d/m/Y', strtotime($expense->created_at))); ?></td>
                <td><span class="material-symbols-outlined edit-button"><a
                            href="/expenses/<?php echo e($expense['id']); ?>/edit">edit</a></span>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </t@body>

    </table>
    <h2>Total: $<?php echo e($report->expenses->sum('price')); ?></h2>

    <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>
    <div id="new_expense_wrapper">
        <form action="<?php echo e(route('expenses.store')); ?>" method=" POST" id="new_expense">
            <?php echo csrf_field(); ?>
            <div class="fields">
                <div class="rowForm">
                    <div class="inputForm">
                        <label for="description">
                            Description
                        </label>
                        <input type="text" id="description" name="description">
                    </div>
                    <div class="inputForm">
                        <label for="price">
                            Price
                        </label>
                        <input type="number" id="price" name="price">
                    </div>
                    <div class="confirm">
                        <span>
                            Add
                        </span>
                        <button id="add_expense" type="submit">
                            <span class="material-symbols-outlined" title="Agregar detalle">
                                check
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="footer-buttons">
        <a href="/expense_reports" id="addSpent" class="button">
            <span class="material-symbols-outlined">
                arrow_back
            </span>
            Regresar
        </a>
        <a onclick="document.querySelector('#new_expense_wrapper').classList.add('show');" id="addSpent" class="button">
            <span class="material-symbols-outlined">
                add_circle
            </span>
            Agregar detalle
        </a>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/victor/Insync/vmorenomarin@gmail.com/git/laravel-project/resources/views/ExpenseReports/formShowReport.blade.php ENDPATH**/ ?>