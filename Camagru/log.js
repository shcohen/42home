function    displaySignIn() {
    let signup = document.getElementById('signup');
    let signin = document.getElementById('signin');
    let signin_button = document.getElementById('signin_button');
    let signup_button = document.getElementById('signup_button');
    if (signin.classList.contains('none')) {
        signup.classList.remove('visi');
        signup.classList.add('none');
        signin.classList.remove('none');
        signin.classList.add('visi');
        signup_button.classList.remove('active');
        signin_button.classList.add('active');
    }
}

function    displaySignUp() {
    let signup = document.getElementById('signup');
    let signin = document.getElementById('signin');
    let signin_button = document.getElementById('signin_button');
    let signup_button = document.getElementById('signup_button');
    if (signup.classList.contains('none')) {
        signin.classList.remove('visi');
        signin.classList.add('none');
        signup.classList.remove('none');
        signup.classList.add('visi');
        signin_button.classList.remove('active');
        signup_button.classList.add('active');
    }
}