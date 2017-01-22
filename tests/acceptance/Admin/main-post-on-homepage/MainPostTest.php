<?php

use App\Content;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MainPostTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function admin_main_post_of_home_page_is_available_in_database(){
        $mainPostCount = Content::active()->mainPost()->count();

        $this->assertEquals(1,$mainPostCount);
    }

    /**
     * @test
     */
    public function see_main_post_is_displaying_on_home_page(){
        $mainPost = $this->getMainPost();

        $this->visit('/')
            ->seeText($mainPost->title)
            ->seeText($mainPost->intro)
            ->see(asset($mainPost->image->directory."/".$mainPost->image->filename));
    }

    /**
     * @test
     */
    public function admin_edit_form_is_displaying_with_old_main_post_data_of_home_page(){
        $mainPost = $this->getMainPost();

        $this->actingAsAdmin()
            ->visit('admin/homepage/main-post/'.$mainPost->uniqueId.'/edit')
            ->seeInField('title',$mainPost->title)
            ->seeInField('intro',$mainPost->intro)
            ->seeInDatabase('contents',['image_id' =>  $mainPost->image->id]);
    }

    /**
     * @test
     */
    public function admin_edit_main_post_with_new_data_and_old_image(){
        $mainPost = $this->getMainPost();

        $this->actingAsAdmin()
            ->visit('admin/homepage/main-post/'.$mainPost->uniqueId.'/edit')
            ->type('Title of Main Post Edited','title')
            ->type('Introduction of Main Post','intro')
            ->press('Update Main Post')
            ->seePageIs('admin/homepage/main-post')
            ->see('Title of Main Post Edited')
            ->see('Introduction of Main Post')
            ->seeInDatabase('contents',['image_id' =>  $mainPost->image->id]);
    }

    /**
     * @test
     */
    public function admin_edit_main_post_with_all_new_data_including_image(){
        $mainPost = $this->getMainPost();

        $this->actingAsAdmin()
            ->visit('admin/homepage/main-post/'.$mainPost->uniqueId.'/edit')
            ->type('Title of Main Post Edited','title')
            ->type('Introduction of Main Post','intro')
            ->attach(base_path('public/build/adminAssets/img/example1.jpg'), 'image')
            ->press('Update Main Post')
            ->seePageIs('admin/homepage/main-post')
            ->see('Title of Main Post Edited')
            ->see('Introduction of Main Post');
    }

    /**
     * @test
     */
    public function admin_list_of_main_posts_showing_on_its_list_page(){
        $mainPost = $this->getMainPost();

        $mainPostCount = Content::active()->mainPost()->count();

        $this->actingAsAdmin()
            ->visit('admin/homepage/main-post')
            ->see($mainPost->title)
            ->see($mainPost->intro)
            ->see(asset($mainPost->image->directory."/".$mainPost->image->filename))
            ->assertGreaterThanOrEqual(1,$mainPostCount);

    }

    protected function getMainPost(){
        return Content::where('type','=','main-post')->first();
    }
}
