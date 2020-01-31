<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Language;
use App\Http\Resources\BrandResource;
use App\Http\Resources\BrandCollection;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CategoryCollection;
class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      $langs = Language::all();
      $data =  [
          'id' => $this->id,
          'title' => $this->getTranslation('title',getCode()),
          'description' => $this->getTranslation('description',getCode()),
          'short_description' => $this->getTranslation('short_description',getCode()),
          'sku' => $this->sku,
          'stock' => $this->stock,
          'min_stock' => $this->min_stock,
          'price' => $this->price,
          'active' => $this->active,
          'special' => $this->special,
          'special_price' => $this->special_price,
          'special_price_type' => $this->special_price_type,
          'meta_keyword' => $this->meta_keyword,
          'meta_title' => $this->meta_title,
          'meta_description' => $this->meta_description,
          'special_price_end' => $this->special_price_end,
          'special_price_start' => $this->special_price_start,
          'main_image' => $this->main_image,
          'brand' => new BrandResource($this->brand),
          'category' => new CategoryResource($this->category),
          'gallery' => $this->gallery
      ];
      $tlng = [];
      $dlng = [];
      $shlng = [];
      foreach ($langs as $key => $value) {
          $tlng += [$value->short_code => $this->getTranslation('title',$value->short_code )];
      }
      foreach ($langs as $key => $value) {
          $dlng += [$value->short_code => $this->getTranslation('description',$value->short_code )];
      }
      foreach ($langs as $key => $value) {
          $shlng += [$value->short_code => $this->getTranslation('short_description',$value->short_code )];
      }
      $data['title_langs'] = $tlng;
      $data['short_description_langs'] = $shlng;
      $data['description_langs'] = $dlng;
      return $data;
    }
}
