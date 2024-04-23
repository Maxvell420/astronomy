function backgroundChange(width){
    let html = document.querySelector('html')
    let currentWidth = window.innerWidth
    if (width > 3840 && currentWidth >= width) {
        width = currentWidth;
        html.style.backgroundImage = "url('/images/background/space8k.jpg')";
    } else if (width > 1980 && currentWidth >= width) {
        width = currentWidth;
        html.style.backgroundImage = "url('/images/background/space4k.jpg')";
    } else if (width > 1280 && currentWidth >= width) {
        width = currentWidth;
        html.style.backgroundImage = "url('/images/background/spaceFull.jpg')";
    } else {
        width=currentWidth
        html.style.backgroundImage = "url('/images/background/spaceMini.jpg')";
    }
    return width
}
export function backgroundHandler(){
    let width = window.innerWidth
    width = backgroundChange(width)
    window.addEventListener('resize',function (){
        width = backgroundChange(width)
    })
}
