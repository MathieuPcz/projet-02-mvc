<?php 
$id = $_SESSION['id'];
 ?>

 <h3>Informations complémentaires : </h3>
<p><span>Age : </span> <input type="text" value="<?php if(!empty($user->getAge($id))){echo $user->getAge($id);}else{echo' Votre date de naissance de type jj/mm/aaaa';} ?>" id="age"> </p>
<p><span>Habite à : </span> <input type="text" value="<?php if(!empty($user->getUser($id,'location'))){echo $user->getUser($id,'location');}else{echo' Votre ville';} ?>" id="ville">
</p>
<p><span>Etude :</span>  <input type="text" value="<?php if(!empty($user->getUser($id,'etude'))){echo $user->getUser($id,'etude');}else{echo' Vos études';} ?>" id="etude">
</p>
<p><span>Travail :</span>  <input type="text" value="<?php if(!empty($user->getUser($id,'travail'))){echo $user->getUser($id,'travail');}else{echo' Votre travail';} ?>" id="travail"></p>
<button id="saveModifUser">sauvegarder</button>
<div id="infoModifInfo"></div>

