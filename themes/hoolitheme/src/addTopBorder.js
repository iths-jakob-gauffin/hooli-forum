
const addTopBorder = (elementToPick, text) => {

    const form = document.querySelector(elementToPick);
    const div = form.insertBefore(document.createElement("div"), form.firstChild);
    div.classList.add("top-border");

    const p = document.createElement("p");
    p.innerText = text;
    div.append(p);

}


if(window.location.pathname === '/wp-login.php'){
    addTopBorder("#loginform", "Logga in");
}

if (window.location.search === '?foro=signin') {
    addTopBorder(".wpforo-login-wrap", "Logga in");
}

if (window.location.search === '?foro=signup') {
    addTopBorder(".wpforo-register-wrap", "Registrera konto");
}
