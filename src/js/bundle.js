import "@babel/polyfill";

/* Underscores Scripts */
// import './underscores/customizer'; <- wp was not defined, will return to
// import './underscores/navigation';
import './underscores/skip-link-focus-fix';

/* Our Scripts */
import './global';
import './components/navbar';
import './components/search'; 

import AOS from 'aos';

AOS.init();