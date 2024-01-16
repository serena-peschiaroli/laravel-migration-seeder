<?php

namespace Database\Seeders;

use App\Models\Train;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Carbon\Carbon;

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $stazioni= [ 'Bari C.le','Bologna Centrale','Roma Termini', 'Milano Centrale', 'Venezia S. Lucia', 'Napoli P.zza Garibaldi', 'Reggio Calabria Centrale', 'Firenze S. M. Novella'];
        for($i=0; $i <20; $i++) {
             $trains = new Train();
             $trains->azienda = $faker->randomElement(['Trenitalia', 'Italo', 'Compagnia Ferroviaria Italiana Srl', 'Trenord']);
             $trains->stazione_di_partenza = $faker->randomElement($stazioni);
             //stazione di arrivo deve essere differente da partenza
             do {
                 $trains->stazione_di_arrivo = $faker->randomElement($stazioni);
             } while ($trains->stazione_di_arrivo == $trains->stazione_di_partenza);


             //generare orario e data di partnza e arrivo usando carbon
             $partenzaDataOra = Carbon::instance($faker->dateTimeBetween('-3 days', '+3 weeks'));
             $trains->data_di_partenza = $partenzaDataOra->format('Y-m-d');
             $trains->orario_di_partenza = $partenzaDataOra->format('H:i:s');

             // calcolo arrivo 
             $arrivoDataOra = (clone $partenzaDataOra)->addHours(rand(1, 6));
             $trains->data_di_arrivo = $arrivoDataOra->format('Y-m-d');
             $trains->orario_di_arrivo = $arrivoDataOra->format('H:i:s');
             $trains->codice_treno=$faker->numberBetween(1, 1000);
             $trains->carrozze_numero = $faker->numberBetween(1, 12);
             $trains->save();


             //secondo seeder per aggiungere altri treni in data odierna
            // $trains = new Train();
            // $trains->azienda = $faker->randomElement(['Trenitalia', 'Italo', 'Compagnia Ferroviaria Italiana Srl', 'Trenord']);
            // $trains->stazione_di_partenza = $faker->randomElement($stazioni);
            // //stazione di arrivo deve essere differente da partenza
            // do {
            //     $trains->stazione_di_arrivo = $faker->randomElement($stazioni);
            // } while ($trains->stazione_di_arrivo == $trains->stazione_di_partenza);


            // //generare orario e data di partnza e arrivo usando carbon
            // $partenzaDataOra = Carbon::createFromDate(2024,01,16);
            // $trains->data_di_partenza = $partenzaDataOra->format('Y-m-d');
            // $trains->orario_di_partenza = $partenzaDataOra->format('H:i:s');

            // // calcolo arrivo 
            // $arrivoDataOra = (clone $partenzaDataOra)->addHours(rand(1, 6));
            // $trains->data_di_arrivo = $arrivoDataOra->format('Y-m-d');
            // $trains->orario_di_arrivo = $arrivoDataOra->format('H:i:s');
            // $trains->codice_treno = $faker->numberBetween(1, 1000);
            // $trains->carrozze_numero = $faker->numberBetween(1, 12);
            // $trains->save();



        }
    }
}
