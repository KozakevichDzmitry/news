<?php

require_once(COMPONENTS_PATH . "icons/play-icon.php");
require_once(COMPONENTS_PATH . "icons/volume-sound-icon.php");

function render_mn_player()
{
?>
	<div class="mn-player">
		<audio id="audio" src="http://kolber.github.io/audiojs/demos/mp3/juicy.mp3"></audio>
		<div class="mn-player__controls">
			<button class="player-controls__play-btn" id="playBtn">
				<?php render_play_icon(); ?>
			</button>
			<div class="player-controls__time" id="time">
				00:00 &mdash; 00:00
			</div>
			<div class="player-controls__volume">
				<button>
					<?php render_volume_sound_icon(); ?>
				</button>
				<input type="range" min="0" max="100" value="50" id="volume">
			</div>
		</div>
		<div class="mn-player__track-bar">
			<input type="range" min="0" max="100" value="0" id="trackBar">
		</div>
	</div>
<?php
}
