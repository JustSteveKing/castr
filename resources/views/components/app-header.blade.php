<div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
    <div class="text-center">
        @isset($message)
            <p class="text-base font-semibold text-cyan-600 uppercase tracking-wide">
                {{ $message }}
            </p>
        @endisset

        <h1 class="mt-1 text-4xl font-extrabold text-gray-900 sm:text-5xl sm:tracking-tight lg:text-6xl">
            {{ $heading }}
        </h1>

        @isset($subHeading)
            <p class="max-w-xl mx-auto mt-5 text-xl text-gray-500">
                {!! $subHeading !!}
            </p>
        @endisset
    </div>
</div>
