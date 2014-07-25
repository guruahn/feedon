$(document).ready(function() {
    $('.find_feed').keyup(function(){
        findFeeds($(this).val());
    });
$('#content').on('click','.rss_url',function(){
    subscription($(this).attr('href'));
    return false;
    });
$('#content').on('click', '.subscription', function(){
    $.ajax({
        type: "POST",
        url: "api/insert_provider.php",
        data: { feed_url: $(this).attr('data-link'), name: $(this).attr('data-name')},
dataType: "json"
})
.success(function( data ) {
    if(data.result){
    //로그인 후 사용자 정보 세팅
    //console.log(printr_json( data ));
    window.location = 'update_feeds.php';
    }else{
    alert("문제가 발생했습니다.");
    }
}).fail(function(response){
    //console.log(printr_json(response));
    });
return false;
});
});
google.load("feeds", "1");

function findFeeds(query) {
    // Query for president feeds on cnn.com
    google.feeds.findFeeds(query, findDone);
    }

function findDone(result) {
    // Make sure we didn't get an error.
    if (!result.error) {
    // Get content div
    var content = document.getElementById('content');
    var html = '';

    // Loop through the results and print out the title of the feed and link to
    // the url.
    for (var i = 0; i < result.entries.length; i++) {
    var entry = result.entries[i];
    html += '<div>';
    html += '<p> <img src="http://www.google.com/s2/favicons?domain='+ entry.link +'" alt=""/> <a class="rss_url" href="' + entry.url + '" title="'+ entry.title +'">' + entry.title + '</a></p>';
    html += '<p class="description">'+entry.contentSnippet+'</p>';
    html += '</div>';
    }
content.innerHTML = html;
}
}

function subscription(rss_url){
    var feed = new google.feeds.Feed(rss_url);
    feed.load(function(result) {
    if (!result.error) {
    console.log(result);
    var content = document.getElementById('content');
    var html = '';
    html += '<div class="title">';
    html += '<h3><a href="'+result.feed.link+'">'+result.feed.title+'</a></h3>';
    html += '<button class="subscription" data-link="'+result.feed.feedUrl+'" data-name="'+result.feed.title+'">+구독</button>';
    html += '</div>';
    for (var i = 0; i < result.feed.entries.length; i++) {
    var entry = result.feed.entries[i];
    html += '<div>';
    html += '<p><a href="'+entry.link+'">'+entry.title+'</a> <span>'+entry.publishedDate+'</span> </p>';
    html += '<p>'+entry.contentSnippet+'</p>';
    html += '</div>';
    }
content.innerHTML = html;
}
});
}
