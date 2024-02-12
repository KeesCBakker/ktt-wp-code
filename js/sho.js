hljs.registerLanguage("sho", function () {
  return {
    case_insensitive: true,
    contains: [
      {
        scope: "literal",
        begin: /^\$/,
        end: " "
      },
      {
        scope: "attribute",
        begin: /--[a-zA-Z]+/
      },
      {
        scope: "comment",
        begin: "#",
        end: "\n"
      },
      {
        scope: "output",
        begin: /\n(\s+[^$#]|[^$#])[^\n]+/
      }
    ]
  }
})
