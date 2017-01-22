<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Main Post Seeder
        Db::table('contents')->insert([
            'title'         =>  'The Ultimate CMS Website',
            'intro'         =>  "Yes! manage your website content your way, you can even manage your content remotely from Facebook.",
            'image_id'      =>  factory(App\Image::class)->create()->id,
            'type'          =>  'main-post',
            'page'          =>  'homepage',
            'admin_id'      =>  1,
            'uniqueId'      =>  uniqid(str_random('2'))
        ]);

        // Built In Features Seeder
        Db::table('contents')->insert([
            'title'         =>  'RESPONSIVE DESIGN',
            'intro'         =>  "Mobile and tablet web design that looks great on any device. Fast loading, simple navigation lets users find our business and contact you with ease.",
            'icon_id'       =>  factory(App\Icon::class)->create()->id,
            'type'          =>  'built-in-feature',
            'page'          =>  'homepage',
            'admin_id'      =>  1,
            'uniqueId'      =>  uniqid(str_random('2'))
        ]);

        Db::table('contents')->insert([
            'title'         =>  'SEO',
            'intro'         =>  "Optimise your website easily with built in SEO so your website can be an online success with high rankings optimised for local search results.",
            'icon_id'       =>  factory(App\Icon::class)->create()->id,
            'type'          =>  'built-in-feature',
            'page'          =>  'homepage',
            'admin_id'      =>  1,
            'uniqueId'      =>  uniqid(str_random('2'))
        ]);

        Db::table('contents')->insert([
            'title'         =>  'CMS',
            'intro'         =>  "Content Management System allows you toupdate your website easily 24/7. Connectwith Facebook and remotely manage your content.",
            'icon_id'       =>  factory(App\Icon::class)->create()->id,
            'type'          =>  'built-in-feature',
            'page'          =>  'homepage',
            'admin_id'      =>  1,
            'uniqueId'      =>  uniqid(str_random('2'))
        ]);
    }
}
