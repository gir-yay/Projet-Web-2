<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\EmailSettings;
use App\Models\GeneralSettings;
use App\Models\PaypalSettings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{

    public function index()
    {
        $general_settings = GeneralSettings::first();
        $email_settings = EmailSettings::first();
        $paypal_settings = PaypalSettings::first();
        return view('admin.settings.index', compact('general_settings', 'email_settings', 'paypal_settings'));
    }

    public function update_email_settings(Request $request)
    {

        session()->put('setting', 'email-settings');
        $request->validate([
            'host' => 'required',
            'port' => 'required',
            'username' => 'required',
            'password' => 'required',
            'encryption' => 'required',
        ]);

       EmailSettings::updateOrCreate(
        ['id' => 1],
        [
            'host' => $request->host,
            'port' => $request->port,
            'username' => $request->username,
            'password' => $request->password,
            'encryption' => $request->encryption,

        ]);

        return back()->with('success-email-settings', 'Email settings saved successfully');
    }

    public function update_paypal_settings(Request $request)
    {
        session()->put('setting', 'paypal-settings');
        $request->validate([
            'client_id' => 'required',
            'client_secret' => 'required',
            'mode' => 'required',
        ]);

        PaypalSettings::updateOrCreate(
            ['id' => 1],
            [
                'client_id' => $request->client_id,
                'client_secret' => $request->client_secret,
                'mode' => $request->mode,
            ]);

        return back()->with('success-paypal-settings', 'Paypal settings saved successfully');
    }

    public function update_general_settings(Request $request)
    {
        session()->put('setting', 'general-settings');
        $request->validate([
           'taux_payment'=>'required',
        ]);

        GeneralSettings::updateOrCreate(
            ['id' => 1],
            [
                'taux_payment' => $request->taux_payment,
            ]);

        return back()->with('success-general-settings', 'General settings saved successfully');
    }

}
