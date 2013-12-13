var active = false, select = "", zap = "", first = "", second = "", third = "", fourth = "";
var music = document.getElementById('music');  

$("#jarvis").focus(function() {
	$(this).blur();
});

function respond(x) {
	$('#slider').text("Speech: " + x + " Active: " + active + " Select: " + select + " First: " + first + " Second: " + second + " Third: " + third + " Fourth: " + fourth + " ZAP: " + zap);
};

function selector(x) {
	switch (x) {
		case "1":
		case "one":
		case "won":
		case "player1":
		case "playerone":
		case "playerwon":
		case "meijer1":
		case "meijerone":
		case "meijerwon":
		case "winner1":
		case "winnerone":
		case "winnerwon":
			select = "#Player0UserId option";
			break;
		case "2":
		case "two":
		case "to":
		case "too":
		case "player2":
		case "playertwo":
		case "playerto":
		case "playertoo":
		case "meijer2":
		case "meijertwo":
		case "meijerto":
		case "meijertoo":
		case "winner2":
		case "winnertwo":
		case "winnerto":
		case "winnertoo":
			select = "#Player1UserId option";
			break;
		case "3":
		case "three":
		case "player3":
		case "playerthree":
		case "meijer3":
		case "meijerthree":
		case "loser1":
		case "loserone":
		case "loserwon":
			select = "#Player2UserId option";
			break;
		case "4":
		case "four":
		case "for":
		case "fore":
		case "player4":
		case "playerfour":
		case "playerfor":
		case "playerfore":
		case "meijer4":
		case "meijerfour":
		case "meijerfor":
		case "meijerfore":
		case "loser2":
		case "losertwo":
		case "loserto":
		case "losertoo":
			select = "#Player3UserId option";
			break;
		case "action":
			select = "#ActionType option";
			break;
	}
};

function player(x, y) {
	var z = false;
	switch(y) {
		case "kaaryna":
		case "kaaryma":
			y = "karyna"
			break;
		case "brian":
			y = "bryan";
			break;
		case "cow":
		case "pow":
		case "pau":
			y = "tao";
			break;
		case "sean":
		case "shawn":
			y = "shaun";
			break;
		case "lez":
		case "liz":
			y = "lizz";
			break;
	}
	
	$(x).each(function() {
		var o = $(this).text().toLowerCase().replace(/\s+/g, '');
		if (o == y) {
			$(this).attr("selected","selected");
			switch (x) {
				case "#Player0UserId option":
					first = o;
					break;
				case "#Player1UserId option":
					second = o;
					break;
				case "#Player2UserId option":
					third = o;
					break;
				case "#Player3UserId option":
					fourth = o;
					break;
			}
			z = true;
		}
	});
	return z;
};

function action(x, y) {
	var z = false;
	switch(y) {
		case "sync":
		case "siank":
			y = "sink"
			break;
		case "hip":
		case "hat":
			y = "hit"
			break;
	}
	$(x).each(function() {
		var o = $(this).text().toLowerCase().replace(/\s+/g, '');
		if (o == y) {
			$(this).prop("selected", true);
			z = true;
		}
	});
	return z;
};

function check(x) {
	$("input:radio[value=" + parseInt(x) + "]").prop("checked", true);
	return true;
};

function undo() {
	$("option").each(function() {
		$(this).prop("selected", false);
	});
};

function uncheck(x) {
	$("input:radio").prop("checked", false);
};

function hit(x) {
	switch (x) {
		case "1":
		case "one":
		case "won":
		case "player1":
		case "playerone":
		case "playerwon":
		case "meijer1":
		case "meijerone":
		case "meijerwon":
		case "winner1":
		case "winnerone":
		case "winnerwon":
		case first.toString():
			return check(0);
			break;
		case "2":
		case "two":
		case "to":
		case "too":
		case "player2":
		case "playertwo":
		case "playerto":
		case "playertoo":
		case "meijer2":
		case "meijertwo":
		case "meijerto":
		case "meijertoo":
		case "winner2":
		case "winnertwo":
		case "winnerto":
		case "winnertoo":
		case second.toString():
			return check(1);
			break;
		case "3":
		case "three":
		case "player3":
		case "playerthree":
		case "meijer3":
		case "meijerthree":
		case "loser1":
		case "loserone":
		case "loserwon":
		case third.toString():
			return check(2);
			break;
		case "4":
		case "four":
		case "for":
		case "fore":
		case "player4":
		case "playerfour":
		case "playerfor":
		case "playerfore":
		case "meijer4":
		case "meijerfour":
		case "meijerfor":
		case "meijerfore":
		case "loser2":
		case "losertwo":
		case "loserto":
		case "losertoo":
		case fourth.toString():
			return check(3);
			break;
		default:
			return false;
			break;
	}
};

$("#jarvis").bind('webkitspeechchange', function() {
	var s = $(this).val().toLowerCase().replace(/\s+/g, '');

	switch(s) {
		case "submit":
			$('div.control-group button.btn.btn-large.btn-success').click();
			break;
		case "cancel":
			active = false;
			select = "";
			break;
		case "reset":
			active = false;
			zap = false;
			select = "";
			first = "";
			second = "";
			third = "";
			fourth = "";
			undo();
			uncheck();
			break;
		case "finish":
			music.play();
			active = false;
			select = "";
			break;
		case "stop":
			music.load();
			active = false;
			select = "";
			break;
		default:
			if(select == "") {
				selector(s);
				if(select != "") {
					active = true;
				} else {
					active = false;
					select = "";
				}
			} else if (zap) {
				var x = hit(s);
				if(x) {
					active = false;
					select = "";
					zap = false;
				}
			} else if(select == "#ActionType option") {
				zap = action(select, s);
				if (zap == true) {
					active = false;
					select = "zap";
				}
			} else {
				var z = player(select, s);
				if (z == true) {
					active = false;
					select = "";
				}
			}
			break;
	}
	respond(s);

	$('#jarvis').val('');
});