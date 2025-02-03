


<main class="container">
    <h1>page de connexion</h1>
    <!-- // http://192.168.33.10/jour06/index.php -->

    <form action="http://192.168.33.10/jour06/index.php?page=alain" method="POST" >
        <!-- balise form a deux attributs
         lien hypertext / method => POST  -->
        <section class="row">
        <div class="form-group col">
            <label for="login">votre login</label>
            <input type="text" name="login" class="form-control" id="login" >
        </div>
        <div class="form-group col">
            <label for="password">votre password</label>
            <input type="text" name="password" class="form-control" id="password" >
        </div>
        </section>
        <div class="mt-4 d-flex justify-content-center">
            <input type="submit" class="btn btn-primary">
        </div>
    </form>

</main>
