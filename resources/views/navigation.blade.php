<nav class="bg-bp_white" x-data="{ open: false }">
    <div class="mx-auto px-2 md:px-6 lg:px-8">
        <div class="relative flex items-center justify-between py-3">
            <div class="flex-1 flex items-center md:items-stretch md:justify-start">
                <div class="flex-shrink-0 flex">
                    <a href="{{ route('home') }}">
                        <img src="{{asset('images/logo.svg')}}" alt="logo" class="h-16">
                    </a>
                </div>
                <div class="hidden md:block md:ml-6 w-full">
                    <div class="flex-1 flex justify-between justify-center text-center h-full">
                        <a href="#" class="text-black whitespace-nowrap font-bold my-auto cursor-pointer px-3 py-2 xl:ml-32 lg:ml-24">Respondenten</a>
                        <a href="#" class="text-black whitespace-nowrap font-bold my-auto cursor-pointer px-3 py-2">Opdrachtgevers</a>
                        <a href="#" class="text-black whitespace-nowrap font-bold my-auto cursor-pointer px-3 py-2">Over ons</a>
                        <a href="#" class="text-black whitespace-nowrap font-bold my-auto cursor-pointer px-3 py-2">Contact</a>
                        <div class="ml-6 my-auto">
                            <x-speech-cloud text="Ik wil me inschrijven" color="orange" route="form.create" direction="bottom"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 md:static md:inset-auto md:ml-6 md:pr-0">
                <div class="absolute inset-y-0 right-0 flex items-center md:hidden">
                    <!-- Mobile menu button-->
                    <button type="button"
                            class="inline-flex items-center justify-center p-2 rounded-md text-black"
                            @click="open = !open">

                        <svg xmlns:xlink="http://www.w3.org/1999/xlink" x-show="!open" class="block h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true" width="24" height="24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2px" d="M4 6h16M4 12h16M4 18h16" stroke="#000000" fill="none"></path>
                        </svg>

                        <svg x-cloak xmlns:xlink="http://www.w3.org/1999/xlink" x-show="open" class="block h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true" width="24" height="24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2px" d="M6 18L18 6M6 6l12 12" stroke="#000000" fill="none"></path>
                        </svg>
                    </button>
                </div>

            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="md:hidden" x-show="open" x-cloak>
        <div class="px-2 pt-2 pb-3 space-y-1 text-center">
            <a href="#" class="text-black font-bold block px-3 py-2 rounded-md text-base">Respondenten</a>
            <a href="#" class="text-black font-bold block px-3 py-2 rounded-md text-base">Opdrachtgevers</a>
            <a href="#" class="text-black font-bold block px-3 py-2 rounded-md text-base">Over ons</a>
            <a href="#" class="text-black font-bold block px-3 py-2 rounded-md text-base">Contact</a>
            <a href="{{ route('form.create') }}" class="text-white font-bold bg-bp_orange block px-3 py-2 m-3 rounded-r-xl rounded-t-xl text-base">Ik wil me inschrijven</a>
        </div>
    </div>
</nav>

