/**
 * Created by gongjam on 14. 8. 14.
 */
window.fbAsyncInit = function() {

    //페이스북 js SDK 초기화
    FB.init({
        appId: '503788496422995',
        status: true,
        cookie: true,
        xfbml: true,
        oauth  : true
    });
    // 로딩 시 불어야 할 페이스북 api는 반드시 이곳에서 호출해야한다!
    //get_status();

    //로그인 상태 변화 체크하여 상태변하면 get_status() 다시 호출
   /* FB.Event.subscribe('auth.login', function(response) {
        get_status();
    });*/

};//End window.fbAsyncInit

// SDK 로딩하기(비동기)'
// Load the SDK asynchronously
(function(d){
    var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement('script'); js.id = id; js.async = true;
    js.src = "//connect.facebook.net/en_US/all.js";
    ref.parentNode.insertBefore(js, ref);
}(document));

var get_status = function(){
    FB.getLoginStatus(function(response) {
        if (response.status == "connected")
        {
            //이 경우는 로그인 상태이면서 앱 권한도 얻은 경우이다.
            // 그리고 response.authResponse 는
            // 유저의  ID, valid access token, signed
            // request, 그리고 the time the access token
            // 그리고 signed request each expire를 제공한다.

            //페이지 팬인지 여부 체크
            var user_id = response.authResponse.userID;
            console.log(printr_json(response));
        }
        else if (response.status === 'not_authorized')
        {
            // 이 경우는 로그인 상태이지만 앱 권한은 얻지 못한 경우이다.
            getAuth();
        }
        else
        {
            // 이 경우는 유저가 페이스북 로그인 조차 하지 않은 경우이다.
            getAuth();
        }
    });//End FB.getLoginStatus()
};//End get_status()

var checkUserIsFan = function(id){
    //현재 사용자가 팬인지 확인한다.
    FB.api({
        method: 'fql.query',
        query: 'SELECT uid FROM page_fan WHERE uid='+id+' AND page_id='+PAGE_ID
    }, function(resp) {
        if (resp.length) {
            //console.log('A fan!');
            //팬일 경우 동작을 여기에 작성
        } else {
            //console.log('you are not my fan!');
            //팬이 아닐 경우 동작을 여기에 작성
        }
    });
}//End checkUserIsFan()

var getAuth = function() {
    //앱 승인하기를 눌렀을 때의 루틴.
    //로그인 되어있다 하더라도 사용자의 정보에 대한 접근허가를 받기위한 절차이다.
    scope = '';
    FB.login(function(response) {
            //console.log(response);
        },
        {
            scope: scope
        });
}//End getAuth