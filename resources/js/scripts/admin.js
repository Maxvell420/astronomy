export function appendArticleCreateButton(href){
    let button = document.createElement('div')
    let buttons = document.querySelector('.header .buttons')
    button.className='button'
    let a = document.createElement('a')
    a.setAttribute('href',href)
    a.textContent='Создать новость'
    button.appendChild(a)
    buttons.appendChild(button)
}
