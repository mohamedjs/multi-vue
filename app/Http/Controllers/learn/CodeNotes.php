<?php

// PSR-1, PSR-2  Basic Coding Standard
// Polymorphism (I have a something, and it came out in a lot of ways, such as payment, for example, I can pay by the National Bank visa or the Qatari bank visa, so I do an Interface and I put it in it, that's call ad-hoc polymorphism)
use App\Http\Controllers\Controller;
use App\Http\Repository\UserRepository;

class UserController extends Controller
{
    use Trait; 

    const USER_STATUS; 

    protected $user;

    function _construct()
    {
        $userRepositry = new UserRepository(); //memory reserve one variable beacuse the name of instance of object like object name
        $user          = new UserRepository(); //memory reserve two variable
        $this->middleware('auth',[
            'except' => ['index'],
            'only'   => ['store', 'update']
        ]);
    }
    
    /**
     * snake_case
     * who to write normal function
     * @return void
     */
    function snake_case()
    {

    }
    
    /**
     * getUserById
     * ho to write method function
     * @return void
     */
    public function getUserById()
    {
        
    }
    
    /**
     * register
     * A function should have one and only one reason to change, meaning that a class should have only one job.
     * @return void
     */
    public function register()
    {
        // validation
        //insert in dtatabase
        //return irecently created user
    }
    
    /**
     * getUser
     * the option arg set as last arg
     * @param  mixed $arg1
     * @param  mixed $arg2
     * @return void
     */
    public function getUser($arg1, $arg2=null)
    {
        # code...
    }
}