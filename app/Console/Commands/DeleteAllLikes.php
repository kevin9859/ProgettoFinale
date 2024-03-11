<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB; // Aggiungi questa linea

class DeleteAllLikes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-all-likes';

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
public function handle()
{
    DB::table('likes')->delete();

    $this->info('All likes have been deleted.');

    return 0;
}
}
