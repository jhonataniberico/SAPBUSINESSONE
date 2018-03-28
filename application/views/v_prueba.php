    <script src="<?php echo RUTA_JS?>instafeed.min.js?v=<?php echo time();?>"></script>
    <script type="text/javascript" src="http://platform.linkedin.com/in.js"> 
        api_key: 864xp2wdu9eghe
        onLoad: onLinkedInLoad
        authorize: true
    </script>

     <script type="text/javascript">
         function onLinkedInLoad() {
             IN.Event.on(IN, "auth", onLinkedInAuth);
         } 

         function onLinkedInAuth() {
            var div = document.getElementById("sendMessageForm");
             div.innerHTML = '<h2>Send a Message To Yourself</h2>';
             div.innerHTML += '<form action="javascript:SendMessage();">' +
                         '<input id="message" size="30" value="You are awesome!" type="text">' +
                          '<input type="submit" value="Send Message!" /></form>';
         }

         function SendMessage(keywords) {
             var message = document.getElementById('message').value; 
                var BODY = {
                    "content": {
                        "submitted-url": "http://developer.linkedinlabs.com/jsapi-console",
                        "title": "JSAPI Console",
                        "description": "JSAPI Developer Console",
                        "submitted-image-url": "http://developer.linkedin.com/servlet/JiveServlet/downloadImage/102-1101-13-1003/30-25/LinkedIn_Logo30px.png"
                    },
                    "comment": "Prueba",
                    "visibility": {
                        "code": "anyone"
                    }
                }

                IN.API.Raw("/people/~/shares")
                      .method("POST")
                      .body(JSON.stringify(BODY)) 
                      .result(displayMessageSent)
                      .error(function error(e) { alert (e.message) });
         }

         function displayMessageSent() {
             var div = document.getElementById("sendMessageResult");
              div.innerHTML += "Yay!";
         }
    </script>
     </head>
     <body>
     <script type="IN/Login"></script>
     <div id="sendMessageForm"></div>
     <div id="sendMessageResult"></div>
     <div id="instafeed"></div>
          <a class = "twitter-share-button"
          href = "https://twitter.com/intent/tweet?status=<?php echo RUTA_IMG.'2.jpg' ?>"
          data-size = "large">
          Tweet </a>
          </br>
          <a class = "linkedin-share-button"
          href = "https://www.linkedin.com/shareArticle?mini=true&url=http://www.sap-latam.com/sap_business_one/Prueba&title=Publicación&source=SAP"
          data-size = "large">
          Linkedin </a>
          </br>
          <a class = "linkedin-share-button"
          href = "http://facebook.com/sharer.php?u=http://www.sap-latam.com/sap_business_one/Prueba"
          data-size = "large">
          Facebook </a>
          </br>
          <a class = "linkedin-share-button"
          href = "https://plus.google.com/share?url=http://www.sap-latam.com/sap_business_one/Prueba"
          data-size = "large">
          Google Plus </a>
    </body>