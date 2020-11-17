class RenameRecentPosts {
    constructor() {
        this.title = document.querySelector("#wpforo-title");
        this.breadcrumbText = document.querySelector(
            "#wpforo-wrap > div.wpforo-subtop > div.wpf-breadcrumb > div.wpf-item-element.active > span"
        );
        this.renameTitle();
        this.renameBreadcrumb();
        this.changeTitleColor();
    }

    renameTitle() {
        if (this.title && this.title.innerHTML.includes("Recent Posts")) {
            this.title.innerHTML = "Senaste inläggen";
            this.title.style.paddingBottom = "0";
            this.title.style.marginBottom = "0";
        }
    }
    renameBreadcrumb() {
        if (
            this.breadcrumbText &&
            this.breadcrumbText.innerHTML.includes("Recent Posts")
        ) {
            this.breadcrumbText.innerHTML = "Senaste inläggen";
        }
    }

    changeTitleColor() {
        this.title.classList.add("greyTitle");
    }
}

export default RenameRecentPosts;
