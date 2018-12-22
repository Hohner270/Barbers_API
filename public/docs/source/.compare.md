---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#general
<!-- START_a925a8d22b3615f12fca79456d286859 -->
## api/auth/login
> Example request:

```bash
curl -X POST "http://localhost/api/auth/login" 
```

```javascript
const url = new URL("http://localhost/api/auth/login");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/auth/login`


<!-- END_a925a8d22b3615f12fca79456d286859 -->

<!-- START_94726cef0a53b660e0f38207f65ad3e6 -->
## api/auth/invite
> Example request:

```bash
curl -X POST "http://localhost/api/auth/invite" 
```

```javascript
const url = new URL("http://localhost/api/auth/invite");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/auth/invite`


<!-- END_94726cef0a53b660e0f38207f65ad3e6 -->


