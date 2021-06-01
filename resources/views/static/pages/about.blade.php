<x-app-layout>
    <!-- Page Header -->
    <x-app-header heading="About us" />

    <!-- Mission Statement -->
    <div class="relative mt-20">
        <div class="lg:mx-auto lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-2 lg:gap-24 lg:items-start">
            <div class="relative sm:py-16 lg:py-0">
                <div aria-hidden="true" class="hidden sm:block lg:absolute lg:inset-y-0 lg:right-0 lg:w-screen">
                    <div class="absolute inset-y-0 right-1/2 w-full bg-gray-100 rounded-r-3xl lg:right-72"></div>
                    <svg class="absolute top-8 left-1/2 -ml-3 lg:-right-8 lg:left-auto lg:top-12" width="404"
                        height="392" fill="none" viewBox="0 0 404 392">
                        <defs>
                            <pattern id="02f20b47-fd69-4224-a62a-4c9de5c763f7" x="0" y="0" width="20" height="20"
                                patternUnits="userSpaceOnUse">
                                <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor"></rect>
                            </pattern>
                        </defs>
                        <rect width="404" height="392" fill="url(#02f20b47-fd69-4224-a62a-4c9de5c763f7)"></rect>
                    </svg>
                </div>
                <div class="relative mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:px-0 lg:max-w-none lg:py-20">
                    <!-- Testimonial card-->
                    <div class="relative pt-64 pb-10 rounded-2xl shadow-xl overflow-hidden">
                        <img class="absolute inset-0 h-full w-full object-cover"
                            src="https://images.unsplash.com/photo-1521510895919-46920266ddb3?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;fp-x=0.5&amp;fp-y=0.6&amp;fp-z=3&amp;width=1440&amp;height=1440&amp;sat=-100"
                            alt="">
                        <div class="absolute inset-0 bg-indigo-500 mix-blend-multiply"></div>
                        <div class="absolute inset-0 bg-gradient-to-t from-indigo-600 via-indigo-600 opacity-90"></div>
                        <div class="relative px-8">
                            <div>
                                <img class="h-12" src="https://tailwindui.com/img/logos/workcation.svg?color=white"
                                    alt="Workcation">
                            </div>
                            <blockquote class="mt-8">
                                <div class="relative text-lg font-medium text-white md:flex-grow">
                                    <p class="relative">
                                        Tincidunt integer commodo, cursus etiam aliquam neque, et. Consectetur pretium
                                        in volutpat, diam. Montes, magna cursus nulla feugiat dignissim id lobortis
                                        amet.
                                    </p>
                                </div>

                                <footer class="mt-4">
                                    <p class="text-base font-semibold text-indigo-200">Sarah Williams, CEO at Workcation
                                    </p>
                                </footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:px-0">
                <!-- Content area -->
                <div class="pt-12 sm:pt-16 lg:pt-20">
                    <h2 class="text-3xl text-gray-900 font-extrabold tracking-tight sm:text-4xl">
                        On a mission to enable you to grow your audience more effectively.
                    </h2>
                    <div class="mt-6 text-gray-500 space-y-6">
                        <p class="text-lg">
                            Sagittis scelerisque nulla cursus in enim consectetur quam. Dictum urna sed consectetur
                            neque tristique pellentesque. Blandit amet, sed aenean erat arcu morbi. Cursus faucibus nunc
                            nisl netus morbi vel porttitor vitae ut. Amet vitae fames senectus vitae.
                        </p>
                    </div>
                </div>

                <!-- Stats section -->
                <div class="mt-10">
                    <dl class="grid grid-cols-2 gap-x-4 gap-y-8">

                        <div class="border-t-2 border-gray-100 pt-6">
                            <dt class="text-base font-medium text-gray-500">Founded</dt>
                            <dd class="text-3xl font-extrabold tracking-tight text-gray-900">2021</dd>
                        </div>

                        <div class="border-t-2 border-gray-100 pt-6">
                            <dt class="text-base font-medium text-gray-500">Employees</dt>
                            <dd class="text-3xl font-extrabold tracking-tight text-gray-900">5</dd>
                        </div>

                        <div class="border-t-2 border-gray-100 pt-6">
                            <dt class="text-base font-medium text-gray-500">Beta Users</dt>
                            <dd class="text-3xl font-extrabold tracking-tight text-gray-900">521</dd>
                        </div>

                        <div class="border-t-2 border-gray-100 pt-6">
                            <dt class="text-base font-medium text-gray-500">Raised</dt>
                            <dd class="text-3xl font-extrabold tracking-tight text-gray-900">$25M</dd>
                        </div>

                    </dl>
                    <div class="mt-10">
                        <a href="#" class="text-base font-medium text-indigo-500">
                            Learn more about how we're changing the world&nbsp;→
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Team -->
    <div class="bg-white">
        <div class="mx-auto py-12 px-4 max-w-7xl sm:px-6 lg:px-8 lg:py-24">
            <div class="space-y-12 lg:grid lg:grid-cols-3 lg:gap-8 lg:space-y-0">
                <div class="space-y-5 sm:space-y-4">
                    <h2 class="text-3xl font-extrabold tracking-tight sm:text-4xl">Our Team</h2>
                    <p class="text-xl text-gray-500">Nulla quam felis, enim faucibus proin velit, ornare id pretium.
                        Augue ultrices sed arcu condimentum vestibulum suspendisse. Volutpat eu faucibus vivamus eget
                        bibendum cras.</p>
                </div>
                <div class="lg:col-span-2">
                    <ul class="space-y-12 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:gap-y-12 sm:space-y-0 lg:gap-x-8">
                        
                        <x-team.card />
                        <x-team.card />
                        <x-team.card />
                        <x-team.card />
                        <x-team.card />

                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Sign up CTA -->
    <x-sign-up-cta
        :brand="true"
    />

</x-app-layout>
