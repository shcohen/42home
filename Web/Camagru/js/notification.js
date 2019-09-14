function enableNotif() {
    const req = new XMLHttpRequest();
    let check = document.getElementById('notif');
    let notif = check.checked ? 'true' : 'false';
    req.onreadystatechange = () => {
        if (req.readyState === 4) {
            if (req.status === 200) {
                if (req.responseText === "OK") {
                    console.log('Ajax réussi :)');
                } else {
                    console.log('Ajax échoué :(');
                }
            }
        }
    };
    req.open('POST', '/back/modify.php', true);
    req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    req.send("update=" + 'notify' + '&checkbox=' + notif);
}