<?php
if (isset($_SESSION['notification'])) {
    echo '<p>';
    echo $_SESSION['notification'];
    echo '</p>';
}
?>
</body>

</html>