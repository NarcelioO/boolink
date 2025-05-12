<?php

namespace App\Livewire\Link;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class Index extends Component
{
   
    
    protected function getCachedTitle(string $url): string
    {
        $cacheKey = 'page_title_' . md5($url);

        return Cache::remember($cacheKey, now()->addHours(6), function () use ($url) {
            try {
                $response = Http::timeout(5)->get($url);

                if ($response->ok() && preg_match('/<title>(.*?)<\/title>/is', $response->body(), $matches)) {
                    return trim($matches[1]);
                }
            } catch (\Exception $e) {
                return 'Título indisponível';
            }

            return 'Sem título';
        });
    }
    

    #[Computed]
    public function links()
    {
        $links =  Auth::user()->links()->get();
        return $links->map(function ($link) {
                $link->title = $this->getCachedTitle($link->url);
                return $link;
            
        });
    }


    public function render()
    {
    
            
        return view('livewire.link.index');
    }
}
