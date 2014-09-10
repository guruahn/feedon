function ajax_provider_insert(data, callback){
    //console.log(data);
    $.ajax({
        type: "POST",
        url: "/feedon/api/providers/insert",
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

function ajax_update_feed(provider_id){
    $.ajax({
        type: "POST",
        url: "/feedon/api/feeds/updateFeeds/"+provider_id,
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

function ajax_update_feed_all(){
    $.ajax({
        type: "POST",
        url: "/feedon/api/feeds/updateFeedsAll/",
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

function ajax_get_list(thispage){
    $.ajax({
        type: "POST",
        url: "/feedon/api/feeds/viewall/"+thispage,
        dataType: "json"
    }).success(function(data){
        if(data.result){
            print_feeds(data.feed_list);
            $('div#loadmoreajaxloader').hide();

        }else{
            $('div#loadmoreajaxloader').html('<center>No more posts to show.</center>');
        }
    }).fail(function(response){

    });
}