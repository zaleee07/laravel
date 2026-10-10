<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'Administrator', 'password' => Hash::make('password'), 'role' => 'admin']
        );

        $electronics = Category::firstOrCreate(['name' => 'Elektronik'], ['description' => 'Perangkat elektronik']);
        $accessories = Category::firstOrCreate(['name' => 'Aksesori'], ['description' => 'Aksesori dan perlengkapan']);

        $supplier = Supplier::firstOrCreate(['name' => 'Supplier Umum'], ['contact_person' => 'Bagian Penjualan', 'phone' => '-']);

        $keyboard = Product::firstOrCreate(['sku' => 'ELK-001'], [
            'category_id' => $electronics->id, 'name' => 'Keyboard USB', 'price' => 125000, 'stock' => 10, 'minimum_stock' => 3
        ]);
        $pad = Product::firstOrCreate(['sku' => 'AKS-001'], [
            'category_id' => $accessories->id, 'name' => 'Mouse Pad', 'price' => 25000, 'stock' => 20, 'minimum_stock' => 5
        ]);

        $keyboard->suppliers()->syncWithoutDetaching([$supplier->id => ['supplier_price' => 90000]]);
        $pad->suppliers()->syncWithoutDetaching([$supplier->id => ['supplier_price' => 15000]]);
    }
}
