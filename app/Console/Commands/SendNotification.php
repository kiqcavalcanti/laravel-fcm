<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Kutia\Larafirebase\Facades\Larafirebase;
use Symfony\Component\Console\Command\Command as CommandAlias;

class SendNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'webpush:send {title?} {message?}';

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
        $arguments = $this->arguments();
        $title = data_get($arguments, 'title', 'Titulo');
        $message = data_get($arguments, 'message', 'Mensagem');

        $fcmTokens = User::whereNotNull('fcm_token')->pluck('fcm_token')->toArray();

        // finaliza o relatorio


        dd(Larafirebase::withTitle('Relatorio finalizado com sucesso')
            ->withBody("Baixe seu relatorio no app de relatorios")
            ->sendMessage([...$fcmTokens, 'dXIdCxrCshApOIYLSLEyGc:APA91bHQMW42v_inU3sQiU3OGgBcW6icMMqMcNTOxB-e25nYzzM-mRVPc1l4BRg4LW_phg1zfmV0lRrB37ukBOv2L-7IJuoXn8zggyRlMpWh4ejg5wCrBEOPNSP8rpQDN1mfNbIdooEo']));

        return 'DONE';
    }
}
