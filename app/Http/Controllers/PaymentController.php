<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentController extends Controller
{
    public function handlePayment(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $user_id = Auth::user()->id;

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('success.payment'),
                "cancel_url" => route('cancel.payment'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $product->price_per_share
                    ]
                ]
            ]
        ]);


        if (isset($response['id']) && $response['id'] != null) {


            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    Session::put('product_id', $product->id);
                    return redirect()->away($links['href']);
                }
            }
            return redirect()
                ->route('cancel.payment')
                ->with('error', 'Something went wrong.');
        } else {
            return redirect()
                ->route('/')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    protected function Subcribecreate(array $data)
    {
        return Subscription::create([
            'user_id' => $data[0],
            'product_id' => $data[1],
            'investment_amount' => $data[2]
        ]);
    }

    public function paymentCancel()
    {
        return redirect()
            ->route('home')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }

    public function paymentSuccess(Request $request)
    {

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        $product_id = Session::get('product_id');
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $product = Product::findOrFail($product_id);
            $user_id = Auth::user()->id;
            $SubcribeData = [$user_id, $product->id, $product->price_per_share];
            $this->Subcribecreate($SubcribeData);

            return redirect()
                ->route('home')
                ->with('success', 'Transaction complete.');
        } else {
            return redirect()
                ->route('home')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    public function checkout()
    {

    }
}
