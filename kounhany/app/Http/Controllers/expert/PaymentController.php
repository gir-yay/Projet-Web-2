<?php

namespace App\Http\Controllers\expert;

use App\Http\Controllers\Controller;
use App\Models\DemandesClient;
use App\Models\Expert;
use App\Models\GeneralSettings;
use App\Models\Payment;
use App\Models\PaypalSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Srmklive\PayPal\Services\PayPal;


class PaymentController extends Controller
{
    public function index()
    {
        $thirty_days_ago = now()->subDays(30)->format('Y-m-d');
        $totale = DemandesClient::where('expert_id', auth('expert')->user()->id)
            ->where('etat', 'accepte')
            ->where('date_debut', '>', $thirty_days_ago)
            ->sum('total');
        $taux_payment = GeneralSettings::first()->taux_payment;
        $frais = $totale * ($taux_payment / 100);
        return view('expert.payment', compact('frais'));
    }

    public function paypal_config()
    {
        $paypal_settings = PaypalSettings::findOrFail(1);

        $config = [
            'mode'    => $paypal_settings->mode,
            'sandbox' => [
                'client_id'         => $paypal_settings->client_id,
                'client_secret'     => $paypal_settings->client_secret,
                'app_id'            => '',
            ],

            'live' => [
                'client_id'         => $paypal_settings->client_id,
                'client_secret'     => $paypal_settings->client_secret,
                'app_id'            => '',
            ],

            'payment_action' => 'Sale',
            'currency'       => 'USD',
            'notify_url'     => '',
            'locale'         => 'en_US',
            'validate_ssl'   => true,
        ];
        return $config;
    }

    public function payer_paypal(Request $request)
    {
        $config = $this->paypal_config();
        $provider = new PayPal($config);
        $provider->setApiCredentials($config);
        $provider->getAccessToken();
        $totalPayer = $request->total;
        $order = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route("expert.paiement.success"),
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => $config['currency'],
                        "value" => $totalPayer
                    ],
                    'description' => 'Payment for services'
                ]
            ],
        ]);


        foreach ($order['links'] as $item) {
            if ($item['rel'] == 'approve') {
                return redirect()->away($item['href']);
            }
        }
        toastr()->error('Something went wrong, try again!');
        return redirect()->route('expert.payment.index');
    }

    public function success_paypal(Request $request)
    {
        $config = $this->paypal_config();
        $provider = new PayPal($config);
        $provider->setApiCredentials($config);
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            Expert::where('id', auth('expert')->user()->id)->update([
                'status_payment' => 1,
                'status_abonnement' => 1
            ]);
            $thirty_days_ago = now()->subDays(30)->format('Y-m-d');

            $totale = DemandesClient::where('expert_id', auth('expert')->user()->id)
                ->where('etat', 'accepte')
                ->where('date_debut', '>', $thirty_days_ago)
                ->sum('total');
            $taux_payment = GeneralSettings::first()->taux_payment;
            $frais = $totale * ($taux_payment / 100);
            Payment::create([
                'expert_id' => auth('expert')->user()->id,
                'montant' => $frais,
                'methode' => 'paypal',
                'transaction_id' => $response['id'],
            ]);
            toastr()->success('Payment successful!');
            return redirect()->route('expert.dashboard');
        } else {
            toastr()->error('Something went wrong, try again!');
            return redirect()->route('expert.payment.index');
        }
    }
}
