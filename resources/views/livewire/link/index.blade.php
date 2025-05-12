<div class="p-4 rounded-lg">
    <livewire:link.create @saved="$refresh"/>
    @php
        /** @var \App\Models\Link $link */
    @endphp
    
    @foreach ($this->paginatedlinks as $link )

        <div class="flex p-2 justify-between items-center rounded-lg mb-2 border border-gray-500 bg-neutral-700">
            <a href="{{ $link->url }}" target="_blank" class="text-lg font-semibold text-blue-500 hover:underline">
               <div class=" flex gap-2">
        
                    <div class="flex flex-col">
                        <strong class="text-sm text-white"> {{ $link->title }}</strong>
                        <span class="text-xs text-gray-400"> {{ $link->url}}</span>
                        
                    </div>

               </div>               
            </a>
            <livewire:link.delete :link="$link" @deleted="$refresh" :key="uniqid()"/>
        </div>   
    @endforeach
    <div>
      {{ $this->paginatedlinks->links() }}
    </div>
</div>
