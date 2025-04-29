<?php

namespace App\Http\Controllers;

use Stripe\Charge;
use Stripe\Stripe;
use App\Models\payments;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;

class StripePaymentController extends Controller
{

    public function payment(Request $request)
    {   
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $data = session('confirmation');
       

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'quantity' => 1,
                    'price_data' => [
                        'currency' => 'eur',  
                        'product_data' => [
                            'name' => $data['TitreService'],
                        ],
                        'unit_amount' => $data['amount'] * 100,
                    ],
                ],
            ],
            'mode' => 'payment',  
            'success_url' => route('payment.success').'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('payment.cancel'), 
        ]);

        payments::create([
            'email' => $data['Email'],
            'reservation_id' => $data['id'],
            'amount' => $data['amount'],
            'currency' => 'Euro',
            'stripe_session_id' => $session->id,
            'payment_status' => 'unpaid',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect($session->url);

    }

    public function success(Request $request)
    {
        $confirmation = session('confirmation');
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $data = Session::retrieve($request->session_id);

        if($data->payment_status == 'paid')
        {
            payments::where('stripe_session_id',$request->session_id)->update([
                "payment_status" => "paid"
            ]);
            $id_confirmation = $confirmation['id'];

            Reservation::where('id',$id_confirmation)->update([
                "status" => "En attente"
            ]);


            return redirect('/reservation-confirmation');
        }
    }
}
