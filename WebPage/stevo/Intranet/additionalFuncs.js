/**
 * Created by Stefan on 5/6/2017.
 */


function storeDoc(){
    var formData = new FormData();
    formData.append("kategoria_z_menu",$('#CatToPost'));
    formData.append('file', $('#focusedInputDoc2')[0].files[0]); //file
    formData.append('nazov', $('#focusedInput')); //nazov
    $.ajax({
        url : 'http://147.175.98.170/final/storeDocument.php',
        type : 'POST',
        data : formData,
        processData: false,  // tell jQuery not to process the data
        contentType: false,  // tell jQuery not to set contentType
        success : function(data) {
            console.log(data);
            alert(Stored);
        }
    });
}


function storeCat(){

    var formData = new FormData();
    formData.append("kategoria_z_menu",$('#CatToPost'));
    formData.append('categoryName', $('#categoryInput')); //nazov
    $.ajax({
        url : 'http://147.175.98.170/final/storeDocument.php',
        type : 'POST',
        data : formData,
        processData: false,  // tell jQuery not to process the data
        contentType: false,  // tell jQuery not to set contentType
        success : function(data) {
            console.log(data);
            alert(data);
        }
    });
}





