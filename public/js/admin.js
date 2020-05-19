$(document).ready(function () {
    var notificationsWrapper   = $('.dropdown-notifications');
    var notificationsToggle    = notificationsWrapper.find('a[data-toggle]');
    var notificationsCountElem = notificationsToggle.find('i[data-count]');
    var notificationsCount     = parseInt(notificationsCountElem.data('count'));
    var notifications          = notificationsWrapper.find('ul.dropdown-menu');
    var baseUrl = $('meta[name="baseUrl"]').attr('content');

	var pusherAppKey = $('meta[name="pusherAppKey"]').attr('content');
	var pusherAppCluster = $('meta[name="pusherCluster"]').attr('content');

    var pusher = new Pusher(pusherAppKey, {
        cluster: pusherAppCluster,
        encrypted: true
    });

    var channel = pusher.subscribe('OrderNotify');

    channel.bind('send-message', function(data) {
        var existingNotifications = notifications.html();
        var newNotificationHtml = `
			<li class="notification active">
				<div class="media">
					<div class="media-body">
						<a class="notification-desc" target="_blank" href="` + baseUrl + `/admin/orders/` + data.id + `" >
							<span>` + data.user + `</span> ordered with code <span>` + data.id + `</span> Please confirm !!!
						</a>
						<div class="notification-meta float-right">
							<small class="timestamp font-italic">` + data.created_at + `</small>
						</div>
					</div>
				</div>
			</li>
        `;
        notifications.html(newNotificationHtml + existingNotifications);

        notificationsCount += 1;
        notificationsCountElem.attr('data-count', notificationsCount);
        notificationsWrapper.find('.notif-count').text(notificationsCount);
        notificationsWrapper.show();
    });
});