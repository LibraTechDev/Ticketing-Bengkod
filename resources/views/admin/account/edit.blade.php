<x-layouts.admin title="Pengaturan Akun">
    <div class="container mx-auto p-10">
        @if (session('success'))
            <div class="toast toast-top toast-center z-50">
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

        <h1 class="text-3xl font-bold mb-8 text-gray-800">Pengaturan Akun</h1>

        <div class="card bg-base-100 shadow-xl max-w-4xl mx-auto">
            <div class="card-body">
                <form action="{{ route('admin.account.update') }}" method="POST" enctype="multipart/form-data"
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
                                        <img src="{{ asset('images/avatars/' . $user->avatar) }}" alt="Avatar"
                                            class="object-cover" />
                                    @else
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random&color=fff&size=256"
                                            alt="{{ $user->name }}" class="object-cover" />
                                    @endif
                                </div>
                            </div>

                            <div class="form-control w-full max-w-xs">
                                <label class="label">
                                    <span class="label-text">Ubah Foto Profil</span>
                                </label>
                                <input type="file" name="avatar"
                                    class="file-input file-input-bordered file-input-primary w-full max-w-xs"
                                    accept="image/*" />
                                @error('avatar')
                                    <span class="text-error text-sm mt-1">{{ $message }}</span>
                                @enderror
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
                                    class="input input-bordered w-full" required />
                                @error('name')
                                    <span class="text-error text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-semibold">Email (read-only login)</span>
                                </label>
                                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                    class="input input-bordered w-full" required />
                                @error('email')
                                    <span class="text-error text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="divider">Ganti Password (Opsional)</div>

                            <!-- Password -->
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-semibold">Password Baru</span>
                                </label>
                                <input type="password" name="password" class="input input-bordered w-full"
                                    placeholder="Kosongkan jika tidak ingin mengganti" />
                                @error('password')
                                    <span class="text-error text-sm mt-1">{{ $message }}</span>
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

                    <div class="card-actions justify-end mt-6">
                        <button type="submit" class="btn btn-primary px-8">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.admin>