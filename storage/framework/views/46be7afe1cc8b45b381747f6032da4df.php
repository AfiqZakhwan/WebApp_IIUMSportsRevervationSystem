<?php $__env->startSection('content'); ?>
    <div class="max-w-6xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Available Venues</h1>
            <p class="mt-2 text-gray-600">Choose a venue to reserve and configure your booking.</p>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($venues->isEmpty()): ?>
            <div class="bg-white border border-gray-200 shadow-sm rounded-lg p-6 text-center text-gray-700">
                No venues are currently available. Please check back later.
            </div>
        <?php else: ?>
            <div class="grid gap-6 lg:grid-cols-2">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $venues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $venue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-white border border-gray-200 shadow-sm rounded-xl p-6">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <h2 class="text-2xl font-semibold text-gray-900"><?php echo e($venue->name); ?></h2>
                                <p class="mt-2 text-sm text-gray-500">Sport type: <?php echo e($venue->sport_type); ?></p>
                            </div>
                            <span
                                class="inline-flex items-center rounded-full bg-emerald-100 px-3 py-1 text-sm font-medium text-emerald-700">
                                Venue #<?php echo e($venue->id); ?>

                            </span>
                        </div>

                        <p class="mt-5 text-sm text-gray-600">Reserve this venue for your preferred date and time. The booking flow
                            will enforce prayer time closures and the 2-hour session limit.</p>

                        <div class="mt-6">
                            <a href="<?php echo e(route('booking.create', ['venue_id' => $venue->id])); ?>"
                                class="inline-flex items-center justify-center rounded-lg bg-emerald-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2">
                                Book This Venue
                            </a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\hazmi\Downloads\IIUM_Sports_Updated\project\resources\views/dashboard.blade.php ENDPATH**/ ?>