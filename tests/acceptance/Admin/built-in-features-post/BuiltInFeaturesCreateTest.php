<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BuiltInFeaturesCreateTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function admin_create_new_built_in_feature_valid_info()
    {
        $this->actingAsAdmin();
        $this->visit('/admin/homepage/features/create');
        $this->type('title for built in feature', 'title');
        $this->type('intro or tagline of built in feature', 'intro');
        $this->select('1', 'icon');
        $this->press('Create New Built In Feature Post');
        $this->seePageIs('/admin/homepage/features');
        $this->seeText('Successfully Created New Built In Features post');
        $this->seeInDatabase('contents',array('title' => 'title for built in feature'));
    }

    /**
     * @test
     */
    public function admin_create_new_built_in_feature_title_missing(){
        $this->actingAsAdmin();
        $this->visit('/admin/homepage/features/create');
        $this->type('intro or tagline of built in feature', 'intro');
        $this->select('1', 'icon');
        $this->press('Create New Built In Feature Post');
        $this->seePageIs('/admin/homepage/features/create');
        $this->seeText('the title field is required.');
        $this->dontSeeInDatabase('contents',array('intro' => 'intro or tagline of built in feature'));
    }

    /**
     * @test
     */
    public function admin_create_new_built_in_feature_tagline_missing(){
        $this->actingAsAdmin();
        $this->visit('/admin/homepage/features/create');
        $this->type('title for built in feature', 'title');
        $this->select('1', 'icon');
        $this->press('Create New Built In Feature Post');
        $this->seePageIs('/admin/homepage/features/create');
        $this->seeText('the intro field is required.');
        $this->dontSeeInDatabase('contents',array('title' => 'title for built in feature'));
    }

    /**
     * @test
     */
    public function admin_create_new_built_in_feature_icon_missing()
    {
        $this->actingAsAdmin();
        $this->visit('/admin/homepage/features/create');
        $this->type('title for built in feature', 'title');
        $this->type('intro or tagline of built in feature', 'intro');
        $this->press('Create New Built In Feature Post');
        $this->seePageIs('/admin/homepage/features/create');
        $this->seeText('the Icon field is required');
        $this->dontSeeInDatabase('contents',array('title' => 'title for built in feature'));
    }
}
