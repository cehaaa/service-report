function showDataService(){
    fetch("http://localhost:8000/api/servicedata",{
        method : "GET"
    })
    .then( res => res.json())
    .then( data => {
        let t = document.getElementById('service-data');
        let s_noS = document.getElementById("search-noSerial");        

        t.innerHTML = " ";
        data.forEach(i => {

            s_noS.innerHTML += `
                <option value="${i.serial_number}">${i.serial_number}</option>
            `            

            if(i.status == null || i.status== " "){
                t.innerHTML += `
                    <tr>                    
                        <td>${i.nama}</td>
                        <td>${i.tlp}</td>                    
                        <td>${i.jenis}</td>
                        <td>${i.serial_number}</td>
                        <td>
                            <img src="${i.foto}" class="img-fluid" style="width:100px; height:100px;">
                        </td>
                        <td>${i.keluhan}</td>
                        <td>
                            <span class="badge badge-warning">Sedang Dikerjakan</span>
                        </td>    
                        <td>
                            <button class="btn btn-warning" onclick="showEditForm('${i.id}','${i.nama}','${i.tlp}','${i.tanggal}','${i.tanggal_selesai}','${i.jenis}','${i.serial_number}','${i.keluhan}','${i.status}','${i.solved}',)">Edit</button>
                        </td>
                        <td>
                            <button class="btn btn-success" onclick="solvedService('${i.id}')">Selesai</button>
                        </td>                
                        <td>
                            <button class="btn btn-danger" onclick="deleteDataService('${i.id}')">Hapus</button>
                        </td>                        
                    </tr>                
                `;
            }else{
                t.innerHTML += `
                    <tr>                    
                        <td>${i.nama}</td>
                        <td>${i.tlp}</td>                        
                        <td>${i.jenis}</td>
                        <td>${i.serial_number}</td>
                        <td>
                            <img src="${i.foto}" class="img-fluid" style="width:100px; height:100px;">
                        </td>
                        <td>${i.keluhan}</td>
                        <td>
                            <span class="badge badge-success">${i.status}</span>
                        </td>
                        <td>
                        <button class="btn btn-warning" onclick="showEditForm('${i.id}','${i.nama}','${i.tlp}','${i.tanggal}','${i.tanggal_selesai}','${i.jenis}','${i.serial_number}','${i.keluhan}','${i.status}','${i.solved}',)">Edit</button>
                        </td>    
                        <td>
                            <button class="btn btn-success" onclick="solvedService('${i.id}')">Selesai</button>
                        </td>                
                        <td>
                            <button class="btn btn-danger" onclick="deleteDataService('${i.id}')">Hapus</button>
                        </td>                        
                    </tr>                
                `;
            }            

        });
    })
}

function resetDataService(){
    let t = document.getElementById("service-data").innerHTML = "";

    if (t == ""){
        showDataService();
    }
}

function showEditForm(id,nama,tlp,tanggal,tanggal_selesai,jenis,serial_number,keluhan,status,solved){
    document.getElementById("edit-form").classList.remove('d-none');

    document.getElementById("id").value = id;
    document.getElementById('nama').value = nama;
    document.getElementById('tlp').value = tlp;
    document.getElementById('tanggal').value = tanggal;
    document.getElementById('tanggal-selesai').value = tanggal_selesai;
    document.getElementById('jenis').value = jenis;
    document.getElementById('serial_number').value = serial_number;
    // document.getElementById('foto').files[0] = foto;
    document.getElementById('keluhan').value = keluhan;
    document.getElementById('status').value = status;

    if(status == "Selesai"){
        document.getElementById("status").value="Selesai";
    }

    document.getElementById('edit-solved').value = solved;       
}

function formEdit(){    

    let nama = document.getElementById('nama').value;
    let tlp = document.getElementById('tlp').value;
    let tanggal = document.getElementById('tanggal').value;
    let tanggal_selesai = document.getElementById('tanggal-selesai').value;
    let jenis = document.getElementById('jenis').value;
    let serial_number = document.getElementById('serial_number').value;
    // let foto = document.getElementById('foto').files[0];
    let keluhan = document.getElementById('keluhan').value;
    let status = document.getElementById('status').value;    
    let solved = document.getElementById('edit-solved').value;    

    let formEdit = new FormData();

    let n = "0";

    formEdit.append("nama",nama)
    formEdit.append("tlp",tlp)
    formEdit.append("tanggal",tanggal)
    if(tanggal_selesai == ""){
        formEdit.append("tanggal_selesai",n)
    }else{
        formEdit.append("tanggal_selesai",tanggal_selesai)
    }
    formEdit.append("jenis",jenis)
    formEdit.append("serial_number",serial_number)
    // formEdit.append("foto",foto)
    formEdit.append("keluhan",keluhan)
    formEdit.append("status ",status)    
    formEdit.append("solved ",solved)           
    // formEdit.append("_method ","PUT")

    return formEdit;

}

function saveEdit(){    
    let id = document.getElementById("id").value;
    document.getElementById("edit-form").classList.add("d-none");
    fetch("http://localhost:8000/api/editservice/"+id,{        
        method : "post",
        body : formEdit(),
    })    
    .then(res => res.json())    
    .then(data => {
        // document.getElementById('service-data') = "";
        showDataService();
    })
}

function solvedService(id){    
    document.getElementById("solved-id").value = id;
    document.getElementById("solved-form").classList.remove('d-none');
    let solved = document.getElementById("solved").value;
    let done_form = new FormData();
    done_form.append("solved",solved);
    return done_form;
}

function doneDataService(){        
    let id = document.getElementById("solved-id").value;
    fetch('http://localhost:8000/api/doneservicedata/'+id,{
        method : "POST",
        body : solvedService(),
    })
    .then(res => res.json())
    .then(data => {
        resetDataService();
        successAlert();
        document.getElementById("solved-form").classList.add("d-none");
    })
}

function deleteDataService(id){
    fetch("http://localhost:8000/api/deleteservicedata/"+id,{
        method : "DELETE"
    })         
    .then(res => res.json())
    .then(data =>{
        deleteAlert();
        resetDataService();
    })
}

function searchDataService(){
    fetch("http://localhost:8000/api/servicedata",{
        method : "GET"
    })
    .then(res => res.json())
    .then(data => {        
        let s_noS = document.getElementById("search-noSerial").value;
        document.getElementById("service-data").innerHTML = "";
        data.filter( i =>{
            if(i.serial_number == s_noS){
                // if(i.status == " " || i.status == ""){}
                document.getElementById("service-data").innerHTML += `
                    <tr>
                        <td>${i.nama}</td>
                        <td>${i.tlp}</td>
                        <td>${i.jenis}</td>
                        <td>${i.serial_number}</td>
                        <td>
                            <img src="${i.foto}" class="img-fluid" style="width:100px; height:100px;">
                        </td>                        
                        <td>${i.keluhan}</td>
                        <td>
                            <span class="badge badge-warning">Sedang Dikerjakan</span>
                        </td>                
                        <td>
                            <button class="btn btn-danger" onclick="deleteDataService('${i.id}')">Hapus</button>
                        </td>    
                    </tr>
                `
            }
        })
    })
}

showDataService();