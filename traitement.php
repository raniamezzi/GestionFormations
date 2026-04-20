<?php
// 1. Vérifier que le formulaire a été envoyé via la méthode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 2. Récupération et nettoyage des données avec trim()
    $nom = trim($_POST["nom"]);
    $prenom = trim($_POST["prenom"]);
    $email = trim($_POST["email"]);
    
    // Initialisation de la variable qui contiendra les messages d'erreur
    $erreur = "";

    // 3. Validation du Nom
    if (empty($nom)) {
        $erreur .= "Le nom est obligatoire.<br>";
    }

    // 4. Validation du Prénom
    if (empty($prenom)) {
        $erreur .= "Le prénom est obligatoire.<br>";
    }

    // 5. Validation de l'Email (Obligation + Format)
    if (empty($email)) {
        $erreur .= "L'email est obligatoire.<br>"; 
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreur .= "Format email invalide.<br>"; 
    }

    // 6. Affichage des résultats
    if (!empty($erreur)) {
        // S'il y a des erreurs, on les affiche en rouge
        echo "<div style='color:red;'>$erreur</div>"; 
    } else {
        // Si tout est correct, on affiche un message de succès en vert
        echo "<div style='color:green;'>Formulaire valide</div>"; 
        echo "Nom : $nom <br> Prénom : $prenom <br> Email : $email"; 
    }
}
