<!doctype HTML>
<html>
	<head>
		<meta charset="UTF-8">
		
		<!-- include AR.js & dependencies -->
		<script src="/content/extern/aframe0.9.2.min.js"></script>
		<script src="/content/extern/aframe-ar2.0.5.js"></script>
		<script type="text/javascript">
			function update_gui(drugs) {
				// update all ui elements for drugs
				for (drug in drugs) {
					// get element
					var elDrugDisplay = document.querySelector(`#DrugDisplay${drug.name}`);

					// update color and text
					elDrugDisplay.setAttribute('material', 'color', drug.sinpuret.color);
					elDrugDisplay.setAttribute('value', drug.sinpuret.text);		
				}
			}

			
			// on click sent to parent
			this.addEventListener('fromParent', function (evt) {
				alert("JAMAN");
				
					// receive from parent
					update_gui(drugs)
			});
					
			// Component to change to a sequential color on click.
			AFRAME.registerComponent('cursor-listener', {
				init: function () {
					// vars init
					var el_drugserErgo_display = document.querySelector('#drugserErgo_display');
					
					
					// on click sent to parent
					this.el.addEventListener('click', function (evt) {	
						var data = { foo: 'bar' }
						var event = new CustomEvent('myCustomEvent', { detail: data })
						window.parent.document.dispatchEvent(event)
					});
				
					// events: hover darkening
					this.el.addEventListener('mouseenter', function (evt) {
						this.setAttribute('material', 'color', 'blue');
					});	
					this.el.addEventListener('mouseleave', function (evt) {
						this.setAttribute('material', 'color', color_current); // reset color
					});
				}
			});
		</script>
	</head>
	<body style='margin: 0px; overflow: hidden;'>
		<!--<div style="z-index: -2; text-align: center;"><h1>Loading...</h1></div>-->

		<!-- add ar.js -->
		<a-scene
			embedded
			arjs='debugUIEnabled: false;'
		>	
			<!-- add markers/drugs -->
			<a-marker
				type="pattern"
				preset="custom"
				url="/content/marker/drugser_ergo_pattern.patt"
			>
				<a-entity
					geometry="primitive: plane"
					material="color: orange; opacity: 0.5;"
					rotation="-90 0 0"
					cursor-listener
				>
					<a-text
						id="DrugDisplayDrugserErgo"
						align="center"
						baseline="center"
						color=""
						scale="1 1 1"
						value="Drugser Ergonomics\n0/2"
					>
					
					</a-text>
				</a-entity>
			</a-marker>
			<a-marker type="pattern" preset="custom" url="/content/marker/drugser_adult_strength_pattern.patt">
				<!--<a-box height="0.1" position='0 0.1 0' material='color: green; opacity: 0.5;'></a-box>-->
				
				<a-entity
					geometry="primitive: plane"
					material="color: orange; opacity: 0.5;"
					rotation="-90 0 0"
					cursor-listener
				>
					<a-text
						id="DurgDisplaydrugserAdultStrength"
						align="center"
						baseline="center"
						color=""
						scale="1 1 1"
						value="Drugser Adult Strength\n0/1"
					>
					</a-text>
				</a-entity>
			</a-marker>

			<!-- add simple camera -->
			<a-entity camera>
				<!-- add cursor for interaction (no hand crontrols) -->
				<a-cursor></a-cursor>
			</a-entity>
		</a-scene>
	</body>
</html>