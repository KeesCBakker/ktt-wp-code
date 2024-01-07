## Subresource Integrity

If you are loading Highlight.js via CDN you may wish to use [Subresource Integrity](https://developer.mozilla.org/en-US/docs/Web/Security/Subresource_Integrity) to guarantee that you are using a legimitate build of the library.

To do this you simply need to add the `integrity` attribute for each JavaScript file you download via CDN. These digests are used by the browser to confirm the files downloaded have not been modified.

```html
<script
  src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"
  integrity="sha384-xBsHBR6BS/LSlO3cOyY2D/4KkmaHjlNn3NnXUMFFc14HLZD7vwVgS3+6U/WkHAra"></script>
<!-- including any other grammars you might need to load -->
<script
  src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/go.min.js"
  integrity="sha384-WmGkHEmwSI19EhTfO1nrSk3RziUQKRWg3vO0Ur3VYZjWvJRdRnX4/scQg+S2w1fI"></script>
```

The full list of digests for every file can be found below.

### Digests

```
sha384-uBlc/xEFeDxZmBU7K/YWwi3ryXQrLQCAY2K1Dl3OD2DaAQBZZTt6Ew3aeDP20ix0 /es/languages/bash.js
sha384-4qer4rJCVxZjkwD4YaJfOnT2NOOt0qdjKYJM2076C+djiJ4lgrP1LVsB/MCpJSET /es/languages/bash.min.js
sha384-Sp8E1Lb9fNhbvqBiogM60TCgpAIwYBi8WbHhIHcXO0bR5Z+9LeYwpDa1gkjzU99W /es/languages/csharp.js
sha384-huUb4Ol37G1WrtGV7bn1UArXcJSjD4tQswMGzgpNZYAPxR74MHTqW79z1dXWMvhk /es/languages/csharp.min.js
sha384-DA5ii4oN8R2fsamNkHOanSjuN4v7j5RIuheQqnxMQ4cFnfekeuhwu4IdNXiCf+UU /es/languages/css.js
sha384-OBugjfIr093hFCxTRdVfKH8Oe3yiBrS58bhyYYTUQJVobk6SUEjD7pnV8BPwsr8a /es/languages/css.min.js
sha384-/wYGIAWwdVeBvXFBq3HUPpdw6KUhW3wMMXruGXWjhlYT/IruTWojBeoPUbpGXaf5 /es/languages/dockerfile.js
sha384-DQdaFTXRCa9EQdAkBCHnMAhAomUgizSpJPmuCzoaDJMAshvgxlJF5d7J/ysvc6f/ /es/languages/dockerfile.min.js
sha384-PlRlnTHneMtJbkTa3EfvlRQdjmWK3/QGPB1XcD9Gq81/BMvsOahBaxCiSqOPDtnv /es/languages/fsharp.js
sha384-B1ZRrYmfEhHwYo+zuVPZpMfzy6cQt14Vvsbz0ZgQaJfZotA1AjdYP0C+zvN39Czh /es/languages/fsharp.min.js
sha384-xG7D+neOE4ESa3no3TB3dmUhFAzqhWs44rleL/wq+h4+fnINKJvI2e/73Hcx67ig /es/languages/graphql.js
sha384-sYfgkTuyw8lkHmGdVV7Mw1/C2jkRl3ZKZrSceJsMaqZAG2RNed+pSOfjwMMEIBO7 /es/languages/graphql.min.js
sha384-NnhPwIPAAfzjFT+H35whxNsJEhjqnp16iuqrhXt+g1+eZhX1t3RDI6/wVZcwXQJe /es/languages/handlebars.js
sha384-RNsmJ7WM6P4KLAb4uTYFI84hIr0xBEtHjJaciwHoAsq00NcBk87WXUstUEDJfItU /es/languages/handlebars.min.js
sha384-7hMYwsnoFLW0Wnjv4vRnZxuedW1tCz7/pydl1b9w3fg7B+rldToCjqzXwCRHUE7C /es/languages/ini.js
sha384-LDu6uT3diI3jBUJtdoGFa787cYlVrR+aqFfmW+kW+TImOkpVe+P5LBdDzydIHo9Z /es/languages/ini.min.js
sha384-WFJdA9Hz+G9NQx5vPba/tcGyIibm57UkKVY32wNB/94iT2FmPma5W7gY8p2l6qps /es/languages/java.js
sha384-coaxfgI2lKuDqSxfMlfyPq5WM0THaLGyATZHzaFMrWdIbPcLdduuItTe6AmT/m33 /es/languages/java.min.js
sha384-WCznKe2n87QvV/L1MlXN+S8R6NPUQGU34+AqogMuWGZJswSD6rt3Mgih+xuKlDgm /es/languages/javascript.js
sha384-eGsBtetyKPDKaLiTnxTzhSzTFM6A/yjHBQIj4rAMVaLPKW5tJb8U6XLr/AikCPd+ /es/languages/javascript.min.js
sha384-12GbYFzdyZCSmfBTmO2CR/qE89K5uE1PEuJ3QUwXH0Q9u+uoLNigjH9dG7LAxxiI /es/languages/json.js
sha384-+DT7AtubDhVDciRc6CgjJJRsCt0L8NC3Dh8n9Tj2tZWU8rWxDIj1ViubmUDn8OCY /es/languages/json.min.js
sha384-OkDbf1Slbqz4CwuUJVZyhq9SKn5vYk5ADIxIBS3iV5D0ZY7T3g3BOGZgd9u0kyZH /es/languages/lua.js
sha384-wvrGnUzHwJzO9dWQFF2DxrFjkSPw5gmc0iOQYmJUzeZ4tqa+15VEFRCH4GI2DNF3 /es/languages/lua.min.js
sha384-bWwkdmOCj83zZ8/m+oPD9goRMhrPCb25ZA6aTyg7vcsq9IpuyED38kQSw1Na4UTZ /es/languages/markdown.js
sha384-SqGSUq0DMQ0OUQnQnTuVDCJyhANd/MFNj+0PF67S+VXgHpR8A4tPsf/3GoSFRmrx /es/languages/markdown.min.js
sha384-ohJ9Jj8Mwyy7EntP4tGMJEtH90WJNKu2C4l37N1kqyTHgbRJyGYUgFe9z3qy3/C8 /es/languages/nginx.js
sha384-tpFPEHvbpL3dYF4uFiVNuCUF62TgMzuW65u5mvxnaJYun1sZwxBsKv+EvVgv3yQK /es/languages/nginx.min.js
sha384-JBkI+6623OoC1qCgG+MY/Ta0qRYSzTDH4NGMA+7U8RNOjkh7geFvYpRidvdHs3zT /es/languages/php.js
sha384-6Znh5S5q9F0hGNMtdaihFL3RJeMqL1a/UecjgzaBrhoxe4sjd5aiEOgokt7blhSW /es/languages/php.min.js
sha384-lbDR+U/5ETRHb0r5ElxxVnAt95EFhleDFZw7nkVPcRk3lbX9NsT/Ppg37FFNiv8+ /es/languages/php-template.js
sha384-dGJwrvnfo/JaY0lSDtJuhB6XXPmL9hSqOnIYndlN0eE1PoA9FFxd+VtaSfcacNDA /es/languages/php-template.min.js
sha384-TTDGPCrk8Dg2oW6NghGM5WJQPbi34BdYJj6yfsDiGXlM5os/SebXT6KzATp19rzo /es/languages/plaintext.js
sha384-XXx7wj9KPm08AyGoGzzFKZP2S7S+S5MbKMPnQcWUyhJ3EjHvLuctK/O1ioJnG2ef /es/languages/plaintext.min.js
sha384-PpU3S+yZJ1Gj2R7L/OgTgkKELQOf7F1VcbaAEJwSFSM9lw2ON2wxq1FvUcUlm9ne /es/languages/powershell.js
sha384-pBczxETXXX/Ne92jpBviT47DPiv27FLNtvs0aMZH3W7rYXdwgf1gWg3pH4NmNC2V /es/languages/powershell.min.js
sha384-+5oyk7Ed3OlvEWGj8xracq/6e52BScKUN4kxcreNwB7kfRTVsAMs/aAJM58dzIFN /es/languages/python.js
sha384-ND/UH2UkaeWiej5v/oJspfKDz9BGUaVpoDcz4cof0jaiv/mCigjvy7RQ7e+3S6bg /es/languages/python.min.js
sha384-BSeMSSkpHXATzXVnQDrjF2DPTOBSrKP8QqV0DcEVYa5k6JK9CSYxFKyEhj+Kqnde /es/languages/python-repl.js
sha384-sW9zIYfNc+qN/lya5oAmIdFlVbXjPLcdYkPSdRMpxO/xI2jbDW/Q4Etvx02DFOmf /es/languages/python-repl.min.js
sha384-dzLjhd9nNJH62idgKI1vZEKHRBtZXSgwWQdPR+emG7tfAN4BW2g+A5Xs2315Uxii /es/languages/shell.js
sha384-RKUoelG22/D7BV/bNpoGLNzdTgWRf/ACQX7y4BGyIzK6E+xUoXtm68WNQW2tSW8X /es/languages/shell.min.js
sha384-rBAFhyrcRcMNbVJ9g4k5y3eQDkjGdgoOb3oTWTbHgwyUgUNv3CK9wLsGy/d+52oa /es/languages/sql.js
sha384-8G3qMPeOeXVKZ0wGzMQHgMVQWixLw3EXFAcU+IFNLRe0WoZB5St3L3ZLTK62Nzns /es/languages/sql.min.js
sha384-CS3qiWid6Sod3yAiQwgPzy2ZerR00u/cwhnMxQrETuI74o006r1p5qj1U9Gdo4uD /es/languages/typescript.js
sha384-HHgazax8ozQ9RDWlJQyaFzaTk/OgTFRVHH+lcaYInkE8wVu5fnpkqkB3KUdzKcvE /es/languages/typescript.min.js
sha384-OFoR8IZ+CFwcY8plx8HSDZNoCwLxc701CwdNGfoIEhSgwAbwhvInaxnEi3HYTt2Q /es/languages/xml.js
sha384-yFd3InBtG6WtAVgIl6iIdFKis8HmMC7GbbronB4lHJq3OLef3U8K9puak6MuVZqx /es/languages/xml.min.js
sha384-MX3xn8TktkjONV3aWF6Qn6WZyq2Lh/98p0v7D0qEoJ4WLdYjoAyXF/L/80q3qaEc /es/languages/yaml.js
sha384-4IiaMbQ0LBiRJYBGoAXsN+dV9qu/cGLES6IuVowdeCu/FAMY5/MQfD/bHXoL2YBb /es/languages/yaml.min.js
sha384-qbbaBGYYg7PdopdWOGj8KdkBosUDY5PAe3aTMJKTqWcriPBJJzCVu5BlwNEwqr9U /languages/bash.js
sha384-ByZsYVIHcE8sB12cYY+NUpM80NAWHoBs5SL8VVocIvqVLdXf1hmXNSBn/H9leT4c /languages/bash.min.js
sha384-8sbRwiU8Ar2M7+w//1u7YiI1e7KsmB4k3QbW/m1IW5FVH51HiOpR7g5QGE3RqTNi /languages/csharp.js
sha384-wWP4JQEhRVshehTP7lUMDn3yhDI2+398vN2QW5LBt1xIpK0Gfu4dPviO8tP9XRo5 /languages/csharp.min.js
sha384-r9czyL17/ovexTOK33dRiTbHrtaMDzpUXW4iRpetdu1OhhckHXiFzpgZyni2t1PM /languages/css.js
sha384-HpHXnyEqHVbcY+nua3h7/ajfIrakWJxA3fmIZ9X9kbY45N6V+DPfMtfnLBeYEdCx /languages/css.min.js
sha384-BBTUoNxAh4TWINjb22cp1mRwwVdcPyF6zzXZ/1EvQ28ls8EIGhlCKeLav689vLdl /languages/dockerfile.js
sha384-H3wUmCndJNBOuIIzcLSr2zLLZYs8PYuw6qKyENk7THEnYQJvOMDBu42P9XsJSRKw /languages/dockerfile.min.js
sha384-+MzoDtq6oRPjVT31u9PHQJ7pQcmrnmZAH7q6P9XTRaMyiQzYaqq8QB6OusLjKj02 /languages/fsharp.js
sha384-v78fkUxICHap3erbZ72DyAoBlRVfNKVpjsG2fwRS+ELQNoSWDe0ppa1vTktch8gy /languages/fsharp.min.js
sha384-+9Rtg2Bz4pdOgkMjD/Y4IbvMzkuZqZyZwhBIbRD7254eY5Zm2Sf3UFI6Bt5tpyT5 /languages/graphql.js
sha384-yqNr+JW52pR9ZNw8CIHWgGMIrqhKhuOBDSlQ1ulf4Gt6wqi+VUMGHP5j6ReSSRY5 /languages/graphql.min.js
sha384-pk3Yez/JLDM2LWCA5AUcpHI3zOTzwIMp21HT9Ugn6Cw3ZKgv+3UDmcplG2wJpHBo /languages/handlebars.js
sha384-PqtEiFXspmwbGzxcwaN07nChfbxIAJHK4bTNOnytspmN9Q+LkL3AjxV5SgUI0WJQ /languages/handlebars.min.js
sha384-JSUMPR+WT0h/7NlqXi1Al9bVlNT31AeZNpAHttuzu+r02AmxePeqvsZkKqYZf06n /languages/ini.js
sha384-QrHbXsWtJOiJjnLPKgutUfoIrj34yz0+JKPw4CFIDImvaTDQ/wxYyEz/zB3639vM /languages/ini.min.js
sha384-pYIeBYeCE96U9EkPcT4uJjNWyrB1BKB41JIadYJbvmGa5KacaoXtSQOUpBfeyWQX /languages/java.js
sha384-uUg+ux8epe42611RSvEkMX2gvEkMdw+l6xG5Z/aQriABp38RLyF9MjDZtlTlMuQY /languages/java.min.js
sha384-vJxw3XlwaqOQr8IlRPVIBO6DMML5W978fR21/GRI5PAF7yYi2WstLYNG1lXk6j9u /languages/javascript.js
sha384-44q2s9jxk8W5N9gAB0yn7UYLi9E2oVw8eHyaTZLkDS3WuZM/AttkAiVj6JoZuGS4 /languages/javascript.min.js
sha384-dq9sY7BcOdU/6YaN+YmFuWFG8MY2WYJG2w3RlDRfaVvjdHchE07Ss7ILfcZ56nUM /languages/json.js
sha384-RbRhXcXx5VHUdUaC5R0oV+XBXA5GhkaVCUzK8xN19K3FmtWSHyGVgulK92XnhBsI /languages/json.min.js
sha384-/Ml+gzp/rkQcZkCwBqpVjCj028T6aTnOF/LCRJH8LBE5xcPcTkntQwJ5KGMMNLI3 /languages/lua.js
sha384-T04Yu4dcDCykCMf4EbZ62u3nURYEVkpphRGFhF/cMu+NrtDqoRHgbVOZz7hHdcaO /languages/lua.min.js
sha384-U+zIQPoVdPCO0o4poik2hYNbHtNm+L5OojDTulgIeEZTNz+LooLAm72d66mNjwKD /languages/markdown.js
sha384-mCUujHHbWJEjcupTTfWOk9YR3YCYNHaA578+TTXUd4LPi7fGNuMQbysbl1pmcIGd /languages/markdown.min.js
sha384-OtoDZeQykEsQoFzaA50vgmgr+D3F8WIaXZ0CZfYFivHEpkwCpRKT5Ptmuhjr5bfJ /languages/nginx.js
sha384-p6UV3HZc7zs9wUF6j4Knk3bpx1/JnhlwDoFnKJAOogB1cUi32u31NlnZ2s2dW8IR /languages/nginx.min.js
sha384-S1JDGPScVg8ikNKLZc4CSP0ZxLiJ7bOJMzTLfOzQiCxR6wPqAa+YtauHJXQpc2GV /languages/php.js
sha384-c1RNlWYUPEU/QhgCUumvQSdSFaq+yFhv3VfGTG/OTh8oirAi/Jnp6XbnqOLePgjg /languages/php.min.js
sha384-56Iyz0oX8ZJZPmm/9pflGG2cVp/0NER9AEbckNsLoTXXK5uMPpVWUkf/WL1BPzEb /languages/php-template.js
sha384-i5dGKRLoml9823i21v5ltbNFQCB7OAwkUve4TaJrwSnXRQ1kOjT+Wa8jX/EOj434 /languages/php-template.min.js
sha384-IHapUcPkNR+7JNsR+qYSVYGCE3Dpzo2//VYWtmGYrw3eQG1RItQ7HYq6aK1Jo/6L /languages/plaintext.js
sha384-ofjxHpechXkaeQipogSyH62tQNaqAwQiuUHOVi4BGFsX5/KectIoxz16f8J/P5U0 /languages/plaintext.min.js
sha384-BW3J/7iREOC3EuqJwzGkDJb6FY9bVvkt70ipieV892fYAp8uReDMiO0/lrUPmkzL /languages/powershell.js
sha384-LWJZQx0dgGhEK7snfNYrQs5K+QKD1sOmE02sOQCz4br9UmqSJDvPLoUVFaUyFnjq /languages/powershell.min.js
sha384-zdZio5RcGiKQJCpe/1IXujPle3bIY8sbmvCabSU5G5GzWAzZtoRZfg9QAQXCL08q /languages/python.js
sha384-IP4vv4Aoh9Lyg8QyzVkAmn2JGoDCpgVHzVSrD3Z+rVyn7+s4wx4pRjv+go3TEwfj /languages/python.min.js
sha384-7jEUoPRiHUgJOTai1kMkoxn2EnF86LMvN/MagHBb2SlmmV6Xd4jlrgQfLTzgM3sP /languages/python-repl.js
sha384-bKSBGjy2/8jltjSAlvCjAvEvjy8osMZfj37sBThcXS7n6SppraMRghmLmAxiapyN /languages/python-repl.min.js
sha384-KW3ZDReTAemYUfVHvH1MNQ/v6agCYYdMGdMteP/yVV+NetIJeDMx0ruUMTbr/SD3 /languages/shell.js
sha384-PDEMny3uYpCrSKwqVGLAwqCsc9u+9hYXauxVPqO6RXmlxSNKLoRByEBigU5lahmK /languages/shell.min.js
sha384-Dy7I/j0yJlyliWiNrkNqXfxDrbN65q40s3JColgTYZQ7QJa7lcmK0WUL3i00/T51 /languages/sql.js
sha384-8q00eP+tyV9451aJYD5ML3ftuHKsGnDcezp7EXMEclDg1fZVSoj8O+3VyJTkXmWp /languages/sql.min.js
sha384-yZXtQC/OmWoPykosK7vE1nCvV4E/six6+apjNau4JwBkejkea5nP7VBEJJkGnvoF /languages/typescript.js
sha384-ORwtVEfrCZ0gzGacgmfv1wOtxcPIaVfHKwq8dKQjObRwx3qpKjsSg1ldTu1PEgXd /languages/typescript.min.js
sha384-+PuZYFfVX2UQZU2yKt/FsJUZNUPzZWxW7auXltsaecr1xLvzBYF3c5gYoyOs1++x /languages/xml.js
sha384-jgkY4GMNWfQcLLIoP1vg3FWXflDrRhcSXGBW6ONIWC2SOIv5H1Pa57sXs+aomCuZ /languages/xml.min.js
sha384-tB5cwwsX4Ddp7P4d+ZInDb3nt4ihEEglHXoQ18eVLlT7soEn7bfGfABWKIn1l+H2 /languages/yaml.js
sha384-WC56y8OaFPt5Kj2HX6JAumxUYEjQmBDcSTJy2pn/N8g7dg1hKjeNVrJYoxlpeVmz /languages/yaml.min.js
sha384-D3BvXz/8BCoyIWjjj0nePuYyzOvGL1bnz4EK8TrMxVG8TnMTDxsM4cBYdj9wsT56 /highlight.js
sha384-ZJVKTupg+l6d5IKEPdW6wJVrv5CNmFy3tLpFmuSc2gfvzPqip2Yv7hrpGLxtahuP /highlight.min.js
```

