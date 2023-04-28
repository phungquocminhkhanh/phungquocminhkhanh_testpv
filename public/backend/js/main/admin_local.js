
const urlapi = $("#urlapi").val();; //udn khi up host
const urlserver = ""; //udn khi up host


function select_img(id, item,width="",height="") {
    var fileInput = document.getElementById(id);
    var filePath = fileInput.value; //lấy giá trị input theo id
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i; //các tập tin cho phép
    //Kiểm tra định dạng
    if (!allowedExtensions.exec(filePath)) {
        alert(
            "Vui lòng thêm các icon có định dạng: .jpeg/.jpg/.png/.gif only."
        );
        fileInput.value = "";
        return false;
    } else {
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById(item).innerHTML =
                    `<img style="${(width!="")?`width:${width}`:``};${(height!="")?`height:${height};`:``}" src="` +
                    e.target.result +
                    `"/>`;
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}
 function output_img(url,item,width="",height="") {
    document.getElementById(item).innerHTML =
        `<img style="${(width!="")?`width:${width}`:``};${(height!="")?`height:${height};`:``}" src="` +
        url +
        `"/>`;
}