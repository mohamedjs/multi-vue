<?php


namespace App\Http\Services;


use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsService
{
    public function fill(Request $request, ContactUs $contactUs = null)
    {
        if (!$contactUs) {
            $contactUs = new ContactUs();
        }

        $contactUs->fill($request->all());
        $contactUs->save();

        return $contactUs;
    }
}
