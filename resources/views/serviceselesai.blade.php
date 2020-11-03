@extends('template')

@section('script')
    <script src="js/service_selesai.js"></script>
@endsection

@section('content')
    <div class="container-fluid" id="table-data-selesai">
        <div class="row">
            <div class="col-lg-12 my-3">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>                                
                                <th>Nama</th>
                                <th>Tlp</th>
                                <th>Tanggal</th>
                                <th>Tgl Selesai</th>
                                <th>Jenis</th>
                                <th>No Serial</th>
                                <th>Foto</th>
                                <th>Keluhan</th>
                                <th>Solved</th>
                                <th>Status</th>                                
                                <th>Action</th>                                
                            </tr>
                        </thead>
                        <tbody id="service-data"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('print')
    <div class="container-fluid d-none" id="form-print">
        <div class="row">
            <div class="col-lg-12 my-3">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th colspan="2" class="text-center">Data Selesai Service</th>
                        </tr>
                    </thead>
                    <tbody class=" table-bordered">
                        <tr>
                            <td>Nama </td>
                            <td id="print-nama"></td>
                        </tr>
                        <tr>
                            <td>No Telp </td>
                            <td id="print-tlp"></td>
                        </tr>
                        <tr>
                            <td>Tanggal Mulai</td>
                            <td id="print-tgl"></td>
                        </tr>
                        <tr>
                            <td>Tanggal Selesai</td>
                            <td id="print-tglSelesai"></td>
                        </tr>
                        <tr>
                            <td>Jenis</td>
                            <td id="print-jenis"></td>
                        </tr>
                        <tr>
                            <td>No Serial</td>
                            <td id="print-noSerial"></td>
                        </tr>
                        <tr>
                            <td>Foto</td>
                            <td id="print-foto"></td>                            
                        </tr>
                        <tr>
                            <td>Keluahan</td>
                            <td id="print-keluhan"></td>
                        </tr>
                        <tr>
                            <td>Solved</td>
                            <td id="print-solved"></td>
                        </tr>
                        <tr>
                            <td>TTD TERIMA</td>
                            <td></td>                            
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 my-3">
                <button class="btn btn-primary" onclick="window.print()">Print</button>
                <button class="btn btn-danger" onclick="canclePrint()">Cancle Print</button>
            </div>
        </div>
    </div>
@endsection