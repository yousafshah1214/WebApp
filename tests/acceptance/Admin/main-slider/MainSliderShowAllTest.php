<?php

use App\Slider;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MainSliderShowAllTest extends TestCase
{
    /**
     * @test
     */
    public function admin_show_list_of_all_main_sliders_on_page(){

        $mainSliders = Slider::where('type','=','main-slider')->get();

        $this->actingAsAdmin()
            ->visit('admin/main-slider')
            ->assertViewHas('mainSliders')
            ->assertGreaterThanOrEqual(1,$mainSliders->count());
        ;
    }
}
