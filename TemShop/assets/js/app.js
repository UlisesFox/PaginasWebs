function validarPassword(contra) {
    const decimal = /^(?=.*\d)(?=.*[a-z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;

    if(contra.value.match(decimal)) {
    } else {
        alert("El password debe contener al menos una minúscula, mayúscula, número, un carácter especial y 8 carácteres como mínimo.")
    }
}