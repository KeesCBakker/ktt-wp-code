document.addEventListener("DOMContentLoaded", function () {
  mermaid.initialize({
    startOnLoad: false,
  });
  document
    .querySelectorAll(".wp-block-code.lang-mermaid code")
    .forEach((codeBlock) => {
      let codeContent = codeBlock.textContent;
      let mermaidDiv = document.createElement("figure");
      mermaidDiv.className = "mermaid wp-block-image wide";
      mermaidDiv.textContent = codeContent;
      codeBlock.parentNode.replaceWith(mermaidDiv);
    });
  mermaid.init();
});
