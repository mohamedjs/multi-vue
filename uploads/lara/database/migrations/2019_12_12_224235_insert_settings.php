<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use \App\Models\Setting;

class InsertSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $settings = [
            [
                'key' => 'about_us',
                'value' => 'This is oil & gas industrial free website template, This lead text for about us content. tristique estid rhoncus ipsum commodo etorbi hendreuis sagittis.'
            ],
            [
                'key' => 'personalized_service',
                'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, aspernatur.'
            ],
            [
                'key' => 'financing_made_easy',
                'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, aspernatur.'
            ],
            [
                'key' => 'about_support',
                'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, aspernatur.'
            ],
            [
                'key' => 'trusted_by_thousands',
                'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, aspernatur.'
            ],
            [
                'key' => 'about_image',
                'value' => 'http://localhost:8000/images/ft-logo.png'
            ],
            [
                'key' => 'footer_text',
                'value' => 'Lead text are lacinia malesuada amet vestibulum orci tristique nonc ultricies lorem consectetur.'
            ],
            [
            'key' => 'logo',
            'value' => 'http://localhost:8000/images/ft-logo.png'
            ],
            [
            'key' => 'slider',
            'value' => 'http://localhost:8000/images/ft-logo.png'
            ],
            [
            'key' => 'contact',
            'value' => '2435 Shearwood Forest Drive Colebrook, Ahmedabad-16'
            ],
            [
            'key' => 'phone',
            'value' => '+1800-123-4567'
            ],
            [
            'key' => 'email',
            'value' => 'info@oilgascompany.com'
            ],
            [
            'key' => 'slider_text',
            'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi quia fugiat ea adipisci earum repudiandae, corporis culpa esse distinctio consequuntur?'
            ],
        ];

        foreach ($settings as $item){
            $setting = new Setting();
            $setting->fill($item);
            $setting->save();
        }
    }
}
