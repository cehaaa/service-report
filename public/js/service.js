function serviceValue(){
    let nama = document.getElementById("nama").value;
    let tlp = document.getElementById("tlp").value;
    let tanggal = document.getElementById("tanggal").value;
    let jenis = document.getElementById("jenis").value;
    let serial_number = document.getElementById("serial_number").value;
    let foto = document.getElementById("foto").files[0];
    let keluhan = document.getElementById("keluhan").value;

    let serviceData = new FormData();
    serviceData.append("nama",nama);
    serviceData.append("tlp",tlp);
    serviceData.append("tanggal",tanggal);
    serviceData.append("jenis",jenis);
    serviceData.append("serial_number",serial_number);
    serviceData.append("foto",foto);
    serviceData.append("keluhan",keluhan);

    return serviceData;

}

function saveService(){
    fetch("http://localhost:8000/api/inserservicedata",{
        method : "POST",
        body : serviceValue()
    })
    .then(res => res.json())
    .then( data => {        

        successAlert();

        // document.getElementById("success-alert").classList.remove('d-none');

        document.getElementById("nama").value = "";
        document.getElementById("tlp").value = "";
        document.getElementById("tanggal").value = "";
        document.getElementById("jenis").value = "";
        document.getElementById("serial_number").value = "";        
        document.getElementById("keluhan").value = "";                

    })
}