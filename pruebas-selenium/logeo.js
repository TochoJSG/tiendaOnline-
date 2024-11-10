const { Builder, By, until } = require('selenium-webdriver');
const chrome = require('selenium-webdriver/chrome');

// Configuración del WebDriver para Chrome
let driver = new Builder()
    .forBrowser('chrome')
    .setChromeOptions(new chrome.Options())
    .build();

async function runTest() {
    try {
        // Ingresar las credenciales en la URL
        await driver.get('https://administradores:Loca33$%NAT@tochamateriasprimas.com/personal/personal.html');//https://usuario:contraseña@tochamateriasprimas.com/personal/personal.html

        // Esperar a que cargue el contenido de la página para verificar acceso
        await driver.wait(until.titleIs('Gestiones Personal'), 19000); // Ajusta el título esperado
        console.log('Acceso exitoso a la página protegida');
    } catch (error) {
        console.error('Error al acceder a la página protegida:', error);
    } finally {
        // Cerrar el navegador
        await driver.quit();
    }
}

runTest(); // Ejecutar la prueba
