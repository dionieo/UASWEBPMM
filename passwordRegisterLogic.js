function formCheck(){
    let username = document.forms["registrationForm"]["username"].value;
    let password = document.forms["registrationForm"]["password"].value;
    let confpassword = document.forms["registrationForm"]["password2"].value;
    
    if(username == ""){
        alert("Harap isi username");
        username.focus();
        return false;
    } else if(password == ""){
        alert("Harap isi password");
        password.focus();
        return false;
    } else if(!/[A-Z]/.test(password)){
        alert("Password harus mengandung huruf kapital");
        return false;
    } else if(!/[a-z]/.test(password)){
        alert("Password harus mengandung huruf kecil");
        return false;
    } else if(!/[0-9]/.test(password)){
        alert("Password harus mengandung angka");
        return false;
    } else if(!/[!@#$%^&*()_+\-=[\]{}|;:'",.<>/?]/.test(password)){
        alert("Password harus mengandung simbol");
        return false;
    } else if (confpassword != password){
        alert("Konfirmasi password gagal");
        return false;
    } else{
        return true;
    }
}