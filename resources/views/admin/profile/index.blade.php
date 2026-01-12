<x-layouts.admin title="Pengaturan Akun">
     @if (session('success'))
        <div class="toast toast-top toast-center">
            <div class="alert alert-success">
                <span>{{ session('success') }}</span>
            </div>
        </div>

        <script>
            setTimeout(() => {
                document.querySelector('.toast')?.remove()
            }, 3000)
        </script>
    @endif

    <div class="container mx-auto p-4">
        <div class="text-sm breadcrumbs mb-4">
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li>Profile</li>
            </ul>
        </div>

        <h1 class="text-3xl font-bold text-base-content mb-8">Pengaturan Akun</h1>

        {{-- Grid Layout: Kiri (Info), Kanan (Password) --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            {{-- BAGIAN 1: EDIT INFORMASI PRIBADI --}}
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title mb-4 border-b pb-2">Informasi Pribadi</h2>

                    <form action="{{ route('admin.profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Nama --}}
                        <div class="form-control w-full mb-3">
                            <label class="label">
                                <span class="label-text font-semibold">Nama Lengkap</span>
                            </label>
                            <input type="text" name="name" placeholder="Masukkan nama Anda"
                                class="input input-bordered w-full @error('name') input-error @enderror"
                                value="{{ old('name', auth()->user()->name) }}" />
                            @error('name')
                                <label class="label">
                                    <span class="label-text-alt text-error">{{ $message }}</span>
                                </label>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="form-control w-full mb-3">
                            <label class="label">
                                <span class="label-text font-semibold">Email</span>
                            </label>
                            <input type="email" name="email" placeholder="email@contoh.com"
                                class="input input-bordered w-full @error('email') input-error @enderror"
                                value="{{ old('email', auth()->user()->email) }}" />
                            @error('email')
                                <label class="label">
                                    <span class="label-text-alt text-error">{{ $message }}</span>
                                </label>
                            @enderror
                        </div>

                        {{-- No HP --}}
                        <div class="form-control w-full mb-6">
                            <label class="label">
                                <span class="label-text font-semibold">No. Handphone</span>
                            </label>
                            <input type="text" name="no_hp" placeholder="0812..."
                                class="input input-bordered w-full @error('no_hp') input-error @enderror"
                                value="{{ old('no_hp', auth()->user()->no_hp) }}" />
                            @error('no_hp')
                                <label class="label">
                                    <span class="label-text-alt text-error">{{ $message }}</span>
                                </label>
                            @enderror
                        </div>

                        <div class="card-actions justify-end">
                            <button type="submit" class="btn btn-primary text-white">Simpan Profil</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card bg-base-100 shadow-xl h-fit">
                <div class="card-body" x-data="{ showPassword: false }">
                    <h2 class="card-title mb-4 border-b pb-2">Keamanan & Password</h2>

                    <form action="{{ route('admin.profile.password.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Checkbox Toggle Lihat Password --}}
                        <div class="form-control mb-2">
                            <label class="label cursor-pointer justify-start gap-2">
                                <input type="checkbox" class="toggle toggle-sm toggle-primary"
                                    @click="showPassword = !showPassword" />
                                <span class="label-text">Tampilkan Password</span>
                            </label>
                        </div>

                        {{-- Password Baru --}}
                        <div class="form-control w-full mb-3">
                            <label class="label">
                                <span class="label-text font-semibold">Password Baru</span>
                            </label>
                            <div class="relative">
                                <input :type="showPassword ? 'text' : 'password'" name="password"
                                    placeholder="Minimal 8 karakter"
                                    class="input input-bordered w-full @error('password') input-error @enderror" />
                            </div>
                            @error('password')
                                <label class="label">
                                    <span class="label-text-alt text-error">{{ $message }}</span>
                                </label>
                            @enderror
                        </div>

                        {{-- Konfirmasi Password --}}
                        <div class="form-control w-full mb-6">
                            <label class="label">
                                <span class="label-text font-semibold">Konfirmasi Password</span>
                            </label>
                            <input :type="showPassword ? 'text' : 'password'" name="password_confirmation"
                                placeholder="Ulangi password baru" class="input input-bordered w-full" />
                        </div>

                        <div class="card-actions justify-end">
                            <button type="submit" class="btn btn-neutral">Update Password</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-layouts.admin>