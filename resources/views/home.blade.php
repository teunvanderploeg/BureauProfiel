@extends('layouts.master')

@section('title', 'Home | Bureau Profiel')

@section('content')
    <div class="bg-bp_white">
        <div class="container mx-8 sm:mx-auto w-full flex">
            <div class="m-auto md:w-1/2">
                <div class="flex pt-28">
                    <div class="border-b border-1 border-bp_orange w-6 h-0 my-auto"></div>
                    <p class="pl-1 font-bold">Meedoen aan marktonderzoeken?</p>
                </div>
                <div>
                    <h1 class="sm:text-7xl text-5xl font-bold leading-tight">Jouw mening <br> is geld waard!</h1>
                </div>
                <div class="pt-4 w-5/6 leading-loose">
                    <p>Bureau Profiel biedt jou de mogelijkheid wat te doen met je stem! Word respondent en help de
                        consument aan betere producten op de markt d.m.v. marktonderzoek.</p>
                </div>
                <div class="grid grid-cols-2 pt-4">
                    <div class="flex font-bold">
                        <div class="my-auto">
                            <x-check/>
                        </div>
                        <p class="pl-2 my-auto text-bp_purple">Betaalde deelname</p>
                    </div>
                    <div class="flex font-bold">
                        <div class="my-auto">
                            <x-check/>
                        </div>
                        <p class="pl-2 my-auto text-bp_purple">Exclusieve sneak previews</p>
                    </div>
                    <div class="flex font-bold">
                        <div class="my-auto">
                            <x-check/>
                        </div>
                        <p class="pl-2 my-auto text-bp_purple">Consumpties inbegrepen</p>
                    </div>
                    <div class="flex font-bold">
                        <div class="my-auto">
                            <x-check/>
                        </div>
                        <p class="pl-2 my-auto text-bp_purple">Flexibele tijden</p>
                    </div>
                </div>
                <div class="sm:flex sm:pt-4 pt-8">
                    <x-speech-cloud color="purple" direction="top" text="Ik wil me inschrijven"
                                    route="form.create"/>
                    <a href="#" class="font-bold my-auto pl-3 sm:pl-9 whitespace-nowrap">Hoe werkt het? ></a>
                </div>
            </div>
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
                        class="w-1/3 flex text-white h-64 w-64 bg-bp_purple font-bold px-7 py-2 rounded-l-full transition rounded-t-full border-bp_purple absolute right-0 bottom-5">
                        <p x-show="activeSlide == 0" class="m-auto text-3xl text-center">“Absoluut de moeite waard!”</p>
                        <p x-show="activeSlide == 1" class="m-auto text-3xl text-center">“Beter dan dit wordt het
                            niet!”</p>
                        <p x-show="activeSlide == 2" class="m-auto text-3xl text-center">“Ik raad het je echt aan!”</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full bg-bp_purple flex justify-center p-4 mt-16">
            <p class="text-white font-bold my-auto pr-4">Ondernemer? Laat je marktonderzoek uitvoeren!</p>
            <x-speech-cloud color="orange" direction="bottom" text="Offerte aanvragen" route="home" class="m-auto sm:m-0"/>
        </div>
    </div>

    <div class="bg-white md:flex pt-16 sm:pt-24 justify-between">
        <div class="container md:w-1/2 flex">
            <img src="{{ asset('images/3_persones.png') }}" alt="persones" class="md:w-3/4 w-5/6 m-auto">
        </div>
        <div class="container md:w-1/2 flex md:pt-0 pt-8">
            <div class="md:w-3/4 w-5/6 m-auto">
                <p class="text-3xl font-bold leading-tight">Geef je mening over nieuwe producten en ontvang een
                    vergoeding!</p>
                <p class="pt-4 w-full leading-loose">Voordat er een nieuw product of dienst uitkomt, willen de makers
                    hiervan graag jouw mening horen. Bij Bureau Profiel zorgen we ervoor dat jij deze meningen mag geven
                    over de nieuwste trends en ontwikkelingen en hier geld mee te verdienen!</p>
                <div class="flex pt-4 mx-auto">
                    <x-speech-cloud color="purple" direction="top" text="Hoe werkt het?" route="home"/>
                    <a href="{{ route('form.create') }}" class="font-bold my-auto pl-9 whitespace-nowrap">Gelijk inschrijven ></a>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-bp_white">
        <div class="container pt-16 sm:pt-24">

        </div>
    </div>
@endsection
