<?php

namespace App\Console\Commands;

use App\Models\Abscence;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class LockAbscenceData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lock:abscence-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Vérouiller les donnees ';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $currentMonth = Carbon::now()->month;
        $abscence = DB::table('abscences')->where('periode', $currentMonth)->pluck('id');

        DB::table('abscence_agent')
            ->where('abscence_id', $abscence)
            ->update(['validé' => true]);

        $this->info('Les données d\'abscence pour le mois en cours ont été verrouillées avec succès.');
    }
}
