const http = require(http);

const server = http.createServer((request,response)=>{
    if(request === '/'){
        response.redirect(301, 'https://tochamateriasprimas.com/');
    }
    response.end();
});
