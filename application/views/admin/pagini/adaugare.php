
<script src="/ckeditor/ckeditor.js"></script>

&emsp; <a href="/admin/pagini">inapoi</a>
<form method="POST">
    <table>
        <tr>
            <td>
                <label>Nume pagina:</label>
            </td>
            <td>
                <input type="text" name="nume" 
                       value="<?php echo $pagina->nume; ?>">
                <?php echo @$errors['nume']; ?>
            </td>
        </tr>
        <tr>
            <td>
                <label>Cheie URL:</label>
            </td>
            <td>
                <input type="text" name="cheie"
                       value="<?php echo $pagina->cheie; ?>">
                <?php echo @$errors['cheie']; ?>
            </td>
        </tr>
        <tr>
            <td>
                <label>Activa/Inactiva</label>
            </td>
            <td>
                <input type="radio" name="activa" value="1"
                       <?php echo ($pagina->activa == 1)?"checked":""; ?>
                       >Activa<br>
                <input type="radio" name="activa" value="2"
                       <?php echo ($pagina->activa == 2)?"checked":""; ?>
                       >Inactiva
            </td>
        </tr>
        <tr>
            <td>
                <label>Ordine:</label>
            </td>
            <td>
                <input type="text" name="ordine" 
                       value="<?php echo $pagina->ordine; ?>">
            </td>
        </tr>
        <tr>
            <td>
                <label>Principala</label>
            </td>
            <td>
                <input type="checkbox" name="principala" value="1"
                <?php if ($pagina->principala == 1): ?>
                           checked
                       <?php endif; ?>
                       >
            </td>
        </tr>
        <tr>
            <td>
                Meniu asociat:
            </td>
            <td>
                <?php $meniuri = array("top", "left", "right", "bottom"); ?>
                <select name="meniu">
                    <?php $j = 0; for ($i = 1; $i <= 4; $i++): ?>
                        <option value="<?php echo $i; ?>"
                        <?php echo ($pagina->meniu == $i)?"selected":""; ?>        
                                >
                        <?php echo $meniuri[$j]; ?>
                        </option>
                        <?php $j++; endfor; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <textarea class="ckeditor" cols="80" id="editor1"
                          name="continut" rows="10">
                    <?php echo $pagina->continut; ?>
                </textarea>
                <?php echo @$errors['continut']; ?>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="Salvati" name="a_submit"/>
            </td>
        </tr>
    </table>
</form>


