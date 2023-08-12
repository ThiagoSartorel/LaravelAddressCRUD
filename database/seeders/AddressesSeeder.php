<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Address;

class AddressesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Address::create([
            'street' => 'Dom Pedro II',
            'number' => '3210',
            'city' => 'Lages',
            'state' => 'SC',
            'postal_code' => '88503-100',
        ]);
        Address::create([
            'street' => 'João Gualberto da Silva',
            'number' => '50',
            'city' => 'Lages',
            'state' => 'SC',
            'postal_code' => '88501-005',
        ]);
    }
}
