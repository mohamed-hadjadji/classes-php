<?php
session_start();
class user
{
	private	$id ;
	public $login;
	private	$password;
	public $email;
	public $firstname;
	public $lastname;

public function register($login,$password, $email, $firstname, $lastname)
	{
		 $connexion =  mysqli_connect("localhost","root","","classes");
		 $sql = "INSERT INTO utilisateurs (login,password,email,firstname,lastname)
                VALUES ('".$login."', '".$password."','".$email."','".$firstname."','".$lastname."')";
         $query=mysqli_query($connexion,$sql);

         $table = 
		array($login,$password,$firstname,$lastname,$email);
    	return $table;
	}

	public function connect($login, $password)
	{
        $connexion =  mysqli_connect("localhost","root","","classes");
        $requete = "SELECT * FROM utilisateurs WHERE login='".$login."'";
        $query=mysqli_query($connexion,$requete);
		$resultat=mysqli_fetch_all($query);
		if ($login==$resultat[0][1] && $password==$resultat[0][2])
		{
			$this->id = $resultat[0][0];
			$this->login = $login;
			$this->password = $password;
			$this->email =$resultat[0][3];;
		    $this->firstname= $resultat[0][4];
		    $this->lastname= $resultat[0][5];

			echo"Vous etes connecté";
		}
		else
		{
			echo"login ou mot de passe incorrect";
		}
    }
}


		$momo = new user();


//$momo->register("mo","moma","moma@moma","MOMA","MO");
$momo->connect("mo", "moma"); 
//var_dump($momo);   		