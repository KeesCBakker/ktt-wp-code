import PhotoSwipeLightbox from '/wp-content/plugins/lightbox-photoswipe/assets/ps5/lib/photoswipe-lightbox.esm.min.js'
document.addEventListener("DOMContentLoaded", function () {

  function wrapSvgWithLink() {
    // Select the SVG element
    var svgs = document.querySelectorAll('figure > svg');

    for (let svg of svgs) {

      // Serialize the SVG to a string
      var serializer = new XMLSerializer();
      var svgString = serializer.serializeToString(svg);

      // Create an anchor element
      var a = document.createElement('a');
      a.href = "#";

      // Wrap the SVG with the anchor element
      svg.parentNode.insertBefore(a, svg);
      a.appendChild(svg);

      const options = {
        dataSource: [
          {
            src: 'data:image/svg+xml;charset=utf-8,' + encodeURIComponent(svgString),
            width: 1620,
            height: 1080,
            alt: ''
          },

        ],
        showHideAnimationType: 'none',
        pswpModule: () => import('/wp-content/plugins/lightbox-photoswipe/assets/ps5/lib/photoswipe.esm.js'),
      };
      const lightbox = new PhotoSwipeLightbox(options);
      a.addEventListener('click', function (event) {
        event.preventDefault();
        lightbox.loadAndOpen(0); // defines start slide index
      });

      lightbox.init();
    }
  }

  document
    .querySelectorAll(".wp-block-code.lang-mermaid code")
    .forEach((codeBlock) => {
      let codeContent = codeBlock.textContent;
      let mermaidDiv = document.createElement("figure");
      mermaidDiv.className = "mermaid wp-block-image wide size-full";
      mermaidDiv.textContent = codeContent;
      codeBlock.parentNode.replaceWith(mermaidDiv);
    });


  mermaid.run({
    querySelector: '.mermaid',
    postRenderCallback: (id) => {
      wrapSvgWithLink()
    }
  });
});
