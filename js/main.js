"use strict";
console.log("hello I'm connected to the world");

//var base_url = "base.php/api";

$(document).ready(function(){
    console.log("All Elements in the Page was successfully loaded, we can begin our application logic");
});  
// this acts as the main function in Java



// Angular App
var app = angular.module("myapp", ['ngRoute']);
app.config(["$routeProvider",function($routeProvider) {
    $routeProvider
        .when("/", {
            templateUrl : "main.html",
        })// no semicolon, this is called method chaining. 
        .when("/addItem",{
            templateUrl : "views/addItem.html",
            controller: "addController"
        })

}]);

app.controller('mainController', ['$scope', 
    function($scope){
    console.log("Main Controller Executed");
}]);
// takkes two parameters name of conteroller and behaviour of the conteroller
 
 
function login(){
    console.log("Hi");
    var email = $("#email").val();
    var pass = $("#pass").val();
    //console.log(email + " " + pass);
    var user = {
        "email" : email,
        "password": pass
    }

    console.log(user);
    $.post("../index.php/users", user, function(res){
        alert(res);
        var url="base.phtml";
        window.open(url, "_self");
    });
    console.log("Hi");
    return false;
}

function register(){
    //console.log("Hi");
    var username = $("#username").val();
    var firstname = $("#firstname").val();
    var lastname = $("#lastname").val();
    var email = $("#email").val();
    var contact = $("#contact").val();
    var address = $("#address").val();
    var password = $("#password").val();
    var retypedpassword = $("#retypedpassword").val();

    if(password != retypedpassword){
        alert("Password do not match");
        return false;
    }

    var regUser = {
        "username" : username,
        "firstname" : firstname,
        "lastname" : lastname,
        "email" : email,
        "contact" : contact,
        "address" : address,
        "password" : password
    };

    $.post("../index.php/register", regUser, function(res){
        alert(res);
        var url="login.phtml";
        window.open(url, "_self");
    });

    return false;


}

console.log("JavaScript file was successfully loaded in the page");