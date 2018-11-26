
<script src="/ckeditor/ckeditor.js"></script>

&emsp; <a href="/admin/pagini">inapoi</a>
&emsp; <a href="/admin/pagini/editare/<?php echo $pagina->id; ?>">
    editare</a>
<table>
    <tr>
        <td><label>nume</label></td>
        <td>
            <?php echo $pagina->nume; ?>
        </td>
    </tr>
    <tr>
        <td><label>cheie</label></td>
        <td>
            <?php echo $pagina->cheie; ?>
        </td>
    </tr>
    <tr>
        <td>activa?</td>
        <td>
            <?php echo ($pagina->activa == 1) ? "Da" : "Nu"; ?>
        </td>
    </tr>
    <tr>
        <td><label>meniu</label></td>
        <td>
            <?php
            switch ($pagina->meniu) {
                case "1": echo"top";
                    break;
                case "2": echo"left";
                    break;
                case "3": echo"right";
                    break;
                case "4": echo"bottom";
                    break;
            }
            ?>
        </td>
    </tr>
    <tr>
        <td><label>ordine</label></td>
        <td>
            <?php echo $pagina->ordine; ?>
        </td>
    </tr>
    <tr>
        <td><label>principala?</label></td>
        <td>
            <?php echo ($pagina->principala == 1) ? "Da" : "Nu"; ?>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <textarea class="ckeditor" cols="80" id="editor1"
                      name="continut" rows="10">
                          <?php echo $pagina->continut; ?>
            </textarea>
        </td>
    </tr>
</table>