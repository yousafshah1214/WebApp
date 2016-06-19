<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminLoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_admin_section_auth_security_is_working()
    {
        $this->visit('/admin');
        $this->followRedirects();
        $this->seePageIs('/admin/login');
    }

    public function test_admin_login_with_valid_info(){
        $this->visit('/admin/login');
        $this->type('adminyousaf','username');
        $this->type('adminpassword','password');
        $this->press('submit');
        $this->seePageIs('admin');
        $this->seeIsAuthenticated('admin');
        $this->dontSeeIsAuthenticated('web');
    }

    public function test_admin_login_wrong_info(){
        $this->visit('/admin/login');
        $this->type('adminyou','username');
        $this->type('adminpass','password');
        $this->press('submit');
        $this->seePageIs('admin/login');
        $this->dontSeeIsAuthenticated('admin');
    }

    public function test_admin_login_with_only_username(){
        $this->visit('/admin/login');
        $this->type('adminyou','username');
        $this->press('submit');
        $this->seePageIs('admin/login');
        $this->dontSeeIsAuthenticated('admin');
    }

    public function test_admin_login_with_only_password(){
        $this->visit('/admin/login');
        $this->type('adminyou','password');
        $this->press('submit');
        $this->seePageIs('admin/login');
        $this->dontSeeIsAuthenticated('admin');
    }

    public function test_admin_login_with_less_then_minimum_required_length_info(){
        $this->visit('/admin/login');
        $this->type('admin','username');
        $this->type('pass','password');
        $this->press('submit');
        $this->seePageIs('admin/login');
        $this->dontSeeIsAuthenticated('admin');
    }
}
