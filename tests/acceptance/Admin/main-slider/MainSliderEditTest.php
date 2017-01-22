<?php

use App\Admin;
use App\Slider;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MainSliderEditTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function admin_can_only_access_main_slider_edit_page(){
        $mainSlider = $this->getSliderFromModel();

        $this->visit("admin/main-slider/$mainSlider->uniqueId/edit");
        $this->seePageIs('admin/login');
    }

    /**
     * @test
     */
    public function admin_displaying_edit_main_slider_page()
    {
        $mainSlider = $this->getSliderFromModel();

        $this->actingAsAdmin()
            ->visit("admin/main-slider/$mainSlider->uniqueId/edit")
            ->assertViewHas('slider',$mainSlider)
            ->seeInField('title',$mainSlider->title)
            ->seeInField('tagline',$mainSlider->tagline);
        if($mainSlider->button){
            $this->seeIsChecked('button');
            $this->seeInField('buttonText',$mainSlider->buttonText);
            $this->seeInField('buttonUrl',$mainSlider->buttonUrl);
        }
        else{
            $this->dontSeeIsChecked('button');
        }

        if($mainSlider->featured){
            $this->seeIsChecked('featured');
        }
        else{
            $this->dontSeeIsChecked('featured');
        }
    }

    /**
     * @test
     */
    public function admin_edit_title_of_main_slider(){
        $mainSlider = $this->getSliderFromModel();

        $this->actingAsAdmin()
            ->visit("admin/main-slider/$mainSlider->uniqueId/edit")
            ->type('title of main slider is edited','title')
            ->press('Update Slider')
            ->seeInDatabase('sliders',['title'   =>  'title of main slider is edited'])
            ->seePageIs('admin/main-slider')
            ->see('Slider Updated ');
    }

    /**
     * @test
     */
    public function admin_edit_tagline_of_main_slider(){
        $mainSlider = $this->getSliderFromModel();

        $this->actingAsAdmin()
            ->visit("admin/main-slider/$mainSlider->uniqueId/edit")
            ->type('tagline of main slider is edited','tagline')
            ->press('Update Slider')
            ->seeInDatabase('sliders',['tagline'   =>  'tagline of main slider is edited'])
            ->seePageIs('admin/main-slider')
            ->see('Slider Updated ');
    }

    /**
     * @test
     */
    public function admin_edit_upload_new_image_of_main_slider(){
        $mainSlider = $this->getSliderFromModel();

        $this->actingAsAdmin()
            ->visit("admin/main-slider/$mainSlider->uniqueId/edit")
            ->attach(base_path('public/build/adminAssets/img/example1.jpg'), 'image')
            ->press('Update Slider')
            ->seePageIs('admin/main-slider')
            ->see('Slider Updated ');
    }

    protected function getSliderFromModel(){
        return $mainSlider = Slider::where('type','=','main-slider')->where('featured','=',true)->first();
    }
}
