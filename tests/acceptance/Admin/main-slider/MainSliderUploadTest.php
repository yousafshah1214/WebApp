<?php

use App\Admin;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MainSliderUploadTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function admin_can_only_access_main_slider_create_page(){

        $this->visit("admin/main-slider/create");
        $this->seePageIs('admin/login');
    }

    /**
     * @test
     */
    public function admin_create_new_slider_valid_with_featured_and_button_details(){

        $this->actingAsAdmin()
        ->visit('admin/main-slider/create')
        ->type('title for slider Image','title')
        ->type('tag Line for slider it cant be o long','tagline')
        ->check('button')
        ->type('buttonText for slider','buttonText')
        ->type('button Url for slider','buttonUrl')
        ->check('featured')
        ->attach(base_path('public/build/adminAssets/img/example1.jpg'), 'image')
        ->press('Create New Slider')
        ->seeInDatabase('sliders',['title' =>  'title for slider Image'])
        ->seeInDatabase('sliders',['buttonText' =>  'buttonText for slider'])
        ->seePageIs('/admin/main-slider')
        ->see('Successfully');
    }

    /**
     * @test
     */
    public function admin_create_new_slider_valid_with_featured_and_no_button_details(){

        $this->actingAsAdmin()
            ->visit('admin/main-slider/create')
            ->type('title for slider Image','title')
            ->type('tag Line for slider it cant be o long','tagline')
            ->check('featured')
            ->attach(base_path('public/build/adminAssets/img/example1.jpg'), 'image')
            ->press('Create New Slider')
            ->seeInDatabase('sliders',['title' =>  'title for slider Image'])
            ->seePageIs('/admin/main-slider')
            ->see('Successfully');
    }

    /**
     * @test
     */
    public function admin_create_new_slider_with_title_button_details_and_tagline_with_image_error(){

        $this->actingAsAdmin()
            ->visit('admin/main-slider/create')
            ->type('title for slider Image special','title')
            ->type('tag Line for slider it cant be o long','tagline')
            ->check('button')
            ->type('ButtonText for slider','buttonText')
            ->type('Button Url for Image','buttonUrl')
            ->press('Create New Slider')
            ->seePageIs('/admin/main-slider/create')
            ->dontSeeInDatabase('sliders',array('title' =>  'title for slider Image special'))
            ->see("The image field is required.");
    }

    /**
     * @test
     */
    public function admin_create_slider_with_title_tagline_no_button_details_and_featured_with_image_error(){

        $this->actingAsAdmin()
            ->visit('admin/main-slider/create')
            ->type('title for slider Image special','title')
            ->type('tag Line for slider it cant be o long','tagline')
            ->press('Create New Slider')
            ->seePageIs('/admin/main-slider/create')
            ->dontSeeInDatabase('sliders',array('title' =>  'title for slider Image special'))
            ->see("The image field is required.");
    }

    /**
     * @test
     */
    public function admin_create_new_slider_with_title_featured_image_and_button_details_and_tagline_error(){

        $this->actingAsAdmin()
            ->visit('admin/main-slider/create')
            ->type('title for slider Image','title')
            ->check('button')
            ->type('ButtonText for slider','buttonText')
            ->type('Button Url for Image','buttonUrl')
            ->check('featured')
            ->attach(base_path('public/build/adminAssets/img/example1.jpg'), 'image')
            ->press('Create New Slider')
            ->dontSeeInDatabase('sliders',['title' =>  'title for slider Image'])
            ->dontSeeInDatabase('sliders',['buttonText' =>  'buttonText for slider'])
            ->seePageIs('/admin/main-slider/create')
            ->see('The Tagline field is required');
    }

    /**
     * @test
     */
    public function admin_create_new_slider_with_title_featured_image_and_no_button_details_and_tagline_error(){

        $this->actingAsAdmin()
            ->visit('admin/main-slider/create')
            ->type('title for slider Image','title')
            ->check('featured')
            ->attach(base_path('public/build/adminAssets/img/example1.jpg'), 'image')
            ->press('Create New Slider')
            ->dontSeeInDatabase('sliders',['title' =>  'title for slider Image'])
            ->dontSeeInDatabase('sliders',['buttonText' =>  'buttonText for slider'])
            ->seePageIs('/admin/main-slider/create')
            ->see('The Tagline field is required');
    }

    /**
     * @test
     */
    public function admin_create_new_slider_with_tagline_featured_and_button_details_and_image_and_title_error(){

        $this->actingAsAdmin()
            ->visit('admin/main-slider/create')
            ->type('tagline for slider Image','tagline')
            ->check('button')
            ->type('ButtonText for slider','buttonText')
            ->type('Button Url for Image','buttonUrl')
            ->check('featured')
            ->attach(base_path('public/build/adminAssets/img/example1.jpg'), 'image')
            ->press('Create New Slider')
            ->dontSeeInDatabase('sliders',['title' =>  'title for slider Image'])
            ->seePageIs('/admin/main-slider/create')
            ->see('The Title field is required');
    }

    /**
     * @test
     */
    public function admin_create_new_slider_with_tagline_featured_and_no_button_details_and_image_and_title_error(){

        $this->actingAsAdmin()
            ->visit('admin/main-slider/create')
            ->type('tagline for slider Image','tagline')
            ->check('featured')
            ->attach(base_path('public/build/adminAssets/img/example1.jpg'), 'image')
            ->press('Create New Slider')
            ->dontSeeInDatabase('sliders',['title' =>  'title for slider Image'])
            ->seePageIs('/admin/main-slider/create')
            ->see('The Title field is required');
    }

}

