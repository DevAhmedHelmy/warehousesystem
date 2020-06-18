<!DOCTYPE html>
<html dir="rtl">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>نظام المخازن</title>
  <link rel="stylesheet" href="{{asset('admin/dist/css/tailwind.min.css')}}">
</head>
<body  class="bg-cover" style="background-image: url(https://cdn.hipwallpaper.com/i/37/5/shDrKc.jpg)">
    <div class="w-full pt-2 p-4">
        <div class="mx-auto md:p-6 md:w-1/3">

            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="text-center">
                    <h1 class="text-2xl text-gray-700 p-4">
                        <i class="fas fa-sign-in-alt fa-fw fa-lg"></i>
                        @lang('general.login_page')
                    </h1>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-8">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                            {{ __('general.email') }}
                            <span class="text-red-500">&nbsp;*</span>

                        </label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                            <input type="email" name="email" id="email" class="block shadow appearance-none border-2 border-orange-100 @error('email') border-red-500 @enderror rounded w-full py-2 px-4 text-gray-700 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-orange-500 transition duration-500 ease-in-out" placeholder="you@example.com" required autocomplete="email" value="{{ old('email') }}"/>
                        </div>
                        @error('email')
                            <strong class="text-red-500 text-xs italic">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-8">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
                            {{ __('general.password') }}
                            <span class="text-red-500">&nbsp;*</span>

                        </label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </div>
                            <input name="password" type="password" id="password" type="text" class="block shadow appearance-none border-2 border-orange-100 @error('password') border-red-500 @enderror rounded w-full py-2 px-4 text-gray-700 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-orange-500 transition duration-500 ease-in-out" required autocomplete="current-password">
                        </div>
                        @error('password')
                            <strong class="text-red-500 text-xs italic">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <label class="block text-gray-500 font-bold" for="remember">
                                    <input class="ml-2 leading-tight" type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <span class="text-sm">
                                        {{ __('general.Remember_Me') }}
                                    </span>
                                </label>
                            </div>
                            <div>
                                @if (Route::has('password.request'))
                                    <a class="font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('password.request') }}">
                                        {{ __('general.Forgot_Your_Password') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="mb-4 text-center">
                        <button class="transition duration-500 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                            {{ __('general.login') }}
                        </button>
                    </div>
                </form>
            </div>
            {{-- /.login-card-body --}}

        </div>
    </div>


</body>
</html>

