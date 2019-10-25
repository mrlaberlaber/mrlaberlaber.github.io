<!doctype HTML>
<html>
	<head>
		<meta charset="UTF-8">
		
		<!-- include AR.js & dependencies -->
		<script src="/content/extern/aframe0.9.2.min.js"></script>
		<script src="/content/extern/aframe-ar2.0.5.js"></script>
		<script type="text/javascript">
			// Component to change to a sequential color on click.
			AFRAME.registerComponent('cursor-listener', {
				init: function () {
					// vars init
					var sinupret_taken = 0;
					var sinupret_target = 2;
					var color_current = 'orange';
					var el_sinupret_display = document.querySelector('#sinupret_display');
					
					// helper
					function update_color(color_new) {
						color_current = color_new;
						this.setAttribute('material', 'color', color_current);		
					}
					
					// events
					this.el.addEventListener('click', function (evt) {	
						// target not reached yet
						if (sinupret_taken <= sinupret_target - 1) {
							sinupret_taken = sinupret_taken + 1;
							
							// update text - Why this only works if this block is executed before color change?!
							el_sinupret_display.setAttribute('value', `Sinupret\n${sinupret_taken}/${sinupret_target}`);
							
							// update color
							if (sinupret_taken == sinupret_target) {
								update_color('green');
							}
							else {
								update_color('yellow');
							}
						}
						// target already reached
						else {
							alert("Drug target already reached!\n\nNo additional pills required.");
						}
					});
				
					// events: hover darkening
					this.el.addEventListener('mouseenter', function (evt) {
						this.setAttribute('material', 'color', 'black');
					});	
					this.el.addEventListener('mouseleave', function (evt) {
						this.setAttribute('material', 'color', color_current); // reset color
					});
				}
			});
		</script>
	</head>
	<body style='margin: 0px; overflow: hidden;'>
		<div style="z-index: -2; text-align: center;"><h1>Loading...</h1></div>

		<!-- add ar.js -->
		<a-scene
			embedded
			arjs='debugUIEnabled: false;'
		>	
			<!-- add markers/drugs -->
			<a-marker
				type="pattern"
				preset="custom"
				url="/content/marker/sinupret_pattern.patt"
			>
				<a-entity
					geometry="primitive: plane"
					material="color: orange; opacity: 0.5;"
					rotation="-90 0 0"
					cursor-listener
				>
					<a-text
						id="sinupret_display"
						align="center"
						baseline="center"
						color="black"
						scale="1 1 1"
						value="Sinupret\n0/2"
					>
					</a-text>
					<!-- <a-box position = "-2 1 -3" material="src:https://i.imgur.com/wjobVTN.jpg"></a-box> -->
				</a-entity>
			</a-marker>
			<a-marker type="pattern" preset="custom" url="/content/marker/tvr_pattern.patt">
				<a-box height="0.1" position='0 0.1 0' material='color: green; opacity: 0.5;'></a-box>
			</a-marker>

			<!-- add simple camera -->
			<a-entity camera>
				<!-- add cursor for interaction (no hand crontrols) -->
				<a-cursor></a-cursor>
			</a-entity>
		</a-scene>
	</body>
</html>