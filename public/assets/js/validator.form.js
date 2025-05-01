const signup_expresions = {
  username: /^(?=.*[A-Za-z])[A-Za-z\d\s\-!"#$%&'()*+,./:;<=>?@[\\\]^_{|}~]{4,30}$/,
  password: /^(?=.*[A-Za-z])[A-Za-z\d\s\-!"#$%&'()*+,./:;<=>?@[\\\]^_{|}~]{4,15}$/,
};

const category_expresions = {
  name: /^(?=(?:.*[A-Za-z]){4,30})[A-Za-z\d\t ]+$/, 
  description: /^(?=.*[A-Za-zÁÉÍÓÚÜÑáéíóúüñ])[A-Za-zÁÉÍÓÚÜÑáéíóúüñ\d\s\-!"#$%&'()*+,.\/:;<=>?@[\\\]^_{|}~]{4,500}$/,
};

const car_expresions = {
  name: /^(?=(?:.*[A-Za-z]){2,30})[A-Za-z\d\t ]+$/,
  description: /^(?=.*[A-Za-zÁÉÍÓÚÜÑáéíóúüñ])[A-Za-zÁÉÍÓÚÜÑáéíóúüñ\d\s\-!"#$%&'()*+,.\/:;<=>?@[\\\]^_{|}~]{4,500}$/,
  brand: /^[a-zA-ZÀ-ÿ\s]{3,30}$/,
};

document.addEventListener("DOMContentLoaded", () => {
    const config = [
        { form: document.querySelector("#signup_form"), expr: signup_expresions },
        { form: document.querySelector("#category_form"), expr: category_expresions },
        { form: document.querySelector("#car_form"), expr: car_expresions }
    ];

    //Ejecuto el validador
    config.forEach(({ form, expr }) => {
        if(!form) return;

        const fields = form.querySelectorAll(".form-control");
        validateForm(form, fields, expr);
    });
});

const validateForm = ($form, $fields, $expressions) => {
    if(!$form || !$fields || !$expressions) return;

    const isValueValid = (key, value) => $expressions[key].test(value);

    const isValidNameExpressionKey = name => $expressions.hasOwnProperty(name);

    const setValidationClasses = e => {
        if(!isValidNameExpressionKey(e.target.name)) return;

        const element = document.getElementById(e.target.id);

        if(!isValueValid(e.target.name, e.target.value)) {
            element.classList.remove("is-valid");
            element.classList.add("is-invalid");
            return;
        }

        element.classList.remove("is-invalid");
        element.classList.add("is-valid");
    };

    $fields.forEach((field) => {
        field.addEventListener("keyup", setValidationClasses);
        field.addEventListener("blur", setValidationClasses);
    });
};
