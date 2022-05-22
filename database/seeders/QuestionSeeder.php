<?php

namespace Database\Seeders;

use Database\Factories\QuestionFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuestionFactory::new()->create([
            "question" => "Wat is je voornaam?",
            "slug" => "voornaam",
            "answer_type" => "text",
            "rules" => ['required', 'string', 'max:255'],
        ]);
        QuestionFactory::new()->create([
            "question" => "Wat is je achternaam?",
            "slug" => "achternaam",
            "answer_type" => "text",
            "rules" => ['required', 'string', 'max:255'],
        ]);
        QuestionFactory::new()->create([
            "question" => "Wat is je adres?",
            "slug" => "adres",
            "answer_type" => "text",
            "rules" => ['required', 'string', 'max:255'],
        ]);
        QuestionFactory::new()->create([
            "question" => "Wat is je postcode?",
            "slug" => "postcode",
            "answer_type" => "text",
            "rules" => ['required', 'string', 'max:255'],
        ]);
        QuestionFactory::new()->create([
            "question" => "Wat is je woonplaats?",
            "slug" => "woonplaats",
            "answer_type" => "text",
            "rules" => ['required', 'string', 'max:255'],
        ]);
        QuestionFactory::new()->create([
            "question" => "Wat is je telefoonnummer?",
            "slug" => "telefoonnummer",
            "answer_type" => "tel",
            "rules" => ['required', 'string', 'max:255'],
        ]);
        QuestionFactory::new()->create([
            "question" => "Wat is je e-mailadres?",
            "slug" => "email",
            "answer_type" => "text",
            "rules" => ['required', 'email', 'unique:respondents', 'max:255'],
        ]);
        QuestionFactory::new()->create([
            "question" => "Wat is je geslacht?",
            "slug" => "geslacht",
            "answer_type" => "select",
            "sample_answers" => "Man,Vrouw",
            "rules" => ['required'],
        ]);
        QuestionFactory::new()->create([
            "question" => "Wat is je geboortedatum?",
            "slug" => "geboortedatum",
            "answer_type" => "date",
            "rules" => ['required', 'date'],
        ]);
        QuestionFactory::new()->create([
            "question" => "Wat is je woonsituatie?",
            "slug" => "woonsituatie",
            "answer_type" => "select",
            "sample_answers" => "Alleenstaand,Samenwonend,Gehuwd,Inwonend bij ouders,Other",
            "rules" => ['required'],
        ]);
        QuestionFactory::new()->create([
            "question" => "Heb je thuiswonende kinderen?",
            "slug" => "thuiswonende-kinderen",
            "answer_type" => "checkbox",
            "rules" => ['nullable'],
        ]);
        QuestionFactory::new()->create([
            "question" => "Indien thuiswonende kinderen. geboortedatum kind 1?",
            "slug" => "geboortedatum-kind-1",
            "answer_type" => "date",
            "rules" => ['required_unless:thuiswonende-kinderen,null', 'date'],
        ]);
        QuestionFactory::new()->create([
            "question" => "Indien thuiswonende kinderen. Geslacht kind 1?",
            "slug" => "geslacht-kind-1",
            "answer_type" => "select",
            "sample_answers" => ",Jonge,Meisje",
            "rules" => ['required_unless:geboortedatum-kind-1,null'],
        ]);
        QuestionFactory::new()->create([
            "question" => "Indien thuiswonende kinderen. geboortedatum kind 2?",
            "slug" => "geboortedatum-kind-2",
            "answer_type" => "date",
            "rules" => ['nullable', 'date'],
        ]);
        QuestionFactory::new()->create([
            "question" => "Indien thuiswonende kinderen. Geslacht kind 2?",
            "slug" => "geslacht-kind-2",
            "answer_type" => "select",
            "sample_answers" => ",Jonge,Meisje",
            "rules" => ['required_unless:geboortedatum-kind-2,null'],
        ]);
        QuestionFactory::new()->create([
            "question" => "Indien thuiswonende kinderen. geboortedatum kind 3?",
            "slug" => "geboortedatum-kind-3",
            "answer_type" => "date",
            "rules" => ['nullable', 'date'],
            'searchable' => false,
        ]);
        QuestionFactory::new()->create([
            "question" => "Indien thuiswonende kinderen. Geslacht kind 3?",
            "slug" => "geslacht-kind-3",
            "answer_type" => "select",
            "sample_answers" => ",Jonge,Meisje",
            "rules" => ['required_unless:geboortedatum-kind-3,null'],
            'searchable' => false,
        ]);
        QuestionFactory::new()->create([
            "question" => "Indien thuiswonende kinderen. geboortedatum kind 4?",
            "slug" => "geboortedatum-kind-4",
            "answer_type" => "date",
            "rules" => ['nullable', 'date'],
            'searchable' => false,
        ]);
        QuestionFactory::new()->create([
            "question" => "Indien thuiswonende kinderen. Geslacht kind 4?",
            "slug" => "geslacht-kind-4",
            "answer_type" => "select",
            "sample_answers" => ",Jonge,Meisje",
            "rules" => ['required_unless:geboortedatum-kind-4,null'],
            'searchable' => false,
        ]);
        QuestionFactory::new()->create([
            "question" => "Hoogst genoten afgeronde opleidingsniveau?",
            "slug" => "afgeronde-opleidingsniveau",
            "answer_type" => "select",
            "sample_answers" => "geen,basisonderwijs,vmbo/mavo,havo/vwo,mbo-1/mbo-2,mbo-3,mbo-4,hbo,universitair,other",
            "rules" => ['required'],
        ]);
        QuestionFactory::new()->create([
            "question" => "Wat is je dagelijkse bezigheid?",
            "slug" => "dagelijkse-bezigheid",
            "answer_type" => "select",
            "sample_answers" => "student,werkzaam,niet werkzaam",
            "rules" => ['required'],
        ]);
        QuestionFactory::new()->create([
            "question" => "Indien student. Welke opleidingsniveau volg jij nu?",
            "slug" => "welke-opleidingsniveau-volg-jij-nu",
            "answer_type" => "select",
            "sample_answers" => "vmbo/mavo,havo/vwo,mbo-1/mbo-2,mbo-3,mbo-4,hbo,universitair,other",
            "rules" => ['nullable', 'required_if:dagelijkse-bezigheid,student'],
        ]);
        QuestionFactory::new()->create([
            "question" => "Indien student. Wat voor studierichting volg jij daar?",
            "slug" => "studierichting-volg-jij-daar",
            "answer_type" => "text",
            "rules" => ['nullable', 'required_if:dagelijkse-bezigheid,student', 'string', 'max:255'],
        ]);
        QuestionFactory::new()->create([
            "question" => "Indien werkzaam. Werk je fulltime of parttime?",
            "slug" => "fulltime-of-parttime",
            "answer_type" => "select",
            "sample_answers" => "fulltime,parttime",
            "rules" => ['nullable', 'required_if:dagelijkse-bezigheid,werkzaam'],
        ]);
        QuestionFactory::new()->create([
            "question" => "Indien werkzaam. Ben je in loondienst of ben je een zelfstandig ondernemer?",
            "slug" => "loondienst-of-zelfstandig-ondernemer",
            "answer_type" => "select",
            "sample_answers" => "loondienst,zelfstandig ondernemer,Other",
            "rules" => ['nullable', 'required_if:dagelijkse-bezigheid,werkzaam'],
        ]);
        QuestionFactory::new()->create([
            "question" => "Indien werkzaam. In welke functie?",
            "slug" => "werkzaam-functie",
            "answer_type" => "text",
            "rules" => ['nullable', 'required_if:dagelijkse-bezigheid,werkzaam', 'string', 'max:255'],
        ]);
        QuestionFactory::new()->create([
            "question" => "Indien werkzaam. In welke branche?",
            "slug" => "werkzaam-branche",
            "answer_type" => "text",
            "rules" => ['nullable', 'required_if:dagelijkse-bezigheid,werkzaam', 'string', 'max:255'],
        ]);
        QuestionFactory::new()->create([
            "question" => "Indien werkzaam. Ontvang jij een (aanvullende uitkering)?",
            "slug" => "aanvullende-uitkering",
            "answer_type" => "checkbox",
            "rules" => ['nullable'],
        ]);
        QuestionFactory::new()->create([
            "question" => "Indien niet werkzaam. Heb je een uitkering?",
            "slug" => "niet-werkzaam-uitkering",
            "answer_type" => "checkbox",
            "rules" => ['nullable'],
        ]);
        QuestionFactory::new()->create([
            "question" => "Indien uitkering. welke uitkering?",
            "slug" => "niet-werkzaam-welke-uitkering",
            "answer_type" => "select",
            "sample_answers" => "Werkeloosheidsuitkering (WW),Bijstandsuitkering,WAO / WIA / Wajong,AOW,Other",
            "rules" => ['nullable', 'required_if:niet-werkzaam-uitkering,on'],
        ]);
        QuestionFactory::new()->create([
            "question" => "Heb je wel eens eerder meegedaan aan een marktonderzoek",
            "slug" => "eerder-meegedaan-aan-een-marktonderzoek",
            "answer_type" => "checkbox",
            "rules" => ['nullable'],
        ]);
        QuestionFactory::new()->create([
            "question" => "Zo ja wanneer heb je voor het laatst meegedaan aan een maktonderzoek?",
            "slug" => "voor-het-laatst-meegedaan-aan-een-maktonderzoek",
            "answer_type" => "select",
            "sample_answers" => "korter dan 6 maanden geleden,langer dan 6 maanden geleden",
            "rules" => ['nullable', 'required_if:voor-het-laatst-meegedaan-aan-een-maktonderzoek,on'],
        ]);
        QuestionFactory::new()->create([
            "question" => "Hoe bent u bij ons bureau terechtgekomen",
            "slug" => "bij-ons-bureau-terechtgekomen",
            "answer_type" => "select",
            "sample_answers" => "Via google/zoekmachine,Via onze website,Via een bekende die al ingeschreven staat,Via onze promotie dame,Via advertentie kaartje,Other",
            "rules" => ['required'],
        ]);
        QuestionFactory::new()->create([
            "question" => "Altijd leuk te weten de naam van diegene die jou heeft voorgedragen",
            "slug" => "naam-van-voorgedragen-persoon",
            "answer_type" => "text",
            "rules" => ['nullable', 'required_if:bij-ons-bureau-terechtgekomen,Via een bekende die al ingeschreven staat', 'string', 'max:255'],
        ]);
        QuestionFactory::new()->create([
            "question" => "Ik ga akkoord met het Privacy Statement van Selectiebureau Profiel?",
            "slug" => "Privacy-Statement",
            "answer_type" => "checkbox",
            "rules" => ['required'],
            'searchable' => false,
        ]);
        QuestionFactory::new()->create([
            "question" => "Wat is je land van herkomst?",
            "slug" => "land-van-herkomst",
            "answer_type" => "text",
            "rules" => ['required', 'string', 'max:255'],
            'visible' => false,
        ]);
        QuestionFactory::new()->create([
            "question" => "Sigaret?",
            "slug" => "sigaret",
            "answer_type" => "checkbox",
            "rules" => ['nullable'],
            'visible' => false,
            'searchable' => false,
        ]);
        QuestionFactory::new()->create([
            "question" => "Roken Merk?",
            "slug" => "roken-merk",
            "answer_type" => "text",
            "rules" => ['required', 'string', 'max:255'],
            'visible' => false,
            'searchable' => false,
        ]);
        QuestionFactory::new()->create([
            "question" => "Shag?",
            "slug" => "shag",
            "answer_type" => "checkbox",
            "rules" => ['nullable'],
            'visible' => false,
            'searchable' => false,
        ]);
        QuestionFactory::new()->create([
            "question" => "Shag merk?",
            "slug" => "shag-merk",
            "answer_type" => "text",
            "rules" => ['required', 'string', 'max:255'],
            'visible' => false,
            'searchable' => false,
        ]);
        QuestionFactory::new()->create([
            "question" => "Sigaar?",
            "slug" => "sigaar",
            "answer_type" => "checkbox",
            "rules" => ['nullable'],
            'visible' => false,
            'searchable' => false,
        ]);
        QuestionFactory::new()->create([
            "question" => "Sigaar Merk?",
            "slug" => "sigaar-merk",
            "answer_type" => "text",
            "rules" => ['required', 'string', 'max:255'],
            'visible' => false,
            'searchable' => false,
        ]);
        QuestionFactory::new()->create([
            "question" => "Roken Soort?",
            "slug" => "roken-soort",
            "answer_type" => "text",
            "rules" => ['required', 'string', 'max:255'],
            'visible' => false,
            'searchable' => false,
        ]);
        QuestionFactory::new()->create([
            "question" => "Welk huisdier heb je?",
            "slug" => "huisdier",
            "answer_type" => "text",
            "rules" => ['required', 'string', 'max:255'],
            'visible' => false,
            'searchable' => false,
        ]);
        QuestionFactory::new()->create([
            "question" => "Welke auto heb je?",
            "slug" => "auto",
            "answer_type" => "text",
            "rules" => ['required', 'string', 'max:255'],
            'visible' => false,
            'searchable' => false,
        ]);
        QuestionFactory::new()->create([
            "question" => "Vaatwasser?",
            "slug" => "vaatwasser",
            "answer_type" => "checkbox",
            "rules" => ['nullable'],
            'visible' => false,
            'searchable' => false,
        ]);
        QuestionFactory::new()->create([
            "question" => "Wat is je gezinssamenstelling?",
            "slug" => "gezinssamenstelling",
            "answer_type" => "text",
            "rules" => ['required', 'string', 'max:255'],
            'visible' => false,
        ]);
        QuestionFactory::new()->create([
            "question" => "Wat is je burgelijkestaat?",
            "slug" => "burgelijkestaat",
            "answer_type" => "text",
            "rules" => ['required', 'string', 'max:255'],
            'visible' => false,
        ]);
    }
}
