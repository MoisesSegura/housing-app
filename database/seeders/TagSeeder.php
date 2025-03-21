<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    public function run()
    {
        $tags = ['WiFi', 'Jardín', 'Ducha', 'Aire acondicionado', 'Piscina', 'Cocina equipada','TV','aire condicionado','Calefacción','Estacionamiento','Desayuno','Jacuzzi','Gimnasio','Mascotas','Fumadores','Eventos','Niños','Accesibilidad','Vista al mar','Vista a la montaña','Vista a la ciudad','Vista al lago','Vista al río','Vista al bosque','Vista al jardín','Vista a la piscina','Vista al volcán','Vista al campo','Vista al valle','Vista al cañón','Vista al desierto','Vista al glaciar'];

        foreach ($tags as $tag) {
            Tag::create(['name' => $tag]);
        }
    }
}