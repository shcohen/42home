function    likeIt(event, img_id) {
    let like = event.currentTarget.parentElement;
    let liked = like.parentElement.querySelector('#liked');
    let liked_but = document.getElementById('liked_but');
    let like_but = document.getElementById('like_but');
    if (liked.classList.contains('none')) {
        like.classList.remove('visi');
        like.classList.add('none');
        liked.classList.remove('none');
        liked.classList.add('visi');
        like_but.classList.remove('active');
        liked_but.classList.add('active');
    } let form = new XMLHttpRequest();
    form.onreadystatechange = () => {
        if (form.readyState === 4) {
            if (form.status === 200) {
                if (form.responseText) {
                    window.location.reload();
                }
            } else {
                console.log(form.status);
                console.log('Ajax échoué :(');
            }
        }
    };
    form.open('POST', '/back/img_info.php', true);
    form.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    form.send("img_id=" + img_id + "&like=" + 1);
}

function    likeDIt(event, img_id) {
    let liked = event.currentTarget.parentElement;
    let like = liked.parentElement.querySelector('#like');
    let like_but = document.getElementById('like_but');
    let liked_but = document.getElementById('liked_but');
    if (like.classList.contains('none')) {
        liked.classList.remove('visi');
        liked.classList.add('none');
        like.classList.remove('none');
        like.classList.add('visi');
        liked_but.classList.remove('active');
        like_but.classList.add('active');
    } let form = new XMLHttpRequest();
    form.onreadystatechange = () => {
        if (form.readyState === 4) {
            if (form.status === 200) {
                if (form.responseText) {
                    window.location.reload();
                }
            } else {
                console.log('Ajax échoué ici :(');
            }
        }
    };
    form.open('POST', '/back/img_info.php', true);
    form.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    form.send("img_id=" + img_id + "&like=" + 'OK');
}

function commenTed(event, img_id) {
    let comment = event.srcElement.parentNode.childNodes[1].value;
    let form = new XMLHttpRequest();
    form.onreadystatechange = () => {
        if (form.readyState === 4) {
            console.log(form.responseText);
            if (form.status === 200) {
                if (form.responseText) {
                    window.location.reload();
                }
            } else {
                console.log('Ajax échoué ici :(');
            }
        }
    };
    form.open('POST', '/back/img_info.php', true);
    form.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    form.send("img_id=" + img_id + "&comment=" + comment);
}