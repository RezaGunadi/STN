<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductTypeDB;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productTypes = [
            // Kamera
            [
                'category' => 'KAMERA',
                'brand' => 'CANON',
                'type' => 'DSLR',
                'code' => 'KACADS'
            ],
            [
                'category' => 'KAMERA',
                'brand' => 'CANON',
                'type' => 'MIRRORLESS',
                'code' => 'KACAMI'
            ],
            [
                'category' => 'KAMERA',
                'brand' => 'SONY',
                'type' => 'MIRRORLESS',
                'code' => 'KASOMI'
            ],
            [
                'category' => 'KAMERA',
                'brand' => 'NIKON',
                'type' => 'DSLR',
                'code' => 'KANIDS'
            ],
            [
                'category' => 'KAMERA',
                'brand' => 'FUJIFILM',
                'type' => 'MIRRORLESS',
                'code' => 'KAFUMI'
            ],

            // Lensa
            [
                'category' => 'LENSA',
                'brand' => 'CANON',
                'type' => 'TELEPHOTO',
                'code' => 'LECATE'
            ],
            [
                'category' => 'LENSA',
                'brand' => 'CANON',
                'type' => 'WIDE',
                'code' => 'LECAWI'
            ],
            [
                'category' => 'LENSA',
                'brand' => 'SONY',
                'type' => 'TELEPHOTO',
                'code' => 'LESOTE'
            ],
            [
                'category' => 'LENSA',
                'brand' => 'SONY',
                'type' => 'WIDE',
                'code' => 'LESOWI'
            ],
            [
                'category' => 'LENSA',
                'brand' => 'TAMRON',
                'type' => 'ZOOM',
                'code' => 'LETAZO'
            ],

            // Lighting
            [
                'category' => 'LIGHTING',
                'brand' => 'GODOX',
                'type' => 'STUDIO',
                'code' => 'LIGOST'
            ],
            [
                'category' => 'LIGHTING',
                'brand' => 'GODOX',
                'type' => 'SPEEDLIGHT',
                'code' => 'LIGOSP'
            ],
            [
                'category' => 'LIGHTING',
                'brand' => 'APUTURE',
                'type' => 'LED',
                'code' => 'LIAULE'
            ],
            [
                'category' => 'LIGHTING',
                'brand' => 'PROFOTO',
                'type' => 'STUDIO',
                'code' => 'LIPRST'
            ],
            [
                'category' => 'LIGHTING',
                'brand' => 'ELINCHROM',
                'type' => 'STUDIO',
                'code' => 'LIELST'
            ],

            // Audio
            [
                'category' => 'AUDIO',
                'brand' => 'RODE',
                'type' => 'MICROPHONE',
                'code' => 'AUROMI'
            ],
            [
                'category' => 'AUDIO',
                'brand' => 'SENNHEISER',
                'type' => 'MICROPHONE',
                'code' => 'AUSEMI'
            ],
            [
                'category' => 'AUDIO',
                'brand' => 'ZOOM',
                'type' => 'RECORDER',
                'code' => 'AUZORE'
            ],
            [
                'category' => 'AUDIO',
                'brand' => 'TASCAM',
                'type' => 'RECORDER',
                'code' => 'AUTARE'
            ],
            [
                'category' => 'AUDIO',
                'brand' => 'SHURE',
                'type' => 'MICROPHONE',
                'code' => 'AUSHMI'
            ]
        ];

        foreach ($productTypes as $type) {
            ProductTypeDB::create([
                'category' => $type['category'],
                'brand' => $type['brand'],
                'type' => $type['type'],
                'code' => $type['code'],
                'created_by' => 1 // Asumsi user ID 1 adalah admin
            ]);
        }
    }
}
