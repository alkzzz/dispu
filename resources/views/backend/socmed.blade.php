@extends('layouts.backend.layout')

@section('title', 'Sosial Media')

@section('extra_css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/css/jquery-editable.css"
        rel="stylesheet" />
    <script>
        $.fn.poshytip = {
            defaults: null
        }
    </script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/js/jquery-editable-poshytip.min.js">
    </script>
@endsection

@section('content')
    <h2 class="pb-2 border-bottom border-dark">Sosial Media</h2>

    <div class="row mt-3">
        <!-- Display messages -->
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="mt-4">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="col">Sosial Media</th>
                        <th class="col">Link</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($socmeds as $socmed)
                        <tr>
                            <td class="col fw-medium">{{ $socmed->name }}</td>
                            <td>
                                <a href="" class="update_socmed" data-name="link" data-type="text"
                                    data-pk="{{ $socmed->id }}" data-title="Masukkan Link Baru">{{ $socmed->link }}</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">Belum ada sosial media yang dibuat.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <p class="text-danger fst-italic" style="font-size: 0.8rem">*Klik pada link untuk mengedit
                laman sosial media</p>
        </div>
    </div>
@endsection

@section('extra_js')
    <script type="text/javascript">
        $.fn.editable.defaults.mode = 'inline';
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        $('.update_socmed').editable({
            url: "{{ route('dashboard.sosial-media.update') }}",
            type: 'text',
            name: 'link',
            pk: 1,
            title: 'Enter Link'
        });
    </script>
@endsection
