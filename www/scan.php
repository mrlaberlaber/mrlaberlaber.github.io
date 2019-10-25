<!doctype HTML>
<html>
<head>
	<!-- include AR.js -->
	<script src="https://aframe.io/releases/0.9.2/aframe.min.js"></script>
	<script src="https://raw.githack.com/jeromeetienne/AR.js/2.0.5/aframe/build/aframe-ar.js"></script>
</head>
<body style='margin: 0px; overflow: hidden;'>
	<!-- add ar.js -->
    <a-scene embedded arjs='debugUIEnabled: false;'>	
		<!-- add markers/drugs -->
		<a-marker type="pattern" preset="custom" url="/content/marker/sinupret_pattern.patt">
			<a-box height="0.1" position='0 0.1 0' material='color: yellow; opacity: 0.5;'></a-box>
		</a-marker>
		<a-marker type="pattern" preset="custom" url="/content/marker/tvr_pattern.patt">
			<a-box height="0.1" position='0 0.1 0' material='color: green; opacity: 0.5;'></a-box>
		</a-marker>

		<!-- add simple camera -->
		<a-entity camera></a-entity>
	</a-scene>
</body>
</html>