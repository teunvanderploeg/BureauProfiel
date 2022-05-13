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

    <div class="bg-bp_white">
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
    </div>
@endsection
