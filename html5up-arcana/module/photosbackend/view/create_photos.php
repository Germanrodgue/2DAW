<br>

<script type="text/javascript" src="<?php echo PHOTOS_B_JS_PATH ?>photos.js"></script>
<div align="center">

  <form id="form_photos" method="post">

    <hr style="height: 0px; width: 99%; padding-top:0px; margin:10px;" />

    <p align="center">Datos sobre la imagen:</p>


    <input name="link" type="text" id="link" class="link" value="" placeholder="Link"/>

    <br>

    <input id="imgnombre" name="imgnombre" type="text" id="imgnombre" class="imgnombre" value="" placeholder="Nombre de la imagen"/>

    <br>

    <textarea  name="descr" id="descr" class="descr" value="" placeholder="Descripcion"></textarea>
    <br>
    <input id="fecha" type="text" name="fecha" class="fecha" readonly="readonly" value="" placeholder="Fecha"/>

    <br> Formato: RAW <input type="radio" id="tipo" name="tipo" value="RAW" class="checkbox1" checked> JPEG <input type="radio"
      id="tipo" name="tipo" value="JPEG" class="checkbox1"> PNG <input type="radio" id="tipo" name="tipo" value="PNG" class="checkbox1">
    <br/>

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
    <br/>

    <td>Tipo de fotografia: </td>
    <td>
      <input type="checkbox" id="formato[]" name="formato[]" placeholder="formato" value="Retrato" class="checkbox2" checked/>Retrato
      <input type="checkbox" id="formato[]" name="formato[]" placeholder="formato" value="Paisaje" class="checkbox2" />Paisaje
      <input type="checkbox" id="formato[]" name="formato[]" placeholder="formato" value="Aerea" class="checkbox2" />Aerea


      <br>
      <tr>
        <td>Pais: </td>
        <td id="error_pais">
          <select name="pais" id="pais">
      <option selected>Selecciona pais</option>
    </select>
          <div></div>
        </td>
      </tr>
      <tr>
        <td> </td>
      </tr>
      <tr>
        <td>Provincia: </td>
        <td id="error_provincia">
          <select name="provincia" id="provincia">
      <option selected>Selecciona provincia</option>
    </select>
          <div></div>
        </td>
      </tr>
      <tr>
        <td> </td>
      </tr>
      <tr>
        <td>Ciudad: </td>
        <td id="error_ciudad">
          <select name="ciudad" id="ciudad">
      <option selected>Selecciona ciudad</option>
    </select>
          <div></div>
        </td>

        <br/>
        <div id="dropzone" class="dropzone"></div><br/>
        <br><br>

        <button type="button" id="submit_photo" name="submit_photo" class="submit_photos" value="submit">Enviar</button>
  </form>
</div>