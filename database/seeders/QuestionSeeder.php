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
            "slug" => 'voornaam',
            "answer_type" => 'text',
        ]);
        QuestionFactory::new()->create([
            "question" => "Wat is je achternaam?",
            "slug" => 'achternaam',
            "answer_type" => 'text',
        ]);
        QuestionFactory::new()->create([
            "question" => "Wat is je adres?",
            "slug" => 'adres',
            "answer_type" => 'text',
        ]);
        QuestionFactory::new()->create([
            "question" => "Wat is je postcode?",
            "slug" => 'postcode',
            "answer_type" => 'text',
        ]);
        QuestionFactory::new()->create([
            "question" => "Wat is je woonplaats?",
            "slug" => 'woonplaats',
            "answer_type" => 'text',
        ]);
        QuestionFactory::new()->create([
            "question" => "Wat is je telefoonnummer?",
            "slug" => 'telefoonnummer',
            "answer_type" => 'text',
        ]);
        QuestionFactory::new()->create([
            "question" => "Wat is je e-mailadres?",
            "slug" => 'email',
            "answer_type" => 'text',
        ]);
        QuestionFactory::new()->create([
            "question" => "Wat is je geslacht?",
            "slug" => 'geslacht',
            "answer_type" => 'select',
            "sample_answers" => 'Man,Vrouw',
        ]);
        QuestionFactory::new()->create([
            "question" => "Wat is je geboortedatum?",
            "slug" => 'geboortedatum',
            "answer_type" => 'date',
        ]);
        QuestionFactory::new()->create([
            "question" => "Wat is je woonsituatie?",
            "slug" => 'woonsituatie',
            "answer_type" => 'select',
            "sample_answers" => 'Alleenstaand,Samenwonend,Gehuwd,Inwonend bij ouders,Other',
        ]);
        QuestionFactory::new()->create([
            "question" => "Heb je thuiswonende kinderen?",
            "slug" => 'thuiswonende-kinderen',
            "answer_type" => 'checkbox',
        ]);
        QuestionFactory::new()->create([
            "question" => "Hoogst genoten afgeronde opleidingsniveau?",
            "slug" => 'afgeronde-opleidingsniveau',
            "answer_type" => 'select',
            "sample_answers" => 'geen,basisonderwijs,vmbo/mavo,havo/vwo,mbo-1/mbo-2,mbo-3,mbo-4,hbo,universitair,other',
        ]);
        QuestionFactory::new()->create([
            "question" => "Wat is je dagelijkse bezigheid?",
            "slug" => 'dagelijkse-bezigheid',
            "answer_type" => 'select',
            "sample_answers" => 'student,werkzaam,niet werkzaam',
        ]);
        QuestionFactory::new()->create([
            "question" => "Indien student. Welke opleidingsniveau volg jij nu?",
            "slug" => 'welke-opleidingsniveau-volg-jij-nu',
            "answer_type" => 'select',
            "sample_answers" => 'vmbo/mavo,havo/vwo,mbo-1/mbo-2,mbo-3,mbo-4,hbo,universitair,other',
        ]);
        QuestionFactory::new()->create([
            "question" => "Indien student. Wat voor studierichting volg jij daar?",
            "slug" => 'studierichting-volg-jij-daar',
            "answer_type" => 'text',
        ]);
        QuestionFactory::new()->create([
            "question" => "Indien werkzaam. Werk je fulltime of parttime?",
            "slug" => 'fulltime-of-parttime',
            "answer_type" => 'select',
            "sample_answers" => 'fulltime,parttime',
        ]);
        QuestionFactory::new()->create([
            "question" => "Indien werkzaam. Ben je in loondienst of ben je een zelfstandig ondernemer?",
            "slug" => 'loondienst-of-zelfstandig-ondernemer',
            "answer_type" => 'select',
            "sample_answers" => 'loondienst,zelfstandig ondernemer,Other',
        ]);
        QuestionFactory::new()->create([
            "question" => "Indien werkzaam. In welke functie?",
            "slug" => 'werkzaam-functie',
            "answer_type" => 'text',
        ]);
        QuestionFactory::new()->create([
            "question" => "Indien werkzaam. In welke branche?",
            "slug" => 'werkzaam-branche',
            "answer_type" => 'text',
        ]);
        QuestionFactory::new()->create([
            "question" => "Indien werkzaam. Ontvang jij een (aanvullende uitkering)?",
            "slug" => 'aanvullende-uitkering',
            "answer_type" => 'checkbox',
        ]);
        QuestionFactory::new()->create([
            "question" => "Indien niet werkzaam. Heb je een uitkering?",
            "slug" => 'niet-werkzaam-uitkering',
            "answer_type" => 'checkbox',
        ]);
        QuestionFactory::new()->create([
            "question" => "Indien uitkering. welke uitkering?",
            "slug" => 'niet-werkzaam-welke-uitkering',
            "answer_type" => 'select',
            "sample_answers" => 'Werkeloosheidsuitkering (WW),Bijstandsuitkering,WAO / WIA / Wajong,AOW,Other',
        ]);
        QuestionFactory::new()->create([
            "question" => "Heb je wel eens eerder meegedaan aan een marktonderzoek",
            "slug" => 'eerder-meegedaan-aan-een-marktonderzoek',
            "answer_type" => 'checkbox',
        ]);
        QuestionFactory::new()->create([
            "question" => "Zo ja wanneer heb je voor het laatst meegedaan aan een maktonderzoek?",
            "slug" => 'voor-het-laatst-meegedaan-aan-een-maktonderzoek',
            "answer_type" => 'select',
            "sample_answers" => 'korter dan 6 maanden geleden,langer dan 6 maanden geleden',
        ]);
        QuestionFactory::new()->create([
            "question" => "Hoe bent u bij ons bureau terechtgekomen",
            "slug" => 'bij-ons-bureau-terechtgekomen',
            "answer_type" => 'select',
            "sample_answers" => 'Via google/zoekmachine,Via onze website,Via een bekende die al ingeschreven staat,Via onze promotie dame,Via advertentie kaartje,Other',
        ]);
        QuestionFactory::new()->create([
            "question" => "Altijd leuk te weten de naam van diegene die jou heeft voorgedragen",
            "slug" => 'naam-van-voorgedragen-persoon',
            "answer_type" => 'text',
        ]);
        QuestionFactory::new()->create([
            "question" => "Ik ga akkoord met het Privacy Statement van Selectiebureau Profiel?",
            "slug" => 'Privacy-Statement',
            "answer_type" => 'checkbox',
        ]);
    }
}
