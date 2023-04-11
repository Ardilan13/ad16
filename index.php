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
                    <textarea name="mensaje" id="mensaje" minlength="50" rows="5" required></textarea>
                </div>
                <div class="input">
                    <label for="calificacion">Calificacion del 1 al 10:</label>
                    <input type="range" value="7" min="0" max="10" id="calificacion" name="calificacion" oninput="rangevalue.value=value" />
                    <input disabled type="number" id="rangevalue" value="7" oninput="range.value=value">
                    <span id="emoji">&#128153;</span>
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
            <table id="tabla" class="table table-bordered display no-wrap" cellspacing="0" style="width:100%">
                <thead>
                    <tr>
                        <th class="id">ID</th>
                        <th>Fecha</th>
                        <th><span class="normal">Calificacion</span><span class="cel">#</span></th>
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
                                <td class="id"><?php echo $row["id"]; ?></td>
                                <td><?php echo date("d M Y", strtotime($row["fecha"])); ?></td>
                                <td class="<?php echo $row["calificacion"] < 7 ? ' mala' : ' buena'; ?>"><?php echo $row["calificacion"]; ?></td>
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