    @extends('layouts.blanco')
    @section('title', 'Iniciar sesión')

    @section('content')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
   
<script src="jquery-1.3.2.min.js" type="text/javascript"></script>   
<script>
jQuery(document).ready(function(){
  $(".oculto").hide();              
    $(".inf").click(function(){
          var nodo = $(this).attr("href");  
 
          if ($(nodo).is(":visible")){
               $(nodo).hide();
               return false;
          }else{
        $(".oculto").hide("slow");                             
        $(nodo).fadeToggle("slow");
        return false;
          }
    });
}); 
function aparecer(){
    document.getElementById('info4').style.display = "block";

}
function ocultar(){
    document.getElementById('info4').style.display = "none";

}
</script>
<div class="row">
                    <div class="col-md-6 login-form-1">
                        <h3>Registrarse</h3>
                        <form class="form" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
                                <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Nombre">
                            </div>
                           <div class="row">
                            
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                            <input type="text" name="first_name" id="first_name" class="form-control input-sm" placeholder="Apellido paterno">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="Apellido materno">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Correo electrónico">
                            </div>

                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Contraseña">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirmar contraseña">
                                    </div>
                                </div>
                         
                            </div>
         <div class="form-group">
                                <input type="number" name="phone"  min="0" class="form-control input-sm" placeholder="Teléfono" pattern="[0-9]">
                            </div>
                            <div class="form-group">
                                <p>Selecciona la opción de acuerdo sí eres estudiante del ITLM</p>
                               
            <label class="form-check form-check-inline">
          <input class="form-check-input" onclick="ocultar()" type="radio" name="gender" value="option1">
          <span class="form-check-label">Externo</span>
        </label>
        <div > 
            <label class="form-check form-check-inline ">
          <input onclick="aparecer()" href="#info4" class="form-check-input"   type="radio" name="gender" value="option2">
          <span class="form-check-label">Interno</span>
        </label>
    </div>
      

        

    </div>
    <div class="row well oculto" id="info4">
          <div  class="form-group col-md-6"">
            <p>LLena los campos con la carrera que cursas en ITLM y tu No. Control de estudiante.</p>
             <input type="text" name="numeroControl"  min="0" maxlength="8" class="form-control input-sm" placeholder="No. Control"  >
           </div>
                 <div class="form-group col-md-6">   
          <select id="inputState" class="form-control">
            <option>BD1</option>
              <option>BD2</option>
              <option>BD3</option>
              <option selected="">Ing. Industrial</option>
              <option>BD4</option>
              <option>BD5</option>
          </select>
        </div>
    </div>
        <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Registrar</button>
    </div>
                        </form>
                    </div>


                    <div class="col-md-6 login-form-2">
                        <h3>Iniciar Sesión</h3>
                        <form class="form" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
                            <div class="form-group">
                                <input id="email" type="email" name="email" placeholder="Correo electrónico" value="{{ old('email') }}" required autofocus class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}">
             @if ($errors->has('email')) <div class="invalid-feedback">{{ $errors->first('email') }}</div> @endif
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" name="password" placeholder="Contraseña" required class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}">
            @if ($errors->has('password')) <div class="invalid-feedback">{{ $errors->first('password') }}</div> @endif
                            </div>
                          <div class="row">
                              
                          </div>
                                <div class="form-group">
                                <input type="submit" class="btnSubmit" value="Iniciar Sesión" />
                            </div>
                            
                           
                            <div class="form-group">

                                <a href="{{ route('password.request') }}" class="ForgetPwd" value="Login">¿Olvidaste la contraseña?</a>
                            </div>
                               <div class="form-group">

                               
                            </div>
                        </form>
                    </div>
                </div>
            </div>
          

    @endsection
