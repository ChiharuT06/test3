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
                <div id="leave">[離席]</div>
                </td>
                <td class="px-6 py-4 text-2xl border border-solid border-2 border-indigo-600">
                2<div id="A-2" class="seat">[空席]</div>  
                </td>
                <td class="px-6 py-4 text-2xl border border-solid border-2 border-indigo-600">
                3<div id="A-3" class="seat">[空席]</div>  
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 text-2xl gray-900 whitespace-nowrap dark:text-white border border-solid border-2 border-indigo-600">
                    B
                </th>
                <td class="px-6 py-4 text-2xl border border-solid border-2 border-indigo-600">
                1<div id="B-1" class="seat">[空席]</div>  
                </td>
                <td class="px-6 py-4 text-2xl border border-solid border-2 border-indigo-600">
                2<div id="B-2" class="seat">[空席]</div>  
                </td>
                <td class="px-6 py-4 text-2xl border border-solid border-2 border-indigo-600">
                3<div id="B-3" class="seat">[空席]</div>  
                </td>
            </tr>
            <tr class="bg-white dark:bg-gray-800">
                <th scope="row" class="px-6 py-4 text-2xl gray-900 whitespace-nowrap dark:text-white border border-solid border-2 border-indigo-600">
                    C
                </th>
                <td class="px-6 py-4 text-2xl border border-solid border-2 border-indigo-600">
                1<div id="C-1" class="seat">[空席]</div>  
                </td>
                <td class="px-6 py-4 text-2xl border border-solid border-2 border-indigo-600">
                2<div id="C-2" class="seat">[空席]</div> 
                </td>
                <td class="px-6 py-4 text-2xl border border-solid border-2 border-indigo-600">
                3<div id="C-3" class="seat">[空席]</div> 
                </td>
            </tr>
    
    </table>
</div>
<script>
;  

  
  document.querySelectorAll(".seat").forEach(item=>{
  //ドキュメント内の全ての要素で ".seat" クラスを持つ要素を取得し、それらに対して forEach メソッドを適用
    item.addEventListener("click", function(){
    const result= item.dataset.id
    
    // resに何らかの数字が入っていれば、離席になる
// 何も入っていなければ、着席になる
     if(result){
　　//離席のロジック
    }else {
　　//着席のロジック。const params以下のコード

    }
  //それぞれの ".seat" 要素に、クリックイベントリスナーを追加。クリックされた場合、指定されたコールバック関数が呼び出される。
  const params = {
        id:'{{ Auth::user()->name }}',
//bladeの中のリンクを表示する場合は''で囲うと別の変数として認識される
        seatId:item.id
    }
    console.log()
//クリックされた要素に基づいて、APIリクエストに渡すためのパラメーターを定義。
//"id" プロパティには 1 が設定され、"seatId" プロパティには、クリックされた要素の ID が設定される。。
  axios.get('/api/seats/1', {params}).then((res)=>{
        console.log(res)
    })
//axios ライブラリを使用して、"/api/seats/1" のエンドポイントに GET リクエストを送信z。
//このリクエストには、"params" オブジェクトが含まれ、"id" と "seatId" パラメーターが送信されます。
//リクエストが成功すると、コールバック関数が呼び出され、サーバーからのレスポンスが "res" 変数に格納されます。この例では、レスポンスを単にログに出力しています。  
    
    });
    
}); 




 var channel = pusher.subscribe('my-channel');//'my-channel'というチャンネルを作成している
        channel.bind('my-event', function(data) {//'my-eventというトリガーが実行されたときのalert関数'
            console.log(document.querySelector(data.seat_id))
            document.querySelector("#"+data.seat_id).innerHTML = data.id;
            document.querySelector("#"+data.seat_id).classList.add('pointar-events-none');
            
        });
   
</script>


    
</body>

</x-app-layout>    
</html>