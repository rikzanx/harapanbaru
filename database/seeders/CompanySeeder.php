<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Company::create([
                'name'    => "UD Harapan Baru",
                'about'    => "Kami adalah perusahaan yang bergerak di bidang valve, fitting. Melayani pemesanan valve dan jasa service / reparasi, pemasangan, instalasi pipa hydrant.",
                'address' => "Jl, Songoyudan I No.27D, Kota SBY, Jawa Timur 60162",
                'telp' => "+6285101440330",
                'email' => "udharapan.teknik@gmail.com",
                'image_company' => "img/imagecompany.jpg",
                'lat' => "-7.2367248",
                'lng' => "112.7422357"
        ]);
    }
}
