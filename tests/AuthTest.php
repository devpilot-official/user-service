<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Faker\Factory as Faker;

class AuthTest extends TestCase
{
    /**
     * Should create a user.
     *
     * @return void
     * @test
     */
    public function shouldCreateUser(){

        $faker = Faker::create();
        $parameters = [
            'firstname' => $faker->firstname(),
            'lastname' => $faker->lastname(),
            'email' => $faker->email(),
            'password' => 'mysecretlove',
            'password_confirmation' => 'mysecretlove'
        ];

        $this->post('api/auth/register', $parameters, []);
        $this->seeStatusCode(201);
    }

    /**
     * Should not create a user with incorrect details.
     *
     * @return void
     * @test
     */
    public function shouldNotCreateUserWithIncompleteDetails(){

        // Missing firstname and lastname

        $faker = Faker::create();
        $parameters = [
            'email' => $faker->email(),
            'password' => 'mysecretlove',
            'password_confirmation' => 'mysecretlove'
        ];

        $this->post('api/auth/register', $parameters, []);
        $this->seeStatusCode(422);
    }

    /**
     * Should not create a user with no email.
     *
     * @return void
     * @test
     */
    public function shouldNotCreateUserWithNoEmail(){

        // Missing email

        $faker = Faker::create();
        $parameters = [
            'firstname' => $faker->firstname(),
            'lastname' => $faker->lastname(),
            'password' => 'mysecretlove',
            'password_confirmation' => 'mysecretlove'
        ];

        $this->post('api/auth/register', $parameters, []);
        $this->seeStatusCode(422);
        $this->seeJson([
            "email" => [
                "The email field is required."
            ]
        ]);
    }

    /**
     * Should not create a user with incorrect email.
     *
     * @return void
     * @test
     */
    public function shouldNotCreateUserWithIncorrectEmail(){

        // Missing email

        $faker = Faker::create();
        $parameters = [
            'firstname' => $faker->firstname(),
            'lastname' => $faker->lastname(),
            'email' => 'foo.bar',
            'password' => 'mysecretlove',
            'password_confirmation' => 'mysecretlove'
        ];

        $this->post('api/auth/register', $parameters, []);
        $this->seeStatusCode(422);
        $this->seeJson([
            "email" => [
                "The email must be a valid email address."
            ]
        ]);
    }

    /**
     * Should not create a user if password mismatched.
     *
     * @return void
     * @test
     */
    public function shouldNotCreateUserIfPasswordMismatched(){

        // Missing email

        $faker = Faker::create();
        $parameters = [
            'firstname' => $faker->firstname(),
            'lastname' => $faker->lastname(),
            'email' => $faker->email(),
            'password' => 'mysecretlove',
            'password_confirmation' => 'my.secret-love'
        ];

        $this->post('api/auth/register', $parameters, []);
        $this->seeStatusCode(422);
        $this->seeJson([
            "password" => [
                "The password confirmation does not match."
            ]
        ]);
    }

    /**
     * Should login a user.
     *
     * @return void
     * @test
     */
    public function shouldLoginUser(){
        $faker = Faker::create();
        $email = $faker->email();
        $password = 'mysecretlove';
        $reg_parameters = [
            'firstname' => $faker->firstname(),
            'lastname' => $faker->lastname(),
            'email' => $email,
            'password' => $password,
            'password_confirmation' => $password
        ];
        $login_parameters = [
            'email' => $email,
            'password' => $password,
        ];

        $this->post('api/auth/register', $reg_parameters, []);
        $this->seeStatusCode(201);
        $this->post('api/auth/login', $login_parameters, []);
        $this->seeJsonStructure([
            "data" => [
                "email"
            ],
            "message",
            "token"
        ]);
    }

    /**
     * Should not login a user with unregistered email.
     *
     * @return void
     * @test
     */
    public function shouldNotLoginUnregisteredEmail(){
        $faker = Faker::create();
        $login_parameters = [
            'email' => $faker->email(),
            'password' => 'mysecretlove',
        ];
        $this->post('api/auth/login', $login_parameters, []);
        $this->seeStatusCode(404);
        $this->seeJson([
            "message" => "incorrect login details."
        ]);
    }

    /**
     * Should not login a user with wrong password.
     *
     * @return void
     * @test
     */
    public function shouldNotLoginWrongPassword(){
        $faker = Faker::create();
        $email = $faker->email();
        $password = 'mysecretlove';
        $reg_parameters = [
            'firstname' => $faker->firstname(),
            'lastname' => $faker->lastname(),
            'email' => $email,
            'password' => $password,
            'password_confirmation' => $password
        ];
        $login_parameters = [
            'email' => $email,
            'password' => 'my-secret.love',
        ];

        $this->post('api/auth/register', $reg_parameters, []);
        $this->seeStatusCode(201);
        $this->post('api/auth/login', $login_parameters, []);
        $this->seeStatusCode(404);
        $this->seeJson([
            "data" => $email,
            "message" => "incorrect login details."
        ]);
    }
}
