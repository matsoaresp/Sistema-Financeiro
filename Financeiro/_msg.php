<?php

if (isset($_GET['ret'])){

   $ret = $_GET['ret'];
}


if(isset($ret))  {

    switch ($ret){

    case 0:
        echo '<div class="alert alert-danger">
        Preencher o(s) campo(s) obrigatorio (s). 
     </div>';
     break;
     
     case 1:
        echo '<div class="alert alert-success">
        Ação realizada com sucesso!.
     </div>';
     break;

     case -1:
        echo '<div class="alert alert-danger">
        Ocorreu um erro na operação. Tente novamente mais tarde!.
     </div>';
        break;

        case -2:
         echo '<div class="alert alert-danger">
         A senha deverá conter no mínimo 6 caracteres!.
      </div>';
         break;

         case -3:
            echo '<div class="alert alert-danger">
            Senha e Repetir Senha não conferem!
         </div>';
            break;

         case -4:
             echo '<div class="alert alert-danger">
               Não foi possível excluir o registro, pois o mesmo pode estar em uso!
      </div>';
            break;

            case -5:
               echo '<div class="alert alert-danger">
                 Preencha os campos corretamente!
        </div>';
              break;

              case -6:
               echo '<div class="alert alert-danger">
                 Email já cadastrado. Coloque outro e-mail!
        </div>';
              break;

              case -7:
               echo '<div class="alert alert-danger">
                 Usuario não encontrado.
        </div>';
              break;

    }
}

