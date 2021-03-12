$(document).ready(function(){
// ck editor
    ClassicEditor
    .create( document.querySelector('#body'))
    .then( editor => {
        console.log( editor );
    } )


    $('#selectAllBoxes').click(function (event) { 
     

        if(this.checked){
            $('.checkbox').each(function(){
                this.checked=true;
            });
        }
        else{
            $('.checkbox').each(function(){
                this.checked=false;


            })
        }
    });




})







