<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;
class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [

            [
                'config_key' => 'facbook',
                'config_value' => 'www.facebok.com'
            ],

            [
                'config_key' => 'twiter',
                'config_value' => 'www.twiter.com'
            ],

            [
                'config_key' => 'pinterest',
                'config_value' => 'www.pinterest.com'
            ],

            [
                'config_key' => 'instagram',
                'config_value' => 'www.instagram.com'
            ],
            [
                'config_key' => 'email',
                'config_value' => 'admin@gmail.com'
            ],

            [
                'config_key' => 'address',
                'config_value' => '195 E Parker Square Dr, Parker, CO 801'
            ],
            [
                'config_key' => 'phone',
                'config_value' => '0935571938'
            ],

        ];

        foreach ($settings as $item) {
            Setting::create($item);
        }

    }
}
