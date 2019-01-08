<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charge;
use App\Store;

class ShopifySubcribeController extends Controller
{
    /**
     * Handle dashboard of store with id
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboardStore(Request $request)
    {

    }

    public function handleSubcribeCallback(Request $request, $storeId)
    {
        $store = Store::find($storeId);
        $user = auth()->user()->providers->where('provider', 'shopify')->first();
        $shopify = \Shopify::retrieve($store->domain, $user->provider_token);

        $activated = \ShopifyBilling::driver('RecurringBilling')
            ->activate($store->domain, $user->provider_token, $request->get('charge_id'));

        $response = array_get($activated->getActivated(), 'recurring_application_charge');

        Charge::create([
            'store_id' => $store->id,
            'name' => 'default',
            'shopify_charge_id' => $request->get('charge_id'),
            'shopify_plan' => array_get($response, 'name'),
            'quantity' => 1,
            'charge_type' => \App\Charge::CHARGE_RECURRING,
            'test' => array_get($response, 'test'),
            'trial_ends_at' => array_get($response, 'trial_ends_on'),
        ]);

        return redirect('/home');
    }
}
