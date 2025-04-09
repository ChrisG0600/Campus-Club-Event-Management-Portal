<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
    </head>
<body class="bg-gray-100 text-gray-900 antialiased flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
    <div class="bg-white shadow-md rounded-lg overflow-hidden w-full lg:max-w-xl max-w-sm">
        <main class="p-6 sm:p-8 lg:p-12">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Welcome!
                </h2>

                <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                    This is a simplified landing page, styled to resemble the modern Breeze starter kit.
                    You can customize this content to showcase the features of your Campus Club & Event Management
                    Portal.
                </p>
            </div>

            <div class="mt-8 space-y-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-4 text-sm text-gray-600">
                        Explore a wide range of campus clubs.
                    </div>
                </div>

                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v12a2 2 0 002 2h14a2 2 0 002-2V7a2 2 0 00-2-2H5z" />
                        </svg>
                    </div>
                    <div class="ml-4 text-sm text-gray-600">
                        Stay updated on upcoming campus events.
                    </div>
                </div>

                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="h-6 w-6 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2z" />
                        </svg>
                    </div>
                    <div class="ml-4 text-sm text-gray-600">
                        Manage your club memberships and event registrations.
                    </div>
                </div>

                <div class="mt-6">
                    @if (Route::has('login'))
                    @auth
                    <a href="{{ route(auth()->user()->role .'.dashboard') }}"
                        class="inline-flex items-center px-4 py-2 bg-indigo-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-400 active:bg-indigo-600 focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Go to Dashboard
                    </a>
                    @else
                    <div class="flex items-center justify-start space-x-4">
                        <a href="{{ route('login') }}"
                            class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:border-indigo-300 focus:ring focus:ring-indigo-200 active:bg-gray-100 disabled:opacity-25 transition ease-in-out duration-150">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="'inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Register
                            </a>
                        @endif
                    </div>
                    @endauth
                    @endif
                </div>
            </div>
        </main>
    </div>

    @if (Route::has('login'))
    <footer class="w-full lg:max-w-xl max-w-sm mt-8 text-center text-gray-500 text-xs">
        <p>&copy; {{ date('Y') }} Your Campus Name. All rights reserved.</p>
    </footer>
    @endif
</body>
</html>
