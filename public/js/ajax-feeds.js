function provider_insert(data, callback){
    //console.log(data);
    $.ajax({
        type: "POST",
        url: "/myfeed/api/providers/insert",
        data: data,
        dataType: "json"
    }).success(function( data ) {
        if(data.result){
            //로그인 후 사용자 정보 세팅
            alert(data.message);
            update_feed(data.id);
        }else{
            alert(data.message);
        }
    }).fail(function(response){
        //console.log(printr_json(response));
    });
}

function update_feed(provider_id){
    $.ajax({
        type: "POST",
        url: "/myfeed/api/feeds/updateFeeds/"+provider_id,
        dataType: "json"
    }).success(function( data ) {
        if(data.result){
            //로그인 후 사용자 정보 세팅
            alert(data.message);

        }else{
            alert(data.message);
        }
    }).fail(function(response){
        //console.log(printr_json(response));
    });
}