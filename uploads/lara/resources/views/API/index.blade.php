<!--
 API Documentation HTML Template  - 1.0.0
 Copyright © 2016 Florian Nicolas
 Licensed under the MIT license.
 https://github.com/ticlekiwi/API-Documentation-HTML-Template
 !-->
<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <title>API - Documentation</title>
        <meta name="description" content="">
        <meta name="author" content="ticlekiwi">

        <meta http-equiv="cleartype" content="on">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="{{ asset("assets/API/css/hightlightjs-dark.css") }}">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.8.0/highlight.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,500|Source+Code+Pro:300" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset("assets/API/css/style.css") }}" media="all">
        <script>hljs.initHighlightingOnLoad();</script>
    </head>

    <body>
        <div class="left-menu">
            <div class="content-logo">
                <img alt="platform by Emily van den Heever from the Noun Project" title="platform by Emily van den Heever from the Noun Project" src="{{ asset("assets/API/images/logo.png") }}" height="32" />
                <span>API Documentation</span>
            </div>
            <div class="content-menu">
                <ul>
                    <li class="scroll-to-link active" data-target="get-started">
                        <a>GET STARTED</a>
                    </li>
                    <li class="scroll-to-link" data-target="login">
                        <a>Login</a>
                    </li>
                    <li class="scroll-to-link" data-target="register">
                        <a>Register</a>
                    </li>
                    <li class="scroll-to-link" data-target="update-user">
                        <a>Update User</a>
                    </li>
                    <li class="scroll-to-link" data-target="update-user-photo">
                        <a>Update User Image</a>
                    </li>
                    <li class="scroll-to-link" data-target="update-password">
                        <a>Update Password</a>
                    </li>
                    <li class="scroll-to-link" data-target="user-provider-toggle">
                        <a>Add/Remove Provider from favorites</a>
                    </li>
                    <li class="scroll-to-link" data-target="add-request">
                        <a>Add User Request</a>
                    </li>
                    <li class="scroll-to-link" data-target="get-user-requests">
                        <a>Get User Requests</a>
                    </li>
                    <li class="scroll-to-link" data-target="categories">
                        <a>Get Categories</a>
                    </li>
                    <li class="scroll-to-link" data-target="providers">
                        <a>Get Providers</a>
                    </li>
                    <li class="scroll-to-link" data-target="contact-us">
                        <a>Contact Us</a>
                    </li>
                    <li class="scroll-to-link" data-target="cities">
                        <a>Get Cities</a>
                    </li>
                    <li class="scroll-to-link" data-target="areas">
                        <a>Get Areas</a>
                    </li>
                    <li class="scroll-to-link" data-target="save-message">
                        <a>Send Message</a>
                    </li>
                    <li class="scroll-to-link" data-target="get-message">
                        <a>Get Messages</a>
                    </li>
                    <li class="scroll-to-link" data-target="add-payment">
                        <a>add Payment</a>
                    </li>
                    <li class="scroll-to-link" data-target="update-device-token">
                        <a>Update Device Token</a>
                    </li>
                    <li class="scroll-to-link" data-target="get-request-image">
                        <a>Get Request Image</a>
                    </li>
                    <li class="scroll-to-link" data-target="send-fawry-number">
                        <a>Send Fawry Number</a>
                    </li>
                    <li class="scroll-to-link" data-target="get-notify">
                        <a>Get All Notification</a>
                    </li>

                    <li class="scroll-to-link" data-target="errors">
                        <a>Errors</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="content-page">
            <div class="content-code"></div>
            <div class="content">
                <div class="overflow-hidden content-section" id="content-get-started">
                    <h1 id="get-started">Get started</h1>
                    <pre>
    API Endpoint

        https://insurence.herokuapp.com/api/v1
                </pre>

                </div>

                <div class="overflow-hidden content-section" id="content-login">
                    <h2 id="login">Login</h2>
                    <pre><code class="bash">
# Here is a curl example
curl \
-X POST https://insurence.herokuapp.com/api/v1/login
                </code></pre>
                    <p>
                        To Login you need to make a POST call to the following url :<br>
                        <code class="higlighted">https://insurence.herokuapp.com/api/v1/login</code>
                    </p>
                    <br>
                    <pre><code class="json">
Result example :

