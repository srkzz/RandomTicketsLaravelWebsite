@props(['listing'])


<x-card>
    <div class="flex flex-col items-center justify-center text-center">
        <img class="w-48 mr-6 mb-6" src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png')}}" alt="" />
        <h3 class="text-2xl mb-2"><a href="/listings/{{$listing->id}}">{{$listing->title}}</h3>
        <div class="text-xl font-bold mb-4">{{ $listing->company }}</div>
            
        <x-listing-tags :tagsCsv="$listing->tags" />
            
            <div class="text-lg my-4">
                <i class="fa-solid fa-location-dot"></i> {{ $listing->location }}
            </div>
            
        </div>
    </div>
</x-card>
