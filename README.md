# ktt-wp-code

A plugin to show add highlightjs, hightlight-copy and Mermaid to WordPress.

## Supported languages

This plugin supports all the languages of the highlightjs project and:

- Mermaid JS - rendered as diagrams - as seen here: <a href="https://keestalkstech.com/2024/01/obtain-an-atlassian-cloud-3lo-refresh-token-with-bash/#the-basic-idea">https://keestalkstech.com/2024/01/obtain-an-atlassian-cloud-3lo-refresh-token-with-bash/#the-basic-idea</a>
- `sho` - shell output - as seen here: <a href="https://keestalkstech.com/2022/05/using-the-s3p-api-to-copy-1-3m-of-5m-of-aws-s3-keys/#help">https://keestalkstech.com/2022/05/using-the-s3p-api-to-copy-1-3m-of-5m-of-aws-s3-keys/#help</a>
- `spart_output` - output from Spark - as seen here: <a href="https://keestalkstech.com/2019/11/easy-spark-optimization-for-max-record-aggregate-instead-of-join/#results
  ">https://keestalkstech.com/2019/11/easy-spark-optimization-for-max-record-aggregate-instead-of-join/#results</a>
- Adds some aliases:

```php
'sh' => 'bash',
'docker' => 'dockerfile',
'ps' => 'powershell'
```

## Dev notes

Our dev container works in Bash. A `.wp-now` cache directory will be created by the bash profile. In the dev container, you can start WordPress with:

```sh
wp-now start
```

This will start WordPress on port `8881`.

## Todo

- [ ] Create an import file to import some code
