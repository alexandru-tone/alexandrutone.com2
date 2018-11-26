
<!--<script src="/ckeditor/ckeditor.js"></script>-->

&emsp; <a href="/admin/users">inapoi</a>
&emsp; <a href="/admin/users/editare/<?php echo $user->id; ?>">
    editare</a>
<table>
    <tr>
        <td><label>username:</label></td>
        <td>
            <?php echo $user->username; ?>
        </td>
    </tr>
    <tr>
        <td><label>email:</label></td>
        <td>
            <?php echo $user->email; ?>
        </td>
    </tr>

</table>