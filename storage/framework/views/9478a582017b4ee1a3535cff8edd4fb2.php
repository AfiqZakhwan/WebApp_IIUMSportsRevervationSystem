<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome - IIUM Sports Reservation System</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles (Tailwind CSS compiled via Vite) -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body class="antialiased">
    <!-- Transparent Background Overlay with your image -->
    <div class="min-h-screen flex flex-col justify-center items-center bg-cover bg-center relative px-4"
        style="background-image: linear-gradient(rgba(255, 255, 255, 0.85), rgba(255, 255, 255, 0.85)), url('<?php echo e(asset('images/IIUM_Stadium.jpg')); ?>');">

        <!-- Central Branding & Navigation Card Box -->
        <div
            class="w-full sm:max-w-md bg-white/90 backdrop-blur-sm shadow-2xl rounded-2xl p-8 border border-emerald-100 text-center z-10">



            <!-- IIUM Emblem Top Middle of Card -->
            <div class="flex justify-center mb-4">
                <img src="<?php echo e(asset('images/IIUM_emblem.png')); ?>" class="h-28 w-auto object-contain" alt="IIUM Logo">
            </div>

            <!-- Welcome Header Title -->
            <h1 class="text-2xl font-bold text-emerald-900 leading-tight">
                Welcome to IIUM Sports Reservation System!
            </h1>
            <p class="text-sm text-gray-600 mt-2 mb-8">
                Kulliyyah of Information and Communication Technology
            </p>

            <!-- Authentication Action Buttons Centered -->
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Route::has('login')): ?>
                <div class="flex flex-col gap-3">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                        <!-- If the student is already logged in, show a dashboard button instead -->
                        <a href="<?php echo e(url('/dashboard')); ?>"
                            class="w-full inline-flex justify-center items-center px-4 py-3 bg-emerald-600 hover:bg-emerald-700 active:bg-emerald-800 text-white font-semibold rounded-lg shadow-md transition ease-in-out duration-150">
                            Go to Dashboard
                        </a>
                    <?php else: ?>
                        <!-- Log In Button -->
                        <a href="<?php echo e(route('login')); ?>"
                            class="w-full inline-flex justify-center items-center px-4 py-3 bg-emerald-600 hover:bg-emerald-700 active:bg-emerald-800 text-white font-semibold rounded-lg shadow-md transition ease-in-out duration-150">
                            Log In
                        </a>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Route::has('register')): ?>
                            <!-- Register Button -->
                            <a href="<?php echo e(route('register')); ?>"
                                class="w-full inline-flex justify-center items-center px-4 py-3 bg-white border border-emerald-600 hover:bg-emerald-50 text-emerald-700 font-semibold rounded-lg shadow-sm transition ease-in-out duration-150">
                                Register Account
                            </a>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <!-- Mini Footer inside page design -->
        <div class="absolute bottom-4 text-center text-xs text-gray-500 z-10">
            &copy; <?php echo e(date('Y')); ?> IIUM Sports Facility Management. All Rights Reserved.
        </div>
    </div>
</body>

</html><?php /**PATH C:\Users\hazmi\Downloads\IIUM_Sports_Updated\project\resources\views/welcome.blade.php ENDPATH**/ ?>