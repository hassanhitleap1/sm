<ul class="navbar-nav">
    <?php if(config('app.ordering')): ?>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('home')); ?>">
                <i class="ni ni-tv-2 text-primary"></i> <?php echo e(__('qrlanding.dashboard')); ?>

            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/live">
                <i class="ni ni-basket text-success"></i> <?php echo e(__('qrlanding.live_orders')); ?><div class="blob red"></div>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('orders.index')); ?>">
                <i class="ni ni-basket text-orangse"></i> <?php echo e(__('qrlanding.orders')); ?>

            </a>
        </li>
    <?php endif; ?>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('admin.restaurants.edit',  auth()->user()->restorant->id)); ?>">
            <i class="ni ni-shop text-info"></i> <?php echo e(__('qrlanding.restaurant')); ?>

        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('items.index')); ?>">
            <i class="ni ni-collection text-pink"></i> <?php echo e(__('qrlanding.menu')); ?>

        </a>
    </li>

    <?php if(config('app.isqrsaas') && (!env('QRSAAS_DISABLE_ODERING',false) || env('ENABLE_GUEST_LOG',true))): ?>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('admin.restaurant.tables.index')); ?>">
                <i class="ni ni-ungroup text-red"></i> <?php echo e(__('qrlanding.tables')); ?>

            </a>
        </li>
    <?php endif; ?>

    <?php if(config('app.isqrsaas')): ?>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('qr')); ?>">
                <i class="ni ni-mobile-button text-red"></i> <?php echo e(__('qrlanding.qr-builder')); ?>

            </a>
        </li>
        <?php if(env('ENABLE_GUEST_LOG',true)): ?>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('admin.restaurant.visits.index')); ?>">
                <i class="ni ni-calendar-grid-58 text-blue"></i> <?php echo e(__('qrlanding.customers-log')); ?>

            </a>
        </li>
        <?php endif; ?>
    <?php endif; ?>

    <?php if(env('ENABLE_PRICING',false)): ?>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('plans.current')); ?>">
                <i class="ni ni-credit-card text-orange"></i> <?php echo e(__('qrlanding.plan')); ?>

            </a>
        </li>
    <?php endif; ?>

        <?php if(config('app.ordering')&&env('ENABLE_FINANCES_OWNER',true)): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('finances.owner')); ?>">
                    <i class="ni ni-money-coins text-blue"></i> <?php echo e(__('qrlanding.finances')); ?>

                </a>
            </li>
        <?php endif; ?>

        <!--
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('admin.restaurant.coupons.index')); ?>">
                <i class="ni ni-tag text-pink"></i> <?php echo e(__('Coupons')); ?>

            </a>
        </li>
    -->

    <?php if(config('app.isqrsaas')): ?>
    <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('share.menu')); ?>">
                <i class="ni ni-send text-green"></i> <?php echo e(__('qrlanding.share')); ?>

            </a>
        </li>
    <?php endif; ?>
</ul>
<?php /**PATH C:\xampp\htdocs\restaurant-menus\resources\views/layouts/navbars/menus/owner.blade.php ENDPATH**/ ?>