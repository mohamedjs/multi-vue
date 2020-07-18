<?php


namespace App\Http\Services;


use App\Models\Provider;
use Symfony\Component\HttpFoundation\Request;

class ProviderService
{
    public function __construct(UploaderService $uploaderService)
    {
        $this->uploaderService = $uploaderService;
    }

    public function fill(Request $request, Provider $provider = null)
    {
        if (!$provider) {
            $provider = new Provider();
        }

        $provider->fill($request->request->all());
        $provider->active = $request->request->get("active", 0);

        if ($request->hasFile("image")) {
            $provider->image = $this->uploaderService->upload($request->file("image"), "providers");
        }

        $provider->save();

        if ($request->has('category_id')) {
            $provider->categorys()->sync($request->category_id);
        }

        return $provider;
    }

}
