$(document).ready(function(){
    const form = document.getElementById('user_add_form');
    const inputs = document.querySelectorAll('.form__input');
    const formError = document.getElementById('form-error');
    const btnClear = document.getElementById('btn-clear');
    

    const expresiones = {
        address: /^[a-zA-Z0-9\_\-]{6,150}$/, // Letras, numeros, guion y guion_bajo
        fullname: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
        doc_type: /^[a-zA-Z]/,
        password: /^.{6,50}$/, // 4 a 12 digitos.
        email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
        number_doc: /^[a-zA-Z0-9\_\-]{8,15}$/
    }
    
    const campos = {
        fullname: false,
        doc_type: false,
        number_doc:false,
        email: false,
        password: false,
        address: false,
    }    


    $(document).on('submit', 'form#user_add_form', function(e) {
        e.preventDefault();
        if(campos.fullname && campos.doc_type && campos.number_doc && campos.email && campos.password && campos.address){
            var formData = new FormData(this);
            $.ajax({
                method: 'POST',
                url: $(this).attr('action'),
                dataType: 'json',
                data: formData,
                contentType: false,
                processData: false,
                success: function(result) {
                    if (result.success == true) {
                        toastr.success(result.msg);
                        form.reset();
                    } else {
                        toastr.error(result.msg);
                    }
                },
            });
        }else{
            
            if(formError.classList.contains('d-none')){
                formError.classList.remove('d-none');
                formError.classList.add('d-block');
            }
            setTimeout(() => {
                formError.classList.add('d-none');
                formError.classList.remove('d-block');
            }, 3000);
        }
    });
    

    const validarCampo = (expresion,input,campo) => {
        if(!expresion.test(input.value)){
            document.getElementById(campo).classList.add('is-invalid');
            document.getElementById(`span-${campo}`).classList.remove('d-none')
            document.getElementById(`span-${campo}`).classList.add('d-block')
            campos[campo] = false;
        }else{
            document.getElementById(campo).classList.remove('is-invalid');
            document.getElementById(`span-${campo}`).classList.remove('d-block')
            document.getElementById(`span-${campo}`).classList.add('d-none')
            campos[campo] = true;
        }
    }
    const validarFormulario = (e) => {
        switch (e.target.name) {
            case "fullname":
                validarCampo(expresiones.fullname,e.target,'fullname');
                break;
            case "doc_type":
                validarCampo(expresiones.doc_type,e.target,'doc_type');
                break;
            case "number_doc":
                validarCampo(expresiones.number_doc,e.target,'number_doc');
                break;
            case "email":
                validarCampo(expresiones.email,e.target,'email');
                break;
            case "password":
                validarCampo(expresiones.password,e.target,'password');
                break;
            case "address":
                validarCampo(expresiones.address,e.target,'address');
                break;
        }
    }

    inputs.forEach(input => {
        input.addEventListener('keyup',validarFormulario);
        input.addEventListener('blur',validarFormulario);
    });

    btnClear.addEventListener('click',() => {
        form.reset();
    })
});