<?php $__env->startSection('page-title', 'Equipment'); ?>

<?php $__env->startSection('content'); ?>
<div class="flex justify-between items-center mb-6">
    <h2 class="text-xl font-bold text-gray-800">All Equipment</h2>
    <a href="<?php echo e(route('admin.equipment.create')); ?>" class="inline-flex items-center rounded-lg bg-emerald-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-emerald-700 transition">
        + Add Equipment
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200 text-sm">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Sport Type</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Price/Unit</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Qty Available</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 bg-white">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $equipment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-900"><?php echo e($item->name); ?></td>
                    <td class="px-6 py-4 text-gray-700"><?php echo e($item->sport_type); ?></td>
                    <td class="px-6 py-4 text-gray-700">RM <?php echo e(number_format($item->price_per_unit, 2)); ?></td>
                    <td class="px-6 py-4">
                        <span class="<?php echo e($item->quantity_available < 3 ? 'text-red-600 font-semibold' : 'text-gray-700'); ?>">
                            <?php echo e($item->quantity_available); ?>

                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <a href="<?php echo e(route('admin.equipment.edit', $item)); ?>" class="text-xs px-3 py-1 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50 transition">Edit</a>
                            <form method="POST" action="<?php echo e(route('admin.equipment.destroy', $item)); ?>" onsubmit="return confirm('Delete this equipment?')">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="text-xs px-3 py-1 rounded-lg border border-red-300 text-red-600 hover:bg-red-50 transition">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr><td colspan="5" class="px-6 py-6 text-center text-gray-500">No equipment found.</td></tr>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\hazmi\Downloads\IIUM_Sports_Updated\project\resources\views/admin/equipment/index.blade.php ENDPATH**/ ?>