<div>
    <!-- Display success messages -->
    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <!-- Display category form -->
    <form class="row g-3 justify-content-start mt-3" wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}">
        <div class="col-6">
            <label for="name" class="visually-hidden">Nama Kategori:</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                wire:model="name" placeholder="Nama Kategori">
            @error('name')
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
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $category->name }}</td>
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
