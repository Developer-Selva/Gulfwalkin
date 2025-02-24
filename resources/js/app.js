import './bootstrap';

import Alpine from 'alpinejs';
import 'bootstrap';
import { Tooltip, Toast, Popover } from 'bootstrap';
import $ from 'jquery';
import 'toastr/build/toastr.min.css';
import toastr from 'toastr';  
window.$ = $; 

window.Alpine = Alpine;

Alpine.start();
