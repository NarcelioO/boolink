<?php

namespace App\Livewire\Link;

use Livewire\Component;
use App\Models\Link;

class Delete extends Component
{
    public Link $link;
    public $linkId;

    public function mount()
    {
        $this->linkId = $this->link->id;
    }

    public function delete()
    {
        sleep(1);
        $this->link->delete();
        $this->dispatch('deleted');
    }

    public function render()
    {
        return view('livewire.link.delete');
    }
}
