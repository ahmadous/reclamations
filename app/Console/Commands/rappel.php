<?php

namespace App\Console\Commands;

use App\Mail\email;
use App\Models\User;
use App\Models\demande;
use GrahamCampbell\ResultType\Success;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class rappel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:rappel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function __construct()
    {
        parent::__construct();
    }
    public function handle()
    {
        $ar_user = User::where('role', 2);
        $demandes = demande::where('status', 'en_attente')->get();
        foreach($demandes as $demande)
        {
            if (time()- $demande->updated_at>2) {
                foreach ($ar_user as $user) {
                    $name = $user->name;
                    $email = $user->email;
                    $data = array("name" => $name, "body" => "veillez vous connecter pour voir les demande en attente");
                    Mail::send('emails.rappel', $data, function ($message) use ($name, $email) {
                        $message->to($email, $name)
                            ->subject("rappel demande en attente");
                    }
                    );
                }
            }
        }
    }

}