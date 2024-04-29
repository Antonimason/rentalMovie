"use strict";

const userSelection = document.querySelector(".user");
const adminSelection = document.querySelector(".admin");
const userContainer = document.querySelector(".user-container");
const adminContainer = document.querySelector(".admin-container");
const formSelection = document.querySelector(".form-selection");
const backButton = document.querySelectorAll(".back");
const loginButton = document.querySelector(".login");

userSelection.addEventListener("click",()=>{
    loginForm("user");
})
adminSelection.addEventListener("click", ()=>{
    loginForm("admin");
})
backButton.forEach(button =>{
    button.addEventListener("click", ()=>{
        loginForm("back")
    });
})

function loginForm(userType){
    try{
        switch(userType){
            case "user":
                formSelection.style.display = "none";
                userContainer.style.display = "flex";
                break;
            case "admin":
                formSelection.style.display = "none";
                adminContainer.style.display = "flex";
                break;
            case "back":
                adminContainer.style.display = "none";
                userContainer.style.display = "none";
                formSelection.style.display = "flex";
                break;
            default:
                console.log("Select a choice");
        }
    }catch(e){
        console.log(e);
    }
}