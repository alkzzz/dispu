<div class="wrapper">
    <div class="container-fluid text-light" style="background-color: #3c52f9">
        <div class="row px-4 py-4">
            <div class="col-md-4 col-6 d-flex justify-content-center flex-column">
                <h5 class="mb-3">Section 1</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">About</a></li>
                </ul>
            </div>

            <div class="col-md-4 col-6 d-flex justify-content-center flex-column">
                <h5 class="mb-3">Section 1</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">About</a></li>
                </ul>
            </div>

            <div class="col-md-4 col-12 align-center mt-2">
                <div class="ratio ratio-16x9">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31860.240441941136!2d114.80843005366125!3d-3.463692138653264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de681cc99b0a255%3A0x953f3f7bf07a4696!2sDinas%20Pekerjaan%20Umum%20Dan%20Penataan%20Ruang%20Kota%20Banjarbaru!5e0!3m2!1sen!2sid!4v1681030290577!5m2!1sen!2sid"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        <hr class="border border-1 border-white mt-1 mb-1" />
        <div class="container-fluid" style="background-color: #3c52f9">
            <footer class="d-flex justify-content-between align-items-center">
                <p class="text-light mb-0 py-3">
                    Copyright © 2023 Dinas Pekerjaan Umum dan Penataan Ruang. All Rights Reserved.
                </p>
                <div class="text-light mb-0 py-3">
                    <div class="row d-flex justify-content-between">
                        <p class="mb-1 fw-bold">Statistik Kunjungan</p>
                        <div class="col">
                            <p class="mb-1">Hari ini: {{ $hari_ini }}</p>
                            <p class="mb-1">Kemarin: {{ $kemarin }}</p>
                            <p class="mb-1">Minggu Ini: {{ $minggu_ini }}</p>
                        </div>
                        <div class="col">
                            <p class="mb-1">Bulan Ini: {{ $bulan_ini }}</p>
                            <p class="mb-0">Total: {{ $total }}</p>
                        </div>
                    </div>
            </footer>
        </div>
    </div>
</div>
