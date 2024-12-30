<?php

namespace App\Http\Controllers;

use App\Models\User;
use Chapa\Chapa\Facades\Chapa as Chapa;
use Illuminate\Http\Request;


class ChapaController extends Controller
{
    /**
     * Initialize Rave payment process
     * @return void
     */
    protected $reference;

    public function __construct(){
        $this->reference = Chapa::generateReference();

    }
    public function initialize(Request $request)
    {
        //This generates a payment reference
        // dd($request->all());
        $reference = $this->reference;

        $rental = $request->input('rental');
        $renter_id = $rental['renter_id'];
        $renter = User::find($renter_id);

        // Enter the details of the payment
        $data = [

            'amount' => $rental['price'],
            'email' => $renter->email,
            'tx_ref' => $reference,
            'currency' => "ETB",
            'callback_url' => route('callback',[$reference]),
            'first_name' => $renter->first_name,
            'last_name' => $renter->last_name,
            "customization" => [
                "title" => 'Rental Payment',
                "description" => "Im testing"
            ]
        ];


        // dd($data);

        $payment = Chapa::initializePayment($data);
        // dd($payment);
        if ($payment['status'] !== 'success') {
            // notify something went wrong
            return;
        }

        $url = $payment['data']['checkout_url'];
        // dd($url);
        // return response('', 302)->header('Location', $url);
        // dd($payment['data']['checkout_url']);
        return redirect()->away($payment['data']['checkout_url']);
        // return redirect($payment['data']['checkout_url']);
        // return $url;
    }

    /**
     * Obtain Rave callback information
     * @return void
     */
    public function callback($reference)
    {

        $data = Chapa::verifyTransaction($reference);
        // dd($data);

        //if payment is successful
        if ($data['status'] ==  'success') {


        // dd($data);
        }

        else{
            //oopsie something ain't right.
        }


    }
}
