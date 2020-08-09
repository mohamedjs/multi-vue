<?php

// S.O.L.I.D Principles

// S. Single Responsabilty Principle SRP
    // 1- in charge of one responsabilty and have one reason to change 
    // 2- any function is responsabilty about one things not do alot of things in it like register function responseabilty about register user and return it not     responsabilty about
    //    save it in database or validation it each of them has it's resposabilty , another example like model is resposabilty about attrubite in database and realtion not more */

// o. Open/Closed Principle
    // 1- open for extension close for modifaction (like in startegy pattern)
    // 2- for example if we speak about something like connection in database and we can connect with multi type like(mysql, mongodb, sqlite) and each of them is have his style
    // but in last they do the same function like(connect, fetch, insert, update) so we open for extension mean we can add another type like (pgsql) but we didn't modifcation 
    // any of them we make abstarct class and use one of them with the same function

// L. Liskov substitution principle
//     1- subclass can be replaced with parents , oject only
//     2- for example if we have userRepositry is subclass from user model if we replace user Repositry with user model we can use the same function witout any change
//        User::get() - $this->userRepositry->get() (we can replace them with each other)

// I. Interface segregation principle
//     1- A client should never be forced to implement an interface that it doesn't use or clients shouldn't be forced to depend on methods they do not use
//     2- for example, if we have interface for (creature, كائن) maybe this interface is human or robot , and this interface have two function (work, sleep)
//        but robot not sleep so he not used sleep function so this interface should divide to two interface one for sleep and one for workable
//        so human implements (workable, sleep) and robot implements (workable) so there is no function in interface not used in the class that implements it

// D. Depemdancy
//     1- high level module must not depend on the low level module, but they should depend on abstractions
//     2- for example, user class should connect to database to can get record (user is hight level and database is low level) the height level should nor depend on low level
//        but should make abstraction for this low level beacuse low level can implements his function with many type like function connect in our case maybe can with mysql or sqlite
//        so we make abstraction we can call this abstraction(databaseConnection) and this two way (sqlite, mysql) implements this abstraction and user use abstraction that maybe can bind to mysql or sqlite
//     3- interface databaseConnection { public function connect(); }
//        class mySql implements databaseConnection  { public function connect(){ 'way connect in mysql'  } }
//        class sqLite implements databaseConnection { public function connect(){ 'way connect in sqlite' } }
//        class User { _construct(databaseConnection $databaseConnection) } /* height level class user depend on abstraction class (databaseConnection) */