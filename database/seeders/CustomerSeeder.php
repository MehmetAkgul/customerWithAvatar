<?php

namespace Database\Seeders;

use App\Models\Customer;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
//    public function run()
//    {
//        Model::unguard();
//        $customers = app('db')->table('customers');
//        for ($i = 0; $i < 1000; $i++) {
//            $data[] = [
//                    'name' => \Illuminate\Support\Str::random(5),
//                    'email' => \Illuminate\Support\Str::random(5) . "@gmail.com",
//                    'password' => Hash::make("password"),
//                    'avatar' => asset("assets/customer/avatar/1.png"),
//                ];
//        }
//        $customers->insert($data);
//
//
//    }
    public function run(Faker $faker)
    {
        ini_set('memory_limit', '512M');//allocate memory
        DB::disableQueryLog();//disable log
        $data = [];

        for ($i = 0; $i < 1000; $i++) {
            $data[] = [
                'title' => $faker->title,
                'name' => $faker->name,
                'email' => $faker->email(),
                'password' => Hash::make("password"),
                'avatar' => "1.png",
                'is_subscribe' => 0,
            ];
        }

        Customer::insert($data);
    }
}
