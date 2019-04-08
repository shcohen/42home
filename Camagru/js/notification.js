function enableNotif() {
    const  req = new XMLHttpRequest();

    req.onreadystatechange = () => {
        if (req.readyState === 4) {
            if (req.status === 200) {

            }
        }
    };
    req.open('POST', '/back/modify.php', true);
    req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    req.send("update=" + 'likes' + "&id=" + event.srcElement.id);
}