<<<<<<< HEAD


<?php $__env->startSection('content'); ?>
    <div class="max-w-6xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">My Bookings</h1>
            <p class="mt-2 text-gray-600">Review reserved venues and the equipment you rented for each session.</p>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($bookings->isEmpty()): ?>
            <div class="bg-white border border-gray-200 shadow-sm rounded-lg p-6 text-center text-gray-700">
                You do not have any bookings yet. Reserve a venue from the dashboard to get started.
            </div>
        <?php else: ?>
            <div class="space-y-6">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $rentalSubtotal = $booking->rentals->sum('item_total');
                        $bookingFee = 2.00;
                        $grandTotal = $bookingFee + $rentalSubtotal;
                    ?>

                    <div class="bg-white border border-gray-200 shadow-sm rounded-xl p-6">
                        <div class="flex flex-col gap-4 md:flex-row md:items-start md:justify-between">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-900">Booking #<?php echo e($booking->id); ?></h2>
                                <p class="mt-1 text-sm text-gray-600"><?php echo e($booking->venue->name); ?> &bull;
                                    <?php echo e($booking->venue->sport_type); ?></p>
                            </div>
                            <div class="rounded-full bg-emerald-100 px-3 py-1 text-sm font-medium text-emerald-700">
                                <?php echo e($booking->booking_date); ?>

                            </div>
                        </div>

                        <div class="mt-6 grid gap-4 sm:grid-cols-2">
                            <div class="rounded-2xl bg-slate-50 p-4">
                                <p class="text-sm text-gray-500">Time slot</p>
                                <p class="mt-2 text-base font-semibold text-gray-900"><?php echo e($booking->start_time); ?> &ndash;
                                    <?php echo e($booking->end_time); ?></p>
                            </div>
                            <div class="rounded-2xl bg-slate-50 p-4">
                                <p class="text-sm text-gray-500">Venue ID</p>
                                <p class="mt-2 text-base font-semibold text-gray-900"><?php echo e($booking->venue->id); ?></p>
                            </div>
                        </div>

                        <div class="mt-6">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold text-gray-900">Rental Equipment</h3>
                                <span class="text-sm text-gray-500"><?php echo e($booking->rentals->count()); ?> items</span>
                            </div>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($booking->rentals->isEmpty()): ?>
                                <div class="mt-4 rounded-2xl border border-dashed border-gray-200 bg-gray-50 p-4 text-sm text-gray-600">
                                    No rental equipment was selected for this booking.
                                </div>
                            <?php else: ?>
                                <div class="mt-4 overflow-hidden rounded-2xl border border-gray-200">
                                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th class="px-4 py-3 text-left font-medium text-gray-700">Equipment</th>
                                                <th class="px-4 py-3 text-left font-medium text-gray-700">Qty</th>
                                                <th class="px-4 py-3 text-left font-medium text-gray-700">Unit Price</th>
                                                <th class="px-4 py-3 text-left font-medium text-gray-700">Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 bg-white">
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $booking->rentals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rental): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td class="px-4 py-3 text-gray-900"><?php echo e($rental->equipment->name); ?></td>
                                                    <td class="px-4 py-3 text-gray-900"><?php echo e($rental->quantity); ?></td>
                                                    <td class="px-4 py-3 text-gray-900">RM<?php echo e(number_format($rental->unit_price, 2)); ?></td>
                                                    <td class="px-4 py-3 text-gray-900">RM<?php echo e(number_format($rental->item_total, 2)); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        <div class="mt-6 rounded-2xl bg-slate-50 p-4">
                            <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
                                <div>
                                    <p class="text-sm text-gray-600">Booking fee</p>
                                    <p class="mt-1 text-lg font-semibold text-gray-900">RM<?php echo e(number_format($bookingFee, 2)); ?></p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Rental subtotal</p>
                                    <p class="mt-1 text-lg font-semibold text-gray-900">RM<?php echo e(number_format($rentalSubtotal, 2)); ?>

                                    </p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Total</p>
                                    <p class="mt-1 text-xl font-semibold text-emerald-700">RM<?php echo e(number_format($grandTotal, 2)); ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end">
                            <form method="POST" action="<?php echo e(route('booking.destroy', $booking->id)); ?>" onsubmit="return confirm('Are you sure you want to cancel this booking?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="inline-flex items-center justify-center rounded-lg bg-red-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                    Cancel Booking
                                </button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
=======


