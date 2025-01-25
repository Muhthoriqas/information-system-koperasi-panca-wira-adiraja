<?php

namespace Database\Seeders;


use App\Models\Order;
use App\Models\Purchase;
use App\Models\User;
use App\Models\Customer;
use App\Models\Supplier;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            UnitSeeder::class,
            ProductSeeder::class
        ]);

        $orders = Order::factory(50)->create();
        $customers = Customer::factory(30)
            ->recycle($orders)
            ->create();


        $purchases = Purchase::factory(60)->create();
        $suppliers = Supplier::factory(20)->create();

        $users = User::factory(10)
            ->recycle($suppliers)
            ->recycle($purchases)
            ->create();

        $admin = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com'
        ]);
    }
}
