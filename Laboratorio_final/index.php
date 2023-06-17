<!DOCTYPE html>
<html lang="ES-es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title class="titulo" >Formulario de registro</title>
    <link rel="stylesheet" href="style.css">
    <script>
     let usuario = "<?php echo $usuario; ?>";
     let email = "<?php echo $email; ?>";
     </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    
</head>

<body class="body">
    <form class="form" method="post" action="" name="form" id="form">

     <h2>Formulario de registro</h2> 
        
     <div class="form-floating mb-3">
        <input type="text" class="form-control form-control-lg" name="nombre" placeholder="Nombre" required>
        <label for="floatingInput" class="Nombre-label">Nombre</label>
     </div>

     <div class="form-floating mb-3">
        <input type="text" class="form-control form-control-lg" name="primerApellido" placeholder="Primer apellido" required>
        <label for="floatingInput" class="Apellido1-label">Primer apellido</label>
     </div>
     
     
     <!--A pesar de ser un campo obligatorio, para hacerlo más realista no lo pongo required-->
     <div class="form-floating mb-3">
        <input type="text" class="form-control form-control-lg" name="segundoApellido" placeholder="Segundo apellido">
        <label for="floatingInput" class="Apellido2-label">Segundo apellido</label>
     </div>
        
     <div class="form-floating mb-3">
        <input type="email" class="form-control form-control-lg" name="email" placeholder="Correo electrónico" required>
        <label for="floatingInput" class="Email-label">Correo electrónico</label>
     </div>

     <div class="form-floating mb-3">
        <input type="text" class="form-control form-control-lg" name="usuario" placeholder="Nombre de usuario" required>
        <label for="floatingInput" class="Username-label">Nombre de usuario</label>
     </div>

     <div class="form-floating mb-3">
        <input type="password" class="form-control form-control-lg" name="contraseña" placeholder="Contraseña" minlength="4" maxlength="8" required>
        <label for="floatingInput" class="Password-label">Contraseña</label>
        <span id="passwordHelpInline" class="span-contraseña">Debe tener entre 4 y 8 caracteres</span>
    
    
    <div class="form-floating mb-3">
        <input type="password" class="form-control form-control-lg" name="confirmPassword" placeholder="Confirma la contraseña" minlength="4" maxlength="8" required>
        <label for="floatingInput" class="ConfirmPassword-label">Confirma la contraseña</label>
        <span name="passwordError" style="color: #ff008c; display: none;">Las contraseñas no coinciden</span>

       <!--Botón estético, para simular página web más realista-->
        <div class="control-group">
         <div class="Recuerdame">
           <label class="checkbox">
             <input type="checkbox"> Recuérdame
           </label>
         </div>
     </div>
     </div>         
     
     <!--Botón estético, para simular página web más realista-->
     <div class="form-check form-switch mb-3">
        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
        <label class="form-check-label" for="flexSwitchCheckDefault">Acepto los términos y condiciones</label>
     </div>
     
     
     <div class="d-grid gap-2 col-6 mx-auto">
        <button class="btn btn-outline-primary" name="btn-crearUsuario" type="submit">Crear usuario</button>
     </div>

     <script>
        const passwordInput = document.getElementsByName("contraseña")[0];
        const confirmPasswordInput = document.getElementsByName("confirmPassword")[0];
        const passwordError = document.getElementsByName("passwordError")[0];

        function validatePassword() {
        if (passwordInput.value !== confirmPasswordInput.value) {
            passwordError.style.display = "block";
        } else {
            passwordError.style.display = "none";
        }
        }

        confirmPasswordInput.addEventListener("input", validatePassword);
     </script>
    
        <?php
            $mostrarConsulta = false;

            if(isset($_POST["btn-crearUsuario"])) {
                $nombre = $_POST["nombre"];
                $primerApellido = $_POST["primerApellido"];
                $segundoApellido = $_POST["segundoApellido"];
                $email = $_POST["email"];
                $usuario = $_POST["usuario"];
                $userPassword = $_POST["contraseña"];
                $confirmPassword = $_POST["confirmPassword"];

                 if(empty($nombre) || empty($primerApellido) || empty($email) || empty($usuario) || empty($userPassword) || empty($confirmPassword)) {
                    die("Por favor, rellene los datos requeridos");
                } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    die("El correo electrónico no es válido");
                } elseif(strlen($userPassword) < 4 || strlen($userPassword) > 8) {
                    die("La contraseña debe tener entre 4 y 8 caracteres");
                }

                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "LaboratorioFinal";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Conexión fallida: " . $conn->connect_error);
                }

                $query = "SELECT * FROM `REGISTRO_USUARIOS` WHERE `EMAIL` = '$email'";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    die("Este correo electrónico ya está registrado");
                }

                $query = "SELECT * FROM `REGISTRO_USUARIOS` WHERE `USERNAME` = '$usuario'";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    die("Este usuario ya está registrado");
                }

                $sql = "INSERT INTO `REGISTRO_USUARIOS` (`NAME`, `FIRST_SURNAME`, `SECOND_SURNAME`, `EMAIL`, `USERNAME`, `PASSWORD`) VALUES ('$nombre', '$primerApellido', '$segundoApellido', '$email', '$usuario', '$userPassword')";

                if ($conn->query($sql) === true) {
                    echo "Registro insertado correctamente";
                   
                }
            
                $sql = "SELECT * FROM `REGISTRO_USUARIOS`";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    echo "<h2>    </h2> ";
                    $mostrarConsulta = true;
                    if ($mostrarConsulta) {

                        echo '<form method="post" action="">';
                        echo '<button onclick="mostrarTexto()" class="btn btn-outline-primary" name="btn-consultar" id="btn_consultar" type="button">Consultar lista de usuarios</button>';
                        echo '</form>';
                      
                        //Por posibles cuestiones de seguirdad solo se muestra el nombre de usuario y correo

                        while ($row = $result->fetch_assoc()) {
                            echo "<li id='texto' class='oculto'> Correo eléctronico: " . $row['EMAIL'] . "</li>"; 
                            echo "<li id='texto' class='oculto'>Nombre de usuario: " . $row['USERNAME'] ."</li>";
                    }
                    
                    }
                } else { 
                    echo "Error al obtener los datos" . $conn->error;
            }
            
            $conn->close();

        }
            
            ?>    
     
         <script>

            function mostrarTexto() {
            var elementosTexto = document.querySelectorAll("#texto");
            for (var i = 0; i < elementosTexto.length; i++) {
                elementosTexto[i].classList.toggle("oculto");
                elementosTexto[i].classList.toggle("mostrar");
                }
         }
         
         </script>

    </form>
    
</body>
</html>
