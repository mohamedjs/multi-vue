<?php

// 1- url, route_name
    // Route::resource('products.orders','ProductOrderController');
    // Route::resource([
    //     'products.orders' => 'ProductOrderController',
    //     'produts' => 'ProductController'
    // ]);
    // name('products.index') //pruler mean (sum of word)
    // 200 status ok and retrive data 
    // 204 status ok and not retrive smething update,delete
    // 500 internal server error
    // 422 validation error
    // 401 unauthoriazed

    // route url, routeName should be pruler mean (sum of word) like orders, products, comments
    // ControllerName should be single like Order, Product

// 2- controller name , methods name
//         1.controller should single like ProductController, ProductOrderController best to have (index, store, show, destroy)
//         2.methods camelCase the first word have small char and other have big char 
//         3.class shouid very specfic name have single responsabilty


// 3- realtionName, attribute
//         1.in (belongsTo,HasOne) should use single like post belongsTo (user without 's' in last)
//         2.in other realtion should use pruler like post hasMany (comments with 's' in last)
//         3.table name should be sum of word pruler, model name shouid be single
//         4.attrubuite should snake_case (user_id, title, birth_date)
//         5.pivote_table user_post alphbatic a befor c and so on...
