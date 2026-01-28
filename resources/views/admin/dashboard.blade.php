<x-layouts.admin title="Dashboard Admin">
    <div class="min-h-screen bg-base-200/50 p-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-bold text-base-content">Dashboard Overview</h1>
                <p class="text-base-content/60 mt-1">Selamat datang kembali, berikut ringkasan hari ini.</p>
            </div>
            <div class="flex gap-2">
                <a href="{{ request()->url() }}" class="btn btn-ghost btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    Refresh
                </a>

                <a href="{{ route('admin.events.create') }}"
                    class="btn btn-primary btn-sm text-white shadow-lg shadow-primary/30">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Buat Event Baru
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div
                class="card bg-base-100 shadow-xl hover:shadow-2xl transition-all duration-300 border-l-4 border-primary">
                <div class="card-body flex flex-row items-center justify-between p-6">
                    <div>
                        <p class="text-sm font-medium text-base-content/60 uppercase tracking-wider">Total Event</p>
                        <h2 class="text-4xl font-extrabold text-base-content mt-2">{{ $totalEvents ?? 0 }}</h2>
                        <a href="{{ route('admin.events.index') }}"
                            class="text-xs text-primary mt-1 font-semibold cursor-pointer hover:underline">Lihat semua
                            event &rarr;</a>
                    </div>
                    <div class="p-4 rounded-full bg-primary/10 text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div
                class="card bg-base-100 shadow-xl hover:shadow-2xl transition-all duration-300 border-l-4 border-secondary">
                <div class="card-body flex flex-row items-center justify-between p-6">
                    <div>
                        <p class="text-sm font-medium text-base-content/60 uppercase tracking-wider">Kategori Aktif</p>
                        <h2 class="text-4xl font-extrabold text-base-content mt-2">{{ $totalCategories ?? 0 }}</h2>
                        <a href="{{ route('admin.categories.index') }}"
                            class="text-xs text-secondary mt-1 font-semibold cursor-pointer hover:underline">Kelola
                            kategori &rarr;</a>
                    </div>
                    <div class="p-4 rounded-full bg-secondary/10 text-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div
                class="card bg-base-100 shadow-xl hover:shadow-2xl transition-all duration-300 border-l-4 border-emerald-500">
                <div class="card-body flex flex-row items-center justify-between p-6">
                    <div>
                        <p class="text-sm font-medium text-base-content/60 uppercase tracking-wider">Total Transaksi</p>
                        <h2 class="text-4xl font-extrabold text-base-content mt-2">{{ $totalOrders ?? 0 }}</h2>
                        <a href="{{ route('admin.histories.index') }}"
                            class="text-xs text-emerald-600 mt-1 font-semibold cursor-pointer hover:underline">Cek
                            laporan &rarr;</a>
                    </div>
                    <div class="p-4 rounded-full bg-emerald-100 text-emerald-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="card bg-base-100 shadow-lg">
                <div class="card-body">
                    <h3 class="card-title text-lg border-b pb-2 mb-2">Event Terbaru Ditambahkan</h3>
                    <div class="overflow-x-auto">
                        <table class="table table-zebra w-full">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Event</th>
                                    <th>Tanggal Dibuat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recents as $event)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $event->judul }}</td>
                                        <td class="text-sm text-base-content/60">
                                            {{ $event->created_at->diffForHumans() }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="text-sm text-base-content/60 italic">
                                        <td colspan="3" class="text-center py-4">Belum ada event yang dibuat.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @if ($recents->count() > 0)
                        <div class="mt-4 text-center">
                            <a href="{{ route('admin.events.index') }}" class="btn btn-sm btn-outline btn-primary">
                                Lihat Semua Event
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <div class="card bg-base-100 shadow-lg">
                <div class="card-body">
                    <h3 class="card-title text-lg border-b pb-2 mb-4">Order Tiket Terbaru</h3>
                    <div class="overflow-x-auto">
                        <table class="table table-zebra w-full">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Order ID</th>
                                    <th>Event</th>
                                    <th>User</th>
                                    <th>Total</th>
                                    <th>Tanggal</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentOrders as $order)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>
                                            <span class="badge badge-primary badge-sm">#{{ $order->id }}</span>
                                        </td>
                                        <td>
                                            <div class="font-semibold">{{ $order->event?->judul ?? 'N/A' }}</div>
                                            <div class="text-xs text-base-content/60">
                                                {{ Str::limit($order->event?->deskripsi ?? '', 30) }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-2">
                                                <div class="avatar">
                                                    <div class="w-10 rounded-full">
                                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($order->user?->name ?? 'User') }}&background=random&color=fff&size=128"
                                                            alt="{{ $order->user?->name ?? 'User' }}" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="font-medium text-sm">
                                                        {{ $order->user?->name ?? 'Unknown' }}
                                                    </div>
                                                    <div class="text-xs text-base-content/60">
                                                        {{ $order->user?->email ?? '' }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="font-bold text-emerald-600">
                                                Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                                            </span>
                                        </td>
                                        <td class="text-sm text-base-content/60">
                                            <div>{{ $order->created_at->format('d M Y') }}</div>
                                            <div class="text-xs">{{ $order->created_at->format('H:i') }}</div>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.histories.show', $order) }}"
                                                class="btn btn-ghost btn-xs">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="text-sm text-base-content/60 italic">
                                        <td colspan="7" class="text-center py-8">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-12 w-12 mx-auto mb-2 opacity-30" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                            </svg>
                                            Belum ada order tiket yang dibuat.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @if ($recentOrders->count() > 0)
                        <div class="mt-4 text-center">
                            <a href="{{ route('admin.histories.index') }}"
                                class="btn btn-sm btn-outline btn-primary">
                                Lihat Semua Transaksi
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>
