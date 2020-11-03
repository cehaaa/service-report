function showDataService(){
    fetch("http://localhost:8000/api/servicedata",{
        method : "GET"
    })
    .then(res => res.json())
    .then(data => {
        let t = document.getElementById("service-data");
        data.filter( i => {                        
            if(i.status == 'Selesai'){
                t.innerHTML += `
                    <tr>
                        <td>${i.nama}</td>
                        <td>${i.tlp}</td>
                        <td>${i.tanggal}</td>
                        <td>${i.tanggal_selesai}</td>
                        <td>${i.jenis}</td>
                        <td>${i.serial_number}</td>
                        <td>
                            <img src="${i.foto}" class="img-fluid" style="width:100px; height:100px;">
                        </td>
                        <td>${i.keluhan}</td>
                        <td>${i.solved}</td>
                        <td>
                            <span class="badge badge-success">${i.status}</span>
                        </td>                                        
                        <td>
                            <button class="btn btn-primary" onclick="printData('${i.nama}','${i.tlp}','${i.tanggal}','${i.tanggal_selesai}','${i.jenis}','${i.serial_number}','${i.foto}','${i.keluhan}','${i.solved}',)">Cek Data Print</butto>
                        </td>
                    </tr>
                `
            }
        });
    })
}

function printData(nama,tlp,tanggal,tanggal_selesai,jenis,serial_number,foto,keluhan,solved){

    document.getElementById("form-print").classList.remove('d-none');
    document.getElementById("table-data-selesai").classList.add('d-none');

    document.getElementById('print-nama').innerHTML = nama;
    document.getElementById('print-tlp').innerHTML = tlp;
    document.getElementById('print-tgl').innerHTML = tanggal;
    document.getElementById('print-tglSelesai').innerHTML = tanggal_selesai;
    document.getElementById('print-jenis').innerHTML = jenis;
    document.getElementById('print-noSerial').innerHTML = serial_number;
    document.getElementById('print-foto').innerHTML = `
        <img src="${foto}" class="img-fluid">
    `;
    document.getElementById('print-keluhan').innerHTML = keluhan;
    document.getElementById('print-solved').innerHTML = solved;
}

function canclePrint(){
    document.getElementById("form-print").classList.add('d-none');
    document.getElementById("table-data-selesai").classList.remove('d-none');
}

showDataService();
