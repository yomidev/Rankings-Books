import "./bootstrap";
import "flowbite";
import Swal from "sweetalert2";
import jQuery from "jquery";

import Alpine from "alpinejs";

window.Alpine = Alpine;
window.Swal = Swal;
window.$ = jQuery;
Alpine.start();
