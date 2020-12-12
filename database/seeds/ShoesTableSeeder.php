<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShoesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shoes')->insert([
            [
                'name' => 'Uno - Eye Catching',
                'description' => "Enjoy a study in contrasts with easy to wear comfort in the SKECHER Street Uno - Eye Catching shoe. Layered synthetic and jersey fabric upper in a lace up classic fashion sneaker with stitching accents. Air-Cooled Memory Foam insole, visible air cushioned midsole.",
                'price' => 1059000,
                'image' => 'Uno - Eye Catching.jpg',
            ],
            [
                'name' => 'Windom - Pretty Winter',
                'description' => "Add some colorful style to your cold weather gear wearing the SKECHERS Windom - Pretty Winter boot. Water resistant soft suede and sweater knit fabric with waterproof rubber shell upper in a lace up mid calf height cold weather casual boot with insulated design and Warm Tech Memory Foam insole.",
                'price' => 1270000,
                'image' => 'Windom - Pretty Winter.jpg',
            ],
            [
                'name' => "LeBron 17 'Graffiti'",
                'description' => "Taking cues from one of the most coveted LeBron 4 colourways, the LeBron 17 'Grafﬁti' pushes the boundaries of both past and present by combining elements from both signature shoes. The LeBron 17's integrated tech—overlaid with a freestyle interpretation of LeBron's personal values in the LeBron 4's recognisable grafﬁti style—draws inspiration from the rhythm, art and culture of New York City's streets, with lettering inspired by the iconography of the Big Apple.",
                'price' => 3109000,
                'image' => "LeBron 17 'Graffiti'.jpg",
            ],
            [
                'name' => 'PG 4 EP',
                'description' => "Paul George is the rare high-percentage shooter who's also a coach's dream on D. Designed for his unrivalled 2-way game, the PG 4 EP unveils a new cushioning system that's lightweight, articulated and responsive, ideal for players like PG who go hard every play.",
                'price' => 1649000,
                'image' => 'PG 4 EP.jpg',
            ],
            [
                'name' => 'Fresh Foam 1080v10',
                'description' => "The Fresh Foam 1080v10 features a supportive Hypoknit upper with underfoot comfort that was engineered using runner data. Delivering a fierce combination of softness and energetic rebound, our refined precision-driven Fresh Foam midsole unit protects and defends the honor of every step. Data-to-design technology drives the underfoot performance needed to push towards a better you.",
                'price' => 3514000,
                'image' => 'Fresh Foam 1080v10.jpg',
            ],
            [
                'name' => "Calibrate Restored Winterized Men's Sneakers",
                'description' => "A scientific advancement by human and machine: calculated cushioning by PUMA. Calibrate Runner is powered by XETIC technology and coded in a language of its own—with meticulously-tested cushioning, conceived and fine-tuned in a lab for the techiest streetwear collectors. Calibrate Restored Winterized updates the style with winter-ready materials and XETIC tech for instant step-in cushioning and infinite comfort.",
                'price' => 1976000,
                'image' => "Calibrate Restored Winterized Men's Sneakers.jpg",
            ],
            [
                'name' => 'Converse x Bugs Bunny Chuck Taylor All Star',
                'description' => "Celebrating 80 years of your favorite cartoon trickster, Converse X Bugs Bunny incorporates all the mischief and mayhem of Bugs into one playful collection for fans of all ages.",
                'price' => 635000,
                'image' => 'Converse x Bugs Bunny Chuck Taylor All Star.jpg',
            ],
        ]);
    }
}
