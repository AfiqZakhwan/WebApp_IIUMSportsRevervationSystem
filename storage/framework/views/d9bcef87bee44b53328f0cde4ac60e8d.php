<?php $__env->startSection('page-title', 'All Bookings'); ?>

<?php $__env->startSection('content'); ?>
<div class="mb-6 flex items-center justify-between">
    <h2 class="text-xl font-bold text-gray-800">All Bookings</h2>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200 text-sm">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Student</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Venue</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Time</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Payment</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Amount</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 bg-white">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-900">#<?php echo e($booking->id); ?></td>
                    <td class="px-6 py-4">
                        <p class="font-medium text-gray-900"><?php echo e($booking->user->name ?? '—'); ?></p>
                        <p class="text-xs text-gray-500"><?php echo e($booking->user->matric_number ?? ''); ?></p>
                    </td>
                    <td class="px-6 py-4">
                        <p class="text-gray-900"><?php echo e($booking->venue->name ?? '—'); ?></p>
                        <p class="text-xs text-gray-500"><?php echo e($booking->venue->sport_type ?? ''); ?></p>
                    </td>
                    <td class="px-6 py-4 text-gray-700"><?php echo e($booking->booking_date); ?></td>
                    <td class="px-6 py-4 text-gray-700"><?php echo e($booking->start_time); ?> – <?php echo e($booking->end_time); ?></td>
                    <td class="px-6 py-4">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($booking->payment): ?>
                            <span class="inline-flex rounded-full bg-emerald-100 px-2 py-1 text-xs font-medium text-emerald-700">Paid</span>
                        <?php else: ?>
                            <span class="inline-flex rounded-full bg-amber-100 px-2 py-1 text-xs font-medium text-amber-700">Unpaid</span>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </td>
                    <td class="px-6 py-4 text-gray-700">
                        <?php echo e($booking->payment ? 'RM ' . number_format($booking->payment->amount, 2) : '—'); ?>

                    </td>
                    <td class="px-6 py-4">
                        <form method="POST" action="<?php echo e(route('admin.bookings.destroy', $booking->id)); ?>" onsubmit="return confirm('Delete this booking?')">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="text-xs px-3 py-1 rounded-lg border border-red-300 text-red-600 hover:bg-red-50 transition">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr><td colspan="8" class="px-6 py-6 text-center text-gray-500">No bookings found.</td></tr>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </tbody>
    </table>
    <div class="px-6 py-4 border-t border-gray-200">
        <?php echo e($bookings->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\hazmi\Downloads\IIUM_Sports_Updated\project\resources\views/admin/bookings/index.blade.php ENDPATH**/ ?>