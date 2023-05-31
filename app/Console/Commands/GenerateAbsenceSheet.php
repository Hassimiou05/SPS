<?php

namespace App\Console\Commands;

use App\Models\Abscence;
use App\Models\Agents;
use Carbon\Carbon;
use Illuminate\Console\Command;

class GenerateAbsenceSheet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:abscence-sheet';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Génère la fiche d\'abscence pour le mois en cours';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $agents = Agents::all();

        // Récupérer le mois en cours
        $currentMonth = Carbon::now()->month;

        // Vérifier si la fiche d'absence pour le mois en cours a déjà été générée
        $absencesExist = Abscence::where('periode', $currentMonth)->exists();

        if (!$absencesExist) {
            // Si la fiche d'absence n'a pas encore été générée, la générer pour chaque agent

            $absence = new Abscence();
            $absence->periode = $currentMonth;
            // Ici, vous pouvez remplacer la saisie manuelle du nombre de jours d'absence par un calcul à partir des absences enregistrées dans la base de données
            $absence->save();

            $this->info('La fiche d\'absence pour le mois en cours a été générée avec succès');
        } else {
            $this->error('La fiche d\'absence pour le mois en cours a déjà été générée');
        }


        return Command::SUCCESS;
    }
}
