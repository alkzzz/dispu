<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kuesioner</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- FontAwesome 6.2.0 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="{{ asset('assets/vendor/ckeditor5/ckeditor.js') }}"></script>
</head>
<body>
<table class="table table-bordered">
    <tr>
        <th>No.</th>
        <th>Id Sampel</th>
        <th>Sampel</th>
        <th>Jenis Kelamin</th>
        <th>Pendidikan</th>
        <th>Pekerjaan</th>
        <th>Layanan yang diterima</th>
        @for ($count=1; $count<=count($questions); $count++)
            <th>U{{$count}}</th>
        @endfor
        <th>Jumlah</th>
        <th>NRRT</th>
        <th>IKM</th>
        <th>Saran Perbaikan dan/atau Apresiasi</th>
    </tr>
    @if(!$respondents->isEmpty())
    @foreach($respondents as $respondent)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td class="fw-semibold">{{ date('Y') . '12' . (10000 + $respondent->id)  }}</td>
            <td>1</td>
            <td>{{ $respondent->sex }}</td>
            <td>{{ $respondent->education }}</td>
            <td>{{ $respondent->job }}</td>
            <td>{{ $respondent->received_services }}</td>
            @foreach ($respondent->respondentAnswers as $answer)
                <td>{{ $answer->answer->score }}</td>
            @endforeach
            <td>{{ $respondent->total_score }}</td>
            <td>{{ round($respondent->nrrt, 2) }}</td>
            <td>{{ round($respondent->ikm, 2) }}</td>
            <td>{{ $respondent->opinion }}</td>
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
</body>
</html>
