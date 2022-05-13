<div class="m-auto md:block hidden relative pt-8" x-data="{activeSlide: 0, slides: [0, 1, 2]}">
    <div class="">
        <img x-show="activeSlide == 0" class="h-[35rem]" src="{{ asset('images/respondent1.png') }}"
             alt="respondent 1">
        <img x-cloak x-show="activeSlide == 1" class="h-[35rem]" src="{{ asset('images/respondent2.png') }}"
             alt="respondent 2">
        <img x-cloak x-show="activeSlide == 2" class="h-[35rem]" src="{{ asset('images/respondent3.png') }}"
             alt="respondent 3">
    </div>
    <div class="flex w-2/3">
        <div class="w-1/2">
            <p x-show="activeSlide == 0" class="font-bold">Kamilla, 22</p>
            <p x-show="activeSlide == 1" class="font-bold">Klaas, 29</p>
            <p x-show="activeSlide == 2" class="font-bold">Kim, 24</p>
        </div>
        <div class="w-1/2 flex ml-auto">
            <button
                class="w-3 h-3 m-2 rounded-full overflow-hidden transition-colors duration-200 ease-out hover:bg-bp_orange hover:shadow-lg"
                :class="{'bg-bp_orange': activeSlide === 0,'bg-gray-300': activeSlide !== 0}"
                x-on:click="activeSlide = 0"
            ></button>
            <button
                class="w-3 h-3 m-2 rounded-full overflow-hidden transition-colors duration-200 ease-out hover:bg-bp_orange hover:shadow-lg"
                :class="{'bg-bp_orange': activeSlide === 1,'bg-gray-300': activeSlide !== 1}"
                x-on:click="activeSlide = 1"
            ></button>
            <button
                class="w-3 h-3 m-2 rounded-full overflow-hidden transition-colors duration-200 ease-out hover:bg-bp_orange hover:shadow-lg"
                :class="{'bg-bp_orange': activeSlide === 2,'bg-gray-300': activeSlide !== 2}"
                x-on:click="activeSlide = 2"
            ></button>
        </div>
        <div
            class="w-1/3 flex text-white h-64 w-64 bg-bp_purple font-bold px-7 py-2 rounded-l-full rounded-t-full border-bp_purple absolute right-0 bottom-5">
            <p x-show="activeSlide == 0" class="m-auto text-3xl text-center">“Absoluut de moeite waard!”</p>
            <p x-show="activeSlide == 1" class="m-auto text-3xl text-center">“Beter dan dit wordt het
                niet!”</p>
            <p x-show="activeSlide == 2" class="m-auto text-3xl text-center">“Ik raad het je echt aan!”</p>
        </div>
    </div>
</div>
