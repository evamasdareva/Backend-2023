// Fungsi untuk menampilkan hasil download
const showDownload = (result) => {
    console.log("Download selesai");
    console.log(`Hasil Download: ${result}`);
};

// Fungsi untuk download file
const download = () => {
    return new Promise((resolve) => {
        setTimeout(() => {
            const result = "windows-10.exe";
            resolve(result);
        }, 3000);
    });
};

// Consume Promise
download()
    .then((result) => {
        showDownload(result);
    })
    .catch((error) => {
        console.error("Error:", error);
    });

// Menggunakan Async Await
const mainAsyncAwait = async () => {
    try {
        const result = await download();
        showDownload(result);
    } catch (error) {
        console.error("Error:", error);
    }
};
