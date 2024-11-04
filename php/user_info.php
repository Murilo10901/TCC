<?php
if ($linha) {
    echo "<p>Olá, <b>" . $linha["Nome"] . "</b></p>";
    echo "<small class='text-muted'>Admin</small>";
} else {
    echo "<p>Usuário não encontrado</p>";
}
?>
