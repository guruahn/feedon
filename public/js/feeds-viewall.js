$(document).ready(function() {
    $('.find_feed input').keyup(function(){
        findFeeds($(this).val());
    });
    $('#find_feed_list').on('click','.rss_url',function(){
        subscription($(this).attr('href'));
        return false;
    });
    $('#find_feed_list').on('click', '.subscription', function(){
        var data = {
            feed_url: $(this).attr('data-url'),
            feed_link: $(this).attr('data-link'),
            feed_desc: $(this).attr('data-desc'),
            feed_name: $(this).attr('data-name'),
            feed_type: $(this).attr('data-type')
        }
        ajax_provider_insert(data);
        return false;
    });
    $('#navigation').on('click', '.update', function(){
        ajax_update_feed_all();
        return false;
    });

    //infinite scrolling
    $(document).endlessScroll({
        bottomPixels: 0,
        fireDelay: 1000,
        callback: function(i) {
            //alert(i);
            $('div#loadmoreajaxloader').show();
            setTimeout("ajax_get_list("+(i+1)+")",1000*1);
        }
    });
});
google.load("feeds", "1");

/*
todo complete function print_feeds()
 */
function print_feeds(list){
    var html = "";
    list.forEach(function(entry) {
        html += "<div>";
        html += "<a href='"+entry['url']+"'>"+entry['title']+"</a>";
        html += "<span>"+entry['pubDate']+"</span>"
        html += "<p>"+entry['description']+"</p>";
        html += "</div>";
    });
    $('.feed_list').append(html);
}

function findFeeds(query) {
    // Query for president feeds on cnn.com
    google.feeds.findFeeds(query, findDone);
}

function findDone(result) {
    // Make sure we didn't get an error.
    if (!result.error) {
        // Get content div
        var content = document.getElementById('find_feed_list');
        var html = '';
        console.log(result);
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
            var content = document.getElementById('find_feed_list');
            var html = '';
            html += '<div class="title">';
            html += '<h3><a href="'+result.feed.link+'">'+result.feed.title+'</a></h3>';
            html += '<button class="subscription" data-url="'+encodeURIComponent(result.feed.feedUrl)+'" data-link="'+encodeURIComponent(result.feed.link)+'" data-name="'+result.feed.title+'" data-desc="'+result.feed.description+'" data-type="'+result.feed.type+'">+구독</button>';
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
