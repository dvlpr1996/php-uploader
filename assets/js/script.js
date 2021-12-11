const dropArea = document.querySelector(".uploader"),
	dragText = dropArea.querySelector("h3"),
	button = dropArea.querySelector(".btn-upload"),
	input = dropArea.querySelector(".input");
let file;

input.addEventListener("change", function () {
	file = this.files[0];
	dropArea.classList.add("active");
	showFile();
});

dropArea.addEventListener("dragover", function (event) {
	event.preventDefault();
	dropArea.classList.add("active");
	dragText.innerHTML = "Release to Upload File";
});

dropArea.addEventListener("dragleave", function (event) {
	event.preventDefault();
	dropArea.classList.remove("active");
	dragText.innerHTML = "Drag and drop a images or click here";
});

dropArea.addEventListener("drop", function (event) {
	dropArea.classList.add("active");
	dragText.innerHTML = "file is dropped";
	file = event.dataTransfer.files[0];
	showFile();
});

function showFile() {
	let fileReader = new FileReader();
	fileReader.onload = () => {
		let fileURL = fileReader.result;
		let imgTag = `<img src="${fileURL}" alt="user uploaded file" class="img-uploaded">`;
		$(".uploader").append(imgTag);
	}
	fileReader.readAsDataURL(file);
}