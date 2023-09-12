<footer class="p-5" style="background-color: #030F6B">
    <div class="row">
            @foreach ($footerlinks as $linkSplit)
                <div class="col-md-4 col-6 d-flex justify-content-center flex-column">
                    <h5 class="mb-3 text-white">Link Terkait</h5>
                    <ul class="nav flex-column">
                        @foreach ($linkSplit as $link)
                            <li class="nav-item mb-2">
                                <i class="fas fa-angle-right fa-xs me-1 text-white"></i>
                                <a href="{{ $link->url }}" target="_blank"
                                    class="d-inline nav-link p-0 text-light" style="font-size:0.9rem">{{ $link->title }}</a>
                            </li>
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
</footer>

<footer class="p-5 footer-info" style="">
    <div class="d-flex justify-content-between align-items-center">
        <div class="col text-light small mb-0 py-2">
            <b>Dinas Pekerjaan Umum dan Penataan Ruang Kota Banjarbaru</b>
            <br><br>
            {{ $contact->address }}<br>
            {{ $contact->phone_number }}
        </div>
        <div class="col text-light mb-0 py-2">
            <div class="row d-flex justify-content-between">
                <p class="mb-1 fw-semibold"><i class="fa-solid fa-chart-line"></i>
                    Statistik Kunjungan</p>
                <div class="col small">
                    <p class="mb-1">Hari ini: {{ $hari_ini }}</p>
                    <p class="mb-1">Kemarin: {{ $kemarin }}</p>
                    <p class="mb-1">Minggu Ini: {{ $minggu_ini }}</p>
                </div>
                <div class="col small">
                    <p class="mb-1">Bulan Ini: {{ $bulan_ini }}</p>
                    <p class="mb-1">Tahun Ini: {{ $tahun_ini }}</p>
                    <p class="mb-0">Total: {{ $total }}</p>
                </div>
            </div>
        </div>
    </div>
</footer>
