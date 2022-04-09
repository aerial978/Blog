<?php

abstract class manager
{
    protected function dbConnect()
    {
        try 
        {
            $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8','root','root');

            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $bdd;
        }    
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    }        
}