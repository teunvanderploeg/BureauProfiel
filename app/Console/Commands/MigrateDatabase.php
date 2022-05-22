<?php

namespace App\Console\Commands;

use App\Models\Answer;
use App\Models\Question;
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
     * @return int|void
     */
    public function handle()
    {
        $json = File::get('database/data/ProfielTestDatabase.json');
        $this->jsonDatabase = json_decode($json);

        foreach ($this->jsonDatabase as $tabel){
            if ($tabel->name == 'Respondenten'){
                foreach ($tabel->data as $data){

                    $email = $data[26];
                    if(empty($email)) return;

                    $this->respondent = Respondent::query()->create([
                        'email' => $email,
                        'notes' => $info = $data[15],
                        'accepted' => true,
                    ]);

                    $this->makeAnswer('voornaam', $voornaam = $data[1]);
                    $this->makeAnswer('achternaam', $achternaam = $data[2]);
                    $this->makeAnswer('adres', $adres = $data[3]);
                    $this->makeAnswer('postcode', $postcode = $data[4]);
                    $this->makeAnswer('woonplaats', $plaats = $data[5]);
                    $this->makeAnswer('telefoonnummer', $telefoonPrive = $data[6] ?? $telefoonMobiel = $data[25] ?? $telefoonWerk = $data[7]);
                    $this->makeAnswer('email', $email);
                    $this->makeAnswer('geslacht', $geslacht = $data[8]);
                    $this->makeAnswer('geboortedatum', $geboorteDatum = $data[9]);
                    $this->makeAnswer('thuiswonende-kinderen', isset($data[14]));
                    $this->makeAnswer('geboortedatum-kind-1', $this->getChild($data[0], 1));
                    $this->makeAnswer('geslacht-kind-1', $this->getChild($data[0], 1, True));
                    $this->makeAnswer('geboortedatum-kind-2', $this->getChild($data[0], 2));
                    $this->makeAnswer('geslacht-kind-2', $this->getChild($data[0], 2, True));
                    $this->makeAnswer('geboortedatum-kind-3', $this->getChild($data[0], 3));
                    $this->makeAnswer('geslacht-kind-3', $this->getChild($data[0], 3, True));
                    $this->makeAnswer('geboortedatum-kind-4', $this->getChild($data[0], 4));
                    $this->makeAnswer('geslacht-kind-4', $this->getChild($data[0], 4, True));
                    $this->makeAnswer('afgeronde-opleidingsniveau', $opleiding = $data[12]);
                    $this->makeAnswer('Privacy-Statement', True);
                    $this->makeAnswer('land-van-herkomst', $landVanHerkomst = $data[28]);
                    $this->makeAnswer('roken-soort', $sigaret = $data[18]);
                    $this->makeAnswer('roken-merk', $rokenMerk = $data[19]);
                    $this->makeAnswer('shag', $shag = $data[20]);
                    $this->makeAnswer('shag-merk', $shagMerk = $data[21]);
                    $this->makeAnswer('sigaar', $sigaar = $data[22]);
                    $this->makeAnswer('sigaar-merk', $sigaarMerk = $data[23]);
                    $this->makeAnswer('sigaret', $rokenSoort = $data[24]);
                    $this->makeAnswer('werkzaam-functie', $beroep = $data[11]);
                    $this->makeAnswer('huisdier', $huisdieren = $data[16]);
                    $this->makeAnswer('auto', $auto = $data[17]);
                    $this->makeAnswer('vaatwasser', $vaatwasser = $data[27]);
                    $this->makeAnswer('gezinssamenstelling', $gezinssamenstelling = $data[13]);
                    $this->makeAnswer('burgelijkestaat', $burgelijkestaat = $data[10]);
                }
            }
        }
    }

    public function makeAnswer($questionSlug, $answer)
    {
        Answer::query()->create([
            'respondent_id' => $this->respondent->id,
            'question_id' => Question::query()->where('slug', '=', $questionSlug)->first('id')->id,
            'answer' => $answer,
        ]);
    }

    public function getChild($respondentId, $child, $gender = False)
    {
        $childCount = 0;
        foreach ($this->jsonDatabase as $tabel){
            if ($tabel->name == 'Kinderen'){
                foreach ($tabel->data as $data){
                    if($data[0] == $respondentId){
                        $childCount++;
                        if ($childCount == $child){
                            if ($gender){
                                return $data[4];
                            }
                            return $data[3];
                        }
                    }
                }
            }
        }
        return null;
    }
}
