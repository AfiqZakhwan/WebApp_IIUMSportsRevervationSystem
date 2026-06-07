<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-emerald-800 leading-tight">
            Payment Summary
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-lg mx-auto bg-white/95 backdrop-blur-sm border border-emerald-100 shadow-xl rounded-xl p-6">

            <h2 class="text-2xl font-bold text-emerald-900 mb-1">Order Summary</h2>
            <p class="text-sm text-gray-500 mb-6">Booking #<?php echo e($booking->id); ?> — <?php echo e($booking->venue->name); ?></p>

            
            <div class="bg-gray-50 rounded-lg p-4 mb-4 text-sm text-gray-700 space-y-1">
                <div class="flex justify-between">
                    <span>Date</span>
                    <span class="font-medium"><?php echo e($booking->booking_date); ?></span>
                </div>
                <div class="flex justify-between">
                    <span>Time</span>
                    <span class="font-medium"><?php echo e($booking->start_time); ?> – <?php echo e($booking->end_time); ?></span>
                </div>
                <div class="flex justify-between">
                    <span>Sport type</span>
                    <span class="font-medium"><?php echo e($booking->venue->sport_type); ?></span>
                </div>
            </div>

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($rentals->isNotEmpty()): ?>
                <div class="mb-4">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Equipment Rented</p>
                    <div class="space-y-2">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $rentals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rental): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="flex justify-between text-sm text-gray-700">
                                <span><?php echo e($rental->equipment->name); ?> × <?php echo e($rental->quantity); ?></span>
                                <span>RM<?php echo e(number_format($rental->item_total, 2)); ?></span>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            
            <div class="border-t border-gray-200 pt-4 space-y-2 text-sm text-gray-700">
                <div class="flex justify-between">
                    <span>Equipment subtotal</span>
                    <span>RM<?php echo e(number_format($equipmentTotal, 2)); ?></span>
                </div>
                <div class="flex justify-between">
                    <span>Base booking fee</span>
                    <span>RM<?php echo e(number_format($baseFee, 2)); ?></span>
                </div>
                <div
                    class="flex justify-between font-bold text-emerald-900 text-base border-t border-gray-200 pt-2 mt-2">
                    <span>Total</span>
                    <span>RM<?php echo e(number_format($total, 2)); ?></span>
                </div>
            </div>

            
            <form action="<?php echo e(route('payment.store', $booking->id)); ?>" method="POST" class="mt-6">
                <?php echo csrf_field(); ?>

                <p class="text-sm font-semibold text-gray-700 mb-3">Select payment method</p>

                <div class="grid grid-cols-2 gap-3 mb-6">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = ['online_banking' => 'Online Banking', 'credit_card' => 'Credit Card', 'debit_card' => 'Debit Card', 'ewallet' => 'E-Wallet']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <label
                            class="flex items-center gap-2 border border-gray-200 rounded-lg p-3 cursor-pointer hover:border-emerald-500 hover:bg-emerald-50 transition text-sm font-medium text-gray-700">
                            <input type="radio" name="payment_method" value="<?php echo e($value); ?>" class="accent-emerald-600"
                                required>
                            <?php echo e($label); ?>

                        </label>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['payment_method'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mb-4"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <button type="submit"
                    class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 rounded-lg transition shadow-md">
                    Pay RM<?php echo e(number_format($total, 2)); ?>

                </button>
            </form>

        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\Users\hazmi\Downloads\IIUM_Sports_Updated\project\resources\views/payments/create.blade.php ENDPATH**/ ?>