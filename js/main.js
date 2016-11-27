"use strict";
console.log("hello I'm connected to the world");

//var base_url = "base.php/api";

$(document).ready(function(){
    console.log("All Elements in the Page was successfully loaded, we can begin our application logic");
    getUserRequests();
    getAllItems();
    getUserItems();
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
 
 //--------------------------------------------------------------------------------------------------------------------
 // Log in functionality
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
        if(res){
            console.log(res);
            swal({ 
                title: "Welcome",
                text: "You have logged in successfully",
                type: "success" 
            },
                function(){
                    window.location.href = 'homepage.php';
            });
            //window.location.href="homepage.php";
            //return false;
        }
        else{
            swal("Incorrect Login","Please try again","error")
            //return false;
        }
    },"json");
    //console.log("Hi");
    return false;
}
//--------------------------------------------------------------------------------------------------------------------
// Registration functionality
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
        if(res){
            console.log(res);
            swal({ 
                title: "Registration Complete!",
                text: "Proceed to login",
                type: "success" 
            },
                function(){
                    window.location.href = 'login.php';
            });
            //window.location.href="homepage.php";
            //return false;
        }
        else{
            swal("Incorrect Login","Please try again","error")
            //return false;
        }
    },"json");

    return false;
}

//--------------------------------------------------------------------------------------------------------------------
//Dsiplay All items available (except user items) on homepage
function getAllItems(){//alter for slim 
    $.get("../index.php/homepage", processAllItems, "json");
}

function processAllItems(records){
    console.log(records);
    listAllItems(records)
}

function listAllItems(records){
    var key;
    var sec_id = "#table_sech";
    var htmlStr = $("#table_headingh").html(); //Includes all the table, thead and tbody declarations

    records.forEach(function(el){
        htmlStr += "<tr>";
        htmlStr += "<td><img src=\"" + el['picture'] + "\" width=\"150\" height=\"128\"></td>";
        htmlStr += "<td>"+ el['itemdescription'] +"</td>";
        htmlStr += "<td>"+ el['user'] +"</td>";
        htmlStr += "<td><button type='button' class='btn btn-primary' onclick=\"makeRequest("+el.itemid+")\"><i class='fa fa-cart-plus' aria-hidden='true'></i></button></td>";
        //htmlStr += "<button type='button' class='btn btn-danger'><i class='fa fa-trash' aria-hidden='true'></i></button></td>";
        htmlStr += "<td>" + el['uploaddate'] + "</td>";
        htmlStr +=" </tr>" ;
    });

    htmlStr += "</tbody></table>";
    $(sec_id).html(htmlStr);
}
//--------------------------------------------------------------------------------------------------------------------

//Dsiplay All user items on profile
function getUserItems(){//alter for slim 
    $.get("../index.php/profile", processUserItems, "json");
}

function processUserItems(records){
    console.log(records);
    listUserItems(records)
}

function listUserItems(records){
    var key;
    var sec_id = "#table_secp";
    var htmlStr = $("#table_headingp").html(); //Includes all the table, thead and tbody declarations

    records.forEach(function(el){
        htmlStr += "<tr>";
        htmlStr += "<td><img src=\"" + el['picture'] + "\" width=\"150\" height=\"128\"></td>";
        htmlStr += "<td>"+ el['itemdescription'] +"</td>";
        htmlStr += "<td><button type='button' class='btn btn-primary'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></button> ";
        htmlStr += "<button type='button' class='btn btn-danger'><i class='fa fa-trash' aria-hidden='true'></i></button></td>";
        htmlStr += "<td>" + el['uploaddate'] + "</td>";
        htmlStr +=" </tr>" ;
    });

    htmlStr += "</tbody></table>";
    $(sec_id).html(htmlStr);
} 

//--------------------------------------------------------------------------------------------------------------------

//Dsiplay requests for user items in the notification icon
function getUserRequests(){
    $.get("../index.php/requests", notifications, "json");  
}

function notifications(records){
    console.log(records);
    records.forEach(function(el){
        var htmlStr = "<li><a href=profile.php>"+el.username + " requested "+ el.item + " "+"</a></li>";
        $("#requests").append(htmlStr);
    });
    displayRequests(records);

}

function displayRequests(records){
    var key;
    var sec_id = "#table_secr";
    var htmlStr = $("#table_headingr").html(); //Includes all the table, thead and tbody declarations

    records.forEach(function(el){
        htmlStr += "<tr>";
        htmlStr += "<td>"+ el['username'] +"</td>";
        htmlStr += "<td>"+ el['item'] +"</td>";
        htmlStr += "<td>"+ el['item'] +"</td>";
        htmlStr += "<td><button type='button' class='btn btn-primary'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></button> ";
        htmlStr += "<button type='button' class='btn btn-danger'><i class='fa fa-trash' aria-hidden='true'></i></button></td>";
        htmlStr +=" </tr>" ;
    });

    htmlStr += "</tbody></table>";
    $(sec_id).html(htmlStr);
}

//--------------------------------------------------------------------------------------------------------------------
// Show and hide add item form
function showForm(){
    $('#uploadItem').show("slow");

}
function hideForm(){
    $('#uploadItem').attr('style','display:none');

}

//--------------------------------------------------------------------------------------------------------------------

// Add item image and description to database
function addItem(){
    var image = $("#image").val();
    var itemDescription = $("#itemdescription").val();
    //alert(image);
    var slash = image.indexOf("\\",5);
    image = image.substring(slash+1, image.length);
    //alert(image);
    var item = {
        "image" : image,
        "itemdescription" : itemDescription
    };

    console.log(item);
    $.post("../index.php/additem", item, function(res){
        if (res.id && res.id > 0)swal("Uploaded", "Item Saved", "success");
        else swal("Upload Error", "Unable to save item", "error");
        hideForm();
        getUserItems();
    },"json");
    return false;
}

//--------------------------------------------------------------------------------------------------------------------

// Inserts a records to the database when a user makes a request to that item
function makeRequest(itemid){
    $.get("../index.php/request/"+itemid, function(res){
        if (res.id && res.id > 0)
            swal("Record", "Record Saved", "success");
        else 
            swal("Record", "Unable to save record", "error");
    }, "json");

}

console.log("JavaScript file was successfully loaded in the page");