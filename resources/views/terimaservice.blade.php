@extends('template')

@section('script')
    <script src="js/service.js" defer></script>
@endsection

@section('content')

    <div class="container">

        <div class="row d-none" id="success-alert">
            <div class="col lg-12 my-3">
                <div class="alert alert-success">1 Data Recorded !</div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 my-3">
        
                <div class="form-group">
                    <input type="text" id="nama" class="form-control" placeholder="Nama">
                </div>
                <div class="form-group">
                    <input type="number" id="tlp" class="form-control" placeholder="No Tlp">
                </div>
                <div class="form-group">
                    <input type="date" id="tanggal" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" id="jenis" class="form-control" placeholder="Jenis">
                </div>
                <div class="form-group">
                    <input type="number" id="serial_number" class="form-control" placeholder="Serial Number">
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="foto">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="keluhan" placeholder="Keluhan">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" onclick="saveService()">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection