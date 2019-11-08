"use strict";
let block;

    (function(){
        block = document.getElementById("seconds");
        let difference =document.getElementById("seconds").innerText*1000 - new Date(); //сразу вычисляем разницу между серверным временем и временем на клиенте
        (function redraw(){
            let date = new Date(); //получаем текущую дату клиента
            date.setTime( date.getTime() + difference); //прибавляем разницу
            block.innerHTML = date.toTimeString().substring(0,8); //форматируем и выводим
            setTimeout(redraw, 1000); //запускаем таймер на повтор функции
        }())
    }());
document.onload
{ let gen=document.getElementById('gen');

gen.addEventListener('click',() => {

         let xhr = new XMLHttpRequest();
         xhr.open('get', '/time.php?timestamp=true');
         xhr.send();
         xhr.responseType = 'json';
         xhr.onload = function() {
             if (xhr.status !== 200) {
                 alert(`Ошибка ${xhr.status}: ${xhr.statusText}`);
             } else { // если всё прошло гладко, выводим результат
                 document.getElementById('apithis').innerHTML = xhr.response['apikey'];
             }

         };

    });
}