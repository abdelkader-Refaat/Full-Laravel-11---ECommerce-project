<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dark Bootstrap Admin </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">

    @vite('resources/css/app.css')
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('/admin/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('/admin/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="{{ asset('/admin/css/font.css') }}">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('/admin/css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('/admin/css/custom.css') }}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('/admin/img/favicon.ico') }}">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
    <div class="login-page">
        <div class="container d-flex align-items-center">
            <div class="form-holder has-shadow">
                <div class="row">
                    <!-- Logo & Information Panel-->
                    <div class="col-lg-6">
                        <div class="info d-flex align-items-center">
                            <div class="content">
                                <div class="logo">
                                    <h1>Register your required details here</h1>
                                </div>
                             <i class="fa-solid fa-door-open" style="color: #232323;">Welcome here</i>
                            </div>
                        </div>
                    </div>
                    <!-- Form Panel    -->
                    <div class="col-lg-6 bg-white">
                        <div class="form d-flex align-items-center">
                            <div class="content">
                                    {{-- <div class="form-group-material"> --}}
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf

                                            <!-- Name -->
                                            <div class="mt-1">
                                                <x-input-label for="name" :value="__('Name')" />
                                                <x-text-input  id="name" class="block mt-0 w-full text-gray-700" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                            </div>

                                            <!-- Email Address -->
                                            <div class="mt-1">
                                                <x-input-label for="email" :value="__('Email')" />
                                                <x-text-input id="email" class="block mt-0 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                            </div>
                                            <div class="mt-1">
                                                <x-input-label for="phone" :value="__('phone')" />
                                                <x-text-input id="phone" class="block mt-0 w-full" type="text" name="phone" :value="old('name')" required autofocus autocomplete="name" />
                                                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                            </div>
                                            <div class="mt-1">
                                                <x-input-label for="address" :value="__('address')" />
                                                <x-text-input id="address" class="block mt-0 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="name" />
                                                <x-input-error :messages="$errors->get('address')" class="mt-2" />
                                            </div>

                                            <!-- Password -->
                                            <div class="mt-1">
                                                <x-input-label for="password" :value="__('Password')" />

                                                <x-text-input id="password" class="block mt-1 w-full"
                                                                type="password"
                                                                name="password"
                                                                required autocomplete="new-password" />

                                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                            </div>

                                            <!-- Confirm Password -->
                                            <div class="mt-1">
                                                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                                                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                                                type="password"
                                                                name="password_confirmation" required autocomplete="new-password" />

                                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                            </div>

                                            <div class="flex items-center justify-end mt-4">
                                                <a class="underline text-sm text-gray-200 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                                                    {{ __('Already registered?') }}
                                                </a>

                                                <x-primary-button class="ms-4 btn btn-primary">
                                                    {{ __('Register') }}
                                                </x-primary-button>
                                            </div>
                                        </form>
                                        <small>Already have an account? </small><a href="{{route('login')}}" class="signup">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyrights text-center">
            <p>2018 &copy; Your company. Download From <a target="_blank" href="https://templateshub.net">Templates
                    Hub</a></p>
        </div>
    </div>
    <!-- JavaScript files-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('/admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/admin/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('/admin/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/admin/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('/admin/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('/admin/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/admin/js/charts-home.js') }}"></script>
    <script src="{{ asset('/admin/js/front.js') }}"></script>

</body>

</html>



















{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="phone" :value="__('phone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="address" :value="__('address')" />
            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
