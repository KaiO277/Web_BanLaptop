var x, i, j, l, ll, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
    selElmnt = x[i].getElementsByTagName("select")[0];
    ll = selElmnt.length;
    /*for each element, create a new DIV that will act as the selected item:*/
    a = document.createElement("DIV");
    a.setAttribute("class", "select-selected");
    a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
    x[i].appendChild(a);
    /*for each element, create a new DIV that will contain the option list:*/
    b = document.createElement("DIV");
    b.setAttribute("class", "select-items select-hide");
    for (j = 1; j < ll; j++) {
        /*for each option in the original select element,
        create a new DIV that will act as an option item:*/
        c = document.createElement("DIV");
        c.innerHTML = selElmnt.options[j].innerHTML;
        c.addEventListener("click", function(e) {
            /*when an item is clicked, update the original select box,
            and the selected item:*/
            var y, i, k, s, h, sl, yl;
            s = this.parentNode.parentNode.getElementsByTagName("select")[0];
            sl = s.length;
            h = this.parentNode.previousSibling;
            for (i = 0; i < sl; i++) {
                if (s.options[i].innerHTML == this.innerHTML) {
                    s.selectedIndex = i;
                    h.innerHTML = this.innerHTML;
                    y = this.parentNode.getElementsByClassName("same-as-selected");
                    yl = y.length;
                    for (k = 0; k < yl; k++) {
                        y[k].removeAttribute("class");
                    }
                    this.setAttribute("class", "same-as-selected");
                    break;
                }
            }
            h.click();
        });
        b.appendChild(c);
    }
    x[i].appendChild(b);
    a.addEventListener("click", function(e) {
        /*when the select box is clicked, close any other select boxes,
        and open/close the current select box:*/
        e.stopPropagation();
        closeAllSelect(this);
        this.nextSibling.classList.toggle("select-hide");
        this.classList.toggle("select-arrow-active");
    });
}

function closeAllSelect(elmnt) {
    /*a function that will close all select boxes in the document,
    except the current select box:*/
    var x, y, i, xl, yl, arrNo = [];
    x = document.getElementsByClassName("select-items");
    y = document.getElementsByClassName("select-selected");
    xl = x.length;
    yl = y.length;
    for (i = 0; i < yl; i++) {
        if (elmnt == y[i]) {
            arrNo.push(i)
        } else {
            y[i].classList.remove("select-arrow-active");
        }
    }
    for (i = 0; i < xl; i++) {
        if (arrNo.indexOf(i)) {
            x[i].classList.add("select-hide");
        }
    }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);


// FORM HANDLER ========================>
const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);
const loginForm = $('.form-login');
const loginBtn = $('.btn-login');
const loginCloseBtn = $('.btn-close');
const loginOverlay = $('.overlay-login');
const formLogin = $('.login .form');
loginBtn.onclick = () => {
    loginForm.classList.add('active');
}
loginCloseBtn.onclick = (e) => {
    loginForm.classList.remove('active');
}
loginOverlay.onclick = () => {
    loginForm.classList.remove('active');
}
formLogin.onclick = (e) => {
        e.stopPropagation();
    }
    //FORM SIGN UP
const signForm = $('.form-sign-up');
const signBtn = $('.button--hl');
const signCloseBtn = $('.btn-close');
const signOverlay = $('.overlay-sign');
const formSign = $('.sign .form');
signBtn.onclick = () => {
    signForm.classList.add('active');
}
signCloseBtn.onclick = (e) => {
    signForm.classList.remove('active');
}
signOverlay.onclick = () => {
    signForm.classList.remove('active');
}
formSign.onclick = (e) => {
    e.stopPropagation();
}
// gototop && header sticky handler
const gototop = $('.gototop');
const headerTopHeight = $('.header-login').offsetHeight;
const headerNav = $('.header-nav');
const headerNavHeight = headerNav.offsetHeight;
const headerLogin = $('.header-login');

document.onscroll = function () {
    if (window.scrollY > 400) {
          gototop.classList.remove('hide');
    } else {
        gototop.classList.add('hide');
    }

    if (window.scrollY > headerTopHeight) {
        headerNav.classList.add('fixed');
        headerLogin.style.marginBottom = `${headerNavHeight}px`;
    } else {
        headerNav.classList.remove('fixed');
        headerLogin.style.marginBottom = '0px';
    }
    
}



