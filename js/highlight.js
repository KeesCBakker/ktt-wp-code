document.addEventListener("DOMContentLoaded", function () {
  hljs.addPlugin(new CopyButtonPlugin());

  function triggerHighlight() {
    hljs.highlightAll();
  }

  document.addEventListener("scroll", triggerHighlight, { once: true });

  // Trigger immediately if a <pre class="wp-block-code"> is visible in the viewport
  const codeBlocks = document.querySelectorAll("pre.wp-block-code");
  for (const block of codeBlocks) {
    const rect = block.getBoundingClientRect();
    if (rect.top < window.innerHeight && rect.bottom > 0) {
      triggerHighlight();
      break;
    }
  }
});
