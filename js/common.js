//Rel=External Script

// Set external links
function externalLinks() {
if (!document.getElementsByTagName) return;
	var anchors = document.getElementsByTagName("a");
	for (var i=0; i<anchors.length; i++) {
	var anchor = anchors[i];
	if(anchor.getAttribute("href")&&anchor.getAttribute("rel") == "external") {
		anchor.target = "_blank";
		var strTitle = anchor.getAttribute("title");
	if((strTitle=="")||(strTitle==null)) {
		anchor.title = "Opens in a new browser window.";
	} else {
	if(strTitle.indexOf("browser window")<0) {
		anchor.title = strTitle+". Opens in a new browser window.";
		}
	}
		var strTitle = "";
		}
	}
}
window.onload=externalLinks;