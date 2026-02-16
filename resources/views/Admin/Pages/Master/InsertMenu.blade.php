@include('Admin.Layouts.Header')
@include('Admin.Layouts.Sidebar')
@include('Admin.Layouts.Navbar')
@include('Admin.Layouts.Footer')

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- Breadcrumb -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="{{ route('AdminDashboard') }}">
                                                    <i class="feather icon-home"></i>
                                                </a>
                                            </li>
                                            <li class="breadcrumb-item">Master</li>
                                            <li class="breadcrumb-item">
                                                <a href="{{ route('adminMenu') }}">Menu</a>
                                            </li>
                                            <li class="breadcrumb-item">Edit Menu</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-0">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Edit Menu</h5>
                                        <hr>

                                        <div class="row">

                                            <div class="col-md-6">
                                                <form>

                                                    <div class="form-group">
                                                        <label>Nama Menu</label>
                                                        <input type="text" class="form-control" id="namaMenu"
                                                            value="{{ $menu->NAMA_MENU }}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Harga Menu</label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Rp</span>
                                                            </div>
                                                            <input type="text" class="form-control" id="hargaMenu"
                                                                value="{{ $menu->HARGA_MENU }}">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Jumlah Menu Harian</label>
                                                        <input type="number" class="form-control" id="jumlahHarian"
                                                            value="{{ $menu->JUMLAH_HARIAN }}">
                                                    </div>

                                                    <div class="form-group form-check">
                                                        <input type="checkbox" class="form-check-input" id="isSignature"
                                                            {{ $menu->IS_SIGNATURE ? 'checked' : '' }}>
                                                        <label class="form-check-label">
                                                            Signature Menu
                                                        </label>
                                                    </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label>Kategori Menu</label>
                                                    <select class="form-control" id="kategoriMenu">
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->ID_KATEGORI }}"
                                                                {{ $category->ID_KATEGORI == $menu->id_kategori ? 'selected' : '' }}>
                                                                {{ $category->NAMA_KATEGORI }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Deskripsi Menu</label>
                                                    <textarea class="form-control" id="deskripsiMenu" rows="4">{{ $menu->DESKRIPSI_MENU }}</textarea>
                                                </div>

                                            </div>

                                        </div>

                                        <h5 class="mt-5">Foto Menu</h5>
                                        <hr>

                                        <div class="row">

                                            <!-- Foto Utama -->
                                            <div class="col-md-6">
                                                <label>Foto Utama (Kosongkan jika tidak diganti)</label>
                                                <input class="form-control" type="file" id="formFile"
                                                    accept="image/*">

                                                @if ($menu->GAMBAR_MENU)
                                                    <div class="mt-2">
                                                        <img src="{{ asset('storage/' . $menu->GAMBAR_MENU) }}"
                                                            style="max-width:100%; border-radius:8px;">
                                                    </div>
                                                @endif
                                            </div>

                                            <!-- Slider -->
                                            <div class="col-md-6">
                                                <label>Tambah Slider Baru</label>
                                                <input class="form-control" type="file" id="formFileMultiple"
                                                    multiple accept="image/*">

                                                @if (isset($menu->sliders))
                                                    <div class="row mt-2">
                                                        @foreach ($menu->sliders as $slider)
                                                            <div class="col-4 mb-2">
                                                                <img src="{{ asset('storage/' . $slider->GAMBAR_SLIDER) }}"
                                                                    class="img-fluid rounded">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endif

                                            </div>

                                        </div>

                                    </div>

                                    <div class="card-footer d-flex justify-content-between">
                                        <a href="{{ route('adminMenu') }}" class="btn btn-secondary">
                                            Kembali
                                        </a>

                                        <button type="button" id="btnSubmit" class="btn btn-primary">
                                            Update
                                        </button>
                                    </div>

                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.getElementById('btnSubmit').addEventListener('click', function(e) {

        e.preventDefault();

        const formData = new FormData();

        formData.append('nama_menu', document.getElementById('namaMenu').value);
        formData.append('harga', document.getElementById('hargaMenu').value);
        formData.append('jumlah', document.getElementById('jumlahHarian').value);
        formData.append('kategori_id', document.getElementById('kategoriMenu').value);
        formData.append('deskripsi', document.getElementById('deskripsiMenu').value);
        formData.append('is_signature',
            document.getElementById('isSignature').checked ? 1 : 0);

        let fotoUtama = document.getElementById('formFile').files[0];
        if (fotoUtama) {
            formData.append('foto_utama', fotoUtama);
        }

        let sliders = document.getElementById('formFileMultiple').files;
        for (let i = 0; i < sliders.length; i++) {
            formData.append('slider_foto[]', sliders[i]);
        }

        fetch("{{ url('/api/updateMenu/' . $menu->KODE_MENU) }}", {
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            })
            .then(res => res.json())
            .then(res => {

                if (res.status === 'success') {

                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: res.message || 'Menu berhasil diperbarui',
                        timer: 2000,
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = "{{ route('adminMenu') }}";
                    });

                } else {

                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: res.message || 'Gagal update menu'
                    });

                }

            })
            .catch(() => {

                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Terjadi kesalahan server'
                });

            });

    });
</script>
