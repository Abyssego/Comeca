<?php
if (isset($_FILES['pdfFile'])) {
    $file = $_FILES['pdfFile'];

    // Emplacement de stockage du fichier téléversé
    $uploadDirectory = 'uploads/';

    // Assurez-vous que le dossier d'upload existe, sinon créez-le
    if (!is_dir($uploadDirectory)) {
        mkdir($uploadDirectory, 0777, true);
    }

    // Chemin complet du fichier téléversé
    $filePath = $uploadDirectory . basename($file['name']);

    // Déplacer le fichier téléversé vers son emplacement final
    if (move_uploaded_file($file['tmp_name'], $filePath)) {
        echo "Le fichier PDF a été téléversé avec succès.";
    } else {
        echo "Une erreur s'est produite lors du téléversement du fichier PDF.";
    }
}
?>