{
    query:{
        "identifier": "Amr@gmail.com",
        "password" : "12345678"
    }
    result: {
        "result": {
            "id": 17,
            "first_name": "Amr",
            "last_name": "Gomaa",
            "email": "Amr@gmail.com",
            "phone": "011466867888",
            "active": "0",
            "gender": "1",
            "type": "1",
            "image": null,
            "email_verified_at": null,
            "area_id": "1",
            "created_at": "2020-02-10 21:40:45",
            "updated_at": "2020-02-10 21:40:53",
            "api_token": "rdYyYzjDmvXsbyM5vHHF3lVikapMkguI318Xr5r4L9hRMqugNGmBIoGyGR0CFqxpkjH0MQZbHjxD26C6"
        },
        "message": "",
        "status": true
    }
}
                        </code>
                    </pre>
                    <h4>QUERY PARAMETERS</h4>
                    <table>
                        <thead>
                            <tr>
                                <th>Field</th>
                                <th>Type</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>identifier</td>
                                <td>string</td>
                                <td>Email or Phone</td>
                            </tr>
                            <tr>
                                <td>password</td>
                                <td>string</td>
                                <td>User Password</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="overflow-hidden content-section" id="content-register">
                    <h2 id="register">Register</h2>
                    <pre><code class="bash">
# Here is a curl example
curl \
-X POST https://insurence.herokuapp.com/api/v1/register
                </code></pre>
                    <p>
                        To Register you need to make a POST call to the following url :<br>
                        <code class="higlighted">https://insurence.herokuapp.com/api/v1/register</code>
                    </p>
                    <br>
                    <pre><code class="json">
Result example :

{
    query: {
        "first_name": "Amr",
        "last_name": "Gomaa",
        "email": "Amr@gmail.com",
        "phone": "011466867888",
        "gender":1,
        "password": "12345678",
        "password_confirmation" : "12345678",
        "type" : 1,
        "area_id" : 1
    }
    result: {
        "result": {
            "id": 17,
            "first_name": "Amr",
            "last_name": "Gomaa",
            "email": "Amr@gmail.com",
            "phone": "011466867888",
            "active": "0",
            "gender": "1",
            "type": "1",
            "image": null,
            "email_verified_at": null,
            "area_id": "1",
            "created_at": "2020-02-10 21:40:45",
            "updated_at": "2020-02-10 21:40:45",
            "api_token": null
        },
        "message": "",
        "status": true
    }
}
                        </code>
                    </pre>
                    <h4>QUERY PARAMETERS</h4>
                    <table>
                        <thead>
                            <tr>
                                <th>Field</th>
                                <th>Type</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>first_name</td>
                                <td>string</td>
                                <td>User first name</td>
                            </tr>
                            <tr>
                                <td>last_name</td>
                                <td>string</td>
                                <td>User last name</td>
                            </tr>
                            <tr>
                                <td>email</td>
                                <td>email</td>
                                <td>User Email will be used in login</td>
                            </tr>
                            <tr>
                                <td>phone</td>
                                <td>integer or string</td>
                                <td>User Phone may be used in login instead of email</td>
                            </tr>
                            <tr>
                                <td>gender</td>
                                <td>String</td>
                                <td>
                                    is user gender:<br>
                                    1: male<br>
                                    2: female
                                </td>
                            </tr>
                            <tr>
                                <td>password</td>
                                <td>String</td>
                                <td>
                                    user password must be at least 8 characters
                                </td>
                            </tr>
                            <tr>
                                <td>password_confirmation</td>
                                <td>String</td>
                                <td>
                                    repeat the user password to make sure that user is knows the password that he entered
                                </td>
                            </tr>
                            <tr>
                                <td>area_id</td>
                                <td>big integer or string</td>
                                <td>
                                    is the id of user area that got from "get area" API
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="overflow-hidden content-section" id="content-update-user">
                    <h2 id="update-user">Update User</h2>
                    <pre><code class="bash">
# Here is a curl example
curl \
-X POST https://insurence.herokuapp.com/api/v1/users/update
                </code></pre>
                    <p>
                        if want to update user data you need to make a POST call to the following url :<br>
                        <code class="higlighted">https://insurence.herokuapp.com/api/v1/users/update</code>
                    </p>
                    <br>
                    <pre><code class="json">
Result example :

{
    query: {
        "first_name": "mohamed",
        "last_name": "abdullah",
        "phone": "01156510548",
        "gender":1,
        "area_id":2
    }
    result: {
        "result": {
            "id": 17,
            "first_name": "mohamed",
            "last_name": "abdullah",
            "email": "Amr@gmail.com",
            "phone": "01156510548",
            "active": "0",
            "gender": 1,
            "type": "1",
            "image": null,
            "email_verified_at": null,
            "area_id": 2,
            "created_at": "2020-02-10 22:16:20",
            "updated_at": "2020-02-10 22:18:09",
            "api_token": "UseaaZEqQ748aAHeecMYtjbh4SbkjguaWiMKEkssVcwMitQBbmvlMnjseWRvKmhKGfQbDpnkj8AwTwh7"
        },
        "message": "",
        "status": true
    }
}
                        </code>
                    </pre>
                    <h4>QUERY PARAMETERS</h4>
                    <p>All this parameters are required and if you don't need to edit any one set it with the old value</p>
                    <table>
                        <thead>
                            <tr>
                                <th>Field</th>
                                <th>Type</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>first_name</td>
                            <td>string</td>
                            <td>User first name</td>
                        </tr>
                        <tr>
                            <td>last_name</td>
                            <td>string</td>
                            <td>User last name</td>
                        </tr>
                        <tr>
                            <td>phone</td>
                            <td>integer or string</td>
                            <td>User Phone may be used in login instead of email</td>
                        </tr>
                        <tr>
                            <td>gender</td>
                            <td>String</td>
                            <td>
                                is user gender:<br>
                                1: male<br>
                                2: female
                            </td>
                        </tr>
                        <tr>
                            <td>area_id</td>
                            <td>integer</td>
                            <td>
                                is the id of user area that got from "get area" API
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="overflow-hidden content-section" id="content-update-user-photo">
                    <h2 id="update-user-photo">Update User Photo</h2>
                    <pre><code class="bash">
