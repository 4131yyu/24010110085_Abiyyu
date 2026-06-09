<!-- Stats cards -->
<div class="row g-3 mb-4">
    <div class="col-sm-4">
        <div class="card text-bg-primary text-center">
            <div class="card-body">
                <h2 class="fw-bold mb-0">120</h2>
                <small>Users</small>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card text-bg-success text-center">
            <div class="card-body">
                <h2 class="fw-bold mb-0">45</h2>
                <small>Projects</small>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card text-bg-warning text-center">
            <div class="card-body">
                <h2 class="fw-bold mb-0">89</h2>
                <small>Tasks</small>
            </div>
        </div>
    </div>
</div>

<!-- ====== TABLE & VIDEO ====== -->
<div class="row g-4 mb-4">

    <!-- Table -->
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header fw-semibold bg-secondary text-white">
                Tabel Nilai Mahasiswa
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th rowspan="2" class="align-middle">Nama</th>
                                <th colspan="3">Nilai Tugas</th>
                                <th rowspan="2" class="align-middle">Rata-rata</th>
                            </tr>
                            <tr>
                                <th>Tugas 1</th>
                                <th>Tugas 2</th>
                                <th>Tugas 3</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Andi Pratama</td>
                                <td>80</td>
                                <td>85</td>
                                <td>90</td>
                                <td class="fw-semibold">85</td>
                            </tr>
                            <tr>
                                <td>Budi Santoso</td>
                                <td>75</td>
                                <td>80</td>
                                <td>70</td>
                                <td class="fw-semibold">75</td>
                            </tr>
                            <tr>
                                <td>Citra Dewi</td>
                                <td>90</td>
                                <td>95</td>
                                <td>92</td>
                                <td class="fw-semibold">92</td>
                            </tr>
                        </tbody>
                        <tfoot class="table-secondary">
                            <tr>
                                <td class="fw-semibold">Rata-rata Kelas</td>
                                <td>81</td>
                                <td>87</td>
                                <td>84</td>
                                <td class="fw-bold">84</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="card-footer text-muted small">
                Tabel dengan atribut <code>colspan</code> dan <code>rowspan</code> untuk mengatur tata letak kolom pada tabel.
            </div>
        </div>
    </div>

    <!-- Video -->
    <div class="col-lg-5">
        <div class="card h-100">
            <div class="card-header fw-semibold bg-secondary text-white">Video</div>
            <div class="card-body p-0">
                <div class="ratio ratio-16x9">
                    <video controls poster="https://cdn.coverr.co/videos/coverr-walking-to-the-mountain-top-8360/thumbnail">
                        <source src="https://cdn.coverr.co/videos/coverr-a-road-through-the-hills-6377/720p.mp4" type="video/mp4">
                        Browser Anda tidak mendukung elemen video.
                    </video>
                </div>
            </div>
            <div class="card-footer text-muted small">
                Video menggunakan atribut <code>poster</code> dan <code>src</code> dengan URL eksternal.
            </div>
        </div>
    </div>
</div>