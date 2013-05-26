crserver
========

This is the server for the chatroom (https://github.com/atiq21/chatroom.git) application. 
It keep track of registered user and broadcast message.

You need to provide database password and GOOGLE_API_KEY in config.php.

broadcast.php receive the message from android application and broadcast it to all registered user.

testregistration.php and testbroadcast.php allows to test the feature without emulator.
