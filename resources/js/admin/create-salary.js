import Datepicker from 'flowbite-datepicker/Datepicker';
import vi from "flowbite-datepicker/locales/vi";

Object.assign(Datepicker.locales, vi);

const birthday = document.getElementById("datepicker");
new Datepicker(birthday, {
    language: "vi",
    format: "dd/mm/yyyy",
    autohide: true,
})
