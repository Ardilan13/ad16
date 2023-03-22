<?php require_once 'header.php';
require_once 'conexion.php';
$con = conectar(); ?>
<main>
    <div class="container">
        <div class="header">
            <p>MENSAJE DEL DIA</p>
        </div>
        <div class="info">
            <form id="mensaje">
                <div class="input">
                    <label for="mensaje">¿Como la pasaste hoy conmigo?</label>
                    <input type="text" id="mensaje" name="mensaje" required>
                </div>
                <div class="input">
                    <label for="calificacion">Calificacion del 1 al 10:</label>
                    <input type="range" value="5" min="0" max="10" id="calificacion" name="calificacion" oninput="rangevalue.value=value" />
                    <input disabled type="number" id="rangevalue" value="5" oninput="range.value=value">
                </div>
                <button type="submit">Guardar</button>
            </form>
        </div>
    </div>
    <div class="container">
        <div class="header">
            <p>MENSAJES ANTERIORES</p>
        </div>
        <div class="info">
            <table id="tabla" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Calificacion</th>
                        <th>Mensaje</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $get_mensajes = "SELECT * FROM mensajes ORDER BY id DESC;";
                    $resultado = mysqli_query($con, $get_mensajes);
                    if ($resultado->num_rows > 0) {
                        while ($row = mysqli_fetch_assoc($resultado)) { ?>
                            <tr>
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo $row["fecha"]; ?></td>
                                <td><?php echo $row["calificacion"]; ?></td>
                                <td><?php echo $row["mensaje"]; ?></td>
                            </tr>
                    <?php }
                    } else {
                        echo "<td style='background-color: #202c33;' valign='top' colspan='8' class='dataTables_empty'>No hay compras para mostrar</td>";
                    } ?>
                </tbody>
            </table>
        </div>

    </div>
</main>
<?php require_once 'footer.php'; ?>