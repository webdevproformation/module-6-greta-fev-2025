<?php 


abstract class AbstractController{
    protected function render( string $template_name , array $data = [] ){
        extract($data);
 
        /**
         $data = [ 'titre' => "page d'accueil" , "description" => "texte" , 
         "vehicules" => [ ..... ]];
         extract($data);
         $titre = "page d'accueil" ; 
         $description = "texte"; 
         $vehicules = [ ..... ]; 
         */
 
 
        require_once "Vue/header.php";
        require_once "Vue/$template_name.php";
        require_once "Vue/footer.php";
     }

     protected function file_upload($input_name = "url_img" , $target_dir = "public/img/"){
        $erreurs = [];

        $original_file_name = basename($_FILES[$input_name]["name"]) ;
        $target_file = __DIR__ . "/../". $target_dir . $original_file_name;
         
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if(!empty($_POST)) {
            if(empty($_FILES[$input_name]["tmp_name"])){
                return [
                    "path" =>  "",
                    "erreurs" => ["fichier invalide"]
                ]  ;
            }
            $check = getimagesize($_FILES[$input_name]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                $erreurs[] =  "File is not an image.";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            return [
              "path" =>  $target_dir.$original_file_name,
              "erreurs" => $erreurs
            ] ; 
        }

        // Check file size
        if ($_FILES[$input_name]["size"] > 5_000_000) {
            $erreurs[] =  "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if( $imageFileType != "jpg" && 
            $imageFileType != "png" && 
            $imageFileType != "jpeg" && 
            $imageFileType != "gif" 
        ) {
            $erreurs[] =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $erreurs[] =  "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES[$input_name]["tmp_name"], $target_file)) {
                
                //echo "The file ". htmlspecialchars( basename( $_FILES[$input_name]["name"])). " has been uploaded.";
            } else {
                $erreurs[] =  "Sorry, there was an error uploading your file.";
            }
        }
        return [
            "path" =>  $target_dir.$original_file_name,
            "erreurs" => $erreurs
        ] ;
    }
}