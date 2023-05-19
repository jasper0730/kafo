<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div style="font-size:12px;
     color: #393636;
     border-bottom: 7px solid #CCC;
     background-color:#EEE;
     width: 50%;">
    <h3 id="郵件標題" style="font-size: 16px;
        text-align: center;
        color: #FFF;
        padding: 5px;
        margin: 0px;
        border-bottom-color: #CCC;
        border-bottom-style: solid;
        border-bottom-width: 7px;
        background-color: #333;
        font-family: Verdana, Geneva, sans-serif;">聯絡我們通知信</h3>

    <div id="主內容" style="padding: 10px;">
        <p>聯絡我們通知信填寫資料內容如下</p>
        <p>姓名：　{{ $data['Name'] }}</p>
        <p>手機：  {{ $data['Phone'] }}</p>
        <p>電話：  {{ $data['Phone'] }}</p>
        <p>E-mail：{{ $data['Email'] }}</p>
        <p>處理業務：{{ $data['Subject'] }}</p>
        <p>聯絡內容：{{ $data['Comments'] }}</p>
        <br/>
    </div>

    <div id="注意事項" style="padding: 10px;">
        <ul style="padding: 10px;
            padding-left: 30px;
            margin: 0px;
            border: 1px dashed red;
            background-color:#FCC;
            color: red;">
            <li>此信件為系統自動寄發，請勿直接回覆此信！</li>
        </ul>
    </div>
</div>