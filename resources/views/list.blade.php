@extends('layout.layout')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">Tables</h1>
            <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="shadow">
                                    <td class="align-self-center"></td>
                                    <td>Alokasi</td>
                                    <td>Jenis Anggaran</td>
                                    <td>Sumber Anggaran</td>
                                    <td>Dokumen</td>
                                    <td>Total Anggaran</td>
                                    <td><i class="fa fa-cog"></i></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row"><i class="fa fa-chevron-down"></i></td>
                                    <td>Pembangunan Jembatan</td>
                                    <td>APBD</td>
                                    <td>Pembangunan</td>
                                    <td><a href="c84442ef7d1488dc775201e2e59dce02.jpg">Dokumen</a></td>
                                    <td>4000000</td>
                                    <td>
                                            <a data-toggle="modal" data-target="#conDel" data-href="/del/"><i class="fa fa-trash"></i></a>
                                            <a href="/update/"><i class="fa fa-pen"></i></a>
                                        </td>
                                </tr>
                                <tr>
                                    <td scope="row"><i class="fa fa-chevron-up"></i></td>
                                    <td>Pembangunan Jembatan</td>
                                    <td>APBD</td>
                                    <td>Pembangunan</td>
                                    <td><a href="c84442ef7d1488dc775201e2e59dce02.jpg">Dokumen</a></td>
                                    <td>4000000</td>
                                    <td>
                                            <a data-toggle="modal" data-target="#conDel" data-href="/del/"><i class="fa fa-trash"></i></a>
                                            <a href="/update/"><i class="fa fa-pen"></i></a>
                                        </td>
                                </tr>
                                <?php 
                                $n = 1;
                                 ?>
                                @foreach ($dataCoba as $data)
                                <tr>
                                    <td><i class="fa fa-chevron-down"></i></td>
                                    <td>{{ $n++ }}</td>
                                    <td>{{ $data->nip }}</td>
                                    <td>{{ $data->nama }}</td>
                                        <td>
                                            <a data-toggle="modal" data-target="#conDel" data-href="/del/{{ $data->id }}"><i class="fa fa-trash"></i></a>
                                            <a href="/update/{{ $data->id }}"><i class="fa fa-pen"></i></a>
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

</div>
<!-- /.container-fluid -->
@endsection
@extends('layout.konfirmasi')
