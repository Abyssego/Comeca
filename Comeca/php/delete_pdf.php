<?php
if (isset($_POST['delete']) && isset($_POST['pdf_file'])) {
    $fileName = $_POST['pdf_file'];
    $filePath = "uploads/" . $fileName;

    if (file_exists($filePath)) {
        unlink($filePath);
        echo "Le fichier PDF a été supprimé avec succès.";
    } else {
        echo "Le fichier PDF n'existe pas.";
    }
} else {
    echo "Erreur lors de la suppression du fichier PDF.";
}
?>