window.addEventListener("DOMContentLoaded", ()=>{
  var prenom = document.querySelector("#firstname");
  var newPrenom = document.querySelector("#newFirstname");

  prenom.onmouseover = function(){
    var firstname = prenom.value;
    prenom.value = "Modifier";
    prenom.onmouseout = function(){
      prenom.value = firstname;
    }
  }

  prenom.onclick = function(){
    prenom.style.display = "none";
    newPrenom.style.display = "";
  }

  var nom = document.querySelector("#lastname");
  var newNom = document.querySelector("#newLastname");

  nom.onmouseover = function(){
    var lastname = nom.value;
    nom.value = "Modifier";
    nom.onmouseout = function(){
      nom.value = lastname;
    }
  }

  nom.onclick = function(){
    nom.style.display = "none";
    newNom.style.display = "";
  }

  var email = document.querySelector("#email");
  var newEmail = document.querySelector("#newEmail");
  var c_newEmail = document.querySelector("#c_newEmail");

  email.onmouseover = function(){
    var Email = email.value;
    email.value = "Modifier";
    email.onmouseout = function() {
      email.value = Email;
    }
  }

  email.onclick = function(){
    email.style.display = "none";
    newEmail.style.display = "";
    c_newEmail.style.display = "";
  }

  var mdp = document.querySelector("#password");
  var newMdp = document.querySelector("#newPassword");
  var c_newMdp = document.querySelector("#c_newPassword");


  mdp.onmouseover = function(){
    mdp.value = "Modifier";
  }

  mdp.onmouseout = function() {
    mdp.value = "Modifier le mot de passe";
  }

  mdp.onclick = function(){
    mdp.style.display = "none";
    newMdp.style.display = "";
    c_newMdp.style.display = "";
  }
});