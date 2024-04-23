<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Task List' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    

    @yield('style')
</head>

<body class="container mx-auto mt-10 mb-10 max-w-lg">
    
    <h1 class="text-3xl">@yield('title')</h1>

    <div x-data="{ flash: true }">

        @if(session()->has('success'))
            
            <div 
                x-show="flash"
                class="relative mt-4 mb-10 rounded border-10 border-green-400 bg-green-100 px-4 py-3 text-green-700"
                role="alert"
            >

                <strong class="font-bold">Success!</strong>

                <div class="">{{ session('success') }}</div>

                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 cursor-pointer" @click="flash = false">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>

                </span>

            </div>

        @endif
        

        @yield('content')
    
    </div>

    <script src="//unpkg.com/alpinejs" defer></script>

</body>

</html>