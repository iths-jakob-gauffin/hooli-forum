
const addTopBorder = (elementToPick) => {

    console.log("topborder");

    const form = document.querySelector(elementToPick);
    const div = form.insertBefore(document.createElement("div"), form.firstChild);
    div.classList.add("top-border");

    const p = document.createElement("p");
    p.innerText = "Logga in";
    div.append(p);

}


if(window.location.pathname === '/wp-login.php'){
    addTopBorder("#loginform");
} else {
    addTopBorder(".wpforo-login-wrap");
}


