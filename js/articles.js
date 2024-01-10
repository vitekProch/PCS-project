import { activeAfterClick } from './functionPack.js';

let articleNavMenu = document.getElementById("article-nav__menu");
let articleNavItem = articleNavMenu.getElementsByClassName("article-nav__item");
activeAfterClick(articleNavItem);