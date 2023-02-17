import Alpine from "alpinejs";
import TableOfContents from "./table-of-contents";
import ThemeSelector from "./theme-selector";
import FloatingUi from "@awcodes/alpine-floating-ui";
import Focus from "@alpinejs/focus";
import docsearch from "@docsearch/js";

docsearch({
  container: "#docsearch",
  appId: "LMIKXMDI4P",
  apiKey: "1e3d12b0b9c3a4db16cd896e83b9efa0",
  indexName: "filamentadmin",
  placeholder: "Search docs",
});

Alpine.plugin(Focus);
Alpine.plugin(FloatingUi);
Alpine.plugin(TableOfContents);
Alpine.plugin(ThemeSelector);

Alpine.start();
