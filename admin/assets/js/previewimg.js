const myFile = document.getElementById("myFile");
const hinh = document.getElementById("hinh");

myFile.onchange = evt => {
    const [file] = myFile.files
    if (file) {
      hinh.src = URL.createObjectURL(file)
    }
}