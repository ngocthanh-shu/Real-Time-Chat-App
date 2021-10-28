const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");

form.addEventListener('submit', (e) => {
    e.preventDefault();
});

sendBtn.addEventListener('click', () => {
    //Ajax
    let xhr = new XMLHttpRequest();
    xhr.open("POST","/Real-Time-Chat-App/php/insert-chat.php",true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                inputField.value = "";
                chatBox.scrollTop = chatBox.scrollHeight;
            }
        }
    }
    //send data form through ajax to php
    let formData = new FormData(form);
    xhr.send(formData);
});

// chatBox.addEventListener('onmouseenter',() => {
//     chatBox.classList.add("active");
// });
// chatBox.addEventListener('onmouseleave',() => {
//     chatBox.classList.remove("active");
// });

chatBox.onmouseenter = () => {
    chatBox.classList.add("active");
}
chatBox.onmouseleave = () => {
    chatBox.classList.remove("active");
}

setInterval(() => {
    //Ajax
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "/Real-Time-Chat-App/php/get-chat.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                chatBox.innerHTML = data;
                if(!chatBox.classList.contains("active")){
                    chatBox.scrollTop = chatBox.scrollHeight;
                }    
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}, 500);
