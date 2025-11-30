<?php
// Configuración de los barberos
$barberos = [
    [
        'nombre' => 'Jonathan Hernández',
        'lema' => '¡El arte de tu corte!',
        'tarjeta' => '4152 3698 7412 5800',
    ],
    [
        'nombre' => 'Víctor Miguel',
        'lema' => 'Tu estilo, nuestra pasión.',
        'tarjeta' => '4099 8765 4321 0987',
    ],
];

// Lema general para la barbería (basado en el logo)
$lema_barberia = "BMJ Barberia: Donde tu estilo se define.";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transferencia - Barberia BMJ</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;700&family=Oswald:wght@500&display=swap" rel="stylesheet">
</head>
<body>

    <header class="header">
        <div class="logo-container">
            <img src="logo.png" alt="Logo Barberia BMJ" class="logo-image">
            <span class="logo-text">Barberia BMJ</span>
        </div>
        <h1><?php echo $lema_barberia; ?></h1>
    </header>

    <main class="container">
        <section class="info-section">
            <h2>💳 Pago por Transferencia</h2>
            <p>A continuación, encontrarás los datos de tarjeta de nuestros barberos. **Por favor, verifica el nombre antes de realizar cualquier transferencia.** Puedes copiar el número de tarjeta fácilmente con un solo clic.</p>
        </section>
        
        <div class="barberos-grid">
            <?php foreach ($barberos as $barbero): ?>
            <div class="card">
                <h3><?php echo htmlspecialchars($barbero['nombre']); ?></h3>
                <p class="lema-barbero"><?php echo htmlspecialchars($barbero['lema']); ?></p>
                
                <div class="card-info">
                    <p class="label">Número de Tarjeta (CLABE/Cuenta):</p>
                    <div class="tarjeta-display">
                        <span id="tarjeta-<?php echo str_replace(' ', '', $barbero['nombre']); ?>" class="numero-tarjeta"><?php echo htmlspecialchars($barbero['tarjeta']); ?></span>
                        <button class="copy-btn" 
                                data-target="tarjeta-<?php echo str_replace(' ', '', $barbero['nombre']); ?>"
                                data-nombre="<?php echo htmlspecialchars($barbero['nombre']); ?>"
                                onclick="copyToClipboard(this)">
                            Copiar
                        </button>
                    </div>
                    <p class="nombre-barbero">Titular: **<?php echo htmlspecialchars($barbero['nombre']); ?>**</p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
    </main>

    <footer class="footer">
        <p>&copy; <?php echo date('Y'); ?> Barberia BMJ. Todos los derechos reservados.</p>
    </footer>

    <script>
        // Función JavaScript para copiar al portapapeles
        function copyToClipboard(button) {
            const targetId = button.getAttribute('data-target');
            const nombre = button.getAttribute('data-nombre');
            const targetElement = document.getElementById(targetId);
            
            // Crea un área de texto temporal para la copia
            const tempInput = document.createElement('textarea');
            tempInput.value = targetElement.textContent;
            document.body.appendChild(tempInput);
            
            // Selecciona y copia el texto
            tempInput.select();
            document.execCommand('copy');
            document.body.removeChild(tempInput);
            
            // Retroalimentación al usuario
            const originalText = button.textContent;
            button.textContent = '¡Copiado!';
            button.classList.add('copied');

            setTimeout(() => {
                button.textContent = originalText;
                button.classList.remove('copied');
            }, 2000);
            
            console.log(`Copiado: ${targetElement.textContent} - Titular: ${nombre}`);
        }
    </script>
</body>
</html>