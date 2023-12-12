
  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="utf-8">
      <title>EShopper - Bootstrap Shop Template</title>
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <meta content="Free HTML Templates" name="keywords">
      <meta content="Free HTML Templates" name="description">

      <!-- Favicon -->
      <link href="img/favicon.ico" rel="icon">

      <!-- Google Web Fonts -->
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

      <!-- Font Awesome -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

      <!-- Libraries Stylesheet -->
      <link href="{{ asset('mainassets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

      <!-- Customized Bootstrap Stylesheet -->
      <link href="{{ asset('mainassets/css/style.css') }}" rel="stylesheet">
  </head>

  <body>
      <!-- Topbar Start -->
      @include('inc.guest.topbar')
      <!-- Topbar End -->


      <!-- Navbar Start -->
      @include('inc.guest.navbar')

      <!-- Navbar End -->
      <h1 style="text-align: center;">Veuillez remplir le formulaire</h1>

      <div class="d-flex justify-content-center mt-4">

      <form class="w-50" action="/form/store" method="POST" enctype="multipart/form-data">
          @csrf
          <!-- 2 column grid layout with text inputs for the first and last names -->
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                  <input type="hidden" name="id_client" value="{{ $louer->id }}">
                <input type="text" name="nom" id="form6Example1" class="form-control" />
                <label class="form-label" for="form6Example1">Nom</label>
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <input type="text" name="prenom" id="form6Example2" class="form-control" />
                <label class="form-label" for="form6Example2">Prenom </label>
              </div>
            </div>
          </div>
        
          <!-- Text input -->
          <div class="form-outline mb-4">
            <input type="text" name="tel" id="form6Example3" class="form-control" />
            <label class="form-label" for="form6Example3">Tel</label>
          </div>
        
          <!-- Text input -->
          <div class="form-outline mb-4">
            <input name="addresse" type="text" id="form6Example4" class="form-control" />
            <label class="form-label" for="form6Example4">Addresse</label>
          </div>
        

          <!-- Text input -->
          <div class="form-outline mb-4">
          <input name="date_debut" type="date" id="form6Example4" class="form-control" />
          <label class="form-label" for="form6Example4">Date de debut</label>
          </div>


          <!-- Text input -->
          <div class="form-outline mb-4">
              <input name="date_fin" type="date" id="form6Example4" class="form-control" />
              <label class="form-label" for="form6Example4">date de fin</label>
            </div>
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="file" name="image_cin" id="form6Example5" class="form-control" />
            <label class="form-label" for="form6Example5">image_cin</label>
          </div>

          <!-- Submit button -->
          <button type="submit" class="btn btn-primary btn-block mb-4">Place order</button>
        </form>
      </div>
      
      <!-- Footer Start -->
    @include('inc.guest.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('mainassets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('mainassets/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('mainassets/mail/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ asset('mainassets/mail/contact.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('mainassets/js/main.js') }}"></script>
  </body>

  </html>