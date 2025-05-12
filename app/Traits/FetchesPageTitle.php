<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;

trait FetchesPageTitle
{
    public function getPageTitle($url)
    {

        try{

            $response = Http::timeout(1) // reduz timeout para 1 segundo
                ->withOptions([
                    'verify' => false,  // desativa verificação SSL
                    'connect_timeout' => 1, // timeout de conexão
                    'read_timeout' => 1,    // timeout de leitura
                ])
                ->get($url);

            if ($response->ok()){
                $body = substr($response->body(), 0, 8192);
                if (preg_match('/<title>(.*?)<\/title>/is', $body, $matches)) {
                    return trim($matches[1]);
                }
            }
                
            return 'Sem título';
        }catch (\Exception $e) {
            return 'Título indisponível';
        }
        
        return 'Sem título';
    }
}
