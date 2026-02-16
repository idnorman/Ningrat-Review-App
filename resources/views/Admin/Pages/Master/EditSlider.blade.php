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
                                            <li class="breadcrumb-item">Manage Slider</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Manage Slider - {{ $menu->NAMA_MENU }}</h5>
                                </div>

                                <div class="card-body">

                                    @csrf

                                    <!-- ADD SLIDER -->
                                    <div class="mb-4">
                                        <label><strong>Tambah Slider</strong></label>
                                        <input type="file" id="addSliderInput" multiple class="form-control">
                                    </div>

                                    <!-- SLIDER LIST -->
                                    <div class="row" id="sliderContainer"></div>

                                    <div class="mt-4">
                                        <button class="btn btn-warning" onclick="updateAllSlider({{ $menu->ID_MENU }})">
                                            Update Slider
                                        </button>

                                        <a href="{{ route('adminMenu') }}" class="btn btn-secondary">
                                            Kembali
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

<script>
    let sliderArray = [];

    /* =========================
       LOAD EXISTING SLIDER
    ========================= */

    @foreach ($sliders as $slide)
        sliderArray.push({
            id: {{ $slide->ID_SLIDER }},
            file: null,
            existing: "{{ $slide->FOTO_SLIDER }}"
        });
    @endforeach


    /* =========================
       RENDER SLIDER
    ========================= */

    function renderSlider() {

        let container = document.getElementById('sliderContainer');
        container.innerHTML = '';

        sliderArray.forEach((item, index) => {

            let imageUrl = item.file ?
                URL.createObjectURL(item.file) :
                "{{ asset('storage') }}/" + item.existing;

            container.innerHTML += `
<div class="col-md-4 mb-3">
<div class="card shadow-sm">

<img src="${imageUrl}" 
class="card-img-top" 
style="height:180px; object-fit:cover;">

<div class="card-body text-center">

<input type="file" 
class="form-control mb-2"
onchange="replaceSlider(${index}, this)">

<button class="btn btn-danger btn-sm"
onclick="deleteSlider(${index})">
Hapus
</button>

</div>
</div>
</div>
`;

        });

    }

    renderSlider();

    console.log(...formData);

    /* =========================
       ADD SLIDER
    ========================= */

    document.getElementById('addSliderInput').addEventListener('change', function(e) {

        let files = e.target.files;

        for (let i = 0; i < files.length; i++) {

            sliderArray.push({
                id: null,
                file: files[i],
                existing: null
            });

        }

        renderSlider();
        this.value = '';

    });


    /* =========================
       DELETE SLIDER
    ========================= */

    function deleteSlider(index) {

        Swal.fire({
            title: 'Yakin hapus slider?',
            icon: 'warning',
            showCancelButton: true
        }).then(result => {

            if (result.isConfirmed) {
                sliderArray.splice(index, 1);
                renderSlider();
            }

        });

    }


    /* =========================
       REPLACE SLIDER
    ========================= */

    function replaceSlider(index, input) {

        let file = input.files[0];
        if (!file) return;

        sliderArray[index].file = file;
        sliderArray[index].existing = null;

        renderSlider();

    }


    /* =========================
       UPDATE ALL SLIDER
    ========================= */

    function updateAllSlider(menuId) {

        if (sliderArray.length === 0) {
            Swal.fire('Warning', 'Slider kosong', 'warning');
            return;
        }

        let formData = new FormData();

        sliderArray.forEach((item) => {

            if (item.id) {
                formData.append('existing_ids[]', item.id);
            }

            if (item.file) {
                formData.append('files[]', item.file);
            }

        });

        fetch(`/api/slider/manage/${menuId}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            })
            .then(res => res.json())
            .then(res => {

                if (res.status === 'success') {
                    Swal.fire('Berhasil', res.message, 'success')
                        .then(() => location.reload());
                } else {
                    Swal.fire('Error', res.message, 'error');
                }

            })
            .catch(() => {
                Swal.fire('Error', 'Terjadi kesalahan server', 'error');
            });

    }
</script>
