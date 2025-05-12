<?php

namespace App\Livewire\Link;


use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Http;

class Create extends Component
{
    public ?string $link = null;

    public function rules():array
    {
        return [
            'link' => [
                'required',
                'url',
                Rule::unique('links', 'url')->where('user_id', Auth::id())
            ],
        ];
    }



    public function create()
    {
        $this->validate();
        

        Auth::user()->links()->create([
            'url' => $this->pull('link'),
        ]);
        $this->dispatch('saved');
    }
    
    public function render()
    {
        return <<<'HTML'
            <div class="mb-8 rounded-lg shadow-md border p-2 border-gray-500">
                <form wire:submit="create" class="flex flex-col">

                    <input type="text" id="link" wire:model="link" class="form-control rounded p-2 bg-neutral-700 text-gray-200" placeholder="https://example.com" required>
                    <button type="submit" class="bg-indigo-500 hover:bg-indigo-700 cursor-pointer text-white font-semibold rounded mt-2 px-4 py-2 flex justify-center items-center gap-2">
                            Save
                    </button>
                
                </form>
                @error('link')
                    <span class="font-medium text-sm text-red-500">{{ $message }}</span>
                @enderror

            </div>
        HTML;
    }
}
