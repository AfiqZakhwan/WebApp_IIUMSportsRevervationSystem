<?php $__env->startSection('page-title', 'Users'); ?>

<?php $__env->startSection('content'); ?>
<div class="mb-6">
    <h2 class="text-xl font-bold text-gray-800">All Users</h2>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200 text-sm">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Matric No.</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Phone</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Bookings</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 bg-white">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-900"><?php echo e($user->name); ?></td>
                    <td class="px-6 py-4 text-gray-700"><?php echo e($user->matric_number ?? '—'); ?></td>
                    <td class="px-6 py-4 text-gray-700"><?php echo e($user->email); ?></td>
                    <td class="px-6 py-4 text-gray-700"><?php echo e($user->phone ?? '—'); ?></td>
                    <td class="px-6 py-4">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->role === 'admin'): ?>
                            <span class="inline-flex rounded-full bg-purple-100 px-2 py-1 text-xs font-medium text-purple-700">Admin</span>
                        <?php else: ?>
                            <span class="inline-flex rounded-full bg-blue-100 px-2 py-1 text-xs font-medium text-blue-700">Student</span>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </td>
                    <td class="px-6 py-4 text-gray-700"><?php echo e($user->bookings_count); ?></td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->id !== auth()->id()): ?>
                                <form method="POST" action="<?php echo e(route('admin.users.toggle-role', $user)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="text-xs px-3 py-1 rounded-lg border transition
                                        <?php echo e($user->role === 'admin' ? 'border-blue-300 text-blue-600 hover:bg-blue-50' : 'border-purple-300 text-purple-600 hover:bg-purple-50'); ?>">
                                        <?php echo e($user->role === 'admin' ? 'Make Student' : 'Make Admin'); ?>

                                    </button>
                                </form>
                                <form method="POST" action="<?php echo e(route('admin.users.destroy', $user)); ?>" onsubmit="return confirm('Delete this user and all their data?')">
                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="text-xs px-3 py-1 rounded-lg border border-red-300 text-red-600 hover:bg-red-50 transition">Delete</button>
                                </form>
                            <?php else: ?>
                                <span class="text-xs text-gray-400 italic">You</span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr><td colspan="7" class="px-6 py-6 text-center text-gray-500">No users found.</td></tr>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\hazmi\Downloads\IIUM_Sports_Updated\project\resources\views/admin/users/index.blade.php ENDPATH**/ ?>