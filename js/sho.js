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
        begin: /--[a-zA-Z]+/,
        end: /$/
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
