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

#Auth

Auth resource
<!-- START_d7b7952e7fdddc07c978c9bdaf757acf -->
## Register new user

> Example request:

```bash
curl -X POST "http://booki.dev/api/register" \
-H "Accept: application/json" \
    -d "first_name"="et" \
    -d "last_name"="et" \
    -d "email"="milo77@example.org" \
    -d "password"="et" \
    -d "confirm_password"="et" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://booki.dev/api/register",
    "method": "POST",
    "data": {
        "first_name": "et",
        "last_name": "et",
        "email": "milo77@example.org",
        "password": "et",
        "confirm_password": "et"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/register`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    first_name | string |  required  | 
    last_name | string |  required  | 
    email | email |  required  | 
    password | string |  required  | 
    confirm_password | string |  required  | Must be the same as `password`

<!-- END_d7b7952e7fdddc07c978c9bdaf757acf -->

<!-- START_c3fa189a6c95ca36ad6ac4791a873d23 -->
## User Auth

> Example request:

```bash
curl -X POST "http://booki.dev/api/login" \
-H "Accept: application/json" \
    -d "email"="uzieme@example.org" \
    -d "password"="rerum" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://booki.dev/api/login",
    "method": "POST",
    "data": {
        "email": "uzieme@example.org",
        "password": "rerum"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/login`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    email | email |  required  | Valid user email
    password | string |  required  | 

<!-- END_c3fa189a6c95ca36ad6ac4791a873d23 -->

#Book

Book resource
<!-- START_51146bbdc85de247378f2d0f599bdd03 -->
## Create book story

> Example request:

```bash
curl -X POST "http://booki.dev/api/books/{book}/stories" \
-H "Accept: application/json" \
    -d "date"="1992-11-03" \
    -d "page"="deleniti" \
    -d "is_end"="1" \
    -d "summary"="deleniti" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://booki.dev/api/books/{book}/stories",
    "method": "POST",
    "data": {
        "date": "1992-11-03",
        "page": "deleniti",
        "is_end": true,
        "summary": "deleniti"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/books/{book}/stories`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    date | date |  required  | 
    page | string |  required  | 
    is_end | boolean |  required  | 
    summary | string |  required  | 

<!-- END_51146bbdc85de247378f2d0f599bdd03 -->

<!-- START_33c6d64a451af167032c5c54df96db5c -->
## Create new book

> Example request:

```bash
curl -X POST "http://booki.dev/api/books" \
-H "Accept: application/json" \
    -d "name"="exercitationem" \
    -d "author"="exercitationem" \
    -d "pages"="113" \
    -d "year"="113" \
    -d "started_in"="1984-01-31" \
    -d "description"="exercitationem" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://booki.dev/api/books",
    "method": "POST",
    "data": {
        "name": "exercitationem",
        "author": "exercitationem",
        "pages": 113,
        "year": 113,
        "started_in": "1984-01-31",
        "description": "exercitationem"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/books`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | 
    author | string |  required  | 
    pages | numeric |  optional  | 
    year | numeric |  optional  | 
    started_in | date |  required  | 
    description | string |  required  | 

<!-- END_33c6d64a451af167032c5c54df96db5c -->

<!-- START_85ea01789f6590a62557efa9937b5b6b -->
## Update book

> Example request:

```bash
curl -X PATCH "http://booki.dev/api/books/{book}" \
-H "Accept: application/json" \
    -d "started_in"="2002-01-31" \
    -d "state"="tempore" \
    -d "description"="tempore" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://booki.dev/api/books/{book}",
    "method": "PATCH",
    "data": {
        "started_in": "2002-01-31",
        "state": "tempore",
        "description": "tempore"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PATCH api/books/{book}`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    started_in | date |  required  | 
    state | string |  required  | 
    description | string |  required  | 

<!-- END_85ea01789f6590a62557efa9937b5b6b -->

#Story

Stories resource, it is a small description of read session
<!-- START_613f02378d2fbb18c2050f6c198d6311 -->
## List book stories of user

> Example request:

```bash
curl -X GET "http://booki.dev/api/user/book/{book}/stories" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://booki.dev/api/user/book/{book}/stories",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/user/book/{book}/stories`

`HEAD api/user/book/{book}/stories`


<!-- END_613f02378d2fbb18c2050f6c198d6311 -->

#User

User resource, information about user account
<!-- START_4c6808d9769a680c06f68207f750f75b -->
## User books list

> Example request:

```bash
curl -X GET "http://booki.dev/api/user/books" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://booki.dev/api/user/books",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/user/books`

`HEAD api/user/books`


<!-- END_4c6808d9769a680c06f68207f750f75b -->

<!-- START_e0222c2b6611491b0ff4b748818e56e5 -->
## User profile

> Example request:

```bash
curl -X GET "http://booki.dev/api/user/profile" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://booki.dev/api/user/profile",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/user/profile`

`HEAD api/user/profile`


<!-- END_e0222c2b6611491b0ff4b748818e56e5 -->

<!-- START_08fa23ab16ce13d8dce4f994fbaa7d76 -->
## Update user profile

> Example request:

```bash
curl -X PATCH "http://booki.dev/api/user/profile" \
-H "Accept: application/json" \
    -d "first_name"="consequatur" \
    -d "last_name"="consequatur" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://booki.dev/api/user/profile",
    "method": "PATCH",
    "data": {
        "first_name": "consequatur",
        "last_name": "consequatur"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PATCH api/user/profile`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    first_name | string |  required  | 
    last_name | string |  required  | 

<!-- END_08fa23ab16ce13d8dce4f994fbaa7d76 -->

