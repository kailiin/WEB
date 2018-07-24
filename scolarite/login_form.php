<?php

if (isset($badlogin)) {
?>

<p class='info'>Login ou mot de passe invalide! </p>
<p class='info'>Vérifiez les données svp.</p>

<?php
}
?>

<p class='center'>Introduisez votre login:

<div class='center'>
<form method="POST" name="loginform">
  <table class='center' border =0>
    <tr>
      <td class='left'>login: </td>
      <td class='right' ><input type="text" name="login" size="20" value=""></td>
    </tr>
    <tr>
      <td class='left'>password: </td>
      <td class='right'><input type="password" name="password" size="20"></td>
    </tr>
  </table>
<table cellspacing=5 class=right border =0>
 <tr>
  <td class='left'><input type="submit" value="Login" /></td>
 </tr>
</table>

<a href="new_user.php">S'enregistrer</a>

</form>
</div>
