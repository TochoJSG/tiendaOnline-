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
        await driver.sleep(9000);
        let mobileMenu = await driver.findElement(By.id('template-carrito')).isDisplayed();
        await driver.sleep(9000);
        console.log(mobileMenu ? 'Menú móvil visible' : 'Menú móvil no se adaptó');

    } finally {
        await driver.quit();// Paso 4: Cerrar el navegador
    }
}

runTest();// Ejecutar la prueba
