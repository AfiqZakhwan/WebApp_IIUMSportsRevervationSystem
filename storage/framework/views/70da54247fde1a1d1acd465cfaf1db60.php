<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — IIUM Sports</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="bg-gray-100 min-h-screen">

<div class="flex min-h-screen">
    
    <aside class="w-64 bg-emerald-900 text-white flex flex-col shrink-0">
        <div class="p-6 border-b border-emerald-700">
            <div class="flex items-center gap-3">
                <img src="<?php echo e(asset('images/IIUM_emblem.png')); ?>" class="h-10 w-auto" alt="IIUM">
                <div>
                    <p class="font-bold text-sm leading-tight">IIUM Sports</p>
                    <p class="text-xs text-emerald-300">Admin Panel</p>
                </div>
            </div>
        </div>

        <nav class="flex-1 p-4 space-y-1">
            <a href="<?php echo e(route('admin.dashboard')); ?>"
               class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition
                      <?php echo e(request()->routeIs('admin.dashboard') ? 'bg-emerald-700 text-white' : 'text-emerald-100 hover:bg-emerald-800'); ?>">
                📊 Dashboard
            </a>
            <a href="<?php echo e(route('admin.venues.index')); ?>"
               class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition
                      <?php echo e(request()->routeIs('admin.venues*') ? 'bg-emerald-700 text-white' : 'text-emerald-100 hover:bg-emerald-800'); ?>">
                🏟️ Venues
            </a>
            <a href="<?php echo e(route('admin.equipment.index')); ?>"
               class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition
                      <?php echo e(request()->routeIs('admin.equipment*') ? 'bg-emerald-700 text-white' : 'text-emerald-100 hover:bg-emerald-800'); ?>">
                🎽 Equipment
            </a>
            <a href="<?php echo e(route('admin.bookings.index')); ?>"
               class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition
                      <?php echo e(request()->routeIs('admin.bookings*') ? 'bg-emerald-700 text-white' : 'text-emerald-100 hover:bg-emerald-800'); ?>">
                📅 Bookings
            </a>
            <a href="<?php echo e(route('admin.users.index')); ?>"
               class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition
                      <?php echo e(request()->routeIs('admin.users*') ? 'bg-emerald-700 text-white' : 'text-emerald-100 hover:bg-emerald-800'); ?>">
                👥 Users
            </a>
        </nav>

        <div class="p-4 border-t border-emerald-700">
            <a href="<?php echo e(route('dashboard')); ?>" class="block text-xs text-emerald-300 hover:text-white mb-2">← Student View</a>
            <form method="POST" action="<?php echo e(route('logout')); ?>" x-data>
                <?php echo csrf_field(); ?>
                <button @click.prevent="$root.submit()" class="text-xs text-emerald-300 hover:text-white">Log Out</button>
            </form>
        </div>
    </aside>

    
    <main class="flex-1 overflow-auto">
        
        <div class="bg-white border-b border-gray-200 px-8 py-4 flex items-center justify-between">
            <h1 class="text-lg font-semibold text-gray-800"><?php echo $__env->yieldContent('page-title', 'Admin'); ?></h1>
            <span class="text-sm text-gray-500"><?php echo e(Auth::user()->name); ?> &bull; Admin</span>
        </div>

        <div class="p-8">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
                <div class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-lg px-4 py-3 text-sm">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('error')): ?>
                <div class="mb-6 bg-red-50 border border-red-200 text-red-800 rounded-lg px-4 py-3 text-sm">
                    <?php echo e(session('error')); ?>

                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </main>
</div>

</body>
</html>
<?php /**PATH C:\Users\hazmi\Downloads\IIUM_Sports_Updated\project\resources\views/layouts/admin.blade.php ENDPATH**/ ?>