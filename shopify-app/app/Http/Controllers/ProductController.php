<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Http\Request;
use Shopify;
use Auth;

class ProductController extends Controller
{
    protected $shop = "shopequi.myshopify.com";
    protected $foo;
    protected $scopes = ['read_products', 'read_themes'];

    public function getPermission()
    {
        $this->foo = Shopify::make($this->shop, $this->scopes);
        return $this->foo->redirect();
    }

    public function getResponse(Request $request)
    {
        $store = Store::find(1);
        $user = Auth::user()->providers->where('provider', 'shopify')->first();

        $shopify = Shopify::retrieve($store->domain, $user->provider_token);

        //GET request to products.json
        // return $this->foo->auth()->get('products.json', ['fields' => 'id,images,title']);

        $user = $shopify->getUser();
        $products = $shopify->get('collects', ['id'=>'10482090377280']);
        var_dump($products);
    }
}
