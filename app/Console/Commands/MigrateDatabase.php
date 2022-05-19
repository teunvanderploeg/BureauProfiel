<?php

namespace App\Console\Commands;

use App\Models\Answer;
use App\Models\Respondent;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MigrateDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrates the old database to the nieuwe. Put your json file in here (database/data/ProfielDatabase.json)';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $json = File::get('database/data/ProfielTestDatabase.json');
        $this->jsonDatabase = json_decode($json);

        foreach ($this->jsonDatabase as $tabel){
            if ($tabel->name == 'Respondenten'){
                foreach ($tabel->data as $data){
                    $voornaam = $data[1];
                    $achternaam = $data[2];
                    $adres = $data[3];
                    $postcode = $data[4];
                    $plaats = $data[5];
                    $telefoonPrive = $data[6];
                    $telefoonWerk = $data[7];
                    $geslacht = $data[8];
                    $geboorteDatum = $data[9];
                    $burgelijkestaat = $data[10];
                    $beroep = $data[11];
                    $opleiding = $data[12];
                    $gezinssamenstelling = $data[13];
                    $kinderen = $data[14]; // maak een function die de kinderen pakt
                    $info = $data[15];
                    $huisdieren = $data[16];
                    $auto = $data[17];
                    $sigaret = $data[18];
                    $rokenMerk = $data[19];
                    $shag = $data[20];
                    $shagMerk = $data[21];
                    $sigaar = $data[22];
                    $sigaarMerk = $data[23];
                    $rokenSoort = $data[24];
                    $telefoonMobiel = $data[25];
                    $email = $data[26];
                    $vaatwasser = $data[27];
                    $landVanHerkomst = $data[28];
                    if(empty($email)){
                        return;
                    }
                    $respondent = Respondent::query()->create([
                        'email' => $email,
                        'notes' => $info,
                        'accepted' => true,
                    ]);

                    Answer::query()->create([
                        'respondent_id' => $respondent->id,
                        'question_id' => 1,
                        'answer' => $voornaam,
                    ]);
                    Answer::query()->create([
                        'respondent_id' => $respondent->id,
                        'question_id' => 2,
                        'answer' => $achternaam,
                    ]);
                    Answer::query()->create([
                        'respondent_id' => $respondent->id,
                        'question_id' => 3,
                        'answer' => $adres,
                    ]);
                    Answer::query()->create([
                        'respondent_id' => $respondent->id,
                        'question_id' => 4,
                        'answer' => $postcode,
                    ]);
                    Answer::query()->create([
                        'respondent_id' => $respondent->id,
                        'question_id' => 5,
                        'answer' => $plaats,
                    ]);
                    Answer::query()->create([
                        'respondent_id' => $respondent->id,
                        'question_id' => 6,
                        'answer' => $telefoonPrive ?? $telefoonMobiel ?? $telefoonWerk,
                    ]);
                    Answer::query()->create([
                        'respondent_id' => $respondent->id,
                        'question_id' => 7,
                        'answer' => $email,
                    ]);
                    Answer::query()->create([
                        'respondent_id' => $respondent->id,
                        'question_id' => 8,
                        'answer' => $geslacht,
                    ]);
                    Answer::query()->create([
                        'respondent_id' => $respondent->id,
                        'question_id' => 9,
                        'answer' => $geboorteDatum,
                    ]);
                    Answer::query()->create([
                        'respondent_id' => $respondent->id,
                        'question_id' => 11,
                        'answer' => isset($kinderen),
                    ]);
                    Answer::query()->create([
                        'respondent_id' => $respondent->id,
                        'question_id' => 12,
                        'answer' => $this->getChildDate($data[0], ),
                    ]);
                    Answer::query()->create([
                        'respondent_id' => $respondent->id,
                        'question_id' => 16,
                        'answer' => $opleiding,
                    ]);
                    Answer::query()->create([
                        'respondent_id' => $respondent->id,
                        'question_id' => 31,
                        'answer' => true,
                    ]);
                    Answer::query()->create([
                        'respondent_id' => $respondent->id,
                        'question_id' => 32,
                        'answer' => $landVanHerkomst,
                    ]);
                    Answer::query()->create([
                        'respondent_id' => $respondent->id,
                        'question_id' => 33,
                        'answer' => $sigaret,
                    ]);
                    Answer::query()->create([
                        'respondent_id' => $respondent->id,
                        'question_id' => 34,
                        'answer' => $rokenMerk,
                    ]);
                    Answer::query()->create([
                        'respondent_id' => $respondent->id,
                        'question_id' => 35,
                        'answer' => $shag,
                    ]);
                    Answer::query()->create([
                        'respondent_id' => $respondent->id,
                        'question_id' => 36,
                        'answer' => $shagMerk,
                    ]);
                    Answer::query()->create([
                        'respondent_id' => $respondent->id,
                        'question_id' => 37,
                        'answer' => $sigaar,
                    ]);
                    Answer::query()->create([
                        'respondent_id' => $respondent->id,
                        'question_id' => 38,
                        'answer' => $sigaarMerk,
                    ]);
                    Answer::query()->create([
                        'respondent_id' => $respondent->id,
                        'question_id' => 39,
                        'answer' => $rokenSoort,
                    ]);
                    Answer::query()->create([
                        'respondent_id' => $respondent->id,
                        'question_id' => 22,
                        'answer' => $beroep,
                    ]);
                    Answer::query()->create([
                        'respondent_id' => $respondent->id,
                        'question_id' => 40,
                        'answer' => $huisdieren,
                    ]);
                    Answer::query()->create([
                        'respondent_id' => $respondent->id,
                        'question_id' => 41,
                        'answer' => $auto,
                    ]);
                    Answer::query()->create([
                        'respondent_id' => $respondent->id,
                        'question_id' => 42,
                        'answer' => $vaatwasser,
                    ]);
                    Answer::query()->create([
                        'respondent_id' => $respondent->id,
                        'question_id' => 43,
                        'answer' => $gezinssamenstelling,
                    ]);
                    Answer::query()->create([
                        'respondent_id' => $respondent->id,
                        'question_id' => 44,
                        'answer' => $burgelijkestaat,
                    ]);
                }
            }
        }
    }

    public function getChildDate($respondentId)
    {
        foreach ($this->jsonDatabase as $tabel){
            if ($tabel->name == 'Kinderen'){
                foreach ($tabel->data as $data){
                    if($data[1] == $respondentId){
                        return $data[3];
                    }
                }
            }
        }
    }
}
