hljs.registerLanguage("spark_output", function () {
  return {
    case_insensitive: true,
    contains: [
      {
        scope: "line",
        begin: /[+\-]+/
      },
      {
        scope: "line",
        begin: /\|/
      }
    ]
  }
})
