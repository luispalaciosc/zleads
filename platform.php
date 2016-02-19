<h2>Plataforma</h2>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '171628916547744',
      xfbml      : true,
      version    : 'v2.5'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<script>
// Only works after `FB.init` is called

function subscribeApp(page_id, page_access_token){
  console.log('suscribiendo la pagina a la app:'+ page_id);
  FB.api(
     '/' + page_id + '/subscribed_apps',
    'post',
    {access_token: page_access_token},
    function(response){
    console.log('pagina suscrita',response);
  });
}


function myFacebookLogin() {
  FB.login(function(response){
  	console.log('logueado exitosamente',response);
  	FB.api('me/accounts?limit=100', function(response){
  		console.log('veo paginas satisfactoriamente',response);
      var pages = response.data;
      var ul = document.getElementById('list');
      for(var i = 0, len = pages.length; i < len; i++ ){
        var page = pages[i];
        var li = document.createElement('li');
        var a = document.createElement('a');
        a.href = '#';
        a.onclick = subscribeApp.bind(this,page.id,page.access_token);
        a.innerHTML = page.name;
        //li.innerHTML = page.name;
        li.appendChild(a);
        ul.appendChild(li);
      }
  	});
  }, {scope: 'manage_pages'});
}
</script>

<button onclick="myFacebookLogin()">Login with Facebook</button>
<ul id='list'></ul>