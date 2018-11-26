&emsp; &emsp; &emsp; &emsp; &emsp; <h4>Listare users</h4>

<!-- root/folderAdmin/controller/action -->

&emsp; <a href="/admin/users/adaugare">Adaugare</a>
<table border="1">
    <tr>
        <td>
            nr.crt.|editare|stergere|view
        </td>
        <td>
            username
        </td>
        <td>
            email
        </td>
<!--        <td>
            activa?
        </td>-->
    </tr>

    <?php if ($lista_users->count()) { ?>
        <?php foreach ($lista_users as $link): ?>
            <?php static $i = 1; ?>     
            <tr >
                <td>
                    <?php echo "$i |"; ?>
                    <a href="/admin/users/editare/<?php echo $link->id; ?>">
                        editare</a>
                    |<a href="javascript://" 
                        onclick="if (confirm('sigur vreti sa stergeti userul\n\
                        <?php echo $link->email; ?> ? '))
                                            window.location =
                                                    '/admin/users/stergere/<?php echo $link->id; ?>'
                                                    ;">
                        stergere</a>
                    |<a href="/admin/users/vizualizare/<?php echo $link->id; ?>">
                        view</a>
                </td>
                <td>
                    <?php echo $link->username; ?>
                </td>
                <td>
                    <?php echo $link->email; ?>
                </td>
               
            </tr>
            <?php
            $i++;
        endforeach;
    }
    ?>  


</table>

