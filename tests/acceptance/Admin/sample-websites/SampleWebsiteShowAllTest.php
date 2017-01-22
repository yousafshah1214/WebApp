<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SampleWebsiteShowAllTest extends TestCase
{
    use DatabaseTransactions;
    /**
     *
     * @test
     */
    public function admin_sample_website_showing_list()
    {
        $sampleWebsite = \App\Content::where('type','=','sample')->first();
        $this->actingAsAdmin();
        $this->visit('admin/homepage/website/sample')
            ->seePageIs('admin/homepage/website/sample')
            ->see($sampleWebsite->title)
            ->see($sampleWebsite->intro);
    }
}
