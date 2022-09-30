jQuery(document).ready(function ($) {
	var connection = new autobahn.Connection({
		url: "ws://127.0.0.1:8888/",
		realm: "realm1",
	});

	let counter = 1;

	console.log("to_try");

	connection.onopen = function (session) {
		session.subscribe("newspapers", (msg) => {
			console.log(msg);
			$("." + JSON.parse(msg[0]).tax[0]).prepend(JSON.parse(msg[0]).data);
			$("." + JSON.parse(msg[0]).tax[0])
				.children()
				.last()
				.remove();
		});

		session.subscribe("news", (msg) => {
			console.log(JSON.parse(msg[0]));
			const newsBlocks = JSON.parse(msg[0]);
			newsBlocks.forEach((block) => {
				$(`.site-main #main-content .${block.cat}`);
				const blockHtml = $(block.data).remove(".topic-bar").last();
				console.log(blockHtml);
				$(`.site-main #main-content .${block.cat}`).replaceWith(blockHtml);
			});
			// $('#added_news_counter').text(counter++)
			// console.log(JSON.parse(msg[0]).tax);
			// const categories = JSON.parse(msg[0]).tax;
			// categories.forEach(category => {
			// 	console.log(category);
			// });
		});
	};

	connection.open();
});
