<!-- This example requires Tailwind CSS v2.0+ -->
<div class="bg-{{ isset($brand) ? 'indigo-700' : 'gray-50' }}">
    <div class="max-w-2xl mx-auto text-center py-16 px-4 sm:py-20 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-extrabold text-{{ isset($brand) ? 'white' : 'gray-600' }} sm:text-4xl">
            <span class="block">
                Find new podcasts,
            </span>
            <span class="block">
                Grow your audience.
            </span>
        </h2>
        <p class="mt-4 text-lg leading-6 text-{{ isset($brand) ? 'indigo-200' : 'gray-500' }}">
            Ac euismod vel sit maecenas id pellentesque eu sed consectetur. Malesuada adipiscing sagittis vel nulla nec.
        </p>
        <a href="#" class="mt-8 w-full inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-{{ isset($brand) ? 'indugo-600' : 'gray-50' }} bg-{{ isset($brand) ? 'white' : 'indigo-700' }} hover:bg-{{ isset($brand) ? 'indigo-50': 'indigo-900' }} sm:w-auto">
            Join our beta access today
        </a>
    </div>
</div>
