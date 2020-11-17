
const editInnerText = (elementToEdit, text) => {
    document.querySelector(elementToEdit).innerText = text;
}

editInnerText(".wpf-extra label", "Kom ihåg mig");