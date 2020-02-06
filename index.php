
<?php        
session_start();
include("user.php");
$momo= new user();

if (isset($_POST['connexion']))
{
 $login = $_POST['login'];
$password= password_hash($_POST["mdp1"], PASSWORD_DEFAULT);
$email= $_POST['email'];
$firstname= $_POST['firstn'];
$lastname= $_POST['lastn'];
$momo -> register($login,$password, $email, $firstname, $lastname);
}

?>
       <h1>Inscription</h1>
        <form name="loginform" id="loginform" action="#" method="post" class="wpl-track-me"> 
                
                    <label for="user_login">Username</label> 
                    <input type="text" id="user_login" class="input" placeholder="Username" value="" size="20" name="login" required/> 
            
  
                    <label for="user_pass">Password</label>
                    <input type="password" name="mdp1" id="user_pass" class="input" placeholder="Password" value="" size="20" required/> 
          
                    <label for="user_pass">Password</label>
                    <input type="password" name="mdp2" id="user_pass" class="input" placeholder="Confirmer Password" value="" size="20" required/> 
     
                <label for="">Email</label> 
                    <input type="text" id="user_login" class="input" placeholder="Username" value="" size="20" name="email" required/> 

                    <label for="">Firstname</label> 
                    <input type="text" id="user_login" class="input" placeholder="Username" value="" size="20" name="firstn" required/>

                    <label for="">Lastname</label> 
                    <input type="text" id="user_login" class="input" placeholder="Username" value="" size="20" name="lastn" required/>         

               <input type="submit" name="connexion" id="submit" class="button-primary" value="Log in" />
                   
            </form>
            <hr><hr>

            <?php

            if(isset($_POST['login']) && isset($_POST['password']))
        {
            $login = htmlspecialchars($_POST['login']);
            $password = htmlspecialchars($_POST['password']);
            $momo -> connect($login, $password);
                
        }
            ?>


            <h1>Connexion</h1>

            <form name="loginform" id="loginform" action="#" method="post" class=""> 
               
                    <label for="user_login">Username</label> 
                    <input type="text" id="user_login" class="input" placeholder="Username" value="" size="20" name="login" required/> 
         
                    <label for="user_pass">Password</label>
                    <input type="password" name="password" id="user_pass" class="input" placeholder="Password" value="" size="20" required/> 
    

               <input type="submit" name="submit" id="submit" class="button-primary" value="Valider" />
           </form>

         <hr><hr>
         <?php
            if(isset($_POST['deconnexion']))
                { 
            $momo -> disconnect();
                }
         ?>

          <h1>Déconnexion</h1>
          <form name="" id="loginform" action="#" method="post" class="">
            <input type="submit" name="deconnexion" id="submit" class="" value="Déconnexion" />

          <hr><hr>
         <?php
            if(isset($_POST['delete']))
                { 
            $momo -> delete();
                }
         ?>

          <h1>Delete</h1>
          <form name="" id="loginform" action="#" method="post" class="">
            <input type="submit" name="delete" id="submit" class="" value="Delete" />

            <hr><hr>
            <?php
    if (isset($_POST['modifier'])) 
    {
            $login= $_POST['login'];
            $password= password_hash($_POST["password"], PASSWORD_DEFAULT);
            $email= $_POST['email'];
            $firstname= $_POST['firstname'];
            $lastname= $_POST['lastname'];

         $momo->update($login , $password , $email , $firstname , $lastname);
         echo "Votre profil est modifié";
         

    }
    ?>
      <h1>Update</h1>
    <form method="post" action="">
        <label>Login</label>
        <input type="text" name="login">
        <label>Mot de passe</label>
        <input type="password" name="password">
        <label>Email</label>
        <input type="mail" name="email" >
        <label>Firstname</label>
        <input type="text" name="firstname">
        <label>Lastname</label>
        <input type="text" name="lastname">
        <input type="submit" name="modifier">
    </form>
    <hr><hr>
    <h1>IsConnected</h1>
    <?php
     $momo->isConnected();
    ?>





