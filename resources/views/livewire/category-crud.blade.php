<div class="container">
    <!-- Display success messages -->
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Display category form -->
    <form class="row g-3 justify-content-start mt-3" wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}">
        <div class="col-12 col-md-6">
            <label for="title" class="visually-hidden">Judul Kategori:</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                name="title" wire:model="title" placeholder="Judul Kategori">
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-success">
                @if ($updateMode)
                <i class="fa-solid fa-pen-to-square"></i>@else<i class="fa-solid fa-circle-plus"></i>
                @endif
                {{ $updateMode ? 'Update' : 'Tambah' }}
            </button>
        </div>
        @if ($updateMode)
            <div class="col-auto">
                <button type="button" class="btn btn-danger" wire:click="resetForm"><i class="fa-solid fa-ban"></i>
                    Cancel</button>
            </div>
        @endif
    </form>

    <!-- Display category list -->
    <table class="table table-striped table-hover mt-4">
        <thead>
            <tr>
                <th>#</th>
                <th>Judul Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $category->title }}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" wire:click="edit({{ $category->id }})"><i
                                class="fa-solid fa-pen-to-square"></i> Edit</button>
                        <button class="btn btn-danger btn-sm" wire:click="delete({{ $category->id }})"><i
                                class="fa-solid fa-trash-can"></i> Delete</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Belum ada kategori yang dibuat.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
