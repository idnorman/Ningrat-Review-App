@include('Guess.Template.Navbar')
<main class="main">

    <!-- Book A Table Section -->
    <section id="book-a-table" class="book-a-table section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row g-0">
                <div class="col-lg-6 reservation-form-col" data-aos="fade-right" data-aos-delay="200">
                    <div class="reservation-form-container">
                        <div class="form-header content">
                            <span class="subtitle">Reservasi</span>
                            <h3>Buat Reservasi Sekarang </h3>
                            <p>Booking Table dan Menu Favorit kamu di waktu yang kamu inginkan sebelum kehabisan.</p>
                        </div>

                        <form action="forms/book-a-table.php" method="post" role="form" class="php-email-form">
                            <div class="row g-3">
                                <div class="col-12 form-group">
                                    <label for="name">Nama Lengkap</label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        placeholder="Your Name" required="">
                                </div>
                                <div class="col-12 form-group">
                                    <label for="phone">No HP</label>
                                    <input type="text" id="phone" class="form-control" name="phone"
                                        placeholder="Your Phone" required="">
                                </div>
                                <div class="col-12 form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" class="form-control" name="email"
                                        placeholder="Your Email" required="">
                                </div>
                                <div class="col-12 form-group">
                                    <label for="people">Jumlah Pengunjung</label>
                                    <select name="people" id="people" class="form-select" required="">
                                        <option value="">Pilih Jumlah Pengunjung</option>
                                        <option value="1">1 Orang</option>
                                        <option value="2">2 Orang</option>
                                        <option value="3">3 Orang</option>
                                        <option value="4">4 Orang</option>
                                        <option value="5">5 Orang</option>
                                        <option value="6">6+ Orang</option>
                                    </select>
                                </div>
                                <div class="col-12 form-group">
                                    <label for="date">Tanggal Pemesanan</label>
                                    <input type="date" id="date" name="date" class="form-control"
                                        required="">
                                </div>
                                <div class="col-12 form-group">
                                    <label for="time">Waktu Pemesanan</label>
                                    <input type="time" id="time" class="form-control" name="time"
                                        required="">
                                </div>

                                <div class="col-12 form-group">
                                    <label for="message">Notes</label>
                                    <textarea id="message" class="form-control" name="message" rows="2"
                                        placeholder="Tinggalkan Pesan untuk Reservasi kamu"></textarea>
                                </div>
                            </div>

                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Booking berhasil Dibuat, Mohon Datang pada waktu yang telah di tentukan, jika ada perubahan Mohon di Infokan ke Admin. Thank you!</div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn-book-table">Konfirmasi Reservasi</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-6 info-col" data-aos="fade-left" data-aos-delay="300">
                    <div class="restaurant-info">
                        <div class="info-image">
                            <img src="{{ asset('Guess/assets/img/restaurant/showcase-4.webp') }}"
                                alt="Restaurant interior" class="img-fluid">
                        </div>

                        <div class="info-content content">
                            <div class="restaurant-contact">
                                <h4>Informasi Resto</h4>

                                <div class="info-item" data-aos="fade-up" data-aos-delay="100">
                                    <div class="icon-box">
                                        <i class="bi bi-clock"></i>
                                    </div>
                                    <div class="info-text">
                                        <h5>Jam Operasional</h5>
                                        <p id="jam-operational">Setiap Hari : </p>
                                    </div>
                                </div>

                                <div class="info-item" data-aos="fade-up" data-aos-delay="200">
                                    <div class="icon-box">
                                        <i class="bi bi-geo-alt"></i>
                                    </div>
                                    <div class="info-text">
                                        <h5>Lokasi</h5>
                                        <p id="alamat">-</p>
                                    </div>
                                </div>

                                <div class="info-item" data-aos="fade-up" data-aos-delay="300">
                                    <div class="icon-box">
                                        <i class="bi bi-telephone"></i>
                                    </div>
                                    <div class="info-text">
                                        <h5>Whatsapp</h5>
                                        <p id="whatsapp"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="reservation-cta" data-aos="fade-up" data-aos-delay="500">
                                <h5>Whatsapp</h5>
                                <a href="tel:+14015558792" class="phone-button">
                                    <i class="bi bi-telephone-fill"></i>
                                    Tanya via Whatsapp
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Book A Table Section -->

</main>
@include('Guess.Template.Footer')
<script>
    //get Param
    fetch('/api/param?nama_param=Alamat')
        .then(response => response.json())
        .then(data => {
            document.getElementById('alamat').innerText = data.data.param_value;
        })
        .catch(() => {
            document.getElementById('alamat').innerText = 'Gagal ambil data';
        });
    fetch('/api/param?nama_param=Jam Operational')
        .then(response => response.json())
        .then(data => {
            document.getElementById('jam-operational').innerText = data.data.param_value;
        })
        .catch(() => {
            document.getElementById('jam-operational').innerText = 'Gagal ambil data';
        });
    fetch('/api/param?nama_param=whatsapp')
        .then(response => response.json())
        .then(data => {
            document.getElementById('whatsapp').innerText = data.data.param_value;
        })
        .catch(() => {
            document.getElementById('whatsapp').innerText = 'Gagal ambil data';
        });
</script>