# Here is a curl example
curl \
-X POST https://insurence.herokuapp.com/api/v1/users/photo/update
                </code></pre>
                    <p>
                        if want to update user photo you need to make a POST call to the following url :<br>
                        <code class="higlighted">https://insurence.herokuapp.com/api/v1/users/photo/update</code>
                    </p>
                    <br>
                    <pre><code class="json">
Result example :

{
    query: {
        "image": "image"
    }
    result: {
        "result": [],
        "message": "",
        "status": true
    }
}
                        </code>
                    </pre>
                    <h4>QUERY PARAMETERS</h4>
                    <table>
                        <thead>
                            <tr>
                                <th>Field</th>
                                <th>Type</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>image</td>
                            <td>image</td>
                            <td>image to be user profile photo</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="overflow-hidden content-section" id="content-user-provider-toggle">
                    <h2 id="user-provider-toggle">User Provider Toggle</h2>
                    <pre><code class="bash">
# Here is a curl example
curl \
-X POST https://insurence.herokuapp.com/api/v1/users/provider/toggle
                </code></pre>
                    <p>
                        if you want to add or remove a provider from favorites you need to make a POST call to the following url :<br>
                        <code class="higlighted">https://insurence.herokuapp.com/api/v1/users/provider/toggle</code>
                    </p>
                    <br>
                    <pre><code class="json">
Result example :

{
    query: {
        "provider_id":2
    }
    result: soon
}
                        </code>
                    </pre>
                    <h4>QUERY PARAMETERS</h4>
                    <table>
                        <thead>
                            <tr>
                                <th>Field</th>
                                <th>Type</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>provider_id</td>
                            <td>integer</td>
                            <td>is provider id that you want to add or remove provider from favorites, if the provider id is already will be removed from favorites and if not exsits will be add to favorits</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="overflow-hidden content-section" id="content-add-request">
                    <h2 id="add-request">Add User Request</h2>
                    <pre><code class="bash">
# Here is a curl example
curl \
-X POST https://insurence.herokuapp.com/api/v1/demands
                </code></pre>
                    <p>
                        if you want to add a Request you need to make a POST call to the following url :<br>
                        <code class="higlighted">https://insurence.herokuapp.com/api/v1/demands</code>
                    </p>
                    <br>
                    <pre><code class="json">
Result example :

{
    query: {
        "provider_id" : 1,
        "name": "yahia",
        "phone" : "01156510548",
        "note" : "write some notes"
    }
    result: {
        "result": {
            "id": 102,
            "user_id": 1,
            "provider_id": 1,
            "name": "yahia",
            "phone": "01156510548",
            "note": "write some notes",
            "status": 1,
            "created_at": "2020-02-17 22:59:59",
            "updated_at": "2020-02-17 22:59:59",
            "admin_id": 1
        },
        "message": "new Request Added",
        "status": true
    }
}
                        </code>
                    </pre>
                    <h4>QUERY PARAMETERS</h4>
                    <table>
                        <thead>
                            <tr>
                                <th>Field</th>
                                <th>Type</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>provider_id</td>
                            <td>integer</td>
                            <td>is provider id that you want to request the service of it </td>
                        </tr>
                        <tr>
                            <td>name</td>
                            <td>string</td>
                            <td>name of requester</td>
                        </tr>
                        <tr>
                            <td>phone</td>
                            <td>string</td>
                            <td>phone of requester</td>
                        </tr>
                        <tr>
                            <td>note</td>
                            <td>test (long string)</td>
                            <td>(optional parameter)</td>
                        </tr>
                        <tr>
                            <td>image</td>
                            <td>file</td>
                            <td>(optional parameter)</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="overflow-hidden content-section" id="content-get-user-requests">
                    <h2 id="get-user-requests">get User Requests</h2>
                    <pre><code class="bash">
# Here is a curl example
curl \
-X GET https://insurence.herokuapp.com/api/v1/users/demands
                </code></pre>
                    <p>
                        if you want to add a request you need to make a GET call to the following url :<br>
                        <code class="higlighted">https://insurence.herokuapp.com/api/v1/users/demands</code>
                    </p>
                    <br>
                    <pre><code class="json">
