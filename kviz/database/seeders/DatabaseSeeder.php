<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Kerdes;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $kerdesek = [
            [
                "id" => 1,
                "kerdes" => "Melyik élelmiszer tartalmazza a legtöbb kalciumot?",
                "valaszok" => ["Tej", "Sör", "Keksz", "Chips"],
                "joSorszam" => 0
            ],
            [
                "id" => 2,
                "kerdes" => "Melyik életmódbeli tényező járulhat hozzá a szívbetegségek kialakulásához?",
                "valaszok" => ["Rendszeres testmozgás", "Egészséges étrend", "Dohányzás", "Sok vízivás"],
                "joSorszam" => 2
            ],
            [
                "id" => 3,
                "kerdes" => "Melyik élelmiszer tartalmazza a legtöbb C-vitamint?",
                "valaszok" => ["Alma", "Sárgarépa", "Narancs", "Banán"],
                "joSorszam" => 2
            ],
            [
                "id" => 4,
                "kerdes" => "Melyik vitamin hiányában alakulhat ki csontritkulás?",
                "valaszok" => ["A-vitamin", "B-vitamin", "C-vitamin", "D-vitamin"],
                "joSorszam" => 3
            ],
            [
                "id" => 5,
                "kerdes" => "Melyik élelmiszer segíti a jobb emésztést és bélmozgást?",
                "valaszok" => ["Sült krumpli", "Csokoládé", "Zöldségek és gyümölcsök", "Chips"],
                "joSorszam" => 2
            ],
            [
                "id" => 6,
                "kerdes" => "Melyik szokás segíti a stressz csökkentését és az egészséges alvást?",
                "valaszok" => ["Sok édesség evése", "Relaxációs gyakorlatok", "Mobiltelefon használata lefekvés előtt", "Kávéfogyasztás"],
                "joSorszam" => 1
            ]
        ];
        foreach ($kerdesek as $kerdes) {
            Kerdes::create($kerdes);
        }
    }
}
