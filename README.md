1) В проекте apiproxy создан новый  контроллер ApiProxyController.
2) добавлены маршруты в routes/api.php
3) Например в адрсеной строке браузера после запуска сервера laravel можно вести запрос
    GET запрос по следующим параметрам:
   http://localhost:8000/api/get-number?country=se&service=wa
   указать country и service;
   http://localhost:8000/api/get-sms?activation=вести activtion id
   указать activation 
   http://localhost:8000/api/get-status?activation=вести activtion id
   указать activation 
   http://localhost:8000/api/cancel-number?activation=вести activtion id
   указать activation

   в GET запросе нужно указывать входящие параметры которые можно менять, токен и название метода заложены в ApiProxyController

    к примеру http://localhost:8000/api/get-number?country=se&service=wa - по данному URL мы передаем пареметры и ApiProxyController обрабатывает входящие параметры и перенаправляет на другой URL, подставляя нужные входные параметры для этого URL/
