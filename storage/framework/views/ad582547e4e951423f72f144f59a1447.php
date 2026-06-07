<?php $__env->startSection('page-title', 'Venues'); ?>

<?php $__env->startSection('content'); ?>
<div class="flex justify-between items-center mb-6">
    <h2 class="text-xl font-bold text-gray-800">All Venues</h2>
    <a href="<?php echo e(route('admin.venues.create')); ?>" class="inline-flex items-center rounded-lg bg-emerald-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-emerald-700 transition">
        + Add Venue
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200 text-sm">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Sport Type</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Price/Hour</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Bookings</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 bg-white">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $venues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $venue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-900"><?php echo e($venue->name); ?></td>
                    <td class="px-6 py-4 text-gray-700"><?php echo e($venue->sport_type); ?></td>
                    <td class="px-6 py-4 text-gray-700">RM <?php echo e(number_format($venue->price_per_hour, 2)); ?></td>
                    <td class="px-6 py-4 text-gray-700"><?php echo e($venue->bookings_count); ?></td>
                    <td class="px-6 py-4">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($venue->is_available): ?>
                            <span class="inline-flex rounded-full bg-emerald-100 px-2 py-1 text-xs font-medium text-emerald-700">Available</span>
                        <?php else: ?>
                            <span class="inline-flex rounded-full bg-red-100 px-2 py-1 text-xs font-medium text-red-700">Unavailable</span>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2 flex-wrap">
                            <form method="POST" action="<?php echo e(route('admin.venues.toggle', $venue)); ?>">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="text-xs px-3 py-1 rounded-lg border transition <?php echo e($venue->is_available ? 'border-red-300 text-red-600 hover:bg-red-50' : 'border-emerald-300 text-emerald-600 hover:bg-emerald-50'); ?>">
                                    <?php echo e($venue->is_available ? 'Disable' : 'Enable'); ?>

                                </button>
                            </form>
                            <a href="<?php echo e(route('admin.venues.edit', $venue)); ?>" class="text-xs px-3 py-1 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50 transition">Edit</a>
                            <form method="POST" action="<?php echo e(route('admin.venues.destroy', $venue)); ?>" onsubmit="return confirm('Delete this venue?')">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="text-xs px-3 py-1 rounded-lg border border-red-300 text-red-600 hover:bg-red-50 transition">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr><td colspan="6" class="px-6 py-6 text-center text-gray-500">No venues found.</td></tr>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\hazmi\Downloads\IIUM_Sports_Updated\project\resources\views/admin/venues/index.blade.php ENDPATH**/ ?>