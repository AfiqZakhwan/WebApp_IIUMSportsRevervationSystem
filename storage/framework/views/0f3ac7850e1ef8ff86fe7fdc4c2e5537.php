<<<<<<< HEAD

=======

>>>>>>> ea9245f15f147113814d5380b19e5c30f321ec5d
<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<<<<<<< HEAD
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-emerald-800 leading-tight">Equipment Rental</h2>
     <?php $__env->endSlot(); ?>
    <div class="max-w-6xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <div class="bg-white/95 backdrop-blur-sm shadow-xl rounded-3xl p-6 border border-emerald-100">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-emerald-900">Equipment Rental</h1>
                    <p class="mt-2 text-gray-600">Choose rental gear for booking #<?php echo e($booking->id); ?>

                        (<?php echo e($booking->venue->sport_type); ?>).</p>
                    <p class="mt-1 text-sm text-gray-500">Your session is scheduled for <?php echo e($booking->booking_date); ?>

                        from
                        <?php echo e($booking->start_time); ?> to <?php echo e($booking->end_time); ?>.
                    </p>
                </div>
                <div class="rounded-2xl bg-emerald-50 border border-emerald-100 p-4 text-sm text-emerald-700">
                    Base booking fee: <strong>RM2.00</strong>
                </div>
            </div>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
                <div class="mt-6 bg-amber-50 border-l-4 border-amber-500 text-amber-900 p-4 rounded text-sm shadow-sm">
                    <span class="font-bold block mb-1">Rental selection issue:</span>
                    <ul class="list-disc pl-4 space-y-1">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </ul>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($equipment->isEmpty()): ?>
                <div class="mt-6 rounded-2xl border border-gray-200 bg-gray-50 p-6 text-center text-gray-600">
                    No rental equipment is available for <?php echo e($booking->venue->sport_type); ?> at this time.
                </div>
            <?php else: ?>
                <form id="rental-form" action="<?php echo e(route('rental.store', $booking->id)); ?>" method="POST"
                    class="mt-6 space-y-6">
                    <?php echo csrf_field(); ?>
                    <div class="grid gap-6 md:grid-cols-2">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $equipment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="rounded-3xl border border-gray-200 p-5 shadow-sm transition hover:shadow-md">


                                <div class="mt-4">
                                    <h2 class="text-xl font-semibold text-gray-900"><?php echo e($item->name); ?></h2>
                                    <p class="mt-2 text-sm text-gray-500">
                                        <?php echo e($item->description ?? 'High-quality rental gear for your session.'); ?>

                                    </p>
                                    <div class="mt-4 flex flex-wrap items-center gap-3 text-sm text-gray-600">
                                        <span
                                            class="rounded-full bg-emerald-50 px-3 py-1 text-emerald-700">RM<?php echo e(number_format($item->price_per_unit, 2)); ?>

                                            per unit</span>
                                        <span class="rounded-full bg-slate-100 px-3 py-1">Available:
                                            <?php echo e($item->quantity_available); ?></span>
                                    </div>
                                </div>

                                <div class="mt-5 flex items-center justify-between gap-3">
                                    <label class="block text-sm font-medium text-gray-700"
                                        for="quantity-<?php echo e($item->id); ?>">Quantity</label>
                                    <input id="quantity-<?php echo e($item->id); ?>" type="number" name="quantities[<?php echo e($item->id); ?>]"
                                        data-price="<?php echo e($item->price_per_unit); ?>" value="<?php echo e(old('quantities.' . $item->id, 0)); ?>"
                                        min="0" max="<?php echo e($item->quantity_available); ?>"
                                        class="w-24 rounded-xl border border-gray-300 px-3 py-2 text-sm outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100" />
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <div id="rental-summary"
                        class="rounded-3xl border border-emerald-100 bg-emerald-50 p-5 text-sm text-emerald-900">
                        <p class="font-semibold">Rental total</p>
                        <div class="mt-2 text-gray-700 space-y-2">
                            <p id="equipment-total-text">Equipment total: RM0.00</p>
                            <p>Booking fee: <strong>RM2.00</strong></p>
                            <p class="text-lg font-bold text-emerald-900">Grand total: <span
                                    id="grand-total-text">RM2.00</span></p>
                        </div>
                    </div>

                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <a href="<?php echo e(route('dashboard')); ?>"
                            class="inline-flex justify-center rounded-lg border border-gray-300 bg-white px-5 py-3 text-sm font-semibold text-gray-700 shadow-sm transition hover:bg-gray-50">
                            Back to venues
                        </a>
                        <div class="flex items-center gap-3">
                            <button type="submit"
                                class="inline-flex justify-center rounded-lg bg-emerald-600 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-emerald-700">
                                Proceed to Payment
                            </button>
                        </div>
                    </div>
                    <script>
                        (() => {
                            const baseFee = 2.0;
                            const equipmentTotalText = document.getElementById('equipment-total-text');
                            const grandTotalText = document.getElementById('grand-total-text');
                            const quantityInputs = document.querySelectorAll('input[name^="quantities["]');

                            const formatMoney = (value) => `RM${value.toFixed(2)}`;
                            const updateTotals = () => {
                                let equipmentTotal = 0;

                                quantityInputs.forEach((input) => {
                                    const quantity = Number(input.value) || 0;
                                    const price = Number(input.dataset.price) || 0;
                                    equipmentTotal += quantity * price;
                                });

                                const grandTotal = equipmentTotal + baseFee;
                                equipmentTotalText.textContent = `Equipment total: ${formatMoney(equipmentTotal)}`;
                                grandTotalText.textContent = formatMoney(grandTotal);
                            };

                            quantityInputs.forEach((input) => {
                                input.addEventListener('input', updateTotals);
                            });

                            // Skip rentals button: zero all quantities and submit the form
                            const skipBtn = document.getElementById('skip-rentals');
                            const rentalForm = document.getElementById('rental-form');
                            if (skipBtn) {
                                skipBtn.addEventListener('click', (e) => {
                                    e.preventDefault();
                                    quantityInputs.forEach((input) => { input.value = 0; });
                                    updateTotals();
                                    rentalForm.submit();
                                });
                            }

                            updateTotals();
                        })();
                    </script>
                </form>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
