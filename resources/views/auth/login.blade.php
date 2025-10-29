<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }
        .h-custom {
            height: calc(100% - 73px);
        }
        @media (max-width: 450px) {
            .h-custom {
                height: 100%;
            }
        }
      </style>
    <title>Login</title>
</head>
    <body>
        <section class="vh-100">
            <div class="container-fluid h-custom">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                  <a href="/"><img src="https://img.freepik.com/vector-gratis/ilustracion-publicacion-blog-plana-organica-personas_23-2148955260.jpg?auto=format&h=700" class="img-fluid" alt="Sample image"></a>  
                </div>
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                  <form method="POST" action="{{ route('login') }}">
                    @csrf     
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control form-control-lg rounded" placeholder="Ingrese su email" autofocus/>     
                    </div>
          
                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <label class="form-label" for="password">Contraseña</label>
                        <input type="password" id="password" name="password" class="form-control form-control-lg rounded" placeholder="Ingrese su contraseña" />  
                    </div>
          
                    <div class="d-flex justify-content-between align-items-center">
                      <!-- Checkbox -->
                      <div class="form-check mb-0">
                        <input class="form-check-input me-2 rounded" type="checkbox" value="" id="remember_me" name="remember"/>
                        <label class="form-check-label" for="remember_me">
                          Recuerdame
                        </label>
                      </div>

                        @if (Route::has('password.request'))
                            <a class="text-body" href="{{ route('password.request') }}">Olvidaste tu contraseña?</a>
                        @endif
                    </div>  

          
                    <div class="text-center text-lg-start mt-4 pt-2">
                      <button type="submit" class="btn btn-primary btn-lg bg-primary" style="padding-left: 2.5rem; padding-right: 2.5rem;">Iniciar sesión</button>                        
                      <p class="small fw-bold mt-2 pt-1 mb-0">No tienes una cuenta? <a href="/register" class="link-danger">Registrate</a></p>                         
                    </div>
          
                  </form>
                </div>
              </div>
            </div>
            <div
              class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
              <!-- Copyright -->
              <div class="text-white mb-3 mb-md-0">
                
              </div>
              <!-- Copyright -->
          
              <!-- Right -->
              <div>
                <a href="#!" class="text-white me-4">
                  <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#!" class="text-white me-4">
                  <i class="fab fa-twitter"></i>
                </a>
                <a href="#!" class="text-white me-4">
                  <i class="fab fa-google"></i>
                </a>
                <a href="#!" class="text-white">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </div>
              <!-- Right -->
            </div>
          </section>
        


        <!-- Bootstrap -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body>
</html>
