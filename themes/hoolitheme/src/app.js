// const name = (stuff) => {
//     return stuff + "!";
// };

// const test = name("Hej");

// console.log(test);

// alert("hej");

// Import components.
import Example from "./components/example.js";

// Initialize your components on DOM Ready.
$(document).ready(() => {
    console.log("saker händer");
    Example.init({
        setting: "New setting",
    });
});

alert("nsakldnkas");
