<p align="center">Introduzca sus datos personales:</p>

<div align="center" >

  <form id="form_photos" method="post">

    <?php
    if(isset($error)){
      print ("<BR><span CLASS='styerror'>" . "* ".$error . "</span><br/>");
    }
    ?>

    <hr style="height: 0px; width: 99%; padding-top:0px; margin:30px;"/>

    <p align="center">Datos sobre la imagen:</p>


      <input name="link" type="text" id="link" class="link" placeholder="Link" value="<?php echo $_POST?$_POST['link']:""; ?>"/> 

    <br>
    <span id="e_imgnombre" class="styerror"></span>
    <input name="imgnombre" type="text" id="imgnombre" placeholder="Imagen nombre" class="imgnombre" value="<?php echo $_POST?$_POST['imgnombre']:""; ?>"/>

    <br>
    <span id="e_descr" class="styerror"></span>

    <textarea name="descr"  id="descr" class="descr" placeholder="Descripcion"  value="<?php echo $_POST?$_POST['descr']:""; ?>" ><?php echo $_POST?$_POST['descr']:""; ?></textarea>

    <br>
    <div class="checkbox1">
      <h4> Formato: </h4>
      RAW <input type="radio" name="tipo" value="RAW" class="checkbox1" checked >
      JPEG  <input type="radio" name="tipo" value="JPEG" class="checkbox1">
      PNG <input type="radio" name="tipo" value="PNG"  class="checkbox1">
    </div>

    <tr>
      <td>Localizacion: </td>
      <td>
        <select name="location" id="location" placeholder="Localizacion">
          <option value="Urbano" selected>Urbano</option>
          <option value="Naturaleza">Naturaleza</option>
          <option value="Interior">Interior</option>
        </select>
      </td>
    </tr>

    <div class="checkbox1">
     <td>Tipo de fotografia: </td>
     <td>
      <input type="checkbox" id= "formato[]" name="formato[]" placeholder= "formato" value="Retrato" class="checkbox1" checked/>Retrato
      <input type="checkbox" id= "formato[]" name="formato[]" placeholder= "formato" value="Paisaje" class="checkbox1"/>Paisaje
      <input type="checkbox" id= "formato[]" name="formato[]" placeholder= "formato" value="Aerea" class="checkbox1"/>Aerea

    </div>
    <br><br>
    <input name="submit" id="submit" type="submit" value="Enviar" class="boton"/>

  </form>
</div>
