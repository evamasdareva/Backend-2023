// import method
const {index, store, update, destroy} = require('./fruitController')

const main = () => {
    console.log(`Menampilkan data buah-buahan`);
    index()

    console.log(`\n`);
    store('Pisang')

    console.log(`\n`);
    update(0, "Kelapa");

    console.log(`\n`);
    destroy(0)
}

main()