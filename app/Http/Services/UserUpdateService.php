<?php


namespace App\Http\Services;

use App\Http\Repository\UserRepository;
use Illuminate\Http\Request;

class UserUpdateService
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
     * @param UserServices constructor.
     * @param UserRepository constructor.
     */
    public function __construct(UserRepository $userRepository, UploaderService $uploaderService)
    {
        $this->uploaderService = $uploaderService;
        $this->userRepository  = $userRepository;
    }

    /**
     * handle function that make create for user
     * @param array $request 
     * @return Bool
     */
    public function handle($request, $user)
    {
        if( isset($request['image']) && is_file($request['image'])) {
            array_merge($request, [
                'image' => $this->handleFile($request['image'])
            ]);
        }
        $user = tap($user, function($user) use($request) {
            $this->userRepository->find($user->id)->update($request);
        });
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
