$stmt = $bdd->prepare('SELECT jeux.*, users.name as username, image.name as imagename FROM jeux
        inner join users ON jeux.id_users=users.id 
        inner join image ON jeux.id=image.id_jeux WHERE jeux.name LIKE :q ORDER BY jeux.id DESC');
        $result2 = $stmt->execute(['q' => "%$word%"]);
        $stmt->fetchAll(PDO::FETCH_ASSOC);