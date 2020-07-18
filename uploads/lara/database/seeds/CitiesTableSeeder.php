<?php

use App\Models\City;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(City::class, 10)->create();
        $sql = "INSERT INTO `cities` (`name`,`active`) VALUES
                ('القاهرة',1),
                ('الجيزة',1),
                ('الأسكندرية',1),
                ('الدقهلية',1),
                ('البحر الأحمر',1),
                ('البحيرة',1),
                ('الفيوم',1),
                ('الغربية',1),
                ('الإسماعلية',1),
                ('المنوفية',1),
                ('المنيا',1),
                ('القليوبية',1),
                ('الوادي الجديد',1),
                ('السويس',1),
                ('اسوان',1),
                ('اسيوط',1),
                ('بني سويف',1),
                ('بورسعيد',1),
                ('دمياط',1),
                ('الشرقية',1),
                ('جنوب سيناء',1),
                ('كفر الشيخ',1),
                ('مطروح',1),
                ('الأقصر',1),
                ('قنا',1),
                ('شمال سيناء',1),
                ('سوهاج',1)";

                \DB::statement($sql);
    }
}
