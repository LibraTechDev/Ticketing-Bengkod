@props(['title', 'date', 'location', 'price', 'image', 'tickets' => [], 'href' => null])

@php
    // Format Indonesian price
    $formattedPrice = $price ? 'Rp ' . number_format($price, 0, ',', '.') : 'Harga tidak tersedia';

    // Format Indonesian date
    $formattedDate = $date
        ? \Carbon\Carbon::parse($date)->locale('id')->translatedFormat('d F Y, H:i')
        : 'Tanggal tidak tersedia';

    // Safe image URL: use external URL if provided, otherwise use asset (storage path)
    $imageUrl = $image && filter_var($image, FILTER_VALIDATE_URL) ? $image : asset($image ?: 'storage/konser.jpeg');
    
    // Calculate total stock
    $totalStock = collect($tickets)->sum('stok');
@endphp

<div class="card bg-base-100 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col h-full">
    <figure class="relative">
        <img src="{{ $imageUrl }}" alt="{{ $title }}" class="w-full h-48 object-cover" />
        @if($totalStock > 0)
            <div class="absolute top-2 right-2 badge badge-success gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Tersedia
            </div>
        @else
            <div class="absolute top-2 right-2 badge badge-error">Sold Out</div>
        @endif
    </figure>

    <div class="card-body p-4 flex flex-col flex-grow">
        <h2 class="card-title text-base line-clamp-2">
            {{ $title }}
        </h2>

        <p class="text-xs text-base-content/60 flex items-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            {{ $formattedDate }}
        </p>

        <p class="text-xs text-base-content/80 flex items-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            {{ $location }}
        </p>

        <div class="divider my-2"></div>

        <!-- Ticket Stock Info -->
        @if(count($tickets) > 0)
            <div class="space-y-1 mb-2">
                <p class="text-xs font-semibold text-base-content/70">Tiket Tersedia:</p>
                @foreach($tickets as $ticket)
                    <div class="flex justify-between items-center text-xs">
                        <span class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5h14a2 2 0 012 2v3a2 2 0 010 4v3a2 2 0 01-2 2H5a2 2 0 01-2-2v-3a2 2 0 010-4V7a2 2 0 012-2z" />
                            </svg>
                            <span class="capitalize">{{ $ticket->tipe }}</span>
                        </span>
                        <span class="badge badge-sm text-black text-bold {{ $ticket->stok > 10 ? 'badge-success' : ($ticket->stok > 0 ? 'badge-warning' : 'badge-error') }}">
                            {{ $ticket->stok }} tersisa
                        </span>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-xs text-base-content/50 italic mb-2">Belum ada tiket tersedia</p>
        @endif

        <div class="mt-auto">
            <p class="font-bold text-lg text-primary mb-3">
                Mulai dari {{ $formattedPrice }}
            </p>

            <a href="{{ $href ?? '#' }}" class="btn btn-primary btn-block btn-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                Beli Sekarang
            </a>
        </div>
    </div>
</div>
