<div class="container">
    <!-- Display success messages -->
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form class="row g-3 justify-content-start mt-3" wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}">
        <div class="row">
            <div class="col-12 col-md-6">
                <label for="title" class="visually-hidden">Judul Link:</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    name="title" wire:model="title" placeholder="Judul Link">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12 col-md-6">
                <label for="url" class="visually-hidden">Alamat URL:</label>
                <input type="text" class="form-control @error('url') is-invalid @enderror" id="url"
                    url="url" wire:model="url" placeholder="Alamat URL url">
                @error('url')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row mt-2">
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
        </div>
    </form>

    <!-- Display custom link list -->
    <table class="table table-striped table-hover mt-4">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($links as $link)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $link->title }}</td>
                    <td>
                        <a class="btn btn-sm btn-info" href="{{ $link->url }}" role="button"><i
                                class="fa-regular fa-circle-check"></i> Cek Link</a>
                        <button class="btn btn-warning btn-sm" wire:click="edit({{ $link->id }})"><i
                                class="fa-solid fa-pen-to-square"></i> Edit</button>
                        <button class="btn btn-danger btn-sm" wire:click="delete({{ $link->id }})"><i
                                class="fa-solid fa-trash-can"></i> Delete</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Belum ada custom links yang dibuat.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