<?php $__env->startSection('content'); ?>
    <div class="max-w-6xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">My Bookings</h1>
            <p class="mt-2 text-gray-600">Review reserved venues and the equipment you rented for each session.</p>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($bookings->isEmpty()): ?>
            <div class="bg-white border border-gray-200 shadow-sm rounded-lg p-6 text-center text-gray-700">
                You do not have any bookings yet. Reserve a venue from the dashboard to get started.
            </div>
        <?php else: ?>
            <div class="space-y-6">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $rentalSubtotal = $booking->rentals->sum('item_total');
                        $bookingFee = 2.00;
                        $grandTotal = $bookingFee + $rentalSubtotal;
                    ?>

                    <div class="bg-white border border-gray-200 shadow-sm rounded-xl p-6">
                        <div class="flex flex-col gap-4 md:flex-row md:items-start md:justify-between">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-900">Booking #<?php echo e($booking->id); ?></h2>
                                <p class="mt-1 text-sm text-gray-600"><?php echo e($booking->venue->name); ?> &bull;
                                    <?php echo e($booking->venue->sport_type); ?></p>
                            </div>
                            <div class="rounded-full bg-emerald-100 px-3 py-1 text-sm font-medium text-emerald-700">
                                <?php echo e($booking->booking_date); ?>

                            </div>
                        </div>

                        <div class="mt-6 grid gap-4 sm:grid-cols-2">
                            <div class="rounded-2xl bg-slate-50 p-4">
                                <p class="text-sm text-gray-500">Time slot</p>
                                <p class="mt-2 text-base font-semibold text-gray-900"><?php echo e($booking->start_time); ?> &ndash;
                                    <?php echo e($booking->end_time); ?></p>
                            </div>
                            <div class="rounded-2xl bg-slate-50 p-4">
                                <p class="text-sm text-gray-500">Venue ID</p>
                                <p class="mt-2 text-base font-semibold text-gray-900"><?php echo e($booking->venue->id); ?></p>
                            </div>
                        </div>

                        <div class="mt-6">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold text-gray-900">Rental Equipment</h3>
                                <span class="text-sm text-gray-500"><?php echo e($booking->rentals->count()); ?> items</span>
                            </div>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($booking->rentals->isEmpty()): ?>
                                <div class="mt-4 rounded-2xl border border-dashed border-gray-200 bg-gray-50 p-4 text-sm text-gray-600">
                                    No rental equipment was selected for this booking.
                                </div>
                            <?php else: ?>
                                <div class="mt-4 overflow-hidden rounded-2xl border border-gray-200">
                                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th class="px-4 py-3 text-left font-medium text-gray-700">Equipment</th>
                                                <th class="px-4 py-3 text-left font-medium text-gray-700">Qty</th>
                                                <th class="px-4 py-3 text-left font-medium text-gray-700">Unit Price</th>
                                                <th class="px-4 py-3 text-left font-medium text-gray-700">Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 bg-white">
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $booking->rentals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rental): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td class="px-4 py-3 text-gray-900"><?php echo e($rental->equipment->name); ?></td>
                                                    <td class="px-4 py-3 text-gray-900"><?php echo e($rental->quantity); ?></td>
                                                    <td class="px-4 py-3 text-gray-900">RM<?php echo e(number_format($rental->unit_price, 2)); ?></td>
                                                    <td class="px-4 py-3 text-gray-900">RM<?php echo e(number_format($rental->item_total, 2)); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        <div class="mt-6 rounded-2xl bg-slate-50 p-4">
                            <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
                                <div>
                                    <p class="text-sm text-gray-600">Booking fee</p>
                                    <p class="mt-1 text-lg font-semibold text-gray-900">RM<?php echo e(number_format($bookingFee, 2)); ?></p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Rental subtotal</p>
                                    <p class="mt-1 text-lg font-semibold text-gray-900">RM<?php echo e(number_format($rentalSubtotal, 2)); ?>

                                    </p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Total</p>
                                    <p class="mt-1 text-xl font-semibold text-emerald-700">RM<?php echo e(number_format($grandTotal, 2)); ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end">
                            <form method="POST" action="<?php echo e(route('booking.destroy', $booking->id)); ?>" onsubmit="return confirm('Are you sure you want to cancel this booking?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="inline-flex items-center justify-center rounded-lg bg-red-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                    Cancel Booking
                                </button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
>>>>>>> ea9245f15f147113814d5380b19e5c30f321ec5d
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\hazmi\Downloads\IIUM_Sports_Updated\project\resources\views/bookings/index.blade.php ENDPATH**/ ?>