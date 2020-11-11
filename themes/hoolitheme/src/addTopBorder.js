
export const addTopBorder = () => {

    const form = document.querySelector("#loginform");
    const div = form.insertBefore(document.createElement("div"), form.firstChild);
    div.classList.add("top-border");

    const p = document.createElement("p");
    p.innerText = "Logga in";
    div.append(p);

}