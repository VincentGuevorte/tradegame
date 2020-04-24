if ($jeux->insert()){
        
        $image = new Image($bdd);


        $image->setName($_POST['name']);
        $image->setId_jeux($_SESSION['id']);
        
        header('location: mes_jeux.php');
        
            }else{
        
        $error = 'Ajout echoué';
        
            }
        }