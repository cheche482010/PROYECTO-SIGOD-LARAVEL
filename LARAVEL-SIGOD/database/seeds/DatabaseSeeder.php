<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() 
    {
        $this->call(ActividadesSeeder::class);

        $this->call(AreasSeeder::class);

        $this->call(AulasSeeder::class);

        $this->call(CategoriasSeeder::class);

        $this->call(ConcursosSeeder::class);

        $this->call(DedicacionesSeeder::class);

        $this->call(DependenciasSeeder::class);

        $this->call(DocentesSeeder::class);

        $this->call(Ejes_FormacionSeeder::class);

        $this->call(IngresosSeeder::class);

        $this->call(MunicipiosSeeder::class);

        $this->call(Relaciones_LaboralesSeeder::class);

        $this->call(Tipos_ActividadesSeeder::class);

        $this->call(Unidades_CurricularesSeeder::class);
    }
}
