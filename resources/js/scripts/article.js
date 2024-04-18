export function addArticleLikeEvent(){
    let panel = document.querySelector('.panel')
    let href = panel.getAttribute('data-like')
    let button = panel.querySelector('button')
    button.addEventListener('click',function (event){
        event.preventDefault()
        likeButtonEvent(href)
    })
}
async function likeButtonEvent(href){
    let panel = document.querySelector('.panel')
    let input = panel.querySelector('input')
    let token = input.getAttribute('value')
    panel.outerHTML=await getUpdatedArticlePanel(href, token)
    addArticleLikeEvent()
}
async function getUpdatedArticlePanel(href,bodyToken){
    let data = new FormData;
    data.append('_token',bodyToken)
    let response = await fetch(href,{
        method:'post',
        credentials: 'same-origin',
        body:data
    });
    if (response.ok) {
        return response.text();
    }
}
export function addCommentsLikeEvent(){
    let comments = document.querySelectorAll('.comment')
    comments.forEach(function (comment){
        let form = comment.querySelector('form')
        comment.addEventListener('mouseover',function (){
            displayButton(form)
        })
        comment.addEventListener('mouseout',function (){
            hideButton(form)
        })

        addEventToComment(comment)
    })
}
async function addEventToComment(div){
    let button = div.querySelector('button')
    button.addEventListener('click',function (event) {
        event.preventDefault()
        commentLikeEvent(div)
    })
}
async function commentLikeEvent(comment){
    let href = comment.getAttribute('data-href')
    let data = new FormData;
    let input = comment.querySelector('input')
    let token = input.getAttribute('value')
    data.append('_token',token)
    let response = await fetch(href,{
        method:'post',
        credentials: 'same-origin',
        body:data
    });
    let newHTML = await response.text();
    let tempElement = document.createElement('div');
    tempElement.innerHTML = newHTML;
    let newComment = tempElement.firstChild;
    comment.parentNode.replaceChild(newComment, comment);
    let form = newComment.querySelector('form')
    newComment.addEventListener('mouseover',function (){
        displayButton(form)
    })
    newComment.addEventListener('mouseout',function (){
        hideButton(form)
    })
    await addEventToComment(newComment);
}
function displayButton(comment){
    comment.classList.remove('invisible')
}
function hideButton(comment){
    comment.classList.add('invisible')
}
