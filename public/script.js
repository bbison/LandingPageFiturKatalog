function previewFiles() {
    const filePreview = document.getElementById('filePreview');
    const files = document.getElementById('fileInput').files;

    filePreview.innerHTML = ""; // Clear previous previews

    for (let i = 0; i < files.length; i++) {
        const file = files[i];
        const reader = new FileReader();

        reader.onload = function (e) {
            const container = document.createElement('div');
            container.classList.add('media-container');

            if (file.type.startsWith('image/')) {
                const img = document.createElement('img');
                img.src = e.target.result;
                container.appendChild(img);
            } else if (file.type.startsWith('video/')) {
                const video = document.createElement('video');
                video.src = e.target.result;
                video.controls = true;
                container.appendChild(video);
            }

            filePreview.appendChild(container);
        };

        reader.readAsDataURL(file);
    }
    document.getElementById('tombol').classList.remove('d-none');
}

function scrollLeftBtn() {
    const filePreviewContainer = document.getElementById('filePreviewContainer');
    filePreviewContainer.scrollBy({ left: -150, behavior: 'smooth' });
}

function scrollRightBtn() {
    const filePreviewContainer = document.getElementById('filePreviewContainer');
    filePreviewContainer.scrollBy({ left: 150, behavior: 'smooth' });
}

function total(harga) {
    document.getElementById('hargaDiskon').value = harga;
}

function minimal(hargaBeli) {
    let ongkir = document.getElementById('setting-ongkir').textContent;
    let admin = document.getElementById('setting-admin').textContent;
    let berat = document.getElementById('berat').value;
    let akhir = document.getElementById('hargaDiskon').value;

    let minimal = parseInt(hargaBeli) + ( parseInt(ongkir) * parseInt(berat) ) + parseInt(admin);


    document.getElementById('jual').value = minimal;
    document.getElementById('hargaDiskon').value = minimal;

    let untung = parseInt(akhir) - parseInt(minimal);
    document.getElementById('untung').textContent = parseInt(akhir)

}

function untung() {
    let hargaBeli = document.getElementById('hargaAsli').value;
    let ongkir = document.getElementById('setting-ongkir').textContent;
    let admin = document.getElementById('setting-admin').textContent;
    let berat = document.getElementById('berat').value;
    let akhir = document.getElementById('hargaDiskon').value;


    let minimal = parseInt(hargaBeli) + parseInt(ongkir) * parseInt(berat) + parseInt(admin);

    let untung = parseInt(akhir) - parseInt(minimal);
    document.getElementById('untung').textContent = untung
}






