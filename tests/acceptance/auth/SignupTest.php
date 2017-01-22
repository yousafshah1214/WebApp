<?php

use App\Repositories\UserProfileRepository;
use App\Repositories\UserRepository;
use App\Services\RegistrationService;
use App\UserProfile;
use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SignupTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function signup_process_fresh_user()
    {
        $username = str_random(16)."yousa".time();

        $password = str_random(16);

        $email = $username."@gmail.com";

        $this->visit('signup')
            ->type($username,'username')
            ->type($password,'password')
            ->type($email,'email')
            ->press('signup')
            ->seeInDatabase('users',['username' =>  $username])
            ->seeInDatabase('user_profiles',['email'    =>  $email])
            ->see("Successfully");
    }

    /**
     * @throws Exception
     *
     * @test
     */
    public function signup_user_is_registered_before_same_email_case(){

        $userRepo = new UserRepository(new User(),new UserProfileRepository(new UserProfile()));

        $user = $userRepo->getUser(1);

        $this->assertInstanceOf(User::class,$user);

        $this->visit('signup')
            ->type(str_random(16)."yousa",'username')
            ->type(str_random(16),'password')
            ->type($user->profile->email,'email')
            ->press('signup')
            ->see("Error");
    }

    /**
     * @throws Exception
     *
     * @test
     */
    public function signup_user_is_registered_before_same_username(){

        $userRepo = new UserRepository(new User(),new UserProfileRepository(new UserProfile()));

        $user = $userRepo->getUser(1);

        $this->assertInstanceOf(User::class,$user);

        $this->visit('signup')
            ->type($user->username,'username')
            ->type(str_random(16),'password')
            ->type(str_random(16)."yousa@gmail.com",'email')
            ->press('signup')
            ->see("Error");
    }

    /**
     * @test
     */
    public function signup_process_fresh_user_ajax(){
        $username = str_random(16);
        $email = $username."@gmail.com";

        Session::start();

        $this->visit('/signup')
            ->type($username,'username')
            ->type($email,'email')
            ->type('yousafraza','password')
            ->press('signup')
            ->seeInDatabase('users',array('username'    =>  $username))
            ->seeInDatabase('user_profiles',array('email'   =>  $email))
            ->see('You have been Successfully Registered!! Please Check you mail for activation.');
        ;
    }

    /**
     * @test
     */
    public function signup_with_short_username(){
        $username = str_random(5);

        $email = $username."@gmail.com";

        $this->visit('/signup');
        $this->type($username, 'username');
        $this->type($email, 'email');
        $this->type('yousaf', 'password');
        $this->press('signup');
        $this->seePageIs('signup');
        $this->dontSeeInDatabase('users',array('username'   =>  $username));
        $this->dontSeeInDatabase('user_profiles',array('email'  =>  $email));
        $this->assertResponseOk();
    }

    /**
     * @test
     */
    public function signup_with_short_email()
    {
        $username = str_random(6);

        $email = str_random(1)."@g.c";

        $this->visit('/signup');
        $this->type($username,'username');
        $this->type($email,'email');
        $this->type('yousaf','password');
        $this->press('signup');

        $this->seePageIs('signup');
        $this->dontSeeInDatabase('users',array('username'   =>  $username));
        $this->dontSeeInDatabase('user_profiles',array('email'  =>  $email));
        $this->assertResponseOk();
    }

    /**
     * @test
     */
    public function signup_with_short_password(){
        $username = str_random(6);

        $email = str_random(1)."@gmail.com";

        $this->visit('/signup');
        $this->type($username,'username');
        $this->type($email,'email');
        $this->type('yousa','password');
        $this->press('signup');

        $this->seePageIs('signup');
        $this->dontSeeInDatabase('users',array('username'   =>  $username));
        $this->dontSeeInDatabase('user_profiles',array('email'  =>  $email));
        $this->assertResponseOk();
    }

}
