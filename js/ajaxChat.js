'use strict'

function uploadMessage(){
    var message = document.querySelector("#messageTextInput");
    if(message.value.length>0){
        var messageInfo = {
            message: message.value,
            sender: sender,
            receiver: receiver
        };
        message.value="";
        var req = new XMLHttpRequest();
        req.open('GET', 'messages.php?messageInfo='+JSON.stringify(messageInfo), true);
        req.send();
    }
}

function getMessages(){
    var messagesInfo;
    var messagesArea = document.querySelector("#messagesArea");
    var req = new XMLHttpRequest();
    req.onreadystatechange = function(){
        
        if (this.readyState == 4 && this.status == 200) {  
            messagesInfo = JSON.parse(this.responseText)['records'];
            paintMessages(messagesInfo, messagesArea);
        }
        if (this.readyState == 4 && this.status == 404){
            messagesInfo=JSON.parse(this.responseText)['message'];
            paintMessages(messagesInfo, messagesArea);
        }
    }
    req.open('GET', 'messages.php?user='+user, true);
    req.send();
}

function paintMessages(messagesInfo, messagesArea){
    
    if(typeof messagesInfo  === 'string'){
        messagesArea.innerHTML=messagesInfo;
    }
    else{
        while (messagesArea.firstChild) {
            messagesArea.removeChild(messagesArea.firstChild);
        }
        ///AQUÍ SE DIBUJAN LOS MENSAJES
        for (const messageInfo of messagesInfo) {
            var messageDiv = document.createElement('div');
            if(!isAdmin){///COSAS SI EL WEY NO ES ADMIN
                if(messageInfo['sender'] != 'admin'){
                    messageDiv.className="bg-secondary-50 col-lg-8 col-sm-10 col-xs-12 mb-4 float-sm-right shadow text-right sent";
                }
                else{
                    messageDiv.className+="col-lg-8 col-sm-10 col-xs-12 mb-4 float-sm-left shadow text-left received";
                }
            }
            else{
                if(messageInfo['sender'] == 'admin'){
                    messageDiv.className+="bg-secondary-50 col-lg-8 col-sm-10 col-xs-12 mb-4 float-sm-right shadow text-right sent";
                }
                else{
                    messageDiv.className+="col-lg-8 col-sm-10 col-xs-12 mb-4 float-sm-left shadow text-left received";
                }
            }
            var senderName = document.createElement('p');
            senderName.className="h6";
            senderName.innerHTML=messageInfo['sender'];
            
            var messageText = document.createElement('p');
            messageText.innerHTML=messageInfo['message'];
    
            messageDiv.append(senderName);
            messageDiv.append(messageText);
    
            messagesArea.append(messageDiv);
            //FALTA VER QUÉ PEDO CON LA HORA
        }
    }
}

function getUsers(){
    var req = new XMLHttpRequest();
    req.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            var leftPanel = document.querySelector("#left");
            var usersInfo = JSON.parse(this.responseText)['records'];
            while (leftPanel.firstChild) {
                leftPanel.removeChild(leftPanel.firstChild);
            }
            ///AQUI SE PINTAN LOS CUADRITOS PARA CAMBIAR DE CHAT
            var chatsLabel = document.createElement('p');
            chatsLabel.className="h3";
            chatsLabel.innerHTML="Chats";

            leftPanel.append(chatsLabel);
            for (const userInfo of usersInfo) {
                var userChatDiv = document.createElement('div');
                userChatDiv.className="container col-xs-12 other mb-2 userChatDiv";
                var chatName = document.createElement('p');
                chatName.className="h6 userChatDiv";
                chatName.innerHTML=userInfo['username'];
                userChatDiv.append(chatName);
                userChatDiv.addEventListener('click', function(){
                    user = userInfo['username'];
                    receiver=user;
                    getMessages();
                });
                leftPanel.append(userChatDiv);
            }
        }
    }
    req.open('GET', 'users.php?nonAdmin=true', true);
    req.send();
}

function createActiveMessagesPanelAdmin(){
    var active = document.createElement('div');
    active.className="col-lg-9 col-md-9 col-sm-9 col-xs-9 col-9 row";
    active.id="active";
    return active;
}

function createActiveMessagesPanelUser(){
    var active = document.createElement('div');
    active.className="col-center col-lg-8 row";
    active.id="active";
    return active;
}

function createActiveMessagesPanel(){
    var active;
    if (isAdmin) {
        active = createActiveMessagesPanelAdmin();
    }
    else {
        active = createActiveMessagesPanelUser();
    }

    var messagesArea = document.createElement('div');
    messagesArea.className="container";
    messagesArea.id="messagesArea";

    active.appendChild(messagesArea);

    var sendArea = document.createElement('div');
    sendArea.className="container row col-lg-11 col-center";
    sendArea.id="sendArea";
    
    var messageForm = document.createElement('form');
    messageForm.className="form-inline col-center col-lg-12 row mt-1";
    messageForm.autocomplete="off";
    messageForm.onsubmit=function(){return false;};

    var messageTextInput = document.createElement('input');
    messageTextInput.type="text";
    messageTextInput.name="message";
    messageTextInput.className="col-sm-10 form-control mb-1";
    messageTextInput.placeholder="Escribe tu mensaje...";
    messageTextInput.id="messageTextInput";

    messageForm.appendChild(messageTextInput);

    var messageSubmitButton = document.createElement('input');
    messageSubmitButton.type="submit";
    messageSubmitButton.className="col-sm-2 btn btn-outline-dark mb-1";
    messageSubmitButton.id="messageSubmitButton";
    messageSubmitButton.value="Enviar";
    messageSubmitButton.addEventListener('click', function(){uploadMessage();});  
    messageForm.appendChild(messageSubmitButton);
   
    sendArea.appendChild(messageForm);

    active.appendChild(sendArea);
    return active;
}

function createLeftPanel(){
    var leftPanel = document.createElement('div');
    leftPanel.id="left";
    leftPanel.className="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3 col-3";
    return leftPanel;
}

function replaceEmptyPanel(event){
    if ( event.target.classList.contains('userChatDiv') ) {
        var container = document.querySelector("#container");
        container.removeChild(container.childNodes[container.childNodes.length-1]);
        ///SI HACES UN ACTIVE DISTINTO PARA USUARIOS Y ADMINS, AQUI LLAMA AL DE ADMIN
        container.appendChild(createActiveMessagesPanel());
        document.removeEventListener('click', replaceEmptyPanel);
    }
}

window.addEventListener("load", function(){ 
    var activeEmptyPanel = document.createElement('div');
    activeEmptyPanel.innerHTML="BIENVENIDO A LOS CHATS CON LOS CLIENTES ADMIN";
    var container = document.querySelector("#container");
    if(isAdmin){
        var leftPanel = createLeftPanel();
        container.append(leftPanel);
        container.append(activeEmptyPanel);
        getUsers();
        setInterval(function(){getUsers();}, 2000);
        leftPanel.addEventListener('click', replaceEmptyPanel);
        
    }
    else{
        ///SI HACES UN ACTIVE DISTINTO PARA USUARIOS Y ADMINS, AQUI LLAMA AL DE USUARIO
        container.appendChild(createActiveMessagesPanel());
    }
    setInterval(function(){getMessages();}, 2000);  
});
