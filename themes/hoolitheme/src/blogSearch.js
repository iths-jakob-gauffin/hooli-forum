class BlogSearch {
    constructor() {
        this.text = "bloggsök";
        console.log(this.text);
        this.searchButton = document.querySelector("#blogSearchButton");
        this.searchForm = document.querySelector(".Blog__SearchForm");

        this.overlay = document.querySelector(".Blog__NavOverlay");
        // console.log(
        //     "🚀 ~ file: blogSearch.js ~ line 11 ~ BlogSearch ~ constructor ~ this.overlay",
        //     this.overlay
        // );

        this.testKlick = document.querySelector("#testKlick");

        this.events();
    }

    //listeners
    events() {
        // this.searchButton.addEventListener("mouseenter", () => {
        //     console.log("över");
        //     this.searchButton.classList.add("gray");
        // });
        // this.searchButton.addEventListener("mouseleave", () => {
        //     console.log("lämnar");
        //     this.searchButton.classList.add("gray");
        // });
        // this.searchButton.onmouseenter = () => {
        //     console.log("över");
        // };
        // this.searchButton.onmouseleave = () => {
        //     console.log("lämnar");
        // };
        this.searchButton.onmouseenter = () => {
            if (!this.searchButton.classList.contains("active")) {
                this.searchButton.classList.remove("hoverState--hidden");
                this.searchButton.classList.add("hoverState");
            }
        };
        this.searchButton.onmouseleave = () => {
            if (!this.searchButton.classList.contains("active")) {
                this.searchButton.classList.remove("hoverState");
                this.searchButton.classList.add("hoverState--hidden");
            }
        };

        this.searchButton.addEventListener("click", () => this.openSearch());
        console.log(
            "🚀 ~ file: blogSearch.js ~ line 22 ~ BlogSearch ~ events ~ this.searchButton",
            this.searchButton
        );

        this.testKlick.addEventListener("click", () => this.slide());
    }

    //Handlers
    openSearch() {
        this.searchButton.classList.remove("hoverState");
        this.searchButton.classList.add("hoverState--hidden");
        this.searchButton.classList.toggle("active");

        // this.searchButton.classList.toggle("active");
        // this.searchButton.classList.toggle("clicked");
        // this.searchButton.classList.toggle("Blog__FadeHover--Active");
        // setTimeout(() => {
        //     console.log("NU");
        //     this.searchButton.classList.toggle(
        //         "Blog__FadeHover--Active--Hidden"
        //     );
        // }, 5000);

        this.overlay.classList.toggle("Blog__NavOverlay--hidden");
        this.searchForm.classList.toggle("Blog__SearchForm--hidden");
    }

    slide() {
        this.searchButton.classList.toggle("active");
        this.overlay.classList.toggle("Blog__NavOverlay--hidden");
    }
}

export default BlogSearch;
