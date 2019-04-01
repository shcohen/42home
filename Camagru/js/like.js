function    likeIt(event) {
    console.log(event.srcElement.classList.add('liked_but'));
    let like = document.getElementById('like');
    let liked = document.getElementById('liked');
    let liked_but = document.getElementById('liked_but');
    let like_but = document.getElementById('like_but');
    if (liked.classList.contains('none')) {
        like.classList.remove('visi');
        like.classList.add('none');
        liked.classList.remove('none');
        liked.classList.add('visi');
        like_but.classList.remove('active');
        liked_but.classList.add('active');
    }
}

function    likeDIt() {
    let liked = document.getElementById('liked');
    let like = document.getElementById('like');
    let like_but = document.getElementById('like_but');
    let liked_but = document.getElementById('liked_but');
    if (like.classList.contains('none')) {
        liked.classList.remove('visi');
        liked.classList.add('none');
        like.classList.remove('none');
        like.classList.add('visi');
        liked_but.classList.remove('active');
        like_but.classList.add('active');
    }
}