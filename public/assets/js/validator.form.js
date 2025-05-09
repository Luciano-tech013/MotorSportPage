const signup_expressions = {
    username: /^(?=.*[A-Za-z])[A-Za-z\d\s\-!"#$%&'()*+,./:;<=>?@[\\\]^_{|}~]{4,30}$/,
    password: /^(?=.*[A-Za-z])[A-Za-z\d\s\-!"#$%&'()*+,./:;<=>?@[\\\]^_{|}~]{4,15}$/
};

const category_expressions = {
    name: /^(?=.{1,30}$)(?=.*\p{L})[\p{L}\d ]+$/u,
    description: /^(?=.*\p{L})[\p{L}\d\p{P}\s]{4,5000}$/u
};
  
const car_expressions = {
    name: /^(?=.{2,30}$)(?=(?:.*[A-Za-z]){2,})(?!\s)[A-Za-z\d ]+(?<!\s)$/,    
    description: /^(?=.*\p{L})[\p{L}\d\p{P}\s]{4,5000}$/u,
    brand: /^(?=(?:.*[A-Za-z]){3,30})[A-Za-z\d\t ]+$/,
}

document.addEventListener("DOMContentLoaded", () => {
    const config = [
        { form: document.querySelector("#signup_form"), expr: signup_expressions },
        { form: document.querySelector("#category_form"), expr: category_expressions },
        { form: document.querySelector("#car_form"), expr: car_expressions }
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

        if(!isValueValid(e.target.name, e.target.value.trim())) {
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