Result example :

{
    query: {
    }
    result: {
        "result": [
        {
          "id": 87,
          "admin_id": 1,
          "user_id": 16,
          "provider_id": 17,
          "name": "Mrs. Eliza Wiegand",
          "phone": "(572) 722-9675 x20699",
          "note": "Et a quibusdam veritatis similique. Rem maxime repellendus ut nulla vel sed totam. Quia suscipit et et.",
          "image": null,
          "answer_demand": null,
          "price_after_discount": "400.00",
          "price": "500.00",
          "status": 2,
          "created_at": "2020-03-14 13:16:18",
          "updated_at": "2020-03-18 00:49:42",
          "items": [
                  {
                    "demand_id": 87,
                    "title": "one"
                  },
                  {
                    "demand_id": 87,
                    "title": "two"
                  }
            ]
          },
          {
            "id": 58,
            "admin_id": 1,
            "user_id": 16,
            "provider_id": 17,
            "name": "Mrs. Eliza Wiegand",
            "phone": "(572) 722-9675 x20699",
            "note": "Et a quibusdam veritatis similique. Rem maxime repellendus ut nulla vel sed totam. Quia suscipit et et.",
            "image": null,
            "answer_demand": null,
            "price_after_discount": "400.00",
            "price": "500.00",
            "status": 2,
            "created_at": "2020-03-14 13:16:18",
            "updated_at": "2020-03-18 00:49:42",
            "items": [
                    {
                      "demand_id": 58,
                      "title": "hello"
                    },
                    {
                      "demand_id": 58,
                      "title": "yes"
                    }
              ]
            }

        ],
        "message": "My Requests",
        "status": true
    }
}
                        </code>
                    </pre>
                    <h4>QUERY PARAMETERS</h4>
                    <table>
                        <thead>
                            <tr>
                                <th>Field</th>
                                <th>Type</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                          <td>search_by</td>
                          <td>string</td>
                          <td>filed that you want to search with it like , id ,name ,email</td>
                        </tr>
                        <tr>
                          <td>query</td>
                          <td>string</td>
                          <td>
                            text that you want to search with it like (search_by = name , query = mohamed)
                            <br>
                            <p style="color:blue">api/v1/users/demands?status=4&search_by=name&query=Isobel Langosh&provider_id=15</p>
                          </td>
                        </tr>
                        <tr>
                          <td>provider_id</td>
                          <td>integer</td>
                          <td>filter with provider</td>
                        </tr>
                        <tr>
                          <td>status</td>
                          <td>integer from 1 to 5</td>
                          <td dir="rtl">
                            [1-قيد انتظار قبول الطلب<br>
                             2-قيد انتظار تحصيل التكلفة<br>
                             3-قيد انتظار استلام جواب الطلب<br>
                             4-تم اتسلام جواب الطلب<br>
                             5-طلب مرفوض]
                          </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="overflow-hidden content-section" id="content-categories">
                    <h2 id="categories">GET Categories</h2>
                    <pre><code class="bash">
# Here is a curl example
curl \
-X GET https://insurence.herokuapp.com/api/v1/categories
                </code></pre>
                    <p>
                        if you want to get all categories you need to make a GET call to the following url :<br>
                        <code class="higlighted">https://insurence.herokuapp.com/api/v1/categories</code>
                    </p>
                    <br>
                    <pre><code class="json">
Result example :

{
    query: {
    }
    result: {
        "result": [
            {
                "id": 1,
                "name": "Qui et.",
                "image": "https://lorempixel.com/640/480/?79836"
            },
            {
                "id": 2,
                "name": "Nam.",
                "image": "https://lorempixel.com/640/480/?20854"
            },
            {
                "id": 3,
                "name": "Alias.",
                "image": "https://lorempixel.com/640/480/?88828"
            },
            {
                "id": 4,
                "name": "Maiores.",
                "image": "https://lorempixel.com/640/480/?41280"
            },
            {
                "id": 5,
                "name": "Iusto.",
                "image": "https://lorempixel.com/640/480/?98772"
            },
            {
                "id": 6,
                "name": "Aliquam.",
                "image": "https://lorempixel.com/640/480/?65030"
            },
            {
                "id": 7,
                "name": "Velit.",
                "image": "https://lorempixel.com/640/480/?11014"
            },
            {
                "id": 8,
                "name": "Ut non.",
                "image": "https://lorempixel.com/640/480/?13099"
            },
            {
                "id": 9,
                "name": "Rerum.",
                "image": "https://lorempixel.com/640/480/?86992"
            }
        ],
        "message": "",
        "status": true
    }
}
                        </code>
                    </pre>
                    <h4>QUERY PARAMETERS</h4>
                    <table>
                        <thead>
                        <tr>
                            <th>Field</th>
                            <th>Type</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                       Accept No Parameters
                        </tbody>
                    </table>
                </div>

                <div class="overflow-hidden content-section" id="content-providers">
                    <h2 id="providers">GET Providers</h2>
                    <pre><code class="bash">
