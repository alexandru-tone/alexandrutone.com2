&emsp; &emsp; &emsp; &emsp; &emsp; <h4>Listare pagini</h4>

<!-- root/folderAdmin/controller/action -->

<form method="GET" action="/admin/pagini">
    <label>Filtru Nume</label>
    <input type="text" name="filtru_nume" 
           value="<?php if(isset($_GET['filtru_nume'])) {echo $_GET['filtru_nume'];} ?>">
    <label>Filtru Activa</label>
    <select name="filtru_activa" >
        <option value=""
            <?php if(isset($_GET['filtru_activa']) && $_GET['filtru_activa'] == 3) 
                {echo "selected";}?>
            >Toate</option>
        <option value="1"
            <?php if(isset($_GET['filtru_activa']) && $_GET['filtru_activa'] == 1) 
                {echo "selected";}?>
            >Activa</option>
        <option value="2"
            <?php if(isset($_GET['filtru_activa']) && $_GET['filtru_activa'] == 2) 
                {echo "selected";}?>
            >Inactiva</option> 
    </select>
    <input type="submit" value="Filtrati">           
</form>
&emsp; <a href="/admin/pagini">Reset</a>

&emsp; <a href="/admin/pagini/adaugare">Adaugare</a>
<table border="1">
    <tr>
        <td>
            nr.crt.|editare|stergere|view
        </td>
        <td>
            cheia
        </td>
        <td>
            nume
        </td>
        <td>
            activa?
        </td>
    </tr>

    <?php if ($lista_pagini->count()) { ?>
        <?php foreach ($lista_pagini as $link): ?>
            <?php static $i = 1; ?>     
            <tr <?php if ($link->activa == 2): ?> bgcolor="#FF0000"
                                                  <?php endif; ?> >
                <td>
                    <?php echo "$i |"; ?>
                    <a href="/admin/pagini/editare/<?php echo $link->id; ?>">
                        editare</a>
                    |<a href="javascript://" 
                        onclick="if (confirm('sigur vreti sa stergeti pagina\n\
                        <?php echo $link->nume; ?> ? '))
                                            window.location =
                                                    '/admin/pagini/stergere/<?php echo $link->id; ?>'
                                                    ;">
                        stergere</a>
                    |<a href="/admin/pagini/vizualizare/<?php echo $link->id; ?>">
                        view</a>
                </td>

                <td>
                    <?php echo $link->cheie; ?>
                </td>
                <td>
                    <?php echo $link->nume; ?>
                </td>
                <td>
                    <?php echo ($link->activa == 1) ? "Da" : "Nu"; ?>
                </td>
            </tr>
            <?php
            $i++;
        endforeach;
    }
    ?>  


</table>

<?php echo $pagination->render(); ?>
