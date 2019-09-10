<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function firststep(){

        
        return view('frontend.checkout.buyercheckout');
    }

    public function buyeraddress(){

    }
}
