    window.addEventListener("load", function(){

    mostrarcontrasenya = document.querySelector('.show-password');
    mostrarcontrasenya.addEventListener('click', function(){
        contra = document.querySelector('.contrasenya');

        if(contra.type === "text"){
            contra.type = "password";
            mostrarcontrasenya.classList.remove('fa-eye-slash');
        }else{
            contra.type="text";
            mostrarcontrasenya.classList.toggle("fa-eye-slash");
        }
    })
})
