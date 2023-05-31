<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\InputArgument;

class IncrementCommande extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'commande:increment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected function configure()
    {
        $this->setName('commande:increment')
            ->setDescription('Increment the quantity of equipment for a specific command.')
            ->addArgument('id', InputArgument::REQUIRED, 'The ID of the command to increment.');
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Récupération des IDs de commande depuis la table equipement_commandes
        $commandeIds = DB::table('equipement_commands')->pluck('commande_id')->toArray();

        // Incrémentation de la quantité pour chaque commande
        foreach ($commandeIds as $commandeId) {
            // Vérification si la commande existe dans la table Commandes
            $commande = DB::table('commandes')->find($commandeId);

            if ($commande) {
                // Récupération de la quantité de la commande depuis la table equipement_commandes
                $quantite = DB::table('equipement_commands')
                    ->where('commande_id', $commandeId)
                    ->value('quantite');

                // Récupération de l'ID de l'équipement depuis la table equipement_commandes
                $equipementId = DB::table('equipement_commands')
                    ->where('commande_id', $commandeId)
                    ->value('equipment_id');

                // Incrémentation de la quantité pour l'équipement dans la table equipements
                DB::table('equipements')
                    ->where('id', $equipementId)
                    ->increment('quantite', $quantite);
            }
        }

        $this->info('La quantité de chaque équipement a été mise à jour.');
        return Command::SUCCESS;
    }
}
