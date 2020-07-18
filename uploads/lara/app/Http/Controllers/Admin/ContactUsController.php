<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repository\ContactUsRepository;
use App\Models\ContactUs;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactUsController extends Controller
{
    /**
     * @var ContactUsRepository
     */
    private $contactUsRepository;

    /**
     * ContactUsController constructor.
     * @param ContactUsRepository $contactUsRepository
     */
    public function __construct(ContactUsRepository $contactUsRepository)
    {
        $this->contactUsRepository = $contactUsRepository;
    }

    /**
     * @param Request $request
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function index(Request $request)
    {
        $this->authorize("index", ContactUs::class);

        $list = $this->contactUsRepository->search($request)
            ->paginate(10);

        return view("admin.contacts.index", compact("list"));
    }

    /**
     * @param ContactUs $contactUs
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function show(ContactUs $contactUs)
    {
        $this->authorize("show", ContactUs::class);

        $contactUs->read = 1;
        $contactUs->save();

        return view("admin.contacts.show", compact("contactUs"));
    }

    /**
     * @param ContactUs $contactUs
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy(ContactUs $contactUs)
    {
        $this->authorize("delete", $contactUs);

        $contactUs->delete();

        return back()->with("success", trans("Item Deleted Successfully"));
    }
}
