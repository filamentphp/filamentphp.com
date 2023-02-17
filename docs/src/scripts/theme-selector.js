export default (Alpine) => {
  Alpine.data("themeSelector", () => ({
    theme: "system",
    isDarkMode: window.matchMedia("(prefers-color-scheme: dark)"),
    selected: "system",
    init() {
      document.documentElement.setAttribute("data-theme", this.updateTheme());

      new MutationObserver(([{ oldValue }]) => {
        let newValue = document.documentElement.getAttribute("data-theme");
        if (newValue !== oldValue) {
          try {
            window.localStorage.setItem("theme", newValue);
          } catch {}
          this.updateThemeWithoutTransitions(newValue);
        }
      }).observe(document.documentElement, { attributeFilter: ["data-theme"], attributeOldValue: true });

      this.isDarkMode.addEventListener("change", () => this.updateThemeWithoutTransitions());
    },
    updateTheme(theme) {
      this.theme = theme ?? window.localStorage.theme ?? "system";

      if (this.theme === "dark" || (this.theme === "system" && this.isDarkMode.matches)) {
        document.documentElement.classList.add("dark");
      } else if (this.theme === "light" || (this.theme === "system" && !this.isDarkMode.matches)) {
        document.documentElement.classList.remove("dark");
      }

      this.selected = this.theme;
      window.localStorage.theme = this.theme;
      document.documentElement.setAttribute("data-theme", this.theme);
      return this.theme;
    },
    updateThemeWithoutTransitions(theme) {
      this.updateTheme(theme);
      document.documentElement.classList.add("[&_*]:!transition-none");
      window.setTimeout(() => {
        document.documentElement.classList.remove("[&_*]:!transition-none");
      }, 0);
    },
  }));
};
