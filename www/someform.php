
<form method="POST" action="someform.php">
    <input type="checkbox" id="c1" name="box1" value="v1" />First
    <input type="checkbox" id="c2" name="box2" value="v2" checked="checked"/>Second
    <input type="submit" value="Submit" />
</form>
<?php
    print_r($_POST);
    echo !!($_POST['box1'] ?? false);