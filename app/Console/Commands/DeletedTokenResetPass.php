<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DeletedTokenResetPass extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'resetPass:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Elimina el token que permite recuperar la cuenta';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $deleteTokenUser = DB::select("select id,DATE_PART('hours',now()-created_at) AS hours from password_resets");
        foreach($deleteTokenUser AS $tokenDelete){
            if($tokenDelete->hours > 6){
                DB::delete('delete from password_resets where id = ?', ["$tokenDelete->id"]);
            }
        }

    }
}
