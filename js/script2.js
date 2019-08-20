const add = document.querySelector(".content .tambah");
const kolomTambah = document.querySelector(".content .kolom-tambah");
const tutupTambah = document.querySelector(".content .tutup-tambah");

const edit = document.querySelectorAll(".content .edit1");
const kolomEdit = document.querySelector(".content .kolom-edit1");
const tutupEdit = document.querySelector(".content .tutup-edit1");

const td = document.querySelectorAll("tbody tr td");

const inpNama = document.querySelectorAll(".kolom-edit1 input")[1];




add.addEventListener("click", function () {
    kolomTambah.style.display = "block";

});

tutupTambah.addEventListener("click", function () {
    kolomTambah.style.display = "none";
});

// edit.addEventListener("click", function () {
//     kolomEdit.style.display = "block";
// });



// td.forEach(function () {

// });
// edit.forEach(function (ed) {
//     ed.addEventListener("click", function (e) {
//         ed.addEventListener("click", function (e) {});
//         //     var getNama = td.getAttribute("name");
//         kolomEdit.style.display = "block";
//         // inpNama.setAttribute("value", getNama);
//         console.log(e.target);
//     });
// });


tutupEdit.addEventListener("click", function () {
    kolomEdit.style.display = "none";
});