importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');

firebase.initializeApp({
    apiKey: "AIzaSyABG8b7-TtFMuGp29VqvMPSM7CBRt5bdI0",
    projectId: "newagent-bdeb3",
    messagingSenderId: "692836929667",
    appId: "1:692836929667:web:80ce57de41ba584d100bb6"
});

const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function({data:{title,body,icon}}) {
    return self.registration.showNotification(title,{body,icon});
});
