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
                                            <li class="breadcrumb-item">Edit</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Edit Menu</h5>
                                </div>

                                <div class="card-body">

                                    <form id="editMenuForm" enctype="multipart/form-data">

                                        @csrf

                                        <div class="row">

                                            <div class="col-md-6 mb-3">
                                                <label>Nama Menu</label>
                                                <input type="text" class="form-control" id="namaMenu"
                                                    value="{{ $menu->NAMA_MENU }}">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label>Harga</label>
                                                <input type="number" class="form-control" id="hargaMenu"
                                                    value="{{ $menu->HARGA_MENU }}">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label>Jumlah Harian</label>
                                                <input type="number" class="form-control" id="jumlahHarian"
                                                    value="{{ $menu->JUMLAH_HARIAN }}">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label>Kategori</label>
                                                <select class="form-control" id="kategoriMenu">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->ID_KATEGORI }}"
                                                            {{ $category->ID_KATEGORI == $menu->ID_KATEGORI ? 'selected' : '' }}>
                                                            {{ $category->NAMA_KATEGORI }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label>Deskripsi</label>
                                                <textarea class="form-control" id="deskripsiMenu" rows="4">{{ $menu->DESKRIPSI_MENU }}</textarea>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label>Foto Utama (Opsional)</label>
                                                <input type="file" class="form-control" id="fotoUtama">

                                                @if ($menu->GAMBAR_MENU)
                                                    <div class="mt-2">
                                                        <img src="{{ asset('storage/' . $menu->GAMBAR_MENU) }}"
                                                            style="max-width:150px; border-radius:8px;">
                                                    </div>
                                                @endif
                                            </div>
                                            
                                            <div class="col-md-6 mb-3">
                                                <div class="form-check mt-4">
                                                    <input type="checkbox" class="form-check-input" id="isSignature"
                                                        {{ $menu->IS_SIGNATURE ? 'checked' : '' }}>
                                                    <label class="form-check-label">Signature Menu</label>
                                                </div>
                                            </div>

                                            <div class="col-md-12 mt-3">
                                                <a href="{{ route('manageSlider', $menu->ID_MENU) }}" class="btn btn-info">
                                                    Manage Slider
                                                </a>
                                                <button type="button" class="btn btn-primary" id="btnUpdate">
                                                    Update Menu
                                                </button>
                                                <a href="{{ route('adminMenu') }}" class="btn btn-secondary">
                                                    Batal
                                                </a>
                                            </div>

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

<script>
    document.getElementById('btnUpdate').addEventListener('click', function() {

        let nama = document.getElementById('namaMenu').value;
        let harga = document.getElementById('hargaMenu').value;
        let jumlah = document.getElementById('jumlahHarian').value;

        if (!nama || !harga || !jumlah) {
            Swal.fire('Error', 'Semua field wajib diisi', 'error');
            return;
        }

        let formData = new FormData();
        formData.append('nama_menu', nama);
        formData.append('harga', harga);
        formData.append('jumlah', jumlah);
        formData.append('kategori_id', document.getElementById('kategoriMenu').value);
        formData.append('deskripsi', document.getElementById('deskripsiMenu').value);
        formData.append('is_signature', document.getElementById('isSignature').checked ? 1 : 0);

        let foto = document.getElementById('fotoUtama').files[0];
        if (foto) {
            formData.append('foto_utama', foto);
        }

        fetch("{{ url('/api/updateMenu/' . $menu->ID_MENU) }}", {
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            })
            .then(response => response.json())
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
                Swal.fire('Error', 'Terjadi kesalahan server', 'error');
            });

    });

    
</script>
