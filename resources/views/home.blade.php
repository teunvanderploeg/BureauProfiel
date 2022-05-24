@extends('layouts.master')

@section('title', 'Home | Bureau Profiel')

@section('content')
    <div class="bg-bp_white">
        <div class="container mx-8 py-3 pb-5 sm:mx-auto w-full flex">
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
            <x-homepage-carousel/>
        </div>
        <x-business-bar/>
    </div>

    <div class="md:flex pt-16 sm:pt-24 justify-between"
         style="background: linear-gradient(0deg, #FFF7EF 10%, white 10%)">
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
                    <a href="{{ route('form.create') }}" class="font-bold my-auto pl-9 whitespace-nowrap">Gelijk
                        inschrijven ></a>
                </div>
            </div>
        </div>
    </div>
    @if(count($assignments) != 0)
        <div class="bg-bp_white">
            <div class="container mx-auto pt-16 sm:pt-24">
                <div class="flex flex-col md:flex-row pb-3 mx-6 md:mx-0">
                    <p class="mr-auto my-auto font-bold text-3xl">Wij zijn op zoek naar jou!</p>
                    <a class="ml-auto my-auto font-bold" href="#">Bekijk alle onderzoeken ></a>
                </div>
                <div
                    class="pb-4 pt-7 bg-bp_purple md:rounded-r-2xl md:rounded-b-2xl grid grid-cols-1 md:grid-cols-2 text-center ">
                    @foreach($assignments as $assignment)
                        <x-research-block :image="$assignment->image" :title="$assignment->title"
                                          :description="$assignment->description" :link="$assignment->link"/>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <div class="bg-bp_white" style="background: linear-gradient(0deg, white 20%, #FFF7EF 10%)">
        <div class="container mx-auto pt-24">
            <div class="flex mx-auto text-center">
                <div class="ml-auto border-b border-1 border-bp_orange w-6 h-0 my-auto"></div>
                <p class="px-4 font-bold">Waardevolle onderzoeken met échte mensen</p>
                <div class="mr-auto border-b border-1 border-bp_orange w-6 h-0 my-auto"></div>
            </div>
            <div class="flex">
                <h2 class="text-4xl font-bold mx-auto w-2/3 text-center">Hoe denken onze respondenten over hun
                    deelname?</h2>
            </div>
            <div></div>
            <div class="flex">
                <a href="#" class="font-bold mx-auto w-2/3 text-center">Bekijk het gehele proces van a tot z ></a>
            </div>
        </div>
        <div class="swiper w-full m-10 container">
            <div class="swiper-wrapper w-2/3">
                <div class="swiper-slide h-full">
                    <div class="flex flex-col px-5">
                        <div class="item-top rounded-t relative">
                            <div class="image-container w-full h-72 relative">
                                <img src="{{asset('images/Hubert.png')}}" alt=""
                                     class="w-full h-full absolute left-0 top-0 object-cover">
                            </div>
                            <div
                                class="label bg-bp_orange text-white py-1.5 px-3 text-bold absolute left-8 -bottom-3 rounded-t-xl rounded-r-xl">
                                Sander, 34
                            </div>
                        </div>
                        <div class="top-bottom rounded-bl-2xl bg-bp_purple text-white p-8">
                            <h3 class="text-md font-bold mb-4">“Ontzettend inspirerend, ik heb echt een impact kunnen
                                maken”</h3>
                            <p class="text-sm">Bureau Profiel is een wervings- en selectiebureau voor respondenten. Het
                                bedrijf werft respondenten en nodigt deze uit voor een marktonderzoek. Bijvoorbeeld voor
                                een.Bureau Profiel is een wervings- en selectiebureau voor respondenten. </p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide h-full">
                    <div class="flex flex-col px-5">
                        <div class="item-top rounded-t relative">
                            <div class="image-container w-full h-72 relative">
                                <img src="{{asset('images/Sander.png')}}" alt=""
                                     class="w-full h-full absolute left-0 top-0 object-cover">
                            </div>
                            <div
                                class="label bg-bp_orange text-white py-1.5 px-3 text-bold absolute left-8 -bottom-3 rounded-t-xl rounded-r-xl">
                                Hubert, 58
                            </div>
                        </div>
                        <div class="top-bottom rounded-bl-2xl bg-bp_purple text-white p-8">
                            <h3 class="text-md font-bold mb-4">“Erg fascinerend om een kijkje achter de schermen te
                                krijgen”</h3>
                            <p class="text-sm">Bureau Profiel biedt jou de mogelijkheid wat te doen met je stem! Word
                                respondent en help de consument aan betere producten op de markt d.m.v.
                                marktonderzoek.</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide h-full">
                    <div class="flex flex-col px-5">
                        <div class="item-top rounded-t relative">
                            <div class="image-container w-full h-72 relative">
                                <img src="{{asset('images/Yulia.png')}}" alt=""
                                     class="w-full h-full absolute left-0 top-0 object-cover">
                            </div>
                            <div
                                class="label bg-bp_orange text-white py-1.5 px-3 text-bold absolute left-8 -bottom-3 rounded-t-xl rounded-r-xl">
                                Yulia, 26
                            </div>
                        </div>
                        <div class="top-bottom rounded-bl-2xl bg-bp_purple text-white p-8">
                            <h3 class="text-md font-bold mb-4">“Fijne interviews en een voldaan gevoel, enorme
                                aanrader!”</h3>
                            <p class="text-sm">Bureau Profiel biedt jou de mogelijkheid wat te doen met je stem! Word
                                respondent en help de consument aan betere producten op de markt d.m.v.
                                marktonderzoek.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white">
        <div class="container mx-8 py-3 pb-5 sm:mx-auto w-full pt-20">
            <div class="w-1/2">
                <h3 class="text-3xl mb-10 font-bold">Met deze opdrachtgevers <br> Werken we samen</h3>
            </div>
            <div class="items flex flex-row flex-wrap -mx-5 lg:pr-72">
                <x-business-logo-item image="LogoAmsterdam"/>
                <x-business-logo-item image="LogoOverheid"/>
                <x-business-logo-item image="LogoSoaids"/>
                <x-business-logo-item image="LogoMotivation"/>
                <x-business-logo-item image="LogoMWM2"/>
                <x-business-logo-item image="LogoNpo"/>
                <x-business-logo-item image="LogoMARE"/>
                <x-business-logo-item image="LogoKantar"/>
            </div>
        </div>
    </div>
@endsection
