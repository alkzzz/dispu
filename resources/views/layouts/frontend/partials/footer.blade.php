<div class="wrapper">
    <div class="container-fluid text-light px-0 pt-2" style="background-color: #3c52f9">
        <div class="row px-4 py-4">
            @foreach ($footerlinks as $key => $linkSplit)
                <div class="col-md-4 col-6 d-flex justify-content-center flex-column">
                    <h5 class="mb-3">Link Terkait #{{ $key + 1 }}</h5>
                    <ul class="nav flex-column">
                        @foreach ($linkSplit as $link)
                            <li class="nav-item mb-2"><a href="{{ $link->url }}" target="_blank"
                                    class="nav-link p-0 text-light">{{ $link->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
            <div class="col-md-4 mt-3 mt-md-0 col-12 align-center mt-2">
                <div class="ratio ratio-16x9 border border-dark">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31860.240441941136!2d114.80843005366125!3d-3.463692138653264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de681cc99b0a255%3A0x953f3f7bf07a4696!2sDinas%20Pekerjaan%20Umum%20Dan%20Penataan%20Ruang%20Kota%20Banjarbaru!5e0!3m2!1sen!2sid!4v1681030290577!5m2!1sen!2sid"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        <div class="py-2 px-4" style="background-color: #030F6B">
            <footer class="d-flex justify-content-between align-items-center">
                <p class="col text-light fs-5 mb-0 py-2">
                    Dinas Pekerjaan Umum dan Penataan Ruang Kota Banjarbaru<br>
                    Alamat: Jl. Mitra Praja No.9 Banjarbaru<br>
                    Telp:(0511) 5931688
                </p>
                <div class="col text-light mb-0 py-2">
                    <div class="row d-flex justify-content-between">
                        <p class="mb-1 fw-semibold"><i class="fa-solid fa-chart-line"></i>
                            Statistik Kunjungan</p>
                        <div class="col">
                            <p class="mb-1">Hari ini: {{ $hari_ini }}</p>
                            <p class="mb-1">Kemarin: {{ $kemarin }}</p>
                            <p class="mb-1">Minggu Ini: {{ $minggu_ini }}</p>
                        </div>
                        <div class="col">
                            <p class="mb-1">Bulan Ini: {{ $bulan_ini }}</p>
                            <p class="mb-1">Tahun Ini: {{ $tahun_ini }}</p>
                            <p class="mb-0">Total: {{ $total }}</p>
                        </div>
                    </div>
                </div>
                {{-- <p class="col text-light mb-0 py-3">
                    Copyright © 2023 Dinas Pekerjaan Umum dan Penataan Ruang. All Rights Reserved.
                </p> --}}
            </footer>
        </div>
    </div>
</div>
