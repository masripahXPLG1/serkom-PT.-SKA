@php
    $alamat = 'Jl. Raya Pajajaran No. 88 F Kota Bogor 16153';
    $linkMaps = 'https://www.google.com/maps/search/?api=1&query=' . urlencode($alamat);
@endphp

<footer id="kontak" class="bg-dark text-white pt-5 pb-3">
    <div class="container">
        <div class="row g-4">

            {{-- Kolom 1: Identitas --}}
            <div class="col-lg-4">
                <div class="d-flex align-items-center mb-3">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo PT. SKA" height="44" class="me-2 bg-white rounded p-1">
                    <h5 class="fw-bold mb-0">PT. SKA</h5>
                </div>
                <p class="text-white-50">
                    Website resmi layanan koneksi, infrastruktur, dan informasi terkini dari PT. SKA.
                </p>
                <h6 class="mt-4 mb-3">Follow our social media</h6>
                <div class="d-flex gap-2">
                    <a href="https://wa.me/6282122262442" target="_blank" rel="noopener" title="WhatsApp"
                       class="btn btn-outline-light rounded-circle d-inline-flex align-items-center justify-content-center btn-sosial"><i class="bi bi-whatsapp"></i></a>
                    <a href="https://www.tiktok.com/" target="_blank" rel="noopener" title="TikTok"
                       class="btn btn-outline-light rounded-circle d-inline-flex align-items-center justify-content-center btn-sosial"><i class="bi bi-tiktok"></i></a>
                    <a href="{{ $instagram }}" target="_blank" rel="noopener" title="Instagram"
                       class="btn btn-outline-light rounded-circle d-inline-flex align-items-center justify-content-center btn-sosial"><i class="bi bi-instagram"></i></a>
                    <a href="https://www.youtube.com/" target="_blank" rel="noopener" title="YouTube"
                       class="btn btn-outline-light rounded-circle d-inline-flex align-items-center justify-content-center btn-sosial"><i class="bi bi-youtube"></i></a>
                </div>
            </div>

            {{-- Kolom 2: Alamat --}}
            <div class="col-lg-4">
                <h5 class="fw-bold mb-3">Alamat Perusahaan</h5>
                <ul class="list-unstyled text-white-50">
                    <li class="d-flex mb-3">
                        <i class="bi bi-geo-alt-fill text-orange me-3 fs-5"></i>
                        <a href="{{ $linkMaps }}" target="_blank" rel="noopener" class="footer-link" title="Buka di Google Maps">
                            {{ $alamat }}
                            <small class="d-block text-orange"><i class="bi bi-box-arrow-up-right"></i> Lihat di Google Maps</small>
                        </a>
                    </li>
                    <li class="d-flex mb-3"><i class="bi bi-envelope-fill text-orange me-3 fs-5"></i>
                        <a href="mailto:info@solusikoneksi.co.id" class="footer-link">info@solusikoneksi.co.id</a></li>
                    <li class="d-flex mb-3"><i class="bi bi-telephone-fill text-orange me-3 fs-5"></i>
                        <a href="tel:+628212262442" class="footer-link">+62 821-226-2442</a></li>
                    <li class="d-flex mb-3"><i class="bi bi-clock-fill text-orange me-3 fs-5"></i>
                        <span>Jam Operasional: Senin – Jumat, 06.30 - 17.00 WIB</span></li>
                </ul>
            </div>

            {{-- Kolom 3: Kirim Pesan --}}
            <div class="col-lg-4">
                <h5 class="fw-bold mb-3">Kirim Pesan</h5>

                @if (session('success'))
                    <div class="alert alert-success py-2 small">{{ session('success') }}</div>
                @endif

                <form action="{{ route('pesan.kirim') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="nama" placeholder="Nama" value="{{ old('nama') }}"
                               class="form-control @error('nama') is-invalid @enderror">
                        @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}"
                               class="form-control @error('email') is-invalid @enderror">
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <textarea name="pesan" rows="4" placeholder="Pesan"
                                  class="form-control @error('pesan') is-invalid @enderror">{{ old('pesan') }}</textarea>
                        @error('pesan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <button type="submit" class="btn btn-orange">
                        <i class="bi bi-send-fill me-1"></i> Kirim Pesan
                    </button>
                </form>
            </div>
        </div>

        <hr class="border-secondary mt-5">
        <p class="text-center text-white-50 small mb-0">© 2026 PT. SKA. All rights reserved.</p>
    </div>
</footer>