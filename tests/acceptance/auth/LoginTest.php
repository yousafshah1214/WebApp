<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
    /**
     * @test
     */
    public function login_with_valid_info(){
        $this->visit('/login');
        $this->type('yousaf','username');
        $this->type('yousaf','password');
        $this->press('submit');
        $this->seePageIs('dashboard');
        $this->seeIsAuthenticated();
        $this->seeIsAuthenticatedAs(\App\User::first());
    }

    /**
     * @test
     */
    public function login_with_invalid_info(){
        $rand_str = str_random(7);
        $this->visit('/login');
        $this->type($rand_str,'username');
        $this->type($rand_str,'password');
        $this->press('submit');
        $this->seePageIs('login');
        $this->dontSeeIsAuthenticated();
    }

    /**
     * @test
     */
    public function login_with_valid_username_only(){
        $this->visit('/login');
        $this->type('yousaf','username');
        $this->press('submit');
        $this->seePageIs('login');
        $this->dontSeeIsAuthenticated();
    }

    /**
     * @test
     */
    public function login_with_valid_password_only(){
        $this->visit('/login');
        $this->type('yousaf','password');
        $this->press('submit');
        $this->seePageIs('login');
        $this->dontSeeIsAuthenticated();
    }

    /**
     * @test
     */
    public function login_with_short_username(){
        $this->visit('/login');
        $this->type('yousa','username');
        $this->press('submit');
        $this->seePageIs('login');
        $this->dontSeeIsAuthenticated();
    }

    /**
     * @test
     */
    public function login_with_short_password(){
        $this->visit('/login');
        $this->type('yousa','password');
        $this->press('submit');
        $this->seePageIs('login');
        $this->dontSeeIsAuthenticated();
    }

}
