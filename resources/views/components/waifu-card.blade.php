 @props(['waifu'])
 <x-card>
     <div class="flex">
         <img class="hidden w-48 mr-6 md:block" src="{{ $waifu->image ? asset('storage/'.$waifu->image) : asset('images/no-image.png') }}" alt="" />
         <div>
             <h3 class="text-2xl">
                 <a href="/waifus/{{ $waifu->id }}">{{ $waifu->title }}</a>
             </h3>
             <div class="text-xl font-bold mb-4">{{ $waifu->company }}</div>
             <x-waifu-tags :tagsCsv="$waifu->tags" />
             <div class="text-lg mt-4">
                 <i class="fa-solid fa-location-dot"></i> {{ $waifu->game }}
             </div>
         </div>
     </div>
 </x-card>
