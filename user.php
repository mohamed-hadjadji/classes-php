<?php

class User
{
  
	private $id = "";
	public $login ="";
	public $email ="";
	public $firstname ="";
	public $lastname ="";

	public function register($login,$password, $email, $firstname, $lastname)
	{
	  $connexion =  mysqli_connect("localhost","root","","classes");
       if (isset($_POST['connexion']))
       {
            $login = $_POST['login'];
	        $password= password_hash($_POST["mdp1"], PASSWORD_DEFAULT, array('cost' => 12));
	        $email= $_POST['email'];
	        $firstname= $_POST['firstn'];
	        $lastname= $_POST['lastn'];

	        if ($_POST['mdp1']==$_POST['mdp2'])
            {
            $requet="SELECT* FROM utilisateurs WHERE login='".$login."'";
            $query2=mysqli_query($connexion,$requet);
            $resultat=mysqli_fetch_all($query2);
            $trouve=false;
            foreach ($resultat as $key => $value) 
            {
            if ($resultat[$key][1]==$_POST['login'])
            {
               $trouve=true;
               echo "<p class='erreur'><b>Login déja existant!!</b></p>";
            }
           }
           if ($trouve==false)
           {
            $sql = "INSERT INTO utilisateurs (login,password,email,firstname,lastname)
                VALUES ('$login','$password', '$email','$firstname', '$lastname')";
            $query=mysqli_query($connexion,$sql);
            header('location:index.php');
            }
           }
           else
           {
              echo "<p class='erreur'><b>Les mots de passe doivent être identique!</b></p>";
           }
        }

	}

	public function connect($login, $password)
	{
      $connexion =  mysqli_connect("localhost","root","","classes"); 
      $login = htmlspecialchars($_POST['login']);
      $password = htmlspecialchars($_POST['password']);

            if($login !== "" && $password !== "")
            {
                $requete = "SELECT count(*) FROM utilisateurs where
                login = '".$login."' ";
                $exec_requete = mysqli_query($connexion,$requete);
                $reponse      = mysqli_fetch_array($exec_requete);
                $count = $reponse['count(*)'];

                $requete4 = "SELECT * FROM utilisateurs WHERE login='".$login."'";
                $exec_requete4 = mysqli_query($connexion,$requete4);
                $reponse4 = mysqli_fetch_array($exec_requete4);

                if( $count!=0 && $_SESSION['login'] !== "" && password_verify($password, $reponse4[2]) )
                {
            
                $_SESSION['login'] = $_POST['login'];
                $user = $_SESSION['login'];

            echo "<h3><b>Bonjour <u>$user,</u> vous êtes connecté</b></h3>";

                }
                else
                {
                header('Location: connexion.php?erreur=1'); // utilisateur ou mot de passe incorrect
                }
            }
	}

	public function disconnect()
	{
      session_unset();
                      
	}

	public function delete()
	{
		$connexion =  mysqli_connect("localhost","root","","classes"); 
		$requete = "DELETE FROM utilisateurs WHERE login = '".$_SESSION['login']."'";
		$query=mysqli_query($connexion,$requete);


	}

	public function update($login, $email, $firstname, $lastname)
	{

	}

	public function isConnected()
	{

	}
}
?>