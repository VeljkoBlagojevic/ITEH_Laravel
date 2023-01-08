<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\BodyType;
use Illuminate\Database\Seeder;
use App\Models\Guitar;
use App\Models\Manufacturer;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        User::truncate();
        Manufacturer::truncate();
        BodyType::truncate();
        Guitar::truncate();

        User::factory(10)->create();

        Manufacturer::insert([
            [
                "name" => "Epiphone",
                "city" => "Sparta",
                "CEO" => "Jim Rosenberg"
            ],
            [
                "name" => "LTD",
                "city" => "Tokyo",
                "CEO" => "Masanori Yamada"
            ]
        ]);

        BodyType::insert([
            [
                "name" => "Les Paul",
                "number_of_strings" => 6,
                "is_electric" => true,
                "orientation" => "right-handed"
            ],
            [
                "name" => "SG",
                "number_of_strings" => 6,
                "is_electric" => true,
                "orientation" => "right-handed"
            ]
        ]);


        $guitar_1 = new Guitar;
        $guitar_1->model_name = "Prophecy";
        $guitar_1->color = "Midnight Ebony Black";
        $guitar_1->description = "This Les Paul Prophecy Custom EX Electric Guitar deploys an EMG-81 humbucker in the bridge position for great attack and sustain and an EMG-85 humbucker at the neck for fat, great-sounding rhythm. Lavish features on the Prophecy EX Les Paul guitar include a highly figured quilt maple top, pearl inlay knobs, strap locks, graphite nut, Grover tuners, a bound ebony fingerboard, unique blade inlay, and a deep, rich midnight ebony finish. The mahogany set neck and 24-fret ebony fingerboard provide a playground two full octaves in length. The LockTone Tune-O-Matic bridge and stopbar tailpiece add more sustain and make string changing easier.";
        $guitar_1->price = "86421";
        $guitar_1->fingerboard = "Ebony";
        $guitar_1->manufacturer_id = 1;
        $guitar_1->body_type_id = 1;
        $guitar_1->save();

        Guitar::create([
            "model_name" => "VIPER-300FM",
            "color" => "Black",
            "description" => "LTD Viper-300FM električna gitara ima fantastičan osećaj sa dva useka u telu i tankom U konturom vrata koja omogućava izvanredan pristup celom freatboard-u.  Super odsečene ivice doprinose modernom izgledu. Mahogany telo i flamed maple top, u kombinaciji sa EMG 81 (bridge) i EMG85 (neck) pickup-ima dobijate napadniji zvuk, savršen za rok. Skala od 24-3/4 incha, zajedno sa tankim vratom čini sviranje ove sekire prostim kao pasulj. Druge odlike su crni, niklovani hardver, 42mm standardni navrtanj, ESP čivije, tune-o-matic most i tailpiece, pickup selektor i volume i tone potenciometri.",
            "price" => "82084",
            "fingerboard" => "Rosewood",
            "manufacturer_id" => 2,
            "body_type_id" => 2
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
