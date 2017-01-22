<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BuiltInFeaturesShowAllTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function admin_built_in_features_list_page_loading_with_data()
    {
        $feature = \App\Content::where('type','=','built-in-feature')->first();

        $this->actingAsAdmin()
            ->visit('admin/homepage/features')
            ->seePageIs('admin/homepage/features')
            ->seeText($feature->title)
            ->seeText($feature->intro);
    }
}