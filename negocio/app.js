const items = document.getElementById('items')
const templateBloque = document.getElementById('template-bloque').content
const fragment = document.createDocumentFragment()

document.addEventListener('DOMContentLoaded', e => { fetchData() });
const fetchData = async () => {
    const res = await fetch('api.json');
    const data = await res.json()
    /*console.log(data)*/
    pintarBloque(data);
}
const pintarBloque=data=>{
    data.forEach(item=>{
        templateBloque.querySelector('th').textContent = producto.id
        templateBloque.querySelectorAll('td')[0].textContent = producto.titulo
        templateBloque.querySelectorAll('td')[1].textContent = producto.descripcion
        templateBloque.querySelector('td')[2].innerHTML = `<a class="btn_amz" target="_blank" href="${item.url}">Comprar en Amazon</a>`
        const clone = templateBloque.cloneNode(true)
        fragment.appendChild(clone)
    })
    items.appendChild(fragment);
}