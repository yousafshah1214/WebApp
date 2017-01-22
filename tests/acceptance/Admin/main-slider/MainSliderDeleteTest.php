<?php

use App\Slider;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MainSliderDeleteTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function admin_deletes_main_slider()
    {
        $mainSlider = $this->getSliderFromModel();

        $this->actingAsAdmin()
            ->visit("admin/main-slider/$mainSlider->uniqueId/delete")
            ->seePageIs('admin/main-slider')
            ->see('Slider Deleted !!');
    }

    /**
     * @test
     */
    public function admin_can_only_delete_main_slider(){

        $mainSlider = $this->getSliderFromModel();

        $this->visit("admin/main-slider/$mainSlider->uniqueId/delete")
            ->seeInDatabase('sliders',array('id'    =>  $mainSlider->id))
            ->seePageIs('admin/login');
    }

    /**
     * Get Main Slider Model Object
     *
     * @return mixed
     */
    protected function getSliderFromModel()
    {
        $mainSlider = Slider::where('type','=','main-slider')->where('featured','=',true)->first();

        return $mainSlider;
    }


}
