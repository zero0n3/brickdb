<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>@yield('title','Homeee')</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">

    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  </head>
  
  <body>


    <!-- NAVBAR -->
    <div class="bd-example is-paddingless">
          <nav class="navbar is-light">
      <div class="navbar-brand">
        <a class="navbar-item" href="#">
          
            <img src="https://bulma.io/images/bulma-logo.png" alt="Bulma: a modern CSS framework based on Flexbox" width="112" height="28">
          
        </a>
        <div class="navbar-burger burger" data-target="navMenuColorlight-example">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    
      <div id="navMenuColorlight-example" class="navbar-menu">
        <div class="navbar-start">
          <a class="navbar-item" href="#">
            Home
          </a>
          
          <!-- PARTS -->
          <div class="navbar-item has-dropdown is-hoverable">
            <label class="navbar-link">
              Parts
            </label>
            <div class="navbar-dropdown">
              <a class="navbar-item" href="/partlist">
                Part List ADMIN
              </a>
              
              <hr class="navbar-divider">
              
              <a class="navbar-item" href="#">
                XXXX
              </a>
              
            </div>
          </div>
          
          <!-- INVENTORY -->
          <div class="navbar-item has-dropdown is-hoverable">
            <label class="navbar-link">
              Inventory
            </label>
            <div class="navbar-dropdown">
              <a class="navbar-item" href="/inventory">
                Inventory List X USER
              </a>
              
              <hr class="navbar-divider">
              
              <a class="navbar-item" href="{{route('create.inventory')}}">
                New Inventory
              </a>
              
            </div>
          </div>
          
        </div>

        <!-- SOCIAL -->    
        <div class="navbar-end">
          <div class="navbar-item">
            <div class="field is-grouped">
              <p class="control">
                <a class="button is-primary" href="#">
                  <span class="icon">
                    <svg class="svg-inline--fa fa-download fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="download" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M216 0h80c13.3 0 24 10.7 24 24v168h87.7c17.8 0 26.7 21.5 14.1 34.1L269.7 378.3c-7.5 7.5-19.8 7.5-27.3 0L90.1 226.1c-12.6-12.6-3.7-34.1 14.1-34.1H192V24c0-13.3 10.7-24 24-24zm296 376v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h146.7l49 49c20.1 20.1 52.5 20.1 72.6 0l49-49H488c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path></svg><!-- <i class="fas fa-download"></i> -->
                  </span>
                  <span>Download</span>
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </nav>
        </div>


    


    <section class="section">
      <div class="container">
        
        @yield('content')

      </div>
    </section>





    @section('footer')
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <!--Bulma js -->
      <script src="https://bulma.io/lib/main.js?v=201802271033"></script>
    @show
  </body>
</html>