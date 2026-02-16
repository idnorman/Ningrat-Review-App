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
											<ul class="breadcrumb">
												<li class="breadcrumb-item"><a href="{{ route('AdminDashboard') }}"><i class="feather icon-home"></i></a></li>
                                                <li class="breadcrumb-item">Master</li>
												<li class="breadcrumb-item"><a href="">Menu</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<!-- [ breadcrumb ] end -->
							<!-- [ Main Content ] start -->
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
										<h5 class="mb-0">Master Menu</h5>
										<a href="{{ route('showInsertMenuForm') }}" class="btn btn-sm btn-success">
											<i class="fas fa-plus"></i> Tambah
										</a>
									</div>
                                    <div class="card-body table-border-style">
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="exampleTable">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nama Menu</th>
                                                        <th>Kategori Menu</th>
														<th>Harga</th>
                                                        <th>Jumlah Menu Harian</th>
                                                        {{-- <th>Sisa Menu Harian</th> --}}
                                                        <th>Status Menu</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
													{{-- @dd($data) --}}
													@foreach ($data as $dataMenu)
													{{-- @dd($dataMenu); --}}
													<tr>
														<td>{{ $loop->iteration }}</td>
														<td>{{ $dataMenu->NAMA_MENU }}</td>
														<td>{{ $dataMenu->nama_kategori }}</td>
														<td>Rp {{ number_format($dataMenu->HARGA_MENU, 0, ',', '.') }}</td>
														<td>{{ $dataMenu->JUMLAH_HARIAN}}</td>
														{{-- <td>--</td> --}}
														<td>
															@if ($dataMenu->STATUS_MENU == 'Ready')
																<span class="badge badge-success">Tersedia</span>
															@else
																<span class="badge badge-danger">Habis</span>
															@endif
														<td>
															{{-- <button class="btn btn-success btn-sm">Preview</button> --}}
															<a href="{{ route('editMenu', $dataMenu->KODE_MENU) }}"
																class="btn btn-primary btn-sm">
																Edit
															</a>
															<button
																class="btn btn-danger btn-sm btn-delete"
																data-id="{{ $dataMenu->ID_MENU }}">
																Hapus
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

							<!-- [ Main Content ] end -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
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

		//Hapus Menu
		$(document).on('click', '.btn-delete', function () {

		let id = $(this).data('id');

		Swal.fire({
			title: 'Yakin hapus data?',
			text: "Data yang dihapus tidak bisa dikembalikan!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#d33',
			cancelButtonColor: '#6c757d',
			confirmButtonText: 'Ya, Hapus!',
			cancelButtonText: 'Batal'
		}).then((result) => {

			if (result.isConfirmed) {

				fetch("{{ url('/api/deleteMenu') }}/" + id, {
					method: "DELETE",
					headers: {
						'X-CSRF-TOKEN': '{{ csrf_token() }}',
						'Accept': 'application/json'
					}
				})
				.then(response => response.json())
				.then(res => {

					if (res.status === 'success') {

						Swal.fire({
							icon: 'success',
							title: 'Berhasil',
							text: res.message || 'Data berhasil dihapus',
							timer: 1500,
							showConfirmButton: false
						}).then(() => {
							location.reload();
						});

					} else {

						Swal.fire({
							icon: 'error',
							title: 'Gagal',
							text: res.message || 'Gagal menghapus data'
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
			}
		});
		});
    </script>
    
	<!-- [ Main Content ] end -->

