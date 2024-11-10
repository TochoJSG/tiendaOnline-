const { Builder, By, Key, until } = require('selenium-webdriver');
const chrome = require('selenium-webdriver/chrome');

// Configuración del WebDriver para Chrome
let driver = new Builder()
    .forBrowser('chrome')
    .setChromeOptions(new chrome.Options())
    .build();

async function runTest() {
    try {
        
        await driver.get('https://tochamateriasprimas.com/');// Ir a la página principal y verificar  https://tochamateriasprimas.com/personal/personal.html
        //await driver.findElement(By.className('containerCardAmz')).click();
        //await driver.sleep(6000);
        //const element = 
        await driver.wait(until.elementLocated(By.className('amz')), 10000).click();
        //await element.click();
        const pageTitle = await driver.getTitle();
        console.log(pageTitle.includes('amz') ? 'Página de categoría cargada' : 'Error en carga de categoría');
    } catch (error) {
        console.error('Se produjo un error:', error);
    } finally {
        // Paso 4: Cerrar el navegador
        await driver.quit();
    }
}

runTest();// Ejecutar la prueba