# Here is a curl example
curl \
-X GET https://insurence.herokuapp.com/api/v1/providers
                </code></pre>
                    <p>
                        if you want to Providers you need to make a GET call to the following url :<br>
                        <code class="higlighted">https://insurence.herokuapp.com/api/v1/providers</code>
                    </p>
                    <br>
                    <pre><code class="json">
Result example :

{
    query: {
        "category_id" : 1
    }
    result: {
        "result": [
            {
                "id": 15,
                "name": "Tempore.",
                "address": "1873 Ebba Forge\nWalshburgh, PA 67050-8946",
                "image": "https://lorempixel.com/640/480/?87142",
                "is_favorite": false
            }
        ],
        "message": "all Providers in this category",
        "status": true
    }
}
                        </code>
                    </pre>
                    <h4>QUERY PARAMETERS</h4>
                    <table>
                        <thead>
                        <tr>
                            <th>Field</th>
                            <th>Type</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>category_id</td>
                            <td>integer</td>
                            <td>(optional) filter providers by category if you didn't sent it you will get all providers regardless the category that it belongs to </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="overflow-hidden content-section" id="content-contact-us">
                    <h2 id="contact-us">contact-us</h2>
                    <pre><code class="bash">
# Here is a curl example
curl \
-X POST https://insurence.herokuapp.com/api/v1/contactUs
                </code></pre>
                    <p>
                        if you want to Contact With Admin you need to make a POST call to the following url :<br>
                        <code class="higlighted">https://insurence.herokuapp.com/api/v1/contactUs</code>
                    </p>
                    <br>
                    <pre><code class="json">
Result example :

{
    query: {
        "email": "yahia@test.com",
        "subject": "test subject",
        "message" : "test description"
    }
    result: {
        "result": {
            "email": "yahia@test.com",
            "subject": "test subject",
            "message": "test description",
            "user_id": 17,
            "updated_at": "2020-02-10 23:25:51",
            "created_at": "2020-02-10 23:25:51",
            "id": 21
        },
        "message": "",
        "status": true
    }
}
                        </code>
                    </pre>
                    <h4>QUERY PARAMETERS</h4>
                    <table>
                        <thead>
                        <tr>
                            <th>Field</th>
                            <th>Type</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>email</td>
                            <td>email</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>subject</td>
                            <td>string</td>
                            <td>message subject</td>
                        </tr>
                        <tr>
                            <td>message</td>
                            <td>Text</td>
                            <td>Message Content</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="overflow-hidden content-section" id="content-cities">
                    <h2 id="cities">Get Cities</h2>
                    <pre><code class="bash">
# Here is a curl example
curl \
-X GET https://insurence.herokuapp.com/api/v1/cities
                </code></pre>
                    <p>
                        if you want to get cities you need to make a GET call to the following url :<br>
                        <code class="higlighted">https://insurence.herokuapp.com/api/v1/cities</code>
                    </p>
                    <br>
                    <pre><code class="json">
Result example :

