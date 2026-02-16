@include('Admin.Layouts.Header')
@include('Admin.Layouts.Sidebar')
@include('Admin.Layouts.Navbar')
@include('Admin.Layouts.Footer')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

	<!-- [ Main Content ] start -->
	<div class="pcoded-main-container">
		<div class="pcoded-wrapper">
			<div class="pcoded-content">
				<div class="pcoded-inner-content">
					<div class="main-body">
						<div class="page-wrapper">
							<!-- [ breadcrumb ] start -->
							<div class="page-header">
								<div class="page-block">
									<div class="row align-items-center">
										<div class="col-md-12">
											<div class="page-header-title">
												<h5>Admin</h5>
											</div>
											<ul class="breadcrumb">
												<li class="breadcrumb-item"><a href="{{ route('AdminDashboard') }}"><i class="feather icon-home"></i></a></li>
                                                <li class="breadcrumb-item">Master</li>
												<li class="breadcrumb-item"><a href="">Parameter</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<!-- [ breadcrumb ] end -->
							<!-- [ Main Content ] start -->
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="card">
                                        <div class="card-header">
											<div class="d-flex justify-content-between align-items-center">
												<h5>Parameter</h5>
											</div>
											<div class="card-header-title">

                                        </div>
                                        <div class="card-body table-border-style">
                                            <!-- ALERT -->
                                            <div id="alertBox"></div>
                                            <div class="session-scroll" style="height:478px;position:relative;">
                                                
                                                <table class="table" id="exampleTable">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>ID Parameter</th>
                                                            <th>Param Low Value</th>
                                                            <th>Param High Value</th>
                                                            <th>Param Value</th>
                                                            <th>Param Desc</th>
                                                            <th>Opsi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $no = 1;
                                                        @endphp
                                                        @foreach($data as $param)
                                                        <tr>
                                                            <td>{{$no++}}</td>
                                                            <td>P0{{$param->id}}</td>
                                                            <td>{{$param->param_low_value}}</td>
                                                            <td>{{$param->param_high_value}}</td>
                                                            <td>{{$param->param_value}}</td>
                                                            <td>{{$param->param_desc}}</td>
                                                            <td>
																<button
                                                                    class="btn btn-primary btn-sm btn-edit"
                                                                    data-id="{{ $param->id }}"
                                                                    data-low="{{ $param->param_low_value }}"
                                                                    data-high="{{ $param->param_high_value }}"
                                                                    data-value="{{ $param->param_value }}"
                                                                    data-desc="{{ $param->param_desc }}"
                                                                >
                                                                    Edit
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<!-- [ Main Content ] end -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

    {{-- Modal Edit --}}

    <div class="modal fade" id="editParamModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="editParamForm">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Parameter</h5>
                        <button type="button" class="btn-close" data-dismiss="modal">x</button>
                    </div>
    
                    <div class="modal-body">
                        <input type="hidden" id="paramId">
    
                        <div class="mb-3">
                            <label class="form-label">Param Low Value</label>
                            <input type="text" class="form-control" id="paramLow">
                        </div>
    
                        <div class="mb-3">
                            <label class="form-label">Param High Value</label>
                            <input type="text" class="form-control" id="paramHigh">
                        </div>
    
                        <div class="mb-3">
                            <label class="form-label">Param Value</label>
                            <input type="text" class="form-control" id="paramValue">
                        </div>
    
                        <div class="mb-3">
                            <label class="form-label">Param Description</label>
                            <textarea class="form-control" id="paramDesc" rows="3"></textarea>
                        </div>
                    </div>
    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Batal
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End Modal Edit     --}}

    <script>
        $(document).ready(function () {
            $('#exampleTable').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                lengthChange: true
            });
        });

    let editModal;

    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('btn-edit')) {

            document.getElementById('paramId').value   = e.target.dataset.id;
            document.getElementById('paramLow').value  = e.target.dataset.low;
            document.getElementById('paramHigh').value = e.target.dataset.high;
            document.getElementById('paramValue').value= e.target.dataset.value;
            document.getElementById('paramDesc').value = e.target.dataset.desc;

            editModal = new bootstrap.Modal(
                document.getElementById('editParamModal')
            );
            editModal.show();
        }
    });

    document.getElementById('editParamForm').addEventListener('submit', function (e) {
        e.preventDefault();

        let id = document.getElementById('paramId').value;
        console.log(id);

        fetch(`/api/param/${id}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                param_low_value: document.getElementById('paramLow').value,
                param_high_value: document.getElementById('paramHigh').value,
                param_value: document.getElementById('paramValue').value,
                param_desc: document.getElementById('paramDesc').value
            })
        })
        .then(res => res.json())
        .then(res => {
            if (res.status === 'success') {
                editModal.hide(); // ✅ BENAR
                showSuccess(res.message);
                location.reload();
            } else {
                showError(res.message);
            }
        })
        .catch(() => {
            showError('Terjadi kesalahan server');
        });
    });

    function showSuccess(message) {
        document.getElementById('alertBox').innerHTML = `
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> ${message}
                <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
            </div>
        `;

        setTimeout(() => $('.alert').alert('close'), 4000);
    }

    function showError(message) {
        document.getElementById('alertBox').innerHTML = `
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal!</strong> ${message}
                <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
            </div>
        `;

        setTimeout(() => $('.alert').alert('close'), 5000);
    }

    </script>
    
	<!-- [ Main Content ] end -->

