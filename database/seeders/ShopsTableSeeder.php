<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Actions\CreateSlugAction;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(CreateSlugAction $slugAction): void
    {
        $data = [
            [
                'name' => 'Формула М2',
                'url' => 'https://formulam2.ru',
                'logo' => 'logos/formulam2-logo.webp'
            ],

            [
                'name' => 'Арсенал',
                'url' => 'https://sdl-arsenal.ru',
                'logo' => 'logos/arsenal-logo.webp'
            ],

            [
                'name' => 'Металлхозторг',
                'url' => 'http://www.mxt22.ru/',
                'logo' => 'logos/mxt22-logo.webp'
            ]
        ];

        foreach ($data as $shop)
            DB::table('shops')->insert([
                'name' => $shop['name'],
                'slug' => $slugAction->handle($shop['name']),
                'url' => $shop['url'],
                'logo' => $shop['logo'],
                'created_at' => Carbon::now()->toDateTimeString()
            ]);
    }
}
