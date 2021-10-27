const form = document.querySelector(".login form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-text");

form.onsubmit = (e) => {
    e.preventDefault();
}

continueBtn.addEventListener('click', () => {
    //Ajax
    let xhr = new XMLHttpRequest();
    xhr.open("POST","/Real-Time-Chat-App/php/login.php",true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data == "success"){
                    location.href = "/Real-Time-Chat-App/users.php";
                }
                else {
                    console.log(data);
                    errorText.textContent = data;
                    errorText.style.display = "block";
                }
            }
        }
    }
    //send data form through ajax to php
    let formData = new FormData(form);

    xhr.send(formData);
});