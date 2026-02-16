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
												<li class="breadcrumb-item"><a href="">Orders</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<!-- [ breadcrumb ] end -->
							<!-- [ Main Content ] start -->
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Order List</h5>
                                    </div>
                                    <div class="card-body table-border-style">
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="exampleTable">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nama Customer</th>
                                                        <th>Kontak</th>
                                                        <th>Detail Menu</th>
                                                        <th>Total Pesanan</th>
                                                        <th>Tanggal Order</th>
                                                        <th>Opsi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Nasi Goreng</td>
                                                        <td>Makanan</td>
                                                        <td>50</td>
                                                        <td>40</td>
                                                        <td><span class="badge badge-success">Tersedia</span></td>
                                                        <td>
                                                            <button class="btn btn-success btn-sm">Preview</button>
                                                            <button class="btn btn-primary btn-sm">Edit</button>
                                                            <button class="btn btn-danger btn-sm">Hapus</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Nasi Padang</td>
                                                        <td>Makanan</td>
                                                        <td>20</td>
                                                        <td>19</td>
                                                        <td><span class="badge badge-success">Tersedia</span></td>
                                                        <td>
                                                            <button class="btn btn-success btn-sm">Preview</button>
                                                            <button class="btn btn-primary btn-sm">Edit</button>
                                                            <button class="btn btn-danger btn-sm">Hapus</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Thai Tea</td>
                                                        <td>Minuman</td>
                                                        <td>30</td>
                                                        <td>24</td>
                                                        <td><span class="badge badge-success">Tersedia</span></td>
                                                        <td>
                                                            <button class="btn btn-success btn-sm">Preview</button>
                                                            <button class="btn btn-primary btn-sm">Edit</button>
                                                            <button class="btn btn-danger btn-sm">Hapus</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>Sosis Goreng</td>
                                                        <td>Cemilan</td>
                                                        <td>15</td>
                                                        <td>12</td>
                                                        <td><span class="badge badge-success">Tersedia</span></td>
                                                        <td>
                                                            <button class="btn btn-success btn-sm">Preview</button>
                                                            <button class="btn btn-primary btn-sm">Edit</button>
                                                            <button class="btn btn-danger btn-sm">Hapus</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>Air Mineral</td>
                                                        <td>Minuman</td>
                                                        <td>100</td>
                                                        <td>78</td>
                                                        <td><span class="badge badge-success">Tersedia</span></td>
                                                        <td>
                                                            <button class="btn btn-success btn-sm">Preview</button>
                                                            <button class="btn btn-primary btn-sm">Edit</button>
                                                            <button class="btn btn-danger btn-sm">Hapus</button>
                                                        </td>
                                                    </tr>
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
    </script>
    
	<!-- [ Main Content ] end -->

