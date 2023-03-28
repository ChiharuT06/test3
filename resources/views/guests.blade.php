<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>座席レイアウト</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://js.pusher.com/6.0/pusher.min.js"></script>
    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher("{{ config('const.pusher.app_key') }}", {
            cluster: "{{ config('const.pusher.cluster') }}"
        });
      
       
    </script>
    
</head>
<x-app-layout>
<body>

 <h1>座席一覧</h1>
  
    
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-separate border border-solid border-2 border-indigo-600 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 ">
            <tr>
                <th scope="col" class="px-6 py-3  border border-solid border-2 border-indigo-600 ">
                    列
                </th>
                <th scope="col" class="px-6 py-3 " >
                    
                </th>
                <th scope="col" class="px-6 py-3 ">
                    
                </th>
                <th scope="col" class="px-6 py-3 ">
                    
                </th>
            </tr>
        </thead>
        
            <tr class="bg-white  dark:bg-gray-800 ">
                <th scope="row" class="px-6 py-4  text-2xl gray-900 whitespace-nowrap dark:text-white  border border-solid border-2 border-indigo-600 ">
                    A
                </th>
                <td class= "px-6 py-4 text-2xl border border-solid border-2 border-indigo-600">
                1<div id="A-1" class="seat">[空席]</div>  
                <div class="hidden display: none">[離席]</div>
                </td>
                <td class="px-6 py-4 text-2xl border border-solid border-2 border-indigo-600">
                2<div id="A-2" class="seat">[空席]</div>  
                <div class="hidden display: none">[離席]</div>
                </td>
                <td class="px-6 py-4 text-2xl border border-solid border-2 border-indigo-600">
                3<div id="A-3" class="seat">[空席]</div>  
                <div class="hidden display: none">[離席]</div>
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 text-2xl gray-900 whitespace-nowrap dark:text-white border border-solid border-2 border-indigo-600">
                    B
                </th>
                <td class="px-6 py-4 text-2xl border border-solid border-2 border-indigo-600">
                1<div id="B-1" class="seat">[空席]</div>  
                <div class="hidden display: none">[離席]</div>
                </td>
                <td class="px-6 py-4 text-2xl border border-solid border-2 border-indigo-600">
                2<div id="B-2" class="seat">[空席]</div>  
                <div class="hidden display: none">[離席]</div>
                </td>
                <td class="px-6 py-4 text-2xl border border-solid border-2 border-indigo-600">
                3<div id="B-3" class="seat">[空席]</div>  
                <div class="hidden display: none">[離席]</div>
                </td>
            </tr>
            <tr class="bg-white dark:bg-gray-800">
                <th scope="row" class="px-6 py-4 text-2xl gray-900 whitespace-nowrap dark:text-white border border-solid border-2 border-indigo-600">
                    C
                </th>
                <td class="px-6 py-4 text-2xl border border-solid border-2 border-indigo-600">
                1<div id="C-1" class="seat">[空席]</div>
                <div class="hidden display: none">[離席]</div>
                </td>
                <td class="px-6 py-4 text-2xl border border-solid border-2 border-indigo-600">
                2<div id="C-2" class="seat">[空席]</div> 
                <div class="hidden display: none">[離席]</div>
                </td>
                <td class="px-6 py-4 text-2xl border border-solid border-2 border-indigo-600">
                3<div id="C-3" class="seat">[空席]</div> 
                <div class="hidden display: none">[離席]</div>
                </td>
            </tr>
    
    </table>
</div>
<script>
;  
let moji = "leave";
let tmp = document.getElementsByClassName("hidden display: none");
for (let i = 0; i <= tmp.length - 1; i++) {
  tmp[i].setAttribute("id", moji + i);
}
//hidden display noneのdivに対してidを付与

function request(item) {
  const result = item.dataset.id;
  const params = {
    id: '{{ Auth::user()->name }}',
    seatId: item.id,
  };
  axios
    .get('{{env("APP_URL")}}' + 'api/seats/1', {
      params,
    })
    .then((res) => {
      console.log(res);
    });
}

function deleterequest(item) {
  const result = item.dataset.id;
  const params = {
    id: '{{ Auth::user()->name }}',
    seatId: item.id,
  };
  axios
    .get('{{env("APP_URL")}}' + 'api/seats/1/delete', {
      params,
    })
    .then((res) => {
      console.log(res);
    });
}

document.querySelectorAll(".seat").forEach((item) => {
  item.addEventListener("click", function () {
    request(item);

    let text_1 = "{{ Auth::user()->name }}";
    if (!text_1.length) {
      console.log("isEmpty");
      $(item).next().hide();
    } else {
      $(item).next().show();
    }

    const result = item.dataset.id;
    if (item.textContent === "[空席]") {
      item.textContent = "[選択中]";
    } else if (item.textContent === "[選択中]") {
      item.textContent = "[空席]";
    } else if (item.textContent === "[離席]") {
      item.textContent = "[空席]";
    }
  });
});

/**
 *
 * hiddenのところ
 *
 */

document.querySelectorAll(".hidden").forEach((item) => {
  item.addEventListener("click", function () {
    const seatId = item.previousElementSibling.getAttribute("id");
    const seatElement = document.getElementById(seatId);
    seatElement.textContent = "[空席]";
    item.removeAttribute('style');
    deleterequest(seatElement);
  });
});

/**
 *
 * Pusherとイベント絡み
 *
 */

var channel = pusher.subscribe("my-channel"); //'my-channel'というチャンネルを作成している
channel.bind("my-event", function (data) {
if(data.id){
  console.log(document.querySelector(data.seat_id));
  document.querySelector("#" + data.seat_id).innerHTML = data.id;
  document
    .querySelector("#" + data.seat_id)
    .classList.add("pointar-events-none");}
    else if { document.querySelector("#" + data.seat_id).classList.remove("pointar-events-none");

　　  document.querySelector("#" + data.seat_id).textContent = "空席";
     Pusher.trigger('my-channel', 'my-event', {
    'id': null,
    'seat_id': data.seat_id
    }
    
    }
});


   
</script>


    
</body>

</x-app-layout>    
</html>