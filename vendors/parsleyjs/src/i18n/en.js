// This is included with the Parsley library itself,
// thus there is no use in adding it to your project.
import Parsley from '../parsley/main';

Parsley.addMessages('en', {
  defaultMessage: "El valor ingresado no es válido.",
  type: {
    email:        "Debe ser un correo electrónico válido.",
    url:          "Debe ser una url válida.",
    number:       "El valor debe ser un número válido.",
    integer:      "El valor debe ser un entero válido.",
    digits:       "El valor debe ser de dígitos.",
    alphanum:     "El valor debe ser alfanumérico."
  },
  notblank:       "El valor no debe estar en blanco.",
  required:       "Este campo es obligatorio.",
  pattern:        "El valor ingresado no es válido.",
  min:            "Este valor debe ser mayor o igual a %s.",
  max:            "Este valor debe ser inferior o igual a %s.",
  range:          "El valor debe estar entre %s y %s.",
  minlength:      "El valor es demasiado corto. Debería tener %s caracteres o más.",
  maxlength:      "El valor es demasiado largo. Debería tener %s caracteres o menos.",
  length:         "La longitud de este valor no es válida. Debe tener una longitud de entre %s y %s caracteres.",
  mincheck:       "Debe seleccionar al menos %s opciones.",
  maxcheck:       "Debe seleccionar %s opciones o menos.",
  check:          "Debe seleccionar entre las opciones %s y %s.",
  equalto:        "Este valor debe ser el mismo."
});

Parsley.setLocale('en');
