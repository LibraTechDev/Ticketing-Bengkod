<x-layouts.app>
    <section class="max-w-4xl mx-auto py-12 px-6">
        @if (session('success'))
            <div class="alert alert-success mb-6 shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold">Profile Saya</h1>
                <p class="text-base-content/60 mt-1">Kelola informasi profile Anda</p>
            </div>
            <a href="{{ route('home') }}" class="btn btn-ghost">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali
            </a>
        </div>

        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="flex flex-col md:flex-row gap-8">
                        <!-- Profile Image Section -->
                        <div class="w-full md:w-1/3 flex flex-col items-center">
                            <div class="avatar mb-4">
                                <div
                                    class="rounded-full w-32 h-32 ring ring-primary ring-offset-base-100 ring-offset-2">
                                    @if ($user->avatar)
                                        <img src="{{ asset('storage/avatars/' . $user->avatar) }}" alt="Avatar"
                                            class="object-cover" />
                                    @else
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random&color=fff&size=256"
                                            alt="{{ $user->name }}" class="object-cover" />
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Form Fields Section -->
                        <div class="w-full md:w-2/3 space-y-4">
                            <!-- Name -->
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-semibold">Nama Lengkap</span>
                                </label>
                                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                    class="input input-bordered w-full @error('name') input-error @enderror" required />
                                @error('name')
                                    <label class="label">
                                        <span class="label-text-alt text-error">{{ $message }}</span>
                                    </label>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-semibold">Email</span>
                                </label>
                                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                    class="input input-bordered w-full @error('email') input-error @enderror"
                                    required />
                                @error('email')
                                    <label class="label">
                                        <span class="label-text-alt text-error">{{ $message }}</span>
                                    </label>
                                @enderror
                            </div>

                            <div class="divider">Ganti Password (Opsional)</div>

                            <!-- Password -->
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-semibold">Password Baru</span>
                                </label>
                                <input type="password" name="password"
                                    class="input input-bordered w-full @error('password') input-error @enderror"
                                    placeholder="Kosongkan jika tidak ingin mengganti" />
                                @error('password')
                                    <label class="label">
                                        <span class="label-text-alt text-error">{{ $message }}</span>
                                    </label>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-semibold">Konfirmasi Password Baru</span>
                                </label>
                                <input type="password" name="password_confirmation" class="input input-bordered w-full"
                                    placeholder="Ulangi password baru" />
                            </div>
                        </div>
                    </div>

                    <div class="card-actions justify-end mt-6 pt-6 border-t">
                        <button type="submit" class="btn btn-primary px-8">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Additional Info Card -->
        <div class="card bg-base-100 shadow-md mt-6">
            <div class="card-body">
                <h3 class="card-title text-lg">Informasi Akun</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                    <div>
                        <p class="text-sm text-base-content/60">Tanggal Bergabung</p>
                        <p class="font-semibold">{{ $user->created_at->translatedFormat('d F Y') }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-base-content/60">Terakhir Diperbarui</p>
                        <p class="font-semibold">{{ $user->updated_at->translatedFormat('d F Y, H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>