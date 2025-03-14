<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        DB::table('categories')->insert([
            ['id' => 1, 'name' => 'Devlet Konservatuvarı'],
            ['id' => 2, 'name' => 'Diş Hekimliği Fakültesi'],
            ['id' => 3, 'name' => 'Eğitim Fakültesi'],
            ['id' => 4, 'name' => 'Fen Fakültesi'],
            ['id' => 5, 'name' => 'İnsani ve Sosyal Bilimler Fakültesi'],
            ['id' => 6, 'name' => 'İktisadi ve İdari Bilimler Fakültesi'],
            ['id' => 7, 'name' => 'İlahiyat Fakültesi'],
            ['id' => 8, 'name' => 'İletişim Fakültesi'],
            ['id' => 9, 'name' => 'Mimarlık Fakültesi'],
            ['id' => 10, 'name' => 'Mühendislik Fakültesi'],
            ['id' => 11, 'name' => 'Sağlık Bilimleri Fakültesi'],
            ['id' => 12, 'name' => 'Sivil Havacılık Yüksek Okulu'],
            ['id' => 13, 'name' => 'Su Ürünleri Fakültesi'],
            ['id' => 14, 'name' => 'Spor Bilimleri Fakültesi'],
            ['id' => 15, 'name' => 'Teknoloji Fakültesi '],
            ['id' => 16, 'name' => 'Teknik Eğitim Fakültesi'],
            ['id' => 17, 'name' => 'Tıp Fakültesi'],
            ['id' => 18, 'name' => 'Yabancı Diller Yüksek Okulu'],
            ['id' => 19, 'name' => 'Veterinerlik Fakültesi'],
            ['id' => 20, 'name' => 'Baskil Meslek Yüksekokulu'],
            ['id' => 21, 'name' => 'Beden Eğitimi ve Spor Yüksek Okulu'],
            ['id' => 22, 'name' => 'Eğitim Bilimleri Enstitüsü'],
            ['id' => 23, 'name' => 'Elazığ Organize Sanayi Bölgesi Meslek Yüksek Okulu'],
            ['id' => 24, 'name' => 'Elazığ Sağlık Yüksek Okulu'],
            ['id' => 25, 'name' => 'Fen Bilimleri Enstitüsü'],
            ['id' => 26, 'name' => 'Karakoçan Meslek Yüksek Okulu'],
            ['id' => 27, 'name' => 'Keban Meslek Yüksek Okulu'],
            ['id' => 28, 'name' => 'Kovancılar Meslek Yüksek Okulu'],
            ['id' => 29, 'name' => 'Rektörlük'],
            ['id' => 30, 'name' => 'Sağlık Bilimleri Enstitüsü'],
            ['id' => 31, 'name' => 'Sağlık Hizmetleri Meslek Yüksek Okulu'],
            ['id' => 32, 'name' => 'Sivrice Meslek Yüksek Okulu'],
            ['id' => 33, 'name' => 'Sosyal Bilimler Enstitüsü'],
            ['id' => 34, 'name' => 'Sosyal Bilimler Meslek Yüksek Okulu'],
            ['id' => 35, 'name' => 'Teknik Bilimler Meslek Yüksek Okulu'],
            ['id' => 36, 'name' => 'GENEL']

        ]);
    }
}
