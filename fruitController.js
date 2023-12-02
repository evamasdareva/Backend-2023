// import data
const fruits = require('./data.js')

// menampilkan semua data
const index = () => {
    for (const fruit of fruits) {
        console.log(fruit)
    }
}

// menambahkan data
const store = (name) => {
    fruits.push(name)

    console.log(`Menambahkan data ${name}`)
    index()
}

// mengupdate data berdasarkan indeks
const update = (index, newName) => {
    if (index >= 0 && index < fruits.length) {
        const oldName = fruits[index]
        fruits[index] = newName
        console.log(`Mengupdate data dari ${oldName} menjadi ${newName}`)
    } else {
        console.log(`Indeks ${index} tidak valid`)
    }
}

// menghapus data berdasarkan indeks
const destroy = (index) => {
    if (index >= 0 && index < fruits.length) {
        const deletedFruit = fruits.splice(index, 1)
        console.log(`Menghapus data ${deletedFruit[0]}`)
    } else {
        console.log(`Indeks ${index} tidak valid`)
    }
}

// export method
module.exports = { index, store, update, destroy }