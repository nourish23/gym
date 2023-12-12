<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Equipment;
use Illuminate\Support\Facades\Schema;

class EquipmentNeededSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Equipment::truncate();
        Schema::enableForeignKeyConstraints();
        $equi=[' Free Weights',' Yoga Ball','Resistance band','Step','Barbell','Mat','Yoga block','Dancing stick'];
        for($i=0;$i<count($equi);$i++){
            Equipment::create([
                'name' =>$equi[$i],
                'status' => '1'
            ]);
        }
    }
}
