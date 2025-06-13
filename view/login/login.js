function loginMethod() {
    const uname = document.querySelector(".username");
    const email = document.querySelector(".emailDiv");

    const loginEmail = document.querySelector("#loginEmail");
    if (loginEmail.checked) {
        uname.hidden = true;
        email.hidden = false;
        email.focus();
    } else {
        uname.hidden = false;
        email.hidden = true;
        uname.focus();
    }
}
function verifyData() {
    const uName = document.querySelector("#username").value;
    const Email = document.querySelector("#email").value;
    const password = document.querySelector("#password").value;
    if (!uName == "" && !password == "" || !Email == "" && !password == "") {
        document.querySelector("#msgErro").innerHTML = "";
        document.querySelector(".limpar").hidden = false;
        document.querySelector(".entrar").hidden = false;
    } else {
        document.querySelector("#msgErro").innerHTML = "Preencha devidamente os campos para prosseguir!";
        document.querySelector(".limpar").hidden = true;
        document.querySelector(".entrar").hidden = true;
    }
}