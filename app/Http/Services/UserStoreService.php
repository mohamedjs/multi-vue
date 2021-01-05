<?php


namespace App\Http\Services;

use App\Http\Repository\UserRepository;
use Illuminate\Http\Request;

class UserStoreService
{
	/**
     * @var IMAGE_PATH
     */
	const IMAGE_PATH = 'users';
    /**
     * @var UploaderService
     */
    private $uploaderService;
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * UserServices constructor.
     * UserRepository constructor.
     */
    public function __construct(UserRepository $userRepository, UploaderService $uploaderService)
    {
        $this->uploaderService = $uploaderService;
        $this->userRepository  = $userRepository;
    }
    /**
     * handle function that make update for user
     * @param array $request 
     * @return User
     */
    public function handle($request)
    {
        $request['bod']   = date('Y-m-d',strtotime($request['bod']));
        if(isset($request['image']) && is_file($request['image'])) {
            $request['image'] = $this->handleFile($request['image']);
        }
    	$user = $this->userRepository->create($request);

    	return $user;
    }
    /**
     * handle image file that return file path
     * @param File $file 
     * @return string
     */
    public function handleFile($file) 
    {
        return $this->uploaderService->upload($file, self::IMAGE_PATH);
    }

}
