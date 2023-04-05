<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>MVC with API</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-lg-5">
                <a class="navbar-brand" href="#!">MVC TEST FOLARIUM-Muhammad imamul ikhlas</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="py-5">
            <div class="container px-lg-5">
                <div class="p-4 p-lg-5 shadow-lg rounded-3 text-center">
                    <div class="m-2 m-lg-2">
                        <ul class="nav nav-pills mb-3 shadow p-2 rounded" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Kontrak</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Pegawai</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Jabatan Pegawai</button>
                            </li>
                          </ul>
                            <div class="tab-content" id="pills-tabContent">
                            {{-- Kontrak --}}
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                                <div class="col-lg-12 my-4 d-flex justify-content-end">
                                    <button type="button" class="btn btn-primary  text-end">Tambah Kontrak</button>
                                </div>
                                <table class="table table-hover">
                                    <thead>
                                      <tr>
                                        <th scope="col">Nama Pegawai</th>
                                        <th scope="col">Jabatan Pegawai</th>
                                        <th scope="col">Tanggal Mulai</th>
                                        <th scope="col">Tanggal Selesai</th>
                                        <th scope="col">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <tbody id="table-kontrak">
                                            <!-- Data akan ditambahkan oleh JavaScript -->
                                        </tbody>
                                      </tr>                                      
                                    </tbody>
                                </table>
                            </div>
                            {{-- Pegawai --}}
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                                <table class="table table-hover">
                                    <thead>
                                      <tr>
                                        <th scope="col">Nama Pegawai</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">No Hp</th>
                                        <th scope="col">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody id="table-pegawai">
                                        <!-- Data akan ditambahkan oleh JavaScript -->
                                    </tbody>
								</table>
                            </div>
                            {{-- Jabatan Pegawai --}}
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
                                <table class="table table-hover">
                                    <thead>
                                      <tr>
                                        <th scope="col">Nama Jabatan</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody id="table-jabatan">
                                        <!-- Data akan ditambahkan oleh JavaScript -->
                                    </tbody>
								</table>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </header>
        <footer class="py-5 bg-dark fixed-bottom">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
            </div>
        </footer>
        <!-- JavaScript -->
        {{-- SHOW ALL DATA PEGAWAI --}}
        <script>
            // Mengambil data dari API menggunakan fetch()
            fetch('http://127.0.0.1:8000/pegawai')
                .then(response => response.json())
                .then(data => {
                    const tableBody = document.getElementById('table-pegawai');
                    // Membuat baris tabel untuk setiap item data
                    data.forEach(item => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${item.nama}</td>
                            <td>${item.alamat}</td>
                            <td>${item.no_telepon}</td>
                            <td>
                                <button type="button" class="btn btn-danger">Hapus</button>
                            </td>
                        `;
                        tableBody.appendChild(row);
                    });
                })
                .catch(error => console.error(error));
        </script>
        {{-- END SHOW ALL DATA PEGAWAI --}}
        {{-- SHOW ALL DATA JABATAN --}}
        <script>
            // Mengambil data dari API menggunakan fetch()
            fetch('http://127.0.0.1:8000/jabatan')
                .then(response => response.json())
                .then(data => {
                    const tableBody = document.getElementById('table-jabatan');
                    // Membuat baris tabel untuk setiap item data
                    data.forEach(item => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${item.nama_jabatan}</td>
                            <td>${item.deskripsi}</td>
                            <td>
                                <button type="button" class="btn btn-danger">Hapus</button>
                            </td>
                        `;
                        tableBody.appendChild(row);
                    });
                })
                .catch(error => console.error(error));
        </script>
        {{-- END SHOW ALL DATA JABATAN --}}
        {{-- SHOW ALL DATA KONTRAK --}}
        <script>
            // Mengambil data dari API menggunakan fetch()
            fetch('http://127.0.0.1:8000/kontrak')
                .then(response => response.json())
                .then(data => {
                    const tableBody = document.getElementById('table-kontrak');
                    // Membuat baris tabel untuk setiap item data
                    data.forEach(item => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${item.nama_pegawai}</td>
                            <td>${item.nama_jabatan}</td>
                            <td>${item.tanggal_mulai}</td>
                            <td>${item.tanggal_selesai}</td>
                            <td>
                                <button type="button" class="btn btn-danger">Hapus</button>
                            </td>
                        `;
                        tableBody.appendChild(row);
                    });
                })
                .catch(error => console.error(error));
        </script>
        {{-- END SHOW ALL DATA KONTRAK --}}
        <!-- Bootstrap core JS-->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        
    </body>
</html>
