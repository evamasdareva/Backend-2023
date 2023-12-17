// Fungsi untuk menampilkan hasil download
const showDownload = (result) => {
    console.log("Download selesai");
    console.log(`Hasil Download: ${result}`);
};

// Fungsi untuk download file
const download = (showDownload) => {
    return new Promise(function () {
        setTimeout(function () {
            showDownload("windows-10.exe");
        }, 3000);
    });
};

// Menggunakan Async Await
const main = async () => {
    console.log(await download(showDownload));
};
main();