=======
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-emerald-800 leading-tight">Equipment Rental</h2>
     <?php $__env->endSlot(); ?>
    <div class="max-w-6xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <div class="bg-white/95 backdrop-blur-sm shadow-xl rounded-3xl p-6 border border-emerald-100">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-emerald-900">Equipment Rental</h1>
                    <p class="mt-2 text-gray-600">Choose rental gear for booking #<?php echo e($booking->id); ?>

                        (<?php echo e($booking->venue->sport_type); ?>).</p>
                    <p class="mt-1 text-sm text-gray-500">Your session is scheduled for <?php echo e($booking->booking_date); ?>

                        from
                        <?php echo e($booking->start_time); ?> to <?php echo e($booking->end_time); ?>.
                    </p>
                </div>
                <div class="rounded-2xl bg-emerald-50 border border-emerald-100 p-4 text-sm text-emerald-700">
                    Base booking fee: <strong>RM2.00</strong>
                </div>
            </div>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
                <div class="mt-6 bg-amber-50 border-l-4 border-amber-500 text-amber-900 p-4 rounded text-sm shadow-sm">
                    <span class="font-bold block mb-1">Rental selection issue:</span>
                    <ul class="list-disc pl-4 space-y-1">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </ul>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($equipment->isEmpty()): ?>
                <div class="mt-6 rounded-2xl border border-gray-200 bg-gray-50 p-6 text-center text-gray-600">
                    No rental equipment is available for <?php echo e($booking->venue->sport_type); ?> at this time.
                </div>
            <?php else: ?>
                <form id="rental-form" action="<?php echo e(route('rental.store', $booking->id)); ?>" method="POST"
                    class="mt-6 space-y-6">
                    <?php echo csrf_field(); ?>
                    <div class="grid gap-6 md:grid-cols-2">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $equipment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="rounded-3xl border border-gray-200 p-5 shadow-sm transition hover:shadow-md">


                                <div class="mt-4">
                                    <h2 class="text-xl font-semibold text-gray-900"><?php echo e($item->name); ?></h2>
                                    <p class="mt-2 text-sm text-gray-500">
                                        <?php echo e($item->description ?? 'High-quality rental gear for your session.'); ?>

                                    </p>
                                    <div class="mt-4 flex flex-wrap items-center gap-3 text-sm text-gray-600">
                                        <span
                                            class="rounded-full bg-emerald-50 px-3 py-1 text-emerald-700">RM<?php echo e(number_format($item->price_per_unit, 2)); ?>

                                            per unit</span>
                                        <span class="rounded-full bg-slate-100 px-3 py-1">Available:
                                            <?php echo e($item->quantity_available); ?></span>
                                    </div>
                                </div>

                                <div class="mt-5 flex items-center justify-between gap-3">
                                    <label class="block text-sm font-medium text-gray-700"
                                        for="quantity-<?php echo e($item->id); ?>">Quantity</label>
                                    <input id="quantity-<?php echo e($item->id); ?>" type="number" name="quantities[<?php echo e($item->id); ?>]"
                                        data-price="<?php echo e($item->price_per_unit); ?>" value="<?php echo e(old('quantities.' . $item->id, 0)); ?>"
                                        min="0" max="<?php echo e($item->quantity_available); ?>"
                                        class="w-24 rounded-xl border border-gray-300 px-3 py-2 text-sm outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100" />
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <div id="rental-summary"
                        class="rounded-3xl border border-emerald-100 bg-emerald-50 p-5 text-sm text-emerald-900">
                        <p class="font-semibold">Rental total</p>
                        <div class="mt-2 text-gray-700 space-y-2">
                            <p id="equipment-total-text">Equipment total: RM0.00</p>
                            <p>Booking fee: <strong>RM2.00</strong></p>
                            <p class="text-lg font-bold text-emerald-900">Grand total: <span
                                    id="grand-total-text">RM2.00</span></p>
                        </div>
                    </div>

                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <a href="<?php echo e(route('dashboard')); ?>"
                            class="inline-flex justify-center rounded-lg border border-gray-300 bg-white px-5 py-3 text-sm font-semibold text-gray-700 shadow-sm transition hover:bg-gray-50">
                            Back to venues
                        </a>
                        <div class="flex items-center gap-3">
                            <button type="submit"
                                class="inline-flex justify-center rounded-lg bg-emerald-600 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-emerald-700">
                                Proceed to Payment
                            </button>
                        </div>
                    </div>
                    <script>
                        (() => {
                            const baseFee = 2.0;
                            const equipmentTotalText = document.getElementById('equipment-total-text');
                            const grandTotalText = document.getElementById('grand-total-text');
                            const quantityInputs = document.querySelectorAll('input[name^="quantities["]');

                            const formatMoney = (value) => `RM${value.toFixed(2)}`;
                            const updateTotals = () => {
                                let equipmentTotal = 0;

                                quantityInputs.forEach((input) => {
                                    const quantity = Number(input.value) || 0;
                                    const price = Number(input.dataset.price) || 0;
                                    equipmentTotal += quantity * price;
                                });

                                const grandTotal = equipmentTotal + baseFee;
                                equipmentTotalText.textContent = `Equipment total: ${formatMoney(equipmentTotal)}`;
                                grandTotalText.textContent = formatMoney(grandTotal);
                            };

                            quantityInputs.forEach((input) => {
                                input.addEventListener('input', updateTotals);
                            });

                            // Skip rentals button: zero all quantities and submit the form
                            const skipBtn = document.getElementById('skip-rentals');
                            const rentalForm = document.getElementById('rental-form');
                            if (skipBtn) {
                                skipBtn.addEventListener('click', (e) => {
                                    e.preventDefault();
                                    quantityInputs.forEach((input) => { input.value = 0; });
                                    updateTotals();
                                    rentalForm.submit();
                                });
                            }

                            updateTotals();
                        })();
                    </script>
                </form>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
>>>>>>> ea9245f15f147113814d5380b19e5c30f321ec5d
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\Users\hazmi\Downloads\IIUM_Sports_Updated\project\resources\views/rentals/create.blade.php ENDPATH**/ ?>