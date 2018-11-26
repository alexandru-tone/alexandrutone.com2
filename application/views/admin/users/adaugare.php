
<!--<script src="/ckeditor/ckeditor.js"></script>-->

&emsp; <a href="/admin/users">inapoi</a>
<form method="POST">
    <table>
        <tr>
            <td>
                <label>Nume user:</label>
            </td>
            <td>
                <input type="text" name="username" 
                       value="<?php echo $user->username; ?>">
                <?php echo @$errors['username']; ?>
            </td>
        </tr>
        <tr>
            <td>
                <label>Email user:</label>
            </td>
            <td>
                <input type="text" name="email" 
                       value="<?php echo $user->email; ?>">
                <?php echo @$errors['email']; ?>
            </td>
        </tr>
        <tr>
            <td>
                <label>Password:</label>
            </td>
            <td>
                <input type="text" name="password"
                       >
                <?php echo @$errors['password']; ?>
            </td>
        </tr>
        <tr>
            <td>
                <label>confirm Password:</label>
            </td>
            <td>
                <input type="text" name="password_confirm"
                       >
                <?php echo @$errors['password_confirm']; ?>
            </td>
        </tr>

        <tr>
            <td>
                <input type="submit" value="Salvati" name="a_submit"/>
            </td>
        </tr>
    </table>
</form>


