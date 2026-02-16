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
												<li class="breadcrumb-item"><a href="">Customer</a></li>
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
                                        <h5>Customer List</h5>
                                    </div>
                                    <div class="card-body table-border-style">
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="exampleTable">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nama Customer</th>
                                                        <th>No Whatsapp</th>
                                                        <th>Email</th>
                                                        <th>Total Pesanan</th>
                                                        <th>Status Pesanan</th>
                                                        <th>Opsi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Amri</td>
                                                        <td>000000000000</td>
                                                        <td>amri@yahoo.com</td>
                                                        <td>Rp. 150.000,-</td>
                                                        <td><span class="badge badge-success">Booked</span></td>
                                                        <td>
                                                            <button class="btn btn-success btn-sm">Cek Pesanan</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Fahri</td>
                                                        <td>0822082162</td>
                                                        <td>amri@yahoo.com</td>
                                                        <td>Rp. 200.000,-</td>
                                                        <td><span class="badge badge-primary">Selesai</span></td>
                                                        <td>
                                                            <button class="btn btn-success btn-sm">Cek Pesanan</button>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Amri</td>
                                                        <td>082244462</td>
                                                        <td>amri@yahoo.com</td>
                                                        <td>Rp. 150.000,-</td>
                                                        <td><span class="badge badge-warning">Cancle</span></td>
                                                        <td>
                                                            <button class="btn btn-success btn-sm">Cek Pesanan</button>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>Amri</td>
                                                        <td>08210462</td>
                                                        <td>amri@yahoo.com</td>
                                                        <td>Rp. 150.000,-</td>
                                                        <td><span class="badge badge-success">Booked</span></td>
                                                        <td>
                                                            <button class="btn btn-success btn-sm">Cek Pesanan</button>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>Amri</td>
                                                        <td>0822410462</td>
                                                        <td>amri@yahoo.com</td>
                                                        <td>Rp. 150.000,-</td>
                                                        <td><span class="badge badge-success">Booked</span></td>
                                                        <td>
                                                            <button class="btn btn-success btn-sm">Cek Pesanan</button>
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

