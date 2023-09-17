<template lang="">
    <h1>Video Chat With WebRTC</h1>

    <div id="container">
        <section>
            <h1>Local Tracker</h1>
            <video id="local-video" autoplay></video>
        </section>
        <section>
            <h1>Remote Receiver</h1>
            <video id="remoteVideo" autoplay></video>
        </section>
      
        <div class="box">
            <button @click="captureScreen()">captureScreen</button>
            <button @click="connection()">Connection</button>
            <button @click="calling()">Call</button>
            <button @click="closing()">Hang Up</button>
        </div>
    </div>
</template>
<script setup>
    import { io } from "socket.io-client"
    import { onMounted, ref } from 'vue'

    onMounted(() => {
        
    })

    let peer = null; // RTCPeerConnection
    let cacheStream = null; // MediaStreamTrack

    function connection() {
        const socket = io.connect("/")
        socket.emit("joinRoom", { username: "test" })

        //Socket events
        socket.on("newUser", (data) => {
            console.log("歡迎新人加入")
            console.log(data)
        })

        socket.on("userLeave", (data) => {
          console.log("有人離開了");
          console.log(data);
        });
      
        socket.on("disconnect", () => {
          console.log("你已經斷線");
        });
      
        socket.on("offer", handleSDPOffer);
        socket.on("answer", handleSDPAnswer);
        socket.on("icecandidate", handleNewIceCandidate);
    }

    async function handleSDPOffer(desc) {
        console.log("*** 收到遠端送來的offer");
        try {
           if (!peer) {
             createPeerConnection(); // create RTCPeerConnection instance
           }
            console.log(" = 設定 remote description = ");
            await peer.setRemoteDescription(desc);
            if (!cacheStream) {
              await addStreamProcess(); // getUserMedia & addTrack
            }
            await createAnswer();
        } catch (error) {
          console.log(`Error ${error.name}: ${error.message}`);
        }
    }

    async function handleSDPAnswer(desc) {
        console.log("*** 遠端接受我們的offer並發送answer回來");
        try {
            await peer.setRemoteDescription(desc)
        } catch (error) {
          console.log(`Error ${error.name}: ${error.message}`);
        }
    }

    async function handleNewIceCandidate(candidate) {
        console.log(`*** 加入新取得的 ICE candidate: ${JSON.stringify(candidate)}`);
        try {
          await peer.addIceCandidate(candidate);
        } catch (error) {
            console.log(`Failed to add ICE: ${error.toString()}`);
        }
    }

    async function addStreamProcess() {
        let errMsg = "";
        try {
            console.log("獲取 local media stream 中 ...");
            const stream = await navigator.mediaDevices.getUserMedia(mediaConstraints);
            
            const localVideo = document.getElementById("localVideo");
            localVideo.srcObject = stream;
            cacheStream = stream;
        } catch (error) {
            errMsg = "getUserStream error ===> " + error.toString();
            throw new Error(errMsg);
        }

        try {
            // RTCPeerConnection.addTrack => 加入MediaStreamTrack
            cacheStream
              .getTracks()
              .forEach((track) => peer.addTrack(track, cacheStream));
        } catch (error) {
            errMsg = "Peer addTransceiver error ===> " + error.toString();
            throw new Error(errMsg);
        }
    }

    async function calling() {
      try {
        if (peer) {
          alert("你已經建立連線!");
        } else {
          createPeerConnection(); //建立 RTCPeerConnection

          await addStreamProcess(); // 加入多媒體數據到RTCPeerConnection instance
        }
      } catch (error) {
        console.log(`Error ${error.name}: ${error.message}`);
      }
    }


    let localStream
    async function captureScreen() {
        let mediaStream = null
        try {
            mediaStream = await navigator.mediaDevices.getDisplayMedia({
                video: {
                    cursor: "always",
                    displaySurface: "monitor",
                    logicalSurface: false,
                    aspectRatio: {
                      ideal: 1.333333, // 3:2 aspect is preferred
                    },
                },
              //音訊
              audio: false
            })
          
            document.getElementById("local-video").srcObject = mediaStream
            localStream = mediaStream
        }catch(ex) {
          console.log("Error occurred", ex)
        }
    }

</script>
