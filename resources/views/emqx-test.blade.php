<html>
<header>
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
    <script src="https://unpkg.com/mqtt/dist/mqtt.min.js"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.min.js"></script>
    <link href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css" rel="stylesheet">
</header>
<body>
<div align="center">
    <h3> emq x test  Websocket</h3>
    <button id="connectMqt" class="btn btn-success" type="button" onclick="connectMqt()">连接</button>
    <button id="disconnectMqt" class="btn btn-danger" type="button" disabled="disabled" onclick="disconnectMqt()">断开连接</button>
    当前状态: <h6 id="connectStatus" style="display: inline; color: red">未连接</h6>
    <br>

    <HR>
    <label>
        主题:
        <input id="subTopic" type="text" class="small">
    </label>
    已订阅:
    <h6 id="subscribedShow" style="display: inline; color: grey">订阅</h6>
    <br>
    <button type="button" class="btn btn-success" onclick="subscribeTopic()">订阅</button>

</div>


</body>
</html>

<script lang="js">
    let client


    const connectStatus = $("#connectStatus")
    const connectBtn = $("#connectMqt")
    const disconnectBtn = $("#disconnectMqt")
    const subscribedShow = $("#subscribedShow")

    const subTopic = $("subTopic").val()


        let options = {
            clientId: 'mqttjs_' + Math.random().toString(16).substring(2, 8)
        }

        client = mqtt.connect("ws://47.96.24.50:8083/mqtt",options)
        client.on('error', function (err) {
            console.log(err)
            client.end()
        })
        client.on('connect', function () {
            client.subscribe('test-connect', function (err) {
                if (!err) {
                    client.publish('test-connect', 'connected')
                }
            })
        })
        client.on('message',function (topic,message) {
            console.log(message.toString())
            if (message.toString() === 'connected') {
                connectStatus.text("已连接").css("color", "green")
                connectBtn.attr("disabled", "disabled")
                disconnectBtn.removeAttr("disabled", "disabled")
            }
        })
        client.on('close', function () {
            console.log(clientId + ' disconnected')
        })

    disconnectMqt = function () {
        client.end()
        connectStatus.text("未连接").css("color", "red")
        connectBtn.removeAttr("disabled", "disabled")
        disconnectBtn.attr("disabled", "disabled")
    }

    subscribeTopic = function () {
        client.subscribe(subTopic, function (err) {
            if (!err) {
                alert(111)
                subscribedShow.append(subTopic)
            }
            alert(111)
        })
    }










</script>
