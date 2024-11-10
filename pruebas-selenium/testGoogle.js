const { Builder, By, Key, until } = require('selenium-webdriver');
const chrome = require('selenium-webdriver/chrome');

// Configuración del WebDriver para Chrome
let driver = new Builder()
    .forBrowser('chrome')
    .setChromeOptions(new chrome.Options())
    .build();

async function runTest() {
    try {
        await driver.get('https://tochamateriasprimas.com/ventas.php');
        await driver.sleep(2000); // Pausa para observar el proceso
        
        let searchBox = await driver.findElement(By.name('q'));// Paso 2: Buscar un término
        await searchBox.sendKeys('Selenium WebDriver', Key.RETURN);
        await driver.sleep(2000);

        let results = await driver.findElements(By.css('h3'));// Paso 3: Verificar si existen resultados
        if (results.length > 0) {
            console.log('¡Búsqueda exitosa! Resultados encontrados.');
        } else {
            console.log('No se encontraron resultados.');
        }
    } finally {
        // Paso 4: Cerrar el navegador
        await driver.quit();
    }
}

// Ejecutar la prueba
runTest();
