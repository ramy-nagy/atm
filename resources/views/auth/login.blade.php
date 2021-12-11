<x-guest-layout>
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
            <div class="flex flex-col overflow-y-auto md:flex-row">
                <div class="h-32 md:h-auto md:w-1/2">
                    <img aria-hidden="true" class="object-cover w-full h-full dark:hidden"
                        src="{{ asset('assets/img/login-office.jpeg') }}" alt="Office" />
                    <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block"
                        src="{{ asset('assets/img/login-office-dark.jpeg') }}" alt="Office" />
                </div>
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <div class="w-full">
                        <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                            Login
                        </h1>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Account ID</span>

                                <input
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input 
                                    @error('email') border-red-600  focus:border-red-400
                                    focus:outline-none focus:shadow-outline-red @enderror"
                                    id="email" type="text" name="email" value="{{ old('email') }}" required
                                    autocomplete="email" autofocus placeholder="Account ID">
                                @error('email')<p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>@enderror
                            </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Password</span>
                                <input id="password"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input @error('password') is-invalid @enderror"
                                    type="password" name="password" required autocomplete="current-password" />
                                    @error('password')<p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>@enderror
                            </label>

                            <button
                                class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                {{ __('Log in') }}
                            </button>

                            <hr class="my-8" />
                            <p class="mt-4">
                                @if (Route::has('password.request'))
                                <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                                @endif
                            </p>
                            <p class="mt-1">
                                @if (Route::has('register'))
                                <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                                    href="{{ route('register') }}">
                                    {{ __('Create account') }}
                                </a>
                                @endif
                               

                            </p>
                            <p class="mt-1">
                                @if (Route::has('register'))
                                <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                                    href="{{ route('register') }}">
                                    {{ __('Admin') }}
                                </a>
                                @endif
                               

                            </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>