<div class="container">
        <h1 class="text-center fs-3 my-3">Lorem, ipsum dolor.</h1>
        <h2 class="text-center fs-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, excepturi?</h2>
        <hr class="text-center mt-3 mb-5 border border-dark border-2" style="width: 50px; margin: 0 auto;">
        <!-- main balise pour la partie centrale de la page -->
        <main class="row">
            <form action="http://192.168.33.10/jour07-formulaire-css/index.php" method="POST" class="col-8">
                <!-- div*3>input -->
                <div><input type="text" name="name" placeholder="name" class="form-control mb-3"></div>
                <div><input type="text" name="email" placeholder="email" class="form-control mb-3"></div>
                <div><input type="text" name="subject" placeholder="subject" class="form-control mb-3"></div>
                <div>
                    <textarea name="message" placeholder="message" class="form-control mb-3" rows="10"></textarea>
                </div>
                <div>
                    <input type="checkbox" id="checkbox" name="checkbox">
                    <label for="checkbox">Send a copy to yourself ?</label>
                </div>
                <p class="text-center">are you a Humain ?? 8+9=</p>
                <div><input type="text" name="control"  class="form-control mb-3"></div>
                <div class="d-flex justify-content-end">
                    <input type="submit" class="btn btn-outline-dark btn-lg rounded-0">
                </div>
            </form>
            <!-- barre laterale -->
            <aside class="col-4">
                <h3 class="h5">Adresse</h3>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.99144490107!2d2.2896103866690094!3d48.85837352680153!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e2964e34e2d%3A0x8ddca9ee380ef7e0!2sTour%20Eiffel!5e0!3m2!1sfr!2sfr!4v1738681281704!5m2!1sfr!2sfr"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <h3 class="h5">Our Agence</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Est id sint libero eius iure. Officia neque illum eligendi necessitatibus perferendis!</p>
                <h3 class="h5">Contact us</h3>
                <ul class="list-unstyled">
                    <li>100101010101</li>
                    <li>100101010102</li>
                </ul>
                <address>
                    <h3 class="h5">Visit us</h3>
                    <p>Lorem ipsum dolor sit amet, <br>
                    consectetur adipisicing elit. <br>
                    Tenetur, accusamus nemo.  <br>
                    Iste, nam. <br>
                    Facere, quis.</p>
                </address>
            </aside>
        </main>
    </div>