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

class SignupTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSignup_process_fresh_user()
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

    public function testSignup_user_is_registered_before_same_email_case(){

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

    public function testSignup_user_is_registered_before_same_username(){

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


}
