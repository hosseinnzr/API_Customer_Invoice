<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{

    protected $model = Customer::class;
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Customer::factory()
            ->count(25)
            ->hasInvoices(10)
            ->create();

        Customer::factory()
            ->count(50)
            ->hasInvoices(17)
            ->create();

        Customer::factory()
            ->count(100)
            ->hasInvoices(8)
            ->create();

        Customer::factory()
            ->count(5)
            ->create();

    }
}