{
    query: {

    }
    result: {
        "result": {
        "result": [
            {
                "id": 6,
                "name": "West Nicolaborough"
            },
            {
                "id": 7,
                "name": "Kurtmouth"
            },
            {
                "id": 8,
                "name": "North Keltonborough"
            },
            {
                "id": 9,
                "name": "East Lucienne"
            },
            {
                "id": 10,
                "name": "New Kathleen"
            }
        ],
        "message": "",
        "status": true
    }
}
                        </code>
                    </pre>
                    <h4>QUERY PARAMETERS</h4>
                    <table>
                        <thead>
                        <tr>
                            <th>Field</th>
                            <th>Type</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>

                <div class="overflow-hidden content-section" id="content-areas">
                    <h2 id="areas">Get Areas</h2>
                    <pre><code class="bash">
# Here is a curl example
curl \
-X GET https://insurence.herokuapp.com/api/v1/areas
                </code></pre>
                    <p>
                        if you want to Get areas of cities you need to make a GET call to the following url :<br>
                        <code class="higlighted">https://insurence.herokuapp.com/api/v1/areas</code>
                    </p>
                    <br>
                    <pre><code class="json">
Result example :

{
    query: {
        "city_id":2
    }
    result: {
        "result": [
            {
                "id": 14,
                "name": "New Harmon"
            },
            {
                "id": 18,
                "name": "Lake Lavadaland"
            },
            {
                "id": 20,
                "name": "Kassulkeland"
            },
            {
                "id": 23,
                "name": "New Roel"
            },
            {
                "id": 56,
                "name": "Alisashire"
            },
            {
                "id": 64,
                "name": "Lake Dorthachester"
            },
            {
                "id": 83,
                "name": "Lake Rowanstad"
            },
            {
                "id": 87,
                "name": "Lake Hailieburgh"
            },
            {
                "id": 91,
                "name": "Andersonhaven"
            },
            {
                "id": 92,
                "name": "Lindhaven"
            },
            {
                "id": 110,
                "name": "East Kayceefurt"
            },
            {
                "id": 130,
                "name": "Bernhardberg"
            },
            {
                "id": 176,
                "name": "South Bridieland"
            },
            {
                "id": 181,
                "name": "Ceceliachester"
            },
            {
                "id": 186,
                "name": "Mercedesfort"
            },
            {
                "id": 192,
                "name": "New Reagan"
            }
        ],
        "message": "",
        "status": true
    }
}
                        </code>
                    </pre>
                    <h4>QUERY PARAMETERS</h4>
                    <table>
                        <thead>
                        <tr>
                            <th>Field</th>
                            <th>Type</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>city_id</td>
                            <td>big integer</td>
                            <td>city id that you want to get all areas under it</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="overflow-hidden content-section" id="content-message">
                    <h2 id="save-message">Send Message</h2>
                    <pre><code class="bash">
# Here is a curl example
curl \
-X POST https://insurence.herokuapp.com/api/v1/chat
                </code></pre>
                    <p>
                        To Send Message you need to make a POST call to the following url :<br>
                        <code class="higlighted">https://insurence.herokuapp.com/api/v1/chat</code>
                    </p>
                    <br>
                    <pre><code class="json">
Result example :

{
    query:{
        "demand_id": 101,
        "type":1,
        "message" : "we love you"
    }
    result: {
      "result": {
          "demand_id": 101,
          "message": "we love you",
          "user_id": 2,
          "type" : 1,
          "updated_at": "2020-02-17 22:36:19",
          "created_at": "2020-02-17 22:36:19",
          "id": 301
        },
        "message": "new Chat Added",
        "status": true
    }
}
                        </code>
                    </pre>
                    <h4>QUERY PARAMETERS</h4>
                    <table>
                        <thead>
                            <tr>
                                <th>Field</th>
                                <th>Type</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>demand_id</td>
                                <td>big Integer</td>
                                <td>Request id for get message</td>
                            </tr>
                            <tr>
                                <td>type</td>
                                <td>Integer</td>
                                <td>
                                  type =1 , mean that message is text like example <br>
                                  type =2 , mean that value of message is image just send file in the same message key type of file is (multipart/form-data)
                                </td>
                            </tr>
                            <tr>
                                <td>message</td>
                                <td>string | file </td>
                                <td>Message in Chat</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="overflow-hidden content-section" id="content-get-message">
                    <h2 id="get-message">Get Request Messages Chat</h2>
                    <pre><code class="bash">
# Here is a curl example
curl \
-X GET https://insurence.herokuapp.com/api/v1/chat
                </code></pre>
                    <p>
                        To Get Message you need to make a Get call to the following url :<br>
                        <code class="higlighted">https://insurence.herokuapp.com/api/v1/chat</code>
                    </p>
                    <br>
                    <pre><code class="json">
Result example :

{
    query:{
        "demand_id": 101
    }
    "result": [
              {
                "user_id": 1,
                "user_name": "Joyce Schumm Manuel Kshlerin",
                "image": "https://lorempixel.com/640/480/?59707",
                "message": "new dada",
                "type": 1
              },
              {
                "user_id": 1,
                "user_name": "Mr. Camron Mayer I Kiel Gislason",
                "image": "https://lorempixel.com/640/480/?59707",
                "message": "/uploads/messages/2020/02/22/202002222047512112688113_messages.jpg",
                "type": 2
              },
              {
                "user_id": 1,
                "user_name": "Mr. Camron Mayer I Kiel Gislason",
                "image": "https://lorempixel.com/640/480/?59707",
                "message": "new data",
                "type": 1
              },
              {
                "user_id": 1,
                "image": "https://lorempixel.com/640/480/?59707",
                "message": "/uploads/messages/2020/02/22/202002222049241244147107_messages.jpg",
                "type": 2
              },
              {
                "user_id": 1,
                "user_name": "Joyce Schumm Manuel Kshlerin",
                "image": "https://lorempixel.com/640/480/?59707",
                "message": "/uploads/messages/2020/02/22/20200222205026988739149_messages.png",
                "type": 2
              },
              {
                "user_id": 1,
                "user_name": "Joyce Schumm Manuel Kshlerin",
                "image": "https://lorempixel.com/640/480/?59707",
                "message": "new data",
                "type": 1
              },
              {
                "user_id": 1,
                "user_name": "Joyce Schumm Manuel Kshlerin",
                "image": "https://lorempixel.com/640/480/?59707",
                "message": "/uploads/messages/2020/02/22/202002222050421421666937_messages.png",
                "type": 2
              },
          ],
          "message": "",
          "status": true
}
                        </code>
                    </pre>
                    <h4>QUERY PARAMETERS</h4>
                    <table>
                        <thead>
                            <tr>
                                <th>Field</th>
                                <th>Type</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>demand_id</td>
                                <td>big Integer</td>
                                <td>Request id for get message</td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <div class="overflow-hidden content-section" id="content-add-payment">
                    <h2 id="add-payment">Add Payment</h2>
                    <pre><code class="bash">
# Here is a curl example
curl \
-X POST https://insurence.herokuapp.com/api/v1/payments
                </code></pre>
                    <p>
                        To add a payment transaction you need to make call to the following url :<br>
                        <code class="higlighted">https://insurence.herokuapp.com/api/v1/payments</code>
                    </p>
                    <br>
                    <pre><code class="json">
Result example :

{
    query: {
        "request_id": 5,
        "transaction_id": "asjkdnio2e3",
        "amount": 100,
    }
    result: {
        "result": [],
        "message": "",
        "status": true
    }
}
                        </code>
                    </pre>
                    <h4>QUERY PARAMETERS</h4>
                    <table>
                        <thead>
                            <tr>
                                <th>Field</th>
                                <th>Type</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>request_id</td>
                                <td>big integer</td>
                                <td>Required field</td>
                            </tr>
                            <tr>
                                <td>transaction_id</td>
                                <td>string</td>
                                <td>optiomal field</td>
                            </tr>
                            <tr>
                                <td>transaction_id</td>
                                <td>string</td>
                                <td>optional field</td>
                            </tr>
                            <tr>
                                <td>Image</td>
                                <td>Image</td>
                                <td>optional field</td>
                            </tr>
                            <tr>
                                <td>amount</td>
                                <td>integer</td>
                                <td>optional field</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="overflow-hidden content-section" id="content-update-device-token">
                    <h2 id="update-device-token">Update Device Token</h2>
                    <pre><code class="bash">
# Here is a curl example
curl \
-X POST https://insurence.herokuapp.com/api/v1/users/device/token/update
                </code></pre>
                    <p>
                        To update the device token you need to make call to the following url :<br>
                        <code class="higlighted">https://insurence.herokuapp.com/api/v1/users/device/token/update</code>
                    </p>
                    <br>
                    <pre><code class="json">
Result example :

{
    query: {
        "device_token": "sadnjnasld3wiqejnsdbjnklsamd"
    }
    result: {
        "result": [],
        "message": "",
        "status": true
    }
}
                        </code>
                    </pre>
                    <h4>QUERY PARAMETERS</h4>
                    <table>
                        <thead>
                            <tr>
                                <th>Field</th>
                                <th>Type</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>device_token</td>
                                <td>string</td>
                                <td>Required field</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="overflow-hidden content-section" id="content-get-request-image">
                    <h2 id="get-request-image">Get Request Image</h2>
                    <pre><code class="bash">
# Here is a curl example
curl \
-X POST https://insurence.herokuapp.com/api/v1/demands/{request id}
                </code></pre>
                    <p>
                        To update the device token you need to make call to the following url :<br>
                        <code class="higlighted">https://insurence.herokuapp.com/api/v1/demands/{request id}</code>
                    </p>
                    <br>
                    <pre><code class="json">
Result example :

{
    query: {
    }
    result: {
    "result": {
        "result": {
            "image": "/uploads/messages/2020/03/06/202003062330331874990225_messages.png"
        },
        "message": "",
        "status": true
    }
}
                        </code>
                    </pre>
                    <h4>QUERY PARAMETERS</h4>
                    <table>
                        <thead>
                            <tr>
                                <th>Field</th>
                                <th>Type</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

                <div class="overflow-hidden content-section" id="send-fawry-number">
                    <h2 id="get-notify">Get Notifcation</h2>
                    <pre><code class="bash">
# Here is a curl example
curl \
-X POST https://insurence.herokuapp.com/api/v1/demands/update/fawry
                </code></pre>
                    <p>
                        Set Fawry Number :<br>
                        <code class="higlighted">https://insurence.herokuapp.com/api/v1/demands/update/fawry</code>
                    </p>
                    <br>
                    <pre><code class="json">
                  Result example :

                  {
                      query: {
                        demand_id : 101,
                        fawry_number : 123464566
                      }
                      result: {
                        {
                          "result": [],
                          "message": "",
                          "status": true
                      }
                  }
                        </code>
                    </pre>
                    <h4>QUERY PARAMETERS</h4>
                    <table>
                        <thead>
                            <tr>
                                <th>Field</th>
                                <th>Type</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>demand_id</td>
                          </tr>
                          <tr>
                            <td>fawry_number</td>
                          </tr>
                        </tbody>
                    </table>
                </div>


                <div class="overflow-hidden content-section" id="get-notify">
                    <h2 id="get-notify">Get Notifcation</h2>
                    <pre><code class="bash">
# Here is a curl example
curl \
-X GET https://insurence.herokuapp.com/api/v1/users/notify
                </code></pre>
                    <p>
                        To update the device token you need to make call to the following url :<br>
                        <code class="higlighted">https://insurence.herokuapp.com/api/v1/users/notify</code>
                    </p>
                    <br>
                    <pre><code class="json">
Result example :

{
    query: {
    }
    result: {
      {
        "result": [
      {
        "user_id": 15,
        "message": "Your Request mohamed Now It Was In Status Waiting receipt of the answer to the request",
        "type": 2,
        "demand_id": 101
      },
      {
        "user_id": 15,
        "message": "Super Admin Send Message To You, Please Check It",
        "type": 1,
        "demand_id": 101
      }
    ],
    "message": "",
    "status": true
    }
}
                        </code>
                    </pre>
                    <h4>QUERY PARAMETERS</h4>
                    <table>
                        <thead>
                            <tr>
                                <th>Field</th>
                                <th>Type</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

                <div class="overflow-hidden content-section" id="content-password">
                    <h2 id="update-password">Update PAssword</h2>
                    <pre><code class="bash">
# Here is a curl example
curl \
-X POST https://insurence.herokuapp.com/api/v1/users/password/update
                </code></pre>
                    <p>
                        To Update Password you need to make a Post call to the following url :<br>
                        <code class="higlighted">https://insurence.herokuapp.com/api/v1/users/password/update</code>
                    </p>
                    <br>
                    <pre><code class="json">
Result example :

{
    query:{
        "password": 12345678,
        "password_confirmation" : 12345678,
        "old_password":1234567
    }
    "result": {},
    "message": "",
    "status": true
}
                        </code>
                    </pre>
                    <h4>QUERY PARAMETERS</h4>
                    <table>
                        <thead>
                            <tr>
                                <th>Field</th>
                                <th>Type</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <td>old_password</td>
                              <td>string</td>
                              <td>The old password shouid match user password</td>
                          </tr>
                            <tr>
                                <td>password</td>
                                <td>string</td>
                                <td>The New Password</td>
                            </tr>
                            <tr>
                                <td>password_confirmation</td>
                                <td>string</td>
                                <td>The Confirmation Password</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="content-code"></div>
        </div>
        <!-- Github Corner Ribbon - to remove (Ribbon created with : http://tholman.com/github-corners/ )-->
        <a href="https://github.com/ticlekiwi/API-Documentation-HTML-Template" class="github-corner" aria-label="View source on Github" title="View source on Github"><svg width="80" height="80" viewBox="0 0 250 250" style="z-index:99999; fill:#70B7FD; color:#fff; position: fixed; top: 0; border: 0; right: 0;" aria-hidden="true"><path d="M0,0 L115,115 L130,115 L142,142 L250,250 L250,0 Z"></path><path d="M128.3,109.0 C113.8,99.7 119.0,89.6 119.0,89.6 C122.0,82.7 120.5,78.6 120.5,78.6 C119.2,72.0 123.4,76.3 123.4,76.3 C127.3,80.9 125.5,87.3 125.5,87.3 C122.9,97.6 130.6,101.9 134.4,103.2" fill="currentColor" style="transform-origin: 130px 106px;" class="octo-arm"></path><path d="M115.0,115.0 C114.9,115.1 118.7,116.5 119.8,115.4 L133.7,101.6 C136.9,99.2 139.9,98.4 142.2,98.6 C133.8,88.0 127.5,74.4 143.8,58.0 C148.5,53.4 154.0,51.2 159.7,51.0 C160.3,49.4 163.2,43.6 171.4,40.1 C171.4,40.1 176.1,42.5 178.8,56.2 C183.1,58.6 187.2,61.8 190.9,65.4 C194.5,69.0 197.7,73.2 200.1,77.6 C213.8,80.2 216.3,84.9 216.3,84.9 C212.7,93.1 206.9,96.0 205.4,96.6 C205.1,102.4 203.0,107.8 198.3,112.5 C181.9,128.9 168.3,122.5 157.7,114.1 C157.9,116.9 156.7,120.9 152.7,124.9 L141.0,136.5 C139.8,137.7 141.6,141.9 141.8,141.8 Z" fill="currentColor" class="octo-body"></path></svg></a><style>.github-corner:hover .octo-arm{animation:octocat-wave 560ms ease-in-out}@keyframes octocat-wave{0%,100%{transform:rotate(0)}20%,60%{transform:rotate(-25deg)}40%,80%{transform:rotate(10deg)}}@media (max-width:500px){.github-corner:hover .octo-arm{animation:none}.github-corner .octo-arm{animation:octocat-wave 560ms ease-in-out}}</style>
        <!-- END Github Corner Ribbon - to remove -->
        <script src="{{ asset("assets/API/js/libs/jquery.js") }}"></script>
        <script src="{{ asset("assets/API/js/script.js") }}"></script>
    </body>
</html>
