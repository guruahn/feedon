/**
 * Created by gongjam on 14. 8. 14.
 */
$(document).ready(function() {
    $('.login-facebook').click(function(){
        var redirect_uri = 'http://'+BASEURL+'/users/login';
        var url = 'http://facebook.com/login.php?skip_api_login=1&api_key=503788496422995&signed_next=1&next=https%3A%2F%2Fwww.facebook.com%2Fv1.0%2Fdialog%2Foauth%3Fredirect_uri%3D'+encodeURIComponent(redirect_uri)+"%26client_id%3D503788496422995&display=popup";

        //https://www.facebook.com/login.php?skip_api_login=1&api_key=129765800430121&signed_next=1&next=https%3A%2F%2Fwww.facebook.com%2Fv1.0%2Fdialog%2Foauth%3Fredirect_uri%3Dhttps%253A%252F%252Ffeedly.com%252Fv3%252Fauth%252Fcallback%26display%3Dpopup%26state%3DArXh7I97ImkiOiJmZWVkbHkiLCJyIjoiaHR0cDovL2ZlZWRseS5jb20vZmVlZGx5Lmh0bWwiLCJwIjoiRmFjZWJvb2siLCJjIjoiZmVlZGx5LmRlc2t0b3AgMjEuMC43ODYifQ%26scope%3Demail%252Cpublish_actions%252Cuser_likes%26response_type%3Dcode%26client_id%3D129765800430121%26ret%3Dlogin&cancel_uri=https%3A%2F%2Ffeedly.com%2Fv3%2Fauth%2Fcallback%3Ferror%3Daccess_denied%26error_code%3D200%26error_description%3DPermissions%2Berror%26error_reason%3Duser_denied%26state%3DArXh7I97ImkiOiJmZWVkbHkiLCJyIjoiaHR0cDovL2ZlZWRseS5jb20vZmVlZGx5Lmh0bWwiLCJwIjoiRmFjZWJvb2siLCJjIjoiZmVlZGx5LmRlc2t0b3AgMjEuMC43ODYifQ%23_%3D_&display=popup
        //alert(url);
        window.open(url,'','location=no, directories=no,resizable=no,status=no,toolbar=no,menubar=no, width=400,height=400,left=0, top=0, scrollbars=no');
        return false;
    });
});

