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
            <?php echo e(__('Configure Reservation Slot')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-md mx-auto bg-white/95 backdrop-blur-sm border border-emerald-100 shadow-xl rounded-xl p-6">
            <h2 class="text-2xl font-bold text-emerald-900 mb-2">Book: <?php echo e($venue->name); ?></h2>
            <p class="text-xs text-gray-500 mb-4 font-semibold uppercase tracking-wider">Type: <?php echo e($venue->sport_type); ?>

            </p>

            <!-- Error Banner -->
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
                <div class="bg-amber-50 border-l-4 border-amber-500 text-amber-900 p-4 mb-4 rounded text-sm shadow-sm">
                    <span class="font-bold block mb-1">Booking Rejected:</span>
                    <ul class="list-disc pl-4 space-y-1">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </ul>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <form action="<?php echo e(route('booking.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="venue_id" value="<?php echo e($venue->id); ?>">

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-1 text-sm">Date:</label>
                    <input type="date" name="booking_date" value="<?php echo e(old('booking_date')); ?>"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition"
                        required>
                </div>

                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-700 font-semibold mb-1 text-sm">Start Time:</label>
                        <div class="flex items-center gap-2">
                            <button type="button" data-target="start_time" data-direction="-1"
                                class="inline-flex h-10 w-10 items-center justify-center rounded-lg border border-gray-300 bg-white text-gray-700 hover:bg-gray-100 transition">
                                −
                            </button>
                            <input id="start_time" type="time" name="start_time" value="<?php echo e(old('start_time')); ?>"
                                class="flex-1 border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition"
                                required>
                            <button type="button" data-target="start_time" data-direction="1"
                                class="inline-flex h-10 w-10 items-center justify-center rounded-lg border border-gray-300 bg-white text-gray-700 hover:bg-gray-100 transition">
                                +
                            </button>
                        </div>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold mb-1 text-sm">End Time:</label>
                        <div class="flex items-center gap-2">
                            <button type="button" data-target="end_time" data-direction="-1"
                                class="inline-flex h-10 w-10 items-center justify-center rounded-lg border border-gray-300 bg-white text-gray-700 hover:bg-gray-100 transition">
                                −
                            </button>
                            <input id="end_time" type="time" name="end_time" value="<?php echo e(old('end_time')); ?>"
                                class="flex-1 border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition"
                                required>
                            <button type="button" data-target="end_time" data-direction="1"
                                class="inline-flex h-10 w-10 items-center justify-center rounded-lg border border-gray-300 bg-white text-gray-700 hover:bg-gray-100 transition">
                                +
                            </button>
                        </div>
                    </div>
                </div>

                <div class="text-xs text-emerald-800 mb-6 bg-emerald-50/80 p-3 rounded-lg border border-emerald-100">
                    <strong>Notice:</strong> The system automatically blocks slots intersecting prayer windows (7:00 PM
                    - 9:00 PM) and limits maximum single sessions to 2 hours.
                </div>

                <button type="submit"
                    class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2.5 rounded-lg transition shadow-md">
                    Confirm Venue & Select Equipment
                </button>
            </form>
        </div>
    </div>

    <script>
        (() => {
            const step = 15; // minutes per click
            const buttons = document.querySelectorAll('button[data-target][data-direction]');

            const pad = (value) => String(value).padStart(2, '0');

            const adjustTime = (input, deltaMinutes) => {
                if (!input.value) {
                    input.value = '08:00';
                }

                const [hours, minutes] = input.value.split(':').map(Number);
                const date = new Date();
                date.setHours(hours);
                date.setMinutes(minutes + deltaMinutes);

                input.value = `${pad(date.getHours())}:${pad(date.getMinutes())}`;
            };

            buttons.forEach((button) => {
                button.addEventListener('click', () => {
                    const target = button.dataset.target;
                    const direction = Number(button.dataset.direction);
                    const input = document.querySelector(`input[name="${target}"]`);
                    if (!input) return;
                    adjustTime(input, direction * step);
                });
            });
        })();
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\Users\hazmi\Downloads\IIUM_Sports_Updated\project\resources\views/bookings/create.blade.php ENDPATH**/ ?>