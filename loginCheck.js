function formCheck(){
    let username = document.forms["loginForm"]["username"].value;
    let pass = document.forms["loginForm"]["pass"].value;
    
    if(username == ""){
        alert("Harap isi kolom username");
        username.focus();
        return false;
    } else if(pass == ""){
        alert("Harap isi kolom password");
        pass.focus();
        return false;
    } else{
        return true;
    }
}