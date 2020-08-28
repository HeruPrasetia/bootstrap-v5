function prosesForm() {
    event.preventDefault();
    event.stopPropagation();
    let form = document.querySelector('#iniForm');
    let data = new FormData(form);
    if (form.checkValidity()) {
        fetch('data.php', {
            method: 'POST',
            body: data
        }).then(response => response.json()).then(hasil => {
            if (hasil.status == "berhasil") {
                alert(hasil.pesan);
            } else alert(hasil.pesan);
        }).catch((error) => {
            alert("Error: " + error);
        });
    } else {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }
}

function load(url, id = "tampil") {
    fetch(url)
        .then(response => response.text())
        .then(hasil => {
            document.getElementById(id).innerHTML = hasil;
            if (hasil.includes("<script>")) {
                let start = hasil.indexOf("<script>") + 8;
                let end = hasil.indexOf("</script>");
                let script = hasil.substring(start, end);
                let node = document.createElement("script");
                let ss = document.createTextNode(script);
                node.appendChild(ss);
                document.getElementById(id).appendChild(node);
            }
        }).catch((error) => {
            alert("Error: " + error);
        });
}

function Number_Format(ini) {
    ini = ini || 0;
    let number_string = ini.toString().replace(/[^.\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);
    if (ribuan) {
        separator = sisa ? "," : "";
        rupiah += separator + ribuan.join(",");
    }
    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
    return rupiah;
}

function lazyLoad(div, jml) {
    return new Promise(function(resolve) {
        let html = ``;

        for (let i = 0; i < jml; i++) {
            html += `
            <div class="col mb-2">
            <div class="card card-product">
            <div class="card-header mid-big lazyColor" style="height: 150px;">
                    </div>
                    <div class="card-body">
                    <div class="mid lazyColor"></div>
                        <div class="mid lazyColor"></div>
                    </div>
                    </div>
            </div>`;
        }
        document.getElementById(div).innerHTML = html;
        resolve(true);
    });
}