@extends('template')

@section('script')
    <script src="js/data.js" defer></script>
@endsection

@section('content')
    

    <div class="container">        
        <div class="row">
            <div class="col-lg-12 my-3">
                <div class="form-inline">                    
                    <select name="" id="search-noSerial" class="form-control mr-2">
                        <option value="-">Serial Number</option>
                    </select>                
                    <button class="btn btn-primary" onclick="searchDataService()">Search </button>
                </div>
            </div>
        </div>

        <div class="row d-none" id="solved-form">
            <div class="col-lg-12 my-3"> 
                <div class="form-inline">
                    <input type="text" class="d-none" id="solved-id">
                    <input type="text" placeholder="Solved..." id="solved" class="form-control mr-2">                    
                    <button class="btn btn-primary" onclick="doneDataService()">Done</button>
                </div>
            </div>
        </div>

        <div class="row d-none" id="edit-form">
            <div class="col-lg-12 my-3">
                <input type="text" id="id" class="form-control d-none" placeholder="Nama" >
                <div class="form-group">
                    <input type="text" id="nama" class="form-control" placeholder="Nama">
                </div>
                <div class="form-group">
                    <input type="number" id="tlp" class="form-control" placeholder="No Tlp">
                </div>
                <div class="form-group">
                    <label for="">Tanggal Mulai</label>
                    <input type="date" id="tanggal" class="form-control" value="">
                </div>
                <div class="form-group">
                    <label for="">Tanggal Selesai</label>
                    <input type="date" id="tanggal-selesai" class="form-control" value="">
                </div>
                <div class="form-group">
                    <input type="text" id="jenis" class="form-control" placeholder="Jenis">
                </div>
                <div class="form-group">
                    <input type="number" id="serial_number" class="form-control" placeholder="Serial Number">
                </div>
                {{-- <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="foto">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div> --}}
                <div class="form-group">
                    <input type="text" class="form-control" id="keluhan" placeholder="Keluhan">
                </div>
                <div class="form-group">
                    <label for="">Status</label>
                    <select name="" id="status" class="form-control">
                        <option value=" ">Sedang Dikerjakan</option>
                        <option value="Selesai">Selesai</option>
                    </select>                    
                </div>                
                <div class="form-group">
                    <input type="text" class="form-control" id="edit-solved" placeholder="solved">
                </div>
                <div class="form-group">
                    <button class="btn btn-warning" onclick="saveEdit()">Edit</button>                    
                    <button class="btn btn-danger">Cancle</button>                    
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class=" table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>                                
                                <th>Nama</th>
                                <th>Tlp</th>                                
                                <th>Jenis</th>
                                <th>No Serial</th>
                                <th>Foto</th>
                                <th>Keluhan</th>
                                <th>Status</th>
                                <th colspan="3">Action</th>
                            </tr>
                        </thead>
                        <tbody id="service-data"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection