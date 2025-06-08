<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductDB;
use App\Models\ProductTypeDB;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'product_name' => 'Canon EOS 5D Mark IV',
                'description' => 'Full-frame DSLR camera with 30.4MP sensor',
                'category' => 'KAMERA',
                'brand' => 'CANON',
                'type' => 'DSLR',
                'price' => 25000000,
                'rental_price' => 500000,
                'status' => 'Good'
            ],
            [
                'product_name' => 'Sony Alpha A7 III',
                'description' => 'Full-frame mirrorless camera with 24.2MP sensor',
                'category' => 'KAMERA',
                'brand' => 'SONY',
                'type' => 'MIRRORLESS',
                'price' => 28000000,
                'rental_price' => 550000,
                'status' => 'Good'
            ],
            [
                'product_name' => 'Canon EF 70-200mm f/2.8L IS III',
                'description' => 'Professional telephoto zoom lens',
                'category' => 'LENSA',
                'brand' => 'CANON',
                'type' => 'TELEPHOTO',
                'price' => 18000000,
                'rental_price' => 350000,
                'status' => 'Good'
            ],
            [
                'product_name' => 'Godox SL-60W',
                'description' => '60W LED video light',
                'category' => 'LIGHTING',
                'brand' => 'GODOX',
                'type' => 'STUDIO',
                'price' => 2500000,
                'rental_price' => 50000,
                'status' => 'Good'
            ],
        ];

        foreach ($products as $product) {
            $productType = ProductTypeDB::where('category', $product['category'])
                ->where('brand', $product['brand'])
                ->where('type', $product['type'])
                ->first();

            $totalType = ProductDB::where('category', $product['category'])
                ->where('brand', $product['brand'])
                ->where('type', $product['type'])
                ->count();

            $code = $productType ? $productType->code . str_pad($totalType + 1, 6, '0', STR_PAD_LEFT) : 'UNKNOWN' . str_pad($totalType + 1, 6, '0', STR_PAD_LEFT);

            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';
            for ($i = 0; $i < 100; $i++) {
                $randomString .= $characters[rand(0, strlen($characters) - 1)];
            }

            ProductDB::create([
                'product_name' => $product['product_name'],
                'description' => $product['description'],
                'category' => $product['category'],
                'brand' => $product['brand'],
                'type' => $product['type'],
                'product_code' => $code,
                'code' => $code,
                'payment_date' => Carbon::now(),
                'price' => $product['price'],
                'purchase_price' => $product['price'],
                'rental_price' => $product['rental_price'],
                'status' => $product['status'],
                'qr_string' => $randomString,
                'is_available' => 1,
                'created_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
