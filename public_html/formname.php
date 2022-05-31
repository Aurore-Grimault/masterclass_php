<form action="addname.php" method="POST" name="addname">
    <input type='text' name="name" placeholder="entrez votre prénom">
    <input type='hidden' name='id' value=<?php echo $user['id']; ?>> 
    <button type='submit'>soumettre</button>
</form>   