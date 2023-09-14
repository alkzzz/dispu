@extends('layouts.backend.layout')

@section('title', 'Kuesioner')

@section('extra_css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection

@section('content')
    <h2 class="pb-2 border-bottom border-dark">Kuesioner</h2>

    <div class="row mt-3">
        <!-- Display messages -->
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="mt-4">

            <form class="row g-3 justify-content-start mt-3" method="POST" action="{{ route('kuesioner.export') }}">
                @csrf
                <div class="mt-2">
                    <div class="mb-3">
                        <label for="year" class="form-label">Pilih Tahun</label>
                        <select class="form-control" name="year" id="year">
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                        </select>
                    </div>
                    <div class="mb-3 d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">
                            <i class="fa-solid fa-file me-2"></i> Import</button>
                    </div>
                </div>
            </form>
            <div class="card mb-3">
                <div class="card-header">
                    Tahun Saat Ini ({{ date('Y') }})
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap ">
                        <table class="table table-bordered">
                            <tr>
                                <th>No.</th>
                                <th>Id Sampel</th>
                                <th>Sampel</th>
                                @for ($count=1; $count<=count($questions); $count++)
                                    <th>U{{$count}}</th>
                                @endfor
                                <th>Jumlah</th>
                                <th>NRRT</th>
                                <th>IKM</th>
                            </tr>
                            @if(!$respondents->isEmpty())
                            @foreach($respondents as $respondent)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="fw-semibold">{{ date('Y') . '12' . (10000 + $respondent->id)  }}</td>
                                    <td>1</td>
                                    @foreach ($respondent->respondentAnswers as $answer)
                                        <td>{{ $answer->answer->score }}</td>
                                    @endforeach
                                    <td>{{ $respondent->total_score }}</td>
                                    <td>{{ round($respondent->nrrt, 2) }}</td>
                                    <td>{{ round($respondent->ikm, 2) }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <th colspan="2">Jumlah</th>
                                <th>{{ count($respondents) }}</th>
                                @foreach ($questions as $question)
                                    <td>{{ $question->total }}</td>
                                @endforeach
                                <th>{{ $questions->sum('total') }}</th>
                                <th>{{ round($respondents->sum('nrrt'), 2) }}</th>
                                <th>{{ round($respondents->sum('ikm'), 2) }}</th>
                            </tr>
                            <tr>
                                <th colspan="3">NRR</th>
                                @foreach ($questions as $question)
                                    <td>{{ $question->total / count($respondents) }}</td>
                                @endforeach
                                <th>{{ $questions->sum('total') / count($respondents) }}</th>
                                <th>{{ $questions->sum('total') / count($respondents) }}</th>
                                <th></th>
                            </tr>
                            <tr>
                                <th colspan="3">NRRT</th>
                                @foreach ($questions as $question)
                                    <td>{{ round(($question->total / count($respondents))/count($questions), 2) }}</td>
                                @endforeach
                                <th>{{ round(($questions->sum('total') / count($respondents))/count($questions), 2) }}</th>
                                <th>{{ round(($questions->sum('total') / count($respondents))/count($questions), 2) }}</th>
                                <th></th>
                            </tr>
                            <tr>
                                <th colspan="3" class="text-white bg-primary">IKM</th>
                                <th class="fw-bold text-uppercase text-center text-white bg-primary" colspan="{{ count($questions) + 2 }}">
                                    @if ($respondents->sum('ikm')/count($respondents) >= 88.31 && $respondents->sum('ikm')/count($respondents) <= 100)
                                        Sangat Baik
                                    @elseif($respondents->sum('ikm')/count($respondents) >= 76.61 && $respondents->sum('ikm')/count($respondents) <= 88.30)
                                        Baik
                                    @elseif($respondents->sum('ikm')/count($respondents) >= 65 && $respondents->sum('ikm')/count($respondents) <= 76.60)
                                        Kurang Baik
                                    @else
                                        Tidak Baik
                                    @endif
                                </th>
                                <th class="bg-primary text-white">{{ round($respondents->sum('ikm')/count($respondents), 2) }}</th>
                            </tr>
                            @else
                            <tr>
                                <th colspan="{{ count($questions) + 6 }}" class="text-center text-danger fst-italic">Belum Ada Responden</th>
                            </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('extra_js')
@endsection
