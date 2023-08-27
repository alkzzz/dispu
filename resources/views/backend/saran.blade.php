@extends('layouts.backend.layout')

@section('extra_css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
    <h2 class="pb-2 border-bottom border-dark">Kotak Saran</h2>
    <div class="row mt-3">
        <table id="saranTable" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th class="col">Tanggal</th>
                    <th class="col">Nama</th>
                    <th class="col">Saran</th>
                    <th class="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($daftar_saran as $saran)
                    @php $tanggal = Carbon\Carbon::parse($saran->created_at) @endphp
                    <tr>
                        <td class="col date-column" data-order="{{ $tanggal }}">
                            {{ $tanggal->translatedFormat('l, j F Y') }}<br>
                            ({{ $tanggal->diffForHumans() }})
                        </td>
                        <td class="col">{{ $saran->nama }}</td>
                        <td class="col">{{ Str::limit($saran->isi, 40) }}</td>
                        <td class="col">
                            <a class="btn btn-sm btn-info" href="#" target="_blank" role="button"
                                data-bs-toggle="modal" data-bs-target="#saranModal"><i class="fa-solid fa-eye"></i> Lihat
                                Selengkapnya</a>
                        </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="saranModal" tabindex="-1" aria-labelledby="saranModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="saranModalLabel">Baca Saran</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div class="d-flex mb-2">
                                        <label class="me-1" style="width: 65px;"><strong>Pengirim</strong></label>
                                        <div class="me-1" style="width: 8px;">:</div>
                                        <div>{{ $saran->nama }}</div>
                                    </div>

                                    <div class="d-flex mb-3">
                                        <label class="me-1" style="width: 65px;"><strong>Tanggal</strong></label>
                                        <div class="me-1" style="width: 8px;">:</div>
                                        <div>{{ $tanggal->translatedFormat('j F Y') }} ({{ $tanggal->diffForHumans() }})
                                        </div>
                                    </div>

                                    <hr>

                                    <p class="text-break">
                                        {{ $saran->isi }}
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i
                                            class="fa-regular fa-circle-xmark"></i> Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <tr>
                        <td colspan="3">Belum ada saran yang masuk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@section('extra_js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#saranTable').DataTable({
                columnDefs: [{
                    targets: 'date-column',
                    type: 'date',
                }],
                order: [
                    [0, 'desc']
                ]
            });
        });
    </script>
@endsection
