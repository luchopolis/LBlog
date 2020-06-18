
//Listener

const formSubmit = document.querySelector("#form");
const btnPreview = document.querySelector('#btnPreview');

btnPreview.addEventListener('click',(e) => {
    e.preventDefault()

    var form = document.getElementById('form');
    var formData = new FormData(form);

    //debugger
    //renderImage(formData);
    sendData(formData);
});

//||--------------||

/*function renderImage(formData){
    const imgtem = document.querySelector('#imgtemp');

    const file = formData.get('Image');
    //Creamos una URL temporal para la imagen obtenida del input Image, su vida
    //Depende del document, es decir, si se reinicia la pagina se muere :V
    const newImg = URL.createObjectURL(file);
    imgtem.setAttribute('src',newImg);
    console.log(newImg);

}
*/


//ContentType para el paso de archivos
//Si esta en false, para el paso de archivos
//ProcessData = false, evita la conversion a string

function sendData(formData){
    //console.log(formData.get('title'));
    /*formData.contentType = false;
    formData.processData = false;

    let AjaxV = new XMLHttpRequest();
    //var Params = "Title=" + formData.get('title') + "&image=" + formData.get('Image');

    AjaxV.open("POST","/preview");
    //Esto separa la url en formato clave valor -- Title=T&Content=mensjae....
    //AjaxV.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    //AjaxV.setRequestHeader('Content-type','multipart/form-data');
    AjaxV.onreadystatechange = function(){
        if(AjaxV.readyState == 4 && AjaxV.status == 200){
            alert(AjaxV.responseText);
        }
    }
    AjaxV.send(formData);*/


   var f = formData;
    $.ajax({
       url:"/preview",
       type:'POST',
       data:f,
       success:function(data){
            alert(data);
       },
        processData:false,
        contentType:false,

    });


}

