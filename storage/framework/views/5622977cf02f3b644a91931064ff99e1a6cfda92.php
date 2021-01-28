<thead class="thead-light">
    <tr>
        <th scope="col"><?php echo e(__('qrlanding.ID')); ?></th>
        <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
            <th scope="col"><?php echo e(__('qrlanding.restaurant')); ?></th>
        <?php endif; ?>
        <th class="table-web" scope="col"><?php echo e(__('qrlanding.created')); ?></th>
        <th class="table-web" scope="col"><?php echo e(__('qrlanding.table-Method')); ?></th>
        <th class="table-web" scope="col"><?php echo e(__('qrlanding.items')); ?></th>
        <th class="table-web" scope="col"><?php echo e(__('qrlanding.price')); ?></th>
        <th scope="col"><?php echo e(__('qrlanding.last-status')); ?></th>
        <th scope="col"><?php echo e(__('qrlanding.actions')); ?></th>
    </tr>
</thead>
<tbody>
<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td>
        
        <a class="btn badge badge-success badge-pill" href="<?php echo e(route('orders.show',$order->id )); ?>">#<?php echo e($order->id); ?></a>
    </td>
    <?php if(auth()->check() && auth()->user()->hasRole('admin|driver')): ?>
    <th scope="row">
        <div class="media align-items-center">
            <a class="avatar-custom mr-3">
                <img class="rounded" alt="..." src=<?php echo e($order->restorant->icon); ?>>
            </a>
            <div class="media-body">
                <span class="mb-0 text-sm"><?php echo e($order->restorant->name); ?></span>
            </div>
        </div>
    </th>
    <?php endif; ?>

    <td class="table-web">
        <?php echo e($order->created_at->format(env('DATETIME_DISPLAY_FORMAT','d M Y H:i'))); ?>

    </td>
    <td class="table-web">
        <?php if( $order->table): ?>
            <?php echo e($order->table->restoarea?$order->table->restoarea->name." - ".$order->table->name:$order->table->name); ?>

        <?php else: ?>
            <?php echo e(__('qrlanding.takeaway')); ?>

        <?php endif; ?>
    </td>
    <td class="table-web">
        <?php echo e(count($order->items)); ?>

    </td>
    <td class="table-web">
        <?php echo money($order->order_price, env('CASHIER_CURRENCY','usd'),env('DO_CONVERTION',true)); ?>
    </td>
    <td>
        <?php echo $__env->make('orders.partials.laststatus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </td>
    <?php echo $__env->make('orders.partials.actions.table',['order' => $order ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
<?php /**PATH C:\xampp\htdocs\restaurant-menus\resources\views/orders/partials/orderdisplay_local.blade.php ENDPATH**/ ?>