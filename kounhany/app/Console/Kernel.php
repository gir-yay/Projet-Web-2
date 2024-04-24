<?php

namespace App\Console;

use App\Mail\CommentMail;
use App\Mail\PaymentMail;
use App\Models\DemandesClient;
use App\Models\Expert;
use App\Models\GeneralSettings;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Schedule to notify clients and experts to comment on each other after the end of the service
        $schedule->call(function () {
            $yesterday = Carbon::yesterday();
            $demandes = DemandesClient::where('etat', 'accepté')
                ->whereRaw("DATE_ADD(date_debut, INTERVAL (duree - 1) DAY) = ?", [$yesterday])
                ->get();
            foreach ($demandes as $demande) {
                if ($demande->comment_sur_expert == null) {
                    Mail::to($demande->client->email)->send(new CommentMail(
                        $demande->client->nom. " " .$demande->client->prenom,
                        "Nous vous serions reconnaissants de bien vouloir évaluer l'expert concernant le service rendu."
                    ));
                }
                if ($demande->comment_sur_client == null) {
                    Mail::to($demande->expert->email)->send(new CommentMail(
                        $demande->expert->nom. " " .$demande->expert->prenom,
                        "Nous vous serions reconnaissants de bien vouloir évaluer votre client concernant la prestation réalisée."
                    ));
                }
            }
        })->daily("12:00");


        // Schedule to notify experts to pay their fees
        $taux_payment = GeneralSettings::first()->taux_payment;
        $experts = Expert::where('compte_status', 'active')->where('status_abonnement', 1)->get();

        foreach ($experts as $expert) {
            $signup_day = $expert->created_at->day;
            if ($signup_day > 28) {
                $signup_day = 28;
            }

            $schedule->call(function () use ($expert, $taux_payment) {
                $thirty_days_ago = now()->subDays(30)->format('Y-m-d');

                $demandes = $expert->demandes()->where('etat', 'accepté')
                    ->where('date_debut', '>', $thirty_days_ago)
                    ->get();

                if ($demandes->count() > 0) {
                    Expert::where('id', $expert->id)->update(['status_payment' => 0]);
                    $total = $demandes->sum('total');
                    $tarif = $total * ($taux_payment / 100);

                    Mail::to($expert->email)->send(new PaymentMail(
                        $expert->nom. " " .$expert->prenom,
                        "Nous vous informons que vous devez payer votre frais. vous avez 7 jours pour le faire. Merci.
                        Amount: " . $tarif . "MDH"
                    ));
                }
            })
            ->monthlyOn($signup_day, '00:00');
        }

        // Schedule to suspend experts who did not pay their fees
        $experts_not_payed = Expert::where('compte_status', 'active')->where('status_abonnement', 1)
        ->where('status_payment', 0)
        ->get();

        foreach ($experts_not_payed as $expert) {
            $signup_day = $expert->created_at->day;
            if ($signup_day > 28) {
                $signup_day = 28;
            }

            $schedule->call(function () use ($expert, $taux_payment) {
                $thirty_days_ago = now()->subDays(30)->format('Y-m-d');

                $demandes = $expert->demandes()->where('etat', 'accepté')
                    ->where('date_debut', '>', $thirty_days_ago)
                    ->get();

                if ($demandes->count() > 0) {
                    Expert::where('id', $expert->id)->update(['status_abonnement' => 0]);
                    $total = $demandes->sum('total');
                    $tarif = $total * ($taux_payment / 100);

                    Mail::to($expert->email)->send(new PaymentMail(
                        $expert->nom. " " .$expert->prenom,
                        "Nous vous informons que votre compte est invisible pour clients jusqu'à ce que vous payiez votre frais.
                         Montant : " . $tarif . "MDH"
                    ));
                }
            })
            ->monthlyOn($signup_day + 7, '00:00');
        }
    }


    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
