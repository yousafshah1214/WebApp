<?php

use App\Content;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BuiltInFeaturesDeleteTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function admin_delete_built_in_features_post()
    {
        $this->actingAsAdmin();
        $this->visit('/admin');
        $this->visit('/admin/homepage/features');
        $this->click('delete_1');
        $this->followRedirects();
        $this->see('Built In Features Post Deleted !!');
        $this->seePageIs('/admin/homepage/features');
    }

    protected function getFirstBuiltInFeaturePost(){
        return Content::where('type','=','built-in-feature')->first();
    }
}
